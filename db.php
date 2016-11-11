<?php
class DB {
  // initial connection
  public static $dbName = 'bee';
  public static $user = 'root';
  public static $password = 'root';
  public static $host = 'localhost';
  public static $port = 3306; //hhvm complains if this is null
  public static $encoding = 'room1';
  
  // internal
  public $internal_mysql = null;
  public $server_info = null;
  public $id = 1;
  public $curdate = " ";
  public $curtime = " ";
  public $status = 10,1;
  ?>
