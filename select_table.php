<?
 include( "phpconfig.php" );
 if ( $_POST[sub2] =="SELECT TABLE" and !empty($_POST[table_num])  and !empty($_POST[shoe])){
 Conn2DB();
 $strSQL = "UPDATE table_detail SET status ='0' ";
				mysql_query( $strSQL, $conn )or die ( "Can not insert data") . mysql_error();
 $b = time ();
 $date2=date("Y-m-d",$b);
 $id = $_POST[table_num] -1;
   $strSQL2 = "SELECT * FROM  table_config where bg_img ='GDC' LIMIT $id , 1  ";
			$result2 = mysql_query($strSQL2);
			$row = mysql_fetch_array($result2);
 
 	$strSQL = "INSERT INTO table_detail (table_no,shoe_no,bet_max,bet_min,tie_max,tie_min,pair_max,pair_min,round_date,status) VALUES ('$row[table_name]','$_POST[shoe]','$row[bet_max]','$row[bet_min]','$row[tie_max]','$row[tie_min]','$row[pair_max]','$row[pair_min]','$date2','1')";
				mysql_query( $strSQL, $conn )or die ( "Can not insert data") . mysql_error();
				$tb99 = $row[table_name];
				$bet =$row[bet_max];
				
			
	CloseDB();
 header("Location:main.php?table_num=$tb99&bet_max=$bet&shoe=$_POST[shoe]"); 
 }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.box1 {
	font-family: Tahoma;
	font-size: 13px;
	text-decoration: none;
	background-color: #999999;
}
.Tahoma13 {
	font-family: Tahoma;
	font-size: 13px;
	text-decoration: none;
	height: 30px;
}
.Tahoma11 { font-family: Tahoma; font-size: 11px; text-decoration: none }
.Tahoma20 { font-family: Tahoma; font-size: 20px; text-decoration: none }
body {
}
.table1 {

}
body				{
	background-color: #000000;
}
body,td,th {
	color: #FFFFFF;
	font-family: Tahoma;
	font-size: 14px;
}
body {
	background-color: #000000;
}
.style32 {font-size: 14px; font-family: Tahoma; color: #FFFFFF;}
-->
</style>
<script>
function apply()
{
 
  if(document.form1.shoe.value=="")
  {
    document.frm.sub2.disabled=false;
  }
 else
  {
    document.frm.sub2.enabled=false;
  }
}
</script>
</head>

<body onload = " if(document.all.table_num.value =='' ) { document.all.table_num.focus(); }else{  document.all.shoe.focus(); } "  >
<div align="center">
  <form id="form1" name="form1" method="post" action="">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table width="590" border="1" cellspacing="0" cellpadding="0">
      <tr>
        <th height="43" colspan="3" bgcolor="#006699" scope="col">PLEASE SELECT NO</th>
        <th colspan="2" bgcolor="#006699" scope="col"><input name="table_num" type="text" id="table_num"  value="<? echo $table_num?>" size="15"  onkeydown="if(event.keyCode==13){ document.all.shoe.focus();}" autocomplete="off" /></th>
        <th colspan="2" rowspan="2" bgcolor="#006699" scope="col"> <input type="submit" id ="sub2" name="sub2" value="SELECT TABLE"  onfocus="apply();"/></th>
      </tr>
      <tr>
        <th height="30" colspan="3" bgcolor="#006699" scope="col">PLEASE SELECT SHOE</th>
        <th colspan="2" bgcolor="#006699" scope="col"><span class="Tahoma20 style24">
          <input name="shoe" type="text" id="shoe" value="<?echo $shoe;?>" size="15" onkeydown="if(event.keyCode==13){ document.all.sub2.focus();}"    autocomplete="off" />
        </span></th>
      </tr>
      <tr>
        <th height="30" bgcolor="#006699" scope="col">NO</th>
        <th bgcolor="#006699" scope="col">BETMIN</th>
        <th bordercolor="#000000" bgcolor="#006699" scope="col">BETMAX</th>
        <th bgcolor="#006699" scope="col">PAIR MIN</th>
        <th bgcolor="#006699" scope="col">PAIR MAX</th>
        <th bgcolor="#006699" scope="col">TIE MIN</th>
        <th bgcolor="#006699" scope="col">TIE MAX</th>
      </tr>
       <?
		  Conn2DB();
		  $i=0;
	$strSQL = "SELECT * FROM  table_config where bg_img ='GDC'  group by bet_min order by bet_min ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	while($objResult = mysql_fetch_array($objQuery))
	{
	$i++; 
	
	?>
      <tr>
        <td height="27" bgcolor="#999999"><div align="center"><strong><span class="style32"><? echo $i?></span></strong></div></td>
        <td bgcolor="#999999"><div align="right">
          <?=$objResult["bet_min"];?>
        </div></td>
        <td bgcolor="#999999"><div align="right">
          <?=$objResult["bet_max"];?>
        </div></td>
        <td bgcolor="#999999"><div align="right">
          <?=$objResult["pair_min"];?>
        </div></td>
        <td bgcolor="#999999"><div align="right">
          <?=$objResult["pair_max"];?>
        </div></td>
        <td bgcolor="#999999"><div align="right">
          <?=$objResult["tie_min"];?>
        </div></td>
        <td bgcolor="#999999"><div align="right">
          <?=$objResult["tie_max"];?>
        </div></td>
      </tr>
      <? } CloseDB(); ?>
    </table>
  </form>
</div>
</body>
</html>
