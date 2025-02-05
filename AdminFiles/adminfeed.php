<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | TeachSphere</title>
    <style>
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
    </style>
</head>
<body>
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
</body>
</html>
