<?php
session_start();
include('db.php');
$score = intval($_POST['score']);
$username = $_SESSION['username'];
$conn->query("UPDATE scores SET score = $score WHERE username = '$username'");
?>