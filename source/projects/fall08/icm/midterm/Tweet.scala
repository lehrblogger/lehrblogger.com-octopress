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

/* A supersimple class for keeping track of author and text information for a single Tweet*/
class Tweet (	
    var author: String,
    val text: String//,
    //val lat: Float,
    //val lon: Float
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
  
  def ==(other: Tweet): boolean = {
    ((other.author == this.author) && (other.text == this.text))
  }
  
  override def toString: String = {
    formatAuthor + " " + text
  }
  
}