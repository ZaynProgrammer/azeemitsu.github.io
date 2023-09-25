<?php

@include 'config.php';
if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];

    $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
    
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $error[] = 'user already exist!';
    } else {
        if($pass != $cpass){
            $error[] = 'password not matched!';
        } else {
            $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name', '$email', '$pass', '$user_type')";
            mysqli_query($conn, $insert);
            header('location:login.php');
        }
    }
};

function auto_version($file){
    if(strpos($file, '/') !== 0 || !file_exists($_SERVER['DOCUMENT_ROOT'] . $file))
      return $file;
  
    $mtime = filemtime($_SERVER['DOCUMENT_ROOT'] . $file);
    return preg_replace('{\\.([^./]+)$}', ".$mtime.\$1", $file);
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,700;1,700&display=swap" rel="stylesheet">
    

    <!-- title -->
    <title>Register</title>

    <!-- icon -->
    <link rel="shortcut icon" type="image/x-icon" href="./img/bulan.png" />

    <!-- css -->
    <link rel="stylesheet" href="<?php echo auto_version('./css/register.css'); ?>" type="text/css" />
</head>
<body>
    
    <div class="form-container">
        
        <form action="" method="post">
            <h3>Register Now</h3>
            <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                    }; 
                };
            ?>
            <input type="text" name="name" requred placeholder="enter your name">
            <input type="email" name="email" requred placeholder="enter your email">
            <input type="password" name="password" requred placeholder="enter your password">
            <input type="password" name="cpassword" requred placeholder="confirm your password">
            <select name="user_type">
                <option selected disabled>select a type</option>
                <option value="user">user</option>
                <option value="trainer">trainer</option>
            </select>
            <input type="submit" name="submit" value="register" class="form-btn">
            <p>already have an account? <a href="login.php">login now</a></p>
            <p>back to <a href="index.html">home</a></p>
        </form>

    </div>
    
</body>
</html>