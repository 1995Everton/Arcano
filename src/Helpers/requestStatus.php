<?php


namespace Arcanos\Enigmas\Helpers;


trait requestStatus
{
    public function deleteStatus($resultado)
    {
        $response = "";
        if($resultado){
            $response = [
                'status' => 202,
                'data' =>[
                    'id' => $_GET['id'],
                    'message' => 'Item Deletado Com Sucesso!'
                ]
            ];
        }else{
            $response = [
                'status' => 500,
                'data' =>[
                    'id' => $_GET['id'],
                    'message' => 'Erro ao Deletar Item!'
                ]
            ];
        }
        echo json_encode($response);
    }
}