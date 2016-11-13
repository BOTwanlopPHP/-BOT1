<?php
require_once('db.php');

try {
    $mysql = new MySQL('host', 'root', 'root');
    $mysql->use_db($bee);
} 


