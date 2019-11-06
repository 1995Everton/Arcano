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
                    <tr class="cell-<?= $usuario['id_usuarios']?>">
                        <td data-label="ID"><?= $usuario['id_usuarios']?></td>
                        <td data-label="Nome"><?= $usuario['nome_usuario'];?></td>
                        <td data-label="Foto">
                            <img class="nes-avatar is-large" src="<?= $usuario['url_foto'];?>" style="image-rendering: pixelated;">
                        </td>
                        <td style="max-width: 50%">
                            <div class="d-flex justify-content-around align-items-center">
                                <a href="index.php?pagina=form-usuario&id=<?= $usuario['id_usuarios']?>" class="nes-btn is-primary">EDITAR</a>
                                <?= $modal($usuario['id_usuarios'],'Deletar','Deletar Usuário','Tem certeza que deseja continuar?');?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<script>
    $(function() {
        var $table = $('table').tablesorter({});
        $('.deletar').click(function () {
            let id = $(this).val();
            axios.get(`http://localhost/index.php?pagina=persistencia-usuario&acao=deletar&id=${id}`)
                .then( success =>{
                    let { status ,  data : { message , id } } = success.data
                    if(status == 202){
                        $(".cell-"+id).remove();
                        toast("Aviso",message)
                    }else{
                        toast("Aviso",message)
                    }
                })
                .catch(err => console.log(err))
        })
    });

</script>