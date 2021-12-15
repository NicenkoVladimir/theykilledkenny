<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'theykilledkenny';
$site_name = 'theykilledkenny';

try {
    $mysqli = new mysqli($host, $user, $pass);

} catch (\Exception $e) {
    echo $e->getMessage(), PHP_EOL;
}
if ($mysqli->select_db($db_name) === false) {
    echo '<h2>Seems like DataBase for this website was not created. To create it click this link:
        <a href="php/tb_create">Create DataBase "THEY Killed Kenny" and Tables</a> </h2>    ';
}
else {
    $link = mysqli_connect($host, $user, $pass, $db_name);
}








?>






