<style>
  form .nes-field{
      margin: 1em 0;
  }
  .w-50{
      background-color: #1c2025d1;
  }
</style>
<div class="container justify-content-center d-flex">
    <div class="w-50 position-relative nes-container is-rounded mt-5">
        <h2 class="text-white text-center my-4">Cadastro</h2>
        <form action="index.php?pagina=novo-usuario" method="POST" >
            <div class="row">
                <div class="nes-field col-12 ">
                    <label class="text-white">Usuário</label>
                    <input type="text" class="nes-input is-dark" name="usuario" placeholder="" required>
                </div>
                <div class="nes-field col-12 ">
                    <label class="text-white">E-Mail</label>
                    <input type="text" class="nes-input is-dark" name="email" placeholder="" required>
                </div>
                <div class="nes-field col-6 ">
                    <label class="text-white">Senha</label>
                    <input type="password" class="nes-input is-dark" id="senha" name="senha" pattern="^(?=.*[a-zA-Z])(?=\w*[0-9])\w{8,}$" placeholder="" required oninvalid="setCustomValidity('A senha deve conter pelo menos uma letra, um numero e 8 caracteres!')" onchange="try{setCustomValidity('')}catch(e){}"> <!---->
                </div>
                <div class="nes-field col-6">
                    <label class="text-white">Confirmar Senha</label>
                    <input type="password" class="nes-input is-dark" id="confsenha" name="confsenha"  placeholder="" required>
                </div>
                <div class="col-md-12 justify-content-around  d-flex align-itens-center">
                    <a href="index.php?pagina=login" class="nes-btn" >Voltar</a>
                    <button type="submit" class="nes-btn is-success">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!--<script>

var senha = document.getElementById("senha");
var confsenha = document.getElementById("confsenha");

senha.addEventListener("input", function (event) {
  if (senha.validity.patternMismatch) {
    senha.setCustomValidity("A senha deve conter pelo menos uma letra, um numero e 8 caracteres!");
   } else if(senha.value != confsenha.value){

    senha.setCustomValidity("Senhas não batem");
});

</script>_-->
