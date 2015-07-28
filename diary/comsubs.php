<?php
function db_connect()
{
    global $conn;

    $conn = new mysqli('localhost', 'cl50-julian', 'julian', 'cl50-julian');

    if($conn->connect_error) {
        die("503 Error - Cannot connect to database.");
    }
}

function db_load_diary()
{
    global $conn;

    $query = "SELECT `diary` FROM `users` WHERE id=" . $_SESSION['id'];

    if(($result = $conn->query($query)) !== FALSE) {
        $row = $result->fetch_assoc();
    }
    else {
        return '';
    }

    return $row['diary'];
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
