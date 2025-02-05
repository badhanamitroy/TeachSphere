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
    <!-- <link rel="stylesheet" href="./css/indexpage.css?v=<?php echo time()?>"> -->
    <link rel="stylesheet" href="./css/tutorfeed.css?v=<?php echo time(); ?>">

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

    <div class="notifications"></div>

    <section>
        <div class="cards container">
            <?php 
            if ($result->num_rows > 0) {
                while ($requirement = $result->fetch_assoc()) { 
            ?>
            <div class="card">
                <div class="details">
                    <p><strong>Posted by: </strong><?php echo $requirement['SeekerName']; ?></p>
                    <p><strong>Class: </strong><?php echo htmlspecialchars($requirement['class']); ?></p>
                    <p><strong>Days: </strong><?php echo htmlspecialchars($requirement['days']); ?> days</p>
                    <p><strong>Location: </strong><?php echo htmlspecialchars($requirement['location']); ?></p>
                    <p><strong>Subject: </strong><?php echo htmlspecialchars($requirement['subject']); ?></p>
                    <p><strong>Special Requirement: </strong><?php echo htmlspecialchars($requirement['Other_Requirements']); ?></p>
                    <p><strong>Salary: </strong><?php echo htmlspecialchars($requirement['salary']); ?> BDT</p>
                </div>
            </div>
            <?php 
                }
            } else {
            // echo "<script>alert('Invalid Email or Password.');</script>";

                echo "<p>No tuition posts available.</p>";
            }
            ?>
        </div>
    </section>
    
</body>
</html>
