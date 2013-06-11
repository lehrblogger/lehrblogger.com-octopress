window.addEvent('domready', init);

var MyButton = new Class({
  initialize : function( elementId )
  {
    var start = 10;
    var end  = 210;
    this.element = $(elementId);
    
    console.log( this.element );
    
    this.element.addClass( 'UpperLeft' );
    this.element.addEvent( 'mousedown', function( e ) { 
      console.log( e );

      var myFx = new Fx.Tween(this.element);

      if (this.element.hasClass('UpperLeft')) {
	  myFx.start('left', start, end);
	  this.element.removeClass('UpperLeft');
	  this.element.addClass('UpperRight');

      } else if (this.element.hasClass('UpperRight')) {
	  myFx.start('top', start, end);
	  this.element.removeClass('UpperRight');
	  this.element.addClass('LowerRight');

      } else if (this.element.hasClass('LowerRight')) {
	  myFx.start('left', end, start);
	  this.element.removeClass('LowerRight');
	  this.element.addClass('LowerLeft');

      } else if (this.element.hasClass('LowerLeft')) {
	  myFx.start('top', end, start);
	  this.element.removeClass('LowerLeft');
	  this.element.addClass('UpperLeft');
      }
    }.bind( this ) );
  },
  
  doSomethingCool : function()
  {
    var output = $('output');
    output.set('text', 'Coooool!');
  }
});

window.addEvent( 'mouseover', function( e ) {
  console.log( "window mouse over" );
});

var aButton;
function init()
{
  aButton = new MyButton('aButton');
}
