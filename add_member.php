<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin.php");
    exit();
}

include 'db_connect.php';

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);

    // File Upload Handling
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $allowed_types = ['jpg', 'jpeg', 'png'];
        $file_ext = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));

        if (!in_array($file_ext, $allowed_types)) {
            $msg = "Only JPG, JPEG, and PNG files are allowed!";
        } else {
            $photo_name = uniqid() . '.' . $file_ext; // Unique File Name
            $photo_folder = "uploads/" . $photo_name;

            if (move_uploaded_file($_FILES['photo']['tmp_name'], $photo_folder)) {
                
                // Generate QR Code
                $qr_data = "Name: $name\nEmail: $email\nPhone: $phone";
                $qr_code = "https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=" . urlencode($qr_data);

                // Insert Data Using Prepared Statement
                $stmt = $conn->prepare("INSERT INTO members (name, email, phone, photo, qr_code) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("sssss", $name, $email, $phone, $photo_folder, $qr_code);

                if ($stmt->execute()) {
                    $msg = "✅ Member Added Successfully!";
                } else {
                    $msg = "❌ Error: " . $stmt->error;
                }
                $stmt->close();
            } else {
                $msg = "❌ Error Uploading File!";
            }
        }
    } else {
        $msg = "❌ Please Select a Photo!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Member</title>
    <style>
        /* Page Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background: url('https://i.ibb.co/SDYch5S4/background.jpg') no-repeat center center/cover;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            background: rgba(255, 255, 255, 0.2);
            padding: 50px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3);
            width: 400px;
        }

        h2 {
            color: rgb(0, 75, 0);
            margin-bottom: 20px;
        }

        .input-box {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(45deg,rgb(2, 80, 6),rgb(0, 255, 64));
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn:hover {
            background: linear-gradient(45deg,rgb(0, 107, 23),rgb(0, 255, 128));
        }

        .msg {
            font-weight: bold;
            margin-top: 10px;
            color: darkgreen;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Add New Member</h2>
    
    <?php if (!empty($msg)) { echo "<p class='msg'>$msg</p>"; } ?>
    
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="name" class="input-box" placeholder="Full Name" required>
        <input type="email" name="email" class="input-box" placeholder="Email" required>
        <input type="text" name="phone" class="input-box" placeholder="Phone Number" required>
        <input type="file" name="photo" class="input-box" required>
        <button type="submit" class="btn">Add Member</button>
    </form>
</div>

</body>
</html>
