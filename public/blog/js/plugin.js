$(document).ready(
function() {
  //nice scroll
   $("html").niceScroll();
   $("#scroll").niceScroll();
   $(".media-table").niceScroll();
   
   //flickr feed 
   $('#basicuse').jflickrfeed({
	limit: 12,
	qstrings: {
		id: '52617155@N08'
	},
	itemTemplate: 
	'<li>' +
		'<a href="{{image_b}}"><img src="{{image_s}}" alt="{{title}}" /></a>' +
	'</li>'
  });
}
);