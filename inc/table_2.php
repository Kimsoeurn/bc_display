<table class="table-b-e-c shadow-lg table-cock-road">

    <?php
    $sql88 = "select *  from table_sc1  ";
    $rs88= sql_query($sql88);
    $sql87 = "select  max(rm) as rm from table_road  where co!='0' order by id DESC";
    $rs87= sql_query($sql87);
    $max1 =$rs87['rm'] ;
    /////Shift table Left

    $c1 = explode(",",$rs88['bet1']);
    if($max1 <= 174){
        $d1=1;$d2=2;$d3=3;$d4=4;$d5=5;$d6=6;$d7=7;$d8=8;$d9=9;
        $e1=174;$e2=175;$e3=176;$e4=177;$e5=178;$e6=179;$e7=180;$e8=181;$e9=182;
    }else{
        $s=ceil(($max1-174)/6)*6;
        $d1=1+$s;$d2=2+$s;$d3=3+$s;$d4=4+$s;$d5=5+$s;$d6=6+$s;$d7=7+$s;$d8=8+$s;$d9=9+$s;
        $e1=174+$s;$e2=175+$s;$e3=176+$s;$e4=177+$s;$e5=178+$s;$e6=179+$s;$e7=180+$s;$e8=181+$s;$e9=182+$s;
    }
    ?>
    <tr>

        <?php for($t1=$d1; $t1 <= $e1 ; ){?>
            <td style="width: 20px; height: 20px;">
                <div class="mx-auto text-center">
                    <img src="<?php echo Chk_bet3($t1 ) ?>" class="img-fluid" />
                </div>
            </td>
        <?php $t1= $t1+6;}?>
    </tr>
    <tr>
        <?php for($t1=$d2; $t1 <= $e2 ; ){?>
            <td style="width: 20px; height: 20px;">
                <div class="mx-auto text-center">
                    <img src="<?php echo Chk_bet3($t1 ) ?>" class="img-fluid" />
                </div>
            </td>
        <?php $t1= $t1+6;}?>
    </tr>
    <tr>
        <?php for($t1=$d3; $t1 <= $e3 ; ){?>
            <td style="width: 20px; height: 20px;">
                <div class="mx-auto text-center">
                    <img src="<?php echo Chk_bet3($t1 ) ?>" class="img-fluid" />
                </div>
            </td>
        <?php $t1= $t1+6;}?>
    </tr>
    <tr>
        <?php for($t1=$d4; $t1 <= $e4 ; ){?>
            <td style="width: 20px; height: 20px;">
                <div class="mx-auto text-center">
                    <img src="<?php echo Chk_bet3($t1 ) ?>" class="img-fluid" />
                </div>
            </td>
        <?php $t1= $t1+6;}?>
    </tr>
    <tr>
        <?php for($t1=$d5; $t1 <= $e5 ;){?>
            <td style="width: 20px; height: 20px;">
                <div class="mx-auto text-center">
                    <img src="<?php echo Chk_bet3($t1 ) ?>" class="img-fluid" />
                </div>
            </td>
        <?php $t1= $t1+6;}?>
    </tr>

    <tr>
        <?php for($t1=$d6; $t1 <= $e6 ;){?>
            <td style="width: 20px; height: 20px;">
                <div class="mx-auto text-center">
                    <img src="<?php echo Chk_bet3($t1 ) ?>" class="img-fluid" />
                </div>
            </td>
        <?php $t1= $t1+6;}?>
    </tr>
</table>