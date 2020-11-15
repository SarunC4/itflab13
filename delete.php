<?php

$conn = mysqli_init();
mysqli_real_connect($conn, 'itflab13.mysql.database.azure.com', 'it63070160@itflab13', 'ITFlab13', 'itflab', 3306);
if (mysqli_connect_errno($conn))
{
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}

$id = $_REQUEST['delete_id'];


$sql = "DELETE FROM guestbook WHERE id='$id'";


if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    header("Location: show.php");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
mysqli_close($conn);
?>
