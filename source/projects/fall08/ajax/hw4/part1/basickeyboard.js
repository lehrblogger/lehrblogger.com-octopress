var keySize = 72;
var keyBuffer = 14;

var rowOne   = new Array("Q", "W", "E", "R", "T", "Y", "U", "I", "O", "P");
var rowTwo   = new Array("A", "S", "D", "F", "G", "H", "J", "K", "L");
var rowThree = new Array("Z", "X", "C", "V", "B", "N", "M", ",");

var Key = new Class ( 
{
	initialize: function (letter, type, xLoc, yLoc) {
		this.letter = letter;
		this.class = type;
		this.xLoc = xLoc;
		this.yLoc = yLoc;
		
		this.element = new Element('div', {
			'id':this.letter,
			'html':this.letter,
			'class':this.class
		});
		
		this.element.setStyle('left', this.xLoc);
		this.element.setStyle('top', this.yLoc);
		this.element.setStyle('width', keySize);
		this.element.setStyle('height', keySize);
		document.body.grab(this.element);
	}
});

function init() {	
	drawRow(rowOne  , keyBuffer              , keyBuffer                            );
	drawRow(rowTwo  , keyBuffer + keySize / 4, keyBuffer + (keySize + keyBuffer)    ); 
	drawRow(rowThree, keyBuffer + keySize    , keyBuffer + (keySize + keyBuffer) * 2);
}

function drawRow(keyArray, xLoc, yLoc) {
	for (var i = 0; i < keyArray.length; i++) {
		new Key(keyArray[i], 'key', xLoc + (keySize + keyBuffer) * i, yLoc);
	}
}