<?php
    $location = str_replace(' ', '-', $_GET['location']);

    $url = "http://www.weather-forecast.com/locations/$location/forecasts/latest";
    if(($raw = file_get_contents($url)) == FALSE) {
        echo "";
    }
    else {
        preg_match('/<span class="phrase">\s*([^<]*)<\/span>/', $raw, $matches);

        // echo str_replace('&deg;', )
        echo $matches[1];
    }
