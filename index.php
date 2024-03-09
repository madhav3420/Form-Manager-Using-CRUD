<?php
include 'connect.php';

// inserting the data
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $DOB = $_POST['DOB']; // Assuming DOB is in the format YYYY-MM-DD
    $address = $_POST['address'];
    $hobbies = $_POST['hobbies'];
    $picture = $_POST['picture'];

    // insert query
    $sql = "INSERT INTO `user_data` (name, gender, DOB, address, hobbies,picture) VALUES ('$name', '$gender', '$DOB', '$address', '$hobbies','$picture')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "data inserted successfully";
    } else {
        echo "data not inserted";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">
</head>

<body>
    <div class="container">
        <h1>CRUD Application</h1>
        <a href="display.php">view data</a>
        <form action="" method="post">
            <label for="Name">Name:</label>
            <input type="text" placeholder="Name" required autocomplete="off" name="name"><br>

            <label for="gender">Gender:</label>
            <input type="radio" name="gender" value="Male">Male
            <input type="radio" name="gender" value="Female">Female <br>

            <label for="dob">Date of Birth:</label>
            <input type="date" placeholder="DOB" name="DOB"><br>

            <label for="address">Address:</label>
            <textarea name="address" id="" cols="15" rows="4" required></textarea><br>

            <label for="hobbies">Hobbies:</label>
            <select name="hobbies" id="hobbies" multiple>
         <option value="Gaming">Gaming</option>
         <option value="Singing">Singing</option>
         <option value="Dancing">Dancing</option>
         <option value="Travelling">Travelling</option>
          </select><br>

            <label for="image">Select Image:</label>
            <input type="file" name="picture" accept=".jpg, .jpeg, .png"><br><br>

            <input type="submit" class="btn" value="Add User" name="submit">
        </form>

    </div>
    
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
    <script>
    new MultiSelectTag('hobbies')  // id
</script>
</body>

</html>