<?php
function sql_query($sql) {
    $result = mysqli_query($GLOBALS['db'], $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    return $row;
}

function open_db() {
    $conn = mysqli_connect('localhost', 'root', 'root');
//		 mysql_query("SET NAMES 'tis620' ");
    if (!$conn) die("Failed connect to database");

    mysqli_select_db($conn, 'scroll') or die ("Failed select database");
    return $conn;
}

function close_db() {
    mysqli_close(open_db());
}

function get_bets() {

}


/**
 * Check player result
 * @param $winner
 */
function checkResult($win2, $table_num, $bet_max, $shoe) {
    if ($win2 == 30) {
        $win2 = 300;
    }
    if ($win2 == 31) {
        $win2 = 310;
    }
    if ($win2 == 32) {
        $win2 = 320;
    }
    if ($win2 == 33) {
        $win2 = 330;
    }
    $strSQL11 = "SELECT * from table_detail where table_no = '$table_num' and bet_max = '$bet_max' and status ='1' ";
    $rs = sql_query($strSQL11);
    $sum_pp = $rs['sum_pp'];
    $sum_pb = $rs['sum_pb'];
    $sum_p = $rs['sum_p'];
    $sum_b = $rs['sum_b'];
    $sum_t = $rs['sum_t'];
    if (substr($win2, 0, 1) == 1) {
        $sum_p++;
        $win3 = 1;
    } //Sum Player
    if (substr($win2, 0, 1) == 2) {
        $sum_b++;
        $win3 = 2;
    } //Sum Banker
    if (substr($win2, 0, 1) == 3) {
        $sum_t++;
        $win3 = 3;
    } //Sum Tie
    if (substr($win2, 1, 1) == 1) {
        $sum_pp++;
    } //Sum Pair Player
    if (substr($win2, 1, 1) == 2) {
        $sum_pb++;
    } //Sum Pair Banker
    if (substr($win2, 1, 1) == 3) {
        $sum_pb++;
        $sum_pp++;
    } //Sum Pair Banker
    /////////////////////////////
    $roundDate = $rs['round_date'];
    if (empty($rs['bet1']) or $rs['bet1'] == "") {
        $kkk = 0;
        $bet_1 = sprintf("%03d", $kkk) . $win2;
        $strSQL = "UPDATE table_detail SET bet1 = '$bet_1', sum_p = '$sum_p' ,sum_b = '$sum_b' , sum_t = '$sum_t' ,sum_pb = '$sum_pb' ,sum_pp = '$sum_pp'  Where table_no = '$table_num' and bet_max = '$bet_max' and status ='1' and shoe_no='$shoe'  ";
        mysqli_query($GLOBALS['db'], $strSQL) or die ("��á�͡�������բ�ͼԴ��Ҵ�Դ���  ��سҵ�Ǩ�ͺ���ա����") . mysqli_error();
        AddBigRoadTable();
    } else {
        $kkk = 0;
        $bet_1 = $rs['bet1'] . "," . sprintf("%03d", $kkk) . $win2;
        $strSQL = "UPDATE table_detail SET bet1 = '$bet_1', sum_p = '$sum_p' ,sum_b = '$sum_b' , sum_t = '$sum_t' ,sum_pb = '$sum_pb' ,sum_pp = '$sum_pp'  Where table_no = '$table_num' and bet_max = '$bet_max' and status ='1' and shoe_no='$shoe'  ";
        mysqli_query($GLOBALS['db'], $strSQL) or die ("��á�͡�������բ�ͼԴ��Ҵ�Դ���  ��سҵ�Ǩ�ͺ���ա����") . mysqli_error();
        AddBigRoadTable();
    }

    $sql = "select  bet1,round_date  from table_detail where status  ='1' ";
    $rss99 = sql_query($sql);
    $bet99 = $rss99['bet1'];
    $sql1 = "select   bet1  from table_sc1  ";
    $result1 = mysqli_query($GLOBALS['db'], $sql1);
    $num1 = mysqli_num_rows($result1);
    $b1 = $rss99['bet1'];
    $roundDate = $rss99['round_date'];
    if (empty($num1)) {
        $strSQL99 = "INSERT INTO table_sc1 (bet1,round_date) VALUES ('$b1', '$roundDate' )";
        mysqli_query($GLOBALS['db'], $strSQL99);
        if (!empty($win2)) {
            AddBigRoadTable();
            AddCockRoachRoad();
            AddBigEyeBoard();
            addSmallRoad();
        }
    } else {
        $strSQL99 = "UPDATE table_sc1 SET bet1='$b1', round_date ='$roundDate' ";
        mysqli_query($GLOBALS['db'], $strSQL99);
        if (!empty($win2)) {
            AddBigRoadTable();
            AddCockRoachRoad();
            AddBigEyeBoard();
            addSmallRoad();
        }
    }

}

/**
 * Check banker result
 * @param $winner
 */
function bankerResult($winner) {

}


/**
 * Check tie result
 * @param $winner
 */
function tieResult($winner) {

}

function newShoe($table_num, $shoe, $bet_max, $bet_min, $tie_max, $tie_min, $pair_max, $pair_min) {

    $strSQL11 = "SELECT * from table_detail where table_no like'%$table_num' and bet_max = '$bet_max' and status ='1'  and shoe_no='$shoe' ";
    $rs11 = sql_query($strSQL11);
    $id = $rs11['id'];
    $date7 = $rs11['round_date'];
    $strSQL2 = "UPDATE table_detail SET status = '0' where id = '$id' ";
    mysqli_query($GLOBALS['db'], $strSQL2) or die ("Can not insert datat") . mysqli_error();
    $strSQL3 = "UPDATE table_road  set co ='', ro =''  ,status ='' ,rm=''  ";
    mysqli_query($GLOBALS['db'], $strSQL3) or die ("Can not insert data") . mysqli_error();
    $strSQL3 = "UPDATE table_road1  set co ='', ro =''  ,status ='' ,rm=''  ";
    mysqli_query($GLOBALS['db'], $strSQL3) or die ("Can not insert data") . mysqli_error();
    $strSQL3 = "UPDATE table_road2  set co ='', ro =''  ,status ='' ,rm=''  ";
    mysqli_query($GLOBALS['db'], $strSQL3) or die ("Can not insert data") . mysqli_error();
    $strSQL3 = "UPDATE table_road3  set co ='', ro =''  ,status ='' ,rm=''  ";
    mysqli_query($GLOBALS['db'], $strSQL3) or die ("Can not insert data") . mysqli_error();

    if (Chk_table_status($bet_max, $table_num, $date7) == "no") {

        $strSQL3 = "SELECT id from table_detail where table_no = '$table_num' and bet_max = '$bet_max' and status !='1' and round_date = '$date7' ";
        $result3 = mysqli_query($GLOBALS['db'], $strSQL3);
        $num3 = mysqli_num_rows($result3) + 1;
        $strSQL4 = "INSERT INTO table_detail (table_no,shoe_no,bet_max,bet_min,tie_max,tie_min,pair_max,pair_min,round_date,status) VALUES ('$table_num','$num3','$bet_max','$bet_min','$tie_max','$tie_min','$pair_max','$pair_min','$date7','1')";
        mysqli_query($GLOBALS['db'], $strSQL4) or die ("Can not insert data") . mysqli_error();
        $strSQL3 = "UPDATE table_road  set co ='', ro =''  ,status ='' ,rm ='' ";
        mysqli_query($GLOBALS['db'], $strSQL3) or die ("Can not insert data") . mysqli_error();
        $strSQL3 = "UPDATE table_road1  set co ='', ro =''  ,status ='' ,rm ='' ";
        mysqli_query($GLOBALS['db'], $strSQL3) or die ("Can not insert data") . mysqli_error();
        $strSQL3 = "UPDATE table_road2  set co ='', ro =''  ,status ='' ,rm ='' ";
        mysqli_query($GLOBALS['db'], $strSQL3) or die ("Can not insert data") . mysqli_error();
        $strSQL3 = "UPDATE table_road3  set co ='', ro =''  ,status ='' ,rm=''  ";
        mysqli_query($GLOBALS['db'], $strSQL3) or die ("Can not insert data") . mysqli_error();
        header("Location:index.php");
        exit();
    }
}

function undoResult($table_num, $bet_max, $shoe) {
    $strSQL11 = "SELECT * from table_detail where table_no = '$table_num' and bet_max = '$bet_max' and status ='1'  and shoe_no='$shoe' ";
    $rs = sql_query($strSQL11);
    $sum_p = $rs['sum_p'];
    $sum_b = $rs['sum_b'];
    $sum_t = $rs['sum_t'];
    $sum_pb = $rs['sum_pb'];
    $sum_pp = $rs['sum_pp'];
    $a1 = explode(",", $rs['bet1']);
    $b1 = count($a1);
//check bet data
    if (empty($rs['bet1'])) {
        $bb = "";
    } else {
        $bb = $rs['bet1'];
    }
    $tt = array_pop($a1);
    if (strlen($bb) - strlen($tt) - 1 < 0) {
        $num_text = 0;
    } else {
        $num_text = strlen($bb) - strlen($tt) - 1;
    }
    $bet_data = iconv_substr($bb, 0, $num_text);
//check sum bet
    if (substr($tt, 3, 1) == "1") {
        $sum_p = $rs['sum_p'] - 1;
    } else {
        $sum_p = $rs['sum_p'];
    } //Sum Player
    if (substr($tt, 3, 1) == "2") {
        $sum_b = $rs['sum_b'] - 1;
    } else {
        $sum_b = $rs['sum_b'];
    } //Sum Banker
    if (substr($tt, 3, 1) == "3") {
        $sum_t = $rs['sum_t'] - 1;
    } else {
        $sum_t = $rs['sum_t'];
    } //Sum Tie
////check sum pair
    if (substr($tt, 4, 1) == "1") {
        $sum_pp = $rs['sum_pp'] - 1;
        $sum_pb = $rs['sum_pb'];
    } else {
        if (substr($tt, 4, 1) == "2") {
            $sum_pb = $rs['sum_pb'] - 1;
            $sum_pp = $rs['sum_pp'];
        } else {
            if (substr($tt, 4, 1) == "3") {
                $sum_pp = $rs['sum_pp'] - 1;
                $sum_pb = $rs['sum_pb'] - 1;
            } else {
                $sum_pb = $rs['sum_pb'];
                $sum_pp = $rs['sum_pp'];
            }
        }
    }

    $strSQL = "UPDATE table_detail SET 
                        bet1 = '$bet_data',
                        sum_p = '$sum_p',
                        sum_b = '$sum_b', 
                        sum_t = '$sum_t',
                        sum_pb = '$sum_pb',
                        sum_pp = '$sum_pp' 
                        WHERE table_no = '$table_num'
                        AND bet_max = '$bet_max' 
                        AND status ='1' 
                        AND shoe_no='$shoe' ";

    mysqli_query($GLOBALS['db'], $strSQL) or die ("Can not update") . mysqli_error();

    $sql = "select  id  from table_road where co  !='0' order by id DESC";

    $rss99 = sql_query($sql);
    $id99 = $rss99['id'];
    $strSQL3 = "UPDATE table_road  set co ='', ro =''  ,status ='' ,rm ='' where id= '$id99' ";
    mysqli_query($GLOBALS['db'], $strSQL3) or die ("Can not insert data") . mysqli_error();

    $sql = "select  id  from table_road1 where co  !='0' order by id DESC";
    $rss99 = sql_query($sql);
    $id99 = $rss99['id'];
    $strSQL3 = "UPDATE table_road1  set co ='', ro =''  ,status ='' ,rm ='' where id= '$id99' ";
    mysqli_query($GLOBALS['db'], $strSQL3) or die ("Can not insert data") . mysqli_error();

    $sql = "select  id  from table_road2 where co  !='0' order by id DESC";
    $rss99 = sql_query($sql);
    $id99 = $rss99['id'];
    $strSQL3 = "UPDATE table_road2  set co ='', ro =''  ,status ='' ,rm ='' where id= '$id99' ";
    mysqli_query($GLOBALS['db'], $strSQL3) or die ("Can not insert data") . mysqli_error();

    $sql = "select  id  from table_road3 where co  !='0' order by id DESC";
    $rss99 = sql_query($sql);
    $id99 = $rss99['id'];
    $strSQL3 = "UPDATE table_road3  set co ='', ro =''  ,status ='' ,rm ='' where id= '$id99' ";
    mysqli_query($GLOBALS['db'], $strSQL3) or die ("Can not insert data") . mysqli_error();
}

function dd($data) {
    var_dump($data);
    die();
}

function AddBigRoadTable() {
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

        $a4 = explode(",", $bet);
        $b4 = count($a4);
        $idd = 1;
        $bb1 = "";
//$a = explode("-", $a4[1]);
        $co1 = 0;
        $co2 = 0;
        $co3 = 0;
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
        $a2 = explode(",", $data_bet);
        $b2 = count($a2);
        $num = 1;
        $coo1 = 1;
        $data = [];
        for ($e2 = 0; $e2 < $b2; $e2++) {

            $ck_bet1 = $a2[$e2];
//        $ck_bet2 = $a2[$e2];
//        $ck_bet3 = $a2[$e2];
            $ck_bet2 = $e2 >= 1 ? $a2[$e2 - 1] : $a2[$e2];
            $ck_bet3 = $e2 >= 2 ? $a2[$e2 - 1] : $a2[$e2];
            $data['ck1'][] = $ck_bet1;    
            $data['ck2'][] = $ck_bet2;    
            $data['ck3'][] = $ck_bet3;    
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
            $j = $e2 + 1;
            $strSQL4 = "update table_road3 set  rm='$rm'   where id ='$j' and co !='0' ";
            mysqli_query($GLOBALS['db'], $strSQL4) or die ("Can not insert data") . mysqli_error();
            $str8 = "SELECT rm from table_road3 where rm='$rm' and co !='0' ";
            $result8 = mysqli_query($GLOBALS['db'], $str8);
            $nr = mysqli_num_rows($result8);
            // if ($nr > 1) {
            //     $rm = $rm + 5;
            //     $strSQL4 = "update table_road3 set  rm='$rm'   where id ='$j' and co !='0' ";
            //     mysqli_query($GLOBALS['db'], $strSQL4) or die ("Can not insert data") . mysqli_error();

            // }
        }

        $str8 = "SELECT max(rm) as rmm from table_road3   ";
        $result8 = mysqli_query($GLOBALS['db'], $str8);
        $rs = mysqli_fetch_array($result8, MYSQLI_ASSOC);
        $rmm = $rs['rmm'];
        $strSQL4 = "update  table_detail set  mk='$rmm'   where status='1' ";
        mysqli_query($GLOBALS['db'], $strSQL4) or die ("Can not insert data") . mysqli_error();
    }
}

