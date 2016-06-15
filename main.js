/**
 * Created by lelukas on 11/06/2016.
 */
$(document).ready(function () {
    $("section.row").flexVerticalCenter({verticalOffset: -60});


    function hide(selector) {
        $(selector).toggleClass("hide")
    }

    // TweenLite.to(".toast", 0.5, {opacity: 1, onComplete: function () {
    //     setTimeout(function () {
    //         TweenLite.to(".toast", 0.5, {opacity: 0 } )
    //     }, 2000)
    //     setTimeout(hide (".toast"), 2000)
    // }});
    var toast = document.getElementById("toast");
    toast.addEventListener("webkitAnimationEnd",function () {
       hide(".toast")
    });

    var mql = window.matchMedia("(max-width: 39.9375em)");
    if (mql.matches) {
        // $("header+section").removeClass("row");
        $(".pdf").unwrap();
        // $("body>div.pdf").wrap("<section class='row text-center'></section>")
        //     .addClass("small-centered");

        // alert('asd')
    } else {
        /* The viewport is currently in landscape orientation */

    }
});