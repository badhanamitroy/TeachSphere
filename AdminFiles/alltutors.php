<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutor List</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="alltutors.css">
</head>
<body>

    <div class="tutor-section">
        <div class="card-container">
            <?php
            // Database connection
            $conn = new mysqli("localhost", "root", "", "teachsphere");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM tutorinfo";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <div class='card'>
                        <div class='card-top'>
                            <div class='profile-pic'>
                                <img src='../uploads/TutorDP/" . htmlspecialchars($row['TutorDP']) . "' alt='Profile Picture'>
                            </div>
                            <div class='details'>
                                <h2>" . htmlspecialchars($row['TeacherName']) . "</h2>
                                <p><strong>Availability: </strong> " . htmlspecialchars($row['Availiabity']) . "</p>
                                <p><strong>Email: </strong> " . htmlspecialchars($row['TeacherEmail']) . "</p>
                                <p><strong>Phone: </strong> " . htmlspecialchars($row['TeacherPhone']) . "</p>
                            </div>
                        </div>
                        <div class='card-bottom'>
                            <p><strong>Institute:</strong> " . htmlspecialchars($row['institute']) . "</p>
                            <p><strong>Department:</strong> " . htmlspecialchars($row['department']) . "</p>
                            <p><strong>Academic Year:</strong> " . htmlspecialchars($row['sessionyear']) . "th year</p>
                            <p><strong>Experience:</strong> " . htmlspecialchars($row['experience']) . " years</p>
                            <p><strong>Preferred Classes:</strong> " . htmlspecialchars($row['Preferred_Classes']) . "</p>
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

    <!-- <a href="adminDashboard.php">
        <button style="background-color: aqua; color: black; position: fixed; z-index: 10; bottom: 20px; right: 20px; border: none; padding: 10px 20px; font-size: 16px; border-radius: 8px; cursor: pointer; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);">
            Back
        </button>
    </a> -->

</body>
</html>
