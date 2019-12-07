<?php include('core/init.php') ?>
<?php
if (isset($_POST['do_login'])) {
    //Get vars
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $user = new User;

    if ($user->login($username, $password)) {
        redirect('index.php', 'You have been logged in', 'sucess');
    } else {
        redirect('index.php', 'The login credentials are not valid', 'error');
    }
} else {
    redirect('index.php');
}
?>
