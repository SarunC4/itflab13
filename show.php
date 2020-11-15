<html>
<head>
<title>ITF Lab</title>
<meta charset="UTF-8">
</head>
<body>
<?php
$conn = mysqli_init();
mysqli_real_connect($conn, 'itflab13.mysql.database.azure.com', 'it63070160@itflab13', 'ITFlab13', 'itflab', 3306);
if (mysqli_connect_errno($conn))
{
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}
$res = mysqli_query($conn, 'SELECT * FROM guestbook');
?>
<table width="600" border="1">
  <tr class="table-primary">
    <th width="100"> <div align="center">Name</div></th>
    <th width="350"> <div align="center">Comment </div></th>
    <th width="150"> <div align="center">Action </div></th>
  </tr>
<?php
while($Result = mysqli_fetch_array($res))
{
?>
  <tr class="table-info">
    <td><?php echo $Result['Name'];?></td>
    <td><?php echo $Result['Comment'];?></td>
    <td><a href="delete.php?id=<?php echo $Result['ID']; ?>" class="btn btn-danger">ลบ</a> <a href="update.php?id=<?php echo $Result["ID"]; ?>" class="btn btn-warning" >แก้ไข</a></td>
  </tr>
<?php
}
?>
</table>
<?php
mysqli_close($conn);
?>
</body>
</html>
