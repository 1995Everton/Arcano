class Engine {

    constructor(config,input) { 
        this.input = input
        this.config = config
        this.scroll = new SimpleBar($('#myElement')[0]);
        this.renderQuestion(config.pergunta)
    } 

    verificarResponsta(value){
        switch (value) {
            case this.config.resposta:
                this.showKittens('UAU, VOÇÊ E ESPERTO MESMO')
                break;
            case '/dica':
                this.resetForm(this.config.dica)
                break;
            case '/limpar':
                this.clearPrompt();
                break;
            default:
                this.resetForm('Lamento, Resposta Errada.')
                break;
        }
    }

    renderQuestion(question){
        $('.question').text(question)
        this.colorPrompt(this.config.color,this.config.background)
    }
    clearPrompt(){
        $( ".prompt:not(.question)" ).remove();
        this.input.val('');
        $('.terminal').append('<p class="prompt output new-output">')
        $('.new-output').velocity('scroll'), {duration: 100}
    }
    resetForm(mensagem,acertou = false){
        if (acertou)  $('.kittens').removeClass('kittens');
        $('.new-output').removeClass('new-output');
        this.input.val('');
        $('.terminal').append('<p class="prompt">' + mensagem + '</p><p class="prompt output new-output"></p>');
        $('.new-output').velocity('scroll'), {duration: 100}
        this.colorPrompt(this.config.color,this.config.background)
        var chat = document.querySelector('.simplebar-content');
        this.scroll.getScrollElement().scrollTop = chat.scrollHeight;;
    }

    showKittens(mensagem){
        $('.terminal').append(`<div class='kittens'>
            <p class='prompt'>	                                                           </p>
            <p class='prompt'>  ___    ___    ___   ___   ___   _____    ___    _   _   _ </p>
            <p class='prompt'> / __|  / _ \\  | _ \\ | _ \\ | __| |_   _|  / _ \\  | | | | | |</p>
            <p class='prompt'>| (__  | (_) | |   / |   / | _|    | |   | (_) | |_| |_| |_|</p>
            <p class='prompt'> \\___|  \\___/  |_|_\\ |_|_\\ |___|   |_|    \\___/  (_) (_) (_)</p>
            <p class='prompt'>                                                              </p></div>`);
    
        var lines = $('.kittens p');
        $.each(lines, (index, line) =>{
            setTimeout(()=>{
                $(line).css({
                    "opacity": 1
                });
                this.textEffect($(line))
            }, index * 100);
        }).bind(this);
    
        $('.new-output').velocity(
            'scroll'
        ), {duration: 100}
    
        setTimeout(()=>{
            $.get('http://api.giphy.com/v1/gifs/random?api_key=dc6zaTOxFJmzC&tag=kittens', (result) =>{
                var gif = result.data.image_url;
                $('.terminal').append('<p class="prompt"><img class="kitten-gif" src="' + gif + '""></p>');
                this.resetForm(mensagem,true);
            });
        }, (lines.length * 100) + 1000);
    }

    colorPrompt(color,background){
        $(".container-enigma").css({'backgroundColor': background});
        $(".prompt").css({'color': color , 'textShadow' : '0 0 2px '+color});
    }

    textEffect(line){
        var alpha = [';', '.', ',', ':', ';', '~', '`'];
        var animationSpeed = 10;
        var index = 0;
        var string = line.text();
        var splitString = string.split("");
        var copyString = splitString.slice(0);
    
        var emptyString = copyString.map(function(el){
            return [alpha[Math.floor(Math.random() * (alpha.length))], index++];
        })
    
        emptyString = this.shuffle(emptyString);
    
        $.each(copyString, (i, el)=>{
            var newChar = emptyString[i];
            this.toUnderscore(copyString, line, newChar);
    
            setTimeout(()=>{
                this.fromUnderscore(copyString, splitString, newChar, line);
            },i * animationSpeed);
        })
    }
    toUnderscore(copyString, line, newChar){
        copyString[newChar[1]] = newChar[0];
        line.text(copyString.join(''));
    }
    
    fromUnderscore(copyString, splitString, newChar, line){
        copyString[newChar[1]] = splitString[newChar[1]];
        line.text(copyString.join(""));
    }
    
    shuffle(o){
        for(var j, x, i = o.length; i; j = Math.floor(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
        return o;
    };
    
}