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
<body class="baccarat-display">
<?php include "inc/modal_winner.php"; ?>
<div class="container-fluid">
    <?php
    $win2 = "";
    $table_num = $_GET['table_number'] ?? "DT9";
    $bet_max = $_GET['bet_max'] ?? 8000;
    $shoe = $_GET['shoe'] ?? 1;
    $bg_img = "";
    //        Conn2DB();
    $sql1 = "select * from table_detail where table_no = '$table_num' and bet_max = '$bet_max' and status = '1' and shoe_no ='$shoe' ";
    $rs1 = sql_query($sql1);
    $sum_b = $rs1['sum_b'];
    $sum_p = $rs1['sum_p'];
    $sum_t = $rs1['sum_t'];
    $sum_pb = $rs1['sum_pb'];
    $sum_pp = $rs1['sum_pp'];
    $bet_max = $rs1['bet_max'];
    $bet_min = $rs1['bet_min'];
    $tie_max = $rs1['tie_max'];
    $tie_min = $rs1['tie_min'];
    $pair_max = $rs1['pair_max'];
    $pair_min = $rs1['pair_min'];
    $table_num = $rs1['table_no'];

    ?>
    <div class="row">
        <div class="col-6">
            <img src="images/LOGO_GDC.png" class="img-fluid float-left mr-3" width="150px" alt="logo">
            <h1 class="text-white text-shadow" style="padding-top: 40px;" id="table-info"
                data-table="<?= $table_num ?>" data-shoe="<?= $shoe ?>" data-bet-max="<?= $bet_max ?>"
            >
                Diamond City Baccarat Display
            </h1>
        </div>
        <div class="col-4">
            <h3 class="text-white float-left text-shadow" style="padding-top: 45px;">Table: <span id="table-no"><?=$table_num?></span></h3>

        </div>
        <div class="col-2">
            <h3 class="text-white float-right text-shadow" style="padding-top: 45px;">Shoe: <span id="shoe-no"><?=$rs1['shoe_no'];?></span></h3>
        </div>
    </div>
    <div class="row no-gutters">
        <div class="col-11">
            <table class="table-b-e-c shadow-lg table-big-road" height="289px">
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
                    <td scope="col">
                        <div class="big-road-bet">
                            <img src="<?php echo Chk_bet($t1,$table_num,$bet_max,$win2,$shoe)?>" width="35" height="35" />
                        </div>
                    </td>
                    <?php $t1= $t1+6; }?>
            </tr>
            <tr>
                <?php for($t1=$d2; $t1 <= $e2 ; ){?>
                    <td scope="col">
                        <div class="big-road-bet">
                            <img src="<?php echo Chk_bet($t1,$table_num,$bet_max,$win2,$shoe)?>" width="35" height="35" />
                        </div>
                    </td>
                    <?php $t1= $t1+6; }?>
            </tr>
            <tr>
                <?php for($t1=$d3; $t1 <= $e3 ; ){?>
                    <td scope="col">
                        <div class="big-road-bet">
                            <img src="<?php echo Chk_bet($t1,$table_num,$bet_max,$win2,$shoe)?>" width="35" height="35" />
                        </div>
                    </td>
                    <?php $t1= $t1+6; }?>
            </tr>
            <tr>
                <?php for($t1=$d4; $t1 <= $e4 ; ){?>
                    <td scope="col">
                        <div class="big-road-bet">
                            <img src="<?php echo Chk_bet($t1,$table_num,$bet_max,$win2,$shoe)?>" width="35" height="35" />
                        </div>
                    </td>
                    <?php $t1= $t1+6; }?>
            </tr>
            <tr>
                <?php for($t1=$d5; $t1 <= $e5 ; ){?>
                    <td scope="col">
                        <div class="big-road-bet">
                            <img src="<?php echo Chk_bet($t1,$table_num,$bet_max,$win2,$shoe)?>" width="35" height="35" />
                        </div>
                    </td>
                    <?php $t1= $t1+6; }?>
            </tr>
            <tr>
                <?php for($t1=$d6; $t1 <= $e6 ; ){?>
                    <td scope="col">
                        <div class="big-road-bet">
                            <img src="<?php echo Chk_bet($t1,$table_num,$bet_max,$win2,$shoe)?>" width="35" height="35" />
                        </div>
                    </td>
                    <?php $t1= $t1+6; }?>
            </tr>
            </table>
        </div>
        <div class="col-1">
            <div class="pl-2">
                <table class="table-b-outline shadow-lg bg-white" height="289px">
                    <tr>
                        <th class="banker" style="text-align: center; font-size: 28px;">B</th>
                        <th class="player" style="text-align: center; font-size: 28px;">P</th>
                    </tr>
                    <tr>
                        <td>
                            <div id='P1' style="padding-top:8px;" align="center"></div>
                        </td>
                        <td>
                            <div  id='P4' style="vertical-align:top; padding-top:7px"   align="center"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div id='P2' style="padding-top:8px;" align="center"> </div>
                        </td>
                        <td>
                            <div id='P5' style="vertical-align:top; padding-top:7px"   align="center"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div id='P3' style="padding-top:8px;" align="center"></div>
                        </td>
                        <td>
                            <div  id='P6' style="vertical-align:top; padding-top:7px"   align="center"></div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="row no-gutters my-2">
        <div class="col-4">
            <?php include "inc/table_1.php"; ?>
        </div>
        <div class="col-4">
            <div class="px-2">
                <?php include "inc/table_3.php"; ?>
            </div>
        </div>
        <div class="col-4">

            <?php include "inc/table_2.php"; ?>
        </div>
    </div>
    <div class="row no-gutters">
        <div class="col-6">
            <table class="table-b-e-c shadow-lg table-marker-road" style="height: 397px;">
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
                        <td style="width: 60px; height: 60px;">
                            <div class="mx-auto p-1 text-center">
                                <img src="<?php echo Chk_bet2($t1,$table_num,$bet_max,$win2,$shoe)?>" alt="" width="55px" height="55px" />
                            </div>
                        </td>
                    <?php $t1= $t1+6;}?>
                </tr>
                <tr>
                    <?php for($t1=$d2; $t1 <= $e2 ; ){?>
                        <td style="width: 60px; height: 60px;">
                            <div class="mx-auto p-1 text-center">
                                <img src="<?php echo Chk_bet2($t1,$table_num,$bet_max,$win2,$shoe)?>" alt="" width="55px" height="55px" />
                            </div>
                        </td>
                    <?php $t1= $t1+6;}?>
                </tr>
                <tr>
                    <?php for($t1=$d3; $t1 <= $e3 ; ){?>
                        <td style="width: 60px; height: 60px;">
                            <div class="mx-auto p-1 text-center">
                                <img src="<?php echo Chk_bet2($t1,$table_num,$bet_max,$win2,$shoe)?>" alt="" width="55px" height="55px" />
                            </div>
                        </td>
                    <?php $t1= $t1+6;}?>
                </tr>
                <tr>
                    <?php for($t1=$d4; $t1 <= $e4 ; ){?>
                        <td style="width: 60px; height: 60px;">
                            <div class="mx-auto p-1 text-center">
                                <img src="<?php echo Chk_bet2($t1,$table_num,$bet_max,$win2,$shoe)?>" alt="" width="55px" height="55px" />
                            </div>
                        </td>
                    <?php $t1= $t1+6;}?>
                </tr>
                <tr>
                    <?php for($t1=$d5; $t1 <= $e5 ; ){?>
                        <td style="width: 60px; height: 60px;">
                            <div class="mx-auto p-1 text-center">
                                <img src="<?php echo Chk_bet2($t1,$table_num,$bet_max,$win2,$shoe)?>" alt="" width="55px" height="55px" />
                            </div>
                        </td>
                    <?php $t1= $t1+6;}?>
                </tr>
                <tr>
                    <?php for($t1=$d6; $t1 <= $e6; ){?>
                        <td style="width: 60px; height: 60px;">
                            <div class="mx-auto p-1 text-center">
                                <img src="<?php echo Chk_bet2($t1,$table_num,$bet_max,$win2,$shoe)?>" alt="" width="55px" height="55px" />
                            </div>
                        </td>
                    <?php $t1= $t1+6;}?>
                </tr>
            </table>
        </div>
        <div class="col-3">
            <div class="px-2">
                <table class="table-b-outline table-result table-striped shadow-lg" style="width: 100%; background: #ffffff; height: 397px;">
                    <tr class="text-info">
                        <th style="width: 50%">Games</th>
                        <th><?php echo ($sum_pp + $sum_b + $sum_p + $sum_pb + $sum_t)?></th>
                    </tr>
                    <tr class="banker">
                        <th style="width: 50%;">Banker</th>
                        <th><?php echo $sum_b?></th>
                    </tr>
                    <tr class="player">
                        <th style="width: 50%">Player</th>
                        <th><?php echo $sum_p?></th>
                    </tr>
                    <tr class="tie">
                        <th style="width: 50%">Tie</th>
                        <th><?php echo $sum_t?></th>
                    </tr>
                    <tr class="banker">
                        <th style="width: 50%">Banker Pairs</th>
                        <th><?php echo $sum_pb?></th>
                    </tr>
                    <tr class="player">
                        <th style="width: 50%">Player Pairs</th>
                        <th><?php echo $sum_pp?></th>
                    </tr>

                </table>
            </div>

        </div>
        <div class="col-3">
            <?php include "table_info.php"; ?>
        </div>
    </div>
