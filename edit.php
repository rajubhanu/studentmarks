<?php include 'session.php'; include 'db.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM marks WHERE id=$id");
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Marks</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h3 class="mb-4">✏️ Edit Student Marks</h3>
  <form action="update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <div class="mb-3">
      <label>Name</label>
      <input type="text" name="student_name" class="form-control" value="<?php echo $row['student_name']; ?>" required>
    </div>
    <div class="mb-3">
      <label>Subject</label>
      <input type="text" name="subject" class="form-control" value="<?php echo $row['subject']; ?>" required>
    </div>
    <div class="mb-3">
      <label>Marks</label>
      <input type="number" name="marks" class="form-control" value="<?php echo $row['marks']; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="index.php" class="btn btn-secondary">Cancel</a>
  </form>
</div>
</body>
</html>
