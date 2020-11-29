<?php
require_once( "phpconfig.php" );
require_once( "time1.php" );
require_once("core.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Baccarat Display</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="mylayout.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="main.css" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <style type="text/css">
        body {
            font-family: 'Kanit', sans-serif !important;
        }
    </style>

</head>
<body>
<body onload=" initAd(); document.all.win2.focus()" class="baccarat-display p-4">
<?php
$win2 = "";
$table_num = $_GET['table_number'] ?? "DT9";
$bet_max = $_GET['bet_max'] ?? 8000;
$shoe = $_GET['shoe'] ?? 1;
$bg_img = "";
?>
<form method="POST" action="add_bet.php" >
    <table style="width: 100%;">
        <?php
//        Conn2DB();
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
        $table_num =$rs1['table_no'];
        ?>

        <input name="table_num" type="hidden" value="<?php echo $table_num; ?>" />
        <input name="shoe_num" type="hidden" value="<?php echo $rs1['shoe_no']; ?>" />
        <input name="shoe" type="hidden" value="<?php echo $shoe; ?>" />
        <input name="game_num" type="hidden" value="<?php echo $rs1['status']; ?>" />
        <input name="bet_max" type="hidden" value="<?php echo $rs1['bet_max']; ?>" />
        <input name="bet_min" type="hidden" value="<?php echo $rs1['bet_min'] ?>" />
        <input name="tie_max" type="hidden" value="<?php echo $rs1['tie_max'] ?>" />
        <input name="tie_min" type="hidden" value="<?php echo $rs1['tie_min'] ?>" />
        <input name="pair_max" type="hidden" value="<?php echo $rs1['pair_max'] ?>" />
        <input name="pair_min" type="hidden" value="<?php echo $rs1['pair_min'] ?>" />
        <input name="bg_img" type="hidden" value="<?php echo $bg_img; ?>" />

        <tr>
            <td height="50%" scope="col"><?php $a= rand ( 1 , 3 )?>
                <div align="left">
                    <img src="images/LOGO_GDC.png" class="img-fluid float-left" width="150px">
                    <span style="color:#FFFFFF; font-size:9px; font-weight:bold; float: left; margin-top: 40px;">
                  <h1 class="text-uppercase mt-6 pl-3">Diamond City Baccarat Display</h1>
            </span>
                </div>
                <div align="center">
                    <!--<img src="<?php if($a ==1){echo "images/BigEyeRoad/pp.png";}else{ if($a==2){echo "images/BigEyeRoad/bb.png";}else{echo "images/BigEyeRoad/tt.png";}}?>" width="30" height="30" /> --></div></td>
            <td width="20%" align="left" valign="middle" scope="col" >
                <span class="style1" style="padding-left:10px; padding-top: 55px; font-size: 28px;">Table: <?=$table_num?></span>
            </td>
            <td width="148" scope="col">&nbsp;</td>
            <td width="116" align="left" scope="col">
            <span class="style1" style="padding-left:10px; padding-top: 22px; font-size: 28px;">
                Shoe: <?=$rs1['shoe_no'];?>
            </span>
            </td>
            <td width="116" scope="col">&nbsp;</td>
            <td width="105" align="left" valign="middle" scope="col">
            <span class="style1" style="padding-left:10px; padding-top: 22px; font-size: 28px;">
                <?php if($rs1['status']==1){echo "OPEN";}else{echo "CLOSE ";}?>
            </span>
            </td>
            <td width="56" align="left" valign="middle" scope="col"></td>
            <td width="30" align="left" valign="middle" scope="col">
            <span class="style1" style="padding-left:10px; padding-top: 22px;">
                <input name="win2" type="text" id="win2" value="<?php echo $win2; ?>" size="3" maxlength="3" autocomplete="off"/>
            </span>
            </td>
        </tr>
    </table>
</form>
<table style="width: 100%;" height="224" class="table-border mt-3">
    <!-- ??? 1 -->
    <?php
    $sql88 = "select *  from table_detail where table_no = '$table_num' and bet_max = '$bet_max' and  status = '1'  ";
//    $result88 = mysqli_query($conn, $sql88);
    $rs88 = sql_query($sql88);
    $sum_b = $rs88['sum_b'];
    $sum_p = $rs88['sum_p'];
    $sum_t = $rs88['sum_t'];
    $sum_pb = $rs88['sum_pb'];
    $sum_pp = $rs88['sum_pp'];

    /////Shift table Left

    $c1 = explode(",",$rs88['bet1']);
    if($rs88['mk'] <= 174){
        $d1=1;$d2=2;$d3=3;$d4=4;$d5=5;$d6=6;$d7=7;$d8=8;$d9=9;
        $e1=174;$e2=175;$e3=176;$e4=177;$e5=178;$e6=179;$e7=180;$e8=181;$e9=182;
    }else{
        $s=ceil(($rs88['mk']-174)/6)*6;
        $d1=1+$s;$d2=2+$s;$d3=3+$s;$d4=4+$s;$d5=5+$s;$d6=6+$s;$d7=7+$s;$d8=8+$s;$d9=9+$s;
        $e1=174+$s;$e2=175+$s;$e3=176+$s;$e4=177+$s;$e5=178+$s;$e6=179+$s;$e7=180+$s;$e8=181+$s;$e9=182+$s;
    }
    ?>
    <tr>

        <?php for($t1=$d1; $t1 <= $e1 ; ){?>
            <td  height="32" width="32"  scope="col">
                <div align="center" class="style3">
                    <img src="<?php echo Chk_bet($t1,$table_num,$bet_max,$win2,$shoe)?>" width="36" height="36" />
                </div>
            </td>
        <?php $t1= $t1+6; }?>
    </tr>
    <tr>
        <?php for($t1=$d2; $t1 <= $e2 ; ){?>
        <td  height="32" width="32"  scope="col">
            <div align="center" class="style3">
                <img src="<?php echo Chk_bet($t1,$table_num,$bet_max,$win2,$shoe)?>" width="36" height="36" />
            </div>
        </td>
        <?php $t1= $t1+6; }?>
    </tr>
    <tr>
        <?php for($t1=$d3; $t1 <= $e3 ; ){?>
        <td  height="32" width="32"  scope="col">
            <div align="center" class="style3">
                <img src="<?php echo Chk_bet($t1,$table_num,$bet_max,$win2,$shoe)?>" width="36" height="36" />
            </div>
        </td>
        <?php $t1= $t1+6; }?>
    </tr>
    <tr>
        <?php for($t1=$d4; $t1 <= $e4 ; ){?>
            <td  height="32" width="32"  scope="col">
                <div align="center" class="style3">
                    <img src="<?php echo Chk_bet($t1,$table_num,$bet_max,$win2,$shoe)?>" width="36" height="36" />
                </div>
            </td>
            <?php $t1= $t1+6; }?>
    </tr>
    <tr>
        <?php for($t1=$d5; $t1 <= $e5 ; ){?>
            <td  height="32" width="32"  scope="col">
                <div align="center" class="style3">
                    <img src="<?php echo Chk_bet($t1,$table_num,$bet_max,$win2,$shoe)?>" width="36" height="36" />
                </div>
            </td>
            <?php $t1= $t1+6; }?>
    </tr>
    <tr>
        <?php for($t1=$d6; $t1 <= $e6 ; ){?>
            <td  height="32" width="32"  scope="col">
                <div align="center" class="style3">
                    <img src="<?php echo Chk_bet($t1,$table_num,$bet_max,$win2,$shoe)?>" width="36" height="36" />
                </div>
            </td>
            <?php $t1= $t1+6; }?>
    </tr>
</table>
<table width="100%" class="table-border" height="220" cellpadding="1"   cellspacing="0"  >
    <tr>
        <th width="50%" height="103" style="vertical-align:top; padding-top:6px;"  scope="col" >
            <!------------------------------------------------------------------------------------------->
            <?php include "inc/table_1.php"; ?>
        </th>
        <th width="50%" height="97" style="vertical-align:top ; padding-top:6px; padding-left: 8px"  scope="col" >
            <?php include "inc/table_2.php"; ?>
        </th>

    </tr>
    <tr>
        <th scope="col" style="vertical-align:top; padding-top:6px;" >
            <!-------------------------------------------------------->
            <?php include "inc/table_3.php"; ?>
            <!------------------------------------------------------------>
        </th>
        <th width="50%" height="109" style="vertical-align:top; padding-top:6px; padding-left: 8px;" scope="col" >
            <table width="100%" class="table-border" height="109">
                <tr>
                    <td width="25%" scope="col">
                        <h6 class="text-center" style="color: blue; padding: 0; margin: 0; font-size: 18px;">Player</h6>
                    </td>
                    <td width="25%"   scope="col"  ><div id='P1' style="padding-top:8px;" align="center"></div></td>
                    <td width="25%"  scope="col" ><div id='P2' style="padding-top:8px;" align="center"> </div></td>
                    <td width="25%"   scope="col"  ><div id='P3' style="padding-top:8px;" align="center"></div> </td>
                </tr>
                <tr>
                    <td scope="col">
                        <h6 class="text-center" style="color: red; padding: 0; margin: 0; font-size: 18px;">Banker</h6>
                    </td>
                    <td scope="col" valign="top"><div  id='P4' style="vertical-align:top; padding-top:7px"   align="center"></div></td>
                    <td scope="col" valign="top"><div   id='P5' style="vertical-align:top; padding-top:7px"   align="center"></div></td>
                    <td scope="col" valign="top"><div  id='P6' style="vertical-align:top; padding-top:7px"   align="center"></div></td>
                </tr>
            </table>

        </th>
    </tr>
</table>
<table style="width: 100%; margin-top: 6px;">
    <tr>
        <th width="50%" valign="top">
            <table class="table-border" height="344px">
                <?php
                $sql88 = "select bet1 from table_detail where table_no = '$table_num' and bet_max = '$bet_max' and  status = '1'  ";
                $rs88= sql_query($sql88);

                /////Shift table Left

                $c1 = explode(",",$rs88['bet1']);
                $bet999 =count($c1) ;
                if($bet999 <= 84){
                    $d1=1;$d2=2;$d3=3;$d4=4;$d5=5;$d6=6;$d7=7;$d8=8;$d9=9;
                    $e1=84;$e2=85;$e3=86;$e4=87;$e5=88;$e6=89;$e7=90;$e8=91;$e9=92;
                }else{
                    $s=ceil(($bet999-84)/6)*6;
                    $d1=1+$s;$d2=2+$s;$d3=3+$s;$d4=4+$s;$d5=5+$s;$d6=6+$s;$d7=7+$s;$d8=8+$s;$d9=9+$s;
                    $e1=84+$s;$e2=85+$s;$e3=86+$s;$e4=87+$s;$e5=88+$s;$e6=89+$s;$e7=90+$s;$e8=91+$s;$e9=92+$s;
                }
                ?>


                <tr>

                    <?php for($t1=$d1; $t1 <= $e1 ; ){ ?>
                        <td width="617" height="42" scope="col" valign="top"   ><div align="center" style="padding-top:5px">
                                <img src="<?php echo Chk_bet2($t1,$table_num,$bet_max,$win2,$shoe)?>" alt="" class="img-fluid" />
                            </div></td>
                    <?php $t1= $t1+6;}?>
                </tr>
                <tr>
                    <?php for($t1=$d2; $t1 <= $e2 ; ){?>
                        <td width="617" height="42" scope="col" valign="top" > <div align="center" style="padding-top:3px">   <img src="<?php echo Chk_bet2($t1,$table_num,$bet_max,$win2,$shoe)?>" alt="" class="img-fluid" /> </div></td>
                    <?php $t1= $t1+6;}?>
                </tr>
                <tr>
                    <?php for($t1=$d3; $t1 <= $e3 ; ){?>
                        <td width="617" height="42" scope="col" valign="top" ><div align="center" style="padding-top:1px">   <img src="<?php echo Chk_bet2($t1,$table_num,$bet_max,$win2,$shoe)?>" alt="" class="img-fluid"  /> </div></td>
                    <?php $t1= $t1+6;}?>
                </tr>
                <tr>
                    <?php for($t1=$d4; $t1 <= $e4 ; ){?>
                        <td width="617" height="42" scope="col" valign="top" > <div align="center" style="padding-top:1px">  <img src="<?php echo Chk_bet2($t1,$table_num,$bet_max,$win2,$shoe)?>" alt="" class="img-fluid"  /> </div></td>
                    <?php $t1= $t1+6;}?>
                </tr>
                <tr>
                    <?php for($t1=$d5; $t1 <= $e5 ; ){?>
                        <td width="617" height="42" scope="col" valign="top" > <div align="center" style="padding-top:0px">  <img src="<?php echo Chk_bet2($t1,$table_num,$bet_max,$win2,$shoe)?>" alt="" class="img-fluid"  /> </div></td>
                    <?php $t1= $t1+6;}?>
                </tr>
                <tr>
                    <?php for($t1=$d6; $t1 <= $e6; ){?>
                        <td width="617" height="42" scope="col" valign="top" > <div align="center"  style="padding-bottom:5px"  >  <img src="<?php echo Chk_bet2($t1,$table_num,$bet_max,$win2,$shoe)?>" alt="" class="img-fluid"  /> </div></td>
                    <?php $t1= $t1+6;}?>
                </tr>
            </table>
        </th>
        <th width="25%" valign="top" scope="col" style="padding-left: 8px">
            <div>
                <table class="table-result" style="width: 100%; background: #ffffff" height="344">
                    <tr style="color: red;">
                        <th style="width: 50%;">Banker</th>
                        <th><?php echo $sum_b?></th>
                    </tr>
                    <tr style="color: blue;">
                        <th style="width: 50%">Player</th>
                        <th><?php echo $sum_p?></th>
                    </tr>
                    <tr style="color: green;">
                        <th style="width: 50%">Tie</th>
                        <th><?php echo $sum_t?></th>
                    </tr>
                    <tr style="color: red;">
                        <th style="width: 50%">Banker Pairs</th>
                        <th><?php echo $sum_pb?></th>
                    </tr>
                    <tr style="color: blue;">
                        <th style="width: 50%">Player Pairs</th>
                        <th><?php echo $sum_pp?></th>
                    </tr>
                    <tr class="text-info">
                        <th style="width: 50%">Games</th>
                        <th><?php echo ($sum_pp + $sum_b + $sum_p + $sum_pb + $sum_t)?></th>
                    </tr>
                </table>
            </div>
        </th>
        <th width="25%" style="padding-left: 8px;">
            <?php $class99 = "#ffffff"; ?>
            <table style="width: 100%;" height="344px" class="table-result">
                <tr>
                    <td width="114" height="31"  bgcolor=" <?=$class99?>" ></td>
                    <td colspan="2" bgcolor=" <?=$class99?>" > <span  style=" float:right; padding-right:20px;font-size:14px; font-weight:bold;color:#000; ">MIN BET</span></td>
                    <td width="102" colspan="2"  bgcolor=" <?=$class99?>" ><span  style=" float:right; padding-right:40px; font-size:14px; font-weight:bold;color:#000;  ">MAX BET</span></td>
                </tr>
                <tr>
                    <td height="33"  bgcolor=" <?=$class99?>" ><span  style=" float:left; padding-left:5px;font-size:14px; font-weight:bold;color:#000; ">Player/Banker</span></td>
                    <td colspan="2" bgcolor=" <?=$class99?>" ><div align="right" class="style2" style="padding-right:0px"><span class="style2033" style="padding-right:5px;"><?php echo number_format($bet_min,0,'.',',')?></span></div>   </td>
                    <td colspan="2"  bgcolor=" <?=$class99?>" ><div align="right" class="style2" style="padding-right:3px"><span class="style2033"><?php echo number_format($bet_max,0,'.',',')?></span></div></td>
                </tr>
                <tr>
                    <td height="33"  bgcolor=" <?=$class99?>" ><span  style=" float:left; padding-left:45px;font-size:14px; font-weight:bold;color:#000; ">Tie</span></td>
                    <td colspan="2"  bgcolor=" <?=$class99?>" ><div align="right" class="style2034" style="padding-right:5px"><span class="style2034" style="padding-right:5px;"><?php echo number_format($tie_min,0,'.',',')?></span></div></td>
                    <td colspan="2" bgcolor=" <?=$class99?>"  ><div align="right" class="style2034" style="padding-right:5px"><span class="style2034"><?php echo number_format($tie_max,0,'.',',')?></span></div></td>
                </tr>
                <tr>
                    <td height="32"  bgcolor=" <?=$class99?>" ><span  style=" float:left; padding-left:45px;font-size:14px; font-weight:bold;color:#000; ">Pair</span></td>
                    <td colspan="2"  bgcolor=" <?=$class99?>" ><div align="right" class="style2034" style="padding-right:5px"><span class="style2034" style="padding-right:5px;"><?php echo number_format($pair_min,0,'.',',')?></span></div></td>
                    <td colspan="2"  bgcolor=" <?=$class99?>" ><div align="right" class="style2034" style="padding-right:5px"><span class="style2034"><?php echo number_format($pair_max,0,'.',',')?></span></div></td>
                </tr>
            </table>
        </th>
    </tr>
</table>
<!-- Winner Box-->
<script>
    <?php
    $p1 =Chk_net1(1);
    $p2 =Chk_net2(1);
    $p3 =Chk_net3(1);
    $p4 =Chk_net1(2);
    $p5 =Chk_net2(2);
    $p6 =Chk_net3(2);

    ?>

    document.getElementById("P1").innerHTML="<img src=\"<?php echo $p1?>\" alt=\"\" width=\"20\" height=\"20\" \/>";
    document.getElementById("P2").innerHTML="<img src=\"<?php echo $p2?>\" alt=\"\" width=\"20\" height=\"20\" \/>";
    document.getElementById("P3").innerHTML="<img src=\"<?php echo $p3?>\" alt=\"\" width=\"20\" height=\"20\" \/>";
    document.getElementById("P4").innerHTML="<img src=\"<?php echo $p4?>\" alt=\"\" width=\"20\" height=\"20\" \/>";
    document.getElementById("P5").innerHTML="<img src=\"<?php echo $p5?>\" alt=\"\" width=\"20\" height=\"20\" \/>";
    document.getElementById("P6").innerHTML="<img src=\"<?php echo $p6?>\" alt=\"\" width=\"20\" height=\"20\" \/>";

</script>
<!---////////////////////////////////////////////////////////////////////////////////////////////////---->
</body>
</html>