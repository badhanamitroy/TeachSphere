<?php
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "teachsphere");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $tutorID = $_GET['id'];

    // Prepare SQL query
    $query = "SELECT * FROM tutorinfo WHERE id = ?";
    $stmt = $conn->prepare($query);

    // Check if the statement was prepared successfully
    if ($stmt === false) {
        die('Error preparing the SQL statement: ' . $conn->error);
    }

    // Bind parameters and execute the query
    $stmt->bind_param('i', $tutorID);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Fetch the tutor's details
            $tutor = $result->fetch_assoc();

            // Store the details in the session or display them directly
            $_SESSION['TeacherName'] = $tutor['TeacherName'];
            $_SESSION['TutorDP'] = $tutor['TutorDP'];
            $_SESSION['Availiabity'] = $tutor['Availiabity'];
            $_SESSION['institute'] = $tutor['institute'];
            $_SESSION['department'] = $tutor['department'];
            $_SESSION['Certificates'] = $tutor['Certificates'];
            $_SESSION['experience'] = $tutor['experience'];
            $_SESSION['preferred_area'] = $tutor['preferred_area'];
            $_SESSION['Preferred_Classes'] = $tutor['Preferred_Classes'];
            $_SESSION['Preferred_Subjects'] = $tutor['Preferred_Subjects'];
        } else {
            echo 'Tutor not found!';
        }
    } else {
        die('Error executing the SQL statement: ' . $stmt->error);
    }

    $stmt->close();
} else {
    echo '';
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TeachSphere Profile</title>
    <link rel="stylesheet" href="./css/tutorProfile.css?v=<?php echo time()?>">
    <!-- FontAwesome for eye icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="logo">
            <a href="tutorfeed.php">
                <img src="./media/teachsphere-dark-logo.png" alt="TeachSphere Logo">
            </a>
        </div>
        <nav class="nav">
            <a href="logout.php">
                <button class="logout-btn">Log out</button>
            </a>
        </nav>
    </header>

    <section class="profile-section">
        <div class="profile-container">
            <div class="profile-image">
                <img src="./uploads/TutorDP/<?php echo $_SESSION['TutorDP'];?>" alt="Profile Picture">
            </div>
            <div class="profile-details">
                <a href="TutorProfileSetup.php">
                    <button>Edit</button>
                </a>
                <h1><?php echo $_SESSION['TeacherName']; ?></h1>
                <p>
                    <span style="
                        font-weight: bold; 
                        <?php 
                            if ($_SESSION['Availiabity'] == "Available") {
                                echo "color: green;"; // Green for Available
                            } elseif ($_SESSION['Availiabity'] == "Not Available") {
                                echo "color: red;"; // Red for Not Available
                            }
                        ?>">
                        <?php echo $_SESSION['Availiabity']; ?>
                    </span>
                </p>
                <p><strong>Studies at </strong> <?php echo $_SESSION['institute']; ?></p>
                <p><strong>Department:</strong> <?php echo $_SESSION['department']; ?></p>
                <p><strong>Experience:</strong> <?php echo $_SESSION['experience']; ?> years</p>

                <!-- Display Preferred Area -->
                <p><strong>Preferred Area:</strong> <?php echo $_SESSION['preferred_area']; ?></p>

                <!-- Display Preferred Classes -->
                <p><strong>Preferred Classes:</strong> <?php echo $_SESSION['Preferred_Classes']; ?></p>

                <!-- Display Preferred Subjects -->
                <p><strong>Preferred Subjects:</strong> <?php echo $_SESSION['Preferred_Subjects']; ?></p>

                <p><strong>View Certificates:</strong> 
                    <a href="./uploads/certificates/<?php echo $_SESSION['Certificates']; ?>" target="_blank">
                        <i class="fas fa-eye" style="font-size: 20px; color: #007BFF;" title="View Certificates"></i>
                    </a>
                </p>
                <!-- <p><strong>View Certificates:</strong> <a href="./uploads/certificates/<?php echo $_SESSION['Certificates']; ?>" target="_blank">View</a></p> -->
            </div>
        </div>
    </section>
</body>
</html>
