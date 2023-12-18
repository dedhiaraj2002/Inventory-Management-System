<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-container {
            max-width: 400px;
            margin: auto;
            margin-top: 100px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #dc3545; /* Change to red color */
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #dc3545; /* Change to red color */
            border: none;
        }

        .btn-primary:hover {
            background-color: #c82333; /* Darker red on hover */
        }

        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container login-container">
    <h2>Login</h2>
    <?php
    // Dummy credentials (replace these with your actual authentication logic)
    $validUsername = 'yugen';
    $validPassword = 'yugen123';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $enteredUsername = $_POST['username'];
        $enteredPassword = $_POST['password'];

        if ($enteredUsername === $validUsername && $enteredPassword === $validPassword) {
            // Authentication successful, redirect to index.php
            header('Location: index.php');
            exit();
        } else {
            echo '<div class="alert alert-danger" role="alert">Invalid credentials. Please try again.</div>';
        }
    }
    ?>


    <form method="post">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" method="post" action="login.php" class="btn btn-primary btn-block">Login</button>
    </form>
</div>

<!-- Bootstrap JS and jQuery (for Bootstrap functionality) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>