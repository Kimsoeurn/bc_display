<?php
require_once "phpconfig.php";
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
//        $win2 = "";
        if ($win2 == "999") {
            header("Location:select_table.php");
        } else {
            if ($win2 == "101" or
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
//                $result11 = mysqli_query($conn, $strSQL11);
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

            } else {
                if ($win2 == "/") {
                    header("Location:close.php");
                } else {
                    if ($win2 == "*") {

                        $strSQL11 = "SELECT * from table_detail where table_no like'%$table_num' and bet_max = '$bet_max' and status ='1'  and shoe_no='$shoe' ";
                        $rs11 = sql_query($strSQL11);
                        $id = $rs11['id'];
                        $strSQL2 = "UPDATE table_detail SET status = '0' where id = '$id' ";
                        mysqli_query($GLOBALS['db'], $strSQL2) or die ("��á�͡�������բ�ͼԴ��Ҵ�Դ���  ��سҵ�Ǩ�ͺ���ա����1") . mysqli_error();
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
                        }


                    } else {
                        if ($win2 == "-") {
                            $strSQL11 = "SELECT * from table_detail where table_no = '$table_num' and bet_max = '$bet_max' and status ='1'  and shoe_no='$shoe' ";
//                $result11 = mysqli_query($conn, $strSQL11);
//                $result11 = mysqli_query($conn, $strSQL11);
                            $rs = sql_query($strSQL11);
                            $a1 = explode(",", $rs['bet1']);//�Ѵ����ͧ�����͡
                            $b1 = count($a1);//�Ѻ�ӹǹ������
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


///////////////////////////////
                            $strSQL = "UPDATE table_detail SET bet1 = '$bet_data',sum_p = '$sum_p' ,sum_b = '$sum_b' , sum_t = '$sum_t' ,sum_pb = '$sum_pb' ,sum_pp = '$sum_pp' Where table_no = '$table_num' and bet_max = '$bet_max' and status ='1'  and shoe_no='$shoe' ";
                            mysqli_query($GLOBALS['db'], $strSQL) or die ("��á�͡�������բ�ͼԴ��Ҵ�Դ���  ��سҵ�Ǩ�ͺ���ա����") . mysqli_error();

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
                    }
                }
            }
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
        $win2 = "";

        ?>