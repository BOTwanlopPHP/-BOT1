<?php
class DB {
  // initial connection
  public static $dbName = 'bee';
  public static $user = 'root';
  public static $password = 'root';
  public static $host = 'localhost';
  public static $port = 80; //hhvm complains if this is null
  public static $encoding = 'latin1';
?>
