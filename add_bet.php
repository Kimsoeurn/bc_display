<?php
require_once "phpconfig.php";
require_once "time1.php";
require_once "core.php";
//$win2 = isset($_POST['win2']) ? $_POST['win2'] : "";

$win2 = $_POST['win2'] ?? "";
$table_num = $_POST['table_num'] ?? "";
$bet_max = $_POST['bet_max'] ?? "";
$shoe = $_POST['shoe'] ?? "";
$sql1  = "select * from table_detail where table_no = '$table_num' and bet_max = '$bet_max' and status = '1' and shoe_no ='$shoe' ";
$rs1   = sql_query($sql1);
$sum_b = $rs1['sum_b'];
$sum_p = $rs1['sum_p'];
$sum_t = $rs1['sum_t'];
$sum_pb = $rs1['sum_pb'];
$sum_pp = $rs1['sum_pp'];
$bet_max =$rs1['bet_max'];
$bet_min =$rs1['bet_min'];
$tie_max =$rs1['tie_max'];
$tie_min =$rs1['tie_min'];
$pair_max =$rs1['pair_max'];
$pair_min =$rs1['pair_min'];

// Select table setting

if (!empty($win2)) {
    // Check menu
    if ($win2 == '999') {
        header("Location:select_table.php");
        exit();
    } elseif ($win2 == "/") {
        header("Location:close.php");
        exit();
        // New show
    } elseif ($win2 == '*') {
        // Call new shoe function
        newShoe($table_num, $shoe, $bet_max, $bet_min, $tie_max, $tie_min, $pair_max, $pair_min);
    } elseif ($win2 == '-') {
        undoResult($table_num, $bet_max, $shoe);
        header('Content-Type: application/json');
        echo json_encode([
            "error" => false,
            "message" => 'Undo successfully'
        ]);
        exit();
    } elseif (
        $win2 == '101' ||
        $win2 == '102' ||
        $win2 == '301' ||
        $win2 == '201' ||
        $win2 == '202'
    ) {
        checkResult($win2, $table_num, $bet_max, $shoe);
        header('Content-Type: application/json');
        echo json_encode([
            "error" => false,
            "data" => "Check result " . $win2
        ]);
        exit();
//        header("Location:test.php?table_num=$table_num&bet_max=$bet_max&shoe=$shoe");
//        exit();
    } else {
        header('Content-Type: application/json');
        echo json_encode([
            "error" => true,
            "message" => 'Please enter correct number'
        ]);
        exit();
    }

} else {
//    header("Location:test.php?table_num=$table_num&bet_max=$bet_max&shoe=$shoe");
//    exit();
    header('Content-Type: application/json');
    echo json_encode([
        "error" => true,
        "message" => 'Please enter correct number',
    ]);
    exit();
}
?>