<?php
function sql_query($sql) {
    $result = mysqli_query($GLOBALS['db'], $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    return $row;
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
    if (empty($rs['bet1']) or $rs['bet1'] == "") {
        $kkk = 0;
        $bet_1 = sprintf("%03d", $kkk) . $win2;
        $strSQL = "UPDATE table_detail SET bet1 = '$bet_1', sum_p = '$sum_p' ,sum_b = '$sum_b' , sum_t = '$sum_t' ,sum_pb = '$sum_pb' ,sum_pp = '$sum_pp'  Where table_no = '$table_num' and bet_max = '$bet_max' and status ='1' and shoe_no='$shoe'  ";
        mysqli_query($GLOBALS['db'], $strSQL) or die ("��á�͡�������բ�ͼԴ��Ҵ�Դ���  ��سҵ�Ǩ�ͺ���ա����") . mysqli_error();
        Add_road_table4();
    } else {
        $kkk = 0;
        $bet_1 = $rs['bet1'] . "," . sprintf("%03d", $kkk) . $win2;
        $strSQL = "UPDATE table_detail SET bet1 = '$bet_1', sum_p = '$sum_p' ,sum_b = '$sum_b' , sum_t = '$sum_t' ,sum_pb = '$sum_pb' ,sum_pp = '$sum_pp'  Where table_no = '$table_num' and bet_max = '$bet_max' and status ='1' and shoe_no='$shoe'  ";
        mysqli_query($GLOBALS['db'], $strSQL) or die ("��á�͡�������բ�ͼԴ��Ҵ�Դ���  ��سҵ�Ǩ�ͺ���ա����") . mysqli_error();
        Add_road_table4();
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
            Add_road_table();
            Add_road_table2();
            Add_road_table3();
            Add_road_table4();
        }
    } else {
        $strSQL99 = "UPDATE table_sc1 SET bet1='$b1', round_date ='$roundDate' ";
        mysqli_query($GLOBALS['db'], $strSQL99);
        if (!empty($win2)) {
            Add_road_table();
            Add_road_table2();
            Add_road_table3();
            Add_road_table4();
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
        mysql_query($GLOBALS['db'], $strSQL3) or die ("Can not insert data") . mysqli_error();

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