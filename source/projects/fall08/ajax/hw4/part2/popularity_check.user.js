// ==UserScript==
// @name           Popularity Check
// @namespace      http://lehrblogger.com/?p=97
// @description    How many sites link to the one at which you currently are?
// @include        *
// @require        http://formconstant.net/ajax/mootools-1.2-core.js
// @require        http://formconstant.net/ajax/mootools-1.2-more.js
// ==/UserScript==

// another interesting userscript - NOTE I could not get it to work with my own hosted copies of mootools, so this will break if/when David takes his down
if(!console)
{
  var console = {
    log: function() {},
    error: function() {},
    warning: function() {}
  };
}

if(self == top)
{
  // the current site and the resultant search query URL
  var href = window.location.href;
  var searchURL = "http://www.google.com/search?hl=en&q=link%3A" + href + "&btnG=Google+Search&aq=f&oq=";
  
  // load the page for the search query, and extract the string indicating how many hits there were
  // (note that this and the search query will break if Google changes their formatting)
  GM_xmlhttpRequest({
    method: 'GET',
    url: searchURL,
    onload: function(responseDetails) 
    {
      var rString = responseDetails.responseText;
      var startIndex = rString.indexOf("of about <b>") + 12;
      var countString = rString.slice(startIndex, rString.indexOf("</b>", startIndex));

      if (startIndex > 11) {                       // don't call the function if the resposeText wasn't formmated as expected, otherwise you get garbage
	showPopularity(countString + ' sites link to here');
      } else if (rString.indexOf("of <b>") > 0) {  // special case for only one result
	showPopularity("1 site links to here");
      } else {                                     // otherwise, there were no results
	showPopularity("no sites link to here");
      }
    }
  });
}

function showPopularity(stringToShow) 
{
  var popularityDiv = new Element('div', {
    styles:
    {
      position: 'fixed',
      right: 0,
      bottom: 0,
      textAlign: 'left',
      backgroundColor: '#fff',
      borderLeft: '1px solid black',
      borderRight: '1px solid black',
      borderTop: '1px solid black',
      fontSize: 12,
      zIndex: 1000000
    }
  });
    
  var dataDiv = new Element('a', {
    text: stringToShow,
    href: searchURL,
    styles:
    {
      display: "block", 
      color: 'black',
      padding: 2,
      borderBottom: '1px solid black',
      textDecoration: 'none'
    }
  }); 
  popularityDiv.grab(dataDiv);                 // add the div with the data to the box
    
  $(document.body).grab(popularityDiv);        // add the entire thing to the document.body
}




