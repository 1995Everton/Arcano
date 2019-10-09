create database arcano;
use arcano;

/* Tabelas */

create table categoria_usuarios (
	id_categoria_usuarios 	INT AUTO_INCREMENT,
    ds_usuario 			  	VARCHAR(25),
    primary key (id_categoria_usuarios)
);

create table usuarios (
	id_usuarios 			INT AUTO_INCREMENT,
    categoria_usuarios_id 	INT,
    nome_usuario 			VARCHAR(50),
    senha 					VARCHAR(150),
    email					VARCHAR(150),
    token 					VARCHAR(50),
    tempo_token 			DATETIME,
    primary key (id_usuarios)
);

create table usuarios_titulo (
	usuarios_id 	INT,
    titulo_id 		INT
);

create table titulo (
	id_titulo 		INT AUTO_INCREMENT,
    ds_titulo 		VARCHAR(50),
    primary key (id_titulo)
);

create table pontuacao (
	id_pontuacao 		  INT AUTO_INCREMENT,
    usuarios_pontuacao_id INT,
    enigmas_pontuacao_id  INT,
    pontos 				  INT,
    data 				  DATETIME,
    progresso 			  INT,
    primary key (id_pontuacao)
);

create table enigmas (
	id_enigmas 				INT AUTO_INCREMENT,
    dificuldade_enigma_id 	INT,
    enigmas_tipos_id 		INT,
    enigma 					VARCHAR(255),
    data 					DATETIME,
    resposta 				VARCHAR(255),
    primary key (id_enigmas)
);

create table dificuldade_enigmas (
	id_dificuldade_enigma 	INT AUTO_INCREMENT,
    ds_dificuldade 			VARCHAR(50),
    primary key (id_dificuldade_enigma)
);

create table tipos (
	id_tipos 	INT AUTO_INCREMENT,
    ds_tipo 	VARCHAR(50),
    primary key (id_tipos)
);

create table dicas (
	id_dicas 			INT AUTO_INCREMENT,
    categoria_dicas_id  INT,
    dicas_enigmas_id 	INT,
    dicas_tipos_id 		INT,
    dica 				VARCHAR(255),
    primary key (id_dicas)
);

create table categorias (
	id_categoria_dica 	INT AUTO_INCREMENT,
    ds_categoria 		VARCHAR(50),
    primary key (id_categoria_dica)
);

create table chat (
	id_chat INT PRIMARY KEY AUTO_INCREMENT,
	id_usuario_chat INT NOT NULL,
    mensagem varchar(255),
    dt_cadastro datetime
);

/* Chaves estrangeiras */

alter table    chat 
add constraint id_usuario_chat  
foreign key   (id_usuario_chat) 
references 	   usuarios (id_usuarios);

alter table    usuarios 
add constraint categoria_usuarios_id  
foreign key   (categoria_usuarios_id) 
references 	   categoria_usuarios (id_categoria_usuarios);

alter table    usuarios_titulo 
add constraint usuarios_id 
foreign key   (usuarios_id) 
references 	   usuarios (id_usuarios);

alter table    usuarios_titulo 
add constraint titulo_id   
foreign key   (titulo_id)   
references     titulo (id_titulo);

alter table    pontuacao 
add constraint usuarios_pontuacao_id 
foreign key   (usuarios_pontuacao_id) 
references     usuarios (id_usuarios);

alter table    pontuacao 
add constraint enigmas_pontuacao_id 
foreign key   (enigmas_pontuacao_id) 
references     enigmas (id_enigmas);

alter table    enigmas 
add constraint dificuldade_enigma_id 
foreign key   (dificuldade_enigma_id) 
references     dificuldade_enigmas (id_dificuldade_enigma);

alter table    enigmas 
add constraint enigmas_tipos_id 
foreign key   (enigmas_tipos_id) 
references     tipos (id_tipos);

alter table    dicas 
add constraint categoria_dicas_id 
foreign key   (categoria_dicas_id)
references     categorias (id_categoria_dica);

alter table    dicas 
add constraint dicas_enigmas_id 
foreign key   (dicas_enigmas_id) 
references     enigmas (id_enigmas);

alter table    dicas 
add constraint dicas_tipos_id 
foreign key   (dicas_tipos_id) 
references     tipos (id_tipos);

/* Inserindo dados nas tabelas */

insert into categoria_usuarios 
(ds_usuario)
values ("Administrador"),
	   ("Usuário");
       
insert into usuarios
(categoria_usuarios_id, nome_usuario, senha, email)
values (1, "Alisson",   "8$oDwfZa.V19I", "alipospor@arcano.com"),
	   (1, "Amanda",    "8$oDwfZa.V19I", "amandahess@arcano.com"),
	   (1, "Everton",   "8$oDwfZa.V19I", "evertonCR@arcano.com"),
	   (1, "Leandro",   "8$oDwfZa.V19I", "leandroS@arcano.com"),
	   (2, "Jenivalda", "123",   "jenivalda_top@hotmail.com"),
	   (2, "Roberval",  "123",   "robervalSP@gmail.com"),
	   (2, "Joaninha",  "123",   "joaninha-vermelha@bol.com.br"),
	   (2, "Carlos",    "123",   "Carlao@gmail.com"),
	   (2, "Juliana",   "123",   "juju@gmail.com"),
	   (2, "Jéssica",   "123",   "ja_acabou_jessica@hotmail.com");


