const MensagemDao = require('../models/MensagemDao')()
const mensagemDao = new MensagemDao();
const moment = require('moment');
module.exports = (io,app) =>{
    io.on('connection', function(socket){
        var buscarMensagem = async ()=>{
            let mensagem = await mensagemDao.buscarMensagem()
            socket.emit('carregar-mensagem',mensagem)
        }
        buscarMensagem()
        console.log(socket.id);
        //Recebe a mensagem dos usuarios
        socket.on('mensagem-cadastro',mensagem =>{
            mensagemDao.cadastrarMensagem(mensagem)
            //Enviar a mensagem a todos os usuarios exeto aquele que a cadastrou
            socket.broadcast.emit('mensagem-enviar',mensagem)
        })   
    });
}