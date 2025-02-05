<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(120deg, #3b82f6, #9333ea);
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .table-container {
            margin-top: 20px;
            margin-bottom: 20px;
            width: 90%;
            max-width: 1200px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        thead {
            background-color: #1d4ed8;
            color: white;
            text-align: center;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            text-transform: uppercase;
            font-size: 14px;
        }
        tbody tr:nth-child(even) {
            background-color: #f3f4f6;
        }
        tbody tr:hover {
            background-color: #e5e7eb;
        }
        .actions a {
            margin: 0 5px;
            font-size: 18px;
            color: #1d4ed8;
            text-decoration: none;
        }
        .actions a:hover {
            color: #9333ea;
        }
        .status button {
            padding: 8px 12px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
        }
        .status .approve {
            background-color: #22c55e;
            color: white;
        }
        .status .approve:hover {
            background-color: #16a34a;
        }
        .status .decline {
            background-color: #ef4444;
            color: white;
        }
        .status .decline:hover {
            background-color: #dc2626;
        }
    </style>
</head>
<body>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Certificates</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="data-rows">
                <!-- Rows will be dynamically populated using PHP and JS -->
            </tbody>
        </table>
    </div>

    <?php
    $conn = new mysqli("localhost", "root", "", "TeachSphere");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT TeacherName, TeacherEmail, TeacherPhone, Certificates FROM tutorinfo";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<script>const data = [";
        while ($row = $result->fetch_assoc()) {
            echo "{ name: '" . $row['TeacherName'] . "', email: '" . $row['TeacherEmail'] . "', phone: '" . $row['TeacherPhone'] . "', certificate: '" . $row['Certificates'] . "' },";
        }
        echo "];</script>";
    } else {
        echo "<script>const data = [];</script>";
    }

    $conn->close();
    ?>
<!-- <a href="adminDashboard.php">
    <button style="
    background-color: aqua; 
    color: black; 
    position: fixed; 
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
</button> -->
    </a>
    <script>
        const tbody = document.getElementById('data-rows');

        data.forEach((row) => {
            const tr = document.createElement('tr');

            tr.innerHTML = `
                <td>${row.name}</td>
                <td>${row.email}</td>
                <td>${row.phone}</td>
                <td class="actions">
                    <a href="../uploads/certificates/${row.certificate}" target="_blank" title="View Certificate">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="../uploads/certificates/${row.certificate}" download title="Download Certificate">
                        <i class="fas fa-download"></i>
                    </a>
                </td>
                <td class="status">
                    <button class="approve">Approve</button>
                    <button class="decline">Decline</button>
                </td>
            `;

            tbody.appendChild(tr);
        });
    </script>
</body>
</html>
