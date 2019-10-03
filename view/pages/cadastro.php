<form action="index.php?pagina=persistenciausuario" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
        <input type="text" class="form-control" name="usuario" placeholder="Usuario" required>
    </div>
    <div class="form-group col-md-6">
        <input type="text" class="form-control" name="email" placeholder="Email" required>
    </div>
    <div class="w-100"></div>
    <div class="form-group col-md-6">
        
        <input type="password" class="form-control" id="senha" name="senha" pattern="^(?=.*[a-zA-Z])(?=\w*[0-9])\w{6,12}$" placeholder="Senha" required> <!---->
    </div>
    <div class="form-group col-md-6">
        <input type="password" class="form-control" name="confsenha" pattern="^(?=.*[a-zA-Z])(?=\w*[0-9])\w{6,12}$" placeholder="Confirmar Senha" required> 
    </div>
    <div class="w-100"></div>
    <div class="form-group col-md-6">
    
        <button type="submit" class="btn btn-primary">Cadastrar</button>
        
    </div>
  </div>
</form>
<!--<div class="toast bg-?danger" data-delay="4000">
                <div class="toast-header">
                    <strong class="mr-auto">ERRO</strong>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <i class="nes-icon close is-small"></i>
                    </button>
                </div>
                <div class="toast-body ">A senha deve conter pelo menos uma letra e um numero!</div>
            </div>-->
<script>

var senha = document.getElementById("senha");

senha.addEventListener("input", function (event) {
    
  if (!senha.validity.customError) {
    senha.setCustomValidity("A senha deve conter pelo menos uma letra e um numero!");
  } else {
    //$('.toast').toast('show')
    senha.setCustomValidity("");
  }
});
//terminar de configurar a mensagem
</script>
