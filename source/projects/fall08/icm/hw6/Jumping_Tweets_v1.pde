/**
 * Jumping Tweets v1
 * by Steven Lehrburger - 10/15/2008 - NYU/ITP/ICM/Shiffman
 *
 * Loads the first 15 search results for "retweeting" and prints them to
 * the console while continuously checking for  new results to also print.
 */

var newestTweet: Tweet = new Tweet(" ", " ")            // these must be initialized, but I don't want them initialized as anything.
var currentTweet: Tweet = new Tweet(" ", " ")           // newest tweet is the newest tweet that has been received by searches, and current is the one most recently displayed
var tweets: Array[Tweet] = Array[Tweet]()               // a list of all the tweets that are in the queue to be displayed
frameRate(1.0f)                                         // limits speed of output *and* rate of queries to twitter
      
println("loading")                                    
tweets = getTweetsThreaded()                            // get the first batch of tweets
println("there are " + tweets.length + " tweets")

var notifiedOfWait: boolean = false                     // We only want to print notification once
def draw() {
  
  checkForNewRetweets                                   // check for new search results every time
  
  if (tweets.length > 0) {                              // if there are tweets to process
    notifiedOfWait = false                              // note that we processed one
    processOneRetweet                                   // process one 
    println(currentTweet)                               // and print it
  } else if (!notifiedOfWait) {                         // otherwise, print the waiting message, but only print it once
    notifiedOfWait = true
    println("No more retweets, please wait")
  }
}

// Does the processing for a single retweet - will do much more work in next iteration
def processOneRetweet() {                              
  currentTweet = tweets.first                           // stores the first tweet in the array (the oldest tweet) as current                       
  tweets = tweets.slice(1, tweets.length)               // and then removes it from the list
}

// Checks to see if any new retweets have been sent since the last check
def checkForNewRetweets() {
  if (tweets.length > 0) newestTweet = tweets.last                           // if we have tweets left, we want to grab all of the tweets since our current newest tweet
  else                   newestTweet = currentTweet                          // otherwise, we want to grab all of the tweets since the current tweet
  
  var newTweets: Array[Tweet] = Array[Tweet]()                               // an empty array that will hold the new tweets
  
  var pageNum: Int = 1                                                       // this will keep track of how many pages back we are going, in case there has been more than one page of tweets since the last check
  var nextPageOfTweets: Array[Tweet] = getTweetsOnPage(pageNum)              // get the next page
  var indexOfNewest: Int = indexOfTweetInArray(nextPageOfTweets, newestTweet)// look for the newest tweet in the new page
  
  while ((tweets.length > 0) && (indexOfNewest == -1)) {                     // if you don't find it
    newTweets = nextPageOfTweets ++ newTweets                                // add the current page to the list of new tweets
    
    pageNum += 1                                                             // and look for it again in the next page (same idea)
    nextPageOfTweets = getTweetsOnPage(pageNum)
    indexOfNewest = indexOfTweetInArray(nextPageOfTweets, newestTweet)
  }
                                                                             // add the last of these new pages, from the newest tweet up through the end, to the array of new tweets
  newTweets = (nextPageOfTweets.slice(indexOfNewest + 1, nextPageOfTweets.length)).toArray ++ newTweets
  
  tweets = tweets ++ newTweets                                               // and add that to the list of tweets that need to be processed
}

// Looks for a specific tweet in an array of tweets, and returns the index, otherwise -1
def indexOfTweetInArray(arr: Array[Tweet], tweet: Tweet): Int = {
  var indexToReturn: Int = -1
  
  arr.zipWithIndex.foreach { pair =>     // iterate over the array of tweets
     val (t, index) = pair               // grab each pair
     
     if ((t.author == tweet.author) &&   // compare author and text of the tweet
         (t.text == tweet.text)     ) {
       indexToReturn = index             // and grab the index if they match
     }
  }
  
  indexToReturn                          // return that index
}  

// Downloads the specified page of tweets from search.twitter.com using a php script
def getTweetsOnPage(pageNum: Int): Array[Tweet] = {
  var tweetList: Array[Tweet] = Array[Tweet]()                                                                   // by having it return a list of tweets, it becomes more flexible
   
  val url = "http://lehrblogger.com/nyu/classes/fall08/icm/hw6/twitterProxy.php?pagenum=" + pageNum.toString     // the URL of the proxy php script, with the current page number
  //val url = "http://search.twitter.com/search.atom?max_id=950939157&page=" + page.toString + "&q=%23debate08"  // without the php script
  val xmlstr = _root_.scala.io.Source.fromURL(url).getLines.mkString("")                                         // get the xml from the page as a string
  val xml = _root_.scala.xml.XML.loadString(xmlstr)                                                              // and turn it into an XML object
    
  for (entry <- xml \\ "entry") {                                                                                // get each entry tag in the XML object (isn't Scala great?) i.e. each individual twee
    tweetList = Array(new Tweet((entry \\ "name").text, (entry \\ "title").text)) ++ tweetList                     // make the tweet with the author and title node text, and add it to the array
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
          tweetList = Array(new Tweet((entry \\ "name").text, (entry \\ "title").text)) ++ tweetList  //so last (oldest) tweet goes at front
    }
  }
  
  tweetList
}


/* A supersimple class for keeping track of author and text information for a single Tweet*/
class Tweet(	
    var author: String,
    val text: String
  ) {
 
  private var authors: Array[String] = author.split(" ")  // we only want the first name of the author, and not the one in ()
  if (authors.length > 0)  author = authors.first         // so split the name and grab the first one  (there are other ways to do this)
  
  var tokens: Array[String] = text.split(" ")		  // an array of tokens in the tweet, split by a single space
    
  def formatAuthor: String = {                            // adds whitespace to the author's name so that all authornames are the same length
    var retStr: String = ""                               // and so that the tweets all start in the same horizontal location
    for(i <- 0 to (15 - author.length)) {
      retStr += " " 
    }
      
    retStr + author + ":"
  }
  
  def ==(other: Tweet): boolean = {                       // I wanted to use this for indexOf in an array, but it didn't work for some reason
    ((other.author == this.author) && (other.text == this.text))
  }
  
  override def toString: String = {                       // for printing Tweets
    formatAuthor + " " + text
  }
  
}
