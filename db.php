<?php
# Fill our vars and run on cli
# $ php -f db-connect-test.php
$dbname = 'bee';
$dbuser = 'root';
$dbpass = 'root';
$dbhost = 'localhost';
$connect = mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
mysql_select_db($dbname) or die("Could not open the db '$dbname'");




