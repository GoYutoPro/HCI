
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>92 Doner Kebab - Reset Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Your existing CSS styles */
        .navbar {
            background-color: #343a40; 
            padding: 10px;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: #ffffff;
        }

        .navbar-toggler {
            border: 1px solid #ffffff; 
        }

        .navbar-toggler-icon {
            background-color: #ffffff; 
        }

        .navbar-nav { 
            margin: auto;
        }

        .navbar-nav .nav-item {
            margin: 0 15px;
        }

        @media (max-width: 768px) {
            .navbar-nav .nav-item {
                margin: 10px 0;
            }
        }

        .language-dropdown {
            margin-left: auto; 
        }

        footer {
            background-color: #343a40;
            color: #ffffff;
            padding: 20px 0;
            text-align: center;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        footer button {
            margin: 5px;
        }

        body {
            margin-bottom: 80px;
            position: relative;
            min-height: 100vh;
        }

        .color-blind-mode .navbar {
            background-color: #f8f9fa;
        }

        .color-blind-mode .navbar-brand {
            color: #212529;
        }

        .color-blind-mode .navbar-toggler-icon {
            background-color: #212529;
        }

        .color-blind-mode .navbar-nav .nav-link {
            color: #212529;
        }

        .color-blind-mode footer {
            background-color: #f8f9fa;
            color: #212529;
        }

        /* New styles for reset password page */
        .reset-password-form {
            max-width: 400px;
            margin: auto;
            margin-top: 50px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .reset-password-form h2 {
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php" data-lang-en="92 Doner Kebab" data-lang-es="92 Doner Kebab" data-lang-fr="92 Doner Kebab">92 Doner Kebab</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php" data-lang-en="Home" data-lang-es="Inicio" data-lang-fr="Accueil">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php" data-lang-en="Contact Us" data-lang-es="Contacto" data-lang-fr="Contactez-nous">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php" data-lang-en="Login" data-lang-es="Lista de tareas" data-lang-fr="Liste de tâches">Login</a>
                </li>
            </ul>
            <div class="dropdown language-dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="languageDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Language
                </button>
                <div class="dropdown-menu" aria-labelledby="languageDropdown">
                    <button class="dropdown-item" type="button" onclick="changeLanguage('en')">English</button>
                    <button class="dropdown-item" type="button" onclick="changeLanguage('es')">Español</button>
                    <button class="dropdown-item" type="button" onclick="changeLanguage('fr')">Français</button>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="container">
    <div class="reset-password-form">
        <h2>Enter New Password</h2>
        <form method="POST" action="reset.php">
    <div class="form-group">
        <label for="password">New Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary btn-block" name="reset" value="reset">Reset Password</button>
</form>

    </div>
</div>

<footer>
    <button class="btn btn-info mr-2" onclick="zoomIn()">Zoom In</button>
    <button class="btn btn-info" onclick="zoomOut()">Zoom Out</button>
    <button class="btn btn-secondary mr-2" onclick="toggleColorBlindMode()">Color-Blind Mode</button>
    <button class="btn btn-primary" onclick="speakText('Welcome to 92 Doner Kebab Shop!')">Text-to-Speech</button>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function changeLanguage(language) {
        var elements = document.querySelectorAll('[data-lang-' + language + ']');
        elements.forEach(function (element) {
            element.innerHTML = element.getAttribute('data-lang-' + language);
        });
    }

    function speakText(text) {
        var utterance = new SpeechSynthesisUtterance(text);
        window.speechSynthesis.speak(utterance);
    }

    function toggleColorBlindMode() {
        document.body.classList.toggle('color-blind-mode');
    }

    function zoomIn() {
        var body = document.body;
        var currentSize = parseFloat(window.getComputedStyle(body, null).getPropertyValue('font-size'));
        body.style.fontSize = (currentSize * 1.1) + 'px';
    }

    function zoomOut() {
        var body = document.body;
        var currentSize = parseFloat(window.getComputedStyle(body, null).getPropertyValue('font-size'));
        body.style.fontSize = (currentSize / 1.1) + 'px';
    }
</script>

</body>

</html>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
 
$con = mysqli_connect("localhost", "root", "", "DonerKebab");
 
if (mysqli_connect_error()) {
    echo "Failed to connect to MySQL" . mysqli_connect_error();
    exit();
}
 
if (isset($_POST["reset"])) {
    $psw = $_POST["password"];
 
    $token = $_SESSION['token'];
    $Email = $_SESSION['email'];
 
    $hash = password_hash($psw, PASSWORD_DEFAULT);
 
    $sql = mysqli_query($con, "SELECT * FROM Users WHERE email='$Email'");
    $query = mysqli_num_rows($sql);
    $fetch = mysqli_fetch_assoc($sql);
 
    if ($Email) {
        $new_pass = $hash;
        mysqli_query($con, "UPDATE Users SET password='$new_pass' WHERE email='$Email'");
        ?>
        <script>
            window.location.replace("login.php");
            alert("<?php echo "Your password has been successfully reset" ?>");
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("<?php echo "Please try again" ?>");
        </script>
        <?php
    }
}
?>
 
<script>
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');
 
    toggle.addEventListener('click', function(){
        if(password.type === "password"){
            password.type = 'text';
        }else{
            password.type = 'password';
        }
        this.classList.toggle('bi-eye');
    });
</script>
