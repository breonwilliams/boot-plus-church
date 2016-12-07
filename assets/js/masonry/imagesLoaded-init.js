/**
 * Created by breon on 12/6/16.
 */
jQuery(function($) {
    var $container = $(".mgrid");

    $container.imagesLoaded(function () {
        $container.masonry();
    });
});