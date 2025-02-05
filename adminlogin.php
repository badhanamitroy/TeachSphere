<!-- Backend -->
<?php
session_start();  // Start the session

// Connect to the database
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'teachsphere';
$connection = mysqli_connect($server, $user, $pass, $db);

if (!$connection) {
    die('Connection failed: ' . mysqli_connect_error());
}

// Teacher login form submission

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    // Ensure 'empId' and 'empPass' are set before trying to use them
    if (!empty($_POST['adminGmail']) && !empty($_POST['adminPassword'])) {
        
        // Sanitize inputs to prevent SQL injection
        
        $adminId = mysqli_real_escape_string($connection, $_POST['adminId']);
        $adminGmail = mysqli_real_escape_string($connection, $_POST['adminGmail']);
        $adminPassword = mysqli_real_escape_string($connection, $_POST['adminPassword']);

        // Prepare SQL query to fetch employee data
        $sql = "SELECT * FROM admininfo WHERE adminId = '$adminId' AND adminGmail = '$adminGmail' AND adminPassword = '$adminPassword'";
        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Fetch user data and start session
            while ($row = mysqli_fetch_assoc($result)) {
                $_SESSION['adminId'] = $row['adminId'];
                $_SESSION['adminGmail'] = $row['adminGmail'];
            }

                  header("Location: index.php");
            exit();  // Prevent further script execution

        } else {
            // Display error if login fails
            echo "<script type='text/javascript'>
                    alert('Invalid Employee ID or Password.');
                  </script>";
        }

    } else {
        // If the form fields are empty, display an error message
        echo "<script type='text/javascript'>
                alert('Please fill in both Teacher Email and Password.');
              </script>";
    }
}
?>

<!-- Frontend -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="./css/login.css?v=<?php echo time(); ?>">

    <style>

        body{
            margin: 0;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        header .logo img {
            max-width: 150px;
            display: block;
            margin: 0 auto;
        }

        .form-container {
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            padding: 30px;
            width: 100%;
            max-width: 400px;
            margin: 50px auto;
        }

        .form-container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .form-container label {
            font-size: 14px;
            color: #555;
            display: block;
            margin-bottom: 8px;
        }

        .form-container button {
            width: 100%;
            padding: 12px;
            color: #ffffff;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .form-container button:hover {
            background-color: #2575fc;
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 20px;
            }

            .form-container input {
                font-size: 13px;
            }

            .form-container button {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="head-content">
                <div class="logo">
                    <img src="./media/teachsphere-dark-logo.png" alt="TeachSphere Logo">
                </div>
            </div>
        </div>
    </header>
        <!-- Admin login form -->
        <div class="form-container">
            <div class="">
                <h2>Admin Login</h2>
                <form action="" method="post">
                    <label for="adminId">Admin ID</label>
                    <input type="text" id="adminId" name="adminId" required>

                    <label for="adminGmail">Email:</label>
                    <input type="email" id="adminGmail" name="adminGmail" required>
                    
                    <label for="adminPassword">Password:</label>
                    <input type="password" id="adminPassword" name="adminPassword" required>
                    
                    <button type="submit" name="submit" class="submit" class="submit">Log in</button>
                </form>
            </div>
          </div>

    </body>
</html>