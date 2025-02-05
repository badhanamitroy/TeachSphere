<?php
$connection = new mysqli("localhost", "root", "", "teachsphere");

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TeachSphere</title>
    <link rel="stylesheet" href="./css/indexpage.css?v=<?php echo time()?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                        <li><a href="VisitorviewTutions.php">Tuitions</a></li>
                        <li><a href="tutorlist.php">Tutors</a></li>
                        <li><a href="aboutus.php">About Us</a></li>
                            <a href="login.php"><button class="login-btn">Login</button></a>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <section class="top-section">
        <div class="top-section-left">
            <img src="./media/BG-Image.png" alt="">
        </div>
        <div class="top-section-right">
            <div class="tutorcount">
                <h1>Our Provided Teachers</h1>
                <div class="dhaka">
                    Dhaka 
                    <?php 
                    // Query to fetch tutor details
                    $tutorCountQuery = "SELECT COUNT(Division) AS Dhaka_tutors FROM tutorinfo Where Division = 'Dhaka';";
                    $tcResult = mysqli_query($connection, $tutorCountQuery);
                    // Check if the query succeeded
                    if ($tcResult) {
                        $row = mysqli_fetch_assoc($tcResult);
                        $totalTutors = $row['Dhaka_tutors'];
                        echo ": " . $totalTutors . " Tutors";
                    } else {
                        // Display an error message if the query fails
                        echo "<h2>Error retrieving tutor count</h2>";
                    }
                    ?> 
                </div>
                <div class="dhaka">Chattogram 
                <?php 
                    // Query to fetch tutor details
                    $tutorCountQuery = "SELECT COUNT(Division) AS ctg_tutors FROM tutorinfo Where Division = 'Chattogram';";
                    $tcResult = mysqli_query($connection, $tutorCountQuery);
                    // Check if the query succeeded
                    if ($tcResult) {
                        $row = mysqli_fetch_assoc($tcResult);
                        $totalTutors = $row['ctg_tutors'];
                        echo ": " . $totalTutors . " Tutors";
                    } else {
                        // Display an error message if the query fails
                        echo "<h2>Error retrieving tutor count</h2>";
                    }
                    ?>
                </div>
                <div class="dhaka">Sylhet 
                <?php 
                    // Query to fetch tutor details
                    $tutorCountQuery = "SELECT COUNT(Division) AS Sylhet_tutors FROM tutorinfo Where Division = 'Sylhet';";
                    $tcResult = mysqli_query($connection, $tutorCountQuery);
                    // Check if the query succeeded
                    if ($tcResult) {
                        $row = mysqli_fetch_assoc($tcResult);
                        $totalTutors = $row['Sylhet_tutors'];
                        echo ": " . $totalTutors . " Tutors";
                    } else {
                        // Display an error message if the query fails
                        echo "<h2>Error retrieving tutor count</h2>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <section class="midsection">
    <h1>Tution types we Offer</h1>
        <div class="Tutiontypes container">
            <center>
            <div class="tutioncard">
                <h3>Private Home tutor</h3>
                <img src="./media/Private-Tutor.png" alt="">
            </div>
            </center>
            <center>
            <div class="tutioncard">
                <h3>Private Online tutor</h3>
                <img src="./media/Online-Tutor.png" alt="">
            </div>
            </center>
            <center>
            <div class="tutioncard">
            <h3>Coaching tutor</h3>
                <img src="./media/Coaching-Tutor.png" alt="">
            </div>
            </center>
        </div>      
    </section>
    <section class="midsection">
        <h1>Our Popular Tutors</h1>
        <div class="Popular-Tutors container">
            <div class="tutors">
                <img src="./media/Tutor-1.png" alt="Jayef Bin Jahid">
                <h3>Jayef Bin Jahid</h3>
                <h4>MBBS 4th Year</h4>
                <h4>Ma o Shishu Medical Hospital</h4>
                <h4>Chattogram</h4>
                <h4>5 Years of Tutoring Experience</h4>
            </div>
            <div class="tutors">
                <img src="./media/Tutor-2.jpeg" alt="Palak">
                <h3>Palak</h3>
                <h4>MBBS 4th Year</h4>
                <h4>Ma o Shishu Medical Hospital</h4>
                <h4>Chattogram</h4>
                <h4>5 Years of Tutoring Experience</h4>
            </div>
            <div class="tutors">
                <img src="./media/Tutor-3.jpeg" alt="Vabya">
                <h3>Vabya</h3>
                <h4>MBBS 4th Year</h4>
                <h4>Ma o Shishu Medical Hospital</h4>
                <h4>Chattogram</h4>
                <h4>5 Years of Tutoring Experience</h4>
            </div>
            <div class="tutors">
                <img src="./media/Tutor-4.png" alt="Shihab">
                <h3>Shihab</h3>
                <h4>MBBS 4th Year</h4>
                <h4>Ma o Shishu Medical Hospital</h4>
                <h4>Chattogram</h4>
                <h4>5 Years of Tutoring Experience</h4>
            </div>
            <div class="tutors">
                <img src="./media/Tutor-5.jpg" alt="Payel">
                <h3>Payel</h3>
                <h4>MBBS 4th Year</h4>
                <h4>Ma o Shishu Medical Hospital</h4>
                <h4>Chattogram</h4>
                <h4>5 Years of Tutoring Experience</h4>
            </div>
            <div class="tutors">
                <img src="./media/Tutor-6.jpg" alt="Sachin">
                <h3>Sachin</h3>
                <h4>MBBS 4th Year</h4>
                <h4>Ma o Shishu Medical Hospital</h4>
                <h4>Chattogram</h4>
                <h4>5 Years of Tutoring Experience</h4>
            </div>
            <div class="tutors">
                <img src="./media/Tutor-7.jpg" alt="Sachin">
                <h3>Richmond</h3>
                <h4>EEE 3rd Year</h4>
                <h4>CUET</h4>
                <h4>Chattogram</h4>
                <h4>5 Years of Tutoring Experience</h4>
            </div>
            <div class="tutors">
                <img src="./media/Tutor-8.jpg">
                <h3>Jarin</h3>
                <h4>CSE 3rd Year</h4>
                <h4>PCIU</h4>
                <h4>Chattogram</h4>
                <h4>3 Years of Tutoring Experience</h4>
            </div>
            <div class="tutors">
            <?php
            // Database connection
            $conn = new mysqli("localhost", "root", "", "teachsphere");

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Query to fetch tutor details
            $sql = "SELECT TeacherName, TeacherPhone, TeacherEmail, TutorDP, institute, department, sessionyear, experience FROM tutorinfo WHERE id = '9'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <div class='card'>
                        <img src='./uploads/TutorDP/" . htmlspecialchars($row['TutorDP']) . "' alt='Profile Picture' class='profile-pic'>
                        <h3>" . htmlspecialchars($row['TeacherName']) . "</h3>
                        <h4>" . htmlspecialchars($row['department']) . "</h4>
                        <h4>" . htmlspecialchars($row['sessionyear']) . " year</h4>
                        <h4>" . htmlspecialchars($row['institute']) . "</h4>
                        <h4>" . htmlspecialchars($row['experience']) . "years of tution experience.</h4>
                    </div>";
                }
            } else {
                echo "<p>No tutors found.</p>";
            }

            $conn->close();
            ?>
            </div>
            <div class="tutors">
            <?php
            // Database connection
            $conn = new mysqli("localhost", "root", "", "teachsphere");

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Query to fetch tutor details
            $sql = "SELECT TeacherName, TeacherPhone, TeacherEmail, TutorDP, institute, department, sessionyear, experience FROM tutorinfo WHERE id = '13'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <div class='card'>
                        <img src='./uploads/TutorDP/" . htmlspecialchars($row['TutorDP']) . "' alt='Profile Picture' class='profile-pic'>
                        <h3>" . htmlspecialchars($row['TeacherName']) . "</h3>
                        <h4>" . htmlspecialchars($row['institute']) . "</h4>
                        <h4>" . htmlspecialchars($row['department']) . "</h4>
                        <h4>" . htmlspecialchars($row['sessionyear']) . "th year</h4>
                        <h4>" . htmlspecialchars($row['experience']) . "years of tution experience.</h4>
                    </div>";
                }
            } else {
                echo "<p>No tutors found.</p>";
            }

            $conn->close();
            ?>
            </div>
            <div class="tutors">
                <img src="./media/Tutor-9.jpg" alt="Sachin">
                <h3>Faria</h3>
                <h4>MBBS 4th Year</h4>
                <h4>Ma o Shishu Medical Hospital</h4>
                <h4>Chattogram</h4>
                <h4>5 Years of Tutoring Experience</h4>
            </div>
            
        </div>
    </section>

