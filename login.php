<!-- Backend -->
<?php
session_start();

// Connect to the database
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'teachsphere';
$connection = mysqli_connect($server, $user, $pass, $db);

if (!$connection) {
    die('Connection failed: ' . mysqli_connect_error());
}

// Teacher login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit1'])) {
    $TeacherEmail = mysqli_real_escape_string($connection, $_POST['TeacherEmail']);
    $TeacherPass = mysqli_real_escape_string($connection, $_POST['TeacherPass']);

    $sql = "SELECT * FROM tutorinfo WHERE TeacherEmail = '$TeacherEmail'";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($TeacherPass, $row['TeacherPass'])) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['TeacherName'] = $row['TeacherName'];
            $_SESSION['TeacherEmail'] = $row['TeacherEmail'];
            $_SESSION['TeacherPhone'] = $row['TeacherPhone'];
            $_SESSION['Certificates'] = $row['Certificates'];
            $_SESSION['TutorDP'] = $row['TutorDP'];
            $_SESSION['division'] = $row['division'];
            $_SESSION['department'] = $row['department'];
            $_SESSION['institute'] = $row['institute'];
            $_SESSION['sessionyear'] = $row['sessionyear'];
            $_SESSION['gender'] = $row['gender'];
            $_SESSION['experience'] = $row['experience'];
            $_SESSION['address'] = $row['address'];
            $_SESSION['Availiabity'] = $row['Availiabity'];
            $_SESSION['preferred_area'] = $row['preferred_area'];
            $_SESSION['Preferred_Subjects'] = $row['Preferred_Subjects'];
            $_SESSION['Preferred_Classes'] = $row['Preferred_Classes'];
            if ($_SESSION['TeacherName'] != null && $_SESSION['TeacherEmail'] != null && $_SESSION['TeacherPhone'] != null && $_SESSION['Certificates'] != null && $_SESSION['institute'] != null && $_SESSION['gender'] != null && $_SESSION['experience'] != null){
                header('Location: tutorfeed.php');
            }else{
                header("Location: TutorProfileSetup.php");
            }
        } else {
            echo "<script>alert('Invalid Email or Password.');</script>";
        }
    } else {
        echo "<script>alert('Invalid Email or Password.');</script>";
    }
}

// Tution Seeker login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit2'])) {
    $SeekerEmail = mysqli_real_escape_string($connection, $_POST['SeekerEmail']);
    $SeekerPass = mysqli_real_escape_string($connection, $_POST['SeekerPass']);

    $sql = "SELECT * FROM seekerinfo WHERE SeekerEmail = '$SeekerEmail'";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($SeekerPass, $row['SeekerPass'])) {
            $_SESSION['Sid'] = $row['Sid'];
            $_SESSION['SeekerName'] = $row['SeekerName'];
            $_SESSION['SeekerEmail'] = $row['SeekerEmail'];
            header("Location: seekerNews/SeekerFeed.php");
            exit();
        } else {
            echo "<script>alert('Invalid Email or Password.');</script>";
        }
    } else {
        echo "<script>alert('Invalid Email or Password.');</script>";
    }
}
?>

<!-- Backend -->

<!-- Frontend -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TeachSphere Login</title>
    <link rel="stylesheet" href="./css/login.css?v=<?php echo time(); ?>">
</head>
<body>
    <header>
        <div class="container">
            <div class="head-content">
                <div class="logo">
                    <a href="index.php">
                    <img src="./media/teachsphere-dark-logo.png" alt="TeachSphere Logo">
                    </a>
                </div>
            </div>
        </div>
    </header>
    <section class="login-section">
        <div class="toggle-container">
            <button id="teacher-login-btn" class="toggle-btn active">Login as Teacher</button>
            <button id="seeker-login-btn" class="toggle-btn">Login as Tuition Seeker</button>
        </div>
        <!-- Teacher login form -->
        <div class="form-container">
            <div class="form teacher-login-form">
                <h2>Teacher Login</h2>
                <form action="" method="post">
                    <label for="TeacherEmail">Email:</label>
                    <input type="email" id="TeacherEmail" name="TeacherEmail" required>
                    
                    <label for="TeacherPass">Password:</label>
                    <input type="password" id="TeacherPass" name="TeacherPass" required>
                    
                    <button type="submit" name="submit1" class="submit1" class="submit1">Log in</button>

                </form>
                <h4>Not registered yet? <a href="Registration.php">Register now.</a></h4>
            </div>
            
            <!--Tutor seeker  -->
            <div class="form seeker-login-form hidden">
                <h2>Tuition Seeker Login</h2>
                <form action="" method="post">
                    <label for="SeekerEmail">Email:</label>
                    <input type="email" id="SeekerEmail" name="SeekerEmail" required>
                    
                    <label for="SeekerPass">Password:</label>
                    <input type="password" id="SeekerPass" name="SeekerPass" required>
                    
                    <button type="submit" name="submit2" class="submit2" class="submit2">Log in</button>

                </form>
                <h4>Not registered yet? <a href="Registration.php">Register now.</a></h4>
            </div>
        </div>
    </section>
    <script src="./js/login.js?v=<?php echo time(); ?>"></script>
</body>
</html>
