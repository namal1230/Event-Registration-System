<?php
    include 'mysql_connect.php';

    $id = $_GET['id'];
    $query = "SELECT * FROM events WHERE id='$id'";
    $result2 = mysqli_query($con, $query);

    if($result2){
        $row = mysqli_fetch_assoc($result2);
        $title = $row['title'];
        $description = $row['description'];
        $date = $row['date'];
        $location = $row['location'];
    }

    if (isset($_POST['update'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $date = $_POST['date'];
        $location = $_POST['location'];

        $sql = "UPDATE events SET title='$title', description = '$description', date = '$date', location='$location' WHERE id='$id'";
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo "<script>alert('Event update successfully!');</script>";
            header("Location: view_admin_events.php");
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
     <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="Admin_home.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="Save_event.php">Save Event</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="view_admin_events.php">Events</a>
        </li>
    </ul>

    <form class="row g-3" method="post">
        <div class="col-md-6">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $title ?>" required>
        </div>
        <div class="col-md-6">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="<?php echo $description ?>" required>
        </div>
        <div class="col-12">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" required name="date" value="<?php echo $date ?>">
        </div>
        <div class="col-12">
            <label for="location" class="form-label">Location</label>
            <input type="address" class="form-control" id="location" required name="location" value="<?php echo $location ?>">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary col-12" name="update">Update</button>
        </div>
    </form>
   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>