<section class="review-section midsection">
    <h1>Top Reviews</h1>

    <h2>Teachers' Reviews</h2>
    <div class="review-container">
        <div class="review-card">
            <div class="review-header">
                <img src="./media/Tutor-8.jpg" alt="Teacher A">
                <h3>Jarin</h3>
            </div>
            <p>TeachSphere-এর সাহায্যে শিক্ষার্থীদের সাথে আমার কাজ করার অভিজ্ঞতা খুবই ইতিবাচক। এটি একটি পেশাদার ও নির্ভরযোগ্য মাধ্যম।</p>
        </div>
        <div class="review-card">
            <div class="review-header">
                <img src="./media/Tutor-5.jpg" alt="Teacher B">
                <h3>Payel</h3>
            </div>
            <p>TeachSphere আমার টিউশন ক্যারিয়ারকে নতুন মাত্রায় নিয়ে গেছে। খুবই ব্যবহারবান্ধব এবং ফলপ্রসূ। Highly recommended!</p>
        </div>
        <div class="review-card">
            <div class="review-header">
                <img src="./media/Tutor-7.jpg" alt="Teacher B">
                <h3>Richmond</h3>
            </div>
            <p>আমি অনেকদিন ধরে TeachSphere-এর সাথে যুক্ত আছি, এবং প্রতিটি টিউশন অভিজ্ঞতাই ছিল দারুণ। সত্যিই প্রশংসনীয় একটি উদ্যোগ।</p>
        </div>
        <div class="review-card">
            <div class="review-header">
                <img src="./media/Tutor-2.jpeg" alt="Teacher B">
                <h3>Palak</h3>
            </div>
            <p>TeachSphere has been an amazing platform to connect with students who genuinely want to learn.</p>
        </div>
    </div>
    <h4>See more</h4>

    <h2>Guardians' Reviews</h2>
    <div class="review-container">
        <div class="review-card">
            <div class="review-header">
                <img src="./media/G1.jpg" alt="Guardian X">
                <h3>Guardian W</h3>
            </div>
            <p>TeachSphere-এর পরামর্শকৃত টিউটররা অত্যন্ত পেশাদার ও নির্ভরযোগ্য। আমি অত্যন্ত সন্তুষ্ট!</p>
        </div>
        <div class="review-card">
            <div class="review-header">
                <img src="./media/G2.jpeg" alt="Guardian X">
                <h3>Guardian X</h3>
            </div>
            <p>TeachSphere প্ল্যাটফর্মটি খুব সহজ ও সুবিধাজনক। এখান থেকে টিউটর পেতে সময় বাঁচে এবং টিউটররাও দারুণ!</p>
        </div>
        <div class="review-card">
            <div class="review-header">
                <img src="./media/G3.jpg" alt="Guardian X">
                <h3>Guardian Y</h3>
            </div>
            <p>"The tutors recommended by TeachSphere are highly professional and reliable. Highly satisfied!"</p>
        </div>
        <div class="review-card">
            <div class="review-header">
                <img src="./media/G4.jpeg" alt="Guardian Y">
                <h3>Guardian Z</h3>
            </div>
            <p>"I found a perfect match for my kid's learning needs. The process was smooth and transparent."</p>
        </div>
    </div>
    <a href="AllReviews.php"><h4>See more</h4></a>
