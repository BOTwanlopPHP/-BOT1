<?php
error_reporting(0);
function runSQL($rsql) {
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname   = "tutorialdev_demo1";
    $connect = mysql_connect($hostname,$username,$password) or die ("Error: could not connect to database");
    $db = mysql_select_db($dbname);
    mysql_query("set character set utf8");     
    $result = mysql_query($rsql) or die ('Error: could not query data' . $rsql); 
    return $result;
    mysql_close($connect);
}
 
function countRec($fname,$tname,$where) {
    $sql = "SELECT count($fname) FROM $tname $where";
    $result = runSQL($sql);
    while ($row = mysql_fetch_array($result)) {
        return $row[0];
    }
}
?>
