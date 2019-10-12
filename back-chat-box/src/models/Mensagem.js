const mongoose = require('mongoose');

let schema = new mongoose.Schema({
    mensagem: {
        type: String,
        required: true,
    },
    id_usuarios: {
        type: Number,
        required: true,
    },
    nome_usuario: {
        type: String,
        required: true,
    },
    url_foto: {
        type: String,
        required: true,
    }
},{
    timestamps: true
});

module.exports = () => mongoose.model('Mensagem', schema)