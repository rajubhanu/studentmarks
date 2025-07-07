<?php
session_start();
include 'db.php';
$id = $_GET['id'];
$student = $conn->query("SELECT * FROM students WHERE id=$id")->fetch_assoc();

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $t = $_POST['telugu'];
    $e = $_POST['english'];
    $m = $_POST['maths'];
    $total = $t + $e + $m;
    $avg = $total / 3;
    $status = ($avg >= 35) ? 'Pass' : 'Fail';

    $conn->query("UPDATE students SET name='$name', telugu=$t, english=$e, maths=$m, total=$total, average=$avg, status='$status' WHERE id=$id");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Edit Student</title></head>
<body>
<h2>Edit Student</h2>
<form method="post">
    Name: <input type="text" name="name" value="<?= $student['name'] ?>" required><br><br>
    Telugu: <input type="number" name="telugu" value="<?= $student['telugu'] ?>" required><br><br>
    English: <input type="number" name="english" value="<?= $student['english'] ?>" required><br><br>
    Maths: <input type="number" name="maths" value="<?= $student['maths'] ?>" required><br><br>
    <input type="submit" name="update" value="Update">
</form>
</body>
</html>