<table class="table-b-e-c shadow-lg table-small-road">

    <?php
    $sql88 = "select max(rm) as rm from  table_road2 where co !='' order by id DESC  ";
    //                $result88 = mysql_query($sql88);
    $rs88= sql_query($sql88);
    $sql89 = "select * from  table_sc1    ";
    $rs89= sql_query($sql89);
    $max3 =$rs88['rm'];
    /////Shift table Left

    $c1 = explode(",",$rs89['bet1']);
    if($max3<= 168){
        $d1=1;$d2=2;$d3=3;$d4=4;$d5=5;$d6=6;$d7=7;$d8=8;$d9=9;
        $e1=168;$e2=169;$e3=170;$e4=171;$e5=172;$e6=173;$e7=174;$e8=175;$e9=176;
    }else{
        $s=ceil(($max3-168)/6)*6;
        $d1=1+$s;$d2=2+$s;$d3=3+$s;$d4=4+$s;$d5=5+$s;$d6=6+$s;$d7=7+$s;$d8=8+$s;$d9=9+$s;
        $e1=168+$s;$e2=169+$s;$e3=170+$s;$e4=171+$s;$e5=172+$s;$e6=173+$s;$e7=174+$s;$e8=175+$s;$e9=176+$s;
    }
    ?>
    <tr>

        <?php for($t1=$d1; $t1 <= $e1 ; ){?>
            <td style="width: 20px; height: 20px;">
                <div class="mx-auto text-center">
                    <img src="<?php echo Chk_bet5($t1)?>" class="img-fluid"/>
                </div>
            </td>
        <?php $t1= $t1+6;}?>
    </tr>
    <tr>
        <?php for($t1=$d2; $t1 <= $e2 ; ){?>
            <td style="width: 20px; height: 20px;">
                <div class="mx-auto text-center">
                    <img src="<?php echo Chk_bet5($t1)?>" class="img-fluid"/>
                </div>
            </td>
        <?php $t1= $t1+6;}?>
    </tr>
    <tr>
        <?php for($t1=$d3; $t1 <= $e3 ; ){?>
            <td style="width: 20px; height: 20px;">
                <div class="mx-auto text-center">
                    <img src="<?php echo Chk_bet5($t1)?>" class="img-fluid"/>
                </div>
            </td>
        <?php $t1= $t1+6;}?>
    </tr>
    <tr>
        <?php for($t1=$d4; $t1 <= $e4 ; ){?>
            <td style="width: 20px; height: 20px;">
                <div class="mx-auto text-center">
                    <img src="<?php echo Chk_bet5($t1)?>" class="img-fluid"/>
                </div>
            </td>
        <?php $t1= $t1+6;}?>
    </tr>
    <tr>
        <?php for($t1=$d5; $t1 <= $e5 ;){?>
            <td style="width: 20px; height: 20px;">
                <div class="mx-auto text-center">
                    <img src="<?php echo Chk_bet5($t1)?>" class="img-fluid"/>
                </div>
            </td>
        <?php $t1= $t1+6;}?>
    </tr>

    <tr>
        <?php for($t1=$d6; $t1 <= $e6 ;){?>
            <td style="width: 20px; height: 20px;">
                <div class="mx-auto text-center">
                    <img src="<?php echo Chk_bet5($t1)?>" class="img-fluid"/>
                </div>
            </td>
        <?php $t1= $t1+6;}?>
    </tr>
</table>