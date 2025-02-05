<?php
// Start the session
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teachsphere";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle the request job action
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['request_job'])) {
    $postID = (int)$_POST['post_id']; // Fetch the tuition post ID from the form
    $teacherName = $_SESSION['TeacherName'] ?? null; // Get the teacher's name from the session

    if ($teacherName && $postID) {
        // Update the TeacherName in the tutionposts table
        $stmt = $conn->prepare("UPDATE tutionposts SET TeacherName = ? WHERE id = ?");
        $stmt->bind_param("si", $teacherName, $postID);

        if ($stmt->execute()) {
            echo "<script>alert('You have successfully requested this job!');</script>";
        } else {
            echo "<script>alert('Failed to request the job. Please try again.');</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Invalid request. Please log in and try again.');</script>";
    }
}

// Fetch tuition requirements
$sql = "SELECT * FROM tutionposts";
$result = $conn->query($sql);

if (!$result) {
    die("Error in query execution: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutor Newsfeed</title>
    <link rel="stylesheet" href="./css/tutorfeed.css?v=<?php echo time(); ?>">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <a href="#">
                    <img src="./media/teachsphere-dark-logo.png" alt="TeachSphere Logo">
                </a>
            </div>
            <div class="profile">
                <div class="name">
                    <h3><?php echo isset($_SESSION['TeacherName']) ? htmlspecialchars($_SESSION['TeacherName']) : 'Your Name'; ?></h3>
                </div>
                <div class="avatar">
                    <a href="tutorProfile.php">
                    <?php
                        $tutorDP = htmlspecialchars($_SESSION['TutorDP'] ?? 'default.png');
                        echo '<img src="./uploads/TutorDP/' . $tutorDP . '" alt="Profile Picture" class="profile-pic">';
                    ?>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <div class="notifications"></div>

    <section>
        <div class="cards container">
            <?php 
            if ($result->num_rows > 0) {
                while ($requirement = $result->fetch_assoc()) { 
            ?>
            <div class="card">
                <div class="details">
                    <p><strong>Posted by: </strong><?php echo htmlspecialchars($requirement['SeekerName']); ?></p>
                    <p><strong>Class: </strong><?php echo htmlspecialchars($requirement['class']); ?></p>
                    <p><strong>Days: </strong><?php echo htmlspecialchars($requirement['days']); ?> days</p>
                    <p><strong>Location: </strong><?php echo htmlspecialchars($requirement['location']); ?></p>
                    <p><strong>Subject: </strong><?php echo htmlspecialchars($requirement['subject']); ?></p>
                    <p><strong>Special Requirement: </strong><?php echo htmlspecialchars($requirement['Other_Requirements']); ?></p>
                    <p><strong>Salary: </strong><?php echo htmlspecialchars($requirement['salary']); ?> BDT</p>
                </div>
                <form method="post">
                    <input type="hidden" name="post_id" value="<?php echo $requirement['id']; ?>">
                    <button type="submit" name="request_job">Request this job</button>
                </form>
            </div>
            <?php 
                }
            } else {
                echo "<p>No tuition posts available.</p>";
            }
            ?>
        </div>
    </section>
</body>
</html>
