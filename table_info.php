<table class="text-center" style="width: 100%; height: 397px;">
    <tr>
        <th></th>
        <th colspan="2">MINIMUM</th>
        <th colspan="2">MAXIMUM</th>
    </tr>
    <tr>
        <th>Player/Banker</th>
        <th colspan="2">
            <?php echo number_format($bet_min,0,'.',',')?>
        </th>
        <th colspan="2">
            <?php echo number_format($bet_max,0,'.',',')?>
        </th>
    </tr>
    <tr>
        <th>Tie</th>
        <th colspan="2">
            <?php echo number_format($tie_min,0,'.',',')?>
        </th>
        <th colspan="2">
            <?php echo number_format($tie_max,0,'.',',')?>
        </th>
    </tr>
    <tr>
        <th>Pair</th>
        <th colspan="2">
            <?php echo number_format($pair_min,0,'.',',')?>
        </th>
        <th colspan="2">
            <?php echo number_format($pair_max,0,'.',',')?>
        </th>
    </tr>
</table>