function AddCockRoachRoad() {
    $sql88 = "select bet1  from   table_sc1   ";
    $rs88 = sql_query($sql88);
    $bet = "";
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
        $a4 = explode(",", $bet);
        $b4 = count($a4);
        $idd = 1;
        $co1 = 0;
        $co2 = 0;
        $co3 = 0;
//    dd(Check_no_bet($a4[0], 2));
        $bb1 = "";
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
            //////////////////////////////////////////////////////////////////////////////////////////
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

        ////////////////////////////////////////////////////////////////////////////////////////////
        $str = "SELECT * from table_road where co !='0'  order by id";
        $result = mysqli_query($GLOBALS['db'], $str);
        $i = 0;
        $v = 0;
        $data_bet = "";
        while ($rs = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            if ($i == 0) {
                $data_bet = $rs['status'];
            } else {
                $data_bet = $data_bet . "," . $rs['status'];
            }
            $i++;
        }
        $a2 = !empty($data_bet) ? explode(",", $data_bet) : [];//�Ѵ����ͧ�����͡
        $b2 = count($a2);//�Ѻ�ӹǹ������
        $num = 1;
        $coo1 = 1;
        for ($e2 = 0; $e2 < $b2; $e2++) {

            $ck_bet1 = $e2 > 0 ? $a2[$num] : "";
            $ck_bet2 = $e2 > 1 ? $a2[$num - 1] : "";
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

    }
}

