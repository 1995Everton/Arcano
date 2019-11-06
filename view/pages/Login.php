<div class="row justify-content-center">
    <div id="login" class="d-flex flex-column justify-content-center align-items-center">
        <div class="eye">
            <div class="shut"></div>
            <div class="ball">
                <div class="shine"></div>
            </div>
        </div>
        <div class="mouth"></div>
        <form action="index.php?pagina=autenticar" method="post" class="mx-3 mt-5">
            <div class="nes-field">
                <label class="text-white">E-Mail</label>
                <input type="text" class="nes-input is-dark" name="email">
            </div>
            <div class="nes-field">
                <label class="text-white">Senha</label>
                <input type="password" class="nes-input is-dark" name="senha">
            </div>
            <div class="mt-3">
                <button type="submit" class="nes-btn is-primary">Logar</button> 
            </div>
            <a href="index.php?pagina=cadastro" class="mt-2" style="font-size:20px">Não possui Cadastro?</a>
        </form>
    </div>
</div>
<script>
    $('input[type="password"]').focus(function() {
        $('.eye').addClass('up');
    });
    $('input[type="password"]').blur(function() {
        $('.eye').removeClass('up');
    });
    $('input[type="text"]').focus(function() {
        $('.eye').addClass('down');
    });
    $('input[type="text"]').blur(function() {
        $('.eye').removeClass('down');
    });
    $('input').blur(function() {
        $('.eye').addClass('blink');
        setTimeout(function() {
            $('.eye').removeClass('blink');
        },600);
    });
</script>