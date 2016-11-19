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
}




?>
