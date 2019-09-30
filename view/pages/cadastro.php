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
        
        <input type="password" class="form-control" id="senha" name="senha" pattern="^(?=.*[a-zA-Z])(?=\w*[0-9])\w{6,12}$" placeholder="Senha"  > <!---->
    </div>
    <div class="form-group col-md-6">
        <input type="password" class="form-control" name="confsenha"  placeholder="Confirmar Senha" required> 
    </div>
    <div class="w-100"></div>
    <div class="form-group col-md-6">
    
        <button type="submit" class="btn btn-primary">Cadastrar</button>
        
    </div>
  </div>
</form>
<script>

var senha = document.getElementById("senha");

senha.addEventListener("input", function (event) {
    
  if (!senha.validity.customError) {
    senha.setCustomValidity("");
  } else {
    senha.setCustomValidity("A senha deve conter pelo menos uma letra e um numero!");
  }
});
//terminar de configurar a mensagem
</script>
<?php
$teste = isset($_GET['msg']) ? $_GET['msg'] : ""; 

echo $teste;

switch ($teste) {
    case 1:
        echo "<script>alert('Email invallido')</script>";
        break;
    
    case 2:
        echo "<script>alert('Nome de usuario já cadastrado')</script>";
        break;

    case 3:
        echo "<script>alert('Email já cadastrado')</script>";
        break;

    case 4:
        echo "<script>alert('Senhas não batem')</script>";
        break;

    case 5:
        echo "<script>alert('Senha curta demais')</script>";
        break;
    default:

        break;
}

?>
