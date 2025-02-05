<!-- backend -->
<!-- teacher registration -->
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

// Teacher Registration
if (isset($_POST['submit1'])) {
    $TeacherName = mysqli_real_escape_string($connection, $_POST['TeacherName']);
    $TeacherEmail = mysqli_real_escape_string($connection, $_POST['TeacherEmail']);
    $TeacherPhone = mysqli_real_escape_string($connection, $_POST['TeacherPhone']);
    $TeacherPass = mysqli_real_escape_string($connection, $_POST['TeacherPass']);

    // Hash password for security
    $hashedPass = password_hash($TeacherPass, PASSWORD_BCRYPT);

    // File upload logic
    $certificate = $_FILES['certificate']['name'];
    $certificateTmpName = $_FILES['certificate']['tmp_name'];
    $uploadDir = __DIR__ . "/uploads/certificates/";
    $fileDestination = $uploadDir . basename($certificate);

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $allowedTypes = ["png", "jpeg", "jpg", "pdf", "docx", "txt"];
    $fileType = pathinfo($fileDestination, PATHINFO_EXTENSION);

    if (!empty($certificate) && in_array($fileType, $allowedTypes)) {
        if (move_uploaded_file($certificateTmpName, $fileDestination)) {
            $Tquery = "INSERT INTO tutorinfo (TeacherName, TeacherEmail, TeacherPhone, TeacherPass, Certificates) 
                      VALUES ('$TeacherName', '$TeacherEmail', '$TeacherPhone', '$hashedPass', '$certificate')";

            if (mysqli_query($connection, $Tquery)) {
                echo "<script type='text/javascript'>
                        alert('Registration Successful!.');
                        window.location.href = './login.php';
                      </script>";
                exit();
            } else {
                echo "Error: " . mysqli_error($connection);
            }
        } else {
            echo "<script>alert('Error uploading file. Please try again.');</script>";
        }
    } else {
        if (!empty($certificate)) {
            echo "<script>alert('File type not allowed. Please upload a JPG, PNG, PDF, DOCX, or TXT file.');</script>";
        }
        $certificate = null;
    }
}

// Tuition Seeker Registration
if (isset($_POST['submit2'])) {
    $SeekerName = mysqli_real_escape_string($connection, $_POST['SeekerName']);
    $SeekerEmail = mysqli_real_escape_string($connection, $_POST['SeekerEmail']);
    $SeekerPhone = mysqli_real_escape_string($connection, $_POST['SeekerPhone']);
    $SeekerPass = mysqli_real_escape_string($connection, $_POST['SeekerPass']);

    $hashedPass = password_hash($SeekerPass, PASSWORD_BCRYPT);

    $Squery = "INSERT INTO seekerinfo (SeekerName, SeekerEmail, SeekerPhone, SeekerPass) 
              VALUES ('$SeekerName', '$SeekerEmail', '$SeekerPhone', '$hashedPass')";

    if (mysqli_query($connection, $Squery)) {
        echo "<script type='text/javascript'>
                alert('Registration Successful!');
                window.location.href = './login.php';
              </script>";
        // exit();
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>


<!-- backend -->


<!-- frontend -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TeachSphere Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./css/registration.css?v=<?php echo time(); ?>">
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
    <section class="registration-section">
        <div class="toggle-container">
            <button id="teacher-reg-btn" class="toggle-btn active">Register as Teacher</button>
            <button id="seeker-reg-btn" class="toggle-btn">Register as Tuition Seeker</button>
        </div>
        <div class="form-container">
            <div class="form teacher-reg-form">
                <h2>Teacher Registration</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="TeacherName">Name:</label>
                    <input type="text" id="TeacherName" name="TeacherName" required> <!-- database field name -->
                    
                    <label for="TeacherEmail">Email:</label>
                    <input type="email" id="TeacherEmail" name="TeacherEmail" required>
                    
                    <label for="TeacherPhone">Phone:</label>
                    <input type="tel" id="TeacherPhone" name="TeacherPhone" required>
                    
                    <label for="TeacherPass">Password:</label>
                    <input type="password" id="TeacherPass" name="TeacherPass" required>

                    <!-- <label for="certificate">Upload Cirtificate:</label> -->
                    <label class="upload-btn">
                        <i class="fas fa-upload"></i>
                        <input type="file" name="certificate" id="certificate" hidden>
                        <h4 id="fileNamePlaceholder">Upload Cirtificate:</h4>
                        <script>
                            document.getElementById("certificate").addEventListener("change", function () {
                            const fileName = this.files[0]?.name || ""; // Leave empty if no file is selected
                            const fileNamePlaceholder = document.getElementById("fileNamePlaceholder");
                            
                            if (fileNamePlaceholder) {
                                fileNamePlaceholder.textContent = fileName; // Only show file name when selected
                            }
                        });                     

                        </script>
                    </label>
                    
                    <!-- <p id="fileNamePlaceholder">No file selected</p> -->
                    <br>
                    <button type="submit" name="submit1" class="submit1" class="submit1">Register</button>
                </form>

                <!-- <p class="approval-message">
                    We will check your information. Wait for the approval. Thank you.
                </p> -->
            </div>
            <div class="form seeker-reg-form hidden">
                <h2>Tuition Seeker Registration</h2>
                <form action="" method="post">
                    <label for="SeekerName">Name:</label>
                    <input type="text" id="SeekerName" name="SeekerName" required>
                    
                    <label for="SeekerEmail">Email:</label>
                    <input type="email" id="SeekerEmail" name="SeekerEmail" required>
                    
                    <label for="SeekerPhone">Phone:</label>
                    <input type="tel" id="SeekerPhone" name="SeekerPhone" required>

                    <label for="SeekerPass">Password:</label>
                    <input type="password" id="SeekerPass" name="SeekerPass" required>

                    <button type="submit" name="submit2" class="submit2" class="submit2">Register</button>
                </form>

            </div>
        </div>
    </section>
    <script src="./JS/registration.js?v=<?php echo time(); ?>"></script>
</body>
</html>
