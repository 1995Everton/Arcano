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
    url_foto      TEXT,
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

/* Chaves estrangeiras */

alter table    usuarios 
add constraint categoria_usuarios_id  
foreign key   (categoria_usuarios_id) 
references 	   categoria_usuarios (id_categoria_usuarios)
ON DELETE CASCADE
ON UPDATE CASCADE;

alter table    usuarios_titulo 
add constraint usuarios_id 
foreign key   (usuarios_id) 
references 	   usuarios (id_usuarios)
ON DELETE CASCADE
ON UPDATE CASCADE;

alter table    usuarios_titulo 
add constraint titulo_id   
foreign key   (titulo_id)   
references     titulo (id_titulo)
ON DELETE CASCADE
ON UPDATE CASCADE;

alter table    pontuacao 
add constraint usuarios_pontuacao_id 
foreign key   (usuarios_pontuacao_id) 
references     usuarios (id_usuarios)
ON DELETE CASCADE
ON UPDATE CASCADE;

alter table    pontuacao 
add constraint enigmas_pontuacao_id 
foreign key   (enigmas_pontuacao_id) 
references     enigmas (id_enigmas)
ON DELETE CASCADE
ON UPDATE CASCADE;

alter table    enigmas 
add constraint dificuldade_enigma_id 
foreign key   (dificuldade_enigma_id) 
references     dificuldade_enigmas (id_dificuldade_enigma)
ON DELETE CASCADE
ON UPDATE CASCADE;

alter table    enigmas 
add constraint enigmas_tipos_id 
foreign key   (enigmas_tipos_id) 
references     tipos (id_tipos)
ON DELETE CASCADE
ON UPDATE CASCADE;

alter table    dicas 
add constraint categoria_dicas_id 
foreign key   (categoria_dicas_id)
references     categorias (id_categoria_dica)
ON DELETE CASCADE
ON UPDATE CASCADE;

alter table    dicas 
add constraint dicas_enigmas_id 
foreign key   (dicas_enigmas_id) 
references     enigmas (id_enigmas)
ON DELETE CASCADE
ON UPDATE CASCADE;

alter table    dicas 
add constraint dicas_tipos_id 
foreign key   (dicas_tipos_id) 
references     tipos (id_tipos)
ON DELETE CASCADE
ON UPDATE CASCADE;

/* Inserindo dados nas tabelas */

insert into categoria_usuarios 
(ds_usuario)
values ("Administrador"),
	   ("Usuário");
       
insert into titulo
(ds_titulo)
values ("Mestre dos Magos"),
	   ("Rei da noite"),
	   ("Mrs. Maga"),
	   ("Dos Elfos"),
	   ("O Iluminado"),
	   ("Guardião do Mundo"),
	   ("A Enigmática");

insert into usuarios
(categoria_usuarios_id, nome_usuario, senha, email,url_foto)
values (1, "Alisson",   "8$oDwfZa.V19I", "alipospor@arcano.com","https://gravatar.com/avatar/8800139dba3a0db7ce28a213890fe68f?s=400&d=robohash&r=x"),
	   (1, "Amanda",    "8$oDwfZa.V19I", "amandahess@arcano.com","https://gravatar.com/avatar/3e49080504f6d3b9bc509b4e75e4e15c?s=400&d=robohash&r=x"),
	   (1, "Everton",   "8$oDwfZa.V19I", "evertonCR@arcano.com","https://gravatar.com/avatar/487f1157ec212e1eb69a68b848414b12?s=400&d=robohash&r=x"),
	   (1, "Leandro",   "8$oDwfZa.V19I", "leandroS@arcano.com","https://gravatar.com/avatar/ee76194e7f156d4f46265eea3b996013?s=400&d=robohash&r=x"),
	   (2, "Jenivalda", "123",   "jenivalda_top@hotmail.com","https://gravatar.com/avatar/41705e76a07976b1fc79bc15f1724dbb?s=400&d=robohash&r=x"),
	   (2, "Roberval",  "123",   "robervalSP@gmail.com","https://gravatar.com/avatar/ba8cb136ffc43c27c4cfe78274b46e75?s=400&d=robohash&r=x"),
	   (2, "Joaninha",  "123",   "joaninha-vermelha@bol.com.br","https://gravatar.com/avatar/8c64fbfa02d0a9f45ca4a903826e2e5e?s=400&d=robohash&r=x"),
	   (2, "Carlos",    "123",   "Carlao@gmail.com","https://gravatar.com/avatar/a6b17822954cc096a7007727d47f6661?s=400&d=robohash&r=x"),
	   (2, "Juliana",   "123",   "juju@gmail.com","https://gravatar.com/avatar/05d2da81d7c42c8e51c915c525a412a5?s=400&d=robohash&r=x"),
	   (2, "Jéssica",   "123",   "ja_acabou_jessica@hotmail.com","https://gravatar.com/avatar/2b30f52745f0b29ce21e44816ac854f8?s=400&d=robohash&r=x");

