<script>

var senha = document.getElementById("senha");

senha.addEventListener("input", function (event) {
  if (senha.validity.typeMismatch) {
    senha.setCustomValidity("A senha deve conter pelo menos uma letra e um numero!");
  } else {
    senha.setCustomValidity("");
  }
});
//terminar de configurar a mensagem
</script>
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
        
        <input type="password" class="form-control" id="senha" name="senha" ^(?=.*[0-9])(?=.*[a-zA-Z])[a-zA-Z0-9]{6,16}$ placeholder="Senha"  >
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
<?php
$teste = isset($_GET['msg']); 


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
