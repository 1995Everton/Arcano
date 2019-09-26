# Arcanos

![](https://img.shields.io/github/stars/pandao/editor.md.svg) ![](https://img.shields.io/github/forks/pandao/editor.md.svg) ![](https://img.shields.io/github/tag/pandao/editor.md.svg) ![](https://img.shields.io/github/release/pandao/editor.md.svg) ![](https://img.shields.io/github/issues/pandao/editor.md.svg) ![](https://img.shields.io/bower/v/editor.md.svg)

**Documentação**

# Banco De Dados ###
`MYSQL`
## Padrão de Uso ###
A extensão *PHP Data Objects* ( PDO ) define uma interface leve e consistente para acessar bancos de dados em PHP.
### SELECT ###
***Opções***

`$this->banco->select( sql , where , all ) : Array;`

| Opção | Type | Padrão | Descrição|
| ------------- | -------| -------| -------|
| `sql`             |  String  |  null | Query para consulta |
| `where`   |  Array  | [ ] | Array que representa os critérios de busca |
| `all`    |   Boolean | true | Retorna todos os dados ( ignora opção where )  |

    <?php
        $this->banco->select(
			"SELECT * FROM usuarios WHERE id_usuarios = ?",
			[2],
			false
		);
    ?>

### INSERT ###
***Opções***

`$this->banco->insert( table , value ) : Array;`

| Opção | Type | Padrão | Descrição|
| ------------- | -------| -------| -------|
| ` table`             |  String  |  null | Nome da tabela no banco |
| `value`   |  Array  | [ ] | Array Associativo ( campo => valor) que representa os os valores que serão inseridos no banco

    <?php
        $this->banco->insert('usuarios',
			[
				'categoria_usuarios_id' => 2,
				'nome_usuario' => 'everton',
				'senha' => '123',
				'email' => 'everton@gmail.com'
        	]
		);
    ?>
### UPDATE ###
***Opções***

`$this->banco->update( table , value , where ) : Array ;`

| Opção | Type | Padrão | Descrição|
| ------------- | -------| -------| -------|
| `table`             |  String  |  null | Query para consulta |
| `value`   |  Array  | [ ] | Array Associativo ( campo => valor) que representa os os valores que serão inseridos no banco
| `where`   |  Array  | [ ] | Array Associativo ( campo => valor) que representa os critérios de busca |

    <?php
        $this->banco->update('usuarios',
            [
            	'nome_usuario' => 'everton'
            ],
            [
                'id_usuarios' => 2
            ]
        );
    ?>
### DELETE ###
***Opções***

`$this->banco->delete(table , where  );`

| Opção | Type | Padrão | Descrição|
| ------------- | -------| -------| -------|
| `table`      |  String | nul  | Query para consulta |
| `where`   |  Array  | [   ] | Array Associativo ( campo => valor) que representa os critérios de busca |

    <?php
        $this->banco->delete('usuarios',
			[
				'id_usuarios' => 1
			]
		);
    ?>
