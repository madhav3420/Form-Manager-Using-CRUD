<?php include 'connect.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
    <link rel="stylesheet" href="style.css">
    <style>
        th,td{
    border: 1px double black;
    padding: 5px;
}
.container{
    width: 800px;
    margin: 20px auto;
    text-align: center; /* Center the content within the container */

}
.btn{
    background-color: red;
    padding: 5px 10px;
}
    </style>
</head>
<body>
    <div class="container">
    <h1> Display Data</h1>
    <a href="index.php">Back</a>
    <table>
    <thead>
        <tr>
            <th>Sl No</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Date Of Birth</th>
            <th>Address</th>
            <th>Hobbies</th>
            <th>Picture</th>
            <th>Operations</th>

        </tr>
    </thead>
    <tbody>
        
    <?php 
     $display_data = mysqli_query($conn, "SELECT * FROM `user_data`");
     $num=1;
     if(mysqli_num_rows($display_data)>0){
        while ($row = mysqli_fetch_assoc($display_data)) {
            ?>
                <tr>
                    <td><?php echo $num ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['DOB']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['hobbies']; ?></td>
                    <td><?php echo $row['picture']; ?></td>
                    <td><br>
                        <a href="delete.php?delete=<?php echo 
                        $row ['id'] ;?>" onclick="return confirm('Are you sure you want to delete user?');" class="btn">Delete</a>
                        <br><br>

                        <a href="update.php?edit=<?php echo 
                        $row ['id'];?>" style="
                        background-color: blue; padding: 5px 10px;color: white;
                        border: none;
                        border-radius: 5px;
                        cursor: pointer;"> Update </a>
                    </td>
                </tr>
            <?php
            $num++;
            }
        }
        else{
            echo "No User";
        }
            ?>
       
    </tbody>
</table>

</div>
</body>
</html>