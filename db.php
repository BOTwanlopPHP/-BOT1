<?php

 
class DB {
     
    public $connect;
    public $result;
    public $recode = array();
     
    public $type      = 'mysql';
    public $server    = 'localhost';
    public $username  = 'root';
    public $password  = 'root';
    public $dbname    = 'bee';
    public $port      = 3306;
    public $charset   = 'utf8';
     
    public function __construct() {
        $this->connect  = mysql_connect( $this->server, $this->username, $this->password )
            or die( "Error Connect to Database" );
        mysql_select_db( $this->dbname, $this->connect ) or die( "Error Connect to Table" );
        mysql_query( "SET NAMES UTF8" );
    }
     
    // ประมวลผลคำสั่ง SQL
    public function query($txtSQL = ''){
        if(!empty($txtSQL)){
            $this->result = mysql_query( $txtSQL , $this->connect );
            return $this;
        }else{
            return false;
        }
    }
    public function getStatus(){
        if(!empty($this->result)){
            return true;
        }else{
            return false;
        }
    }
     
    /* ==========================================================
     * ดึงข้อมูล SELECT
     ============================================================ */
     
    // รายการเดียว
    public function find(){
        if(!empty($this->result)){
            $this->recode   = mysql_fetch_object( $this->result );
            return $this->recode;
        }else{
            return false;
        }
    }
    // รายการทั้งหมด
    public function findAll(){
        if(!empty($this->result)){
            $record = array();
            while ($row = mysql_fetch_array( $this->result , MYSQL_ASSOC)) {
                $record[] = (object) $row;
            }
            return $record;
        }else{
            return false;
        }
    }
    
    // จำนวน Record
    public function count(){
        if(!empty($this->result)){
            return mysql_num_rows( $this->result );
        }else{
            return false;
        }
    }
     
}
?>
