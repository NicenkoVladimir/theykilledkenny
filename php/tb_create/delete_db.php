<?php 

require_once '../config.php';

if($link->connect_errno ) {
    printf("Connect failed: %s<br />", $link->connect_error);
    exit();
 }
 printf('Connected successfully.<br />');

 if ($link->query("Drop DATABASE theykilledkenny")) {
    printf("Database THEYKILLEDKENNY dropped successfully.<br />");
 }
 if ($link->errno) {
    printf("Could not drop database: %s<br />", $link->error);
 }
 $link->close();
 header('Location:/?page=logout');
?>
