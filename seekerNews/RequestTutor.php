<?php 
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "teachsphere");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validate tutor ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid tutor ID.");
}

$tutorID = (int)$_GET['id']; // Sanitize input

// Fetch tutor data
$sql = "SELECT * FROM tutorinfo WHERE id = $tutorID";
$result = $conn->query($sql);

if (!$result || $result->num_rows === 0) {
    die("No tutor found with this ID.");
}

$tutor = $result->fetch_assoc();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and process form input
    $studentQuantity = $conn->real_escape_string($_POST['Student_Quantity']);
    $studentClass = $conn->real_escape_string($_POST['Student_Class']);
    $tuitionDays = $conn->real_escape_string($_POST['Tuition_Days']);
    $tuitionTime = $conn->real_escape_string($_POST['Tuition_Time']);
    $location = $conn->real_escape_string($_POST['Location']);
    $salary = $conn->real_escape_string($_POST['Salary']);

    // Insert request into the database
    $insertSQL = "INSERT INTO request_tutor (tutorID, seekerID, student_quantity, student_class, tuition_days, tuition_time, location, salary)
                  VALUES ($tutorID, {$_SESSION['Sid']}, '$studentQuantity', '$studentClass', '$tuitionDays', '$tuitionTime', '$location', '$salary')";

    if ($conn->query($insertSQL) === TRUE) {
        echo "<script>alert('Request sent successfully!'); window.location.href='SeekerFeed.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Request Tutor</title>
  <link rel="stylesheet" href="RequestTutor.css">
</head>
<style>
  /* General Styling */
  body {
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #4facfe, #00f2fe);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    }

    .form-container {
    background-color: #ffffff;
    width: 360px;
    padding: 20px 30px;
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    text-align: center;
    }

    .form-container h1 {
    color: #333;
    margin-bottom: 20px;
    font-size: 1.5em;
    }

    form input,
    form button {
    width: 100%; /* Ensure consistent width */
    box-sizing: border-box; /* Include padding and border in width */
    }

    form input {
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 14px;
    background: #f9f9f9;
    transition: 0.3s ease;
    }

    form input:focus {
    border-color: #4facfe;
    background: #fff;
    outline: none;
    }

    form button {
    padding: 12px;
    margin-top: 10px;
    font-size: 16px;
    font-weight: bold;
    color: #fff;
    background: linear-gradient(135deg, #4facfe, #00f2fe);
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s ease;
    }

    form button:hover {
    background: linear-gradient(135deg, #00f2fe, #4facfe);
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    }
</style>
<body>
  <div class="form-container">
    <h1>Request : <?php echo htmlspecialchars($tutor["TeacherName"]); ?></h1>
    <form action="" method="post">
      <div class="form-group">
        <!-- <label for="Student_Quantity">Student Quantity</label> -->
        <input type="number" id="Student_Quantity" name="Student_Quantity" placeholder="Enter student quantity" required>
      </div>
      <div class="form-group">
        <!-- <label for="Student_Class">Student Class</label> -->
        <input type="text" id="Student_Class" name="Student_Class" placeholder="Enter student class" required>
      </div>
      <div class="form-group">
        <!-- <label for="Tuition_Days">Tuition Days</label> -->
        <input type="text" id="Tuition_Days" name="Tuition_Days" placeholder="Enter tuition days" required>
      </div>
      <div class="form-group">
        <!-- <label for="Tuition_Time">Tuition Time</label> -->
        <input type="text" id="Tuition_Time" name="Tuition_Time" placeholder="Enter tuition time" required>
      </div>
      <div class="form-group">
        <!-- <label for="Location">Location</label> -->
        <input type="text" id="Location" name="Location" placeholder="Enter location" required>
      </div>
      <div class="form-group">
        <!-- <label for="Salary">Salary (in Taka)</label> -->
        <input type="number" id="Salary" name="Salary" placeholder="Enter salary amount" required>
      </div>
      <button type="submit" class="btn-submit">Send Request</button>
    </form>
    
  </div>
  <a href="SeekerFeed.php">
    <button style="
    background-color: blue; 
    color: white; 
    position: fixed; 
    font-weight: bold;
    z-index: 10; 
    bottom: 20px; 
    left: 20px; 
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
