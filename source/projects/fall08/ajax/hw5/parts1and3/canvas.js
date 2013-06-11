function init()
{
  drawCanvasOne( "canvas1" );
  drawCanvasTwo( "canvas2" );
  drawCanvasThree( "canvas3" );
  drawCanvasFour( "canvas4" );
}

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

function drawKey(canvas, context)
{
	context.strokeStyle = "rgba( 0, 0, 0, 1.0 )";
	context.fillStyle = "rgba( 50, 50, 50, 1 )";
	context.lineWidth = 10;
	context.lineCap = "round";
	context.lineJoin = "round";
	
	context.beginPath();
	context.moveTo( 10, 10 );
	context.lineTo( canvas.width - 10, 10 );
	context.lineTo( canvas.width - 10, canvas.height - 10 );
	context.lineTo( 10, canvas.height - 10 );
	context.closePath();
	
	context.fill();
	context.stroke();
}
