<?php
//Save everiting we added
$tags= $_POST['pic_tags'];
$description= $_POST['pic_description'];

// File upload path
$saveDir = "../pics/";
$saveFile = $saveDir.basename($_FILES["fileToUpload"]["name"]);

$servername= "localhost";
$username= "root";
$password= "";
$db= "gallery";

$conn= new mysqli($servername, $username, $pasword, $db);






if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $saveFile)){
	echo "<h1>Picture Uploaded</h1><br>".$_FILES['fileToUpload']['name']." was saved<br>";
	echo "<img src='".$saveFile."'><br>";
	echo "Picture Description: ".$description."<br>";
	echo "Picture Tags: ".$tags."<br>";
} else {
	echo "Upload Did Not Work<a href='./index.php'> Go Back</a>";
}


if ($conn->connect_error){
	die("Connection Failed: ".$conn->connect_error);
}	

$sql = "insert into pictures(pic_name, pic_description, pic_tags)values('$saveFile','$description','$tags')";

if ($conn->query($sql)=== TRUE){	
	echo "Database Worked";
} else {
	echo "error";
}

echo "<h3>Diagnostic Info:</h3>";
echo "<br>Tmp File Name: ".$_FILES['fileToUpload']['tmp_name']."<br>";
echo "saveFile Variable Valuable: ".$saveFile;
?>

<h1><a href="./galleryDB.php">Back to Gallery</a></h1> 