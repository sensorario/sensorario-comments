function mostraNumeroCommenti(thread) {
    $.post(url_stats, {thread: thread}, function(json) {
        $('#sensorario-comments-stats-' + thread).html(json.tot_thread_comments + ' comments.');
    }, 'json');
}

function removeGifLoader() {
    $('#sensorario-comment-ajax-loader').slideUp(function() {
        $(this).remove();
    });
}