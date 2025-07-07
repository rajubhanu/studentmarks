<?php
session_start();
if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    if ($user === 'admin' && $pass === 'admin123') {
        $_SESSION['admin'] = true;
        header("Location: index.php");
    } else {
        $error = "Invalid credentials!";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
    <h2>Admin Login</h2>
    <form method="post">
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <button type="submit" name="login">Login</button>
    </form>
    <?php if (isset(\$error)) echo "<p style='color:red;'>\$error</p>"; ?>
</body>
</html>