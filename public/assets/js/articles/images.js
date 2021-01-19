$(document).ready(function() {

	function findGetParameter(name) {
		name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    	var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    	var results = regex.exec(location.search);
    	return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
	}

	$('#gallery').justifiedGallery({
		rowHeight: 250,
		randomize: true,
		cssAnimation: true,
		margins: 10
	});

	$('#gallery').justifiedGallery({
		rowHeight: 250,
		randomize: true,
		cssAnimation: true,
		margins: 10
	});

	$("#gallery").lightGallery();

	var gallery = $('#gallery');

	function getImages() {
		var page = $('#gallery').data('next-page');
		if(page !== null){
			clearTimeout($.data(this, 'scrollCheck'));

			$.data(this, 'scrollCheck', setTimeout(function() {
				$.get(page, function(response){
					response.data.forEach(function(image){
						var slide = '<a href="' + window.location.origin + image.path + '"> <img alt="' +  image.caption
						+ '" src="' + window.location.origin + image.path + '"/> </a>';
						gallery.append(slide);
					});
					gallery.justifiedGallery('norewind').on('jg.complete', function () {
						gallery.data('lightGallery').destroy(true);
						$('#gallery').lightGallery();
					});
					gallery.data('next-page', response.next_page_url);
				});
			}, 1000));
		}
	}

	$('#searchImages').click(function() {
		gallery.data('next-page', $('#searchImages').data('path') + '/' + $('#searchImageInput').val());
		gallery.data('lightGallery').destroy(true);
		gallery.justifiedGallery('destroy')
		gallery.empty();
		$('#gallery').justifiedGallery({
			rowHeight: 250,
			randomize: true,
			cssAnimation: true,
			margins: 10
		});

		$("#gallery").lightGallery();
		getImages();
	});

	$('#gallery').scrollex({
		mode: 'bottom',
		bottom: 500,
		enter: function(){
			getImages();
		},

		leave: function(){

		}
	});

	if(findGetParameter('tag') !== null) {
		$('#searchImageInput').val(findGetParameter('tag'));
		$('#searchImages').click();
	}
	else {
		getImages();
	}
});
