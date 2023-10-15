<?php

if (isset($_REQUEST['submit'])) {
    $error_message = '';
    $current_password=$_REQUEST['cur_pass'] ;
    $new_password = $_REQUEST['new_pass'];
    $retype_password = $_REQUEST['con_pass'];

    
    if ($current_password == $new_password) {
        $error_message .= "New Password should not be same as the Current Password !<br>";
    }

    if ($new_password == '') {
        $error_message .= "You must fill in New Password!<br>";
    }

    if ($retype_password == '') {
        $error_message .= "You must fill in Retype Password!<br>";
    }

    if ($new_password !== $retype_password) {
        $error_message .= "New Password and Retype Password do not match!<br>";
    }

    if (empty($error_message)) {
     
        header("changepass.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
</head>
<body>
    <table>
        <tbody>
            
            <tr>
               
                <td colspan="1">
                    <fieldset>
                        <legend><h3>Change Password</h3></legend>
                        <form action="" method="post">
                            <table>
                                <tr>
                                    <td>Current Password</td>
                                    <td>: <input type="password" name="cur_pass" value=""></td>
                                </tr>
                                <tr>
                                    <td><font color="green">New Password</font></td>
                                    <td>: <input type="password" name="new_pass" value=""></td>
                                </tr>
                                <tr>
                                    <td><font color="red">Confirm Password</font></td>
                                    <td>: <input type="password" name="con_pass" value=""></td>
                                </tr>
                                <tr>
                                    <td colspan="2" width="400px">
                                        <br><input type="submit" name="submit" value="Save Changes">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </fieldset>
                    <?php if (!empty($error_message)) { ?>
                        <p><?php echo $error_message; ?></p>
                    <?php } ?>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>