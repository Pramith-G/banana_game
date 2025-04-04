<?php session_start(); if (!isset($_SESSION['username'])) header('Location: index.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
        }
        #game {
            margin: 50px auto;
            width: 900px;
            padding: 20px;
            background: yellow;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        #score, #timer {
            display: inline-block;
            padding: 15px 30px;
            border-radius: 30px;
            font-size: 24px;
            font-weight: bold;
            background-color: white;
            margin: 10px;
        }
        #bananaBox {
            background-color: white;
            padding: 20px;
            display: inline-block;
            border-radius: 10px;
            margin: 20px 0;
        }

        #options {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .option-btn {
            font-size: 16px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: none;
            cursor: pointer;
            background-color: white;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .option-btn:hover {
            transform: scale(1.1);
        }

        
        #homeBtn {
            margin-top: 20px;
            padding: 15px 30px;
            font-size: 18px;
            border: none;
            border-radius: 30px;
            color: yellow;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
            background-color: black;
        }
        #homeBtn:hover {
            background-color: #222;
            transform: scale(1.05);
        }
        .timeout-box {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            text-align: center;
            border-radius: 10px;
        }
        
        .timeout-box img {
            width: 100px;
            height: auto;
        }
        .timeout-box h2 {
            font-weight: bold;
        }
        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: red;
            color: white;
            border: none;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div id="game">
        <div id="score">Score: 0</div>
        <div id="timer">Time: 600</div>
        <div id="bananaBox">
            <img id="bananaImage" src="" width="800" height="400">
        </div>
        <div id="options" style="margin-top: 20px; display: flex; justify-content: center; gap: 15px;" ></div>

        <a href="home.php"><button id="homeBtn">Home</button></a>
    </div>
    <div id="options"></div>

    <div id="timeoutBox" class="timeout-box">
        <button class="close-btn" onclick="closeTimeoutBox()">&times;</button>
        <img src="timeout.png" alt="Time Out">
        <h2>Try Again!</h2>
    </div>
</body>
</html>
