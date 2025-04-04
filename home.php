<?php session_start(); if (!isset($_SESSION['username'])) header('Location: index.php'); ?> 
<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      background-image: url('assets/background.jpeg');
      background-size: cover;
      background-position: center;
      font-family: Arial, sans-serif;
      text-align: center;
      height: 100vh;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .box {
      background-color: yellow;
      padding: 50px;
      border-radius: 20px;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
      width: 400px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    h1 {
      font-size: 36px;
      color: black;
      margin-bottom: 20px;
    }

    button {
      background-color: black;
      color: yellow;
      border: 2px solid yellow;
      border-radius: 10px;
      padding: 15px 30px;
      font-size: 20px;
      cursor: pointer;
      transition: background-color 0.3s, transform 0.2s;
      margin: 10px 0;
      width: 100%;
    }

    button:hover {
      background-color: #222;
      transform: scale(1.05);
    }

    a {
      text-decoration: none;
      width: 100%;
    }
  </style>
</head>
<body>
  <div class="box">
    <h1>Welcome <?= $_SESSION['username'] ?>!</h1>
    <a href="game.php"><button>Start Game</button></a>
    <a href="leaderboard.php"><button>Leaderboard</button></a>
    <a href="index.php"><button style="background-color: red; border-color: darkred; color: white;">Log Out</button></a>
  </div>
</body>
</html>
