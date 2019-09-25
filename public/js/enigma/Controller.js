class Controller {
    constructor(inputEl,config) {
        this.input = inputEl
        this.config = config
        this.engine = new Engine(config,inputEl)
        this.main()
    }
    main(){
        let vm = this
        vm.input.focus();
        $('.container-enigma').on('click', function(e){
            vm.input.focus();
        });
        vm.input.on('keyup', function(e) {
            $('.new-output').text(vm.input.val());
        });
        $('.four-oh-four-form').on('submit',  function(e){
            e.preventDefault();
            var value = $(this).children(vm.input).val().toLowerCase();
            vm.engine.verificarResponsta(value);
        });
        this.plugins(this);
    }
    plugins(vm){
        //Color Pick
        let palette = ["#1ff042", "#060e1b", "#2ecc71","#1abc9c", "#16a085","#ff0000","#a900ff","#fbbb00","#fb6800"];
        $(".picker-background").colorPick({
            palette,
            'initialColor': this.config.background,
            'onColorSelected': function() {
                vm.config.background = this.color;
                vm.engine.colorPrompt(vm.config.color,vm.config.background)
                this.element.css({'backgroundColor': this.color, 'color': this.color});
            } 
        });
        $(".picker-color").colorPick({ 
            palette,
            'initialColor': this.config.color,
            'onColorSelected': function() {
                vm.config.color = this.color;
                vm.engine.colorPrompt(vm.config.color,vm.config.background)
                this.element.css({'backgroundColor': this.color, 'color': this.color});
              
            } 
        });
         
    }
}