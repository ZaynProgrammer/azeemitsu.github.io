<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];

    $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";
    
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_array($result);

        if($row['user_type'] == 'trainer'){
            $_SESSION['trainer_name'] = $row['name'];
            header('location: trainer-page.php');
            exit();

        } elseif ($row['user_type'] == 'user'){
            $_SESSION['user_name'] = $row['name'];
            header('location: user-page.php');
            exit();
        }
    } else {
        $error[] = 'Incorrect email or password!';
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
    <title>Login</title>

    <!-- icon -->
    <link rel="shortcut icon" type="image/x-icon" href="./img/bulan.png" />

    <!-- css -->
    <link rel="stylesheet" href="<?php echo auto_version('./css/register.css'); ?>" type="text/css" />
</head>
<body>
    
    <div class="form-container">
        
        <form action="" method="post">
            <h3>Login Now</h3>
            <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                    };
                };
            ?>
            <input type="text" name="name" required placeholder="enter your name">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="email" name="email" placeholder="enter your email">
            <input type="hidden" name="cpassword" placeholder="confirm password">
            <input type="hidden" name="user_type" value="default">
            <input type="submit" name="submit" value="login" class="form-btn">
            
            <p>don't have an account? <a href="register.php">register now</a></p>
            <p>back to <a href="index.html">home</a></p>
        </form>

    </div>
    
</body>
</html>
