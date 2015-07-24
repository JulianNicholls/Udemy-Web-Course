<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Collector</title>
</head>
<body>
    <h1>Variables from Contact Form</h1>

    <p>Sending Email...</p>
<?php
    $emailTo    = "info@reallybigshoe.co.uk";
    $subject    = $_POST['subject'];
    $body       = "
<html>
<head>
  <title>Message from Contact Form</title>
</head>
<body>
  <p style=\"color: blue;\">Here is a message from the contact form.</p>

  <p style=\"color: #008; margin-left: 40px;\">{$_POST['message']}
</body>
</html>
";

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= "from: {$_POST['name']} <{$_POST['email']}>";

    if(mail($emailTo, $subject, $body, $headers)) {
        echo "<p>Email Sent Successfully</p>";
    }
    else {
        echo "<p>Email Fail</p>";
    }
?>

</body>
</html>
