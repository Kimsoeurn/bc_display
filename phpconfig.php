<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$conn;
$ServerName = "localhost";
$UserName = "root";
$UserPassword = "root";
$DataBaseName = "scroll";
$db = "scroll";
$GLOBALS['db'] = mysqli_connect($ServerName, $UserName, $UserPassword);
//		 mysql_query("SET NAMES 'tis620' ");
if (!$GLOBALS['db']) die("Failed connect to database");

mysqli_select_db($GLOBALS['db'], $DataBaseName)
or die ("Failed select database");

function Conn2DB()
{
    global $conn;
    global $ServerName;
    global $UserName;
    global $UserPassword;
    global $DataBaseName;
    $conn = mysqli_connect($ServerName, $UserName, $UserPassword);
//		 mysql_query("SET NAMES 'tis620' ");
    if (!$conn) die("Failed connect to database");

    mysqli_select_db($conn, $DataBaseName) or die ("Failed select database");
}

function CloseDB()
{
    global $conn;
    mysqli_close($conn);
}


function ChkID()
{
    global $conn;
    $strSQL = mysqli_query($conn, "SELECT id FROM asset_detail ");
    $rs = mysqli_num_rows($strSQL);
    return $rs + 1;

}

function Chk_table($table_name, $bet_max)
{
    $strSQL = "SELECT * FROM  table_config  WHERE table_name = '$table_name' and bet_max = '$bet_max' ";
    $result1 = mysqli_query($GLOBALS['db'], $strSQL);
    $num = mysqli_num_rows($result1);
    if (!empty($num))
        return "yes";
    else {
        return "no";
    }
}

function count_words($mystr)
{
    $a = explode(" ", $mystr);
    for ($i = 0; $i < count($a); $i++) {
    }
    return $a[1];
}

function Word2($wor)
{
    for ($i = 0; $i < $wor; $i++) {
        if (ereg("[/]", $a[$i])) {
            if ($a[$i] == "/")
                return true;
        }
    }
}

function Word3($mystr)
{
    for ($i = 0; $i < $mystr; $i++) {
        if (ereg("[A-Z.a-z.0-9]", $a[$i])) {
            return $a[0];
        }
    }
}

function Pic($mystr)
{
    $a = explode(" ", $mystr);
    for ($i = 0; $i < count($a); $i++) {
    }
    if (empty($a[0]))
        return $a[1];
    else
        return $a[0];
}

function check($mystr)
{
    $a = explode(",", $mystr);
    for ($i = 0; $i < count($a); $i++) {
    }
    if (!empty($a[0]))
        return $a[2] . $a[1] . $a[0];

}