</section>

<!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-left">
                <h2><span class="highlight">Teach</span>Sphere</h2>
                <p>
                    TeachSphere will offer a secure, user-friendly platform to connect guardians, students, and qualified tutors. By focusing on verified profiles, privacy, and efficient matching, it will empower guardians to find reliable tutoring options tailored to diverse learning needs without direct involvement in teaching.
                </p>
                <div class="social-icons">
                    <img src="./media/FB.png" alt="Facebook">
                    <img src="./media/WP.png" alt="WhatsApp">
                    <img src="./media/YT.png" alt="YouTube">
                </div>
            </div>
            <div class="footer-middle">
                <h3>Resources</h3>
                <ul>
                    <li>About us</li>
                    <li>Our Team</li>
                    <li>Products</li>
                    <li>Contact us</li>
                </ul>
            </div>
            <div class="footer-more">
                <h3>More</h3>
                <ul>
                    <li>Help</li>
                    <li>Terms</li>
                    <li>FAQ</li>
                </ul>
            </div>
            <div class="footer-right">
                <h3>Download Our Mobile App</h3>
                <img src="./media/QR.png" alt="QR Code" class="qrcode">
                <img src="./media/Playstore.png" alt="Google Play" class="googleplay">
            </div>
        </div>
        <div class="footer-bottom">
            <h4>Copyright © Team Trinomial 2024</h4>
        </div>
    </footer>


</body>
</html>