/**
 * Jumping Tweets v2
 * by Steven Lehrburger - 10/22/2008 - NYU/ITP/ICM/Shiffman
 * (new name coming soon!)
 * 
 * (partial) copyright (C) 2001, 2008 United States Government as represented by the Administrator of the National Aeronautics and Space Administration. All Rights Reserved.
 * 
 * Build on NASAs' World Wind open source globe/mapping project and Twitter's Search Atom feed API. 
 * 
 * Currently, pulls 15 most recent and then constantly all subsequent tweets that contain "Retweeting".
 * It then displays them in an applet on at random latitude and longitudes on the globe using Annotations,
 * with Polylines between that location and NYC. This is very, very far from finished, and more information
 * can be found on my blog here - http://lehrblogger.com/?p=135 and http://lehrblogger.com/?p=186 and
 * and http://lehrblogger.com/?p=188
 * 
 * Credit to Jorge Ortiz for assistance getting a lof of basic Scala and World Wind things working.
 */
package localhost

import scala.actors.Actor

class TweetHandler (
    val globeActor: Actor									// so that it can notify the other thread when a new tweet is found
    ) {
	var newestRetweetPair: RetweetPair = new RetweetPair(new Retweet(" ", " ", 181, 181), new Tweet(" ", " ", 181, 181))           // these must be initialized, but I don't want them initialized as anything.
	var currentRetweetPair: RetweetPair = new RetweetPair(new Retweet(" ", " ", 181, 181), new Tweet(" ", " ", 181, 181))            // newest tweet is the newest tweet that has been received by searches, and current is the one most recently displayed
	var retweetPairs: Array[RetweetPair] = Array[RetweetPair]()               // a list of all the tweets that are in the queue to be displayed
	      
	println("loading")                                    
	retweetPairs = getTweetsThreaded(3)                           // get the first batch of tweets
	println("there are " + retweetPairs.length + " tweets")
	
	var notifiedOfWait: boolean = false                     // We only want to print notification once
	
    def handleRecentRetweets() {
  	    checkForNewRetweets                                   // check for new search results every time
	  
	    if (retweetPairs.length > 0) {                              // if there are tweets to process
	      notifiedOfWait = false                              // note that we processed one
	      processOneRetweet                                   // process one 
	      //println(currentRetweetPair.rt + " | " + currentRetweetPair.ot)                               // and print it
	    } else if (!notifiedOfWait) {                         // otherwise, print the waiting message, but only print it once
	      notifiedOfWait = true
	      println("No more retweets, please wait")
	    } 
	}
	
	// Does the processing for a single retweet - will do much more work in next iteration
	def processOneRetweet() {                              
	  currentRetweetPair = retweetPairs.first                           // stores the first tweet in the array (the oldest tweet) as current                       
	  retweetPairs = retweetPairs.slice(1, retweetPairs.length)               // and then removes it from the list
      globeActor ! currentRetweetPair 							// and notify the globeActor thread of the new tweet
	}
	
	// Checks to see if any new retweets have been sent since the last check
	def checkForNewRetweets() {
	  if (retweetPairs.length > 0) newestRetweetPair = retweetPairs.last                           // if we have tweets left, we want to grab all of the tweets since our current newest tweet
	  else                   newestRetweetPair = currentRetweetPair                  // otherwise, we want to grab all of the tweets since the current tweet
	  
	  var newRetweetPairs: Array[RetweetPair] = Array[RetweetPair]()                               // an empty array that will hold the new tweets  
	  
	  var pageNum: Int = 1                                                       // this will keep track of how many pages back we are going, in case there has been more than one page of tweets since the last check
	  var nextPageOfRetweetPairs: Array[RetweetPair] = getTweetsOnPage(pageNum)              // get the next page
	  var indexOfNewest: Int = indexOfTweetInArray(nextPageOfRetweetPairs, newestRetweetPair)// look for the newest tweet in the new page
	  
	  while ((retweetPairs.length > 0) && (indexOfNewest == -1)) {                     // if you don't find it
	    newRetweetPairs = nextPageOfRetweetPairs ++ newRetweetPairs                                // add the current page to the list of new tweets
	    
	    pageNum += 1                                                             // and look for it again in the next page (same idea)
	    nextPageOfRetweetPairs = getTweetsOnPage(pageNum)
	    indexOfNewest = indexOfTweetInArray(nextPageOfRetweetPairs, newestRetweetPair)
	  }
	                                                                             // add the last of these new pages, from the newest tweet up through the end, to the array of new tweets
	  newRetweetPairs = (nextPageOfRetweetPairs.slice(indexOfNewest + 1, nextPageOfRetweetPairs.length)).toArray ++ newRetweetPairs
	  
	  retweetPairs = retweetPairs ++ newRetweetPairs                                               // and add that to the list of tweets that need to be processed
	}
	
	// Looks for a specific tweet in an array of tweets, and returns the index, otherwise -1
	def indexOfTweetInArray(arr: Array[RetweetPair], retweetPair: RetweetPair): Int = {
	  var indexToReturn: Int = -1
	  
	  arr.zipWithIndex.foreach { pair =>     // iterate over the array of tweets
	     val (rtpair, index) = pair               // grab each pair
	     
	     if ((rtpair.rt.author == retweetPair.rt.author) &&   // compare author and text of the tweet
	         (rtpair.rt.text == retweetPair.rt.text)     ) {
	       indexToReturn = index             // and grab the index if they match
	     }
	  }
	  
	  indexToReturn                          // return that index
	}  

 	
	// Downloads the specified page of tweets from search.twitter.com using a php script
	def getTweetsOnPage(pageNum: Int): Array[RetweetPair] = {
	  //POSSIBLE BUG IF A LOC IS ADDED TO A USER LATER
	  
      val rturl = "http://lehrblogger.com/nyu/classes/fall08/icm/final/retweetProxy.php?pagenum=" + pageNum.toString     // the URL of the proxy php script, with the current page number
	  
      val rtxmlstr = _root_.scala.io.Source.fromURL(rturl).getLines.mkString("")                                         // get the xml from the page as a string
	  val rtxml = _root_.scala.xml.XML.loadString(rtxmlstr)                                                              // and turn it into an XML object
	    
      parseXMLForRetweets(rtxml)
	}   
 
 	// Jorge Ortiz, a friend and Scala programmer extraordinaire, wrote a threaded version of the getTweets function to make the loading process faster
	// I don't have time now to go through it with him and figure everything out, so no comments for now
	def getTweetsThreaded(numPages: Int): Array[RetweetPair] = {
	  var retweetPairList: Array[RetweetPair] = Array[RetweetPair]()
	  
	  val url = "http://lehrblogger.com/nyu/classes/fall08/icm/final/retweetProxy.php?pagenum="
	  def fetch(page: Int) = _root_.scala.actors.Futures.future {
	    val xmlstr = _root_.scala.io.Source.fromURL(url + page).getLines.mkString("")
	    _root_.scala.xml.XML.loadString(xmlstr)
	  }
	  val xmls =
	    (1 to numPages).toList.map(fetch).map(_.apply)
      println("xmls loaded")
	  for(xml <- xmls) {
	    retweetPairList = parseXMLForRetweets(xml) ++ retweetPairList
	  }
	  
	  retweetPairList
	}
 
    def parseXMLForRetweets(xml: _root_.scala.xml.Elem): Array[RetweetPair] = {
      var retweetPairList: Array[RetweetPair] = Array[RetweetPair]()                                                                   // by having it return a list of tweets, it becomes more flexible
	  
      for (entry <- xml \\ "entry") {    
	    var rtLatLon = getLatLonByAuthor(TwitterNameParser.parseUserName((entry \\ "name").text))

        if ((rtLatLon._1 != 181) && (rtLatLon != 181)) {
          var rt: Retweet = new Retweet((entry \\ "name").text, (entry \\ "title").text, rtLatLon._1, rtLatLon._2)

          var otLatLon = getLatLonByAuthor(rt.originalAuthor)
                 
          if ((rt.author != "") && (rt.text != "") && (otLatLon._1 != 181) && (otLatLon._2 != 181)) {
            var ot: Tweet = new Tweet(rt.originalAuthor, rt.originalText, otLatLon._1, otLatLon._2)
         
            retweetPairList = Array(new RetweetPair(rt, ot)) ++ retweetPairList
          }
        }
      }
	  retweetPairList
    }
 /*       if ((rtLatLon._1 != 181) && (rtLatLon != 181)) {
          var rt: Retweet = new Retweet((entry \\ "name").text, (entry \\ "title").text, rtLatLon._1, rtLatLon._2)
          rt.initializeRetweetData
          
          println(rt.originalAuthor + " " + rt.getURLSafeText)
          var searchstr = rt.getURLSafeText + "&phrase=&ors=&nots=&tag=&lang=all&from=" + rt.originalAuthor
          val oturl = "http://lehrblogger.com/nyu/classes/fall08/icm/final/singletweetProxy.php?searchstr=" + searchstr
            
          val otxmlstr = _root_.scala.io.Source.fromURL(oturl).getLines.mkString("")                                         // get the xml from the page as a string
          println(otxmlstr)
          val otxml = _root_.scala.xml.XML.loadString(otxmlstr)                                                              // and turn it into an XML object
	    
          for (entry <- rtxml \\ "entry") {    
	        var otLatLon = getLatLonByAuthor(rt.originalAuthor)
                 
            if ((otLatLon._1 != 181) && (otLatLon._2 != 181)) {
              println("otLatLon ok")
              var ot: Tweet = new Tweet(rt.originalAuthor, rt.originalText, otLatLon._1, otLatLon._2)
         
              retweetPairList = Array(new RetweetPair(rt, ot)) ++ retweetPairList
            }
          }*/ 
    def getLatLonByAuthor(author: String): (Float, Float) = {
      var latlon = (181.toFloat, 181.toFloat)
      println(author)
      if (author != "") {
        val url = "http://lehrblogger.com/nyu/classes/fall08/icm/final/twittervisionProxy.php?user=" + author
        var xmlstr = ""
        try {
          xmlstr = _root_.scala.io.Source.fromURL(url).getLines.mkString("") 
          
          val xml = _root_.scala.xml.XML.loadString(xmlstr) 
	       
          for (location <- xml \\ "location") {   
            latlon = ((location \\ "latitude").text.toFloat, (location \\ "longitude").text.toFloat)
          }
        } catch {
          case ex: org.xml.sax.SAXParseException => println("Oops!!") 

        }
        
      }  
      
      latlon
    }
	

 
 /* OLD WAIT FOR VERSION CONTROL BEFORE DELETING - before retweet pairs
	// Downloads the specified page of tweets from search.twitter.com using a php script
	def getTweetsOnPage(pageNum: Int): Array[Tweet] = {
	  var tweetList: Array[Tweet] = Array[Tweet]()                                                                   // by having it return a list of tweets, it becomes more flexible
	  //POSSIBLE BUG IF A LOC IS ADDED TO A USER LATER
	  val url = "http://lehrblogger.com/nyu/classes/fall08/icm/final/twitterProxy.php?pagenum=" + pageNum.toString     // the URL of the proxy php script, with the current page number
	  
      val xmlstr = _root_.scala.io.Source.fromURL(url).getLines.mkString("")                                         // get the xml from the page as a string
	  val xml = _root_.scala.xml.XML.loadString(xmlstr)                                                              // and turn it into an XML object
	    
	  for (entry <- xml \\ "entry") {    
	    val tvurl = "http://lehrblogger.com/nyu/classes/fall08/icm/final/twittervisionProxy.php?user=" + TwitterNameParser.parseUserName((entry \\ "name").text)
        val tvxmlstr = _root_.scala.io.Source.fromURL(tvurl).getLines.mkString("")                                         // get the xml from the page as a string
	    val tvxml = _root_.scala.xml.XML.loadString(tvxmlstr)                                                              // and turn it into an XML object
	    
        var lat: Float = 181
        var lon: Float = 181
        for (location <- tvxml \\ "location") {   
          lat = (location \\ "latitude").text.toFloat
          lon = (location \\ "longitude").text.toFloat
	     }
       
        if ((lat != 181) && (lon != 181)) {
          tweetList = Array(new Tweet((entry \\ "name").text, (entry \\ "title").text, lat, lon)) ++ tweetList                     // make the tweet with the author and title node text, and add it to the array
        }
	  }
	  tweetList
	}   
	
	// Jorge Ortiz, a friend and Scala programmer extraordinaire, wrote a threaded version of the getTweets function to make the loading process faster
	// I don't have time now to go through it with him and figure everything out, so no comments for now
	def getTweetsThreaded(): Array[Tweet] = {
	  var tweetList: Array[Tweet] = Array[Tweet]()
	  
	  val numPages = 1
	  val url = "http://lehrblogger.com/nyu/classes/fall08/icm/hw6/twitterProxy.php?pagenum="
	  def fetch(page: Int) = _root_.scala.actors.Futures.future {
	    val xmlstr = _root_.scala.io.Source.fromURL(url + page).getLines.mkString("")
	    _root_.scala.xml.XML.loadString(xmlstr)
	  }
	  val xmls =
	    (1 to numPages).toList.map(fetch).map(_.apply)
	
	  for(xml <- xmls) {
	    for (entry <- xml \\ "entry") {
//BROKEN update for lat and lon	          tweetList = Array(new Tweet((entry \\ "name").text, (entry \\ "title").text)) ++ tweetList  //so last (oldest) tweet goes at front
	    }
	  }
	  
	  tweetList
	}
   */
}
