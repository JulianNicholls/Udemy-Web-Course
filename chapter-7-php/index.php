<!DOCTYPE html>
<html>
<head>
    <title>Learning PHP</title>
</head>
<style>
body {
    font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
}
</style>
<body>
    <h1>Learning PHP</h1>

<?php
    $test = "I'm a variable.";
    $test2 = "So am I.";
    $str = "$test $test2";
    $name = "Julian";
    $varname = 'name';

    $array = array('Item 1', 'Item 2', 'Item 3');

    $array2 = array(1 => 'Item 4', 2 => 'Item 5', 3 => 'Item 6');
//    $array3 = ['one' => 'Item 7', 'two' => 'Item 8', 'three' => 'Item 9']; // PHP 5.4+

    echo "PHP Version: " . phpversion() . '<br />';

    echo $test . ' ' . $test2 . '<br />';
    echo $str . '<br />';
    echo $name . '<br />';
    echo $$varname . '<br />';
?>
    <pre>
<?php
    print_r($array);        // Clearer
    print_r($array2);

    var_dump($array);       // More explicit about types
    var_dump($array2);

    $array[] = "Final";
    print_r($array);

    unset($array[1]);
    print_r($array);

    echo '<br />';

    foreach($array as $item) {
        echo $item . '<br />';
    }

    echo '<br />';

    foreach($array2 as $key => $value) {
        echo "$key: $value<br />";
    }
?>
    </pre>
</body>
</html>
