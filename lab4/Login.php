<?php
if(isset($_REQUEST['submit'])){

    $error_message = '';

    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    if($username == ''){
        $error_message .= "You must fill in your User Name! <br>";
    }
    if($password == ''){
        $error_message .= "You must fill in your Password! <br>";
    }

    function lengthcount($string) {
        $length = 0;
    
        
        for ($i = 0; isset($string[$i]); $i++) {
            $length++;
        }
    
        return $length;
    }
    if (lengthcount($username) < 2) {
        $error_message .= "User Name must contain at least two (2) characters!<br>";
    }
    if (lengthcount($password) < 8) {
        $error_message .= "Password must contain at least two (8) characters!<br>";
    }
    if (empty($error_message)) {
    
        header('welcome.php');
    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <table>
        <tbody>
            
            <tr>
                <td height="200px">
                    <form action="" method="post">
                        <fieldset>
                            <legend><h3>Login</h3></legend>
                            <table align="center">
                                <tr>
                                    <td>Username</td>
                                    <td><input type="text" name="username" value="<?php if(isset($username)){echo $username;} ?>"></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td><input type="password" name="password" value="<?php if(isset($password)){echo $password;} ?>"></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <input type="submit" name="submit" value="Submit"><br>
                                        <input type="checkbox" name="remember_me" value=""> Remember Me<br><br>
                                        <a href="changepass.php">Forgot Password</a>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                        <p><?php if(isset($error_message)){echo $error_message;} ?></p>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>