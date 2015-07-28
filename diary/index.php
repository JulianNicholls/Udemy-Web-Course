<?php
    session_start();
    require_once 'comsubs.php';
    $conn = new mysqli('localhost', 'cl50-julian', 'julian', 'cl50-julian');

    if($conn->connect_error) {
        die("503 Error - Cannot connect to database.");
    }

    $error_str   = '';
    $success_str = '';

    require_once 'signup.php';
    require_once 'login.php';
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
  <div class="container">
    <div class="page-header">
      <h1>Secret Diary <small>We'll never tell</small></h1>
    </div>

    <?php
    if($error_str != '') {
        raise_alert('danger', $error_head, $error_str);
    }
    elseif($success_str != '') {
        raise_alert('success', $success_head, $success_str);
    } ?>

    <div class="row">
      <div class="col-sm-6 col-sm-offset-3">
        <ul id="tabs" class="nav nav-tabs nav-justified" data-tabs="tabs">
          <li class="active"><a href="#signupdiv" data-toggle="tab">Sign up</a></li>
          <li><a href="#logindiv" data-toggle="tab">Log in</a></li>
        </ul>
      </div>
    </div>

    <div class="row tab-content">
      <div class="col-sm-6 col-sm-offset-3 well tab-pane active" id="signupdiv">
        <form action="index.php" method="post" accept-charset="utf-8" class="form-horizontal">
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="email" id="email" name="email" class="form-control"
                     value="<?php echo addslashes($_POST['email']); ?>"/>
            </div>
          </div>

          <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input type="password" id="password" name="password" class="form-control"
                     value="<?php echo addslashes($_POST['password']); ?>" />
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
              <input type="submit" name="signup" value="Sign up" class="btn btn-primary btn-lg" />
            </div>
          </div>
        </form>
      </div>

      <div class="col-sm-6 col-sm-offset-3 well tab-pane" id="logindiv">
        <form action="index.php" method="post" accept-charset="utf-8" class="form-horizontal">
          <div class="form-group">
            <label for="logemail" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="email" id="logemail" name="logemail" class="form-control"
                     value="<?php echo addslashes($_POST['logemail']); ?>"/>
            </div>
          </div>

          <div class="form-group">
            <label for="logpassword" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input type="password" id="logpassword" name="logpassword" class="form-control"
                     value="<?php echo addslashes($_POST['logpassword']); ?>" />
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
              <input type="submit" name="login" value="Log in" class="btn btn-success btn-lg" />
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
