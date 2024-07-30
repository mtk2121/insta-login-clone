<?php
header('Content-Type: application/json');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "instagram_clone";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit();
}

$response = ['success' => false, 'message' => 'Unknown error'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // در اینجا از هش کردن رمز عبور استفاده نمی‌شود
    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $password); // ذخیره مستقیم رمز عبور به صورت متنی ساده
    
    if ($stmt->execute()) {
        $response = ['success' => true, 'message' => 'Data saved successfully'];
    } else {
        $response = ['success' => false, 'message' => 'Failed to save data'];
    }
    
    $stmt->close();
}

$conn->close();
echo json_encode($response);