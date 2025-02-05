<?php
// Connecting to the database
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'teachsphere';

$connection = mysqli_connect($server, $user, $pass, $db);

if (!$connection) {
    die('Connection failed: ' . mysqli_connect_error());
}

// Admin Login
if (isset($_POST['loginAdmin'])) {
    $adminGmail = mysqli_real_escape_string($connection, $_POST['adminGmail']);
    $adminPass = mysqli_real_escape_string($connection, $_POST['adminPassword']);

    // Fetch admin data from the database
    $query = "SELECT adminPassword FROM admininfo WHERE adminGmail = ?";
    $stmt = mysqli_prepare($connection, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $adminGmail);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $hashedPass);
        mysqli_stmt_fetch($stmt);

        // Verify password
        if (password_verify($adminPass, $hashedPass)) {
            echo "<script>
                    alert('Login Successful!');
                    window.location.href = 'adminDashboard.php'; 
                  </script>";
            exit();
        } else {
            echo "<script>alert('Invalid Email or Password');</script>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Failed to prepare the statement: " . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .container label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        .container input[type="email"],
        .container input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .container button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        .container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Admin Login</h2>
        <form action="" method="post">
            <label for="adminGmail">Email</label>
            <input type="email" id="adminGmail" name="adminGmail" required>
            
            <label for="adminPassword">Password</label>
            <input type="password" id="adminPassword" name="adminPassword" required>
            
            <button type="submit" name="loginAdmin">Login</button>
        </form>
    </div>
</body>
</html>
