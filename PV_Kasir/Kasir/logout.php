<?php
require_once 'Core/init.php';
    session_destroy();
Redirect::to('../index');
Session::Flash('Login','Anda Harus Login Terlebih Dahulu');
?>