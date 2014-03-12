<?php
/* This file coonect to database */
$mysql_hostname = "localhost";
$mysql_user = "ankur";
$mysql_password = "ankur";
$mysql_database = "yp_eagerbit";
$prefix = "";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $bd) or die("Could not select database");

mysql_query("SET character_set_client=utf8", $bd);
mysql_query("SET character_set_connection=utf8", $bd);

?>
