$(function() {
    var socket = io('https://senai-arcano.herokuapp.com/');
    socket.on('carregar-mensagem', mensagens =>{
        for (const mensagem of mensagens) {
            createMsg(mensagem,20)
        }
    })
    socket.on('mensagem-enviar', mensagem =>{
        createMsg(mensagem,20)
    })
    $("#chat-submit").click(function(e) {
        e.preventDefault();
        var msg = $("#chat-input").val()
        if(msg.length < 3) return;
        var mensagem = {
            ...USUARIO_GLOBAL,
            mensagem : msg.match(/.{1,15}/g).join(" ")
        }
        socket.emit('mensagem-cadastro',mensagem)
        createMsg(mensagem)
        $("#chat-input").val('');
    })

    function createMsg(msg,speed = 1000){
        let { id_usuarios , mensagem , url_foto , nome_usuario} = msg
        let content = id_usuarios == USUARIO_GLOBAL.id_usuarios ? 'end' : 'start'
        let balloon = id_usuarios == USUARIO_GLOBAL.id_usuarios ? 'right' : 'left'
        let template = `
            <div class="col-12 my-2">
               <section class="d-flex justify-content-${content} message -${balloon} ">
                  <div class="nes-balloon from-${balloon} cm-msg-text">
                     <p>${mensagem}</p>
                  </div>
               </section>
               <div class="d-flex justify-content-${content}">
                  <img class="nes-avatar is-large" src="${url_foto}" style="image-rendering: pixelated;">
               </div>
            </div>
        `
        $(".chat-logs").append(template);
        $(".chat-content").animate({ scrollTop: $(".chat-logs")[0].scrollHeight}, speed);
    }

    $("#chat-circle").click(function() {
        $("#chat-circle").toggle('scale');
        $(".chat-box").toggle('scale');
        $(".chat-content").animate({ scrollTop: $(".chat-logs")[0].scrollHeight}, 200);
    })

    $(".fechar-chat").click(function() {
        $("#chat-circle").toggle('scale');
        $(".chat-box").toggle('scale');
    })
})