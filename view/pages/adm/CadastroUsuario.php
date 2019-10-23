<div class="container mt-4">
    <div style="color: white" class="scrollbar" id="style-11">
        <table class="force-overflow">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Foto</th>
                <th>Açoes</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($usuarios as $key =>$usuario):?>
                <tr>
                    <td data-label="ID"><?= $usuario['id_usuarios']?></td>
                    <td data-label="Nome"><?= $usuario['nome_usuario'];?></td>
                    <td data-label="Foto">
                        <img class="nes-avatar is-large" src="<?= $usuario['url_foto'];?>" style="image-rendering: pixelated;">
                    </td>
                    <td style="max-width: 50%">
                        <div class="d-flex justify-content-around align-items-center">
                            <form method="POST" action="index.php?pagina=enigma-persistencia&acao=editar&id=<?= $usuario['id_usuarios']?>">
                                <button type="submit" class="nes-btn is-primary">EDITAR</button>
                            </form>
                            <form method="POST" action="index.php?pagina=enigma-persistencia&acao=deletar&id=<?= $usuario['id_usuarios']?>">
                                <button type="submit" class="nes-btn is-error">DELETAR</button>
                            </form>
                        </div>
                    </td>

                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>

<style>


    .scrollbar
    {
        float: left;
        height: 80vh;
        width: 100%;
        overflow-y: scroll;
    }

    .force-overflow
    {
        min-height: 450px;
    }
    #style-11::-webkit-scrollbar {
        width: 10px;
        background-color: #F5F5F5;
    }
    #style-11::-webkit-scrollbar-track {
        border-radius: 10px;
        background: rgba(0,0,0,0.1);
        border: 1px solid #ccc;
    }

    #style-11::-webkit-scrollbar-thumb {
        border-radius: 10px;
        background: linear-gradient(left, #fff, #e4e4e4);
        border: 1px solid #aaa;
    }

    #style-11::-webkit-scrollbar-thumb:hover {
        background: #fff;
    }

    #style-11::-webkit-scrollbar-thumb:active {
        background: linear-gradient(left, #22ADD4, #1E98BA);
    }


</style>


<script>
    $(function(){
        $('table').tablesorter();
    });

</script>