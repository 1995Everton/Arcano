<div class="wrapper">
    <span 
        class="typewriter end" 
        data-text=" Para você jogar nossos enigmas é fácil, as respostas são na  maioria das vezes objetivas e contendo os acentos."
        data-time="100"
        data-color="#fff"
        data-background=""
        data-text-decoration="unset">
    </span>

    <br>
    <br>

    <span 
        class="typewriter end" 
        data-text="                                                            
                
                    
                    Em alguns casos as respostas podem ser mais complexas, necessitando uma frase como resposta."
        data-time="100"
        data-color="white"
        data-background=""
        data-text-decoration="unset">
    </span>

    <br>
    <br>
    <br>
    <br>
    <span
        class="typewriter end" 
        data-text="                                                             
                
                    
                                                                            
                
        
        !!!!!!!BOM JOGO!!!!!!!"
        data-time="100"
        data-color="#fff"
        data-background=""
        data-text-decoration="unset">
    </span>
</div>


<script>
    (function($) {
    $(function() {
        // get each element with typewriter class
        $('.typewriter').each(function(i, obj) {
        // define function params
        var text = $(obj).attr('data-text');
        var append = text.split("");
        var time = parseInt($(obj).attr('data-time'));
        var pause = parseInt($(obj).attr('data-time'));

        // define style params
        var color = $(obj).attr('data-color');
        var background = $(obj).attr('data-background');
        var textDecoration = $(obj).attr('data-text-decoration');
        
        // call functions
        styleText(color, background, textDecoration, obj);
        writeText(append, time, pause, obj);
        });
    });
    
    // function - custom styles
    function styleText(color, background, textDecoration, obj) {
        $(obj).css('background', background);
        $(obj).css('color', color);
        $(obj).css('text-decoration', textDecoration);
    }
    
    // function - animate/write text
    function writeText(append, time, pause, obj) {      
        $.each( append, function(i, value) {
        setTimeout(function(){
            $(obj).append(function() {
            return value;
            })
        }, time)

        // add time to each value because ($.each -> synchronous)
        time += pause;
        });
    };
    }) (jQuery);
</script>