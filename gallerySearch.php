<html>
    <head>
        <link rel="stylesheet" href="galleryStyle.css" />
</head>

<div class="menuBar">
    <a href="./uploadFormDB.html">Upload Pictures for Database</a><br>
    <form action="gallerySearch.php" method="post">
    Search Tags <input type="text" name="searchTag">
    <input type="submit">
</form>

</div>

<body>

<?php

$searchTags = $_POST['searchTag'];

$servername = "localhost";
$username = "pic_user";
$password = "123456";
$db = "gallery";

$conn = new mysqli($servername,$username,$password,$db);

if ($conn->connect_error) {
    die("Connection Error: ").$conn->connect_error;
}

$sql = "select pic_id, pic_name, pic_description, pic_tags FROM pictures where pic_tags like'%$searchTags%'";

$result = $conn->query($sql);

if ($result->num_rows > 0 ){
    while($row = $result->fetch_assoc()) {
        $imgNumber = $row['pic_id'];
        $imgSrc = $row['pic_name'];
        $imgDescription =$row['pic_description'];
        $imgTags = $row['pic_tags'];
        echo "<div class='pictureBox'><br>Pic #".$imgNumber." <br>Pic Name: ".$imgSrc."<br>Pic Description: ".$imgDescription."<br> Pic Tags: ".$imgTags."<br><a href='./galleryEditDB.php?picNumber=".$imgNumber."'>Edit</a><br><img src='".$imgSrc."'><br><br></div><br><br>";
    }
} else {
    echo "0 Results";
}

$conn->close();

?>

</body>
</html>