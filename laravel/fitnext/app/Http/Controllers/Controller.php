<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    function addNotif($type, $text) {
      session_start();
      $_SESSION['notif'] = ['type' => $type, 'text' => $text];
    }
}
