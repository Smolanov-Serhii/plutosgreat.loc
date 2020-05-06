jQuery( document ).ready(function( $ ){

    $('.slick_list').slick({
        infinite: true,
        centerMode: true,
        arrows: true,
        dots: false,
        slidesToShow: 3,
        prevArrow: $('.curent_category_description .prev_button'),
        nextArrow: $('.curent_category_description .next_button'),
        slidesToScroll: 3
    });
});
AOS.init();



