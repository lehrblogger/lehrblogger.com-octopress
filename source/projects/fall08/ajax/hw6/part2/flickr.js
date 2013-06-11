function flickrCall()
{
  // empty out the photos div
  $('photos').empty();

  var category = 'category2';
  var project = 'project1';
  var image = 'image1';

  var tags = category + ',' + project + ',' + image;
  var tag_mode = 'all'


  // set up the flickr API call
  var url = '&tags=' + tags + '&tag_mode=' + tag_mode;
  
  // have to escape the url to store it as a parameter to the server
  var query = escape(url);

  var req = new Request({ 
    url: 'imageProxy.php/?tag_info=' + query,
    method: 'get',
    onComplete : function( response )
    {
      JSON.decode(response);
    }
  }).send();
}

// we need this, we could unwrap that part if we wanted
function jsonFlickrApi(data) 
{
  console.log(data);
  var photos = data.photos.photo;
  var firstPhoto = photos[0];


  var imageAsset = new Asset.image('http://farm' + photos[0].farm + '.static.flickr.com/' + photos[0].server + '/' + photos[0].id + '_' + photos[0].secret + '.jpg');
  imageAsset.injectInside($('photos'));
}

function init() 
{
  flickrCall();
}