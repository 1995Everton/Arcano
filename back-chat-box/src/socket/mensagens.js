const moment = require('moment')
const Mensagem = require('../models/Mensagem')()
module.exports = (io,app) =>{
    io.on('connection', function(socket){
        let buscarMensagem = async ()=>{
            let mensagem = []
            try{
                mensagem = await Mensagem.find({"createdAt" : { $gte : moment().subtract(1, 'day').toISOString() }});
            }catch (e) {
                console.log(e)
            }
            socket.emit('carregar-mensagem',mensagem)
        }
        buscarMensagem()
        console.log(socket.id);
        //Recebe a mensagem dos usuarios
        socket.on('mensagem-cadastro',mensagem =>{
            try{
                Mensagem.create({...mensagem})
            }catch (e) {
                console.log(e)
            }
            //Enviar a mensagem a todos os usuarios exeto aquele que a cadastrou
            socket.broadcast.emit('mensagem-enviar',mensagem)
        })   
    });
}