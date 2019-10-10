const server = require('./bin/express')
var port = parseInt((process.env.PORT || '3000'), 10)
server.listen(port,()=>{
  console.log('Server Rodando na porta'+port);
})