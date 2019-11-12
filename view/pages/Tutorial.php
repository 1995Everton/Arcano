<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
        margin: 0;
        padding: 0;
        height: 100vh;
        width: 100vw;
        background-color: #333;
        display: flex;
        justify-content: center;
        align-items: center;
        
        .wrapper {
            text-align: center;
            
            .typewriter {
            font-size: 24px;
            border-right: 1px solid;
            letter-spacing: 0.15em;
            font-family: monospace;
            line-height: 1.4;
            font-weight: 400;
            
            &.end {
                animation: EndOfTypewriter 1s steps(1) infinite;
            }
            }
        }
        }

        @keyframes EndOfTypewriter {
        50% {
            border-color: transparent;
        }
        }
    </style>
</head>
<body>
    <div class="wrapper">
    <span 
        class="typewriter end" 
        data-text="ola seus corno querrem aprender ajogar essa merda ?"
        data-time="100"
        data-color="#fff"
        data-background=""
        data-text-decoration="unset">
    </span>
    
    <br>
    <br>
    
    <span 
        class="typewriter end" 
        data-text="Animated typewriter."
        data-time="100"
        data-color="white"
        data-background="pink"
        data-text-decoration="underline">
    </span>
    </div>
</body>
</html>
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