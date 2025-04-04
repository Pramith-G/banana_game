<?php
session_start();
include('db.php');
if (isset($_POST['action'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($_POST['action'] === 'register') {
        $conn->query("INSERT INTO users (username, password) VALUES ('$username', '$password')");
        header('Location: index.php?message=registered_successfully');
        exit();
    } else {
        $result = $conn->query("SELECT * FROM users WHERE username='$username' AND password='$password'");
        if ($result->num_rows > 0) {
            $_SESSION['username'] = $username;
            header('Location: home.php');
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Banana-Themed Login Page</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background: url("assets/bg.jpg") no-repeat center center fixed;
      background-size: cover;
      font-family: 'Comic Sans MS', cursive, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      height: 100vh;
      position: relative;
    }

    h1 {
      font-size: 60px;
      color:rgb(0, 0, 0);
      margin-bottom: 20px;
      text-shadow: 8px 8px 16px #333;
      
      
    }

    form {
      background-color: #ffffff;
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 0 20px rgb(228, 228, 222);
      display: flex;
      flex-direction: column;
      gap: 15px;
      min-width: 300px;
      text-align: center;
    }

    input {
      padding: 10px;
      border: 2px solid #ffd700;
      border-radius: 10px;
      outline: none;
      font-size: 16px;
    }

    button {
      padding: 10px;
      background-color: #fdd835;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      font-weight: bold;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #fbc02d;
    }

    ::placeholder {
      color: #a77f00;
    }

    .message-box {
      position: fixed;
      top: 10px;
      left: 50%;
      transform: translateX(-50%);
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border-radius: 5px;
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
      font-size: 16px;
      z-index: 1000;
    }
  </style>
</head>
<body>

  <!-- Heading -->
  <h1>Banana Game</h1>

  <!-- Message Box (example static) -->
  <div class="message-box" id="success-message" style="display: none;">You registered successfully!</div>

  <!-- Login/Register Form -->
  <form method="post">
    <input name="username" placeholder="Username" required />
    <input name="password" type="password" placeholder="Password" required />
    <button type="submit" name="action" value="login">Login</button>
    <button type="submit" name="action" value="register">Register</button>
  </form>

  <!-- JS to close the message box -->
  <script>
    // Simulate showing the success message
    // Replace with backend logic in production
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get("registered") === "true") {
      const messageBox = document.getElementById("success-message");
      messageBox.style.display = "block";
    }

    document.addEventListener("DOMContentLoaded", function () {
      let messageBox = document.getElementById("success-message");

      if (messageBox && messageBox.style.display === "block") {
        document.addEventListener("click", function () {
          messageBox.style.display = "none";
        });

        let inputFields = document.querySelectorAll("input");
        inputFields.forEach((input) => {
          input.addEventListener("focus", function () {
            messageBox.style.display = "none";
          });
        });
      }
    });
  </script>
</body>
</html>
