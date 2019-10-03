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
                        <td data-label="Nº"><?= ($key+1)."º";?></td>
                        <td data-label="Nome"><?= $usuario['nome_usuario'];?></td>
                        <td data-label="Pontuação">
                            <a href="#" class="nes-badge">
                                <span class="is-primary"><?= $usuario['pontos'];?></span>
                            </a>
                        </td>
                        <td data-label="Progresso">
                            <a href="#" class="nes-badge">
                                <span class="is-success"><?= $usuario['progresso']."%";?></span>
                            </a>
                        </td>
                        <td data-label="Data"><?= date("d/m/Y", strtotime($usuario['data']));?></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
<script>
    $(function(){
        $('table').tablesorter();
    });
</script>
