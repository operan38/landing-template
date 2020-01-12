'use strict';
function r(f){/in/.test(document.readyState)?setTimeout('r('+f+')',9):f()}
r(function(){
    if (!document.getElementsByClassName) {
        // Поддержка IE8
        var getElementsByClassName = function(node, classname) {
            var a = [];
            var re = new RegExp('(^| )'+classname+'( |$)');
            var els = node.getElementsByTagName("*");
            for(var i=0,j=els.length; i < j; i++)
                if(re.test(els[i].className))a.push(els[i]);
            return a;
        }
        var videos = getElementsByClassName(document.body,"video-review-youtube");
    } else {
        var videos = document.getElementsByClassName("video-review-youtube");
    }
    var nb_videos = videos.length;
    for (var i=0; i < nb_videos; i++) {
        // Находим постер для видео, зная ID нашего видео
        videos[i].style.backgroundImage = 'url(http://i.ytimg.com/vi/' + videos[i].id + '/sddefault.jpg)';
        // Размещаем над постером кнопку Play, чтобы создать эффект плеера
        var play = document.createElement("div");
        play.setAttribute("class","play");
        videos[i].appendChild(play);
        videos[i].onclick = function() {
            // Создаем iFrame и сразу начинаем проигрывать видео, т.е. атрибут autoplay у видео в значении 1
            var iframe = document.createElement("iframe");
            var iframe_url = "https://www.youtube.com/embed/" + this.id + "?autoplay=1&autohide=1";
            if (this.getAttribute("data-params")) iframe_url+='&'+this.getAttribute("data-params");
            iframe.setAttribute("src",iframe_url);
            iframe.setAttribute("frameborder",'0');
            iframe.setAttribute("title",'video');
            iframe.setAttribute("allowFullScreen", '');
            // Высота и ширина iFrame будет как у элемента-родителя
            /*iframe.style.width  = this.style.width;
            iframe.style.height = this.style.height*/
            $(iframe).addClass('video-review-youtube__iframe');
            // Заменяем начальное изображение (постер) на iFrame
            this.parentNode.replaceChild(iframe, this);
        }
    }
});


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