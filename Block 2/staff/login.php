<?php
ob_start(); // Start output buffering

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "DonerKebab";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if username exists in the database
    $stmt = $conn->prepare("SELECT username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Redirect to index.php
            header('Location: index.html');
            exit(); // Ensure that no more code is executed after the redirect
        } else {
            echo "Invalid password";
        }
    } else {
        echo "User not found";
    }
    $stmt->close();
}

ob_end_flush(); // Flush the output buffer
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>92 Doner Kebab</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .navbar {
            background-color: #343a40; /* Dark background color */
            padding: 10px; /* Adjust padding */
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: #ffffff; /* Text color */
        }

        .navbar-toggler {
            border: 1px solid #ffffff; /* Border color */
        }

        .navbar-toggler-icon {
            background-color: #ffffff; /* Toggler icon color */
        }

        .navbar-nav { 
            margin: auto;
        }

        .navbar-nav .nav-item {
            margin: 0 15px; /* Adjust margin */
        }

        @media (max-width: 768px) {
            .navbar-nav .nav-item {
                margin: 10px 0;
            }
        }

        .language-dropdown {
            margin-left: auto; /* Align dropdown to the right */
        }

        /* Footer Styles */
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

        /* Adjust body height to accommodate footer */
        body {
            margin-bottom: 80px; /* Height of the footer */
            position: relative;
            min-height: 100vh;
        }
        
        /* Color-blind Mode Styles */
        .color-blind-mode .navbar {
            background-color: #f8f9fa; /* Lighter background color */
        }

        .color-blind-mode .navbar-brand {
            color: #212529; /* Darker text color */
        }

        .color-blind-mode .navbar-toggler-icon {
            background-color: #212529; /* Darker icon color */
        }

        .color-blind-mode .navbar-nav .nav-link {
            color: #212529; /* Darker link color */
        }

        .color-blind-mode footer {
            background-color: #f8f9fa; /* Lighter footer background color */
            color: #212529; /* Darker footer text color */
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="/staff/index.php" data-lang-en="92 Doner Kebab" data-lang-es="92 Doner Kebab" data-lang-fr="92 Doner Kebab">92 Doner Kebab</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/block 2/staff/index.html" data-lang-en="Home" data-lang-es="Inicio" data-lang-fr="Accueil">Home</a>
                </li>
                <li class="nav-item"> <!-- Fixed this line -->
                    <a class="nav-link" href="/block 2/staff/contact.php" data-lang-en="Contact Us" data-lang-es="Contacto" data-lang-fr="Contactez-nous">Contact Us</a>
                </li> <!-- Added this line -->
                <li class="nav-item">
                    <a class="nav-link" href="/block 2/staff/login.php" data-lang-en="Login" data-lang-es="Lista de tareas" data-lang-fr="Liste de tâches">Login</a>
                </li>
            </ul>
            <!-- Language Dropdown -->
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

<div class="container mt-5">
    <h2 class="text-center" data-lang-en="Welcome to 92 Doner Kebab Shop!" data-lang-es="¡Bienvenido a 92 Doner Kebab Shop!" data-lang-fr="Bienvenue chez 92 Doner Kebab Shop!">Welcome to 92 Doner Kebab Shop!</h2>
    <p class="text-center" data-lang-en="Please login or register before starting" data-lang-es="Por favor, inicie sesión o regístrese antes de comenzar" data-lang-fr="Veuillez vous connecter ou vous inscrire avant de commencer">Please login or register before starting</p>
</div>

<div class="container mt-5">
    <h2 class="text-center">Staff Login</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="POST" action="login.php">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <a href="#" class="forgot-password">Forgot Password?</a>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>

<div class="container mt-3">
    <p class="text-center">Don't have an account? <a href="register.php">Register here</a>.</p>
</div>


<footer>
    <!-- Zoom In and Out Buttons -->
    <button class="btn btn-info mr-2" onclick="zoomIn()">Zoom In</button>
    <button class="btn btn-info" onclick="zoomOut()">Zoom Out</button>

    <!-- Color-Blind Settings Button -->
    <button class="btn btn-secondary mr-2" onclick="toggleColorBlindMode()">Color-Blind Mode</button>

    <!-- Text-to-Speech Button -->
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

    // Text-to-Speech Script
    function speakText(text) {
        var utterance = new SpeechSynthesisUtterance(text);
        window.speechSynthesis.speak(utterance);
    }

    // Color-blind Modes Script
    function toggleColorBlindMode() {
        // Add/remove class to enable/disable color-blind mode
        document.body.classList.toggle('color-blind-mode');
    }

    // Zoom In and Out Script
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
