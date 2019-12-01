<div class="container mt-4">
    <div class="nes-container is-rounded text-white" style="background-color: #1c2025d1;">
        <h1 class="text-center my-4">Ranking</h1>
        <div class="scrollbar" data-simplebar>
            <table class="force-overflow">
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
    </div>
</div>

<style>



</style>


<script>
    $(function(){
        $('table').tablesorter();
    });
</script>
