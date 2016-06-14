/**
 * Created by lelukas on 10/06/2016.
 */
$(document).ready(function () {

    var display = true;

    $("button[value=CriarConta]").click(function() {

        $(".newAccount").toggle("100");
        if(display){
            display = !display;
            $(".login input").attr("disabled",true);
            $("button[value=CriarConta]").html("Voltar ao Login");
            // setTimeout(function () {
                $("html, body").animate({scrollTop: $(document).height()});
            // },100)

        }else{
            display = !display;
            $(".login input").removeAttr("disabled",false);
            $("button[value=CriarConta]").html("Criar conta");
            $("html, body").animate({scrollTop: 0})
        }
    });




    function hide(selector) {
        $(selector).toggleClass("hide")
    }

});