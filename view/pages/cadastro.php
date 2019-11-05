<style>
    .caixa{
        width: 25%;
        height: 15%;
        padding: 2%;
        background-color: #1c2025d1;
        color: white;
        border-radius: 10px;
        margin-top:4%;
        margin-left: 37.5%;
        z-index: 17;
        position: relative;
        text-align: center;
    }
    .test{
        margin-top: 5%;
    }


</style>

<form action="index.php?pagina=novo-usuario" method="POST" >
  <div class="caixa">
    <div class="nes-field ">
        <h2>Cadastro</h2>
        <label class="text-white">Usuario</label>
        <input type="text" class="nes-input is-dark" name="usuario" placeholder="" required>
    </div>
    <div class="nes-field ">
        <label class="text-white">E-mail</label>
        <input type="text" class="nes-input is-dark" name="email" placeholder="" required>
    </div>
    <div class="w-100"></div>
    <div class="nes-field ">
        <label class="text-white">Senha</label>
        <input type="password" class="nes-input is-dark" id="senha" name="senha" pattern="^(?=.*[a-zA-Z])(?=\w*[0-9])\w{8,}$" placeholder="" required> <!---->
    </div>
    <div class="nes-field ">
        <label class="text-white">Confirmar Senha</label>
        <input type="password" class="nes-input is-dark" name="confsenha" pattern="^(?=.*[a-zA-Z])(?=\w*[0-9])\w{8,}$" placeholder="" required>
    </div>
    <div class="test">
        <div class="col-md-12 justify-content-center d-flex align-itens-center">

        <button type="submit" class="btn btn-primary">Cadastrar</button>
        <a href="index.php?pagina=login" class="btn btn-primary" >Voltar</a>

        </div>
    </div>
  </div>
</form>

<script>

var senha = document.getElementById("senha");

senha.addEventListener("input", function (event) {
    
  if (!senha.validity.customError) {
    senha.setCustomValidity("A senha deve conter pelo menos uma letra e um numero!");
  } else {
    
    senha.setCustomValidity("");
  }
});

</script>
