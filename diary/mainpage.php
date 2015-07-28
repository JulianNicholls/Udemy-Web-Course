<?php
    session_start();
    require_once 'comsubs.php';

    db_connect();

    $error_str   = '';
    $success_str = '';

    $diary = db_load_diary();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Secret Diary</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  <link rel="stylesheet" type="text/css" href="diary.css">
</head>

<body>
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header pull-left">
        <a href="#" class="navbar-brand">Secret Diary</a>
      </div>
      <div class="pull-right">
        <ul class="nav navbar-nav">
          <li><a href="#">Log out</a></li>
        </ul>
      </div>
    </div>
  </div>

  <?php
  if($error_str != '') {
      raise_alert('danger', $error_head, $error_str);
  }
  elseif($success_str != '') {
      raise_alert('success', $success_head, $success_str);
  } ?>

  <div class="container top-container">
    <div class="page-header">
      <h1>Secret Diary <small>We'll never tell</small></h1>
    </div>

    <div class="row">
      <div class="col-sm-8 col-sm-offset-2">
        <textarea name="entry" id="entry" class="form-control">
<?php echo $diary; ?>
        </textarea>
      </div>
    </div>
  </div>

  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script>
$(function() {
    var $textarea = $('textarea'),
        last_save_size = $textarea.val().length;

    $('.top-container').css('height', $(window).height());

    $textarea.css('height', $(window).height() - 190);

    $textarea.keyup(function(event) {
      var content = this.value,
          length = content.length;

      // Update the diary entry in the database every 10 characters,
      // or when the user hits the return key.

      if(Math.abs(last_save_size - length) >= 10 || event.keyCode == 13) {
          last_save_size = length;

          $.ajax({
            type: 'POST',
            url: 'update_diary.php',
            data: { 'entry': content },
            success: function(data) {
                if(data == 'FAIL') {
                    alert('Cannot save your diary entries.')
                }
            }
          });
      }
    })
});
  </script>
</body>
</html>
