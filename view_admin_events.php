<?php
    echo "<h1>Welcome to the Admin Home Page</h1>";
    include 'mysql_connect.php';

    $sql = "SELECT * FROM events";
    $result = mysqli_query($con, $sql);


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

    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Date</th>
            <th scope="col">Location</th>
            <th scope="col">Options</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <th scope='row'>" . $row['id'] . "</th>
                            <td>" . $row['title'] . "</td>
                            <td>" . $row['description'] . "</td>
                            <td>" . $row['date'] . "</td>
                            <td>" . $row['location'] . "</td>
                            <td>
                                <a href='Edit_events.php?id=" . $row['id'] . "' class='btn btn-primary'>Edit</a>
                                <a href='Delete-events.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a>
                            </td>
                          </tr>";
                    }
                }  
            ?> 
        </tbody>
    </table>
    
   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>