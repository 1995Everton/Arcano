<!--<table class="table">-->
<!--    <thead>-->
<!--        <tr>-->
<!--            <th scope="col">#</th>-->
<!--            <th scope="col">Nome</th>-->
<!--            <th scope="col">Pontuação</th>-->
<!--            <th scope="col">Progresso</th>-->
<!--            <th scope="col">Data</th>-->
<!--        </tr>-->
<!--    </thead>-->
<!--    <tbody>-->
<!--        --><?php //foreach ($ranking as $key =>$usuario):?>
<!--            <tr>-->
<!--                <th scope="row">--><?//= $key;?><!--</th>-->
<!--                <td>--><?//= $usuario['nome_usuario'];?><!--</td>-->
<!--                <td>--><?//= $usuario['pontos'];?><!--</td>-->
<!--                <td>--><?//= $usuario['progresso']."%";?><!--</td>-->
<!--                <td>--><?//= date("d/m/Y", strtotime($usuario['data']));?><!--</td>-->
<!--            </tr>-->
<!--        --><?php //endforeach;?>
<!--    </tbody>-->
<!--</table>-->

<link rel="stylesheet" href="css/table.css">
        <div style="color: white" class="container">
            <table>
                <thead>
                <tr>
                    <th>Nº</th>
                    <th>Nome</th>
                    <th>Pontuação</th>
                    <th>Progresso</th>
                    <th>Data</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($ranking as $key =>$usuario):?>
                    <tr>
                        <td data-label="Nº"><?= $key;?></td>
                        <td data-label="Nome"><?= $usuario['nome_usuario'];?></td>
                        <td data-label="Pontuação"><?= $usuario['pontos'];?></td>
                        <td data-label="Progresso"><?= $usuario['progresso']."%";?></td>
                        <td data-label="Data"><?= date("d/m/Y", strtotime($usuario['data']));?></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.30.1/js/jquery.tablesorter.min.js'></script>
<script>
    $(function(){
        $('table').tablesorter();
    });
</script>
