<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\User;

class CheckDuplicateServiceProvider extends ServiceProvider
{
    
    
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    
    /**
     * @param $data
     * @param string $fieldname
     * @return boolean
     */
    static function checkUserDuplicate($data, $fieldname)
    {
        
        if (count(User::where($fieldname, $data)->get()) === 0)
        {
            return false;
        }
        
        return true;
    }
}
