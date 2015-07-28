<?php
    require_once 'comsubs.php';

    $conn = new mysqli('localhost', 'cl50-julian', 'julian', 'cl50-julian');

    if($conn->connect_error) {
        die("503 Error - Cannot connect to database.");
    }

    $error_str = '';
    $success_str = '';

    if(isset($_POST['signup'])) {
        if($_POST['email'] == '' ||
           !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
          $error_str = "You must enter a valid email address.<br/>";
        }

        if(strlen($_POST['password']) < 6 ||
           !preg_match('/[A-Z]/', $_POST['password'])) {
            $error_str .= 'The password must be at least 6 characters and contain at least one capital letter.';
        }

        if($error_str == '') {
            $query = "SELECT COUNT(*) FROM `users` WHERE `email`='" . $conn->real_escape_string($_POST['email']) . "'";

            $result = $conn->query($query);
            $row = $result->fetch_array();
            if($row[0] != '0') {
                $error_str = "That email address is already registered. Do you want to log in?";
            }
            else {
                $query = "INSERT INTO `users` (`email`, `password`) VALUES ('" .
                    $conn->real_escape_string($_POST['email']) . "', '" .
                    md5(md5($_POST['email']) . $_POST['password']) .
                    "')";

                echo $query;
                if($conn->query($query) !== FALSE) {
                    $success_str = "You have signed up successfully.";
                }
                else {
                  $error_str = $conn->error;
                }
            }
        }
    }
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
</head>

<body>
  <div class="container">
    <div class="page-header">
      <h1>Secret Diary <small>We'll never tell</small></h1>
    </div>

    <?php
    if($error_str != '') {
        raise_alert('danger', 'Signup Error<br />', $error_str);
    }
    elseif($success_str != '') {
        raise_alert('success', 'Signup Complete', $success_str);
    } ?>

    <div class="row">
      <div class="col-sm-6 col-sm-offset-2 well">
        <form action="index.php" method="post" accept-charset="utf-8" class="form-horizontal">
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="email" id="email" name="email" class="form-control" />
            </div>
          </div>

          <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input type="password" id="password" name="password" class="form-control" />
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
              <input type="submit" name="signup" value="Sign up" class="btn btn-primary btn-lg" />
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
