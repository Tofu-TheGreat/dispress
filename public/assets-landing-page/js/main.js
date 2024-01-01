$(window).on("load", function () {
    /*----- Preloader -----*/
    $(".preloader").fadeOut("slow");
});

$(document).ready(function () {
    AOS.init();

    /*----- Tooltips -----*/
    const tooltipTriggerList = document.querySelectorAll(
        '[data-bs-toggle="tooltip"]'
    );
    const tooltipList = [...tooltipTriggerList].map(
        (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
    );

    /*---- Button on top ----*/
    $(window).on("scroll", function () {
        if ($(this).scrollTop() > 50) {
            $(".button-to-top").addClass("opacity-75").removeClass("opacity-0");
        } else {
            $(".button-to-top").addClass("opacity-0").removeClass("opacity-75");
        }
    });

    // password icon view
    $(".view-password-icon").on("click", function () {
        if ($(this).hasClass("bi-eye")) {
            $(this).removeClass("bi-eye");
            $(this).addClass("bi-eye-slash");
            $("#password").attr("type", "text");
        } else {
            $(this).removeClass("bi-eye-slash");
            $(this).addClass("bi-eye");
            $("#password").attr("type", "password");
        }
    });

    /*----- Togle Button -----*/
    $(document).ready(function () {
        if (localStorage.getItem("mode") === "dark") {
            $("body").addClass("dark");
            $(".bi-sun-fill")
                .removeClass("bi-sun-fill")
                .addClass("bi-moon-stars-fill");
        }

        $(".button-theme").on("click", function () {
            $("body").toggleClass("dark");

            if ($("body").hasClass("dark")) {
                $(".bi-sun-fill")
                    .removeClass("bi-sun-fill")
                    .addClass("bi-moon-stars-fill");
                localStorage.setItem("mode", "dark");
            } else {
                $(".bi-moon-stars-fill")
                    .removeClass("bi-moon-stars-fill")
                    .addClass("bi-sun-fill");
                localStorage.setItem("mode", "light");
            }
        });
    });

    /*----- Navbar Shrink -----*/
    $(".navbar-toggler").on("click", function () {
        $(".navbar").addClass("navbar-shrink").removeClass("bg-transparent");
        $(".navbar-brand").removeClass("d-lg-none");
    });

    $(window).on("scroll", function () {
        if ($(this).scrollTop() > 50) {
            $(".navbar")
                .addClass("navbar-shrink")
                .removeClass("bg-transparent");
            $(".navbar-brand").removeClass("d-lg-none");
        } else {
            $(".navbar").removeClass("navbar-shrink");
            $(".navbar-brand").addClass("d-lg-none");
        }
    });

    $(".navbar-toggler").on("click", function () {
        $(".navbar-brand").toggleClass("d-none");
    });

    /*----- Active Nav Link -----*/
    // $(".nav-link").on("click", function () {
    //   $(".navbar-nav").find(".active").removeClass("active");
    //   $(this).addClass("active");
    // });

    /*----- Page Scroll -----*/
    $.scrollIt({
        scrollTime: 90,
    });

    /*----- Features Carousel -----*/

    // $(".features-carousel").owlCarousel({
    //   loop: true,
    //   margin: 0,
    //   autoplay: true,
    //   responsiveClass: true,
    //   responsive: {
    //     0: {
    //       items: 1,
    //     },
    //     600: {
    //       items: 2,
    //     },
    //     1000: {
    //       items: 3,
    //     },
    //   },
    // });

    /*----- Superiority Carousel -----*/

    $(".superiority-carousel").owlCarousel({
        loop: true,
        margin: 0,
        autoplay: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 2,
            },
            1000: {
                items: 3,
            },
        },
    });

    /*----- Navbar Collapse -----*/
    $(".nav-link").on("click", function () {
        $(".navbar-collapse").collapse("hide");
    });
});
