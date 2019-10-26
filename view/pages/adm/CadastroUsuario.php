<div class="container mt-4">
    <div class="nes-container is-rounded">
        <div class="row mb-5 pt-4">
            <div class="col-6 d-flex justify-content-around text-white align-items-center">
                <span class="nes-text is-primary text-white h4">Usuários</span>
                <i class="fas fa-angle-right fa-2x"></i>
                <a href="index.php?pagina=form-usuario" class="nes-btn is-success">Novo Usuário</a>
            </div>
            <div class="col-2"></div>
            <div class="col-4">
                <input  class="search nes-input" type="search" placeholder="Search" data-column="all">
            </div>
        </div>
        <div class="scrollbar" data-simplebar>
            <table class="force-overflow tablesorter">
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
                                <a href="index.php?pagina=form-usuario&id=<?= $usuario['id_usuarios']?>" class="nes-btn is-primary">EDITAR</a>
                                <?= $modal($key,'Deletar','Deletar Usuários','Tem certeza que deseja continuar?',"pagina=usuario-persistencia&acao=deletar&id=$usuario[id_usuarios]");?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>

        </div>
    </div>
</div>


<style>
    .scrollbar {
        height: 54vh;
        color: white;
    }
</style>

<script>
    $(function() {
        var $table = $('table').tablesorter({});
    });

</script>