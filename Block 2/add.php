<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reactive Navigation Bar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .navbar-nav {
            margin: auto;
        }

        .navbar-nav .nav-item {
            margin: 0 10px;
        }

        @media (max-width: 768px) {
            .navbar-nav .nav-item {
                margin: 10px 0;
            }
        }

        .adding_form {
            color: #fff;
            font-family: Arial, sans-serif;
            display: center;
            align-items: center;
            justify-content: center;
            height: 300px;
            width: 950px;
            margin: 0;
            margin-left: 500px;
            margin-top: 300px;
        }

        form {
            background-color: #333;
            padding: 20px;
            border-radius: 8px;
            width: 300px;
            text-align: center;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
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
    <?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "92doner";

    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Inserting record
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $product_id = $_POST["product_id"];
        $product = $_POST["product"];
        $price = $_POST["price"];
        $amount = $_POST["amount"];
        $sql = "INSERT INTO add_p (product_id, product, price, amount) VALUES ('$product_id', '$product', '$price', '$amount')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
    ?>

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
                    <a class="nav-link" href="view.php" data-lang-en="View" data-lang-es="Ver" data-lang-fr="Vue">View</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add.php" data-lang-en="Add" data-lang-es="Añadir" data-lang-fr="Ajouter">Add</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="delete.php" data-lang-en="Delete" data-lang-es="Borrar" data-lang-fr="Supprimer">Delete</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="update.php" data-lang-en="Update" data-lang-es="Actualizar" data-lang-fr="Mettre à jour">Update</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php" data-lang-en="Contact Us" data-lang-es="Contacto" data-lang-fr="Contactez-nous">Contact Us</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="admin.php" data-lang-en="Admin" data-lang-es="Administrador" data-lang-fr="Administrateur">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php" data-lang-en="Logout" data-lang-es="cerrar sesion" data-lang-fr="Se déconnecter">Logout</a>
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

    <form method="post" class="adding_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2>Add Product</h2>
        <input type="text" name="product" placeholder="Product" required>
        <br>
        <input type="text" name="price" placeholder="Price" required>
        <br>
        <input type="text" name="amount" placeholder="Amount" required>
        <input type="submit" value="Submit!">
    </form>
    <footer>
    <!-- Zoom In and Out Buttons -->
    <button class="btn btn-info mr-2" onclick="zoomIn()">Zoom In</button>
    <button class="btn btn-info" onclick="zoomOut()">Zoom Out</button>

    <!-- Color-Blind Settings Button -->
    <button class="btn btn-secondary mr-2" onclick="toggleColorBlindMode()">Color-Blind Mode</button>

    <!-- Text-to-Speech Button -->
    <button class="btn btn-primary" onclick="speakText('92 Doner Kebab - Home, View, Add, Delete, Update, Contact Us, Admin, Logout, Language, would you like to add a product?')">Text-to-Speech</button>
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
