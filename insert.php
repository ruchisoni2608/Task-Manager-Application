<?php

include_once('connection.php');

    if(isset($_POST['submit'])){
   
    $description=$_POST['description'];
    $date=$_POST['date'];

    $sql = "INSERT INTO taskmanager (description, date)
             VALUES ('$description','$date')";
   // dd($sql);
    if (mysqli_query($conn, $sql)) {
    echo "<script type='text/javascript'>alert('New Task Successfully')</script>";
 header('location:index.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    }

    mysqli_close($conn);
    ?>
