<?php
session_start();
include('db.php');
$results = $conn->query("SELECT username, score FROM scores ORDER BY score DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .leaderboard-container {
            background-color: yellow;
            padding: 20px;
            border-radius: 20px;
            text-align: center;
            width: 700px;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 500px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        .leaderboard-entry {
            background-color: white;
            border-radius: 20px;
            padding: 10px;
            margin: 6px 0;
            display: flex;
            justify-content: space-between;
            width: 90%;
            font-size: 18px;
        }
        .home-button {
            margin-top: 20px;
            padding: 15px 30px;
            font-size: 18px;
            border: none;
            border-radius: 30px;
            color: yellow;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
            background-color: black;
            text-decoration: none;
        }
        .home-button:hover {
            background-color: #222;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="leaderboard-container">
        <h1>Leaderboard</h1>
        <?php while ($row = $results->fetch_assoc()): ?>
            <div class="leaderboard-entry">
                <span><?= $row['username'] ?></span>
                <span><?= $row['score'] ?></span>
            </div>
        <?php endwhile; ?>
        <a href="home.php" class="home-button">Home</a>
    </div>
</body>
</html>
