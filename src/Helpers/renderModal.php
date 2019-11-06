<?php
/**
 * Created by PhpStorm.
 * User: everton_p_cardoso
 * Date: 23/10/2019
 * Time: 22:52
 */

namespace Arcanos\Enigmas\Helpers;
trait renderModal
{
    public function getCallbackModal(){
        return array('Arcanos\Enigmas\Helpers\Modal','modal');
    }
}

class Modal
{
    public static function modal ($id,$titulo_botao, $titulo_modal, $sub_titulo,$color_button = "is-error"){
        return '
			<button type="button" class="nes-btn '.$color_button.'" data-toggle="modal" data-target="#modalNumero'.$id.'" data-backdrop="false">
			'.$titulo_botao.'
			</button>
			<div class="modal fade" id="modalNumero'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark">'.$titulo_modal.'</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-dark text-justify">'.$sub_titulo.'</div>
                        <div class="modal-footer d-flex justify-content-around">
                            <button type="button" class="nes-btn" data-dismiss="modal">CANCELAR</button>
                            <button class="nes-btn is-error deletar" value="'.$id.'">DELETAR</button>
                        </div>
                    </div>
                </div>
			</div>';
    }
}