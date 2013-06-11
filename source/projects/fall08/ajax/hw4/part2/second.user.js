// ==UserScript==
// @name           Second
// @namespace      http://www.yourdomain.org/
// @description    A second GreaseMonkey script
// @include        *
// @require        http://formconstant.net/ajax/mootools-1.2-core.js
// @require        http://formconstant.net/ajax/mootools-1.2-more.js
// ==/UserScript==

// a more interesting userscript
if(self == top)
{
  var href = window.location.href;
  var myHistoryJSON = GM_getValue('myHistory', null);

  var myHistory;
  if(!myHistoryJSON)
  {
    console.log('no myHistory');
    myHistory = [];
  }
  else
  {
    console.log('adding to myHistory');
    myHistory = JSON.decode(myHistoryJSON);
  }

  console.log('checking');
  if(!myHistory.contains(href) && href.search('file://') == -1)
  {
    console.log('adding href to myHistory');
    myHistory.push(href);
    console.log(JSON.encode(myHistory));
    GM_setValue('myHistory', JSON.encode(myHistory));
  }

  // generate a list of outs
  if(myHistory.length > 0)
  {
    var myHistoryDiv = new Element('div', {
      styles:
      {
        position: 'fixed',
        right: 0,
        top: 0,
        textAlign: 'left',
        backgroundColor: '#fff',
        borderLeft: '1px solid black',
        borderRight: '1px solid black',
        borderTop: '1px solid black',
        fontSize: 12,
        zIndex: 1000000
      }
    });
    
    var clearDiv = new Element('a', {
      text: 'Clear links',
      styles:
      {
        display: "block", 
        color: 'black',
        padding: 2,
        borderBottom: '1px solid black',
        textDecoration: 'none'
      },
      events:
      {
        click: function(evt)
        {
          GM_setValue('myHistory', '[]');
          myHistoryDiv.dispose();
        }
      }
    });
    myHistoryDiv.grab(clearDiv);
    
    myHistory.each(function(ahref) {
      if(ahref.length > 35) ahref = ahref.substr(0, 32) + '...';
      var aLink = new Element('a', {
        text: ahref,
        href: ahref,
        styles:
        {
          display: "block", 
          color: 'black',
          padding: 2,
          borderBottom: '1px solid black',
          textDecoration: 'none'
        }
      });
      myHistoryDiv.grab(aLink);
    });
    $(document.body).grab(myHistoryDiv);
  }
}