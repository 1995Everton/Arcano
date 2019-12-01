<?php

?>
<style>
    .perfil div{
        margin: 5px 0;
    }
    .nes-container{
        background-color: #1c2025d1;
    }
    .nes-input{
        background: white;
    }
</style>
<div class="container">
    <div class="nes-container row mt-4">
        <h2 class="nes-text text-white text-center w-100 col-12 mb-4">Meu Perfil</h2>
        <div class="col-4">
            <img src="https://gravatar.com/avatar/487f1157ec212e1eb69a68b848414b12?s=400&d=robohash&r=x" class="img-thumbnail">
        </div>
        <div class="row col-8 perfil">
            <div class="col-10">
                <div class="nes-field">
                    <label class="text-white">Nome de Usuário</label>
                    <input type="text"  class="nes-input" disabled value="<?= $usuario['nome_usuario']?>">
                </div>
            </div>
            <div class="col-10">
                <div class="nes-field">
                    <label class="text-white">E-Mail</label>
                    <input type="text"  class="nes-input" disabled value="<?= $usuario['email']?>">
                </div>
            </div>
            <div class="nes-select col-10">
                <label class="text-white">Titulos Obtidos</label>
                <select required id="default_select">
                    <?php foreach($titulo as $key => $value): ?>
                        <option value="<?= $key?>" ><?= $value;?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="col-5 mt-3">
                <span class="nes-text text-white mr-2">Total Pontuação</span>
                <a href="#" class="nes-badge w-50">
                    <span class="is-success"><?= $total_pontos['pontos']?></span>
                </a>
            </div>
            <div class="col-5  mt-3">
                <span class="nes-text text-white mr-2">Nº Tentativas</span>
                <a href="#" class="nes-badge w-50">
                    <span class="is-success"><?= $tentativas['tentativas']?></span>
                </a>
            </div>
        </div>
    </div>

</div>



