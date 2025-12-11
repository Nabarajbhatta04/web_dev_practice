<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="myfile" required>
        <button type="submit">Upload</button>
    </form>

    <br><br>

    <h2>Uploaded Files</h2>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "website_meme";
    $conn = mysqli_connect($servername, $username, $password, $database);

    $sql = "select * from uploads ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {

        echo "<p>";
        echo "<a href='picture/" . $row['file_name'] . "' target='_blank'>" . $row['file_name'] . "</a>";

        echo "<img src='picture/" . $row['file_name'] . "' width='200'>";

        echo "</p>";
    }
    ;


    ?>
</body>

</html>