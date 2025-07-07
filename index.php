<?php include 'session.php'; include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Student Marks</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2 class="mb-4 text-center">📊 Student Marks Report</h2>
  <div class="d-flex justify-content-between mb-3">
  <a href="add.php" class="btn btn-primary">➕ Add Student</a>
    <a href="export.php" class="btn btn-success">⬇️ Export to Excel</a>
    <a href="logout.php" class="btn btn-danger">Logout</a>
  </div>
  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr><th>ID</th><th>Name</th><th>Subject</th><th>Marks</th><th>Edit</th></tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT * FROM marks";
      $res = $conn->query($sql);
      while ($r = $res->fetch_assoc()) {
        echo "<tr>
                <td>{$r['id']}</td>
                <td>{$r['student_name']}</td>
                <td>{$r['subject']}</td>
                <td>{$r['marks']}</td>
                <td><a class='btn btn-sm btn-warning' href='edit.php?id={$r['id']}'>Edit</a></td>
              </tr>";
      }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>
