$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#comment').scrollex({
        mode: 'bottom',
        bottom: 500,
        enter: getComments(),
        leave: function() {}
    });
    $('#clickbtn').click(function() {
        $.ajax({
            type: 'POST',
            url: window.location + '/articles/like',
            data: {
                id: $(this).attr('articleid')
            },
            dataType: 'json',
            encode: true
        });
    });

    function getComments() {
        var page = $('.comments').data('next-page');
        if (page !== null) {
            clearTimeout($.data(this, 'scrollCheck'));
            $.data(this, 'scrollCheck', setTimeout(function() {
                $.get(page, function(data) {
                    $('.comments').append(data.comments);
                    $('.comments').data('next-page', data.next_page);
                });
            }, 1000));
        }
    }
    $('#commentform').submit(function(event) {
        var formData = {
            'comment': $('input[name=inputComment]').val(),
        };
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            dataType: 'json',
            encode: true
        }).done(function(data) {
            $('.comments').empty();
            $('.comments').data('next-page', $('#dataurl').data('url'));
            $('input[name=inputComment]').val("");
            getComments();
        });
        event.preventDefault();
    });
    getComments();
});