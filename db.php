<?php
require_once('MySQL.php');

try {
    $mysql = new MySQL('host', 'root', 'root', 'bee');
} catch (Exception $e) {
    error($e->getMessage());
}
?>
