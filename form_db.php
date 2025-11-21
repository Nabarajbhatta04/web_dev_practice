<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST">
        <label>Name:</label><input type="text" name="name" placeholder="Enter user name!"></br>
        <label>Adderss:</label><input type="text" name="address" placeholder="Enter user address!"></br>
        <label>Number:</label><input type="number" name="number"></br>
        <label>Email:</label><input type="email" name="email" placeholder="Email"></br>
        <label>Gender:</label></br>
        <input type="radio" name="gender" value="male">Male</br>
        <input type="radio" name="gender" value="female">Female</br>
        <input type="radio" name="gender" value="other">other</br>
        <label>Hobbies:</label></br>
        <select name="hobbies[]" multiple size="4" required>
            <option value="playing">Playing</option>
            <option value="reading">Reading</option>
            <option value="running">Running</option>
            <option value="singing">singing</option>

        </select>
        <input type="submit" name="submit" value="submit">
    </form>

    <?php
    include "databaseConnection.php";

    $sql = "create table user_introduction (
                                      id INT PRIMARY KEY AUTO_INCREMENT,
                                      name VARCHAR(20),
                                      address  VARCHAR(30),
                                      number INT,
                                      email VARCHAR(40),
                                      gender VARCHAR(20),
                                      hobbies VARCHAR(40)
                                    )";

    // $table = mysqli_query($conn, $sql);
    // if ($table) {
    //     echo "table created successfully!";
    // }
    





    if (isset($_POST['submit'])) {

        $name = $_POST['name'];
        $address = $_POST['address'];

        $number = $_POST['number'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        // Hobbies is an array -> convert into string
        $hobbies = implode(", ", $_POST['hobbies']);

        $insert = "insert into user_introduction (name,address,number,email,gender,hobbies) values
        ('$name','$address',$number,'$email','$gender','$hobbies')";

        $result = mysqli_query($conn, $insert);
        if ($result) {
            echo "Data inserted successfully!";
        } else {
            echo "Insert failed: " . mysqli_error($conn);
        }

    }



    ?>

</body>

</html>