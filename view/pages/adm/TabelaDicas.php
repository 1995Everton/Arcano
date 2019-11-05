<div class="container mt-4">
    <div class="nes-container is-rounded">
        <div class="row mb-5 pt-4">
            <div class="col-6 d-flex justify-content-around text-white align-items-center">
                <span class="nes-text is-primary text-white h4">Dicas</span>
                <i class="fas fa-angle-right fa-2x"></i>
                <a href="index.php?pagina=form-dicas" class="nes-btn is-success">Nova Dica</a>
            </div>
            <div class="col-2"></div>
            <div class="col-4">
                <input style="font-size:12px" class="search nes-input" type="search" placeholder="Search" data-column="all">
            </div>
        </div>
        <div class="scrollbar" data-simplebar>
            <table class="force-overflow tablesorter">
                <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Dica</th>
                    <th class="text-center">Enigma</th>
                    <th class="text-center">Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($dicas as $key =>$dica):?>
                    <tr>
                        <td data-label="ID"><?= $dica['id_dicas']?></td>
                        <td data-label="Dica"><?= $dica['dica'];?></td>
                        <td data-label="Enigma"><?= $dica['enigma'];?></td>
                        <td style="max-width: 50%">
                            <div class="d-flex justify-content-around align-items-center">
                                <a href="index.php?pagina=form-dicas&id=<?= $dica['id_dicas']?>" class="nes-btn is-primary">EDITAR</a>
                                <?= $modal($key,'Deletar','Deletar Dica','Tem certeza que deseja continuar?',"pagina=persistencia-dicas&acao=deletar&id=$dica[id_dicas]");?>
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
    });

</script>