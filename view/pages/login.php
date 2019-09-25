<div class="sky">
    <div class="sky-level">
    </div>
    <div class="sky-level"></div>
    <div class="sky-level"></div>
    <div class="sky-level"></div>
    <div class="sky-level"></div>
    <div class="sky-level"></div>
    <div id="stars" class="sky-stars">
        <img style="position: fixed;width: 100%; height: 100%" src="img/star.gif">
        <div class="center">
            <div id="login">

                <div class="eye">
                    <div class="shut"></div>
                    <div class="ball">
                        <div class="shine"></div>
                    </div>
                </div>
                <div class="mouth"></div>
                <form action="index.php?pagina=fazer-login" method="post">
                    <div>
                        <span class="icon"><i class="fa fa-user"></i></span>
                        <input type="text" placeholder="E-Mail" name="email" />
                    </div>
                    <br />
                    <div>
                        <span class="icon lock"><i class="fa fa-lock"></i></span>
                        <input type="password" placeholder="Senha" name="senha"/>
                    </div>
                    <div class="btns">
                        <button type="submit" class="button btn btn-block btn-info">Login</button>
                    </div>
                </form>
            </div>
        </div>
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