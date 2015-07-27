<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Weather Window</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  <link rel="stylesheet" type="text/css" href="weather.css">
</head>

<body>
  <div class="container">
    <div class="page-header">
      <h1>Weather Window <small>Where are you going today?</small></h1>
    </div>

    <div class="row">
      <div class="col-sm-8 col-sm-offset-2 well">
        <p class="lead">This will predict the weather for the chosen place by querying a
        weather forecasting site.</p>
        <p class="text-center">Enter the location below to get a weather forecast,
        e.g. London, Beijing.</p></p>
        <form action="weather.php" method="get" accept-charset="utf-8">
          <div class="form-group">
            <input type="text" name="location" id="location" class="form-control" placeholder="Place" />
          </div>

          <div class="form-group">
            <button id="forecast" class="btn btn-primary btn-lg">Forecast</button>
          </div>
        </form>
      </div>

      <div id="weather" class="col-sm-10 col-sm-offset-1 well">
      </div>
    </div>

    <div id="fail" class="alert alert-danger alert-dismissable" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <span id="error">No weather information was found for <strong>x</strong></span>
    </div>
  </div>

  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="weather.js"></script>
</body>
</html>
