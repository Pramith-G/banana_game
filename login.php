<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'banana_game');

$username = $_POST['username'];
$password = $_POST['password'];

// Get the user record from the database
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Check if user exists
if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $hashed_password = $row['password'];

    // Verify the password
    if (password_verify($password, $hashed_password)) {
        $_SESSION['username'] = $username;
        header('Location: home.php');
        exit();
    } else {
        echo "Invalid login: incorrect password.";
    }
} else {
    echo "Invalid login: user not found.";
}
?>
