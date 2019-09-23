<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="https://getbootstrap.com.br/docs/4.1/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
        Bootstrap
    </a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="index.php?pagina=home">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?pagina=enigma-home">Enigmas</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?pagina=login">Ranking</a></li>
        </ul>
    </div>
    <div class="profile">
        <div class="photo"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/764024/profile/profile-512.jpg"/></div>
            <div class="content">
                <div class="text">
                <h5>Usuário</h5>
                </div>
                <div class="btn btn-profile"><span></span></div>
            </div>
        <div class="box"><i class="fa fa-codepen"></i><i class="fa fa-facebook"></i><i class="fa fa-github"></i><i class="fa fa-tumblr"></i><i class="fa fa-twitter"></i></div>
    </div>
</nav>
<script>
    (function() {
        $('.btn-profile').click(function() {
            $(this).toggleClass('active');
            return $('.box').toggleClass('open');
        });
    }).call(this);
</script>
