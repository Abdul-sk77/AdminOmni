$(document).ready(function() {
	$('.panel-latest').matchHeight();

	$('#gallery').justifiedGallery({
		rowHeight: 175,
		randomize: true,
		cssAnimation: true,
		margins: 10
	});

	$('#gallery').lightGallery({
		selector: '.item'
	});

	$('#vgallery').justifiedGallery({
		rowHeight: 175,
		randomize: true,
		cssAnimation: true,
		margins: 10
	});
});
