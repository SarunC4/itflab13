<?php
  $conn = mysqli_init();
  mysqli_real_connect($conn, 'itflab13.mysql.database.azure.com', 'it63070160@itflab13', 'ITFlab13', 'itflab', 3306);
  if (mysqli_connect_errno($conn))
  {
      die('Failed to connect to MySQL: '.mysqli_connect_error());
  }
  $id = $_REQUEST['ID'];
  $name = $_REQUEST['name'];
  $comment = $_REQUEST['comment'];
  $link = $_REQUEST['link'];
  $res = "SELECT * FROM guestbook WHERE id='$id'";
  $update = "UPDATE guestbook SET Name='$name', Comment='$comment', Link='$link' WHERE id='$id'"
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Update Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
      <form method = "post" id="UpdateForm" class="form-horizontal mt-5">
        <div class="display-3 text-center mb-3">Update Form</div>
        <div class="form-group">
          <label for="name" class="col-sm-3 control-label">Name</label>
          <div class="col-sm-6">
            <input type="text" name="name" id="idname" class="form-control" value="<?php echo $res['Name']; ?>">
          </div>
        </div>

        <div class="form-group">
          <label for="comment" class="col-sm-3 control-label">Comment</label>
          <div class="col-sm-6">
            <textarea rows="10" cols="40" name = "comment" id="idComment" value="<?php echo $res['Comment']; ?>"></textarea>
          </div>
        </div>

        <div class="form-group">
          <label for="link" class="col-sm-3 control-label">Link</label>
          <div class="col-sm-6">
            <input type="text" name="link" id="idlink" class="form-control" value="<?php echo $res['Link']; ?>">
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-12 mt-3">
            <input type="submit" name="upbtn" id="idupbtn" class="btn btn-success" value="แก้ไข">
            <a href="show.php" class="btn btn-danger">ยกเลิก</a>
          </div>
        </div>

      </form>
    </div>
  </body>
</html>
