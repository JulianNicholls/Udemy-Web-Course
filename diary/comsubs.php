<?php
function db_connect()
{
    global $conn;

    $conn = new mysqli('localhost', 'cl50-julian', 'julian', 'cl50-julian');

    if($conn->connect_error) {
        die("503 Error - Cannot connect to database.");
    }
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
