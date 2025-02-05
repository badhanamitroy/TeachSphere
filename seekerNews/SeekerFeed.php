<?php
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "teachsphere");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle POST data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch seeker info from session
    $seekerid = $_SESSION['Sid'];
    $seekername = $_SESSION['SeekerName'];

    // Sanitize and validate input data
    $class = $conn->real_escape_string($_POST['class']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $medium = $conn->real_escape_string($_POST['medium']);
    $days = (int)$_POST['days'];
    $location = $conn->real_escape_string($_POST['location']);
    $salary = (int)$_POST['salary'];
    $Other_Requirements = $conn->real_escape_string($_POST['Other_Requirements']);

    // Insert into database with seeker ID and name
    $sql = "INSERT INTO tutionposts (Sid, SeekerName, class, gender, subject, medium, days, location, salary, Other_Requirements) 
            VALUES ($seekerid, '$seekername', '$class', '$gender', '$subject', '$medium', $days, '$location', $salary, '$Other_Requirements')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Tution post submitted successfully!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seeker Newsfeed</title>
    <link rel="stylesheet" href="SeekerFeed.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="newsfeed-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>Welcome <br> <span><?php echo $_SESSION['SeekerName']?></span></h2>
            <!-- tution post -->
            <h3>Post a Tution</h3>
            <div class="form-section">
                <form action="" method="post">
                    <input type="hidden" name="seekerid" value="<?php echo $_SESSION['Sid']; ?>">
                    <input type="hidden" name="seekername" value="<?php echo $_SESSION['SeekerName']; ?>">

                    <label>Class:</label>
                    <input type="text" name="class" placeholder="Enter class" required>
                    <label>Gender:</label>
                    <div class="radio-group">
                        <input type="radio" name="gender" value="Any"> Any<br>
                        <input type="radio" name="gender" value="Male"> Male<br>
                        <input type="radio" name="gender" value="Female"> Female<br>
                    </div>
                    <label>Subject:</label>
                    <input type="text" name="subject" placeholder="Enter subject" required>
                    <label>Medium:</label>
                    <div class="radio-group">
                        <input type="radio" name="medium" value="Bangla" checked> Bangla<br>
                        <input type="radio" name="medium" value="English"> English<br>
                    </div>
                    <label>Number of Days:</label>
                    <input type="number" name="days" min="1" placeholder="Enter number of days" required>
                    <label>Location:</label>
                    <input type="text" name="location" placeholder="Enter location" required>
                    <label>Salary (in Taka):</label>
                    <input type="number" name="salary" min="0" placeholder="Enter salary" required>
                    <label>Other Requirements:</label>
                    <input type="text" name="Other_Requirements" placeholder="Enter other requirements">
                    <button type="submit" class="post-btn">Post Tuition</button>
                </form>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="main-content">
            <header class="header">
                <img src="../media/teachsphere-dark-logo.png" alt="TeachSphere Logo" class="logo">
                <div class="header-right">
                    <span class="notifications">🔔 Notifications</span>
                    <a href="../logout.php">
                        <button class="logout-btn">Log out</button>
                    </a>
                </div>
            </header>
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
                        $tutorID = $row['id'];
                        echo '<div class="card">';
                        echo '<img src="../uploads/TutorDP/' . htmlspecialchars($row['TutorDP']) . '" alt="Profile Picture">';
                        echo '<h3>' . htmlspecialchars($row["TeacherName"]) . '</h3>';
                        echo '<p>' . htmlspecialchars($row["institute"]) . '</p>';
                        echo '<p>' . htmlspecialchars($row["experience"]) . ' years of Tuition Experience</p>';
                        echo '<p>' . htmlspecialchars($row["Availiabity"]) . ' for tuition</p>';
                        echo '<button onclick="showPopup(\'../tutorProfile.php?id=' . $tutorID . '\')">View Details</button>';
                        echo '<a href="RequestTutor.php?id='.$tutorID.'"><button>Choose This Tutor</button></a>';
                        echo '</div>';
                    }                
                } else {
                    echo '<p>No tutors available.</p>';
                }

                $conn->close();
                ?>
            </div>
        </div>
    </div>

    <!-- Popup -->
    <div id="popup" class="popup-overlay" style="display: none;">
        <div class="popup-content">
            <span class="close-btn" onclick="hidePopup()">✖</span>
            <iframe id="popup-iframe" src="" frameborder="0"></iframe>
        </div>
    </div>

    <script>
        function showPopup(tutorProfileUrl) {
            const popup = document.getElementById('popup');
            const iframe = document.getElementById('popup-iframe');
            popup.style.display = 'flex'; // Show the popup
            iframe.src = tutorProfileUrl; // Load the URL passed to the function
        }

        // Function to hide the popup
        function hidePopup() {
            const popup = document.getElementById('popup');
            const iframe = document.getElementById('popup-iframe');
            popup.style.display = 'none'; // Hide the popup
            iframe.src = ''; // Clear iframe content
        }
    </script>
</body>
</html>
