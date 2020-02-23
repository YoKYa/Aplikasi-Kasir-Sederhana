<?php 
include_once 'User.php';
class Keranjang extends User  {
    public $Data;
    public function get_pesanan($ID){
        $data = $this->_DB->get_info_pesan('produk','id_produk',$ID);
        return $data;
    }
    public function tambah_pesanan($fields = array()){
        if ($this->_DB->Insert('keranjang', $fields)) return true;
        else return false;
    }
    public function cek_pesanan($user, $id){
        $data = $this->_DB->get_info_pesan2('keranjang','id_pesanan','admin_pesanan', $id, $user);
        $this->Data = $data;
        if(mysqli_num_rows($data)==1) return true;
        else  return false;
    }
    public function get_pesanan2(){
        return $this->Data;
    }
    public function Update_Pesanan($user, $id, $value){
        if ($this->_DB->update_pesanan($user, $id, $value)) {
            return true;
        }else {
            return false;
        }
    }
    public function Riwayat($fields= array()){
        if ($this->_DB->Insert('riwayat', $fields)) return true;
        else return false;
    }

}

