<?php
include_once 'Core/init.php';
if (!Session::Cek('username')) {
    Redirect::To('../index');
    Session::Flash('Login','Anda Harus Login Terlebih Dahulu');
}
$USER->DelKeranjang(Session::Get('username'));
Redirect::To('Pesanan');