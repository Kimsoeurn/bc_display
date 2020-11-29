<?php
require_once ("phpconfig.php");
require_once ("core.php");

$sql88 = "select bet1  from   table_sc1   ";
$rs88 = sql_query($sql88);
$bet = "";
if (!empty($rs88['bet1']) or $rs88['bet1'] != "") {
    $a1 = explode(",", $rs88['bet1']);
    $b1 = count($a1);
//    dd($b1);
    //$re = substr($a1[0],3,1);
    $cut_tie = "";
    for ($e = 0; $e < $b1; $e++) {

        if (empty($cut_tie)) {
            $cut_tie = substr($a1[$e], 3, 3);
        } else {
            $cut_tie = $cut_tie . "," . substr($a1[$e], 3, 3);
        }
    }
    $a2 = explode(",", $cut_tie);//�Ѵ����ͧ�����͡
    $b2 = count($a2);//�Ѻ�ӹǹ������

    for ($e2 = 0; $e2 < $b2; $e2++) {

        if (substr($a2[$e2], 0, 1) == 3 and substr($a2[$e2 - 1], 0, 1) != 3) {
            $t_1 = substr($a2[$e2 - 1], 0, 1);
        } else {
            $t_1 = 0;
        }

        if ($e2 == 0) {
            $j = 1;
            $k = 1;
        } else {
            if (substr($a2[$e2], 0, 1) == substr($a2[$e2 - 1], 0, 1) or substr($a2[$e2], 0, 1) == 3 or substr($a2[$e2], 0, 1) == $t_1) {
                $j = $j;
                $k = $k + 1;
            } else {
                $j = $j + 1;
                $k = 1;
            }
        }

        if ($j == 1 and $k == 1) {
            $bet = $j . "-" . $k . "-" . $a2[$e2];
        } else {
            $bet = $bet . "," . $j . "-" . $k . "-" . $a2[$e2];
        }

    }
}
$a4 = explode(",", $bet);
$b4 = count($a4);
$idd = 1;
$bb1 = "";
for ($e4 = 0; $e4 < $b4; $e4++) {
    $bb1 = $bb1 . "," . $a4[$e4];
    $co1 = Check_no_bet($a4[$e4], 1);
    $co2 = Check_no_bet($a4[$e4], 2);
    $co3 = Check_no_bet($a4[$e4], 3);

//    $strSQL4 = "update table_road3 set co='$co1',ro='$co2',status='$co3'   where id ='$idd' ";
//    mysqli_query($GLOBALS['db'], $strSQL4) or die ("Can not insert data") . mysqli_error();

    $idd++;

    ////////////////////////////////////////////////////////////////////
}


////////////////////////////////////////////////////////////////////////////////////////////
$str = "SELECT * from table_road3 where co !='0'  order by id";
$result = mysqli_query($GLOBALS['db'], $str);
$i = 0;
$v = 0;
while ($rs = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    if ($i == 0) {
        $data_bet = substr($rs['status'], 0, 1);
    } else {
        $data_bet = $data_bet . "," . substr($rs['status'], 0, 1);
    }
    $i++;
}

dd($data_bet);
/////////////////////////////////////////////////////////////////////////////////////
//echo $data_bet;
$a2 = explode(",", $data_bet);//�Ѵ����ͧ�����͡
$b2 = count($a2);//�Ѻ�ӹǹ������

$num = 1;
$coo1 = 1;
for ($e2 = 0; $e2 < $b2; $e2++) {

    $ck_bet1 = $a2[$e2];
    $ck_bet2 = $a2[$e2 - 1];
    $ck_bet3 = $a2[$e2 - 2];

    if ($ck_bet1 == 3) {
        $ck_bet4++;
        if ($a2[$e2 - $ck_bet4] == '') {
            $t_1 = $ck_bet1;
        } else {
            $t_1 = $a2[$e2 - $ck_bet4];
        }
    } else {
        if ($ck_bet2 == 3) {
            $ck_bet4++;
            if ($a2[$e2 - $ck_bet4] == '') {
                $t_1 = $ck_bet1;
            } else {
                $t_1 = $a2[$e2 - $ck_bet4];
            }
            $ck_bet4 = 0;
        } else {
            $ck_bet4 = 0;
            $t_1 = 0;
        }
    }

    // echo $ck_bet1."--".$t_1."<br>";
    if ($e2 <= 0) {
        $rm = 1;
        $re = " case1 " . $t_1 . "--" . $ck_bet4;
        $coo1 = $coo1;
    } else {

        if ($ck_bet1 == $ck_bet2 or $ck_bet1 == 3 or $ck_bet1 == $t_1) {
            $rm++;
            $v++;
            if ($v > 5) {
                $kk++;
                $rm = $rm + 6 - 1;
            } else {
                $kk = 0;
            }
            $rm = $rm;
            $re = " case2 " . $t_1 . "--" . $ck_bet4;
            $coo1 = $coo1;

        } else {
            $v = 0;
            $rm = (6 * ($coo1) + 1);
            $coo1++;
            $rm = $rm;
            $re = " case3 " . $t_1 . "--" . $ck_bet4;

        }


    }
    $num++;
    echo $ck_bet1 . "--" . $t_1 . "<br>";
    $j = $e2 + 1;
    $strSQL4 = "update table_road3 set  rm='$rm'   where id ='$j' and co !='0' ";
    mysqli_query($GLOBALS['db'], $strSQL4) or die ("Can not insert data") . mysqli_error();
    $str8 = "SELECT rm from table_road3 where rm='$rm' and co !='0' ";
    $result8 = mysqli_query($GLOBALS['db'], $str8);
    $nr = mysqli_num_rows($result8);
    if ($nr > 1) {
        $rm = $rm + 5;
        $strSQL4 = "update table_road3 set  rm='$rm'   where id ='$j' and co !='0' ";
        mysqli_query($GLOBALS['db'], $strSQL4) or die ("Can not insert data") . mysqli_error();

    }

}
$str8 = "SELECT max(rm) as rmm from table_road3   ";
$result8 = mysqli_query($str8);
$rs = mysqli_fetch_array($result8, MYSQLI_ASSOC);
$rmm = $rs['rmm'];
$strSQL4 = "update  table_detail set  mk='$rmm'   where status='1' ";
mysqli_query($GLOBALS['db'], $strSQL4) or die ("Can not insert data") . mysqli_error();