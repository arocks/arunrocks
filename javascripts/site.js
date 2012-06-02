$(document).ready(function () {
    console.log("init ArunRocks...");                      

    go_page = function(id) {
        var url = $('a#' + id).attr('href');
        if (url) {
            window.location = url;
        }
    };

    $(document).bind('keydown', 'ctrl+left',      function() {go_page('previous');});
    $(document).bind('keydown', 'alt+b',      function() {go_page('previous');});
    $(document).bind('keydown', 'ctrl+right',     function() {go_page('next');});
    $(document).bind('keydown', 'alt+f',     function() {go_page('next');});
});