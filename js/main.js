/*require.config({
	"baseUrl": "<%= conf.get('contentDir') %>/themes/<%= conf.get('themeDir') %>/js",
	"paths": {
		"jquery": "vendor/jquery/jquery"
	}
});

require(['jquery'], function($) {
	console.log('Working!!');
});
*/



jQuery(function($){


	// BROCKERS
	var brockers_list = $('#brockers ul.graph');
	if( brockers_list.children().length ){
		brockers_list.find('.percentage_holder').each( function(_index, _target){
			var target = $(_target);
			target.find('span').css('width', target.attr('data-percentage') + "%");
		} );
	}



	

	////////////////////////////////////////////////////////
	/// IS ELEMENT WHITIN THE VISIBLE WINDOW AREA?
	////////////////////////////////////////////////////////
	function formatThumbnails(){
		$('.image_holder').each(function(_index, _target){
			var target = $(this);
			var holder_ratio = target.width() / target.height();

			var image = target.find('img');
			//image.load(function(){
				//console.log($(this))
				var image_ratio = image.width()/image.height(); 
				var image_class = image_ratio <= holder_ratio ? 'horizontal' : 'vertical';
				image.removeClass('vertical horizontal').addClass(image_class);
			//});
			
		});
	}
	formatThumbnails();



	////////////////////////////////////////////////////////
	/// WINDOW ON RESIZE
	////////////////////////////////////////////////////////
	$(window).resize(onResize);
	function onResize(){
		formatThumbnails();
	}



	////////////////////////////////////////////////////////
	/// SAVE THE DATE
	////////////////////////////////////////////////////////
	var event_index = 0;
	$("ul.events").data('index', 0);
	function showEvent(){
		// Event list
		var events_list = $("ul.events");
		events_list.each(function(_index, _target){
			var target = $(_target);


			//eval
			if(target.data('index') > target.find("li").length-1){
				target.data('index', 0);
			}
		

			// Animate item
			var event = target.find("li:eq("+ target.data('index') +")");
			event.removeClass('slideOut slideIn').addClass('slideIn');

			// Resize Events List
			target.height(event.height() );


			// Delay for next iteration
			setTimeout(function(){
				target.find("li").removeClass('slideOut slideIn');
				event.addClass('slideOut');
			}, 5000);


			// Update event index
			var newIndex = target.data('index')+1;
			target.data('index', newIndex);
		});




		// Delay for next iteration
		setTimeout(function(){
			showEvent();
		}, 5000);
	}
	showEvent();





	////////////////////////////////////////////////////////
	/// HOME VIDEO
	////////////////////////////////////////////////////////
	if( window.yt_video_ID !== undefined ){
		// Create/Add Youtube API Scripts
		var yt_tag = document.createElement('script');
		yt_tag.src = "https://www.youtube.com/iframe_api";
		var firstScriptTag = document.getElementsByTagName('script')[0];
		firstScriptTag.parentNode.insertBefore(yt_tag, firstScriptTag);

		// Create Youtube Dynamic Player
		var yt_dynamic_player;
		window.onYouTubeIframeAPIReady = function() {
			// Init Object
			yt_dynamic_player = new YT.Player('yt_dynamic_player', {
			  // Player Properties
			  autoplay : 0,
			  height: '390',
			  width: '640',
			  videoId: window.yt_video_ID,

			  // Player Events
			  events: {
			    //'onReady': onPlayerReady,
			  }
			});
		};
	}






	/////////////////////////////////////////////////////////////
	// PAGINATION & LATEST / MOS VIEWS AJAX TABS
	/////////////////////////////////////////////////////////////
	/// TABS FILTERS
	$(".latest_holder ul.filters a.tab").click(function(){
		// BUTTON STYLE
		$(".latest_holder ul.filters a.tab").parent().removeClass('active');
		$(this).parent().addClass('active');

		if($(this).data('type') == 'category'){
			// SUBMENU STYLE
			$(".latest_holder ul.filters ul.submenu").show();
			$(".latest_holder ul.filters ul.submenu a").removeClass('active');
			$(".latest_holder ul.filters ul.submenu li:eq(0) a").addClass('active');

			// AJAX CALL
			loadFilteredContent('periodismo', $(".latest_holder ul.results"));

		} else {
			$(".latest_holder ul.filters ul.submenu").hide();

			// AJAX CALL
			loadFilteredContent('', $(".latest_holder ul#latest"));
		}


		return false;
	});

	$(".latest_holder ul.filters ul.submenu a").click(function(){
		// BUTTON STYLE
		$(".latest_holder ul.filters ul.submenu a").removeClass('active');
		$(this).addClass('active');

		// AJAX CALL
		loadFilteredContent($(this).data('category'), $(".latest_holder ul#latest"));

		return false;
	});

	function loadFilteredContent(_type, _container){
		// Params
		var sort_pagination_type = _type;
		var ajax_container = _container;


		// Erease content
		_container.html('');

		// Show Preloader
		_container.addClass('preloader');
			

		// Ajax Call
		$.ajax({
			url: base_reference.ajaxurl,
			type: 'post',
			data: {
				action: base_reference.action,
				category: sort_pagination_type
			},
			success: function( result ) {

				//remove preloader icon
				_container.removeClass('preloader');


				// Update HTML
				//position scroll on first element
				$.scrollTo( $(".latest_holder ul.filters"), 360, {easing: 'easeInOutQuad' });
				ajax_container.html(result.content);

				// Setup Buttons and Image ratios
				formatThumbnails();

				// Show posts
				// ajax_container.find('li').each(function(_index){
				// 	$(this).stop().hide().delay(_index * 120).fadeIn(420);
				// });
				
			}
		});
	}

	// AJAX CALL
	loadFilteredContent('periodismo', $(".latest_holder ul#latest"));






	/////////////////////////////////////////////////////////////
	// FANCYBOX / MODULAR WINDOWS
	/////////////////////////////////////////////////////////////
	$(".fancybox").fancybox({
		padding: 0,
		margin: 0,
	});




});



/////////////////////////////////////////////////////////////
// SOCIAL SHARE
/////////////////////////////////////////////////////////////
function socialShare(id, urlpost, titles){
	//properties
	var source = urlpost;
	var url="";
	
	
	//Choose Social Network
	switch(id){
		case 'facebook':
			url = 'https://www.facebook.com/sharer/sharer.php?u=' + source;
			break;
			
		case 'twitter':
			title = encodeURIComponent(titles);
			url = 'https://twitter.com/intent/tweet?text='+title+'&url='+source;
			break;
			
		default:
			break;
	}
	
	
	//Pop up settings
	var w = 500;
	var h = 250;
	var left = (screen.width/2)-(w/2);
	var top = (screen.height/2)-(h/2);
	
	//open popup
	myWindow = window.open (url, 'win_share','width='+w+',height='+h+', top='+top+', left='+left);

	//
	return false;
};