<?php
    session_start();

    if($_SESSION['user'] == false)
        {
            header('Location:/login_form.php');
        }
    else
        {
            header('Location:/my_page.php');
        }
?>