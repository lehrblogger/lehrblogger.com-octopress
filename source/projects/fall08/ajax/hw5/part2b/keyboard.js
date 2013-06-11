/*
 * Sorry for the lack of thorough commenting here - it's late, and I'm just going to be making a lot of changes tomorrow.
 */
var rowArray = new Array(new Array("Q", "W", "E", "R", "T", "Y", "U", "I", "O", "P"),
				         new Array("A", "S", "D", "F", "G", "H", "J", "K", "L"),
			 	         new Array("Z", "X", "C", "V", "B", "N", "M")
			   )
var allKeyObjects = new Array();

var currentKey = rowArray[0][0];
var currentZoomLevel = 0;

var keySize;
var keyBuffer;

function init() {	
	updateCurrentKeysize();		// updates keyBuffer size, I'll get rid of this later
	addKeyObjects();			// make all the key objects
	addKeyEvents();				// add the events for the keyboard
	
	// will eventually be a spacebar listener
	window.addEvent( 'keydown', function(e) {
     	var evt = new Event(e);
      	if(evt.key == '1') { // FIX THIS	
			decrementCurrentZoomLevel();
			for (var i = 0; i < allKeyObjects.length; i++) {
				allKeyObjects[i].updateSize(getSizeFromZoomLevel());
				allKeyObjects[i].updateLoc(0, 0);
			}
      	}
    });
}
function addKeyObjects() {
	for (var i = 0; i < rowArray.length; i++) {
		for (var j = 0; j < rowArray[i].length; j++) {
			allKeyObjects.push(new Key(rowArray[i][j], i, j, keyBuffer, keyBuffer));
			// keep track of all the key objects, but this also adds them to the screen
		}
	}	
}
function addKeyEvents() {
	for (var i = 0; i < rowArray.length; i++) {
		for (var j = 0; j < rowArray[i].length; j++) {
			window.addEvent( 'keydown', function(e) {
		     	var evt = new Event(e);
		      	if(evt.key == this.toLowerCase()) {
					zoomInOnKey(evt.key);
		      	}
		    }.bind(rowArray[i][j]));	// be sure to bind it to each letter so it can actually check what was pressed
		}
	}
}

// zooms in on one key
function zoomInOnKey(letter) {
	incrementCurrentZoomLevel();	// don't zoom in too much
	console.log(letter + " " + getSizeFromZoomLevel());
	
	// find the key object we are zooming on
	var target;
	for (var i = 0; i < allKeyObjects.length; i++) {
		if (allKeyObjects[i].letter.toLowerCase() == letter) {
			target = allKeyObjects[i];
		} 
	}
	
	// calculate how far all the keys have to move
	var offsetX = target.buffer - target.element.getStyle('left').toInt(); //otherwise they change
	var offsetY = target.buffer - target.element.getStyle('top').toInt();
	console.log(offsetX + " " + offsetY);
	
	// and move them all - note that target will change, and that is why we needed to store its values before
	for (var i = 0; i < allKeyObjects.length; i++) {
		allKeyObjects[i].updateSize(getSizeFromZoomLevel());
		allKeyObjects[i].updateLoc(offsetX, offsetY);
	}
}

// to keep track of the data for a single key object
var Key = new Class ( 
{
	initialize: function (letter, row, col, originX, originY) {
		this.letter = letter;
		this.row = row;
		this.col = col;
		this.originX = originX;
		this.originY = originY;
		
		// create the actual div
		this.element = new Element('div', {
			'id':this.letter,
			'html':this.letter
		});
		
		// listen for clicks
	    this.element.addEvent('click', function( e ) {
			zoomInOnKey(this.letter.toLowerCase());
	    }.bind(this));
	
		this.element.addClass('key');
		this.updateSize('keySmall');
		this.updateLoc(0, 0);
		document.body.grab(this.element);
	},
	
	// updates the key's location using CSS left and top properites, based on its origin and location in the keyboard
	updateLoc: function(offsetX, offsetY) {
	 	this.originX += offsetX;
	  	this.originY += offsetY;
		this.element.setStyle('left', this.originX + ((this.size + this.buffer) * this.col));
		this.element.setStyle('top', this.originY + ((this.size + this.buffer) * this.row));
	},
	
	// updates the size to the specified class, and the associated convenience variables
 	updateSize: function(newSize) {
		this.element.removeClass('keySmall');
		this.element.removeClass('keyMedium');
		this.element.removeClass('keyLarge');
		this.element.removeClass('keyImage');

		this.element.addClass(newSize);
		this.size = this.element.getStyle('width').toInt();
		this.buffer = this.size / 5;
	}
});


// you can only zoom in and out so many times, and this is currently disabled because of a couple of bugs
function incrementCurrentZoomLevel() {
	//currentZoomLevel += 1;
	if (currentZoomLevel > 3) {	currentZoomLevel = 3; }
}
function decrementCurrentZoomLevel() {
	currentZoomLevel -= 1;
	if (currentZoomLevel < 0) {	currentZoomLevel = 0; }
}

// a couple utility functions for handling zooming
function getSizeFromZoomLevel() {
	var rt = 'keySmall';
	if (currentZoomLevel == 3) {
		rt = 'keyImage';
	} else if (currentZoomLevel == 2) {
		rt = 'keyLarge';
	} else if (currentZoomLevel == 1) {
		rt = 'keyMedium';
	}
	
	return rt;
}
function updateCurrentKeysize() {
	var curClass = getSizeFromZoomLevel();
	
	var tempElem = new Element('div', {
		'class': curClass
	});
	
	keySize = tempElem.getStyle('width').toInt();
	keyBuffer = keySize / 5;
	
	tempElem.removeClass(curClass);
	delete tempElem;
}




