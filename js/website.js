  
(function() {
    var burger = document.querySelector('.burger');
    var menu = document.querySelector('#'+burger.dataset.target);
    burger.addEventListener('click', function() {
        burger.classList.toggle('is-active');
        menu.classList.toggle('is-active');
    });
})();

$(function() {
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 20) {
            $('.navigation').addClass('fixed');
            $('header').css({
                "border-bottom": "none",
                "padding": "35px 0"
            });

        } else {
            $('.navigation').removeClass('fixed');
            $('header').css({
                "border-bottom": "solid 1px rgba(255, 255, 255, 0.2)",
                "padding": "50px 0"
            });
        }
    });
});