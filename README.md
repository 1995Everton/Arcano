# Arcanos

![](https://img.shields.io/github/stars/pandao/editor.md.svg) ![](https://img.shields.io/github/forks/pandao/editor.md.svg) ![](https://img.shields.io/github/tag/pandao/editor.md.svg) ![](https://img.shields.io/github/release/pandao/editor.md.svg) ![](https://img.shields.io/github/issues/pandao/editor.md.svg) ![](https://img.shields.io/bower/v/editor.md.svg)

**Documentação**

#Padrão de Desenvolvimento MVC
MVC significa **Model** – **View** – **Controller** (Modelo – Visão – Controlador)  e é um modelo da arquitetura de software que tem a função de separar front-end (que o usuário vê) do back-end (que é o motor da aplicação).

A estrutura MVC funciona da seguinte maneira:

- **Model** (modelo) – O Model é responsável por tratar de tudo que é relacionado com os dados, como criar, ler, atualizar e excluir valores da base de dados (CRUD), tratar das regras de negócios, da lógica e das funções. Apesar de fazer isso tudo, o Model não apresenta nada na tela e não executa nada por si. Normalmente, um View requisita que determinado Model execute uma ação e a mesma é executada dentro do View.

- **View** (Visão) – O View é a parte que o usuário vê na tela, como HTML, JavaScript, CSS, Imagens e assim por diante. O View não tem nenhuma ação, mas requisita que o Model execute qualquer ação e mostra os valores retornados para o usuário. É importante ressaltar que um View não depende de nenhum Model, por exemplo, se você vai apenas exibir dados HTML na tela, e não vai precisar de base de dados, talvez um Model não seja necessário.

- **Controller** (Controlador) – O Controller é responsável por resolver se um Model e/ou um View é necessário. Caso positivo; ele incluirá os arquivos e funções necessárias para o sistema funcionar adequadamente.

Veja uma imagem representando como o modelo **MVC** funciona:

![](https://i.stack.imgur.com/Beh3a.png)

Na imagem acima temos uma apresentação de como a informação vai passar pelo nosso sistema. Veja uma descrição:

1. O ***Browser*** (Navegador) realiza a solicitação para o ***Web Server*** (Servidor) aonde se encontra toda a logica de negocio da aplicação .
2. O ***Web Server*** (Servidor) verifica qual ***Routes*** (Rotas ou URL) o ***Browser*** (Navegador) quer acessar .
3. A ***Routes*** (Rotas ou URL) ***Dispatcher*** (envia) a solicitação para uma ***Controller*** (Controlador) .
4. O ***Controller*** (Controlador) começa a executar a logica de negocio da aplicação.
5. Primeiro ele pede ao  ***Model*** (Modelo) para consultar, adicionar, atualizar ou deletar os dados no ***MYSQL*** (Banco de Dados) e retornar a informação novamente para o ***Controller*** (Controlador) .
6. Assim que a ***Controller*** (Controlador) recebe esses dados, ele monta as informações necessaria e chama a ***View*** (Visão) em seguinda, que cria toda a pagina que o ***Browser*** (Navegador) vai exibir .
7. A ***View*** (Visão) devolve a pagina ao  ***Controller*** (Controlador) que comunica ao servidor ***Web Server*** (Servidor) que já terminou o processamento das informações.
8. E por fim o ***Web Server*** (Servidor) finaliza a requisição mandando a pagina ao  ***Browser*** (Navegador) que exibe ela para o usuario final.

###Estrutura de pastas

Nossas pastas ficarão da seguinte maneira:


    ├── config
            ├──Routes.php
    ├── public
		    ├──css
		           ├──styles.css
	        ├──js
				   ├──script.js
            ├──img
				   ├──imagem.png
			├──index.php
    ├── src
		    ├──Controllers
		           ├──Controller.php
	        ├──Helpers
				   ├──helpers.php
            ├──Models
				   ├──Crud.php
	├── vendor
            ├──autoloader.php
    ├── view
            ├──pages
					├──Pagina.php
			├──BasePagina.php
    ├── LICENSE
    └── README.md

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
    
    
### Bibliotecas ###
***Componentes em 8-bits***
https://nostalgic-css.github.io/NES.css/
