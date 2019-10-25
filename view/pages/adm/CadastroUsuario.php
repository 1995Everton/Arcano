<div class="container mt-4">
    <div class="scrollbar" data-simplebar>
        <table class="force-overflow">
            <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Nome</th>
                <th class="text-center">Foto</th>
                <th class="text-center">Ações</th>
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
                            <a href="index.php?pagina=usuario-persistencia&acao=editar&id=<?= $usuario['id_usuarios']?>" class="nes-btn is-primary">EDITAR</a>
                            <?= $modal($key,'Deletar','Deletar Usuários','Tem certeza que deseja continuar?',"pagina=usuario-persistencia&acao=deletar&id=$usuario[id_usuarios]");?>
                        </div>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(function(){
        $('table').tablesorter();
    });
</script>