<?php
session_start();

// Database connection
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'teachsphere';

$connection = mysqli_connect($server, $user, $pass, $db);

if (!$connection) {
    die('Connection failed: ' . mysqli_connect_error());
}

if (isset($_POST['Save'])) {
    // Handle DP upload
    if (isset($_FILES['TutorDP']) && !empty($_FILES['TutorDP']['name'])) {
        $TutorDP = uniqid() . '_' . $_FILES['TutorDP']['name'];
        $TutorDPTmpName = $_FILES['TutorDP']['tmp_name'];
        $uploadDir = __DIR__ . "/uploads/TutorDP/";
        $fileDestination = $uploadDir . basename($TutorDP);

        // Create upload directory if it doesn't exist
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Validate file type
        $allowedTypes = ["png", "jpeg", "jpg", "JPG"];
        $fileType = pathinfo($fileDestination, PATHINFO_EXTENSION);

        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($TutorDPTmpName, $fileDestination)) {
                $DPquery = "UPDATE tutorinfo SET TutorDP = '$TutorDP' WHERE id = '$_SESSION[id]'";

                if (mysqli_query($connection, $DPquery)) {
                    echo "<script>alert('Profile picture uploaded successfully!');</script>";
                } else {
                    echo "Error: " . mysqli_error($connection);
                }
            } else {
                echo "<script>alert('Error uploading file. Please try again.');</script>";
            }
        } else {
            echo "<script>alert('File type not allowed. Please upload a JPG, PNG, or JPEG.');</script>";
        }
    }

    // Handle other information upload
    $division = isset($_POST['division']) ? mysqli_real_escape_string($connection, $_POST['division']) : '';
    $department = isset($_POST['department']) ? mysqli_real_escape_string($connection, $_POST['department']) : '';
    $institute = isset($_POST['institute']) ? mysqli_real_escape_string($connection, $_POST['institute']) : '';
    $session = isset($_POST['sessionyear']) ? mysqli_real_escape_string($connection, $_POST['sessionyear']) : '';
    $gender = isset($_POST['gender']) ? mysqli_real_escape_string($connection, $_POST['gender']) : '';
    $experience = isset($_POST['experience']) ? mysqli_real_escape_string($connection, $_POST['experience']) : '';
    $address = isset($_POST['address']) ? mysqli_real_escape_string($connection, $_POST['address']) : '';
    $preferred_area = isset($_POST['preferred_area']) ? mysqli_real_escape_string($connection, $_POST['preferred_area']) : '';
    $Preferred_Subjects = isset($_POST['Preferred_Subjects']) ? mysqli_real_escape_string($connection, $_POST['Preferred_Subjects']) : '';
    $Preferred_Classes = isset($_POST['Preferred_Classes']) ? mysqli_real_escape_string($connection, $_POST['Preferred_Classes']) : '';
    $Availiabity = isset($_POST['Availiabity']) ? mysqli_real_escape_string($connection, $_POST['Availiabity']) : '';

    $moreInfoQuery = "UPDATE tutorinfo 
                        SET division = '$division', 
                            department = '$department', 
                            institute = '$institute',
                            sessionyear = '$session',
                            gender = '$gender',
                            experience = '$experience',
                            address = '$address',
                            preferred_area = '$preferred_area',
                            Preferred_Classes = '$Preferred_Classes',
                            Preferred_Subjects = '$Preferred_Subjects',
                            Availiabity = '$Availiabity'
                        WHERE id = '$_SESSION[id]'";

    if (mysqli_query($connection, $moreInfoQuery)) {
        echo "<script>
                alert('Saving Successful! Your Information has been uploaded.');
                window.location.href = 'tutorfeed.php';
              </script>";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setup Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/css/multi-select-tag.css">
    <link rel="stylesheet" href="./css/TutorProfileSetup.css?v=<?php echo time(); ?>">
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
    <section>
        <div class="profile-setup">
            <h1>Setup Your Profile</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="profile-pic">
                    <label for="profile-image">
                        <div class="image-upload" id="image-preview">
                            <i class="fa-solid fa-camera"></i>
                        </div>
                    </label>
                    <input type="file" id="profile-image" name="TutorDP" accept=".jpg, .jpeg, .png" required hidden>
                    <div class="info">
                        <h3><strong><?php echo isset($_SESSION['TeacherName']) ? $_SESSION['TeacherName'] : 'Your Name'; ?></strong></h3>
                        <p><?php echo isset($_SESSION['TeacherEmail']) ? $_SESSION['TeacherEmail'] : 'Your Email'; ?></p>
                        <p><?php echo isset($_SESSION['TeacherPhone']) ? $_SESSION['TeacherPhone'] : 'Your Phone'; ?></p>
                    </div>
                </div>
                <div class="form-grid">
                    <div>
                        <label for="institute">Studying Institute</label>
                        <input type="text" placeholder="<?php echo $_SESSION['institute'] ?>" name="institute" required>
                    </div>
                    <div>
                        <label for="department">Studying Department</label>
                        <input type="text" placeholder="<?php echo $_SESSION['department'] ?>" name="department" required>
                    </div>
                    <div>
                        <label for="sessionyear">Session/Year</label>
                        <input type="text" placeholder="<?php echo $_SESSION['sessionyear']?>" name="sessionyear" required>
                    </div>
                    <div>
                        <label for="gender">Select Gender</label>
                        <select name="gender" required>
                            <option value="" disabled selected><?php echo $_SESSION['gender']?></option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div>
                        <label for="experience">Tuition Experience (years)</label>
                        <input type="number" placeholder="<?php echo $_SESSION['experience'] ?>" name="experience" min="0" required>
                    </div>
                    <div>
                        <label for="address">Living Address</label>
                        <textarea name="address" placeholder="<?php echo $_SESSION['address']?>" rows="1" required></textarea>
                    </div>
                    <div>
                        <label for="division">Division</label>
                        <select name="division" required>
                            <option value="" disabled selected><?php echo $_SESSION['division']?></option>
                            <option value="Chattogram">Chattogram</option>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Cumilla">Cumilla</option>
                            <option value="Sylhet">Sylhet</option>
                        </select>
                    </div>
                    <div>
                        <label for="Availiabity">Update Your Availability</label>
                        <select name="Availiabity" required>
                            <option value="" disabled selected><?php echo $_SESSION['Availiabity']?></option>
                            <option value="Available">Available</option>
                            <option value="Not Available">Not Available</option>
                        </select>
                    </div>
                    <div>
                        <label for="preferred_area">Preferred Areas for Tuition</label>
                        <input type="text" placeholder="<?php echo $_SESSION['preferred_area']?>" name="preferred_area" required>
                    </div>
                    <div>
                        <label for="Preferred_Classes">Preferred Classes</label>
                        <input type="text" 
                            placeholder="<?php echo isset($_SESSION['Preferred_Classes']) ? $_SESSION['Preferred_Classes'] : 'Enter Preferred Classes'; ?>" 
                            name="Preferred_Classes" 
                            required>
                    </div>
                    <div>
                        <label for="Preferred_Subjects">Preferred Subjects</label>
                        <input type="text" 
                            placeholder="<?php echo isset($_SESSION['Preferred_Subjects']) ? $_SESSION['Preferred_Subjects'] : 'Enter Preferred Subjects'; ?>" 
                            name="Preferred_Subjects" 
                            required>
                    </div>
                </div>
                <button type="submit" id="Save" name="Save">Save Information</button>
            </form>
        </div>
    </section>

    <script>
        const profileImageInput = document.getElementById('profile-image');
        const imagePreview = document.getElementById('image-preview');

        profileImageInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    imagePreview.style.backgroundImage = `url('${e.target.result}')`;
                    imagePreview.style.backgroundSize = 'cover';
                    imagePreview.style.backgroundPosition = 'center';
                    imagePreview.innerHTML = ''; // Remove camera icon
                };

                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>
