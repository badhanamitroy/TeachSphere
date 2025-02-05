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

// Showing total number of tutors from the database


// Showing total number of tutors seekers from the database

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About TeachSphere</title>
    <link rel="stylesheet" href="./css/indexpage.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/aboutus.css?v=<?php echo time(); ?>">
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
                        <li><a href="#">About Us</a></li>
                        <a href="login.php"><button class="login-btn">Login</button></a>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Top Section -->
    <section class="top">
        <div class="content">
            <!-- Left Section -->
            <div class="left">
                <h2>Welcome to TeachSphere</h2>
                <p>TeachSphere is a versatile platform designed to connect guardians, students, and tutors, offering both online and offline tutoring options to meet diverse learning needs. The platform features a dynamic database of tutors with detailed profiles, ensuring users can make informed decisions. Additionally, it incorporates a seamless and privacy-focused contact mechanism, enabling safe and efficient communication between all parties.</p>
            </div>

            <!-- Right Section -->
            <div class="right">
                <div class="righttop">
                    <center>
                    <img src="./media/coaching.jpg" alt="TeachSphere Coaching">
                    </center>
                </div>
                <div class="rightbottom">
                    <div class="rbleft">
                    <div class="card">
                    <?php
                        // Query to count the total number of tutors
                        $tutorCountQuery = "SELECT COUNT(*) AS total_tutors FROM tutorinfo;";
                        $tcResult = mysqli_query($connection, $tutorCountQuery);

                        // Check if the query succeeded
                        if ($tcResult) {
                            $row = mysqli_fetch_assoc($tcResult);
                            $totalTutors = $row['total_tutors'];
                            echo "Total Tutors <h2>" . $totalTutors . "</h2>";
                        } else {
                            // Display an error message if the query fails
                            echo "<h2>Error retrieving tutor count</h2>";
                        }
                    ?>
                    </div>

                        <!-- <div class="card">Number of experienced teachers</div> -->
                    </div>
                    <div class="rbright">
                        <div class="card">Number of tution delivered</div>
                        <!-- <div class="card"></div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
<div class="team-container">
    <h1>Meet the Team</h1>
    <div class="team-grid">
        <!-- Team Member 1 -->
        <div class="team-card">
            <img src="./media/payel.jpg" alt="Payel Chowdhury Chitra">
            <a href="https://www.facebook.com/payelchowdhury.chitra" target="_blank">
            <div class="info">
                <h2>Payel Chowdhury Chitra</h2>
                <p>Team Member</p>
                <p>Department of CSE</p>
                <p>Port City International University</p>
            </div>
            </a>
        </div>
        <!-- Team Member 2 -->
        <div class="team-card">
            <img src="./media/shihab.jpg" alt="Md Shariar Hossain">
            <a href="https://www.facebook.com/shahriarsworld" target="_blank">
            <div class="info">
                <h2>Md Shariar Hossain</h2>
                <p>Team Member</p>
                <p>Department of CSE</p>
                <p>Port City International University</p>
            </div>
            </a>
        </div>


        <!-- Team Member 3 -->
        <div class="team-card">
            <!-- <img src="./media/Badhan.jpg" alt="Badhan Roy Amit"> -->
            <img src="./media/BROY.jpg" alt="Badhan Roy Amit">
            <!-- <img src="./media/BROYcpy.jpg" alt="Badhan Roy Amit"> -->
            <a href="https://www.facebook.com/BadhanAmitRoy.25/" target="_blank">
            <div class="info">
                <h2>Badhan Roy Amit</h2>
                <p>Project Leader</p>
                <p>Department of CSE</p>
                <p>Port City International University</p>
            </div>
            </a>
        </div>
    </div>
</div>

<!-- Review Section -->
<section class="review-section">
    <form class="review-container" action="" method="post">
        <textarea name="Review" placeholder="Share your experience with us..." required></textarea>
        <input type="text" id="UserName" name="UserName" placeholder="Your Name" required>
        <input type="email" id="UserEmail" name="UserEmail" placeholder="Your Email" required>
        <button type= "submit" class="review" id= "review"name="review">Post Review</button>
    </form>
</section>
<?php 
// Taking the reviews 
if (isset($_POST['review'])) {
    $UserName = mysqli_real_escape_string($connection, $_POST['UserName']);
    $UserEmail = mysqli_real_escape_string($connection, $_POST['UserEmail']);
    $Review = mysqli_real_escape_string($connection, $_POST['Review']);

    $Squery = "INSERT INTO reviews (UserName, UserEmail, Review) 
              VALUES ('$UserName', '$UserEmail', '$Review')";

    if (mysqli_query($connection, $Squery)) {
        echo "<script type='text/javascript'>
                alert('Thanks for your review..');
                window.location.href = './tutorlist.php';
              </script>";
        exit();
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>
</body>

</html>