<?php
include 'session.php';
include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Student Marks</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h3 class="mb-4">➕ Add Student Marks</h3>

  <form action="insert.php" method="post">
    <div class="mb-3">
      <label class="form-label">Student Name</label>
      <input type="text" name="student_name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Subject</label>
      <input type="text" name="subject" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Marks</label>
      <input type="number" name="marks" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Add</button>
    <a href="index.php" class="btn btn-secondary">Back</a>
  </form>
</div>
</body>
</html>
