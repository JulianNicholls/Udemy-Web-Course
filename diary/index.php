<?php
    session_start();

    require_once 'comsubs.php';

    db_connect();

    $error_str   = '';
    $success_str = '';

    if(isset($_GET['logout'])) {
        unset($_SESSION['id']);
        $success_str = 'You have been logged out successfully.';
    }

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
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target=".navbar-collapse" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="#" class="navbar-brand">Secret Diary</a>
      </div>
      <div class="collapse navbar-collapse">
        <form method="post" class="navbar-form navbar-right">
          <div class="form-group">
            <input type="email" name="logemail" placeholder="Email Address" class="form-control"
                   value="<?php echo $_POST['logemail']; ?>" />
          </div>
          <div class="form-group">
            <input type="password" name="logpassword" placeholder="Password" class="form-control"
                   value="<?php echo $_POST['logpassword']; ?>" />
          </div>
          <div class="form-group">
            <input type="submit" name="login" value="Sign in" class="form-control" />
          </div>
        </form>
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

  <div class="container">
    <div class="page-header">
      <h1>Secret Diary <small>We'll never tell</small></h1>
    </div>

    <p class="cta lead text-center">Your own private diary, safe from prying eyes, and it's with you wherever you go.</p>

    <p class="cta text-center">Interested? Why not sign up?</p>

    <div class="margin-above row holder">
      <div class="col-sm-6 col-sm-offset-3 well">
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
              <input type="submit" name="signup" value="Sign up" class="btn btn-success btn-lg" />
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
