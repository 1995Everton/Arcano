
    function toast(cabecalho,mensagem,color = "") {
        $("#toast").html(
            `<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
              <div class="toast-header">
                <strong class="mr-auto">${cabecalho}</strong>
                <small>Agora</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="toast-body">${mensagem}</div>
            </div>`
        );
        $('.toast').toast('show')
    }



