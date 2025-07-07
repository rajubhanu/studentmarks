<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include 'db.php';

// Delete record
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM students WHERE id=$id");
    header("Location: index.php");
}

// Insert student
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $t = $_POST['telugu'];
    $e = $_POST['english'];
    $m = $_POST['maths'];
    $total = $t + $e + $m;
    $avg = $total / 3;
    $status = ($avg >= 35) ? 'Pass' : 'Fail';

    $conn->query("INSERT INTO students (name, telugu, english, maths, total, average, status)
                 VALUES ('$name', $t, $e, $m, $total, $avg, '$status')");
}
?>
<!DOCTYPE html>
<html>
<head><title>Dashboard</title></head>
<body>
<h2>Student Marks Entry</h2>
<form method="post">
    Name: <input type="text" name="name" required><br><br>
    Telugu: <input type="number" name="telugu" required><br><br>
    English: <input type="number" name="english" required><br><br>
    Maths: <input type="number" name="maths" required><br><br>
    <input type="submit" name="submit" value="Save">
</form>

<h3><a href='logout.php'>Logout</a></h3>

<hr>
<form method="get">
    Search Name: <input type="text" name="search">
    <input type="submit" value="Search">
</form>

<h2>Student Records</h2>
<table border="1">
<tr><th>ID</th><th>Name</th><th>Telugu</th><th>English</th><th>Maths</th><th>Total</th><th>Average</th><th>Status</th><th>Action</th></tr>
<?php
$search = isset($_GET['search']) ? $_GET['search'] : '';
$result = $conn->query("SELECT * FROM students WHERE name LIKE '%$search%' ORDER BY id DESC");
while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['telugu']}</td>
            <td>{$row['english']}</td>
            <td>{$row['maths']}</td>
            <td>{$row['total']}</td>
            <td>{$row['average']}</td>
            <td>{$row['status']}</td>
            <td><a href='edit.php?id={$row['id']}'>Edit</a> | <a href='?delete={$row['id']}'>Delete</a></td>
          </tr>";
}
?>
</table>
</body>
</html>