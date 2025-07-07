<?php
include 'session.php';
include 'db.php';

$name = $_POST['student_name'];
$subject = $_POST['subject'];
$marks = $_POST['marks'];

$sql = "INSERT INTO marks (student_name, subject, marks) VALUES ('$name', '$subject', $marks)";
if ($conn->query($sql)) {
    header("Location: index.php");
} else {
    echo "❌ Error: " . $conn->error;
}
?>
