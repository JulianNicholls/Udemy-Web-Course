<?php
if(isset($_POST['signup'])) {
    if($_POST['email'] == '' ||
       !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $error_str  = "You must enter a valid email address.<br/>";
      $error_head = "Signup Error<br />";
    }

    if(strlen($_POST['password']) < 6 ||
       !preg_match('/[A-Z]/', $_POST['password'])) {
        $error_str .= 'The password must be at least 6 characters and contain at least one capital letter.';
      $error_head = "Signup Error<br />";
    }

    if($error_str == '') {
        $query = "SELECT COUNT(*) FROM `users` WHERE `email`='" . $conn->real_escape_string($_POST['email']) . "'";

        $result = $conn->query($query);
        $row = $result->fetch_array();
        if($row[0] != '0') {
            $error_str = "That email address is already registered. Do you want to log in?";
            $error_head = "Signup Error<br />";
        }
        else {
            $query = "INSERT INTO `users` (`email`, `password`) VALUES ('" .
                $conn->real_escape_string($_POST['email']) .
                "', '" .
                md5(md5($_POST['email']) . $_POST['password']) .
                "')";

            if($conn->query($query) !== FALSE) {
                $success_str = "You have signed up successfully.";
                $success_head = 'Signup Complete';
                $_SESSION['id'] = $conn->insert_id;

                // Redirect to main page
            }
            else {
              $error_str = "We had a problem with registering you. Please try again later.";
              $error_head = "Signup Error<br />";
            }
        }
    }
}
