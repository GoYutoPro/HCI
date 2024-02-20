<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>92 Doner Kebab</title>
    <link rel="stylesheet"href="../admin/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="../public/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
                        <a class="nav-link" href="../admin/index.html" data-lang-en="Home" data-lang-es="Inicio" data-lang-fr="Accueil">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/view.php" data-lang-en="View" data-lang-es="Ver" data-lang-fr="Vue">View</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/add.php" data-lang-en="Add" data-lang-es="Añadir" data-lang-fr="Ajouter">Add</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/delete.php" data-lang-en="Delete" data-lang-es="Borrar" data-lang-fr="Supprimer">Delete</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/update.php" data-lang-en="Update" data-lang-es="Actualizar" data-lang-fr="Mettre à jour">Update</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/contact.php" data-lang-en="Contact Us" data-lang-es="Contacto" data-lang-fr="Contactez-nous">Contact Us</a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link" href="../admin/admin.php" data-lang-en="Admin" data-lang-es="Administrador" data-lang-fr="Administrateur">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../public/home.html"    data-lang-en="Logout" data-lang-es="cerrar sesion" data-lang-fr="Se déconnecter">Logout</a>
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

    <!-- Feedback Form -->
    <div class="container mt-5">
        <h3 class="text-center" data-lang-en="We'd Love to Hear Your Feedback!"
            data-lang-es="¡Nos encantaría escuchar tus comentarios!"
            data-lang-fr="Nous aimerions entendre vos commentaires !">We'd Love to Hear Your Feedback!</h3>
        <!-- Give the form an ID for easier manipulation -->
        <form id="feedbackForm1" method="post" action="feedback_process.php" class="mt-4">
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
        <div id="feedbackContainer" class="feedback-container mt-4 text-center" style="display: none;">
            <h4 data-lang-en="Thank You for Your Feedback! ☺"
                data-lang-es="¡Gracias por tus comentarios! ☺"
                data-lang-fr="Merci pour vos commentaires ! ☺">Thank You for Your Feedback! ☺</h4>
            <p id="userName"></p>
            <p id="userEmail"></p> <!-- Added paragraph for user email -->
            <p id="userFeedback"></p>
        </div>
    </div>

    <script>
        function changeLanguage(lang) {
            var elements = document.querySelectorAll('[data-lang-' + lang + ']');
            elements.forEach(function (element) {
                element.textContent = element.getAttribute('data-lang-' + lang);
            });
        }

        // JavaScript to handle form submission and display feedback
        document.getElementById('feedbackForm1').addEventListener('submit', function (event) {
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

<script>
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