<?php
session_start();
 
error_reporting(E_ALL);
ini_set('display_errors', 1);
 
$con = mysqli_connect("localhost", "root", "", "DonerKebab");
 
if (mysqli_connect_error()) {
    echo "Failed to connect to MySQL" . mysqli_connect_error();
    exit();
}
 
if (isset($_POST["recover"])) {
    $email = $_POST["email"];
 
    $sql = mysqli_query($con, "SELECT * FROM Users WHERE email='$email'");
    $query = mysqli_num_rows($sql);
    $fetch = mysqli_fetch_assoc($sql);
 
    if (mysqli_num_rows($sql) <= 0) {
        echo '<script>alert("Sorry, no emails exist");</script>';
    } else {
        // generate token by binaryhexa
        $token = bin2hex(random_bytes(50));
 
        $_SESSION['token'] = $token;
        $_SESSION['email'] = $email;
 
        // Adjust the path to PHPMailerAutoload.php based on your project structure
        require '/xampp\htdocs/Block 2/email/PHPMailer-master/src/PHPMailer.php';
        require '/xampp/htdocs/Block 2/email/PHPMailer-master/src/SMTP.php';
        require '/xampp/htdocs/Block 2/email/PHPMailer-master/src/Exception.php';
        
        $mail = new PHPMailer\PHPMailer\PHPMailer();
 
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
 
        // Gmail account
        $mail->Username = '92donerkebab@gmail.com';
        $mail->Password = 'vrxjgtqwqucwnlkv';
 
        // send by Gmail email
        $mail->setFrom('92donerkebab@gmail.com', 'Password Reset');
        $mail->addAddress($_POST["email"]);
 
        // HTML body
        $mail->isHTML(true);
        $mail->Subject = "Recover your password";
        $mail->Body = "<b>Dear User</b>
            <h3>We received a request to reset your password.</h3>
            <p>Kindly click the below link to reset your password</p>
            http://localhost/Block%202/reset.php'
            <br><br>
            <p>With regards,</p>
            <b>92 Doner Kebab</b>";
 
        if (!$mail->send()) {
            echo '<script>alert("Invalid Email");</script>';
        } else {
            echo '<script>window.location.replace("login.php");</script>';
        }
    }
}
?>
 
 
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
 
    <link rel="stylesheet" href="style.css">
 
    <link rel="icon" href="Favicon.png">
 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
 
    <title>Login Form</title>
</head>
<body>
 
<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">User Password Recover</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
 
    </div>
</nav>
 
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Password Recover</div>
                    <div class="card-body">
                        <form action="#" method="POST" name="recover_psw">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                </div>
                            </div>
 
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Recover" name="recover">
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
 
</main>
</body>
</html>