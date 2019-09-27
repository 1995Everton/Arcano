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
        <form action="index.php?pagina=autenticar" method="post" class="mx-5">
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
<!--<link rel="stylesheet" href="css/login2.css">-->
<!--<div class="row justify-content-center">-->
<!--    <div id="login" class="d-flex flex-column">-->
<!--        <div id="app">-->
<!--            <div class="eye">-->
<!--                            <div class="shut"></div>-->
<!--                            <div class="ball">-->
<!--                                <div class="shine"></div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--            <transition name="fade" mode="out-in" appear="appear" v-cloak="v-cloak">-->
<!--                <form @submit="checkPassword" v-if="!logged_in">-->
<!--                    <label for="1up">1up</label>-->
<!--                    <input ref="name" id="1up" type="text"/>-->
<!--                    <label for="password">Password</label>-->
<!--                    <div class="scene-wrapper">-->
<!--                        <input @keyup.enter="runPacman" ref="password" id="password" type="password" v-model="password_entered" :class="{invalid : password_invalid}" :disabled="disableInput()"/>-->
<!--                        <transition :name="transitionPacman" v-on:after-enter="checkPassword">-->
<!--                            <div class="pac-wrapper" v-if="animate_pacman">-->
<!--                                <div class="pacman"></div>-->
<!--                            </div>-->
<!--                        </transition>-->
<!--                        <transition name="cover">-->
<!--                            <div class="input-cover" v-if="animate_pacman || animate_ghost"></div>-->
<!--                        </transition>-->
<!--                        <transition name="ghost" v-on:after-enter="resetAnimation">-->
<!--                            <div class="ghost-wrapper" v-if="animate_ghost">-->
<!--                                <div class="ghost" :class="{runaway : password_match}"></div>-->
<!--                            </div>-->
<!--                        </transition>-->
<!--                    </div>-->
<!--                    <input @click="runPacman" ref="start" type="button" value="Press Start" :disabled="disableInput()"/>-->
<!--                </form>-->
<!--                <div class="logged-in" v-else="v-else">-->
<!--                    <p>You are now logged in.</p>-->
<!--                    <p>Game over!</p>-->
<!--                    <input @click="startOver" ref="start" type="button" value="Login Again!"/>-->
<!--                </div>-->
<!--            </transition>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.15/vue.js'></script>-->
<!--<script  src="js/login.js"></script>-->