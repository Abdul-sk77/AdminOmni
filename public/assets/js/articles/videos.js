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

    $("#gallery").lightGallery();

    var gallery = $('#gallery');

    function getVideos() {
        var page = $('#gallery').data('next-page');
        if (page !== null) {
            clearTimeout($.data(this, 'scrollCheck'));

            $.data(this, 'scrollCheck', setTimeout(function() {
                $.get(page, function(response) {
                    response.data.forEach(function(video) {
                        var slide = '<a href="' + video.path + '"> <img alt="' + video.caption +
                            '" src="' + 'https://img.youtube.com/vi/' + youtubeId(video.path) + '/mqdefault.jpg' + '"/> </a>';
                        gallery.append(slide);
                    });
                    gallery.justifiedGallery('norewind').on('jg.complete', function() {
                        gallery.data('lightGallery').destroy(true);
                        $('#gallery').lightGallery();
                    });
                    gallery.data('next-page', response.next_page_url);
                });
            }, 1000));
        }
    }

    $('#searchVideos').click(function() {
        gallery.data('next-page', $('#searchVideos').data('path') + '/' + $('#searchVideoInput').val());
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
        getVideos();
    });

    $('#gallery').scrollex({
        mode: 'bottom',
        bottom: 500,
        enter: function() {
            getVideos();
        },

        leave: function() {

        }
    });

    function youtubeId(url) {
        var ID = '';
        url = url.replace(/(>|<)/gi, '').split(/(vi\/|v=|\/v\/|youtu\.be\/|\/embed\/)/);
        if (url[2] !== undefined) {
            ID = url[2].split(/[^0-9a-z_\-]/i);
            ID = ID[0];
        } else {
            ID = url;
        }
        return ID;
    }

    if(findGetParameter('tag') !== null) {
		$('#searchVideoInput').val(findGetParameter('tag'));
		$('#searchVideos').click();
	}
	else {
		getVideos();
	}
});
