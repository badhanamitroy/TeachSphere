<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutor List</title>
    <link rel="stylesheet" href="./css/indexpage.css?v=<?php echo time()?>">
    <link rel="stylesheet" href="./AdminFiles/alltutors.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        .card-top .details h2{
            font-size: 18px;
        }
    </style>
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
            <nav class="nav">
                <ul>
                    <li><a href="#">Tuitions</a></li>
                    <li><a href="tutorlist.php">Tutors</a></li>
                    <li><a href="aboutus.php">About Us</a></li>
                        <a href="login.php"><button class="login-btn">Login</button></a>
                </ul>
            </nav>
        </div>
        </div>
    </header>
    <section class="midsection">
    <h1>Our tutors</h1>
    <div class="tutor-section">
        <div class="card-container">
            <?php
            // Database connection
            $conn = new mysqli("localhost", "root", "", "teachsphere");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT TeacherName, TeacherPhone, TeacherEmail, TutorDP, institute, department, sessionyear, experience FROM tutorinfo";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <div class='card'>
                        <div class='card-top'>
                            <div class='profile-pic'>
                                <img src='./uploads/TutorDP/" . htmlspecialchars($row['TutorDP']) . "' alt='Profile Picture'>
                            </div>
                            <div class='details'>
                                <h2>" . htmlspecialchars($row['TeacherName']) . "</h2>
                            </div>
                        </div>
                        <div class='card-bottom'>
                            <p><strong>Institute:</strong> " . htmlspecialchars($row['institute']) . "</p>
                            <p><strong>Department:</strong> " . htmlspecialchars($row['department']) . "</p>
                            <p><strong>Academic Year:</strong> " . htmlspecialchars($row['sessionyear']) . "th year</p>
                            <p><strong>Experience:</strong> " . htmlspecialchars($row['experience']) . " years</p>
                            <p><strong>Preferred Classes:</strong> Specific Classes</p>
                        </div>
                    </div>";
                }
            } else {
                echo "<p>No tutors found.</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>
    </section>
</body>
</html>