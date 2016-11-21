<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_testbot = "localhost";
$database_testbot = "bee";
$username_testbot = "root";
$password_testbot = "root";
$testbot = mysql_pconnect($hostname_testbot, $username_testbot, $password_testbot) or trigger_error(mysql_error(),E_USER_ERROR); 
?>