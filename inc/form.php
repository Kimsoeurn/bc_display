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
                <img src="images/LOGO_GDC.png" class="img-fluid float-left mr-3" width="150px" alt="logo">
                <h1 class="text-white" style="padding-top: 40px;">Diamond City Baccarat Display</h1>
            </td>
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