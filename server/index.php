<?php 

include('KolaczForecast.php');

echo '<pre>';
var_dump($kolaczForecast = new kolaczForecast($argv[1]));
echo '</pre>';

?>
