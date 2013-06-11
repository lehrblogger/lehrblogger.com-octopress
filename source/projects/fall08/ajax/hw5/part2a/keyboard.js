var keySize = 72;
var keyBuffer = 14;

var rowOne   = new Array("Q", "W", "E", "R", "T", "Y", "U", "I", "O", "P");
var rowTwo   = new Array("A", "S", "D", "F", "G", "H", "J", "K", "L");
var rowThree = new Array("Z", "X", "C", "V", "B", "N", "M", ",");

function init() {	
	drawRow(rowOne  , keyBuffer              , keyBuffer                            );
	drawRow(rowTwo  , keyBuffer + keySize / 2, keyBuffer + (keySize + keyBuffer)    ); 
	drawRow(rowThree, keyBuffer + keySize    , keyBuffer + (keySize + keyBuffer) * 2);
}

var Key = new Class ( 
{
	initialize: function (letter, type, xLoc, yLoc) {
		this.letter = letter;
		this.class = type;
		this.xLoc = xLoc;
		this.yLoc = yLoc;
		var canvas = document.getElementById( 'keyboard' );
		var context = canvas.getContext( "2d" )

	    drawKey(canvas, context, this.letter, this.xLoc, this.yLoc);
	}
});


function drawRow(keyArray, xLoc, yLoc) {
	for (var i = 0; i < keyArray.length; i++) {
		new Key(keyArray[i], 'key', xLoc + (keySize + keyBuffer) * i, yLoc);
	}
}


/*
function drawCanvasOne( elemID )
{
  // get a reference to the canvas element
  var canvas = document.getElementById( elemID );
  var context = canvas.getContext( "2d" )
  drawKey(canvas, context);
}

function drawCanvasTwo( elemID ) 
{
  var canvas = document.getElementById( elemID );
  var context = canvas.getContext( "2d" )
  context.scale(0.5, 0.5);
  drawKey(canvas, context);
}

function drawCanvasThree( elemID ) 
{
  // get a reference to the canvas element
  var canvas = document.getElementById( elemID );
  var context = canvas.getContext( "2d" )
  var factor = 0.5
  context.translate(canvas.width/2 - (canvas.width * factor / 2), canvas.height/2 - (canvas.height * factor / 2));
  context.scale(factor, factor);
  drawKey(canvas, context);
}

// do some animation
function drawCanvasFour( elemID ) 
{
  // get a reference to the canvas element
  var canvas = document.getElementById( elemID );
  var context = canvas.getContext( "2d" )

  var factorIncrement = 0.05;
  var factorMax = 1.0 - factorIncrement;
  var factorMin = 0.1 + factorIncrement;
  var factor = 1;
  var growing = false;

  function animate()
  {
    // context.scale(1 / factor, 1 / factor);
    context.fillStyle = "#FFFFFF";
    context.clearRect( 0, 0, canvas.width, canvas.height );

	if (growing) {
      factor += factorIncrement;
      if (factor > factorMax) 
        growing = false;
	} else {
      factor -= factorIncrement;
      if (factor < factorMin)
        growing = true;
	}
	
	context.save();
    context.translate(canvas.width/2 - (canvas.width * factor / 2), canvas.height/2 - (canvas.height * factor / 2));
    context.scale(factor, factor);
    drawKey(canvas, context);
	context.restore();
	
    setTimeout( animate, 41 );
  }

  setTimeout( animate, 41 );
}
*/
function drawKey(canvas, context, letter, xLoc, yLoc)
{
	context.strokeStyle = "rgba( 0, 0, 0, 1.0 )";
	context.fillStyle = "rgba( 50, 50, 50, 1 )";
	context.lineWidth = 4;
	context.lineCap = "round";
	context.lineJoin = "round";
	
	context.beginPath();
	context.moveTo( xLoc          , yLoc           );
	context.lineTo( xLoc + keySize, yLoc           );
	context.lineTo( xLoc + keySize, yLoc + keySize );
	context.lineTo( xLoc          , yLoc + keySize );
	context.closePath();
	
	context.fill();
	context.stroke();
}