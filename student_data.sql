CREATE DATABASE IF NOT EXISTS studentmarks;
USE studentmarks;

CREATE TABLE marks (
  id INT AUTO_INCREMENT PRIMARY KEY,
  student_name VARCHAR(100),
  subject VARCHAR(100),
  marks INT
);

INSERT INTO marks (student_name, subject, marks) VALUES
('Ravi','Maths',78),
('Sita','Science',85),
('Arjun','English',92),
('Priya','Social',88);