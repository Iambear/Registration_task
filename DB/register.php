<?php 
session_start();
include_once('routes.php');
$return = $_POST;
extract($_POST);
$reg_email = preg_match("/^([A-Za-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/",$reg_email)?$reg_email:NULL;
$reg_login = preg_match("/^[A-Za-z0-9_-]{6,16}$/",$reg_login)?$reg_login:NULL;
$reg_pass = preg_match("/^[A-Za-z0-9_-]{6,16}$/",$reg_pass)?$reg_pass:NULL;
$reg_name = preg_match('/^[a-zA-Zа-яёА-ЯЁ\s\-]+$/u', $reg_name)?$reg_name:NULL;

while(true)
{
    if($reg_accept)
    {
        $stm = $pdo->query("SELECT * FROM users WHERE user_login = '$reg_login' OR user_email = '$reg_email'");
        $log_email_check = $stm->fetch();
        if(!$log_email_check)
            {
                if($reg_email && $reg_login && $reg_pass && $reg_name && $reg_birth)
                    {
                    $reg_date = date_create();
                    $reg_date = date_timestamp_get($reg_date);
                    $reg_pass = md5($reg_pass);
                    $stmt = $pdo->query("INSERT INTO users (`user_email`,
                                                            `user_login`,
                                                            `user_name`,
                                                            `user_pass`,
                                                            `user_birth`,
                                                            `user_country`,
                                                            `user_registration_date`) 
                                            VALUES (        '$reg_email',
                                                            '$reg_login',
                                                            '$reg_name',
                                                            '$reg_pass',
                                                            '$reg_birth',
                                                            '$reg_country',
                                                            '$reg_date')");
                    break;
                    }
                else
                    {   
                        $error="validation";
                        break;
                    }
            }
        else
            {
                $error = "log_or_email";
                break;
            }
    }
    else
    {
        $error = "accept";
        break;
    }
}
    if($error == "accept" || $error == "log_or_email" || $error == "validation")
            {
            extract($return);
            header("Location: /sing_up_form.php?email=$reg_email&login=$reg_login&name=$reg_name&birth=$reg_birth&error=$error");
            }
    else    
            {
            $_SESSION['user'] = $reg_login;
            header("Location: /my_page.php");
            }