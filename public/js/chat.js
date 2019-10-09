$(function() {
    var socket = io('http://localhost:3000');
    var INDEX = 0;
    // async function buscarMensagem(){
    //     const mensagem = await axios.get('http://localhost:3000/buscar-mensagem').catch(false)
    //     if(mensagem){
    //         for (const msg of mensagem.data) {
    //             let tipo =  ID_USUARIO_GLOBAL == msg.id_usuarios ? 'self' : 'user'
    //             generate_message(msg.mensagem, tipo);
    //         }
    //     }
    // }

    socket.on('carregar-mensagem', mensagens =>{
        for (const msg of mensagens) {
            let tipo =  ID_USUARIO_GLOBAL == msg.id_usuarios ? 'self' : 'user'
            generate_message(msg.mensagem, tipo);
        }
    })
    socket.on('mensagem-enviar', mensagem =>{
        generate_message(mensagem.mensagem, 'user');
    })
    $("#chat-submit").click(function(e) {
        e.preventDefault();
        let msg = $("#chat-input").val();
        if(msg.trim() == '') return false;
        var mensagemData = {
            id_usuarios : ID_USUARIO_GLOBAL ,
            mensagem : msg
        }
        socket.emit('mensagem-cadastro',mensagemData)
        generate_message(msg, 'self');
    })

    function generate_message(msg, type) {
        INDEX++;
        let str=`
      <div id="cm-msg-${INDEX}" class="chat-msg ${type}">
        <span class="msg-avatar">
          <img src="https://i.pravatar.cc/300">
        </span>
        <div class="cm-msg-text">${msg}</div>
      </div>`;
        $(".chat-logs").append(str);
        $("#cm-msg-"+INDEX).hide().fadeIn(300);
        if(type == 'self') $("#chat-input").val('');
        $(".chat-logs").stop().animate({ scrollTop: $(".chat-logs")[0].scrollHeight}, 1000);
    }

    $(document).delegate(".chat-btn", "click", function() {
        let value = $(this).attr("chat-value");
        let name = $(this).html();
        $("#chat-input").attr("disabled", false);
        generate_message(name, 'self');
    })

    $("#chat-circle").click(function() {
        $("#chat-circle").toggle('scale');
        $(".chat-box").toggle('scale');
    })

    $(".chat-box-toggle").click(function() {
        $("#chat-circle").toggle('scale');
        $(".chat-box").toggle('scale');
    })
    // buscarMensagem()
})