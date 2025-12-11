<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "website_meme";
$conn = mysqli_connect($servername, $username, $password, $database);

//get file detail
$filename = $_FILES['myfile']['name'];
$tempfile = $_FILES['myfile']['temp_name'];

//uploads folder  (destination - correct path for image folder)
$folder = "picture/" . $filename;


//file moves to uploads folder
move_uploaded_file($tmpfile, $folder);

// insert file into database

$sql = "INSERT INTO uploads (file_name) VALUES ('$filename')";
mysqli_query($conn, $sql);

header("Location: index.php");
exit;

?>