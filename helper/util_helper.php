<?php 
namespace app\helper;

class util_helper{

    public static function randomString(){
        $string = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYX1234567890!@#$%^&*()-+';
        $randomString = '';
        for($i = 0; $i<12; $i++){
            $index = random_int(0, strlen($string) - 1);
            $randomString .= $string[$index];
        }
        return $randomString;
    }
}
?>