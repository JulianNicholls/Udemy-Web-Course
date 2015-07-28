<?php
if(isset($_POST['login'])) {
    $email = $conn->real_escape_string($_POST['logemail']);
    $hash  = md5(md5($_POST['logemail']) . $_POST['logpassword']);
    $query = "SELECT * FROM `users` WHERE `email`='$email' AND `password`='$hash'";

    $result = $conn->query($query);

    if($result->num_rows == 1) {
      $row = $result->fetch_assoc();
      $_SESSION['id'] = $row['id'];
      $success_head = "";
      $name = explode(' ', $row['name'])[0];
      $success_str = "Hello $name.";

      // Redirect to main page
    }
    else {
      $error_str = "Your username or password was not recognised.";
      $error_head = "Login Error.";
    }
}
