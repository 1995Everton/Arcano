var createError = require('http-errors');
var express = require('express');
var app = require('express')();
var server = require('http').createServer(app)
var io = require('socket.io')(server);
var load = require('express-load');
var cookieParser = require('cookie-parser');
var Cors = require('cors')

app.use(Cors());
app.use(express.json());
app.use(express.urlencoded({ extended: false }));
app.use(cookieParser());

load('models', { cwd: 'src' })
  .then('controllers')
  .then('routes')
  .into(app)
require("../src/socket/mensagens")(io,app)
module.exports = server;