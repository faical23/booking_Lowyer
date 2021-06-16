///// burger menu script
let burger_mostache = true
$(document).ready(function() {
    $(".mostache").click(function() {
        if (burger_mostache) {
            this.style = "transform: rotate(180deg);"
            $(".menu_mobile").css("bottom", "0px");
            burger_mostache = false;
        } else {
            this.style = "transform: rotate(0deg);"
            $(".menu_mobile").css("bottom", "2000px");
            burger_mostache = true;
        }
    })
});

////////// scroll header

function fixe() {
    if (window.scrollY > 0) {
        $("header").addClass("header_scroll");
        $(".mostache").addClass("mostache_scroll");
        $('header .primary_GetStarted').removeClass('primary_GetStarted').addClass('secondry_GetStarted');
        $(".item_navbar_menu").each(function() {
            $(this).addClass("item_navbar_menu_scroll");
        });
    } else {
        $("header").removeClass("header_scroll");
        $(".mostache").removeClass("mostache_scroll");
        $('header .secondry_GetStarted').removeClass('secondry_GetStarted').addClass('primary_GetStarted');

        $(".item_navbar_menu").each(function() {
            $(this).removeClass("item_navbar_menu_scroll");
        });
    }
}
window.addEventListener('scroll', fixe)