import processing.core._
import processing.core.scala._
import PConstants._
import PApplet._
class Falling_Tweets extends SApplet { 
lazy val px = new DrawProxy { 
import _root_.scala.collection.mutable.Map

println("running")                                            // so user knows that it is working, and just loading
size(1000, 200)

val lightestColor = 175                                            // maximum lightness for words
var words: Map[String, Int] = Map[String, Int]()              // all the words on the screen, mapped to the number of occurrences
var tweets: Array[Tweet] = Array[Tweet]()                     // all the tweets loaded at the beginning
var visibleTweets: Array[Tweet] = Array[Tweet]()              // all the tweets on the screen                
var counter: Int = 0                                          // how many tweets have been displayed              
  
val fontHeight = 10                                           // font display variables
val textHeight = fontHeight + 6
var tFont: PFont = createFont( "Courier", fontHeight, true);
colorMode(PConstants.RGB,255,255,255,100)
smooth()
val initX = 5
val numRecent = (height / textHeight)                         // hoe many tweets fit on the screen at once

frameRate(0.5f)                                                // how long between tweets - currently, one tweet every two seconds
      
println("loading")
getTweetsThreaded                                              // downloads all the tweets
println("there are " + tweets.length + " tweets")
tweets = Array(new Tweet("", " All " + tweets.length + " available tweets have been used - there are no more tweets in array")) ++ tweets
                                                               // and one more to tell the user you got to the end, and not that something bad happened

// Loops continuously, at a speed determined by frameRate above
def draw() {  
  if (counter < tweets.length) {                              // don't try to draw after you get to the end
    background(255)
    updateVisibleTweets                                       // update which tweets are visible in the data structures
    drawVisibleTweets                                         // and then draw them
    counter += 1
  }
}

// downloads the tweets from search.twitter.com using a php script
def getTweets() {
  for(page <- 1 to 20) {                                                                                          // Twitter limits results to 1500 per search, at 15 per page
    val url = "http://lehrblogger.com/nyu/classes/fall08/icm/hw5/twitterProxy.php?pagenum=" + page.toString     // the URL of the proxy php script, with the current page number
    //val url = "http://search.twitter.com/search.atom?max_id=950939157&page=" + page.toString + "&q=%23debate08"  // without the php script
    val xmlstr = _root_.scala.io.Source.fromURL(url).getLines.mkString("")                                         // get the xml from the page as a string
    val xml = _root_.scala.xml.XML.loadString(xmlstr)                                                              // and turn it into an XML object
    
    for (entry <- xml \\ "entry") {                                                                                // get each entry tag in the XML object (isn't Scala great?) i.e. each individual tweet
          tweets = Array(new Tweet((entry \\ "name").text, (entry \\ "title").text)) ++ tweets                     // make the tweet with the author and title node text, and add it to the array
    }
  }
  
}  

// Jorge Ortiz, a friend and Scala programmer extraordinaire, wrote a threaded version of the getTweets function to make the loading process faster
// I don't have time now to go through it with him and figure everything out, so no comments for now
def getTweetsThreaded() {
  val numPages = 20
  val url = "http://lehrblogger.com/nyu/classes/fall08/icm/hw5/twitterProxy.php?pagenum="
  def fetch(page: Int) = _root_.scala.actors.Futures.future {
    val xmlstr = _root_.scala.io.Source.fromURL(url + page).getLines.mkString("")
    _root_.scala.xml.XML.loadString(xmlstr)
  }
  val xmls =
    (1 to numPages).toList.map(fetch).map(_.apply)

  for(xml <- xmls) {
    for (entry <- xml \\ "entry") {
          tweets = Array(new Tweet((entry \\ "name").text, (entry \\ "title").text)) ++ tweets
    }
  }
}

// Updates the data structures for the visible tweets
def updateVisibleTweets() {
  var newTweet: Tweet = tweets.apply(tweets.length - 1 - counter)                          // get the next tweet in the master list
  
  visibleTweets =  Array(newTweet) ++ visibleTweets                                        // add it to the list of visible tweets
      
  if (visibleTweets.length > numRecent) {                                                  // if the screen is full and a tweet is no longer visible
    visibleTweets.apply(numRecent).tokens.foreach(token => updateOccurrence(token, false)) // remove its occurrences from the map
    visibleTweets = visibleTweets.slice(0, visibleTweets.length - 1)                       // and remove it from the array of visible tweets
  }
  
  newTweet.tokens.foreach(token => updateOccurrence(token, true))                          // update the token occurrences map for each token in this new tweet
}

// Updates the map for one token, behaving differently for adding and subtracting an occurrence
def updateOccurrence(tokenArg: String, adding: boolean) {
  var token = stripToken(tokenArg).toLowerCase              // we only want lowercase tokens without leading or trailing punctuation in the map
  
  val count: Int = words.getOrElseUpdate(token, 0)          // what's the current count for this word (adding it to the map if it has no count)
  
  if (adding) {                                             // if we are adding an occurrence
    words.put(token, count + 1)                             // increase that count
  } else {                                                  // if we are removing an occurrence
    if (count == 1) words.removeKey(token)                  // if this was the only occurrence of this token, remove the entire thing from the map (to keep the map size manageable)
    else            words.put(token, count - 1)             // otherwise, decrease the count
  }
}


// Draws the visible tweets by iterating over the array
def drawVisibleTweets() {
   visibleTweets.zipWithIndex.foreach { pair =>             // zipWithIndex is needed because we need to know the index of the iterator
     val (t, index) = pair 
     drawTweet(t, index * textHeight)                       // for determining how far down on the screen this tweet goes
  }
}    

// Draws one tweet on the screen
def drawTweet(t: Tweet, y: Float) {
  var curX: Float = initX                                   // always start from the same place on the left
  textFont(tFont)                                           // and use the same font
    
  fill(0)                                                   // draw the author's name in black first
  text(t.formatAuthor, curX, textHeight + y)
  curX += textWidth(t.formatAuthor)                         // and keep track of where to draw the next word
  
  t.tokens.foreach(token => {                               // then for each token
    fill(getTokenColor(token))                              // figure out what color it should be
    text(" " + token, curX, textHeight + y)                 // and draw it, preceded by a space, in the right place
    curX += textWidth(" " + token)                          // and update where to draw the next word
  })
}

// Determines what color a token should be, based on the number of times it occurs on the screen
def getTokenColor(tokenArg: String): Float = {
  var token = stripToken(tokenArg).toLowerCase              // we only have lowercase tokens without leading or trailing punctuation in the 
  var maxOccurrences = 1                                    // all words in the map occur at least once, and this prevents dividing by zero later
    
  words.keySet.foreach(k => {                               // to figure out what words should be darkest, go through all the words in the map
    if ((k.length > 0)   &&                                 // make sure they are nonempty (otherwise it will crash)
        (k.first != '#') &&                                 // ignore #hashtags - they aren't as interesting, and this prevents the search term 
                                                            // (initially '#debate08') from being darkest because it is in every tweet returned by the search
        (!isCommon(k))   &&                                 // don't count common words
        (words.getOrElse(k, 1) > maxOccurrences)            
       ) {
      maxOccurrences = words.getOrElse(k, 1)                // keep track of the maximum number of occurrences (but remember 1, not 0, is the minumum
    }
  })
  
  var diff: Float = lightestColor / maxOccurrences          // the difference in color between each gradation of occurrences - allows for varying darknesses
  
  if ((token.length <=  0) ||                               // short circuit so as not to call .first on an empty string 
      (token.first == '#') ||                               // for #hashtags
      isCommon(token)                                       // and common words
     )
    lightestColor                                           // always use the lightest color
  else                                                      // otherwise, make the most common words darkest, and have the difference between darknesses be 'diff'
    (maxOccurrences - words.getOrElse(token, 0)).toFloat * diff
}

// Recursive function to remove leading and trailing punctuation
def stripToken(tokenArg: String): String = {
  var token = tokenArg
  
  if (token.length > 1) {                                  
    if (!token.last.isLetterOrDigit) {                    
      token = stripToken(token.slice(0, token.length - 1))  // if the last digit is not a letter or a digit, slice it off and make a recursive call
    } else if (!token.first.isLetterOrDigit && (token.first != '#') && (token.first != '@')) {  // note this else is to make sure that all punctuation tokens don't get all the way to "" before stopping
      token = stripToken(token.slice(1, token.length))      // if the last digit is not a letter or a digit or a # or a @, slice it off and make a recursive call
    }
  }
  
  token
}

// The commonness of many words distorts the relevance of the visualization, so ignore them here
def isCommon(word: String): boolean = {
  var commonWords: Array[String] = Array[String](
    "the",
    "of",
    "and",    
    "a",
    "to",
    "in",
    "is",
    "you",
    "that",
    "it",    
    "he",
    "was",
    "for",
    "on",
    "are",
    "as",
    "with",
    "his",
    "they",
    "i",
    "at",	
    "be",
    "this",
    "have",
    "from",
    "or",
    "one",    
    "had",
    "by",
    "word",
    "some",
    "who",
    "my",
    "has",
    "how",
    "-",
    "we",
    "but")
    //http://www.duboislc.org/EducationWatch/First100Words.html
    
  commonWords.indexOf(word) != -1
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
}

} } 
