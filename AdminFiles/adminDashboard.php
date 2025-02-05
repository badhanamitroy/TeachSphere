<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        /* Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f3f6f9;
            color: #34495e;
        }

        header {
            background: #1e88e5;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .logo img {
            max-height: 50px;
        }

        .Admin-workspace {
            display: flex;
            flex: 1;
            flex-wrap: wrap;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 280px;
            background: #1565c0;
            padding: 20px;
            color: #fff;
            display: flex;
            flex-direction: column;
            position: relative;
            box-shadow: 2px 0 6px rgba(0, 0, 0, 0.1);
        }

        .sidebar nav ul {
            list-style: none;
            margin-top: 20px;
        }

        .sidebar nav ul li {
            margin-bottom: 15px;
        }

        .sidebar nav ul li a {
            text-decoration: none;
            color: #fff;
            font-weight: 500;
            display: block;
            padding: 12px 15px;
            border-radius: 6px;
            transition: background 0.3s, transform 0.2s;
        }

        .sidebar nav ul li a:hover,
        .sidebar nav ul li.active a {
            background: #42a5f5;
        }

        .logout {
            position: fixed;
            bottom: 20px;
            left: 20px;
            background: #e53935;
            color: #fff;
            border: none;
            padding: 12px 25px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 6px;
            transition: background 0.3s;
        }

        .logout:hover {
            background: #ef5350;
        }

        /* Main Content Styles */
        .content {
            flex: 1;
            padding: 25px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin: 20px;
            width: calc(100% - 280px); /* Ensure the content section fills the remaining width */
        }

        .content h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #1e88e5;
        }

        iframe {
            width: 100%;
            height: 600px;
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 100%;
        }

        .top-buttons {
            display: none;
        }

        .top-buttons.active {
            display: block;
        }

        .top-buttons .button {
            display: inline-block;
            background: #42a5f5;
            color: #fff;
            padding: 10px 20px;
            border-radius: 6px;
            margin-bottom: 10px;
            transition: background 0.3s, transform 0.2s;
            cursor: pointer;
        }

        .top-buttons .button:hover {
            background: #64b5f6;
            transform: translateY(-2px);
        }

        /* Admin feed */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            background-color: #f4f4f4;
        }
        .dashboard {
            width: 80%;
            margin: 30px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        .card {
            background: #007BFF;
            color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }
        .card span {
            display: block;
            font-size: 24px;
            margin-top: 10px;
            font-weight: bold;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                flex-direction: row;
                justify-content: space-between;
                padding: 10px;
                box-shadow: none;
            }

            .sidebar nav ul {
                display: flex;
                margin-top: 0;
            }

            .sidebar nav ul li {
                margin: 0 5px;
            }

            .logout {
                position: static;
                margin: 10px 0;
            }

            .Admin-workspace {
                flex-direction: column;
            }

            iframe {
                height: 500px;
            }

            .content {
                width: 100%; /* Make content take full width on smaller screens */
                margin: 0;
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <a href="adminDashboard.php">
                <img src="../media/teachsphere-dark-logo.png" alt="TeachSphere Logo">
            </a>
        </div>
    </header>

    <div class="Admin-workspace">
        <!-- Sidebar -->
        <aside class="sidebar">
            <nav>
                <ul>
                    <li id="tutors" onclick="showSection('tutor', 'tutors')"><a href="#">Tutors</a></li>
                    <li id="tutionPost" onclick="showSection('seeker', 'tutionPost')"><a href="#">Tuition Posts</a></li>
                    <li id="Rev" onclick="showSection('reviews', 'Rev')"><a href="#">Reviews</a></li>
                </ul>
            </nav>
            <a href="../logout.php"><button class="logout">Log Out</button></a>
        </aside>

        <!-- Main Content -->
        <main class="content">
        <div class="dashboard">
        <h2>Admin Dashboard</h2>
            <div class="stats">
                <div class="card">Total Tutors <span>100</span></div>
                <div class="card">Available Tutors <span>45</span></div>
                <div class="card">Pending Tutor Requests <span>10</span></div>
                <div class="card">Total Tuitions <span>250</span></div>
                <div class="card">Tuitions Delivered <span>200</span></div>
                <div class="card">New Job Listings <span>15</span></div>
            </div>
        </div>
            <div id="tutor" class="top-buttons">
                <div class="button" onclick="loadIframe('TutorApproval.php')">New Tutor Request</div>
                <div class="button" onclick="loadIframe('alltutors.php')">All Tutors</div>
                <iframe id="tutorFrame" style="width: 100%; min-height: 800px; border: none;" scrolling="no"></iframe>
            </div>

            <div id="seeker" class="top-buttons">
                <div class="button" onclick="loadIframe('ExistingTutions.php')">Existing Posts</div>
                <div class="button" onclick="loadIframe('tutionposts.php')">New Tuition Post</div>
                <iframe id="seekerFrame"></iframe>
            </div>

            <div id="reviews" class="top-buttons">
                <h2>Manage Reviews</h2>
                <iframe src="manageReviews.php"></iframe>
            </div>
        </main>
    </div>

    <script>
        const sections = ["tutor", "seeker", "reviews"];
        
        function showSection(sectionId, activeTabId) {
    // Hide the dashboard when a section is selected
    document.querySelector(".dashboard").style.display = "none";

    // Toggle content sections
    sections.forEach(section => {
        const sectionElement = document.getElementById(section);
        if (section === sectionId) {
            sectionElement.classList.add("active");
            sectionElement.style.display = "block"; // Ensure it's visible
        } else {
            sectionElement.classList.remove("active");
            sectionElement.style.display = "none"; // Hide other sections
        }
    });

    // Highlight active tab in the sidebar
    const tabs = ["tutors", "tutionPost", "Rev"];
    tabs.forEach(tab => {
        const tabElement = document.getElementById(tab);
        if (tab === activeTabId) {
            tabElement.classList.add("active");
        } else {
            tabElement.classList.remove("active");
        }
    });
}
        function loadIframe(url) {
            // Dynamically load URL in iframe
            const activeSection = sections.find(section => document.getElementById(section).classList.contains("active"));
            const iframe = document.getElementById(`${activeSection}Frame`);
            if (iframe) {
                iframe.src = url;
                iframe.style.display = "block";
            }
        }

        function adjustIframeHeight(iframe) {
            iframe.style.height = iframe.contentWindow.document.body.scrollHeight + "px";
        }

        // Example: Adjust the iframe height whenever it loads new content
        document.getElementById('tutorFrame').addEventListener('load', function () {
            adjustIframeHeight(this);
        });
    </script>
</body>
</html>
