<?php
    session_start();

    include 'twitteroauth/autoload.php';

    use Abraham\TwitterOAuth\TwitterOAuth;

    $API_KEY        = 'gv5wCstuL8ye7C8bUzxJ9VlZT';
    $API_SECRET     = 'NiDC9F8nrMfsBMQrokNnZ0nHIWVD047tn8pSl3eMEdKRwYwmxD';

    $ACCESS_TOKEN   = '166715448-by4unI1ap8ShBT0PuJ5mRhY5Enw2SYJ4vLd4Jadh';
    $ACCESS_SECRET  = '24ic8H5XEznoMQLAfW9GhDnFyeSg2cDJGI4RQen2VBBVL';

    $connection = new TwitterOAuth($API_KEY, $API_SECRET, $ACCESS_TOKEN, $ACCESS_SECRET);

    $tweets = $connection->get(
        'statuses/user_timeline',
        array('screen_name' => 'ReallyBigShoeUK', 'count' => '10')
    );

    $mentions = $connection->get(
        'statuses/mentions_timeline',
        array('count' => '10')
    );

    // $new_tweet = $connection->post(
    //     'statuses/update', array('status' => 'Testing Twitter posting from a web app')
    // )
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Twitter API</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
</head>

<style>
</style>
<body>
  <div class="container">
    <div class="page-header">
      <h1>Twitter API</h1>
    </div>

    <div class="row">
      <div class="col-sm-6">
        <h2>Tweets</h2>
        <?php foreach($tweets as $tweet) :
          echo "<p>{$tweet->text} - Favourited {$tweet->favorite_count} times.</p>";
        endforeach; ?>
      </div>
      <div class="col-sm-6">
        <h2>Mentions</h2>
        <?php foreach($mentions as $mention) :
          echo "<p>{$mention->created_at}: {$mention->text} by @{$mention->user->screen_name}.</p>";
        endforeach; ?>
      </div>
    </div>

    <?php echo '<pre>' . print_r($mentions, true) . '</pre>'; ?>
    <?php echo '<pre>' . print_r($tweets, true) . '</pre>'; ?>
  </div>

  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <script>
$(function() {
});
  </script>
</body>
</html>
