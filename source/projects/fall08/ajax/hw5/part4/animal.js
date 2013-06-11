var gSelectedAnimal = null;

var Animal = new Class({
  initialize : function(id, name, _startx, _starty)
  {
    // if no initial position values, randomize
    var startx = _startx || (Math.random() * 800).round();
    var starty = _starty || (Math.random() * 400).round();

    // if there is no id this is a new animal, let the server know
    if(!id)
    {
      // generate a random ID
      this.id = (Math.random() * 100000).round();

      if (document.getElementById("animalName").value == document.getElementById("animalName").defaultValue) {
		this.name = "<br><br>" + this.id;
      } else {
		this.name = "<br><br>" + document.getElementById("animalName").value;
	  }
      console.log("creating new animal " + this.name);

      var req = new Request({
        url: 'animal.php5', 
        method: 'get',
        data: 
        { 
          action: 'add', 
          id: this.id, 
          type: this.type, 
          location: startx + ',' + starty,
		  name: this.name
        }
      }).send();
    } else {
	    this.id = id;
	
		if (name == "") {
			this.name = "<br><br>" + this.id;
		} else {
			this.name = name;
		}
	}
	
    // create the div to hold the picture of the animal
    this.element = new Element( 'div', {
      'class' : 'Animal',
	  'html' : this.name
    });

    // trigger update on drag stop
    this.element.makeDraggable( {
      onComplete : function()
      {
        // update the server about the new position
        var req = new Request({
          url: 'animal.php5',
          method : 'get',
          data : $merge({ action : 'update' }, this.getData())
        }).send();
      }.bind(this)
    });
    
    // Listen for clicks
    this.element.addEvent('click', function( e ) { 
      if( gSelectedAnimal)
      {
        gSelectedAnimal.deselect();
      }
      gSelectedAnimal = this;
      gSelectedAnimal.select();
    }.bind(this));
    
    // starting position
    this.element.setStyles( {
      left : (startx).toInt(),
      top : (starty).toInt()
    });

    // add the element to the page
    this.element.injectInside(document.body);
  },
  
  /*
    Select the animal
  */
  select: function()
  {
    this.element.addClass( 'Selected' );

    // adjust for border
    var pos = this.element.getPosition();
    this.element.setStyles({
      left: pos.x-1,
      top: pos.y-1
    });
  },
  
  /*
    Deselect the animal
  */
  deselect: function()
  {
    this.element.removeClass( 'Selected' );
    
    // adjust for border
    var pos = this.element.getPosition();
    this.element.setStyles({
      left: pos.x + 1,
      top: pos.y + 1
    });
  },
  
  /*
    Return the JSON data about this animal.
  */
  getData: function()
  {
    var loc = this.element.getPosition();
    
    var data = {
      id: this.id,
      type: this.type,
      location: loc.x + ',' + loc.y,
      name: this.name
    };
    
    console.log( data );
    
    return data;
  },
  
  /*
    Delete!
  */
  remove: function()
  {
    if(gSelectedAnimal == this)
    {
      gSelectedAnimal = null;
    }

    // take the element of the page
    this.element.dispose();
    // remove reference to the element
    delete this.element;

    console.log("Delete!");
    var req = new Request({
      url: 'animal.php5', 
      method: 'get',
      data: 
      { 
        action: 'delete', 
        id: this.id 
      }
    }).send();
    
    // clean up!
    delete this;
  }
});

/*
  Bonk Class
*/
var Bonk = new Class({
  Extends: Animal,
  
  initialize : function(id, name, startx, starty)
  {
    this.type = 'bonk';
    this.parent(id, name, startx, starty);
    this.element.addClass('Bonk');
  }
});

/*
  Zonk Class
*/
var Zonk = new Class({
  Extends: Animal,
  
  initialize : function(id, name, startx, starty)
  {
    this.type = 'zonk';
    this.parent(id, name, startx, starty);
    this.element.addClass('Zonk');
  }
});

/*
  Intialize the Animals app
*/
function init()
{
  document.getElementById("animalName").value = document.getElementById("animalName").defaultValue;
  
  // set up handlers for the two buttons
  $('addBonk').addEvent('click', function(e) { 
    new Bonk();
  });
  
  $('addZonk').addEvent('click', function(e) { 
    new Zonk();
  });
  
  // load the current animals
  console.log('Grabbing animals');
  var req = new Request({
    url: 'animal.php5',
    method: 'get',
    data: 
    { 
      action: 'load' 
    },
    
    onFailure: function()
    {
      console.log('Failed to retrieve animals from database');
    },
    
    onSuccess: function(response)
    {
      // parse the returned json array
      var json = JSON.decode(response);
      
      console.log(json);
      
      // go through each object in the returned array
      json.each(function(anAnimal) {

        // split the location string into x and y components
        var pos = anAnimal.location.split(',');
        
        // call constructor depending on type
        if(anAnimal.type == ['bonk'])
        {
          new Bonk(anAnimal.id, anAnimal.name, pos[0], pos[1]);
        }
        else if(anAnimal.type == ['zonk'])
        {
          new Zonk(anAnimal.id, anAnimal.name, pos[0], pos[1]);
        }
      });
      
    }
  }).send();
  
  // listen for the 'd' key to see if we should delete an animal
  window.addEvent( 'keyup', function(e) { 
    var evt = new Event(e);

    if(evt.key == 'd' && gSelectedAnimal)
    {
      gSelectedAnimal.remove();
    }
  });
}