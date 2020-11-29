<?php
function sql_query($sql) {
    $result = mysqli_query($GLOBALS['db'], $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    return $row;
}