<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Attendance System</title>
    <style>
        /* Google Font */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        /* Page Styles */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('https://i.ibb.co/SDYch5S4/background.jpg') no-repeat center center/cover;
        }

        .container {
            text-align: center;
            background: rgba(255, 255, 255, 0.2);
            padding: 40px;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3);
        }

        /* Animated Logo */
        .logo {
            width: 120px;
            animation: bounce 3s infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }

        h1 {
            color:rgb(0, 75, 0);
            font-size: 28px;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            margin: 10px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            background: linear-gradient(45deg,rgb(2, 80, 6),rgb(0, 255, 64));
            border: none;
            border-radius: 25px;
            text-decoration: none;
            transition: 0.3s;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        }

        .btn:hover {
            background: linear-gradient(45deg,rgb(0, 107, 23),rgb(0, 255, 128));
            transform: scale(1.1);
        }
    </style>
</head>
<body>

<div class="container">
    <img src="https://i.ibb.co/8nCTYFRv/logo.png" alt="QR Attendance Logo" class="logo">
    <h1>Welcome to QR Attendance System</h1>
    <a href="admin.php" class="btn">Admin Login</a>
    <a href="scan_qr.php" class="btn">Scan QR Code</a>
</div>

</body>
</html>