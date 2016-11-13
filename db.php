<?php
require_once('db.php');

try {
    $mysql = new MySQL('host', 'root', 'root', 'bee');
} catch (Exception $e) {
    error($e->getMessage());
}
?>
