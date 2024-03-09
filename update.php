<?php include 'connect.php';

// update query
if(isset($_POST['update_btn'])){
    $data_id = $_POST['data_id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $DOB = $_POST['DOB'];
    $address = $_POST['address'];
    $hobbies = $_POST['hobbies'];
    $picture = $_POST['picture'];
    $sql = "UPDATE `user_data` SET name='$name', gender='$gender', dob='$DOB', address='$address', hobbies='$hobbies',picture='$picture' WHERE id=$data_id";
    $result = mysqli_query($conn, $sql);
    if($result){
        header ('location:display.php');
    }
    else{
        echo die("Error in data updating");
    }
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">
</head>
<body>
    <div class="container">
    <h1>Update Data</h1>
    <a href="display.php">View Data</a>
    <?php 
    if(isset($_GET['edit'])){
        $edit_id = $_GET['edit'];
        $get_data = mysqli_query($conn,"SELECT * FROM `user_data` WHERE id=$edit_id");
        
        if(mysqli_num_rows($get_data)>0){
            $fetch_data = mysqli_fetch_assoc($get_data);
        ?> 
        <form action="" method="post">
            <input type="hidden" name="data_id" value="<?php echo $fetch_data['id'] ?>">
            <label for="name">Name:</label>
            <input type="text" required value="<?php echo $fetch_data['name'] ?>" name="name"><br>
            
            <label for="gender">Gender:</label>
            <input type="radio" value="Male" <?php echo ($fetch_data['gender'] == 'Male') ? 'checked' : ''; ?> name="gender">Male
            <input type="radio" value="Female" <?php echo ($fetch_data['gender'] == 'Female') ? 'checked' : ''; ?> name="gender">Female <br>
            
            <label for="DOB">Date of Birth:</label>
            <input type="date" value="<?php echo $fetch_data['DOB'] ?>" required name="DOB"><br>
            
            <label for="address">Address:</label>
            <textarea cols="15" rows="4" name="address"><?php echo $fetch_data['address'] ?></textarea><br>
            
            <label for="hobbies">Hobbies:</label>
            <select name="hobbies">
                <option value="Gaming" <?php echo ($fetch_data['hobbies'] == 'Gaming') ? 'selected' : ''; ?>>Gaming</option>
                <option value="Singing" <?php echo ($fetch_data['hobbies'] == 'Singing') ? 'selected' : ''; ?>>Singing</option>
                <option value="Dancing" <?php echo ($fetch_data['hobbies'] == 'Dancing') ? 'selected' : ''; ?>>Dancing</option>
                <option value="Travelling" <?php echo ($fetch_data['hobbies'] == 'Travelling') ? 'selected' : ''; ?>>Travelling</option>
            </select><br>
            
            <label for="image">Select Image:</label>
            <input type="file" name="picture" accept="image/*"><br><br>
            
            <input type="submit" class="btn" value="Update" name="update_btn">
        </form>
        <?php 
        }
    }
    ?>

    </div>
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
    <script>
    new MultiSelectTag('hobbies')  // id
</script>
</body>
</html>
