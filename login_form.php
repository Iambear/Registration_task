<?php
session_start();
include_once('DB/routes.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="View/css/style.css" type="text/css">
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<span class="registration">
    <form method="post" action = "DB/log_in.php">
        <table cellspacing="0">
            <tr >
                <th colspan="2">
                    Login form
                </th>
            </tr>
            <tr >
                <td>
                    Login or Email
                </td>
                <td>
                    <input type="text" name="log_email" value = <?echo $_GET['login'];?> required>
                </td>
            </tr>
            <tr >
                <td>
                    Password
                </td>
                <td>
                    <input type="password" name="log_pass" required>
                </td>
            </tr>
            <tr>
                <th>
                    <input type="submit" value = "Log IN">
                    
                </th>
                <th>
                    <a href = "sing_up_form.php">Registration</a>
                </th>
            </tr>
            <tr>
                <th colspan="2" style ="background-color:red;">
                    <?if($_GET['error'] == '1')
                    {?>
                        Wrong login or pass
                    <?}?>
                </th>
            </tr>
                
        </table>
    </span>
    </form>
</body>
</html>