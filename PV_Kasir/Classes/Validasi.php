<?php

class Validasi{
    private $_pass = false,
            $_error= array();
    public $_data;
    public function check($items =  array()){
        foreach ($items as $item => $rules) {
            foreach ($rules as $rule => $rule_value) {
                switch ($rule) {
                    case 'required':
                        if(trim(Input::Get($item)) == false && $rule_value == true){
                            $this->GantiNama($item);
                            $this->addError("$this->_data harus diisi");
                        }break;
                    case 'min' :
                        if(strlen(Input::Get($item)) < $rule_value){
                            $this->GantiNama($item);
                            $this->addError(" $this->_data minimal $rule_value karakter");
                        } 
                        break;
                    case 'max':
                        if(strlen(Input::Get($item)) > $rule_value){
                            $this->GantiNama($item);
                            $this->addError(" $this->_data minimal $rule_value karakter");
                        } 
                        break;
                    case 'match':
                        if ( Input::Get($item) != Input::Get($rule_value)) {
                            $this->GantiNama($item);
                            $this->addError(" $this->_data harus sama");
                        } 
                        break;
                    default:
                        # code...
                        break;
                    }

            }
            
        }
        if (empty($this->_error)) {
            $this->_pass = true;
        }else {
            # code...
        }
        return $this;
    }
    private function addError($error){
        $this->_error[] = $error;
    }
    public function GetError(){
        return $this->_error;
    }
    public function Passed(){
        return $this->_pass;
    }
    public function GantiNama($item){
        if ($item == "username") {
            $this->_data = 'Username';
        }elseif ($item == "Password") {
            $this->_data = 'Password';
        }elseif ($item == "Password_verify") {
            $this->_data = 'Password Konfirmasi';
        }elseif ($item == "email") {
            $this->_data = 'Email';
        }elseif ($item == "email_verify") {
            $this->_data = 'Email Konfirmasi';
        }elseif($item == "id_produk"){
            $this->_data = 'ID Produk';
        }elseif($item == "nama_produk"){
            $this->_data = 'Nama Produk';
        }elseif($item == "harga_produk"){
            $this->_data = 'Harga Produk';
        }elseif ($item == "stok_produk") {
            $this->_data = 'Stok Produk';
        }elseif ($item == "total_produk") {
            $this->_data = 'Total Produk';
        }
    }

}



?>