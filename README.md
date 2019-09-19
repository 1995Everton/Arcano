# Arcano 
Projeto de conclusão de Curso 

** Comandos **

1. composer install
2. composer dumpautoload

### Banco

````
 $this->banco->insert('usuarios',[
            'categoria_usuarios_id' => 2,
            'nome_usuario' => 'everton3',
            'senha' => '123',
            'email' => 'everton3@gmail.com'
        ]);

        $this->banco->delete('usuarios',[
            'id_usuarios' => 1
        ]);
        $this->banco->update('usuarios',
            [
            'nome_usuario' => 'everton'
            ],
            [
                'id_usuarios' => 2
            ]
        );
        $lista =  $this->banco->select("SELECT * FROM usuarios WHERE id_usuarios = ? ",[2],false);
 ````