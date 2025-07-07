<?php
include 'session.php';
include 'db.php';

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=student_marks.xls");
echo "ID\tName\tSubject\tMarks\n";

$res = $conn->query("SELECT * FROM marks");
while ($r = $res->fetch_assoc()) {
    echo "{$r['id']}\t{$r['student_name']}\t{$r['subject']}\t{$r['marks']}\n";
}
?>
