<?php
    include 'mysql_connect.php';

    if (isset($_POST['submit'])) {


        $username = $_POST['username'];
        $password = $_POST['password'];
        $job = $_POST['job'];
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' AND job='$job'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            if($_POST['job']== 'admin') {
                header("Location: Admin_home.php");
            } else if($_POST['job']== 'employee') {
                header("Location: Employee_home.php");
            }
        }
    }     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="***">
        </div>
        
        <select name="job" class="form-select" aria-label="Default select example">
            <option selected>Select UserRole</option>
            <option value="admin">Admin</option>
            <option value="employee">Employee</option>
        </select>

        <button type="submit" class="btn btn-primary" name="submit">SignIn</button>
        <button type="button" class="btn btn-secondary" onclick="window.location.href='register.php'">Register</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>