window.addEvent('domready', init);

var cancelRotate = false;

function init()
{
  // Create each element and add the appropriate classes
  var one = new Element('div', {
      'id':    'one', 
      'class': 'box top left'
  });

  var two = new Element('div', {
      'id':    'two', 
      'class': 'box top right'
  });

  var three = new Element('div', {
      'id':    'three', 
      'class': 'box bottom left'
  });

  var four = new Element('div', {
      'id':    'four', 
      'class': 'box bottom right'
  });

  //Put text in each element
  one.appendChild(document.createTextNode('First'));
  two.appendChild(document.createTextNode('Second'));
  three.appendChild(document.createTextNode('Third'));
  four.appendChild(document.createTextNode('Fourth'));

  //And them to the DOM
  document.body.appendChild(one);
  document.body.appendChild(two);
  document.body.appendChild(three);
  document.body.appendChild(four);

}
