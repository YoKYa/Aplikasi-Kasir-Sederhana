<?php

class User{
    protected $_DB;
    public function __construct() {
        $this->_DB = Database::getInstance();
    }
    public function Cek_Email($Email){
        $data = $this->_DB->get_info('users', 'email', $Email);
        if (empty($data)) {
            return false;
        }else{
            return true;
        }
    }
    public function Cek_Username($Username){
        $data = $this->_DB->get_info('users', 'username', $Username);
        if (empty($data)) {
            return false;
        }else{
            return true;
        }
    }
    public function register_user($fields = array()){
        if($this->_DB->Insert('users', $fields)) return true;
        else return false;
    }
    public function login_user($username, $password){
        $data = $this->_DB->get_info('users', 'username', $username);
        if (password_verify($password,$data['password'])) {
            return true;
        }else {
            return false;
        }
    }
    public function CekUser($user){
        if($this->_DB->CekUserAcces($user))return true;
        else return false;
    }
    public function DelKeranjang($user){
        if($this->_DB->DelKeranjang($user))return true;
        else return false;
    }
}


?>