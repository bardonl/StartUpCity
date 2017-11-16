<?php

namespace App\Providers;

class UniqueIdServiceProvider
{
    public function checkBase64Uuid()
    {
        while ($this->createBase64Uuid()) {
            $this->createBase64Uuid();
        }
    }
    
    /**
     * @return string $intString (base64)
     */
    public static function createBase64Uuid()
    {
        $randomInt = rand(1, 999999999);
        $shuffledInt = str_shuffle($randomInt);
        $intString = str_shuffle($shuffledInt . uniqid('', $more_entropy = true));
        
        return base64_encode($intString);
    }
    
}