<?php include('core/init.php'); ?>
<?php

$user = new User;
if (isset($_POST['do_logout'])) {
    if ($user->logout())
        redirect('index.php', 'You have sucessfully logged out!', 'success');
    else
        redirect('index.php');
}
?>