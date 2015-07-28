<?php
    $conn = new mysqli('localhost', 'cl50-julian', 'julian', 'cl50-julian');

    if($conn->connect_error) {
        die("503 Error - Cannot connect to database.");
    }

    $query = "SELECT name, email FROM `users`";

    if(($result = $conn->query($query)) == FALSE) {
        die("503 Error - Could not access the users table");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Learning MySQL</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
</head>

<body>
  <div class="container">
    <div class="page-header">
      <h1>Learning MySQL</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-2">
            <table class="table table-bordered table-striped">
                <tr><th>Name</th><th>Email Address</th></tr>
                <?php
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>{$row['name']}</td><td>{$row['email']}</td></tr>\n";
                    }
                ?>
            </table>
        </div>
    </div>
  </div>
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
