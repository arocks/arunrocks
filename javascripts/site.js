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
    
    // Add social buttons
    // 1. Hacker News
    (function(d, t) {
        var g = d.createElement(t),
            s = d.getElementsByTagName(t)[0];
        g.src = '//hnbutton.appspot.com/static/hn.js';
        s.parentNode.insertBefore(g, s);
    }(document, 'script'));

    $("#socialbutns").append(
        '<a href="http://news.ycombinator.com/submit" class="hn-share-button">Vote on HN</a>');
});