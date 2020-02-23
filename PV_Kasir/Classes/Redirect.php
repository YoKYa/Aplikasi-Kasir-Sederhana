<?php
    class Redirect{
        public static function To($lokasi){
            header('Location:'.$lokasi.'.php' );
        }
    }
?>
    