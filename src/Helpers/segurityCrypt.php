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
        $hash = crypt($value, '$2a$' . $this->_saltCost . '$' . $this->_salt . '$');
        return $hash;
    }

    public function compararHash($value,$hash)
    {
        if (crypt($value, $hash) === $hash){
            return true;
        }else{
            return false;
        }
    }
}