function sentence_case($string)
{
    $sentences = preg_split('/([.?!]+)/', $string, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
    $new_string = '';
    foreach ($sentences as $key => $sentence) {
        $new_string .= ($key & 1) == 0 ?
            ucfirst(strtolower(trim($sentence))) :
            $sentence . ' ';
    }
    return trim($new_string);
}

function getAge($year, $month, $day)
{
    $then = mktime(1, 1, 1, $month, $day, $year);
    return (floor((time() - $then) / 31556926));
}

function DateDiff($strDate1, $strDate2)
{
    $total_date = (strtotime($strDate2) - strtotime($strDate1)) / (60 * 60 * 24);  // 1 day = 60*60*24
    $year = floor($total_date / 365);
    $month = floor(($total_date - ($year * 365)) / 30);
    $day = $total_date - ($year * 365) - ($month * 30);
    $x1 = number_format($year) . " Y  " . $month . " M  " . $day . " D";
    $x2 = $month . " M  " . $day . " D";
    $x3 = $day . " D";
    if ($year > 0 and $year < 39) {
        return $x1;
    } else {
        if ($month > 0) {
            return $x2;
        } else {
            if ($day > 0) {
                return $x3;
            } else {
                return "--";
            }
        }
    }
}

function Chk_bet($t1, $table_num, $bet_max, $win2, $shoe)
{

    $sql88 = "select * from table_road3 where co  !='0'  and rm ='$t1' order by id  ";
    $result88 = mysqli_query($GLOBALS['db'], $sql88);
    $rs88 = sql_query($sql88);
    $re = !empty($rs88) ? $rs88['status'] : "";
    //PLAYER
    if ($re == "101") return "images/BigEyeRoad/P01.png";
    if ($re == "102") return "images/BigEyeRoad/P02.png";
    if ($re == "103") return "images/BigEyeRoad/P03.png";
    if ($re == "104") return "images/BigEyeRoad/P04.png";
    if ($re == "105") return "images/BigEyeRoad/P05.png";
    if ($re == "106") return "images/BigEyeRoad/P06.png";
    if ($re == "107") return "images/BigEyeRoad/P07.png";
    if ($re == "108") return "images/BigEyeRoad/P08.png";
    if ($re == "109") return "images/BigEyeRoad/P09.png";
    if ($re == "111") return "images/BigEyeRoad/P21.png";
    if ($re == "112") return "images/BigEyeRoad/P22.png";
    if ($re == "113") return "images/BigEyeRoad/P23.png";
    if ($re == "114") return "images/BigEyeRoad/P24.png";
    if ($re == "115") return "images/BigEyeRoad/P25.png";
    if ($re == "116") return "images/BigEyeRoad/P26.png";
    if ($re == "117") return "images/BigEyeRoad/P27.png";
    if ($re == "118") return "images/BigEyeRoad/P28.png";
    if ($re == "119") return "images/BigEyeRoad/P29.png";
    if ($re == "121") return "images/BigEyeRoad/P11.png";
    if ($re == "122") return "images/BigEyeRoad/P12.png";
    if ($re == "123") return "images/BigEyeRoad/P13.png";
    if ($re == "124") return "images/BigEyeRoad/P14.png";
    if ($re == "125") return "images/BigEyeRoad/P15.png";
    if ($re == "126") return "images/BigEyeRoad/P16.png";
    if ($re == "127") return "images/BigEyeRoad/P17.png";
    if ($re == "128") return "images/BigEyeRoad/P18.png";
    if ($re == "129") return "images/BigEyeRoad/P19.png";
    if ($re == "131") return "images/BigEyeRoad/P31.png";
    if ($re == "132") return "images/BigEyeRoad/P32.png";
    if ($re == "133") return "images/BigEyeRoad/P33.png";
    if ($re == "134") return "images/BigEyeRoad/P34.png";
    if ($re == "135") return "images/BigEyeRoad/P35.png";
    if ($re == "136") return "images/BigEyeRoad/P36.png";
    if ($re == "137") return "images/BigEyeRoad/P37.png";
    if ($re == "138") return "images/BigEyeRoad/P38.png";
    if ($re == "139") return "images/BigEyeRoad/P39.png";
    //BANKER
    if ($re == "201") return "images/BigEyeRoad/B01.png";
    if ($re == "202") return "images/BigEyeRoad/B02.png";
    if ($re == "203") return "images/BigEyeRoad/B03.png";
    if ($re == "204") return "images/BigEyeRoad/B04.png";
    if ($re == "205") return "images/BigEyeRoad/B05.png";
    if ($re == "206") return "images/BigEyeRoad/B06.png";
    if ($re == "207") return "images/BigEyeRoad/B07.png";
    if ($re == "208") return "images/BigEyeRoad/B08.png";
    if ($re == "209") return "images/BigEyeRoad/B09.png";
    if ($re == "211") return "images/BigEyeRoad/B21.png";
    if ($re == "212") return "images/BigEyeRoad/B22.png";
    if ($re == "213") return "images/BigEyeRoad/B23.png";
    if ($re == "214") return "images/BigEyeRoad/B24.png";
    if ($re == "215") return "images/BigEyeRoad/B25.png";
    if ($re == "216") return "images/BigEyeRoad/B26.png";
    if ($re == "217") return "images/BigEyeRoad/B27.png";
    if ($re == "218") return "images/BigEyeRoad/B28.png";
    if ($re == "219") return "images/BigEyeRoad/B29.png";
    if ($re == "221") return "images/BigEyeRoad/B11.png";
    if ($re == "222") return "images/BigEyeRoad/B12.png";
    if ($re == "223") return "images/BigEyeRoad/B13.png";
    if ($re == "224") return "images/BigEyeRoad/B14.png";
    if ($re == "225") return "images/BigEyeRoad/B15.png";
    if ($re == "226") return "images/BigEyeRoad/B16.png";
    if ($re == "227") return "images/BigEyeRoad/B17.png";
    if ($re == "228") return "images/BigEyeRoad/B18.png";
    if ($re == "229") return "images/BigEyeRoad/B19.png";
    if ($re == "231") return "images/BigEyeRoad/B31.png";
    if ($re == "232") return "images/BigEyeRoad/B32.png";
    if ($re == "233") return "images/BigEyeRoad/B33.png";
    if ($re == "234") return "images/BigEyeRoad/B34.png";
    if ($re == "235") return "images/BigEyeRoad/B35.png";
    if ($re == "236") return "images/BigEyeRoad/B36.png";
    if ($re == "237") return "images/BigEyeRoad/B37.png";
    if ($re == "238") return "images/BigEyeRoad/B38.png";
    if ($re == "239") return "images/BigEyeRoad/B39.png";
    // TIE
    if ($re == "301") return "images/BigEyeRoad/T01.png";
    if ($re == "302") return "images/BigEyeRoad/T02.png";
    if ($re == "303") return "images/BigEyeRoad/T03.png";
    if ($re == "304") return "images/BigEyeRoad/T04.png";
    if ($re == "305") return "images/BigEyeRoad/T05.png";
    if ($re == "306") return "images/BigEyeRoad/T06.png";
    if ($re == "307") return "images/BigEyeRoad/T07.png";
    if ($re == "308") return "images/BigEyeRoad/T08.png";
    if ($re == "309") return "images/BigEyeRoad/T09.png";
    if ($re == "300") return "images/BigEyeRoad/T00.png";
    if ($re == "310") return "images/BigEyeRoad/T20.png";
    if ($re == "311") return "images/BigEyeRoad/T21.png";
    if ($re == "312") return "images/BigEyeRoad/T22.png";
    if ($re == "313") return "images/BigEyeRoad/T23.png";
    if ($re == "314") return "images/BigEyeRoad/T24.png";
    if ($re == "315") return "images/BigEyeRoad/T25.png";
    if ($re == "316") return "images/BigEyeRoad/T26.png";
    if ($re == "317") return "images/BigEyeRoad/T27.png";
    if ($re == "318") return "images/BigEyeRoad/T28.png";
    if ($re == "319") return "images/BigEyeRoad/T29.png";
    if ($re == "320") return "images/BigEyeRoad/T10.png";
    if ($re == "321") return "images/BigEyeRoad/T11.png";
    if ($re == "322") return "images/BigEyeRoad/T12.png";
    if ($re == "323") return "images/BigEyeRoad/T13.png";
    if ($re == "324") return "images/BigEyeRoad/T14.png";
    if ($re == "325") return "images/BigEyeRoad/T15.png";
    if ($re == "326") return "images/BigEyeRoad/T16.png";
    if ($re == "327") return "images/BigEyeRoad/T17.png";
    if ($re == "328") return "images/BigEyeRoad/T18.png";
    if ($re == "329") return "images/BigEyeRoad/T19.png";
    if ($re == "331") return "images/BigEyeRoad/T31.png";
    if ($re == "332") return "images/BigEyeRoad/T32.png";
    if ($re == "333") return "images/BigEyeRoad/T33.png";
    if ($re == "334") return "images/BigEyeRoad/T34.png";
    if ($re == "335") return "images/BigEyeRoad/T35.png";
    if ($re == "336") return "images/BigEyeRoad/T36.png";
    if ($re == "337") return "images/BigEyeRoad/T37.png";
    if ($re == "338") return "images/BigEyeRoad/T38.png";
    if ($re == "339") return "images/BigEyeRoad/T39.png";
    if ($re == "330") return "images/BigEyeRoad/T30.png";
    return "images/BigEyeRoad/T.gif";
}

function Chk_bet2($t1, $table_num, $bet_max, $win2, $shoe)
{
    $sql88 = "select bet1  from table_detail where shoe_no ='$shoe' and table_no = '$table_num' and bet_max = '$bet_max' and  status = '1'   ";
    //	 $result88 = mysql_query($sql88);
    $rs88 = sql_query($sql88);
    $rs88 = !empty($rs88) ? $sql88 : "";
    if (empty($rs88['bet1']) or $rs88['bet1'] == "") {
        return "images/BigEyeRoad/T.gif";
    } else {
        $a1 = explode(",", $rs88['bet1']);
        $b1 = count($a1);//�Ѻ�ӹǹ������
        $re = substr($a1[$t1 - 1], 3, 1);
        if ($re == "1") return "images/BigEyeRoad/pp.png";
        if ($re == "2") return "images/BigEyeRoad/bb.png";
        if ($re == "3") return "images/BigEyeRoad/tt.png";
        return "images/BigEyeRoad/T.gif";
    }
}

function Chk_bet3($t1)
{
    $sql88 = "select * from  table_road  where rm= '$t1' order by id ";
    $rs88 = sql_query($sql88);
    $re1 = $rs88['status'];
    if ($re1 == "2") return "images/CockroachRoad/B.png";
    if ($re1 == "1") return "images/CockroachRoad/P.png";
    if ($re1 == "0") return "images/CockroachRoad/T.gif";
    return "images/CockroachRoad/T.gif";
}

function Chk_bet4($t1)
{
    $sql88 = "select * from  table_road1  where rm= '$t1' order by id ";
    $rs88 = sql_query($sql88);
    $re1 = $rs88['status'];
    if ($re1 == "2") {
        return "images/Bigeye/B.png";
    }
    if ($re1 == "1") {
        return "images/Bigeye/P.png";
    }
    if ($re1 == "0") {
        return "images/Bigeye/T.gif";
    } else {
        return "images/Bigeye/T.gif";
    }
}

function Chk_bet5($t1)
{
    $sql88 = "select * from  table_road2  where rm= '$t1' order by id ";
    $rs88 = sql_query($sql88);
    $re1 = $rs88['status'];
    if ($re1 == "2") {
        return "images/SmallRoad/B.png";
    }
    if ($re1 == "1") {
        return "images/SmallRoad/P.png";
    }
    if ($re1 == "0") {
        return "images/SmallRoad/T.gif";
    } else {
        return "images/SmallRoad/T.gif";
    }

}

function Chk_table_status($bet_max, $table_name, $round_date)
{
    $strSQL8 = "SELECT * FROM  table_detail  WHERE  table_no = '$table_name' and bet_max = '$bet_max' and round_date = '$round_date' and status = '1' ";
    $result8 = mysqli_query($GLOBALS['db'], $strSQL8);
    $num = mysqli_num_rows($result8);
    if ($num == "0") return "no";
    else return "yes";
}

function C_bet()
{
    $sql88 = "select  *  from table_detail where status = '1'   ";
    $rs88 = sql_query($sql88);
    $a1 = explode(",", $rs88['bet1']);//�Ѵ����ͧ�����͡
    $b1 = count($a1);//�Ѻ�ӹǹ������
    $c = 1;
    for ($i = 0; $i < $b1; $i++) {
        if ($a1[$i - 1] == '') {  //��ҵ���á =0 +1
            $c = 1;
        } else {
            if (substr($a1[$i], 3, 1) == substr($a1[$i - 1], 3, 1)) {  //��ҵ�ǻѨ�غѹ =��ǡ�͹ 1 ���  +1
                $c++;
            } else {
                if (substr($a1[$i], 3, 1) == 3) {  //��ҵ�ǻѨ�غѹ =�1 ���  +1
                    $c++;
                } else {
                    if (substr($a1[$i - 1], 3, 1) == 3 and substr($a1[$i], 3, 1) == substr($a1[$i - 2], 3, 1)) {
                        $c++;
                    } else {
                        $c = 1;
                    }
                }
            }
        }
    }
    return $c;
}

function C_row($key)
{

    $sql88 = "select  *  from table_detail where status = '1'   ";
    $rs88 = sql_query($sql88);
    $a1 = explode(",", $rs88['bet1']);//�Ѵ����ͧ�����͡
    $b1 = count($a1);//�Ѻ�ӹǹ������
    $c = 0;
    for ($i = 0; $i < $b1; $i++) {
        if (substr($a1[$i], 0, 3) == $key) {
            $c = 1;
        }
    }
    return $c;
}

function C_C()
{
    $sql88 = "select  *  from table_detail where status = '1'   ";
    $rs88 = sql_query($sql88);
    return $rs88['bet2'];
}

function Ck_r($rm, $win2)
{
    $sql88 = "select  *  from table_detail where status = '1'   ";
    $rs88 = sql_query($sql88);
    $a1 = explode(",", $rs88['bet1']);//�Ѵ����ͧ�����͡
    $b1 = count($a1);//�Ѻ�ӹǹ������
    $c = 0;

    for ($i = 0; $i < $b1 - 1; $i++) {
        if (substr($a1[$i], 0, 3) == $rm or $rs88[cr2] > 0) {
            $c = 1;
        }
    }

    if ($c == 1) {
        return substr($a1[$b1 - 2], 0, 3) + 6;

    } else {
        return "KK";
    }

}

function Check_no_bet($key1, $key2)
{
    $a = explode("-", $key1);
    if ($key2 == 1) {
        return $a[0];
    }
    if ($key2 == 2) {
        return $a[1];
    }
    if ($key2 == 3) {
        return $a[2];
    }
}

function Add_road_table()
{ ///cockroach road
    $sql88 = "select bet1  from   table_sc1   ";
    $rs88 = sql_query($sql88);
    if (!empty($rs88['bet1']) or $rs88['bet1'] != "") {
        $a1 = explode(",", $rs88['bet1']);
        $b1 = count($a1);
        //$re = substr($a1[0],3,1);
        for ($e = 0; $e < $b1; $e++) {
            if (substr($a1[$e], 3, 1) != 3) {
                if (empty($cut_tie)) {
                    $cut_tie = substr($a1[$e], 3, 1);
                } else {
                    $cut_tie = $cut_tie . "," . substr($a1[$e], 3, 1);
                }
            }
        }
        $a2 = explode(",", $cut_tie);
        $b2 = count($a2);
        for ($e2 = 0; $e2 < $b2; $e2++) {
            if (!empty($a2[$e2])) {
                if ($e2 == 0) {
                    $j = 1;
                } else {
                    if ($a2[$e2] == $a2[$e2 - 1]) {
                        $j = $j;
                    } else {
                        $j = $j + 1;
                    }
                }
                if ($e2 == 0) {
                    $k = 1;
                } else {
                    if ($a2[$e2] == $a2[$e2 - 1]) {
                        $k = $k + 1;
                    } else {
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
////////////////////////////////////////////////////////////////////////////////////////////////////					 		 				 
        //echo $bet;
        //////////////////////////////////////////////////////////////////////////////////////////////
        $a4 = explode(",", $bet);//�Ѵ����ͧ�����͡
        $b4 = count($a4);//�Ѻ�ӹǹ������
        $idd = 1;
        for ($e4 = 0; $e4 < $b4; $e4++) {
            $bb1 = $bb1 . "," . $a4[$e4];
            $co1 = Check_no_bet($a4[$e4], 1);
            $co2 = Check_no_bet($a4[$e4], 2);
            $co3 = Check_no_bet($a4[$e4], 2);
            /////////////////////////////////////////////////////////////////////////////////////////////


            $col_ck1 = $co1 - 1;
            $col_ck2 = $co1 - 4;
            $col_ck3 = $co1 - 3;
            $col_max1 = Check_max_bet($bb1, $col_ck1);
            $col_max2 = Check_max_bet($bb1, $col_ck2);
            $col_max3 = Check_max_bet($bb1, $col_ck3);
            if ($co2 == 1) {
                if ($col_max1 == $col_max2) {
                    $status = 2;
                    $re = "case2.1";
                    //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.1<br>";
                } else {
                    $status = 1;
                    $re = "case2.2";
                    //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.2<br>";
                }
            } else {
                //echo $co2."----".$col_max3;
                if ($co2 <= $col_max3) {
                    $status = 2;
                    $re = "case1.1";
                    //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.1<br>";
                } else {
                    $cc = $co2 - $col_max3;
                    if ($co2 > $col_max3 and $cc == 1) {
                        $status = 1;
                        $re = "case1.2";
                        //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.1<br>";
                    } else {
                        $status = 2;
                        $re = "case1.3";
                        //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.1<br>";
                    }
                }
            }
            ////////////////////////////////////////////////////////////////////////////////////////////
            $ck_start = $co1 . $co2;
            if ($ck_start >= 41 and $co1 >= 4) {
                $strSQL4 = "update table_road set  status='1'   where id ='$idd' ";
                mysqli_query($GLOBALS['db'], $strSQL4) or die ("Can not insert data") . mysqli_error();
            } else {
                $strSQL4 = "update table_road set  status='0'   where id ='$idd'";
                mysqli_query($GLOBALS['db'], $strSQL4) or die ("Can not insert data") . mysqli_error();
            }
            if ($ck_start >= 42 and $co1 >= 4) {
                // echo $re."<br>" ;
                $strSQL4 = "update table_road set co='$co1',ro='$co2',status='$status'   where id ='$idd' ";
                mysqli_query($GLOBALS['db'], $strSQL4) or die ("Can not insert data") . mysqli_error();
                $idd++;
            }

            ////////////////////////////////////////////////////////////////////
        }

    }
////////////////////////////////////////////////////////////////////////////////////////////
    $str = "SELECT * from table_road where co !='0'  order by id";
    $result = mysqli_query($GLOBALS['db'], $str);
    $i = 0;
    $v = 0;
    while ($rs = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        if ($i == 0) {
            $data_bet = $rs['status'];
        } else {
            $data_bet = $data_bet . "," . $rs['status'];
        }
        $i++;
    }
    $a2 = explode(",", $data_bet);//�Ѵ����ͧ�����͡
    $b2 = count($a2);//�Ѻ�ӹǹ������
    $num = 1;
    $coo1 = 1;
    for ($e2 = 0; $e2 < $b2; $e2++) {

        $ck_bet1 = $a2[$num];
        $ck_bet2 = $a2[$num - 1];
        if ($e2 == 0) {
            $rm = 1;
            $re = " case1 ";
            $coo1 = $coo1;
        } else {
            if ($ck_bet1 == $ck_bet2 and $e2 != 0) {
                $rm++;
                $v++;
                if ($v > 5) {
                    $kk++;
                    $rm = $rm + 6 - 1;
                } else {
                    $kk = 0;
                }
                $rm = $rm;
                $re = " case2 ";
                $coo1 = $coo1;

            }
            if ($ck_bet1 != $ck_bet2 and $e2 != 0) {
                $v = 0;
                $rm = (6 * ($coo1) + 1);
                $coo1++;
                $rm = $rm;
                $re = " case3 ";
            }
            $num++;
        }
        $j = $e2 + 1;
        $strSQL4 = "update table_road set  rm='$rm'   where id ='$j' and co !='0' ";
        mysqli_query($GLOBALS['db'], $strSQL4) or die ("Can not insert data") . mysqli_error();
        $str8 = "SELECT rm from table_road where rm='$rm' and co !='0' ";
        $result8 = mysqli_query($GLOBALS['db'], $str8);
        $nr = mysqli_num_rows($result8);
        if ($nr > 1) {
            $rm = $rm + 5;
            $strSQL4 = "update table_road set  rm='$rm'   where id ='$j' and co !='0' ";
            mysqli_query($GLOBALS['db'], $strSQL4) or die ("Can not insert data") . mysqli_error();
        }

    }
////////////////////////////////////////////////////////////////////////////////////////////
}

function Check_max_bet($bet, $col_ck1)
{
    $a2 = explode(",", $bet);//�Ѵ����ͧ�����͡
    $b2 = count($a2);//�Ѻ�ӹǹ������
	$ma = null;
    for ($e2 = 0; $e2 < $b2; $e2++) {
        $c1 = Check_no_bet($a2[$e2], 1);
        if ($c1 == $col_ck1) {
            $ma = Check_no_bet($a2[$e2], 2);
        }
    }
    return $ma;
}

function Add_road_table2()
{  //Big eye road
    $sql88 = "select bet1  from   table_sc1   ";
    $rs88 = sql_query($sql88);
    if (!empty($rs88['bet1']) or $rs88['bet1'] != "") {
        $a1 = explode(",", $rs88['bet1']);//�Ѵ����ͧ�����͡
        $b1 = count($a1);//�Ѻ�ӹǹ������
        //$re = substr($a1[0],3,1);
        for ($e = 0; $e < $b1; $e++) {
            if (substr($a1[$e], 3, 1) != 3) {
                if (empty($cut_tie)) {
                    $cut_tie = substr($a1[$e], 3, 1);
                } else {
                    $cut_tie = $cut_tie . "," . substr($a1[$e], 3, 1);
                }
            }
        }

        $a2 = explode(",", $cut_tie);//�Ѵ����ͧ�����͡
        $b2 = count($a2);//�Ѻ�ӹǹ������

        for ($e2 = 0; $e2 < $b2; $e2++) {
            if (!empty($a2[$e2])) {
                if ($e2 == 0) {
                    $j = 1;
                } else {
                    if ($a2[$e2] == $a2[$e2 - 1]) {
                        $j = $j;
                    } else {
                        $j = $j + 1;
                    }
                }
                if ($e2 == 0) {
                    $k = 1;
                } else {
                    if ($a2[$e2] == $a2[$e2 - 1]) {
                        $k = $k + 1;
                    } else {
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
////////////////////////////////////////////////////////////////////////////////////////////////////					 		 				 
        //echo $bet;
        //////////////////////////////////////////////////////////////////////////////////////////////

        $a4 = explode(",", $bet);//�Ѵ����ͧ�����͡
        $b4 = count($a4);//�Ѻ�ӹǹ������
        $idd = 1;
        for ($e4 = 0; $e4 < $b4; $e4++) {
            $bb1 = $bb1 . "," . $a4[$e4];
            $co1 = Check_no_bet($a4[$e4], 1);
            $co2 = Check_no_bet($a4[$e4], 2);
            $co3 = Check_no_bet($a4[$e4], 2);
            /////////////////////////////////////////////////////////////////////////////////////////////


            $col_ck1 = $co1 - 1;
            $col_ck2 = $co1 - 2;
            $col_ck3 = $co1 - 1;

            $col_max1 = Check_max_bet($bb1, $col_ck1);
            $col_max2 = Check_max_bet($bb1, $col_ck2);
            $col_max3 = Check_max_bet($bb1, $col_ck3);
            if ($co2 == 1) {
                if ($col_max1 == $col_max2) {
                    $status = 2;
                    $re = "case2.1";
                    //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.1<br>";
                } else {
                    $status = 1;
                    $re = "case2.2";
                    //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.2<br>";
                }

            } else {
                //echo $co2."----".$col_max3;
                if ($co2 <= $col_max3) {
                    $status = 2;
                    $re = "case1.1";
                    //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.1<br>";
                } else {
                    $cc = $co2 - $col_max3;
                    if ($co2 > $col_max3 and $cc == 1) {
                        $status = 1;
                        $re = "case1.2";
                        // $kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.1<br>";
                    } else {
                        $status = 2;
                        $re = "case1.3";
                        //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.1<br>";
                    }
                }
            }

            ////////////////////////////////////////////////////////////////////////////////////////////
            $ck_start = $co1 . $co2;
            if ($ck_start >= 21 and $co1 >= 2) {
                $strSQL4 = "update table_road1 set  status='1'   where id ='$idd' ";
                mysqli_query($GLOBALS['db'], $strSQL4) or die ("Can not insert data") . mysqli_error();
            } else {
                $strSQL4 = "update table_road1 set  status='0'   where id ='$idd'";
                mysqli_query($GLOBALS['db'], $strSQL4) or die ("Can not insert data") . mysqli_error();
            }
            if ($ck_start >= 22 and $co1 >= 2) {
                // echo $re."<br>" ;
                $strSQL4 = "update table_road1 set co='$co1',ro='$co2',status='$status'   where id ='$idd' ";
                mysqli_query($GLOBALS['db'], $strSQL4) or die ("Can not insert data") . mysqli_error();
                $idd++;
            }

            ////////////////////////////////////////////////////////////////////
        }

    }
////////////////////////////////////////////////////////////////////////////////////////////
    $str = "SELECT * from table_road1 where co !='0'  order by id";
    $result = mysqli_query($str);
    $i = 0;
    $v = 0;
    while ($rs = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        if ($i == 0) {
            $data_bet = $rs['status'];
        } else {
            $data_bet = $data_bet . "," . $rs['status'];
        }
        $i++;
    }
    $a2 = explode(",", $data_bet);//�Ѵ����ͧ�����͡
    $b2 = count($a2);//�Ѻ�ӹǹ������
    $num = 1;
    $coo1 = 1;
    for ($e2 = 0; $e2 < $b2; $e2++) {
        $ck_bet1 = $a2[$num];
        $ck_bet2 = $a2[$num - 1];
        if ($e2 == 0) {
            $rm = 1;
            $re = " case1 ";
            $coo1 = $coo1;
        } else {
            if ($ck_bet1 == $ck_bet2 and $e2 != 0) {
                $rm++;
                $v++;
                if ($v > 5) {
                    $kk++;
                    $rm = $rm + 6 - 1;
                } else {
                    $kk = 0;
                }
                $rm = $rm;
                $re = " case2 ";
                $coo1 = $coo1;
            }
            if ($ck_bet1 != $ck_bet2 and $e2 != 0) {
                $v = 0;
                $rm = (6 * ($coo1) + 1);
                $coo1++;
                $rm = $rm;
                $re = " case3 ";

            }
            $num++;
        }
        $j = $e2 + 1;
        $strSQL4 = "update table_road1 set  rm='$rm'   where id ='$j' and co !='0' ";
        mysqli_query($GLOBALS['db'], $strSQL4) or die ("Can not insert data") . mysqli_error();
        $str8 = "SELECT rm from table_road1 where rm='$rm' and co !='0' ";
        $result8 = mysqli_query($GLOBALS['db'], $str8);
        $nr = mysqli_num_rows($result8);
        if ($nr > 1) {
            $rm = $rm + 5;
            $strSQL4 = "update table_road1 set  rm='$rm'   where id ='$j' and co !='0' ";
            mysqli_query($GLOBALS['db'], $strSQL4) or die ("Can not insert data") . mysqli_error();
        }
    }

////////////////////////////////////////////////////////////////////////////////////////////
}

function Add_road_table3()
{           //Small Road

    $sql88 = "select bet1  from   table_sc1   ";
    $rs88 = sql_query($sql88);
    if (!empty($rs88['bet1']) or $rs88['bet1'] != "") {
        $a1 = explode(",", $rs88['bet1']);//�Ѵ����ͧ�����͡
        $b1 = count($a1);//�Ѻ�ӹǹ������
        //$re = substr($a1[0],3,1);
        for ($e = 0; $e < $b1; $e++) {
            if (substr($a1[$e], 3, 1) != 3) {
                if (empty($cut_tie)) {
                    $cut_tie = substr($a1[$e], 3, 1);
                } else {
                    $cut_tie = $cut_tie . "," . substr($a1[$e], 3, 1);
                }

            }
        }

        $a2 = explode(",", $cut_tie);//�Ѵ����ͧ�����͡
        $b2 = count($a2);//�Ѻ�ӹǹ������

        for ($e2 = 0; $e2 < $b2; $e2++) {
            if (!empty($a2[$e2])) {
                if ($e2 == 0) {
                    $j = 1;
                } else {
                    if ($a2[$e2] == $a2[$e2 - 1]) {
                        $j = $j;
                    } else {
                        $j = $j + 1;
                    }
                }
                if ($e2 == 0) {
                    $k = 1;
                } else {
                    if ($a2[$e2] == $a2[$e2 - 1]) {
                        $k = $k + 1;
                    } else {
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
////////////////////////////////////////////////////////////////////////////////////////////////////					 		 				 
        //echo $bet;
        //////////////////////////////////////////////////////////////////////////////////////////////

        $a4 = explode(",", $bet);//�Ѵ����ͧ�����͡
        $b4 = count($a4);//�Ѻ�ӹǹ������
        $idd = 1;
        for ($e4 = 0; $e4 < $b4; $e4++) {
            $bb1 = $bb1 . "," . $a4[$e4];
            $co1 = Check_no_bet($a4[$e4], 1);
            $co2 = Check_no_bet($a4[$e4], 2);
            $co3 = Check_no_bet($a4[$e4], 2);
            /////////////////////////////////////////////////////////////////////////////////////////////


            $col_ck1 = $co1 - 1;
            $col_ck2 = $co1 - 3;
            $col_ck3 = $co1 - 2;

            $col_max1 = Check_max_bet($bb1, $col_ck1);
            $col_max2 = Check_max_bet($bb1, $col_ck2);
            $col_max3 = Check_max_bet($bb1, $col_ck3);
            if ($co2 == 1) {
                if ($col_max1 == $col_max2) {
                    $status = 2;
                    $re = "case2.1";
                    //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.1<br>";
                } else {
                    $status = 1;
                    $re = "case2.2";
                    //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.2<br>";
                }

            } else {
                //echo $co2."----".$col_max3;
                if ($co2 <= $col_max3) {
                    $status = 2;
                    $re = "case1.1";
                    //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.1<br>";
                } else {
                    $cc = $co2 - $col_max3;
                    if ($co2 > $col_max3 and $cc == 1) {
                        $status = 1;
                        $re = "case1.2";
                        // $kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.1<br>";
                    } else {
                        $status = 2;
                        $re = "case1.3";
                        //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.1<br>";
                    }
                }


            }


            ////////////////////////////////////////////////////////////////////////////////////////////
            $ck_start = $co1 . $co2;
            if ($ck_start >= 31 and $co1 >= 3) {
                $strSQL4 = "update table_road2 set  status='1'   where id ='$idd' ";
                mysqli_query($GLOBALS['db'], $strSQL4) or die ("Can not insert data") . mysqli_error();
            } else {
                $strSQL4 = "update table_road2 set  status='0'   where id ='$idd'";
				mysqli_query($GLOBALS['db'], $strSQL4) or die ("Can not insert data") . mysqli_error();
            }
            if ($ck_start >= 32 and $co1 >= 3) {
                // echo $re."<br>" ;

                $strSQL4 = "update table_road2 set co='$co1',ro='$co2',status='$status'   where id ='$idd' ";
				mysqli_query($GLOBALS['db'], $strSQL4) or die ("Can not insert data") . mysqli_error();

                $idd++;
            }

            ////////////////////////////////////////////////////////////////////
        }

    }
////////////////////////////////////////////////////////////////////////////////////////////
    $str = "SELECT * from table_road2 where co !='0'  order by id";
    $result = mysqli_query($GLOBALS['db'], $str);
    $i = 0;
    $v = 0;
    while ($rs = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        if ($i == 0) {
            $data_bet = $rs['status'];
        } else {
            $data_bet = $data_bet . "," . $rs['status'];
        }
        $i++;
    }

    $a2 = explode(",", $data_bet);//�Ѵ����ͧ�����͡
    $b2 = count($a2);//�Ѻ�ӹǹ������

    $num = 1;
    $coo1 = 1;
    for ($e2 = 0; $e2 < $b2; $e2++) {

        $ck_bet1 = $a2[$num];
        $ck_bet2 = $a2[$num - 1];
        if ($e2 == 0) {
            $rm = 1;
            $re = " case1 ";
            $coo1 = $coo1;
        } else {

            if ($ck_bet1 == $ck_bet2 and $e2 != 0) {
                $rm++;
                $v++;
                if ($v > 5) {
                    $kk++;
                    $rm = $rm + 6 - 1;
                } else {
                    $kk = 0;
                }
                $rm = $rm;
                $re = " case2 ";
                $coo1 = $coo1;

            }
            if ($ck_bet1 != $ck_bet2 and $e2 != 0) {
                $v = 0;
                $rm = (6 * ($coo1) + 1);
                $coo1++;
                $rm = $rm;
                $re = " case3 ";

            }

            $num++;
        }
        $j = $e2 + 1;
        $strSQL4 = "update table_road2 set  rm='$rm'   where id ='$j' and co !='0' ";
		mysqli_query($GLOBALS['db'], $strSQL4) or die ("Can not insert data") . mysqli_error();
        $str8 = "SELECT rm from table_road2 where rm='$rm' and co !='0' ";
        $result8 = mysqli_query($GLOBALS['db'], $str8);
        $nr = mysqli_num_rows($result8);
        if ($nr > 1) {
            $rm = $rm + 5;
            $strSQL4 = "update table_road2 set  rm='$rm'   where id ='$j' and co !='0' ";
			mysqli_query($GLOBALS['db'], $strSQL4) or die ("Can not insert data") . mysqli_error();
        }

    }
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function Add_road_table4()
{

    $sql88 = "select bet1  from   table_sc1   ";
    $rs88 = sql_query($sql88);
    if (!empty($rs88['bet1']) or $rs88['bet1'] != "") {
        $a1 = explode(",", $rs88['bet1']);//�Ѵ����ͧ�����͡
        $b1 = count($a1);//�Ѻ�ӹǹ������
        //$re = substr($a1[0],3,1);
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
////////////////////////////////////////////////////////////////////////////////////////////////////					 		 				 


    $a4 = explode(",", $bet);//�Ѵ����ͧ�����͡
    $b4 = count($a4);//�Ѻ�ӹǹ������
    $idd = 1;
    for ($e4 = 0; $e4 < $b4; $e4++) {
        $bb1 = $bb1 . "," . $a4[$e4];
        $co1 = Check_no_bet($a4[$e4], 1);
        $co2 = Check_no_bet($a4[$e4], 2);
        $co3 = Check_no_bet($a4[$e4], 3);

        $strSQL4 = "update table_road3 set co='$co1',ro='$co2',status='$co3'   where id ='$idd' ";
		mysqli_query($GLOBALS['db'], $strSQL4) or die ("Can not insert data") . mysqli_error();

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

}

function Chk_net3($key)
{  ///cockroach road
    $sql = "select id  from  table_road where status != '0'   ";
    $rs = sql_query($sql);
    if ($rs['id'] != '') {
        $sql88 = "select bet1  from   table_sc1   ";
       	$rs88 = sql_query($sql88);
        if (!empty($rs88['bet1']) or $rs88['bet1'] != "") {
            $a1 = explode(",", $rs88['bet1']);//�Ѵ����ͧ�����͡
            $b1 = count($a1);//�Ѻ�ӹǹ������
            //$re = substr($a1[0],3,1);
            for ($e = 0; $e < $b1; $e++) {
                if (substr($a1[$e], 3, 1) != 3) {
                    if (empty($cut_tie)) {
                        $cut_tie = substr($a1[$e], 3, 1);
                    } else {
                        $cut_tie = $cut_tie . "," . substr($a1[$e], 3, 1);
                    }

                }
            }
            $cut_tie1 = $cut_tie . ",1";
            $cut_tie2 = $cut_tie . ",2";

            $a2 = explode(",", $cut_tie1);//�Ѵ����ͧ�����͡
            $b2 = count($a2);//�Ѻ�ӹǹ������

            for ($e2 = 0; $e2 < $b2; $e2++) {

                if (!empty($a2[$e2])) {
                    if ($e2 == 0) {
                        $j = 1;
                    } else {
                        if ($a2[$e2] == $a2[$e2 - 1]) {
                            $j = $j;
                        } else {
                            $j = $j + 1;
                        }
                    }
                    if ($e2 == 0) {
                        $k = 1;
                    } else {
                        if ($a2[$e2] == $a2[$e2 - 1]) {
                            $k = $k + 1;
                        } else {
                            $k = 1;
                        }
                    }
                    if ($j == 1 and $k == 1) {
                        $bet1 = $j . "-" . $k . "-" . $a2[$e2];
                    } else {
                        $bet1 = $bet1 . "," . $j . "-" . $k . "-" . $a2[$e2];
                    }
                }
            }
            $a2 = explode(",", $cut_tie2);//�Ѵ����ͧ�����͡
            $b2 = count($a2);//�Ѻ�ӹǹ������

            for ($e2 = 0; $e2 < $b2; $e2++) {

                if (!empty($a2[$e2])) {
                    if ($e2 == 0) {
                        $j = 1;
                    } else {
                        if ($a2[$e2] == $a2[$e2 - 1]) {
                            $j = $j;
                        } else {
                            $j = $j + 1;
                        }
                    }
                    if ($e2 == 0) {
                        $k = 1;
                    } else {
                        if ($a2[$e2] == $a2[$e2 - 1]) {
                            $k = $k + 1;
                        } else {
                            $k = 1;
                        }
                    }
                    if ($j == 1 and $k == 1) {
                        $bet2 = $j . "-" . $k . "-" . $a2[$e2];
                    } else {
                        $bet2 = $bet2 . "," . $j . "-" . $k . "-" . $a2[$e2];
                    }
                }
            }

////////////////////////////////////////////////////////////////////////////////////////////////////					 		 				 
            //echo $bet1."<br>".$bet2;
            //////////////////////////////////////////////////////////////////////////////////////////////

            $a4 = explode(",", $bet1);//�Ѵ����ͧ�����͡
            $b4 = count($a4);//�Ѻ�ӹǹ������
            $idd = 1;
            for ($e4 = 0; $e4 < $b4; $e4++) {
                $bb1 = $b1 . "," . $a4[$e4];

                $co1 = Check_no_bet($a4[$e4], 1);
                $co2 = Check_no_bet($a4[$e4], 2);
                $co3 = Check_no_bet($a4[$e4], 2);

                /////////////////////////////////////////////////////////////////////////////////////////////


                $col_ck1 = $co1 - 1;
                $col_ck2 = $co1 - 4;
                $col_ck3 = $co1 - 3;
                $col_max1 = Check_max_bet($bb1, $col_ck1);
                $col_max2 = Check_max_bet($bb1, $col_ck2);
                $col_max3 = Check_max_bet($bb1, $col_ck3);
                if ($co2 == 1) {
                    if ($col_max1 == $col_max2) {
                        $status1 = 2;
                        $re = "case2.1";
                        //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.1<br>";
                    } else {
                        $status1 = 1;
                        $re = "case2.2";
                        //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.2<br>";
                    }

                } else {
                    //echo $co2."----".$col_max3;
                    if ($co2 <= $col_max3) {
                        $status1 = 2;
                        $re = "case1.1";
                        //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.1<br>";
                    } else {
                        $cc = $co2 - $col_max3;
                        if ($co2 > $col_max3 and $cc == 1) {
                            $status1 = 1;
                            $re = "case1.2";
                            //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.1<br>";
                        } else {
                            $status1 = 2;
                            $re = "case1.3";
                            //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.1<br>";
                        }
                    }
                }
            }
            $re1 = $status1;
            //////////////////////////////////////////////////////////////////////////////////////////////

            $a4 = explode(",", $bet2);//�Ѵ����ͧ�����͡
            $b4 = count($a4);//�Ѻ�ӹǹ������
            $idd = 1;

            for ($e4 = 0; $e4 < $b4; $e4++) {
                $bb1 = $bb1 . "," . $a4[$e4];
                $co1 = Check_no_bet($a4[$e4], 1);
                $co2 = Check_no_bet($a4[$e4], 2);
                $co3 = Check_no_bet($a4[$e4], 2);

                /////////////////////////////////////////////////////////////////////////////////////////////


                $col_ck1 = $co1 - 1;
                $col_ck2 = $co1 - 4;
                $col_ck3 = $co1 - 3;
                $col_max1 = Check_max_bet($bb1, $col_ck1);
                $col_max2 = Check_max_bet($bb1, $col_ck2);
                $col_max3 = Check_max_bet($bb1, $col_ck3);
                if ($co2 == 1) {
                    if ($col_max1 == $col_max2) {
                        $status2 = 2;
                        $re = "case2.1";
                        //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.1<br>";
                    } else {
                        $status2 = 1;
                        $re = "case2.2";
                        //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.2<br>";
                    }

                } else {
                    //echo $co2."----".$col_max3;
                    if ($co2 <= $col_max3) {
                        $status2 = 2;
                        $re = "case1.1";
                        //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.1<br>";
                    } else {
                        $cc = $co2 - $col_max3;
                        if ($co2 > $col_max3 and $cc == 1) {
                            $status2 = 1;
                            $re = "case1.2";
                            //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.1<br>";
                        } else {
                            $status2 = 2;
                            $re = "case1.3";
                            //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.1<br>";
                        }
                    }
                    /////////////////////////////////////////////////////////////////////////

                }
            }
            ////////////////////////////////////////////////////////////////////////////////////////////

            $re2 = $status2;

            if ($key == 1) {
                if ($re1 == "2") {
                    return "images/CockroachRoad/B.png";
                }
                if ($re1 == "1") {
                    return "images/CockroachRoad/P.png";
                }
                if ($re1 == "0") {
                    return "images/CockroachRoad/T.gif";
                } else {
                    return "images/CockroachRoad/T.gif";
                }
            } else {
                if ($re2 == "2") {
                    return "images/CockroachRoad/B.png";
                }
                if ($re2 == "1") {
                    return "images/CockroachRoad/P.png";
                }
                if ($re2 == "0") {
                    return "images/CockroachRoad/T.gif";
                } else {
                    return "images/CockroachRoad/T.gif";
                }

            }
        }
    } else {
        return "images/CockroachRoad/T.gif";
    }
}


function Chk_net2($key)
{  //Small Road
    $sql = "select id  from  table_road2 where status != '0'   ";
    $rs = sql_query($sql);
    if ($rs['id'] != '') {
        $sql88 = "select bet1  from   table_sc1   ";
       	$rs88 = sql_query($sql88);
        if (!empty($rs88['bet1']) or $rs88['bet1'] != "") {
            $a1 = explode(",", $rs88['bet1']);//�Ѵ����ͧ�����͡
            $b1 = count($a1);//�Ѻ�ӹǹ������
            //$re = substr($a1[0],3,1);
            for ($e = 0; $e < $b1; $e++) {
                if (substr($a1[$e], 3, 1) != 3) {
                    if (empty($cut_tie)) {
                        $cut_tie = substr($a1[$e], 3, 1);
                    } else {
                        $cut_tie = $cut_tie . "," . substr($a1[$e], 3, 1);
                    }

                }
            }
            $cut_tie1 = $cut_tie . ",1";
            $cut_tie2 = $cut_tie . ",2";

            $a2 = explode(",", $cut_tie1);//�Ѵ����ͧ�����͡
            $b2 = count($a2);//�Ѻ�ӹǹ������

            for ($e2 = 0; $e2 < $b2; $e2++) {

                if (!empty($a2[$e2])) {
                    if ($e2 == 0) {
                        $j = 1;
                    } else {
                        if ($a2[$e2] == $a2[$e2 - 1]) {
                            $j = $j;
                        } else {
                            $j = $j + 1;
                        }
                    }
                    if ($e2 == 0) {
                        $k = 1;
                    } else {
                        if ($a2[$e2] == $a2[$e2 - 1]) {
                            $k = $k + 1;
                        } else {
                            $k = 1;
                        }
                    }
                    if ($j == 1 and $k == 1) {
                        $bet1 = $j . "-" . $k . "-" . $a2[$e2];
                    } else {
                        $bet1 = $bet1 . "," . $j . "-" . $k . "-" . $a2[$e2];
                    }
                }
            }
            $a2 = explode(",", $cut_tie2);//�Ѵ����ͧ�����͡
            $b2 = count($a2);//�Ѻ�ӹǹ������

            for ($e2 = 0; $e2 < $b2; $e2++) {

                if (!empty($a2[$e2])) {
                    if ($e2 == 0) {
                        $j = 1;
                    } else {
                        if ($a2[$e2] == $a2[$e2 - 1]) {
                            $j = $j;
                        } else {
                            $j = $j + 1;
                        }
                    }
                    if ($e2 == 0) {
                        $k = 1;
                    } else {
                        if ($a2[$e2] == $a2[$e2 - 1]) {
                            $k = $k + 1;
                        } else {
                            $k = 1;
                        }
                    }
                    if ($j == 1 and $k == 1) {
                        $bet2 = $j . "-" . $k . "-" . $a2[$e2];
                    } else {
                        $bet2 = $bet2 . "," . $j . "-" . $k . "-" . $a2[$e2];
                    }
                }
            }

////////////////////////////////////////////////////////////////////////////////////////////////////					 		 				 
            //echo $bet1."<br>".$bet2;
            //////////////////////////////////////////////////////////////////////////////////////////////

            $a4 = explode(",", $bet1);//�Ѵ����ͧ�����͡
            $b4 = count($a4);//�Ѻ�ӹǹ������
            $idd = 1;
            for ($e4 = 0; $e4 < $b4; $e4++) {
                $bb1 = $b1 . "," . $a4[$e4];

                $co1 = Check_no_bet($a4[$e4], 1);
                $co2 = Check_no_bet($a4[$e4], 2);
                $co3 = Check_no_bet($a4[$e4], 2);

                /////////////////////////////////////////////////////////////////////////////////////////////
                $col_ck1 = $co1 - 1;
                $col_ck2 = $co1 - 3;
                $col_ck3 = $co1 - 2;

                $col_max1 = Check_max_bet($bb1, $col_ck1);
                $col_max2 = Check_max_bet($bb1, $col_ck2);
                $col_max3 = Check_max_bet($bb1, $col_ck3);
                if ($co2 == 1) {
                    if ($col_max1 == $col_max2) {
                        $status1 = 2;
                        $re = "case2.1";
                        //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.1<br>";
                    } else {
                        $status1 = 1;
                        $re = "case2.2";
                        //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.2<br>";
                    }

                } else {
                    //echo $co2."----".$col_max3;
                    if ($co2 <= $col_max3) {
                        $status1 = 2;
                        $re = "case1.1";
                        //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.1<br>";
                    } else {
                        $cc = $co2 - $col_max3;
                        if ($co2 > $col_max3 and $cc == 1) {
                            $status1 = 1;
                            $re = "case1.2";
                            //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.1<br>";
                        } else {
                            $status1 = 2;
                            $re = "case1.3";
                            //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.1<br>";
                        }
                    }
                }
            }
            $re1 = $status1;
            //////////////////////////////////////////////////////////////////////////////////////////////

            $a4 = explode(",", $bet2);//�Ѵ����ͧ�����͡
            $b4 = count($a4);//�Ѻ�ӹǹ������
            $idd = 1;

            for ($e4 = 0; $e4 < $b4; $e4++) {
                $bb1 = $bb1 . "," . $a4[$e4];
                $co1 = Check_no_bet($a4[$e4], 1);
                $co2 = Check_no_bet($a4[$e4], 2);
                $co3 = Check_no_bet($a4[$e4], 2);

                /////////////////////////////////////////////////////////////////////////////////////////////


                $col_ck1 = $co1 - 1;
                $col_ck2 = $co1 - 3;
                $col_ck3 = $co1 - 2;
                $col_max1 = Check_max_bet($bb1, $col_ck1);
                $col_max2 = Check_max_bet($bb1, $col_ck2);
                $col_max3 = Check_max_bet($bb1, $col_ck3);
                if ($co2 == 1) {
                    if ($col_max1 == $col_max2) {
                        $status2 = 2;
                        $re = "case2.1";
                        //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.1<br>";
                    } else {
                        $status2 = 1;
                        $re = "case2.2";
                        //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.2<br>";
                    }

                } else {
                    //echo $co2."----".$col_max3;
                    if ($co2 <= $col_max3) {
                        $status2 = 2;
                        $re = "case1.1";
                        //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.1<br>";
                    } else {
                        $cc = $co2 - $col_max3;
                        if ($co2 > $col_max3 and $cc == 1) {
                            $status2 = 1;
                            $re = "case1.2";
                            //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.1<br>";
                        } else {
                            $status2 = 2;
                            $re = "case1.3";
                            //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.1<br>";
                        }
                    }
                    /////////////////////////////////////////////////////////////////////////

                }
            }
            ////////////////////////////////////////////////////////////////////////////////////////////

            $re2 = $status2;

            if ($key == 1) {
                if ($re1 == "2") {
                    return "images/SmallRoad/B.png";
                }
                if ($re1 == "1") {
                    return "images/SmallRoad/P.png";
                }
                if ($re1 == "0") {
                    return "images/SmallRoad/T.gif";
                } else {
                    return "images/SmallRoad/T.gif";
                }
            } else {
                if ($re2 == "2") {
                    return "images/SmallRoad/B.png";
                }
                if ($re2 == "1") {
                    return "images/SmallRoad/P.png";
                }
                if ($re2 == "0") {
                    return "images/SmallRoad/T.gif";
                } else {
                    return "images/SmallRoad/T.gif";
                }

            }
        }
    } else {
        return "images/SmallRoad/T.gif";
    }
}


function Chk_net1($key)
{ //Big eye road
    $sql = "select id  from  table_road1 where status != '0'   ";
    $rs = sql_query($sql);
    if ($rs['id'] != '') {
        $sql88 = "select bet1  from   table_sc1   ";
        $rs88 = sql_query($sql88);
        if (!empty($rs88['bet1']) or $rs88['bet1'] != "") {
            $a1 = explode(",", $rs88['bet1']);//�Ѵ����ͧ�����͡
            $b1 = count($a1);//�Ѻ�ӹǹ������
            //$re = substr($a1[0],3,1);
            for ($e = 0; $e < $b1; $e++) {
                if (substr($a1[$e], 3, 1) != 3) {
                    if (empty($cut_tie)) {
                        $cut_tie = substr($a1[$e], 3, 1);
                    } else {
                        $cut_tie = $cut_tie . "," . substr($a1[$e], 3, 1);
                    }

                }
            }
            $cut_tie1 = $cut_tie . ",1";
            $cut_tie2 = $cut_tie . ",2";

            $a2 = explode(",", $cut_tie1);//�Ѵ����ͧ�����͡
            $b2 = count($a2);//�Ѻ�ӹǹ������

            for ($e2 = 0; $e2 < $b2; $e2++) {

                if (!empty($a2[$e2])) {
                    if ($e2 == 0) {
                        $j = 1;
                    } else {
                        if ($a2[$e2] == $a2[$e2 - 1]) {
                            $j = $j;
                        } else {
                            $j = $j + 1;
                        }
                    }
                    if ($e2 == 0) {
                        $k = 1;
                    } else {
                        if ($a2[$e2] == $a2[$e2 - 1]) {
                            $k = $k + 1;
                        } else {
                            $k = 1;
                        }
                    }
                    if ($j == 1 and $k == 1) {
                        $bet1 = $j . "-" . $k . "-" . $a2[$e2];
                    } else {
                        $bet1 = $bet1 . "," . $j . "-" . $k . "-" . $a2[$e2];
                    }
                }
            }
            $a2 = explode(",", $cut_tie2);//�Ѵ����ͧ�����͡
            $b2 = count($a2);//�Ѻ�ӹǹ������

            for ($e2 = 0; $e2 < $b2; $e2++) {

                if (!empty($a2[$e2])) {
                    if ($e2 == 0) {
                        $j = 1;
                    } else {
                        if ($a2[$e2] == $a2[$e2 - 1]) {
                            $j = $j;
                        } else {
                            $j = $j + 1;
                        }
                    }
                    if ($e2 == 0) {
                        $k = 1;
                    } else {
                        if ($a2[$e2] == $a2[$e2 - 1]) {
                            $k = $k + 1;
                        } else {
                            $k = 1;
                        }
                    }
                    if ($j == 1 and $k == 1) {
                        $bet2 = $j . "-" . $k . "-" . $a2[$e2];
                    } else {
                        $bet2 = $bet2 . "," . $j . "-" . $k . "-" . $a2[$e2];
                    }
                }
            }

////////////////////////////////////////////////////////////////////////////////////////////////////					 		 				 
            //echo $bet1."<br>".$bet2;
            //////////////////////////////////////////////////////////////////////////////////////////////

            $a4 = explode(",", $bet1);//�Ѵ����ͧ�����͡
            $b4 = count($a4);//�Ѻ�ӹǹ������
            $idd = 1;
            for ($e4 = 0; $e4 < $b4; $e4++) {
                $bb1 = $b1 . "," . $a4[$e4];

                $co1 = Check_no_bet($a4[$e4], 1);
                $co2 = Check_no_bet($a4[$e4], 2);
                $co3 = Check_no_bet($a4[$e4], 2);

                /////////////////////////////////////////////////////////////////////////////////////////////
                $col_ck1 = $co1 - 1;
                $col_ck2 = $co1 - 2;
                $col_ck3 = $co1 - 1;

                $col_max1 = Check_max_bet($bb1, $col_ck1);
                $col_max2 = Check_max_bet($bb1, $col_ck2);
                $col_max3 = Check_max_bet($bb1, $col_ck3);
                if ($co2 == 1) {
                    if ($col_max1 == $col_max2) {
                        $status1 = 2;
                        $re = "case2.1";
                        //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.1<br>";
                    } else {
                        $status1 = 1;
                        $re = "case2.2";
                        //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.2<br>";
                    }

                } else {
                    //echo $co2."----".$col_max3;
                    if ($co2 <= $col_max3) {
                        $status1 = 2;
                        $re = "case1.1";
                        //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.1<br>";
                    } else {
                        $cc = $co2 - $col_max3;
                        if ($co2 > $col_max3 and $cc == 1) {
                            $status1 = 1;
                            $re = "case1.2";
                            //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.1<br>";
                        } else {
                            $status1 = 2;
                            $re = "case1.3";
                            //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.1<br>";
                        }
                    }
                }
            }
            $re1 = $status1;
            //////////////////////////////////////////////////////////////////////////////////////////////

            $a4 = explode(",", $bet2);//�Ѵ����ͧ�����͡
            $b4 = count($a4);//�Ѻ�ӹǹ������
            $idd = 1;

            for ($e4 = 0; $e4 < $b4; $e4++) {
                $bb1 = $bb1 . "," . $a4[$e4];
                $co1 = Check_no_bet($a4[$e4], 1);
                $co2 = Check_no_bet($a4[$e4], 2);
                $co3 = Check_no_bet($a4[$e4], 2);

                /////////////////////////////////////////////////////////////////////////////////////////////


                $col_ck1 = $co1 - 1;
                $col_ck2 = $co1 - 2;
                $col_ck3 = $co1 - 1;
                $col_max1 = Check_max_bet($bb1, $col_ck1);
                $col_max2 = Check_max_bet($bb1, $col_ck2);
                $col_max3 = Check_max_bet($bb1, $col_ck3);
                if ($co2 == 1) {
                    if ($col_max1 == $col_max2) {
                        $status2 = 2;
                        $re = "case2.1";
                        //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.1<br>";
                    } else {
                        $status2 = 1;
                        $re = "case2.2";
                        //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.2<br>";
                    }

                } else {
                    //echo $co2."----".$col_max3;
                    if ($co2 <= $col_max3) {
                        $status2 = 2;
                        $re = "case1.1";
                        //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.1<br>";
                    } else {
                        $cc = $co2 - $col_max3;
                        if ($co2 > $col_max3 and $cc == 1) {
                            $status2 = 1;
                            $re = "case1.2";
                            //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.1<br>";
                        } else {
                            $status2 = 2;
                            $re = "case1.3";
                            //$kk = $col_ck1."/".$col_ck2."MAX ". $col_max1."/".$col_max2."==case 2.1<br>";
                        }
                    }
                    /////////////////////////////////////////////////////////////////////////

                }
            }
            ////////////////////////////////////////////////////////////////////////////////////////////

            $re2 = $status2;

            if ($key == 1) {
                if ($re1 == "2") {
                    return "images/Bigeye/B.png";
                }
                if ($re1 == "1") {
                    return "images/Bigeye/P.png";
                }
                if ($re1 == "0") {
                    return "images/Bigeye/T.gif";
                } else {
                    return "images/Bigeye/T.gif";
                }
            } else {
                if ($re2 == "2") {
                    return "images/Bigeye/B.png";
                }
                if ($re2 == "1") {
                    return "images/Bigeye/P.png";
                }
                if ($re2 == "0") {
                    return "images/Bigeye/T.gif";
                } else {
                    return "images/Bigeye/T.gif";
                }

            }
        }
    } else {
        return "images/Bigeye/T.gif";
    }
}

?>

