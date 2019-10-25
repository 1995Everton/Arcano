<?php
namespace Arcanos\Enigmas\Controllers;

use Arcanos\Enigmas\Helpers\renderHTML;
use Arcanos\Enigmas\Helpers\renderModal;
use Arcanos\Enigmas\Helpers\renderToast;
use Arcanos\Enigmas\Helpers\segurityCrypt;
use Arcanos\Enigmas\Models\Crud;

abstract class Banco
{
    use renderHTML,segurityCrypt,renderToast,renderModal;
    protected $banco;

    public function __construct()
    {
        $this->banco = new Crud();
    }

}