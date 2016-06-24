$(function() {
    $('.connected-carousels')
            .jcarousel({
                // Core configuration goes here
            })
            .jcarouselAutoscroll({
                interval: 3000,
                target: '+=1',
                autostart: true
            })
            ;
});