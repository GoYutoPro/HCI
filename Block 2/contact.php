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
                <li class="nav-item"> <!-- Fixed this line -->
                    <a class="nav-link" href="contact.php" data-lang-en="Contact Us" data-lang-es="Contacto" data-lang-fr="Contactez-nous">Contact Us</a>
                </li> <!-- Added this line -->
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
    <h2 class="text-center shop-title">92 Doner Kebab Shop</h2>
    <p class="text-center"></p>
</div>

<!-- Feedback Form -->
<div class="container mt-5">
    <h3 class="text-center">We'd Love to Hear Your Feedback!</h3>
    <!-- Give the form an ID for easier manipulation -->
    <form id="feedbackForm" method="post" action="feedback_process.php" class="mt-4">
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Your Name" required>
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Your Email" required>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="feedback" rows="4" placeholder="Your Feedback"
                      required></textarea>
        </div>
        <button type="submit" class="btn btn-success btn-lg">Submit Feedback</button>
    </form>

    <!-- Feedback container to show the thank you message -->
    <div id="feedbackContainer" class="feedback-container mt-4 text-center">
        <h4>Thank You for Your Feedback! ☺</h4>
        <p id="userName"></p>
        <p id="userEmail"></p> <!-- Added paragraph for user email -->
        <p id="userFeedback"></p>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // JavaScript to handle form submission and display feedback
    document.getElementById('feedbackForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent default form submission

        // Get form data
        var formData = new FormData(this);

        // Display feedback container
        document.getElementById('feedbackContainer').style.display = 'block';

        // Display user name, email, and feedback
        document.getElementById('userName').textContent = 'Name: ' + formData.get('name');
        document.getElementById('userEmail').textContent = 'Email: ' + formData.get('email');
        document.getElementById('userFeedback').textContent = 'Feedback: ' + formData.get('feedback');

        // Reset form fields
        this.reset();
    });

    // Function to change language
    function changeLanguage(language) {
        // Map of language texts for navigation links and shop title
        var languageTexts = {
            'en': {
                'home-link': 'Home',
                'view-link': 'View',
                'add-link': 'Add',
                'delete-link': 'Delete',
                'update-link': 'Update',
                'contact-link': 'Contact Us',
                'todo-link': 'To-Do List',
                'admin-link': 'Admin Dashboard',
                'shop-title': '92 Doner Kebab Shop'
            },
            'es': {
                'home-link': 'Inicio',
                'view-link': 'Ver',
                'add-link': 'Añadir',
                'delete-link': 'Borrar',
                'update-link': 'Actualizar',
                'contact-link': 'Contacto',
                'todo-link': 'Lista de tareas',
                'admin-link': 'Panel de administración',
                'shop-title': 'Tienda 92 Doner Kebab'
            },
            'fr': {
                'home-link': 'Accueil',
                'view-link': 'Vue',
                'add-link': 'Ajouter',
                'delete-link': 'Supprimer',
                'update-link': 'Mettre à jour',
                'contact-link': 'Contactez-nous',
                'todo-link': 'Liste de tâches',
                'admin-link': 'Tableau de bord administrateur',
                'shop-title': 'Boutique 92 Doner Kebab'
            }
        };

        // Update navigation links and shop title based on selected language
        Object.keys(languageTexts[language]).forEach(function (key) {
            var element = document.querySelector('.' + key);
            if (element) {
                element.textContent = languageTexts[language][key];
            }
        });
    }
</script>
</body>

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


</html>