insert into usuarios_titulo
(usuarios_id, titulo_id)
values (1,1),
	   (2,3),
	   (3,2),
	   (4,4),
	   (5,7),
	   (6,5),
	   (8,6);
       
insert into dificuldade_enigmas
(ds_dificuldade)
value ("Fácil"),
	  ("Médio"),
	  ("Difícil"),
	  ("Modo Deus");
      
insert into tipos
(ds_tipo)
value ("Texto"),
	  ("Imagem"),
	  ("Audio"),
	  ("Vídeo");

insert into enigmas
(dificuldade_enigma_id, enigmas_tipos_id, enigma, data, resposta)
values (1,1, "Alimente-me e eu vivo, ainda me dê uma bebida e eu morro.",  "2019-06-01", "Fogo"),
	   (1,2, "Por que o marido da viúva não pode se casar com a cunhada?", "2019-06-02", "Porque ele está morto"),
	   (2,1, "O que se molha quando se seca?",    						   "2019-06-03", "Toalha"),
	   (2,2, "O que é o que é, se compra para comer, mas não se come?",    "2019-06-03", "Prato"),
	   (3,1, "Está duas vezes em um minuto, três vezes em um momento e e só uma vez em cem anos?","2019-06-04", "Letra M"),
	   (3,2, "O que tem um olho, mas não pode ver?", 					   "2019-06-04", "Agulha"),
	   (4,1, "Não é um ser vivo mas tem cinco dedos?", 					   "2019-06-04", "Luvas"),
	   (4,2, "O que sempre vem, mas nunca chega?", 						   "2019-06-04", "Amanhã"),
       (1,1, "Em que mês as pessoas dormem menos?",						   "2019-11-12", "Fevereiro"),
       (1,1, "O que é feito de água, mas se colocado dentro da mesma, irá morrer?", "2019-11-12", "Gelo"),
       (3,1, "Quem o faz, não o precisa. Quem o compra, não o usa. Quem o usa não pode o ver nem o sentir. O que é?", "2019-11-12", "Caixão");
       


insert into pontuacao
(usuarios_pontuacao_id, enigmas_pontuacao_id, pontos, data, progresso)
values (1,1, 100, "2019-06-06", "100"),
	   (2,1, 50,  "2019-06-22", "100"),
	   (3,1, 100, "2019-06-20", "100"),
	   (4,1, 90,  "2019-06-17", "100"),
	   (5,1, 10,  "2019-06-21", "100");
       
insert into categorias
(ds_categoria)
values ("Fácil"),
	   ("Médio"),
       ("Difícil"),
       ("Modo Deus");

insert into dicas
(categoria_dicas_id, dicas_enigmas_id, dicas_tipos_id, dica)
values (1,1,1, "Dica Ruim 1"),
	   (2,1,1, "Dica Media 1"),
	   (3,1,1, "Dica Otima 1"),
	   (1,2,1, "Dica Ruim 2"),
	   (2,2,1, "Dica Media 2"),
	   (3,2,1, "Dica Otima 2"),
	   (1,3,1, "Dica Ruim 3"),
	   (2,3,1, "Dica Media 3"),
	   (3,3,1, "Dica Otima 3"),
	   (1,4,1, "Dica Ruim 4"),
	   (2,4,1, "Dica Media 4"),
	   (3,4,1, "Dica Otima 4"),
	   (1,5,1, "Dica Ruim 5"),
	   (2,5,1, "Dica Media 5"),
	   (3,5,1, "Dica Otima 5"),
	   (1,6,1, "Dica Ruim 6"),
	   (2,6,1, "Dica Media 6"),
	   (3,6,1, "Dica Otima 6"),
	   (1,7,1, "Dica Ruim 7"),
	   (2,7,1, "Dica Media 7"),
	   (3,7,1, "Dica Otima 7"),
	   (1,8,1, "Dica Ruim 8"),
	   (2,8,1, "Dica Media 8"),
	   (3,8,1, "Dica Otima 8");