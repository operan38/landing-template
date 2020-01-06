$(document).ready(function(){

    $('.slick-slider-reviews').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        centerMode: true,
        autoplay: true,

        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    centerMode: true,
                    autoplay: true
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    centerMode: true,
                    infinite: true,
                    autoplay: true
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: true,
                    infinite: true,
                    autoplay: true
                }
            }
        ]
    });

    $(window).on('scroll', function () {
        $(window).scrollTop() > 100 ? $('.js-btn-up-page').addClass('show') : $('.js-btn-up-page').removeClass('show');
    });

    $('#js-goToCatalogBtn').on('click', function (e) {
        e.preventDefault();
        var id = $(this).attr('href'),
            top = $(id).offset().top;
        $('body, html').animate({scrollTop: top}, 600);
    });

    $('.js-btn-up-page').on('click', function(e) {
        e.preventDefault();
		$('html, body').animate({scrollTop: 0}, 600);
		return false;
	});
});