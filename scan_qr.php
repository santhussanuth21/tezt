<?php
include 'db_connect.php';

if (isset($_GET['data'])) {
    $data = $_GET['data'];

    // Extract Data
    parse_str($data, $params);

    $name = $params['Name'];
    $email = $params['Email'];
    $phone = $params['Phone'];

    echo "<h2>Member Details</h2>";
    echo "<p><strong>Name:</strong> $name</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Phone:</strong> $phone</p>";
} else {
    echo "No data received!";
}
?>
