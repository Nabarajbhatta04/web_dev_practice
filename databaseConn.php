<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "website_meme";
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("database is not connected!" . mysqli_connect_error());
}
;
$search = "";
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);


    $sql = "SELECT * FROM search WHERE
            meme_title LIKE '%$search%' 
            OR meme_description LIKE '%$search%'";

    $result = mysqli_query($conn, $sql);
}
?>

< <form action="" method="GET">
    <input type="text" name="search" placeholder="Search memes..." value="<?php echo $search; ?>">

    <button type="submit">Search</button>
    </form>

    <hr>

    <?php
    if (isset($result)) {
        if (mysqli_num_rows(result: $result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<h3>" . $row['meme_title'] . "</h3>";
                echo "<p>" . $row['meme_description'] . "</p>";
                echo "<hr>";
            }
        } else {
            echo "No results found!";
        }

    }
    ?>