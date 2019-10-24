<?php
/**
 * Created by PhpStorm.
 * User: everton_p_cardoso
 * Date: 23/10/2019
 * Time: 22:52
 */

namespace Arcanos\Enigmas\Helpers;

class renderModal
{

    public function getModal()
    {
        return array(new Modal(),"modal");
    }

}


class Modal
{

    public function modal ($titulo_botao, $titulo_modal, $sub_titulo, $params){
        echo '
			<button type="button" class="nes-btn is-primary" data-toggle="modal" data-target="#modalExemplo">
			'.$titulo_botao.'
			</button>
			<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">'.$titulo_modal.'</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">'.$sub_titulo.'</div>
				<div class="modal-footer">
					<button type="button" class="nes-btn is-primary" data-dismiss="modal">CANCELAR</button>
					<a href="index.php?'.$params.'" class="nes-btn is-danger">DELETAR</a>
				</div>
				</div>
			</div>
			</div>';
    }
}