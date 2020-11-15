<html>
  <head>
    <title>Edit Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
  <body>
    <?php
    $conn = mysqli_init();
    mysqli_real_connect($conn, 'itflab13.mysql.database.azure.com', 'it63070160@itflab13', 'ITFlab13', 'itflab', 3306);
    if (mysqli_connect_errno($conn))
    {
        die('Failed to connect to MySQL: '.mysqli_connect_error());
    }
    if (isset($_REQUEST['id'])) {
      try {
        $id = $_REQUEST['id'];
        $res = mysqli_query($conn, "SELECT * FROM guestbook WHERE id='$id'");
        extract($res);
      }
    }

    if (isset($_REQUEST['upbtn'])) {
      $name_up = $_REQUEST['name']
      $comment_up = $_REQUEST['comment']
      $link_up = $_REQUEST['link']
      if (empty($name_up)) {
        $errorMsg = 'Please Enter Firstname';
      } else if (empty($comment_up)) {
        $errorMsg = "Please Enter Comment ";
      } else {
        try {
          if (!isset($errorMsg)) {
            $update_stmt = "UPDATE guestbook SET Name='$name_up', Comment='$comment_up', Link='$link_up' WHERE id='$id'"
            if (mysqli_query($conn, $sql)) {
              $updateMsg = "New record updated successfully";
              header("refresh:2;show.php");
            }
          }
        }
      }
    }
    ?>
    <div class="container">
    <div class="display-3 text-center mb-3">Edit Form</div>

    <?php
      if (isset($errorMsg)) {
    ?>
      <div class="alert alert-danger">
        <strong>Wrong! <?php echo $errorMsg; ?></strong>
      </div>
    <?php } ?>

    <?php
      if (isset($updateMsg)) {
    ?>
      <div class="alert alert-success">
        <strong>Success! <?php echo $updateMsg; ?></strong>
      </div>
    <?php } ?>

      <form method = "post" id="update" class="form-horizontal mt-5">
        <div class="form-group">
          <label for="name" class="col-sm-3 control-label">Name</label>
          <div class="col-sm-6">
            <input type="text" name="name" id="idname" class="form-control" value="<?php echo $name; ?>">
          </div>
        </div>

        <div class="form-group">
          <label for="comment" class="col-sm-3 control-label">Comment</label>
          <div class="col-sm-6">
            <textarea rows="10" cols="40" name = "comment" id="idComment" value="<?php echo $comment; ?>"></textarea>
          </div>
        </div>

        <div class="form-group">
          <label for="link" class="col-sm-3 control-label">Link</label>
          <div class="col-sm-6">
            <input type="text" name="link" id="idlink" class="form-control" value="<?php echo $link; ?>">
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
    <?php
    mysqli_close($conn);
    ?>
  </body>
</html>
