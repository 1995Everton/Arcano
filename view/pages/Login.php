<link rel="stylesheet" href="css/login.css">
<div class="row justify-content-center">
    <div id="login" class="d-flex flex-column">
        <div class="eye">
            <div class="shut"></div>
            <div class="ball">
                <div class="shine"></div>
            </div>
        </div>
        <div class="mouth"></div>
        <form action="index.php?pagina=fazer-login" method="post" class="mx-5">
            <div class="question">
                <input type="text" required name="email" />
                <label>E-Mail</label>
            </div>
            <div class="question">
                <input type="password" required name="senha"/>
                <label >Senha</label>
            </div>
            <div>
                <button type="submit"></button>
            </div>
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