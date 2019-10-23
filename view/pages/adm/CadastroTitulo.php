<?php
/**
 * Created by PhpStorm.
 * User: amanda_hess
 * Date: 07/10/2019
 * Time: 21:55
 */
?>
<style>
    .test{
        margin-top: 20px;
    }
</style>
<div class="container my-5" >
    <div class="nes-container with-title is-centered" >
        <p class="bg-transparent text-white" style="font-size: 30px">Cadastro de Títulos</p>
        <form action="index.php?pagina=persistenciatitulo"  method="POST" >
            <div class="row justify-content-center align-items-center" >
                <div class="col-4 mt-2">
                    <div class="nes-field">
                        <label for="resposta" class="text-white text-left">Nome Título</label>
                        <input type="text" name="titulo" id="titulo" class="nes-input">
                    </div>
                </div>
                <div class="w-100"></div>
                <div class="test">
                    <button type="submit" class="nes-btn is-success btn-block">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
</div>