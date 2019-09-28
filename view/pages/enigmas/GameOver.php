<div id="game-over"></div>
<script>
    $(function () {
        var drop = '<div class="game-over"><span>GAME OVER</span></div>';
        for (var i = 0; i < 100; i++) {
            drop += '<div class="drop"></div>'
        }
        $('#game-over').html(drop);
    });
</script>
