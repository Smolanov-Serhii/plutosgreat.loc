$(document).on('click', '#sandwichmenu', function () {
    $('#sandwichmenu').toggleClass("active");
    $('#main .global_container_category_list .list').fadeToggle(300);
});

$(document).on('click', '.global_container_catalog_page .list .menu-item', function () {
    $(this).find('.sub-menu').fadeToggle(300);
});



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

$( ".global_container_catalog_page .list .cat-item" ).each(function( index ) {
    if($(this).children('.children').length > 0) {
        $(this).addClass('has-child');
    }
});
function addparrenclass() {

}
addparrenclass();





