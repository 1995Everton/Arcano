<?php
/**
 * Created by PhpStorm.
 * User: everton_p_cardoso
 * Date: 18/09/2019
 * Time: 21:05
 */

namespace Arcanos\Enigmas\Helpers;


trait segurityCrypt
{
    private $_salt = 'Cf1f11ePArKlBJomM0F6aJ';
    private $_saltCost = '8';

    public function criptografar($value)
    {
        $hash = crypt($value, $this->_saltCost . '$' . $this->_salt );
        return $hash;
    }

    public function compararHash($senha,$senhaCriptografar)
    {
        if (crypt($senha,$senhaCriptografar) === $senhaCriptografar){
            return true;
        }else{
            return false;
        }
    }
}