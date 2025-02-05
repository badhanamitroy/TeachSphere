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
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #121212;
            color: #e0e0e0;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
        }
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }
        .card {
            background-color: #1e1e1e;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
        }
        .details p {
            margin: 10px 0;
            font-size: 14px;
            color: #b0b0b0;
        }
        .details p strong {
            color: #00bcd4;
        }
        a button {
            background-color: #00bcd4;
            color: #121212;
            position: fixed;
            z-index: 10;
            bottom: 20px;
            right: 20px;
            border: none;
            padding: 12px 24px;
            font-size: 16px;
            border-radius: 50px;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        a button:hover {
            background-color: #0097a7;
            transform: scale(1.1);
        }
        .no-data {
            text-align: center;
            font-size: 18px;
            color: #757575;
            margin-top: 50px;
        }
    </style>
</head>
<body>


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
    <!-- <a href="adminDashboard.php">
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
    </a> -->
    
</body>
</html>
