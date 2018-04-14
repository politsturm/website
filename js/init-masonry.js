jQuery(window).load(function () {
    jQuery('.main-news').masonry({
        itemSelector: '.grid-post',
        columnWidth: '.grid-post',
        gutter: 30,
        percentPosition: true
    });
});
