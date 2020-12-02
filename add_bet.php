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
        $win2 == "101" or
        $win2 == "102" or
        $win2 == "103" or
        $win2 == "104" or
        $win2 == "105" or
        $win2 == "106" or
        $win2 == "107" or
        $win2 == "108" or
        $win2 == "109" or
        $win2 == "201" or
        $win2 == "202" or
        $win2 == "203" or
        $win2 == "204" or
        $win2 == "205" or
        $win2 == "206" or
        $win2 == "207" or
        $win2 == "208" or
        $win2 == "209" or
        //$win2 == "300" or
        //$win2 == "301" or
        //$win2 == "302" or
        //$win2 == "303" or
        //$win2 == "304" or
        //$win2 == "305" or
        //$win2 == "306" or
        //$win2 == "307" or
        //$win2 == "308" or
        //$win2 == "309" or
        //$win2 == "310" or
        $win2 == "30" or
        $win2 == "31" or
        $win2 == "32" or
        $win2 == "33" or
        $win2 == "111" or
        $win2 == "112" or
        $win2 == "113" or
        $win2 == "114" or
        $win2 == "115" or
        $win2 == "116" or
        $win2 == "117" or
        $win2 == "118" or
        $win2 == "119" or
        $win2 == "211" or
        $win2 == "212" or
        $win2 == "213" or
        $win2 == "214" or
        $win2 == "215" or
        $win2 == "216" or
        $win2 == "217" or
        $win2 == "218" or
        $win2 == "219" or
        //$win2 == "311" or
        //$win2 == "312" or
        //$win2 == "313" or
        //$win2 == "314" or
        //$win2 == "315" or
        //$win2 == "316" or
        //$win2 == "317" or
        //$win2 == "318" or
        //$win2 == "319" or
        //$win2 == "320" or
        $win2 == "121" or
        $win2 == "122" or
        $win2 == "123" or
        $win2 == "124" or
        $win2 == "125" or
        $win2 == "126" or
        $win2 == "127" or
        $win2 == "128" or
        $win2 == "129" or
        $win2 == "221" or
        $win2 == "222" or
        $win2 == "223" or
        $win2 == "224" or
        $win2 == "225" or
        $win2 == "226" or
        $win2 == "227" or
        $win2 == "228" or
        $win2 == "229" or
        //$win2 == "321" or
        //$win2 == "322" or
        //$win2 == "323" or
        //$win2 == "324" or
        //$win2 == "325" or
        //$win2 == "326" or
        //$win2 == "327" or
        //$win2 == "328" or
        //$win2 == "329" or
        //$win2 == "330" or
        $win2 == "131" or
        $win2 == "132" or
        $win2 == "133" or
        $win2 == "134" or
        $win2 == "135" or
        $win2 == "136" or
        $win2 == "137" or
        $win2 == "138" or
        $win2 == "139" or
        $win2 == "231" or
        $win2 == "232" or
        $win2 == "233" or
        $win2 == "234" or
        $win2 == "235" or
        $win2 == "236" or
        $win2 == "237" or
        $win2 == "238" or
        $win2 == "239"
        //$win2 == "331" or
        //$win2 == "332" or
        //$win2 == "333" or
        //$win2 == "334" or
        //$win2 == "335" or
        //$win2 == "336" or
        //$win2 == "337" or
        //$win2 == "338" or
        //$win2 == "339"
    ) {
        checkResult($win2, $table_num, $bet_max, $shoe);
        header('Content-Type: application/json');
        echo json_encode([
            "error" => false,
            "message" => 'Please enter correct number',
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
        "error" => false,
        "message" => 'Please enter correct number',
        'data' => "Here"
    ]);
    exit();
}
?>