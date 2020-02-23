<?php
class Session {
    public static function Cek($nama){
        return (isset($_SESSION[$nama]))? true : false ;
    }
    public static function Set($nama, $nilai){
        return $_SESSION[$nama] = $nilai;
    }

    public static function Get($nama=null){
        return $_SESSION[$nama];
    }
    public static function Del($nama){
        if (self::Cek($nama)) {
            unset($_SESSION[$nama]);
        }
    }
    public static function Flash($nama, $pesan = ''){
        if (self::Cek($nama)) {
            $session = self::Get($nama);
            self::Del($nama);
            return $session;
        }else {
            self::set($nama, $pesan);
        }
    }
    
    
    
}
