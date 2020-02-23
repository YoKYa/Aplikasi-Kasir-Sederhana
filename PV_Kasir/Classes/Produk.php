<?php 
include_once 'User.php';
class Produk extends User  {
    public function Cek_Produk($Produk){
        $data = $this->_DB->get_info('produk', 'id_produk', $Produk);
        if (empty($data)) {
            return false;
        }else{
            return true;
        }
    }
    public function tambah_produk($fields = array()){
        if($this->_DB->Insert('produk', $fields)) return true;
        else return false;
    }
    public function get_Produk($Produk){
        $data = $this->_DB->get_all($Produk);
        return $data;
    }
    public function GetKeranjang($user){
        $data = $this->_DB->get_keranjang($user);
        return $data;
    }

}

