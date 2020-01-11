$(document).ready(function(){

    /* reviews */
    
    $('.slick-slider-reviews').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
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
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: true,
                    infinite: true,
                    autoplay: true
                }
            },
        ]
    });

    /* catalog-form - center-form */

    $('#js-goToCatalogBtn').on('click', function (e) {
        e.preventDefault();
        var id = $(this).attr('href'),
            top = $(id).offset().top;
        $('body, html').animate({scrollTop: top}, 600);
    });

    /* catalog-form - product-form-modal */

    $('.js-catalog-card__btn-order').on('click', function(){
        var cardTitle = $(this).parent().parent().children('.js-catalog-card__title').html().trim();
        $('.js-product-input-modal').val(cardTitle);
        $('.js-product-title-modal').html(cardTitle);
    })

    /* faq */

    $('.js-faq-list__item-header').on('click', function(){
        $(this).parent().children('.js-faq-list__item-body').slideToggle();
        $(this).children('.faq-list__item-arrow').toggleClass('openned');
    })

    /* characteristics-form */

    $('.js-characteristics__btn-order').on('click', function(){
        $('.js-product-input-modal').val('');
        $('.js-product-title-modal').html('');
    });

    /* js-btn-up-page */

    $(window).on('scroll', function () {
        $(window).scrollTop() > 100 ? $('.js-btn-up-page').addClass('show') : $('.js-btn-up-page').removeClass('show');
    });

    $('.js-btn-up-page').on('click', function(e) {
        e.preventDefault();
		$('html, body').animate({scrollTop: 0}, 600);
		return false;
    });
    
    /* gallery */

    $('.slick-slider-gallery').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: true,
        lazyLoad: 'ondemand'
        //asNavFor: '.slick-slider-gallery-nav'
    });

    /*$('.slick-slider-gallery-nav').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.slick-slider-gallery',
        dots: true,
        centerMode: true,

        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    centerMode: true,
                    infinite: true,
                    autoplay: true
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: true,
                    infinite: true,
                    autoplay: true
                }
            }
        ]
    });*/
    
});