<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>92 Doner Kebab</title>
    <link rel="stylesheet"href="../admin/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
    // Update record
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $product_id = $_POST["product_id"];
        $product = $_POST["product"];
        $price = $_POST["price"];
        $amount = $_POST["amount"];
        $sql = "UPDATE add_p SET product='$product', price='$price', amount='$amount' WHERE product_id='$product_id'";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
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
                    <a class="nav-link" href="../admin/index.php" data-lang-en="Home" data-lang-es="Inicio" data-lang-fr="Accueil">Home</a>
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
                    <a class="nav-link" href="../public/home.html" data-lang-en="Logout" data-lang-es="cerrar sesion" data-lang-fr="Se déconnecter">Logout</a>
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
    <h2 class="text-center">Current Products</h2>
    <!-- Display products here -->
    <div class="table-responsive mt-4"> <!-- Removed 'table-container' class -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
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

                // Fetching product records
                $sql = "SELECT * FROM add_p";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["product_id"] . "</td>";
                        echo "<td>" . $row["product"] . "</td>";
                        echo "<td>" . $row["price"] . "</td>";
                        echo "<td>" . $row["amount"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No records found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- Update Product Form -->
    <form method="post" class="update_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2>Update Product</h2>
        <select name="product_id" class="form-control" required>
            <option value="" disabled selected>Select Product ID</option>
            <?php
            // Fetching product IDs from the database
            $conn = new mysqli($servername, $username, $password, $database);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT product_id FROM add_p";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["product_id"] . "'>" . $row["product_id"] . "</option>";
                }
            }
            ?>
        </select>
        <br>
        <input type="text" name="product" placeholder="Product" required>
        <br>
        <input type="text" name="price" placeholder="Price" required>
        <br>
        <input type="text" name="amount" placeholder="Amount" required>
        <input type="submit" value="Update!">
    </form>
</div>
<script>
    document.getElementById('viewProductsBtn').addEventListener('click', function () {
        var tableContainer = document.querySelector('.table-container');
        tableContainer.style.display = (tableContainer.style.display === 'none') ? 'block' : 'none';

        if (tableContainer.style.display === 'block') {
            // Fetch products from the database
            fetchProducts();
        }
    });

    function fetchProducts() {
        var productTableBody = document.getElementById('productTableBody');

        // Clear previous table data
        productTableBody.innerHTML = '';

        // Fetch products from the database
        fetch('fetch_products.php')
            .then(response => response.json())
            .then(data => {
                data.forEach(product => {
                    var row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${product.product_id}</td>
                        <td>${product.product}</td>
                        <td>${product.price}</td>
                        <td>${product.amount}</td>
                    `;
                    productTableBody.appendChild(row);
                });
            })
            .catch(error => {
                console.error('Error fetching products:', error);
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
    <button class="btn btn-primary" onclick="speakText('92 Doner Kebab - Home, View, Add, Delete, Update, Contact Us, Admin, Logout, Language, would you like to update a product?')">Text-to-Speech</button>
</footer>
<script>
        // Toggle table visibility
        document.getElementById('viewProductsBtn').addEventListener('click', function () {
            var tableContainer = document.querySelector('.table-container');
            tableContainer.style.display = (tableContainer.style.display === 'none') ? 'block' : 'none';
        });
    </script>
</html>
