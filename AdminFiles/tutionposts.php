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
    <title>Tutionlist</title>
    <link rel="stylesheet" href="../css/tutorfeed.css?v=<?php echo time()?>">
    <style>
        body{
            background-color: #f2f2f2;
        }

    </style>
</head>
<body>

    <section>
        <div class="cards container">
            <?php 
            if ($result->num_rows > 0) {
                while ($requirement = $result->fetch_assoc()) { 
            ?>
            <div class="card" >
            <div class="details" style="background-color: darkblue; 
                                color: black; 
                                border-radius: 10px; /* Fixed typo: 'radias' to 'radius' */
                                padding: 15px; 
                                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
                                font-size: 16px; 
                                line-height: 1.6;">
                                <!-- <h3>Anonymous Participant</h3> -->
                                <p>Class: <?php echo htmlspecialchars($requirement['class']); ?></p>
                                <p>Days: <?php echo htmlspecialchars($requirement['days']); ?> days</p>
                                <p>Location: <?php echo htmlspecialchars($requirement['location']); ?></p>
                                <p>Subject: <?php echo htmlspecialchars($requirement['subject']); ?></p>
                                <p>Other Requirements: <?php echo htmlspecialchars($requirement['Other_Requirements']); ?> is mostly preferable</p>
                                <p>Salary: <?php echo htmlspecialchars($requirement['salary']); ?> BDT</p>
                            </div>
                <div class="butt" style="display:flex;">
                <button style="background-color: green;">Approve</button>
                <button style="background-color: red;">Decline</button>
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
    <a href="adminDashboard.php">
    <button style="
    background-color: aqua; 
    color: black; 
    position: fixed; 
    z-index: 10; 
    bottom: 20px; 
    right: 20px; 
    border: none; 
    padding: 10px 20px; 
    font-size: 16px; 
    border-radius: 8px; 
    cursor: pointer; 
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);">
    Back
</button>
    </a>
</body>
</html>
