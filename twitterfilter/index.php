<?php
    session_start();

    require_once 'twitteroauth/autoload.php';
    require_once 'humantime.php';

    use Abraham\TwitterOAuth\TwitterOAuth;

    $API_KEY        = 'gv5wCstuL8ye7C8bUzxJ9VlZT';
    $API_SECRET     = 'NiDC9F8nrMfsBMQrokNnZ0nHIWVD047tn8pSl3eMEdKRwYwmxD';

    $ACCESS_TOKEN   = '166715448-by4unI1ap8ShBT0PuJ5mRhY5Enw2SYJ4vLd4Jadh';
    $ACCESS_SECRET  = '24ic8H5XEznoMQLAfW9GhDnFyeSg2cDJGI4RQen2VBBVL';

    $connection = new TwitterOAuth($API_KEY, $API_SECRET, $ACCESS_TOKEN, $ACCESS_SECRET);

    $tweets = $connection->get(
        'statuses/home_timeline',
        array('count' => '200')
    );

function make_links($text)
{
    return preg_replace('/(https?:\/\/)(\S+)/', '<a href="$1$2" target="_blank">$2</a>', $text);
}
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
.tweet-text h5 {
  margin-bottom: 2px;
  margin-top: 2px;
}

.tweet {
  padding: 3px;
  border-bottom: 1px solid #e8e8e8;
}

</style>
<body>
  <div class="container">
    <div class="page-header">
      <h1>Twitter API <small>Filtered by Favouritism</small></h1>
    </div>

    <?php foreach($tweets as $tweet) :
        if($tweet->favorite_count == 0)
          continue;

        $user   = $tweet->user;
        $sname  = $user->screen_name;
        $url    = "https://twitter.com/$sname" ?>

    <div class="row tweet">
      <div class="col-sm-1 avatar">
        <a href="<?php echo $url; ?>" target="_blank">
          <img src="<?php echo $user->profile_image_url; ?>" alt="Avatar" />
        </a>
      </div>
      <div class="col-sm-9 tweet-text">
          <h5><?php echo $user->name; ?>
            <small>
              <a href="<?php echo $url; ?>" target="_blank">
                <?php echo '@' . $sname; ?>
              </a>
            </small>
          </h5>
          <?php echo make_links($tweet->text); ?>
      </div>
      <div class="col-sm-2 tweet-time">
        <?php echo human_time($tweet->created_at); ?>
      </div>
    </div>
    <?php endforeach; ?>

    <?php // echo '<pre>' . print_r($tweets, true) . '</pre>'; ?>
  </div>

  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <script>
$(function() {
});
  </script>
</body>
</html>
