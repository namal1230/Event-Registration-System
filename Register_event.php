<?php
    echo "<h1>Welcome to the Event Registration Page</h1>";
    include 'mysql_connect.php';

    $id= $_GET['id'];
    $employee_id= $_GET['employee_id'];

    if (isset($_POST['save'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];

        $sql = "INSERT INTO registrations (event_id, name, email, contact, employee_id) VALUES ('$id', '$name', '$email', '$contact', '$employee_id')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo "<script>alert('Event saved successfully!');</script>";
            header("Location: Employee_home.php?id=$employee_id");
        } else {
            echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
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

    <form class="row g-3" method="post">
        <div class="col-md-6">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="col-12">
            <label for="contact" class="form-label">Contact</label>
            <input type="text" class="form-control" id="contact" required name="contact">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary col-12" name="save">Save</button>
        </div>
    </form>
   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>