const moment = require('moment');
class Mensagem {
    constructor(){
        this._db = require('../../bin/database')
    }
    buscarMensagem(){
        return new Promise((resolve, reject)=>{
            this._db.query(`
            SELECT  chat.mensagem,
                    chat.id_chat, 
                    usuarios.id_usuarios, 
                    usuarios.nome_usuario,
                    usuarios.url_foto  
            FROM chat 
            INNER JOIN usuarios
            ON id_usuarios = id_usuario_chat
            WHERE dt_cadastro <= ?`,[moment().add(1,'days').format("YYYY-MM-DD hh:mm:ss")],(err,chat)=>{
                if(err) return reject(err)
                return resolve(chat)
            })
        })
    }
    cadastrarMensagem(chat){
        let { id_usuarios , mensagem } = chat
        return new Promise( (resolve, reject) =>{
            if(!id_usuarios) return  reject("field id_usuarios is required")
            if(!mensagem) return  reject("field mensagem is required")
            this._db.query(`
                INSERT 
                INTO chat (id_usuario_chat , mensagem, dt_cadastro)
                VALUES ( ? , ? , ?)
                `,
                [id_usuarios ,mensagem , moment().format("YYYY-MM-DD hh:mm:ss")],
                (err,success)=>{
                    if(err) return reject(err)
                    return resolve(success)
                }
            )
        })
    }
}
module.exports = ()=>{
    return Mensagem
}