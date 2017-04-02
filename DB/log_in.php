<?php
session_start();
include_once('routes.php');

extract($_POST);

$stm = $pdo->query("SELECT user_pass,user_login FROM users WHERE user_login = '$log_email' || user_email = '$log_email'");
$user_info = $stm->fetch();
if($user_info['user_pass'] == md5($_POST['log_pass']))
{
   $_SESSION['user'] = $user_info['user_login'];
   header('Location: ../my_page.php');
}
else{
   header("Location: ../login_form.php?login=$log_email&error=1");
}

