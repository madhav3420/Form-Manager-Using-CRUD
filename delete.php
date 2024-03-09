<?php 
include 'connect.php';

if(isset($_GET ['delete'])){
    $delete_id = $_GET['delete'];
    // delete query
    $delete_data = mysqli_query($conn,"Delete from `user_data` where 
    id=$delete_id") or die("failed to delete");
    if($delete_data){
        header('location:display.php');
    }
    else{
        header('location:display.php');
    }

}



?>