<?php
include 'session.php';
include 'db.php';

$id = $_POST['id'];
$name = $_POST['student_name'];
$subject = $_POST['subject'];
$marks = $_POST['marks'];

$conn->query("UPDATE marks SET student_name='$name', subject='$subject', marks=$marks WHERE id=$id");
header("Location: index.php");
?>
