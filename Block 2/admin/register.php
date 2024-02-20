<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "DonerKebab";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert record
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"]; // Retrieve email from the form
    $password = $_POST["password"];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password for security

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashed_password);

    if ($stmt->execute()) {
        echo "User registered successfully";
    } else {
        echo "Error registering user: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
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
                    <a class="nav-link" href="contact.php" data-lang-en="Contact Us" data-lang-es="Contacto" data-lang-fr="Contactez-nous">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php" data-lang-en="Login" data-lang-es="Lista de tareas" data-lang-fr="Liste de tâches">Login</a>
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
    <h2 class="text-center">Register</h2>
    <p class="text-center">If you are already a user, please <a href="login.php">sign in</a>.</p>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="username">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
</div>

<footer>
    <!-- Zoom In and Out Buttons -->
    <button class="btn btn-info mr-2" onclick="zoomIn()">Zoom In</button>
    <button class="btn btn-info" onclick="zoomOut()">Zoom Out</button>

    <!-- Color-Blind Settings Button -->
    <button class="btn btn-secondary mr-2" onclick="toggleColorBlindMode()">Color-Blind Mode</button>

    <!-- Text-to-Speech Button -->
    <button class="btn btn-primary" onclick="speakText('Register page')">Text-to-Speech</button>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // Your JavaScript functions here...
</script>

</body>

</html>
