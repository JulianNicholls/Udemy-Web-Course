<!DOCTYPE html>
<html>
<head>
    <title>Mailing with PHP</title>
</head>
<body>
    <h1>Mailing with PHP</h1>

<?php
    $emailTo = "info@reallybigshoe.co.uk";
    $subject = "This is a Test from Ecohosting";
    $body = "I hope this works first time";
    $headers = "from: julian@juliann.co.uk";

    if(mail($emailTo, $subject, $body, $headers)) {
        echo "<p>Email Sent Successfully</p>";
    }
    else {
        echo "<p>Email Fail</p>";
    }
?>
</body>
</html>
