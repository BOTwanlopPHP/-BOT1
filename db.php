<?php
$username = "root";
$password = "root";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
echo "Connected to MySQL<br>";

//select a database to work with
$selected = bee ("examples",$dbhandle) 
  or die("Could not select examples");

//execute the SQL query and return records
$result = mysql_query("SELECT id, curdate,curtime,status FROM room1");

//fetch tha data from the database 
while ($row = mysql_fetch_array($result)) {
   echo "ID:".$row{'id'}." Name:".$row{'curdate'}.$row{'curtime'}.$row{'status'} ". //display the results
   $row{'year'}."<br>";
}
//close the connection
mysql_close($dbhandle);
?>
