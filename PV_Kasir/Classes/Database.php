<?php
class Database {
    private static $INSTANCE = null;
    public $UA;
    private $DB,
            $host = 'localhost',
            $user = 'root',
            $pass = '',
            $db   = 'pv_kasir';
    public function __construct() {
        $this->DB = new mysqli($this->host, $this->user, $this->pass, $this->db);
        if ($this->DB->connect_error) {
            die("Koneksi Error".$this->DB->connect_error);
        }
    }
    public static function getInstance(){
        if (!isset( self::$INSTANCE)) {
            self::$INSTANCE = new Database();
        }
        return self::$INSTANCE; 
    }
    public function get_info($table, $column, $value){
        
        if (!is_int($value)) {
            $value = "'".$value."'";
        }
        $query = "SELECT * FROM $table WHERE $column IN($value)";
        
        $hasil = $this->DB->query($query);
        while ($row = mysqli_fetch_assoc($hasil)) {
            return $row;
        }
    }
    public function get_info_pesan2($table, $column1, $column2, $value1, $value2){
        if (!is_int($value1)) {
            $value1 = "'".$value1."'";
        }
        if (!is_int($value2)) {
            $value2 = "'".$value2."'";
        }
        $query = "SELECT * FROM $table WHERE $column1 = $value1 AND $column2 = $value2";
        $hasil = $this->DB->query($query);
        return $hasil;
    }
    public function get_info_pesan($table, $column, $value){
        
        if (!is_int($value)) {
            $value = "'".$value."'";
        }
        $query = "SELECT * FROM $table WHERE $column IN($value)";
        
        $hasil = $this->DB->query($query);
        return $hasil;
    }
    public function get_all($name){
        $query = "SELECT * FROM $name";
        $hasil = $this->DB->query($query);
        return $hasil;
    }
    public function get_keranjang($user){
        $query = "SELECT * FROM `keranjang` WHERE `admin_pesanan`= '$user'";
        $hasil = $this->DB->query($query);
        return $hasil;
    }
    
    public function Insert($table, $fields =  array()){
        $column = implode(", ", array_keys($fields));
        $valueArray = array();
        $i = 0;
        foreach ($fields as $key => $value) {
            if (is_int($value)) {
                $valueArray[$i] = $value;
            }else {
                $valueArray[$i] ="'".$value."'";
            }
            $i++;
        }
        $value = implode(", ", $valueArray);
        $query = "INSERT INTO $table ($column) VALUES ($value)";
        if($this->run_query($query)){
            return true;
        }else {
            return false;
        }
        
    }
    public function update_pesanan($user, $id, $value){
        if (!is_int($id)) {
            $id ="'".$id."'";
        }
        if (!is_int($value)) {
            $value ="'".$value."'";
        }
        if (!is_int($user)) {
            $user ="'".$user."'";
        }
        $query = "UPDATE `keranjang` SET `banyak_pesanan`= $value WHERE `id_pesanan` = $id AND `admin_pesanan` = $user";
        if ($this->run_query($query)) {
            return true;
        }else {
            return false;
        }
    }
    public function run_query($query){
        if ($this->DB->query($query)) return true;
        else return false;
    }
    public function CekUserAcces($user){
        $query = "SELECT `user_acces` FROM `users` WHERE `username`= '$user'";
        $hasil = $this->DB->query($query);
        while ($data = mysqli_fetch_array($hasil)) {
            if ($data['user_acces'] == 1) {
                $this->$UA = $data['user_acces'];
                return true;
            }else {
                return false;
            }
        }
    }
    public function DelKeranjang($user){
       $query = "DELETE FROM `keranjang` WHERE `admin_pesanan`= '$user'";
        if($this->run_query($query))return true;
        else return false;
    }
}


