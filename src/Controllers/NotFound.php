<?php


namespace Arcanos\Enigmas\Controllers;


use Arcanos\Enigmas\Helpers\renderHTML;

class NotFound implements RequestHandlerInterface
{
    use renderHTML;

    public function handle()
    {
        $this->view("NotFound.php");
    }
}