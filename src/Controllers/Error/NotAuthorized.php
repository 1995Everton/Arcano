<?php


namespace Arcanos\Enigmas\Controllers\Error;


use Arcanos\Enigmas\Controllers\RequestHandlerInterface;
use Arcanos\Enigmas\Helpers\renderHTML;

class NotAuthorized  implements RequestHandlerInterface
{
    use renderHTML;

    public function handle()
    {
       $this->view("NotAuthorized.php");
    }
}