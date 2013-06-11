/*  Globl variables - initialize these later  */
var global_default_image = 'default.jpg';
var global_num_rows;
var global_num_cols;
var global_cats_array;
var global_load_count;
var global_flipped_tiles;
var global_flip_count;

/*  Utility functions  */
function random(lowerBound, upperBound) { //http://webremix.org/labs/
  return Math.floor(Math.random() * (upperBound - lowerBound)) + lowerBound;
}
Array.prototype.randomize = function(obj) { //some recursion for fun!
  if (this.length > 1) {
    var removed_elem = this.splice(random(0, this.length), 1)[0];
    this.randomize();
    this.push(removed_elem);
  }
}
Array.prototype.contains = function(obj) {  //http://stackoverflow.com/questions/237104/javascript-array-containsobj
  var i = this.length;
  while (i--) {
    if (this[i] === obj) {
      return true;
    }
  }
  return false;
}
Array.prototype.count_num_of_these = function(obj) {
  // i needed a way to see how many times an object was in an array
  // technically contains() could just use this and return false if not 0, but it would be slower
  var count = 0;
  var i = this.length;
  while (i--) {
    if (this[i] === obj) {
      count++;
    }
  }
  return count;
}
Array.prototype.remove_obj = function(obj) { 
  // remove an object from the array that === matches the one passed
  var i = this.length;
  while (i--) {
    if (this[i] === obj) {
      this.splice(i, 1);
    }
  }
}
function isInteger (s) {//http://acmesoffware.com/acme/default.asp
   function isEmpty(s)
   {
      return ((s == null) || (s.length == 0))
   }
   function isDigit (c)
   {
      return ((c >= "0") && (c <= "9"))
   }
   var i;

   if (isEmpty(s))
   if (isInteger.arguments.length == 1) return 0;
   else return (isInteger.arguments[1] == true);

   for (i = 0; i < s.length; i++)
   {
      var c = s.charAt(i);

      if (!isDigit(c)) return false;
   }

   return true;
}

/*  Randomly choose some cats and use JS Image objects to start loading them  */
function chooseAndLoadCats(num_cats) {
  cats_array = [];  
  while (cats_array.length < num_cats * 2) {
    new_cat = random(900,1250);
    if (!cats_array.contains(new_cat)) {
      cats_array.push(new_cat);                       // store each cat twice!
      cats_array.push(new_cat);
    }
  }
  for (var i = 0; i < cats_array.length; i = i + 2) { // go by twos to not create duplicate Image objects
    tempImage = new Image();
    tempImage.onLoad = writeTableIfLoaded();          // check to see if this is the last image that we need to load
    tempImage.src = 'http://lolcat.com/images/lolcats/' + cats_array[i] + '.jpg';
    cats_array[i] = tempImage;
    cats_array[i + 1] = tempImage;
  }
  cats_array.randomize();
  
  return cats_array;
}

/*  Write the table to the proper div with the default image */
function writeTable(num_rows, num_cols, cats_array) {
  var table = document.getElementById('game_table');
  var table_string = '<table>';
  for (var i = 0; i < num_rows; i++) {
    table_string += '<tr>';
    for (var j = 0; j < num_cols; j++) {
      table_string += '<td>';
      table_string += '<img id=' + i + '_' + j + ' class="tile" src="' + global_default_image
      table_string += '" onClick="flipTile(' + i + ',' + j + ')">';
      table_string += '</td>';
    }
    table_string += '</tr>';
  }
  table_string += '</table>';
  table.innerHTML = table_string;
}

/*  Sets the text of the div with the score - if it's an integer prepends 'flip count', otherwise uses whole string  */
function setScoreDiv(count) {
  var score = document.getElementById('game_score');
  if (isInteger(count)) {
    score.innerHTML = 'flip count: ' + global_flip_count;
  } else {
    score.innerHTML = count;
  }
}
 
/*  Handles game logic, gets called whenever a tile is clicked by the DOM event  */
function flipTile(row, col) {
  var tile = document.getElementById(row + "_" + col);
  var cat_url = global_cats_array[(row * global_num_cols) + col].src;   // the url of the current tile
  
  if (tile.getAttribute('src') != cat_url) {                            // check to make sure it isn't already flipped
    global_flip_count++;                                                // increment and set the score
    setScoreDiv(global_flip_count);
    
    tile.setAttribute('src', cat_url);                                  // flip the image and add the border
    tile.setAttribute('class', 'tile active');
    
    if (global_flipped_tiles.contains(cat_url)) {                       // if that tile's pair is flipped already, then match!
      global_flipped_tiles.push(cat_url);                               // we still want it in the array
      tile.setAttribute('class', 'tile');
      
      if (global_cats_array.length == global_flipped_tiles.length) {    // so that we can detect the win condition
        setScoreDiv("Congrats! You paired all of the cats with only " + global_flip_count + " flips!")
      }
    } else {                                                            // otherwise there's no match
      global_flipped_tiles.push(cat_url);                               // so store that this tile is flipped
      setTimeout(function() {                                           // and set a timeout to flip it back
        if (global_flipped_tiles.count_num_of_these(cat_url) < 2) {     // but only actually do the flip back if it's pair has
          tile.setAttribute('src', global_default_image);               // not been flipped in the interim
          global_flipped_tiles.remove_obj(cat_url);
        }
        tile.setAttribute('class', 'tile');
      }, 500);
    }
  }
}

/*  Checks to see if all of the images have loaded, and draws the table if it's ready  */
function writeTableIfLoaded() {
  global_load_count++;
  //console.log(global_load_count)
  if (global_load_count == (global_num_rows * global_num_cols / 2) + 1) {
    //console.log("done!")
    writeTable(global_num_rows, global_num_cols, global_cats_array);
    setScoreDiv(0);
  }
}

/*  Initialize global variables back to empty and draw a new table  */
function newGame() {
  global_num_rows = document.getElementById('num_rows').value;
  global_num_cols = document.getElementById('num_cols').value;
  
  if ((global_num_rows * global_num_cols % 2) == 1) {
    setScoreDiv("Board must have an even number of tiles!");
  } else {
    global_cats_array = [];
    global_load_count = 0;
    global_flipped_tiles = [];
    global_flip_count = 0;
  
    var defaultImage = new Image()
    defaultImage.src = global_default_image;
    defaultImage.onLoad = writeTableIfLoaded();
    global_cats_array = chooseAndLoadCats(global_num_rows * global_num_cols / 2);
  }
}