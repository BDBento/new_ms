jQuery(document).ready(function($) {
    console.log("jQuery is ready"); // Log para depuração
    if (typeof $.fn.slick === 'function') {
        console.log("Slick is loaded"); // Log para depuração
    } else {
        console.log("Slick is not loaded"); // Log para depuração
    }

    // Verificar se o elemento está sendo selecionado corretamente
    console.log("Elementos encontrados: ", $('.slick-banner-slider').length);

    // Inicializar o Slick Slider
    $('.slick-banner-slider').slick({
        slidesToShow: 2,
        slidesToScroll: 2,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: true,
        dots: true,
    });
});