<?php

$number = $_POST['pic_number'];
$description = $_POST['pic_description'];
$tags = $_POST['pic_tags'];

$servername = "localhost";
$username = "root";
$password = "";
$db = "gallery";

$conn = new mysqli($servername,$username,$password,$db);

if ($conn->connect_error) {
    die("Connection Error: ").$conn->connect_error;
}

$sql = "update pictures set pic_description='$description', pic_tags='$tags' where pic_id='$number'";

if ($conn->query($sql) === TRUE){
    echo "it updated";
} else {
    echo "Update Failed";
}

?>

<h1><a href="./galleryDB.php">Gallery</a></h1>