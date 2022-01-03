// Owl Carousel Initialization
$('.home-slider').owlCarousel({
    loop: true,
    autplay: true,
    margin: 10,
    nav: true,
    autplayHoverPause: true,
    items: 1,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    navText: ["<span class='fas fa-chevron-left'></span>","<span class='fas fa-chevron-right'></span>"],
    responsive: {
        0: {
            items: 1,
            nav: false
        },
        600: {
            items: 1,
            nav: false
        },
        1000: {
            items: 1,
            nav: true
        }
    }
});

$('.kejuruan-carousel').owlCarousel({
    loop: true,
    autplay: true,
    margin: 10,
    responsive: {
        0: {
            items: 1,
            nav: false
        },
        600: {
            items: 2,
            nav: false
        },
        1000: {
            items: 3,
            nav: false
        }
    }
});

// Typed JS Initialization
new Typed('#typed', {
    strings: ['Kompeten'],
    loop: true,
    backDelay: 900,
    backSpeed: 80,
    typeSpeed: 200,
    showCursor: false,
});