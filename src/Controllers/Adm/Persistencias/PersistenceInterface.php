<?php


namespace Arcanos\Enigmas\Controllers\Adm\Persistencias;


interface PersistenceInterface
{
    public function getID();
    public function validarPost();
    public function novo();
    public function editar();
    public function deletar();
}