<?php
session_start();
//config.php

 //$conn = mysqli_connect("localhost","root","","qrcode") or die ("Unable to connection");
//$conn = mysqli_connect("sql10.freemysqlhosting.net","sql10373340","PqGpFrgDqb","sql10373340") or die ("Unable to connection");

$db_host        = 'bm7ucbmwgw0una00mir3-mysql.services.clever-cloud.com';
$db_user        = 'ulypqownzwbd3k2u';
$db_pass        = 'lZE8T8sHbIZG4PCDWiaA';
$db_database    = 'bm7ucbmwgw0una00mir3'; 
$db_port        = '3306';

$conn = mysqli_connect($db_host,$db_user,$db_pass,$db_database,$db_port)or die ("Unable to connection");

?>