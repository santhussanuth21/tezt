<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin.php");
    exit();
}
$adminName = $_SESSION['admin']; // Admin Username Store

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* Google Font */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: url('https://i.ibb.co/SDYch5S4/background.jpg') no-repeat center center/cover;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            background: rgba(255, 255, 255, 0.2);
            padding: 60px; /* Box එක විශාල කරලා */
            border-radius: 15px;
            backdrop-filter: blur(12px);
            box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.3);
            animation: fadeIn 1.5s ease-in-out;
            width: 450px; /* Box width එක වැඩි කරන්න */
        }

        .logo {
            width: 120px;
            animation: bounce 3s infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }

        h1 {
            font-size: 30px;
            font-weight: 600;
            color: rgb(0, 75, 0);
            margin: 15px 0;
            animation: slideIn 1.5s ease-out;
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .admin-name {
            font-size: 24px;
            font-weight: 500;
            color: rgb(0, 107, 23);
            animation: fadeIn 2s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .btn {
            display: block;
            width: 80%; /* Button එක මධ්‍යයේ විශාල */
            padding: 14px 25px;
            margin: 15px auto; /* Button අතර space වැඩි */
            font-size: 18px;
            font-weight: bold;
            color: white;
            background: linear-gradient(45deg,rgb(2, 80, 6),rgb(0, 255, 64));
            border: none;
            border-radius: 30px;
            text-decoration: none;
            transition: 0.3s;
            box-shadow: 0px 5px 8px rgba(0, 0, 0, 0.2);
        }

        .btn:hover {
            background: linear-gradient(45deg,rgb(0, 107, 23),rgb(0, 255, 128));
            transform: scale(1.1);
        }

        .logout-btn {
            background: red;
            padding: 12px 22px;
            border-radius: 25px;
            color: white;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }

        .logout-btn:hover {
            background: darkred;
            transform: scale(1.1);
        }
    </style>
</head>
<body>

<div class="container">
    <img src="https://i.ibb.co/8nCTYFRv/logo.png" alt="QR Attendance Logo" class="logo">
    <h1>Welcome, <span class="admin-name"><?php echo $adminName; ?></span>!</h1>
    <a href="add_member.php" class="btn">Add New Member</a>
    <a href="attendance_records.php" class="btn">View Attendance</a>
    <a href="manage_admins.php" class="btn">Manage Admins</a>
    <br>
    <a href="logout.php" class="logout-btn">Logout</a>
</div>

</body>
</html>
