<?php
session_start();
include_once('connection.php');
 $todaytime = date("Y-m-d H:i:s");
 $todadt=date("Y-m-d");
// echo $todadt;
//header("Location:index.php");
    if(isset($_POST['submit'])){
//echo"444 ";
    $description=$_POST['description'];
    $date=$_POST['date'];
    $time=$_POST['time'];

//  $dt=strtotime($date);
//   $dt1=date("Y-m-d h:i:s", $dt);

    $sql = "INSERT INTO taskmanager (description, date,time)
             VALUES ('$description','$date','$time')";
   
     // echo $sql;

$result=mysqli_query($conn,$sql);
 
if($result){
   // echo "New Task Inserted Successfully";
       $success = "New Task Inserted Successfully";
    //  echo "<script type='text/javascript'>alert('Insertion Successful !!!')</script>";
    


// send mail code goes here

$_SESSION["message"] = "New Task Inserted Successfully.. ";

       // sleep('3');
        header('Location: index.php');
        exit();
 
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    $success = "New Task Inserted ERROR";
    }

    }
  $sql = "SELECT * FROM taskmanager   ORDER BY date ASC,time ASC";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
       
    ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
    </script> -->

    <style>
    .t1 {
        color: Blue;
        margin-top: 15px;
    }

    form {
        border: 1px solid;
        padding: 17px;
    }

    .desc {
        width: 293px;
    }



    .btn-primary {
        color: #fff;
        background-color: #025ce2;
        border-color: #0257d5;

        margin-top: 15px;
        padding: 5px 29px 5px 30px;
    }

    /* check mark */
    :root {
        --borderWidth: 7px;
        --height: 24px;
        --width: 12px;
        --borderColor: #78b13f;
    }

    #message {
        color: green;
        margin-top: 15px;
        font-size: 21px;
        background-color: lightgreen;

    }

    .check {
        display: inline-block;
        transform: rotate(45deg);
        height: var(--height);
        width: var(--width);
        border-bottom: var(--borderWidth) solid var(--borderColor);
        border-right: var(--borderWidth) solid var(--borderColor);
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="text-center t1">
            <h1>Task Manager</h1>
        </div>
        <hr>
        <div>
            <h3>Add Task</h3>
        </div>
        <div id="message"><?php
       // session_start();
        if(!empty($_SESSION)){
            echo $_SESSION["message"];
            session_unset();
        }
?></div>

        <form action="" method="post">

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="" class="form-label">Description:</label><br>
                    <input type="text" name="description" required id="description" class="desc"
                        placeholder="Enter Description">
                </div>
                <div class="col-md-3">
                    <label for="" class="form-label">Date</label><br>
                    <input type="date" name="date" id="date" required placeholder="Enter Name">
                </div>
                <div class="col-md-3">
                    <label for="" class="form-label">Time</label><br>
                    <input type="time" name="time" id="time" required placeholder="Select Time">
                </div>

                <div class="col-md-2">
                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
        </form>
        <div class="row-mb-3">
            <table class="table table-boarder">
                <thead>
                    <tr>
                        <th></th>
                        <!-- <th>No</th> -->
                        <th>Tasks</th>
                        <th>Date</th>
                        <th>Time</th>
                    </tr>
                </thead>

                <tbody>

                    <?php 
                     $firstnextfound =false;
                     $check="";
                    while($row = mysqli_fetch_array($result)){
                        $oneHourAgo= date('H:i:s', strtotime('-30 minutes'));
                        $oneHourafter= date('H:i:s', strtotime('+30 minutes'));

                       // $current=date("Y-m-d H:i:s");
                        //$taskdatetime=$row['date']. ' ' .$row['time'];
                        
                         $todadt=date("Y-m-d");
                         if($todadt == date('Y-m-d',strtotime($row['date']))){
                            $color="lightblue";
                         }elseif($todadt >= date('Y-m-d',strtotime($row['date'])) ){
                                $color="lightgreen";
                         } else{
                             $color="orange";                              
                         }
                         
                        if($row['date'] == $todadt && $row['time'] < $oneHourAgo){
                            $color ="lightgreen";
                            $check="";
                         }
                         elseif($row['date'] == $todadt && $row['time'] > $oneHourafter ){
                            if(!$firstnextfound){
                                $color="yellow";
                                $check="";
                                $firstnextfound= true;
                            }else{
                                $color="orange";
                            }
                         }elseif($row['date'] > $todadt || ($row['date'] == $todadt && $row['time'] >= $oneHourafter)){
                            if(!$firstnextfound){
                                $color="yellow";
                                $check ="";
                                $firstnextfound=true;
                            }else{
                                $color="orange";
                            }
                         }

                   if($row['date'] == $todadt && $row['time']  >= $oneHourAgo && $row['time']  <= $oneHourafter){
                        $check="✔";
                      }
                      else{
                        $check="";
                      }

                     
                    ?>

                    <tr style="background-color:<?php echo $color ?>">
                        <td> <?php echo $check; ?> </td>

                        <td> <?php echo $row['description']; ?> </td>
                        <td> <?php echo date('d-F-y',strtotime($row['date'])); ?> </td>
                        <td><?php echo date('H:i:s',strtotime($row['time'] )); ?></td>
                    </tr>
                    <?php

                    
                    // echo '
                    // <tr style="background-color:'.$color.'">
                    //     <td>'. $check .'</td>
                    //     <td>'.$row['id'].'</td>
                    //     <td>'.$row['description'].'</td>
                    //     <td>'.date('d-F-y',strtotime($row['date'])).'</td>
                    //     <td>'.date('H:i:s',strtotime($row['time'] )).'</td>

                    // </tr>
                    // ';
                  
                    
                    } ?>
                </tbody>
            </table>
            <?php   mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
} ?>
            </tbody>
            </table>



        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script>
    $(document).ready(function() {
        $(function() {
            setTimeout(function() {
                $("#message").fadeOut("fast");
            }, 3000)

        })
    });
    </script>


</body>

</html>
