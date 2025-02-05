<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Reviews</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background: linear-gradient(135deg, #f0f4f8, #d9e2ec);
        color: #333;
        min-height: 100vh;
    }

    header {
        background-color: rgba(255, 255, 255, 0.8);
        padding: 15px 0;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(10px);
        position: fixed;
        width: 100%;
        z-index: 1;
    }

    header .logo img {
        max-width: 150px;
    }

    .midsection {
        text-align: center;
        padding: 100px 20px 50px;
    }

    .midsection h1 {
        font-size: 2.5rem;
        margin-bottom: 30px;
        color:rgb(30, 72, 140);
        text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.1);
    }

    .review-content {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
    }

    /* Card Styling */
    .card {
        background: #ffffff;
        color: #1e293b;
        border-radius: 12px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        width: calc(30% - 20px);
        padding: 20px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        text-align: left;
    }

    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .card h5 .title {
        font-size: 1.5rem;
        margin-bottom: 10px;
        color: #3b82f6;
    }

    .card h5 {
        font-size: 0.8 em;
        margin-bottom: 10px;
        color: #64748b;
    }

    .card p {
        font-size: 0.9rem;
        line-height: 1.6;
        color: #475569;
        text-align: justify;
    }

    /* Responsive Styling */
    @media screen and (max-width: 768px) {
        .review-content {
            flex-direction: column;
            align-items: center;
        }

        .card {
            width: 90%;
        }

        .midsection h1 {
            font-size: 2rem;
        }
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
            </div>
        </div>
    </header>
    <section class="midsection">
        <h1>People's Thoughts about us</h1>
        <div class="review-content">
        <?php
        // Database connection
            $conn = new mysqli("localhost", "root", "", "teachsphere");

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            // Query to fetch tutor details
            $sql = "SELECT UserName, UserEmail, Review, Dates, Timespan FROM reviews";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <div class='card'>
                    <h5>
                        <span class='title'>". htmlspecialchars($row['UserName']) ."</span> <br>"
                        . htmlspecialchars($row['UserEmail']) . "<br>". htmlspecialchars($row['Dates']) . " || " . htmlspecialchars($row['Timespan']) .
                    "</h5><p>" . htmlspecialchars($row['Review']) . "</p>
                    </div>";
                }
            } else {
                echo "<p>No Review found.</p>";
            }

            $conn->close();
        ?>
        </div>
    </section>
</body>
</html>