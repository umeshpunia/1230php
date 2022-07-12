<?php

session_start();
date_default_timezone_set("Asia/Calcutta");

define("HOSTNAME","localhost");
define("USERNAME","root");
define("PASSWORD","");
define("DBNAME","1230");

$conn=mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME);

?>