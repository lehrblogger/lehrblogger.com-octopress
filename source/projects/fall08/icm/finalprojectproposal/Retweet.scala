package localhost

class Retweet (	
    author: String,
    text: String,
    lat: Float,
    lon: Float
  ) extends Tweet(author, text, lat, lon) {
  
  var originalAuthor: String = ""
  var originalText: String = ""
  initializeRetweetData
  
  
  
  def initializeRetweetData = {
    var indexOfAt = text.indexOf("@")
    var indexOfColon = text.indexOf(": ", indexOfAt + 1)
    
    if (indexOfColon != -1) {
      originalAuthor = text.substring(indexOfAt + 1, indexOfColon)
      originalText = text.substring(indexOfColon + 1).trim
    }
  }
  
  def getURLSafeText: String = {
    
    var urlSafeText: String = ""
    
    var canAddSpace = false
    originalText.foreach(ch => {
      if(ch.isLetterOrDigit) {
        urlSafeText = urlSafeText + ch
        canAddSpace = true
      } else if (canAddSpace) {
        urlSafeText = urlSafeText + " "
        canAddSpace = false
      }
    })
    
    //HASH TAGS BREAK THIS?
    //maybe split up into tokens?
       // a more robusst solution will be necessary later



  //  urlSafeText.replaceAll("    ", "+")
 //   urlSafeText.replaceAll("   ", "+")
  //  urlSafeText.replaceAll("  ", "+")
     urlSafeText.trim.replace(" ", "+")
    
//    urlSafeText = urlSafeText
   // urlSafeText = urlSafeText.replaceAll("/", "%2F")
    //urlSafeText = urlSafeText.replaceAll("+", "%2B")
//    urlSafeText = urlSafeText.replaceAll("&", "%26")
    //urlSafeText = urlSafeText.replaceAll("%", "%25")
    
//    urlSafeText.toString
  }
}