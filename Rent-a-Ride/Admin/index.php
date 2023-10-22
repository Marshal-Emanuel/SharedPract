<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        /* Style the form container */
        .form-container {
            background: linear-gradient(180deg, #333, #000);
            color: #fff;
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 30px;
            max-width: 400px;
            margin: 0 auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
        }

        /* Style form elements */
        .form-container input[type="text"],
        .form-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            background: rgba(0, 0, 0, 0.4);
            border: none;
            border-radius: 10px;
            color: #fff;
        }

        .form-container input[type="submit"] {
            background: rgba(0, 0, 0, 0.8);
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 15px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-container input[type="submit"]:hover {
            background: rgba(0, 0, 0, 0.6);
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Admin Login</h2>
        <form method="POST" action="Admin.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Login">
        </form>
        <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Validation code goes here
                $username = $_POST['username'];
                $password = $_POST['password'];
                
                // Check if the username and password are correct
                if ($username === 'your_username' && $password === 'your_password') {
                    // Redirect to the admin panel or perform other actions
                    header("Location: Admin.html");
                } else {
                    echo "<p style='color: red;'>Invalid username or password. Please try again.</p>";
                }
            }
        ?>
    </div>
</body>
</html>
