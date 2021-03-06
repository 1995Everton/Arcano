<div class="container mt-4">
    <div class="nes-container is-rounded" style="background-color: #1c2025d1;">
        <div class="row mb-5 pt-4">
            <div class="col-6 d-flex justify-content-around text-white align-items-center">
                <span class="nes-text is-primary text-white h4">Enigmas</span>
                <i class="fas fa-angle-right fa-2x"></i>
                <a href="index.php?pagina=form-enigma" class="nes-btn is-success">Novo Enigma</a>
            </div>
            <div class="col-2"></div>
            <div class="col-4">

            </div>
        </div>
        <div class="scrollbar" data-simplebar>
            <table class="force-overflow tablesorter">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Enigma</th>
                        <th class="text-center">Resposta</th>
                        <th class="text-center">Dif.</th>
                        <th class="text-center">Tipo</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($enigmas as $key => $enigma) : ?>
                        <tr class="cell-<?= $enigma['id_enigmas'] ?>">
                            <td data-label="ID"><?= $enigma['id_enigmas'] ?></td>
                            <td data-label="Enigma"><?= $enigma['enigma'] ?></td>
                            <td data-label="Resposta"><?= $enigma['resposta']; ?></td>
                            <td data-label="Dif."><?= $enigma['ds_dificuldade']; ?></td>
                            <td data-label="Tipo"><?= $enigma['ds_tipo']; ?></td>
                            <td style="max-width: 50%">
                                <div class="d-flex justify-content-around align-items-center">
                                    <a href="index.php?pagina=form-enigma&acao=editar&id=<?= $enigma['id_enigmas'] ?>" class="nes-btn is-primary">EDITAR</a>
                                    <?= $modal($enigma['id_enigmas'], 'Deletar', 'Deletar Enigma', 'Tem certeza que deseja continuar?'); ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(function() {
        var $table = $('table').tablesorter({});
        $('.deletar').click(function() {
            let id_usuario = $(this).val();
            axios.get(`index.php?pagina=persistencia-enigma&acao=deletar&id=${id_usuario}`)
                .then(success => {
                    let {
                        status,
                        data: {
                            message,
                            id
                        }
                    } = success.data
                    if (status == 202) {
                        $(".cell-" + id).remove();
                        toast("Aviso", message)
                    } else {
                        toast("Aviso", message)
                    }
                })
                .catch(err => console.log(err))
        })
    });
</script>