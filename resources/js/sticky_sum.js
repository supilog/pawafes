$(function () {
    $(window).on('scroll', function () {
        if ($('.fv').height() < $(this).scrollTop()) {
            $('.js-header').addClass('sticky-color');
        } else {
            $('.js-header').removeClass('sticky-color');
        }
    });
});
