<?php
require_once ("core.php");

$sql = "SELECT * FROM table_detail";
$result = sql_query($sql);
var_dump($result);
close_db();
$sql = "SELECT * FROM table_detail";
$result = sql_query($sql);
var_dump($result);