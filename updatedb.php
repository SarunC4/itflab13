<?php

$conn = mysqli_init();
mysqli_real_connect($conn, 'itflab13.mysql.database.azure.com', 'it63070160@itflab13', 'ITFlab13', 'itflab', 3306);
if (mysqli_connect_errno($conn))
{
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}

$edit_id = $_POST['edit_id'];
$name = $_POST['name'];
$comment = $_POST['comment'];
$link = $_POST['link'];


$sql = "UPDATE guestbook SET Name='$name', Comment='$comment', Link='$link' WHERE id='$edit_id'";


if (mysqli_query($conn, $sql)) {
    ?><div class="display-3 text-center mb-3">Updated Successfully</div>
    <div class="text-center"><a href="show.php" class="btn btn-warning">กลับ</a></div><?php
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
mysqli_close($conn);
?>