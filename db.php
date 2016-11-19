<html>
 <head>
  <title>ThaiCreate.Com PHP & MySQL tutorial</title>
 </head>
 <?php
 $objConnect = mysql_connect("localhost","root","root");
 if($objConnect)
 {
   echo "database Connected.";
 }
 else
 {
  echo "database Connect Failed.";
  mysql_close($objConnect);
  ?>
 </body>
</html>

 
