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
        background: linear-gradient(135deg, #e3f2fd, #ffffff);
        color: #333;
        min-height: 100vh;
    }

    header {
        background-color: rgba(255, 255, 255, 0.9);
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
        color: #1e88e5;
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
        position: relative;
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
        color: #1e88e5;
    }

    .card h5 {
        font-size: 0.8em;
        margin-bottom: 10px;
        color: #64748b;
    }

    .card p {
        font-size: 0.9rem;
        line-height: 1.6;
        color: #475569;
        text-align: justify;
    }

    /* Delete Icon Styling */
    .card .delete-icon {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #e57373;
        color: #ffffff;
        border: none;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .card .delete-icon:hover {
        background-color: #d32f2f;
    }

    .card .delete-icon svg {
        width: 20px;
        height: 20px;
        fill: #ffffff;
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
    <section class="midsection">
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
                    echo " <div class='card'>
                            <button class='delete-icon' onclick='deleteCard(this)'>
                                <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'>
                                    <path d='M9 3V4H4V6H5V19C5 20.11 5.89 21 7 21H17C18.11 21 19 20.11 19 19V6H20V4H15V3H9M7 6H17V19H7V6Z'></path>
                                </svg>
                            </button>
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
    <script>
        function deleteCard(button) {
            const card = button.closest('.card');
            card.remove();
        }
    </script>

</body>
</html>