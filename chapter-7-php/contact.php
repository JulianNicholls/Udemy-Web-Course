<?php
    require_once 'contact_ops.php';

    $error_str  = "";

    if(isset($_POST['submit']))
    {
        $error_str = errors($_POST);

        if($error_str == "" && !send_mail($_POST))
            $error_str = "<li>The mail was not sent successfully</li>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contact Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
</head>

<body>
  <div class="container">
    <div class="page-header">
      <h1>Contact Form <small>Enter your message</small></h1>
      <?php if($mail_called) echo "Mail Called<br />"; ?>
    </div>

<?php
    if(isset($_POST['submit']))
    {
        if($error_str == "")
            raise_alert('success', 'Success', 'The email was sent.');
        else
            raise_alert('danger', 'There are errors in the form', "<ul>$error_str</ul>");
    } ?>

    <div class="well">
      <form action="contact.php" method="post" accept-charset="utf-8" class="form-horizontal">
        <div class="form-group">
          <label for="name" class="col-sm-2 control-label">Name</label>
          <div class="col-sm-10">
            <input type="text" name="name" id="name" class="form-control">
          </div>
        </div>

        <div class="form-group">
          <label for="email" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-10">
            <input type="email" name="email" id="email" class="form-control">
          </div>
        </div>

        <div class="form-group">
          <label for="subject" class="col-sm-2 control-label">Subject</label>
          <div class="col-sm-10">
            <input type="text" name="subject" id="subject" class="form-control">
          </div>
        </div>

        <div class="form-group">
          <label for="message" class="col-sm-2 control-label">Message</label>
          <div class="col-sm-10">
            <textarea name="message" id="message" class="form-control" rows="5"></textarea>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" name="submit" class="btn btn-primary" value="Submit" />
          </div>
        </div>
     </form>
    </div>
  </div>

  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
