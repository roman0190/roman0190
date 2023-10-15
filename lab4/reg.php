<?php
if(isset($_REQUEST['submit'])){

    $error_message = '';

    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $confirm_password = $_REQUEST['confirm_password'];

    if(isset($_REQUEST['gender'])){
        $gender = $_REQUEST['gender'];
    }else{
        $gender = '';
    }

    $dob = $_REQUEST['dob'];

    if($name == ''){
        $error_message .= "You must fill in your Name! <br>";
    }
    if($email == ''){
        $error_message .= "You must fill in your Email! <br>";
    }
    if($username == ''){
        $error_message .= "You must fill in your User Name! <br>";
    }
    if($password == ''){
        $error_message .= "You must fill in your Password! <br>";
    }

    if($confirm_password == '' || $confirm_password !== $password){
        $error_message .= "Your password doesn't match! <br>";
    }
    if($gender == ''){
        $error_message .= "You must fill in your Gender! <br>";
    }
    if ($dob == '') {
        $error_message .= "You must fill in your Date of Birth! <br>";
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
    
        header('location: login.php');
    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
    <table>
        <tbody>
            
            <tr>
                <td height="400px" width="600px">
                    <form action="" method="post">
                        <fieldset>
                            <legend><h3>Registration</h3></legend>
                            <table align="center">
                                <tr>
                                    <td>Name</td>
                                    <td><input type="text" name="name" value="<?php if(isset($name)){echo $name;} ?>"></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>
                                        <input type="email" name="email" value="<?php if(isset($email)){echo $email;} ?>">
                                        <input type="button" value="i" title="hint: example@gmail.com">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td><input type="text" name="username" value="<?php if(isset($username)){echo $username;} ?>"></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td><input type="password" name="password" value="<?php if(isset($password)){echo $password;} ?>"></td>
                                </tr>
                                <tr>
                                    <td>Confirm Password</td>
                                    <td><input type="password" name="confirm_password" value="<?php if(isset($confirm_password)){echo $confirm_password;} ?>"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <fieldset>
                                            <legend>Gender</legend>
                                            <input type="radio" name="gender" value="Male" <?php if(isset($_REQUEST['gender']) && $_REQUEST['gender'] === 'Male') echo 'checked'; ?>> Male
                                            <input type="radio" name="gender" value="Female" <?php if(isset($_REQUEST['gender']) && $_REQUEST['gender'] === 'Female') echo 'checked'; ?>> Female
                                            <input type="radio" name="gender" value="Other" <?php if(isset($_REQUEST['gender']) && $_REQUEST['gender'] === 'Other') echo 'checked'; ?>> Other
                                        </fieldset>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <fieldset>
                                            <legend>Date of Birth</legend>
                                            <input type="date" name="dob" value="<?php if(isset($_REQUEST['dob'])) echo $_REQUEST['dob']; ?>">
                                        </fieldset>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="right">
                                        <input type="submit" name="submit" value="Submit">
                                        <input type="reset" value="Reset">
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                        <br>
                        <p><?php if(isset($error_message)){echo $error_message;} ?></p>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>