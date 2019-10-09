const MensagemDao = require('../models/MensagemDao')()
const mensagemDao = new MensagemDao();
module.exports = {
    async index (req,res){
        var lista = await mensagemDao.buscarMensagem()
        return res.status(200).json(lista)
    }
}