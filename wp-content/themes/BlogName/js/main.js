(function ($, undefined) {
    $(document).ready(function () {
        $(".cross").hide();
        $("#primary-menu").hide();
        $(".hamburger").click(function () {
            $("#primary-menu").slideToggle("slow", function () {
                $(".hamburger").hide();
                $(".cross").show();
            });
        });

        $(".cross").click(function () {
            $("#primary-menu").slideToggle("slow", function () {
                $(".cross").hide();
                $(".hamburger").show();
            });
        });


    });
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            directionNav: false
        });
    });
})(jQuery);



