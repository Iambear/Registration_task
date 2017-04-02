<?php 
session_start();
include_once('DB/routes.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="View/css/style.css" type="text/css">
    <meta charset="UTF-8">
    <title>Hello Page</title>
</head>
<body>
<span class="registration">
    <form method="post" action = "DB/register.php">
        <table cellspacing="0">
            <tr >
                <th colspan="2">
                    Registration form
                </th>
            </tr>
            <tr >
                <td>
                    Email
                </td>
                <td>
                    <input type="text" name="reg_email" value = "<?echo $_GET["email"]?>"required>
                </td>
            </tr>
            <tr>
                <td>
                    Login
                </td>
                <td>
                    <input type="text" name="reg_login" value = "<?echo $_GET["login"]?>"required>
                </td>
            </tr>
            <tr>
                <td>
                    Password
                </td>
                <td>
                    <input type="password" name="reg_pass"required>
                </td>
            </tr>
            <tr>
                <td>
                    Real name
                </td>
                <td>
                    <input type="text" name="reg_name"  value = "<?echo $_GET["name"]?>"required>
                </td>
            </tr>
            <tr>
                <td>
                    Birth date
                </td>
                <td>
                    <input type="date" name="reg_birth" max="2010-06-04" min="1900-01-01" value = "<?echo $_GET["birth"]?>"required>
                </td>
            </tr>
            <tr>
                <td>
                    Country
                </td>
                <td>
                    <select name = "reg_country">
                    <?
                        $stmt = $pdo->query("SELECT * FROM countries");
                        while ($row = $stmt->fetch())
                            {
                            ?><option value = "<?echo $row['country_name']?>"><?
                               echo $row['country_name'];
                            ?></option><?
                            }
                            ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th colspan="2">
                    I agree with terms and conditions
                    <input type="checkbox" name = "reg_accept" >
                </th>
            </tr>
            <tr>
                <th>
                    <input type="submit" value = "Register me">
                </th>
                <th>
                    <a href = "login_form.php">Log IN</a>
                </th>
            </tr>
            <tr>
                <th colspan="2" style ="background-color:red;">
                    <?if($_GET['error'] == 'validation')
                    {?>
                        Unacceptable symbols or empty fields. Try again
                    <?}?>
                    <?if($_GET['error'] == 'log_or_email')
                    {?>
                        This email or login allready exist on this site. Try another.
                    <?}?>
                    <?if($_GET['error'] == 'accept')
                    {?>
                        You should accept our terms.
                    <?}?>
                </th>
            </tr>
            
        </table>
    </span>
    </form>
</body>
</html>
