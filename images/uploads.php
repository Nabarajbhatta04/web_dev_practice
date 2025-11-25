<?php
include 'databaseConnection.php';

//get file detail
$filename = $_FILE['myfile']['name'];
$tempfile = $_FILE['myfile']['temp_name'];

//uploads folder  (destination - correct path for image folder)
$folder = "/picture" . $filename;

//file moves to uploads folder
move_uploaded_file($tempfile, $folder);





?>