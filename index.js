/**
 * Created by lelukas on 10/06/2016.
 */
$(document).ready(function () {


    var tl = new TimelineLite();
    var display = true;

    $("button[value=CriarConta]").click(function() {
        // $(this).one("click",function () {
        //    $(".newAccount").removeClass("hide")
        // });
        // hide(".newAccount");
        // tl.add(TweenLite.to(".newAccount", 0.2, {y: "+=10" ,opacity: 1}));
        // $(this).attr("value","voltar")

        $(".newAccount").toggle("100");
        if(display){
            display = !display;
            $(".login input").attr("disabled",true);
            $("button[value=CriarConta]").html("Voltar ao Login")
        }else{
            display = !display;
            $(".login input").removeAttr("disabled",false);
            $("button[value=CriarConta]").html("Criar conta")
        }
    });


    // $("button[value=Voltar]").click(function () {
    //     tl.add(TweenLite.to(".newAccount", 0.2, {opacity: 0, onComplete:hide(".newAccount, .hide")}));
    //     tl.add(TweenLite.to(".login", 0.2, {opacity: 1}));
    // });

    function hide(selector) {
        $(selector).toggleClass("hide")
    }

});