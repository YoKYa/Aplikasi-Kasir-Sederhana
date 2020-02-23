<?php include_once 'Core/init.php'; include_once 'templates/header.php'; 
if (Session::Cek('username')) {
    Redirect::To('Kasir/index');
}
if(Session::Cek('Masuk')){
    echo "<li>".Session::Flash('Masuk')."</li>";
}
?>
<h3>Masuk</h3>
<form action="Masuk.php" method="post">
    <label for="Username">Username</label><br>
    <input type="text" name="username" id="Username" placeholder="Username"><br>
    <label for="Password">Password</label><br>
    <input type="password" name="password" id="Username" placeholder="Password"><br>
    <input type="submit" name="submit" value="Masuk Sekarang" id="submit">
</form>
<?php 
    if (Session::Cek('DFUsername')) {
        echo '<li>'.Session::Flash('DFUsername').'</li>';
    }
    
    
?>

<?php include_once 'Templates/Footer.php';

if (Input::Get('submit')) {
    if ($USER->Cek_Username(Input::Get('username'))&& !empty(Input::Get('username'))) {
        if ($USER->login_user(Input::Get('username'), Input::Get('password')) ) {
            Session::Set('username', Input::Get('username'));
            if ($USER->CekUser(Input::Get('username'))) {
                Session::Set('UA', 1);
            }
            Session::Flash('Login', 'Selamat Datang Kembali');
            Redirect::To('Kasir/index');
        }
        else {
            Session::Flash('DFUsername', "Password Anda Salah");
        }
    }else {
        Session::Flash('DFUsername', "Username anda belum terdaftar");
    }
}

?>