</div>
<!-- Winner Box-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script>
    $(function () {
        let table = {
            table_num: $("#table-info").data('table'),
            shoe: $("#table-info").data('shoe'),
            bet_max: $("#table-info").data('bet-max')
        };
        console.log(table);
        $(document).on("keypress", function (e) {
            console.log(e.which);
            if (e.which == 47) {
                console.log("close table");
                location.replace("close.php");
            }
            // Undo Score
            if (e.which == 45) {
                checkResult({
                    win2: "-",
                    table_num: $("#table-info").data('table'),
                    shoe: $("#table-info").data('shoe'),
                    bet_max: $("#table-info").data('bet-max')
                });
            }
            // use e.which
            if (e.which == 49 || e.which == 97 || e.which == 98 || e.which == 50 ) {
                $("#winner-modal").removeClass('banker-win');
                $("#winner-modal").removeClass('tie-game');
                $("#winner-modal").addClass('player-win');
                $("#winner-modal").modal("show");
                setTimeout(function() {
                    $("#winner-modal").modal("hide");
                    $("#input-value")
                        .val("")
                        .focus();
                }, 5000);
                checkResult({
                    win2: "101",
                    table_num: $("#table-info").data('table'),
                    shoe: $("#table-info").data('shoe'),
                    bet_max: $("#table-info").data('bet-max')
                });
            }

            if (e.which == 100 || e.which == 52 || e.which == 101 || e.which == 53) {
                $("#winner-modal").removeClass('player-win');
                $("#winner-modal").removeClass('tie-game');
                $("#winner-modal").addClass('banker-win');
                $("#winner-modal").modal("show");
                setTimeout(function() {
                    $("#winner-modal").modal("hide");
                    $("#input-value")
                        .val("")
                        .focus();
                }, 5000);
                checkResult({
                    win2: "201",
                    table_num: $("#table-info").data('table'),
                    shoe: $("#table-info").data('shoe'),
                    bet_max: $("#table-info").data('bet-max')
                });
            }

            if (e.which == 99 || e.which == 51) {
                $("#winner-modal").removeClass('player-win');
                $("#winner-modal").removeClass('banker-win');
                $("#winner-modal").addClass('tie-game');
                $("#winner-modal").modal("show");
                setTimeout(function() {
                    $("#winner-modal").modal("hide");
                    $("#input-value")
                        .val("")
                        .focus();
                }, 5000);
                checkResult({
                    win2: "301",
                    table_num: $("#table-info").data('table'),
                    shoe: $("#table-info").data('shoe'),
                    bet_max: $("#table-info").data('bet-max')
                });
            }
        });

        // $("#winner-modal").modal("show");
        $("#input-value").focus();
        $("#form-input-value").submit( function (e) {
            e.preventDefault();
            let data = $("#form-input-value").serialize();
            console.log(data);
            $.ajax({
                type: 'POST',
                data: data,
                url: "add_bet.php",
                success: function (data) {
                    console.log(data);
                    if (data.error) {
                        console.log("Error");
                    } else {
                        console.log("No error");
                        $("#winner-modal").modal("show");

                        setTimeout(function() {
                            $("#winner-modal").modal("hide");
                            $("#input-value")
                                .val("")
                                .focus();
                            location.reload();
                        }, 5000);

                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });
    });
    function checkResult(data) {
        $.ajax({
            type: 'POST',
            data: data,
            url: "add_bet.php",
            success: function (data) {
                console.log(data);
                if (data.error) {
                    console.log("Error");
                } else {
                    window.location.reload();
                }
            },
            error: function (data) {
                console.log(data);
            }
        });
    }
    function showWinner() {
        $("#winner-modal").modal("show");

        setTimeout(function() {
            $("#winner-modal").modal("hide");
            $("#input-value")
                .val("")
                .focus();
        }, 5000);
    }
    <?php
    $p1 =Chk_net1(1);
    $p2 =Chk_net2(1);
    $p3 =Chk_net3(1);
    $p4 =Chk_net1(2);
    $p5 =Chk_net2(2);
    $p6 =Chk_net3(2);

    ?>

    document.getElementById("P1").innerHTML="<img src=\"<?php echo $p1?>\" alt=\"\" width=\"40\" height=\"40\" \/>";
    document.getElementById("P2").innerHTML="<img src=\"<?php echo $p2?>\" alt=\"\" width=\"40\" height=\"40\" \/>";
    document.getElementById("P3").innerHTML="<img src=\"<?php echo $p3?>\" alt=\"\" width=\"40\" height=\"40\" \/>";
    document.getElementById("P4").innerHTML="<img src=\"<?php echo $p4?>\" alt=\"\" width=\"40\" height=\"40\" \/>";
    document.getElementById("P5").innerHTML="<img src=\"<?php echo $p5?>\" alt=\"\" width=\"40\" height=\"40\" \/>";
    document.getElementById("P6").innerHTML="<img src=\"<?php echo $p6?>\" alt=\"\" width=\"40\" height=\"40\" \/>";

</script>
<!---////////////////////////////////////////////////////////////////////////////////////////////////---->
</body>
</html>