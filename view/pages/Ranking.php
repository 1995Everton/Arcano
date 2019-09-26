<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Pontuação</th>
            <th scope="col">Progresso</th>
            <th scope="col">Data</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ranking as $key =>$usuario):?>
            <tr>
                <th scope="row"><?= $key;?></th>
                <td><?= $usuario['nome_usuario'];?></td>
                <td><?= $usuario['pontos'];?></td>
                <td><?= $usuario['progresso']."%";?></td>
                <td><?= date("d/m/Y", strtotime($usuario['data']));?></td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>
