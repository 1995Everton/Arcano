<div class="container mt-4">
    <div style="color: white" class="scrollbar" id="style-11">
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
