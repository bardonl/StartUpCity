<?php
/**
 * Created by PhpStorm.
 * User: Bart de Geus
 * Date: 23-10-2017
 * Time: 11:59
 */

namespace App\Jobs;

use App\User;

class CheckUrlJob
{
    /**
     * @return array/boolean
     */
    public static function checkUrl()
    {
        $urlItems = explode('/', $_SERVER['REQUEST_URI']);
        $id = end($urlItems);
        
        if (is_numeric($id)) {
            
            return User::findOrFail($id);
        } else {
            
            return auth()->user();
        }
    }
}