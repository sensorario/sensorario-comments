$(function() {

    $('.sensorario-comments').each(function() {
        var _thread = $(this).attr('id');
        var thread = _thread.substr(27, _thread.length);
        mostraNumeroCommenti(thread);
        $.post(url_latest, {thread: thread}, function(json) {
            removeGifLoader();
            $('#sensorario-comments-comments-' + thread).append(json.html);
        }, 'json');
        $('#sensorario-comments-textarea-' + thread).on('keypress', function(event) {
            if (event.which === 13) {
                var commento = $('#sensorario-comments-textarea-' + thread).val();
                $('#sensorario-comments-textarea-' + thread).val('');
                $.post(url_save, {
                    commento: commento,
                    thread: thread
                }, function(json) {
                    if (json.success.toString() === 'false') {
                        alert(json.message);
                    } else {
                        $('#sensorario-comments-comments-' + thread).append(json.html);
                        mostraNumeroCommenti(thread);
                    }
                }, 'json');
            }
        });
    });

});
