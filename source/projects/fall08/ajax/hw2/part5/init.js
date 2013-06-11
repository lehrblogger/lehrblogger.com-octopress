window.addEvent('domready', init);

var cancelRotate = false;

function init()
{
  $('resize').makeResizable({
    handle: $('handle')
  });
}
