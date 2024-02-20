<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>92 Doner Kebab</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .body {
            background-color: grey;
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

        .todo-container {
            text-align: center;
            margin-top: 50px;
            background-color: #333; /* Dark background color */
            padding: 20px; /* Add padding for spacing */
            border-radius: 8px; /* Rounded corners */
        }

        .todo-input {
            margin-bottom: 10px;
        }

        .todo-input input[type="text"] {
            width: 80%; /* Make the input field wider */
            padding: 10px; /* Increase padding for better appearance */
            border-radius: 4px; /* Rounded corners */
            border: 1px solid #ccc; /* Add border for better visibility */
            font-size: 16px; /* Increase font size for better readability */
        }

        .todo-list {
            list-style-type: none;
            padding: 0;
        }

        .todo-item {
            margin-bottom: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .delete-button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        /* Adjust the language dropdown button */
        .dropdown-toggle.language-button {
            background-color: #007bff;
            color: #ffffff;
            border: 1px solid #007bff;
            border-radius: 5px;
            padding: 8px 12px;
            font-size: 14px;
            font-weight: bold;
        }

        /* Adjust the dropdown menu */
        .dropdown-menu.language-menu {
            background-color: #f8f9fa;
        }

        .dropdown-menu.language-menu a.dropdown-item {
            color: #495057;
        }

        .dropdown-menu.language-menu a.dropdown-item:hover, .dropdown-menu.language-menu a.dropdown-item:focus {
            background-color: #e9ecef;
        }
    </style>
</head>

<body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">92 Doner Kebab</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view.php">View</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add.php">Add</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="delete.php">Delete</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="update.php">Update</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="todo.php">To-Do List</a>
                    </li>
                </ul>
                <!-- Admin actions -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Admin Dashboard</a>
                    </li>
                </ul>

                <!-- Language Dropdown -->
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle language-button" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Language
                        </a>
                        <div class="dropdown-menu language-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#" onclick="changeLanguage('en')">English</a>
                            <a class="dropdown-item" href="#" onclick="changeLanguage('es')">Spanish</a>
                            <a class="dropdown-item" href="#" onclick="changeLanguage('fr')">French</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center">Welcome to 92 Doner Kebab To Do List</h2>
        <p class="text-center">Write down your tasks</p>
    </div>

    <!-- To-Do List Section -->
    <div class="container todo-container">
        <h2 style="color:white">To-Do List</h2>
        <div class="todo-input">
            <input style="color:green"  type="text" id="taskInput" placeholder="Enter task">
            <button class="btn btn-success" onclick="addTask()">Add Task</button>
        </div>
        <ul style="color:white" id="taskList" class="todo-list"></ul>
        <button class="btn btn-danger" onclick="clearTasks()">Clear All Tasks</button>
    </div>

    <script>
        var taskIdCounter = 1; // Initialize task ID counter

        function addTask() {
            var taskInput = document.getElementById("taskInput");
            var taskText = taskInput.value.trim();

            if (taskText !== "") {
                var taskList = document.getElementById("taskList");
                var listItem = document.createElement("li");
                listItem.textContent = taskIdCounter + ". " + taskText;
                listItem.className = "todo-item";
                
                // Create delete button
                var deleteButton = document.createElement("button");
                deleteButton.textContent = "Delete";
                deleteButton.className = "delete-button";
                deleteButton.onclick = function() {
                    taskList.removeChild(listItem);
                };
                
                listItem.appendChild(deleteButton);
                taskList.appendChild(listItem);
                taskInput.value = "";
                taskIdCounter++; // Increment task ID counter
            }
        }

        function clearTasks() {
            var taskList = document.getElementById("taskList");
            taskList.innerHTML = "";
            taskIdCounter = 1; // Reset task ID counter
        }

        function changeLanguage(language) {
            // Implement language change logic here
            // You can use AJAX requests to fetch translated content and update the page accordingly
            console.log("Language changed to: " + language);
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>

</html>
