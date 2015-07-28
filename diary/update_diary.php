<?php
    session_start();

    require 'comsubs.php';

    db_connect();

    $query = "UPDATE `users` SET `diary`='" .
        $conn->real_escape_string($_POST['entry']) .
        "' WHERE `id`=" . $_SESSION['id'];

    $ok = $conn->query($query);

    echo $ok ? "OK" : "FAIL";
?>
