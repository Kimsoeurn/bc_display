<?php
require_once( "phpconfig.php" );
require_once( "time1.php" );
require_once("core.php");

$strSQL1 = "SELECT * from table_detail  ";
$result1 = mysqli_query($GLOBALS['db'], $strSQL1);
$rs11 = mysqli_num_rows($result1);
if (empty($rs11)) {
    header("Location:add_table.php");
} else {
    $b = time();
    $date2 = date("Y-m-d", $b);
    $strSQL = mysqli_query($GLOBALS['db'], "SELECT * FROM table_detail where status ='1' ");
    $rs = mysqli_num_rows($strSQL);
    if (empty($rs)) {
        $strSQL = "SELECT * FROM table_config order by stamp  ";
        $rs = sql_query($strSQL);
        $table = $rs['table_name'];
        $bet_max = $rs['bet_max'];
        $shoe = $rs['shoe_no'];
        $bet_min = $rs['bet_min'];
        $tie_max = $rs['tie_max'];
        $tie_min = $rs['tie_min'];
        $pair_max = $rs['pair_max'];
        $pair_min = $rs['pair_min'];
        $strSQL = "INSERT INTO 
                table_detail (table_no,shoe_no,bet_max,bet_min,tie_max,tie_min,pair_max,pair_min,round_date,status) 
                VALUES ('$table','1','$bet_max','$bet_min','$tie_max','$tie_min','$pair_max','$pair_min','$date2','1')";
        mysqli_query($GLOBALS['db'], $strSQL) or die ("Can not insert data") . mysqli_error();
        header("Location:test.php?table_num=$table&bet_max=$bet_max&shoe=1");
        exit();
    } else {
        $strSQL = "SELECT * FROM table_detail where status ='1'  ";
        $rs = sql_query($strSQL);
        $table = $rs['table_no'];
        $bet_max = $rs['bet_max'];
        $shoe = $rs['shoe_no'];
        header("Location:test.php?table_num=$table&bet_max=$bet_max&shoe=$shoe");
        exit();
    }

}