function AddBigEyeBoard() {
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
        $bb1 = "";
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
    $result = mysqli_query($GLOBALS['db'],$str);
    $i = 0;
    $v = 0;
    $data_bet = "";
    while ($rs = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        if ($i == 0) {
            $data_bet = $rs['status'];
        } else {
            $data_bet = $data_bet . "," . $rs['status'];
        }
        $i++;
    }
    $a2 = !empty($data_bet) ? explode(",", $data_bet) : [];
    $b2 = count($a2);
    $num = 1;
    $coo1 = 1;
    for ($e2 = 0; $e2 < $b2; $e2++) {
        $ck_bet1 = $e2 > 0 ? $a2[$num] : "";
        $ck_bet2 = $e2 > 1 ? $a2[$num - 1] : "";
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
}

function addSmallRoad() {
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
        $bb1 = "";
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
    $data_bet = "";
    while ($rs = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        if ($i == 0) {
            $data_bet = $rs['status'];
        } else {
            $data_bet = $data_bet . "," . $rs['status'];
        }
        $i++;
    }

    $a2 = !empty($data_bet) ? explode(",", $data_bet) : [];
    $b2 = count($a2);
//    dd($a2);
    $num = 1;
    $coo1 = 1;
    for ($e2 = 0; $e2 < $b2; $e2++) {

        $ck_bet1 = $e2 > 0 ? $a2[$num] : "";
        $ck_bet2 = $e2 > 1 ? $a2[$num - 1] : "";
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
