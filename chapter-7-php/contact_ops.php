<?php
function errors($post)
{
    $error_str = "";

    if(!$post['name'])
        $error_str = "<li>The name cannot be blank</li>\n";

    if(!$post['email'] || !filter_var($post['email'], FILTER_VALIDATE_EMAIL))
        $error_str .= "<li>The entered email address is not valid.</li>\n";

    if(!$post['subject'])
        $error_str .= "<li>The subject cannot be blank.</li>\n";

    if(!$post['message'])
        $error_str .= "<li>You must enter a message.</li>\n";

    return $error_str;
}

function send_mail($post)
{
    $emailTo    = "info@reallybigshoe.co.uk";
    $subject    = $post['subject'];
    $body       = "
<html>
<head>
  <title>Message from Contact Form</title>
</head>
<body>
  <p style=\"color: blue;\">Here is a message from the contact form.</p>

  <p style=\"color: blue; margin: 40px;\">{$post['message']}
</body>
</html>
";

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= "from: {$post['name']} <{$post['email']}>";

    return mail($emailTo, $subject, $body, $headers);
}

function raise_alert($type, $header, $message)
{ ?>
    <div class="alert alert-<?php echo $type; ?> alert-dismissable" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <strong><?php echo $header ?></strong>
      <?php echo $message ?>
    </div>
<?php }
