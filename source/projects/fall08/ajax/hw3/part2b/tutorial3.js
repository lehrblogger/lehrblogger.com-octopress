window.addEvent('domready', init);

var munchkinArray = new Array();  // an array of munchkins

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

    // info needded for dancing
    this.onLeftFoot = true;
    this.beat = json.beat;
    this.readyToDance = 0;
  },

  // moves left if it just moved right, moves right if it just moved left (for both name and image)
  dance: function() {
    if (this.onLeftFoot) {
      
      this.element.setStyles( {
	left : (this.element.getStyle('left').toInt() + 5)
      } );

      this.name.setStyles( {
	left : (this.name.getStyle('left').toInt() + 5)
      } );

      this.onLeftFoot = false;
    } else {

      this.element.setStyles( {
	left : (this.element.getStyle('left').toInt() - 5)
      } );

      this.name.setStyles( {
	left : (this.name.getStyle('left').toInt() - 5)
      } );
      this.onLeftFoot = true;
    }
  },

  // dances once every time interval, with the time interval unique to each munchkin, randomly generated in the php
  danceToBeat: function() {
      this.readyToDance = this.readyToDance + 50;          // keep track of how long its been
      
      if (this.readyToDance > this.beat) {                 // dance if the munchkin has waited long enough
	this.readyToDance = this.readyToDance - this.beat; // and push back the counter
	this.dance();
      }
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
          munchkinArray.push( new BobMunchkin( x ) );
        }
        else if( x.type == 'bill' )
        {
          munchkinArray.push( new BillMunchkin( x ) );
        }
      });
    },
    
    onFailure : function( response )
    {
      console.error( 'Request failed.' );
    }
    
  }).send();

}


function danceOnce()
{
   munchkinArray.each(function(item){ 
       item.danceToBeat();
   });
   
   window.setTimeout("danceOnce();", 50);   // THIS IS BAD I am recursively calling an infinite stack of this function,
                                            // but the delay should prevent a stack overflow, and this is a good-enough solution for now
}

window.setTimeout("danceOnce();", 1000);
