window.addEvent('domready', init);

// Munchkin class
var Munchkin = new Class({
  initialize : function( json )
  {
    // Set the base CSS styles
    this.element = new Element( 'div' );
    this.element.addClass( 'Munchkin' );

    // set the position
    this.element.setStyles( {
      left : json.x,
      top : json.y
    } );
    
    // add a name
    this.name = new Element( 'div' );
    this.name.addClass( 'MunchkinLabel' );
    this.name.setStyles( {
      left : json.x,
      top : json.y - 10
    } );
    this.name.set('text', json.type);
    
    // add to the page
    this.element.injectInside( document.body );
    this.name.injectInside( document.body );
  }

});

// A Bob Munchkin
var BobMunchkin = new Class({
  Extends: Munchkin,
  
  initialize : function( json )
  {
    // call the super class initializer
    this.parent( json );

    // Add the CSS class for the Bob image
    this.element.addClass( 'Bob' );

    return this;
  }
});

// A Bill Munchkin
var BillMunchkin = new Class({
  Extends: Munchkin,
  
  initialize : function( json )
  {
    // call the super class initializer
    this.parent( json );
    
    // Add the CSS class for the Bill image
    this.element.addClass( 'Bill' );

    return this;
  }
});

// Where the work is done.
function init()
{
  var url = './tutorial3.php';
    // Make the request
  var req = new Request({

    url: url,
    method : 'get',
    
    onComplete : function( responseText, responseXml ) 
    {
      // create a real Javascript object from the string
      var json = $A( JSON.decode( responseText ) );
      
      console.log(json);
      
      // make a new munchkin depending on it's type
      json.each( function( x ) {
        if( x.type == 'bob' )
        {
          new BobMunchkin( x )
        }
        else if( x.type == 'bill' )
        {
          new BillMunchkin( x )
        }
      });
    },
    
    onFailure : function( response )
    {
      console.error( 'Request failed.' );
    }
    
  }).send();

}
