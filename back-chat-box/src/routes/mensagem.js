module.exports = app => {
    var mensagemController = app.controllers.MensagemControlador
    app.get('/buscar-mensagem',mensagemController.index)
}