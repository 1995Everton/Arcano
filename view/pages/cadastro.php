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
        <input type="password" class="form-control" name="senha" placeholder="Senha" minlength="4" required>>
    </div>
    <div class="form-group col-md-6">
        <input type="password" class="form-control" name="confsenha" placeholder="Confirmar Senha" required> 
    </div>
    <div class="w-100"></div>
    <div class="form-group col-md-6">
    
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
  </div>
</form>

