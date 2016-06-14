/**
 * Created by lelukas on 11/06/2016.
 */
$(document).ready(function () {
    $("section.row").flexVerticalCenter({verticalOffset: -60});


    function hide(selector) {
        $(selector).toggleClass("hide")
    }

    TweenLite.to(".toast", 0.5, {opacity: 1, onComplete: function () {
        setTimeout(function () {
            TweenLite.to(".toast", 0.5, {opacity: 0})
        }, 2000)
    }});

    var mql = window.matchMedia("(max-width: 39.9375em)");
    if (mql.matches) {
        // $("div").removeClass("pdf");
        $("header+section").removeClass("row");
        $("header+section>div").wrap("<section class='row expanded text-center small-centered'></section>")
            .addClass("small-centered");

        // alert('asd')
    } else {
        /* The viewport is currently in landscape orientation */

    }
});