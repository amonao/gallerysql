<a href= './uploadFormDB.html'>Upload Pictures for Databese</a> <br>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$db= "gallery";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 


$sql = "select pic_id, pic_name, pic_description, pic_tags FROM pictures";


$result = $conn->query($sql);

if($result-> num_rows > 0)
{
  while($row = $result-> fetch_assoc())
  {
    $imgNumber = $row['pic_id'];
    $imgSrc  = $row['pic_name'];
    $imgDescription= $row['pic_description'];
    $imgTags= $row['pic_tags'];
    echo $imgNumber." -- ".$imgSrc." -- ".$imgDescription." --".$imgTags."<br><img src='".$imgSrc."'><br><br>";
  }
}  
else{

  echo "0 Results";
}

$conn->close();
?>