function mostraNumeroCommenti(thread) {
    $.post(url_stats, {thread: thread}, function(json) {
        $('#sensorario-comments-stats-' + thread).html(json.tot_thread_comments + ' commenti.');
    }, 'json');
}