<!DOCTYPE html>
<head><title>WebPro</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</head>
<body>
<?php
$servername="localhost";
$username = "root";
$pass="";
$db="webpro";
$conn = new mysqli($servername, $username, $pass , $db);
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
$url=  $_POST['link'];
$sql = "INSERT INTO web(m_url) VALUES('$url')";
if($conn->query($sql)===TRUE)
{
  $res="SELECT s_id FROM web WHERE m_url='$url'";
  $result=$conn->query($res);

  if($result->num_rows > 0 )
  {
    while($row = $result->fetch_assoc()) {
      $id=row["s_id"];
        $nw= "http://localhost/webpro/rd10".$id;
       session_start();
        $_SESSION['nu']=$nw;
        $_SESSION['ou']=$url;
        $_SESSION['id']=$id;                                  }
}


else {
    echo "0 results";
}
}
header("LOCATION: new.php");
?>
</html>
