var express = require('express');
var app = express();
var server = require('http').createServer(app)
var io = require('socket.io')(server);
var load = require('express-load');
var cookieParser = require('cookie-parser');
var Cors = require('cors')
var dotenv = require('dotenv');
dotenv.config()
require('./database')(process.env.CONNECTION);

app.use(Cors());
app.use(express.json());
app.use(express.urlencoded({ extended: false }));
app.use(cookieParser());

load('models', { cwd: 'src' }).into(app)
require("../src/socket/mensagens")(io,app)
module.exports = server;