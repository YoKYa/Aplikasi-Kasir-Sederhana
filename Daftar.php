<?php include_once 'Core/init.php'; include_once 'Templates/header.php';
if (Session::Cek('username')) {
    Redirect::To('Kasir/index');
}

if (Input::Get('submit')) {
    $errors = array();
    $Validasi = new Validasi();
    $Validasi->check(array(
        'username' => array(
            'required' => true,
            'min'      => 5,
            'max'      => 50
        ),
        'email' =>array(
            'required' => true
        ),
        'email_verify' => array(
            'required' => true,
            'match'      => 'email'
        ),
        'Password' => array(
            'required' => true,
            'min'      =>8
        ),
        'Password_verify' => array(
            'required' => true,
            'match'      => 'Password'
        )
        ));
    if ($USER->Cek_Username(Input::Get('username'))&& !empty(Input::Get('username'))) {
        $errors[] = "Username sudah terdaftar";
    }else {
        if ($USER->Cek_Email(Input::Get('username'))&& !empty(Input::Get('username'))) {
            $errors[] = "Email sudah dipakai";
        }else{
            if ($Validasi->Passed()) {
                $USER->register_user(array(
                    'username' => Input::Get('username'),
                    'email'    => Input::Get('email'),
                    'password' =>  password_hash(Input::Get('Password'),PASSWORD_DEFAULT),
                    'user_acces'=> 0
                ));
                Session::set('username', Input::Get('username'));
                Redirect::To('Kasir/index');
                Session::Flash('Daftar', 'Selamat anda berhasil mendaftar');
            }else {
                $errors = $Validasi->GetError();
            }
        }
        
    }
    
}
if(Session::Cek('Daftar')){
    echo "<li>".Session::Flash('Daftar')."</li>";
}

?>
<h3>Daftar Akun Administrasi Kasir</h3>
<form action="Daftar.php" method="post">
    <label for="Username">Username : </label><br>
    <input type="text" name="username" placeholder="Username" id="Username"><br>
    <label for="Email">Email : </label><br>
    <input type="email" name="email" placeholder="Email" id="Email"><br>
    <input type="email" name="email_verify" placeholder="Email Konfirmasi" id="Email_Verify"><br>
    <label for="Password">Password</label><br>
    <input type="password" name="Password" placeholder="Password"><br>
    <input type="password" name="Password_verify" placeholder="Password Konfirmasi"><br><br>
    <input type="submit" value="Daftar Sekarang" name="submit">
    <br><br>
</form>
<?php if (!empty($errors)) {?>
        <h4>Peringatan</h4>
        <div>
            <?php foreach ($errors as $error) { ?>
            <li><?php echo $error; ?> </li>
            <?php } ?>
        </div>
        <?php } 
?>
<?php include_once 'Templates/footer.php';?>