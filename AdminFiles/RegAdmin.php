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

// Admin Registration
if (isset($_POST['submitAdmin'])) {
    $adminId = mysqli_real_escape_string($connection, $_POST['adminId']);
    $adminGmail = mysqli_real_escape_string($connection, $_POST['adminGmail']);
    $adminPass = mysqli_real_escape_string($connection, $_POST['adminPassword']);
    $hashedPass = password_hash($adminPass, PASSWORD_BCRYPT);

    // Insert admin data into the database
    $insertQuery = "INSERT INTO admininfo (adminId, adminGmail, adminPassword) VALUES (?, ?, ?)";
    $insertStmt = mysqli_prepare($connection, $insertQuery);

    if ($insertStmt) {
        mysqli_stmt_bind_param($insertStmt, "sss", $adminId, $adminGmail, $hashedPass);

        if (mysqli_stmt_execute($insertStmt)) {
            echo "<script>
                    alert('Registration Successful!');
                    window.location.href = 'adminLogin.php';
                  </script>";
            exit();
        } else {
            echo "Error: " . mysqli_error($connection);
        }

        mysqli_stmt_close($insertStmt);
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
    <title>Admin Registration</title>
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
        .container input[type="text"],
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
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        .container button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Admin Registration</h2>
        <form action="" method="post">
            <label for="adminId">Admin ID</label>
            <input type="text" id="adminId" name="adminId" required>

            <label for="adminGmail">Email</label>
            <input type="email" id="adminGmail" name="adminGmail" required>
            
            <label for="adminPassword">Password</label>
            <input type="password" id="adminPassword" name="adminPassword" required>
            
            <button type="submit" name="submitAdmin">Register</button>
        </form>
    </div>
</body>
</html>
