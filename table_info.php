<table class="table-border text-center" height="344x" style="width: 100%;">
    <tr>
        <td></td>
        <td colspan="2">MIN BET</td>
        <td colspan="2">MAX BET</td>
    </tr>
    <tr>
        <td><span  style=" float:left; padding-left:5px;font-size:14px; font-weight:bold;color:#000; ">Player/Banker</span></td>
        <td colspan="2">
            <?php echo number_format($bet_min,0,'.',',')?>
        </td>
        <td colspan="2">
            <?php echo number_format($bet_max,0,'.',',')?>
        </td>
    </tr>
    <tr>
        <td><span  style=" float:left; padding-left:45px;font-size:14px; font-weight:bold;color:#000; ">Tie</span></td>
        <td colspan="2">
            <?php echo number_format($tie_min,0,'.',',')?>
        </td>
        <td colspan="2">
            <?php echo number_format($tie_max,0,'.',',')?>
        </td>
    </tr>
    <tr>
        <td><span  style=" float:left; padding-left:45px;font-size:14px; font-weight:bold;color:#000; ">Pair</span></td>
        <td colspan="2">
            <?php echo number_format($pair_min,0,'.',',')?>
        </td>
        <td colspan="2">
            <?php echo number_format($pair_max,0,'.',',')?>
        </td>
    </tr>
</table>