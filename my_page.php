<?php 
session_start();
if($_SESSION['user'])
{
    $user_me = $_SESSION['user'];
    include_once('DB/routes.php');
    $stm = $pdo->query("SELECT user_email,user_name FROM users WHERE user_login = '$user_me'");
    $user_info = $stm->fetch();
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="View/css/style.css" type="text/css">
    <meta charset="UTF-8">
    <title>My Page</title>
</head>
<body>
<span class="registration">
    <form method="post" action = "DB/log_out.php">
        <table cellspacing="0">
            <tr >
                <th colspan="4">
                    It's Your Page
                </th>
            </tr>
            <tr >
                <td>
                   Your email:
                </td>
                <td>
                    <?echo $user_info['user_email'];?>
                </td>
                <td>
                   Your name:
                </td>
                <td>
                    <?echo $user_info['user_name'];?>
                </td>
            </tr>
            <tr>
                <th colspan="4">
                    <input type="submit" value = "Log OUT">
                </th>
            </tr>
        </table>
    </span>
    </form>
</body>
</html>
<?}
else{
    header('Location:/index.php');
}