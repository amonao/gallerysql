<?php

$pic_id = $_GET['picNumber'];

$servername = "localhost";
$username = "root";
$password = "";
$db = "gallery";

$conn = new mysqli($servername,$username,$password,$db);

if ($conn->connect_error) {
    die("Connection Error: ").$conn->connect_error;
}

$sql = "select pic_id, pic_name, pic_description, pic_tags FROM pictures where pic_id = $pic_id";

$result = $conn->query($sql);

if ($result->num_rows > 0 ){
        $row = $result->fetch_assoc(); 
        
        $imgNumber = $row['pic_id'];
        $imgSrc = $row['pic_name'];
        $imgDescription =$row['pic_description'];
        $imgTags = $row['pic_tags'];
        echo "<form action='./editScriptDB.php' method='post' enctype='multipart/form-data'>";
        echo "Pic #".$imgNumber." <br>";
        echo "<input type='hidden' name='pic_number' value='".$imgNumber."'>";
        echo "Pic Name: ".$imgSrc."<br>";
        echo "Pic Description: <input type='text' name='pic_description' value='".$imgDescription."'<br><br>";
        echo "Pic Tags: <input type='text' name='pic_tags' value='".$imgTags."'<br><br>";
        echo "<input type='submit'>";
        echo "</form>";
        echo "<img src='".$imgSrc."'><br><br>";
    
} else {
    echo "Error";
}

$conn->close();

?>

<h1><a href="./galleryDB.php">Gallery</a></h1>