<?php
class Input{
    public static function Get($name){
        if (isset($_POST[$name])) {
            return $_POST[$name];
        }
        else if(isset($_GET[$name])){
            return $_GET[$name];
        }
        else {
            return false;
        }
    }
}
?>