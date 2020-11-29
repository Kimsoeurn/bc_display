<?
 include( "phpconfig.php" );

 if ( $_POST[sub1] == "CONFIRM" ){
								Conn2DB();
				$strSQL = "UPDATE table_config SET table_name ='$table_num'";
				mysql_query( $strSQL, $conn )or die ( "Can not insert data") . mysql_error();
				
				$strSQL2 = "SELECT * FROM  table_detail where status ='1' and table_no ='$table_num' ";
			$result2 = mysql_query($strSQL2);
			$row = mysql_fetch_array($result2);
			CloseDB();
			if(!empty($row[id])){
				header("Location:index.php"); 
			}else{			
				header("Location:select_table.php"); 
				}
								
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<title>ADD TABLE</title>

	
	<link rel="stylesheet" type="text/css" href="cart.css" />
    <style type="text/css">
<!--
body				{
	background-color: #000000;
	padding-left: 230px;
	padding-top: 200px;
}
.style19 {
	color: #FFFFFF;
	font-weight: bold;
}
.style24 {font-size: 14}
.style27 {font-size: 12px}
.style28 {font-size: 10px}
.style29 {color: #FF0000}



-->
    </style>
<script language="JavaScript">
document.onkeydown = chkEvent 
	function chkEvent(e) {
		var keycode;
		if (window.event) keycode = window.event.keyCode; //*** for IE ***//
		else if (e) keycode = e.which; //*** for Firefox ***//
		if(keycode==13)
		{
			return false;
		}
	}

 function setNextFocus(objId){
        if (event.keyCode == 13){
            var obj=document.getElementById(objId);
            if (obj){
                obj.focus();
            }
        }
    }


////////////////////////////////
function apply()
{
 
  if(document.frm.tie_max.value=="")
  {
    document.frm.sub1.disabled=false;
  }
 else
  {
    document.frm.sub1.enabled=false;
  }
}
</script>
</head>

<body onload = "document.all.table_num.focus();" >
<div align="center">
<form name="frm" method="post" action="<?echo $PHP_SELF; ?>" enctype="multipart/form-data">
  
  
  
    <table width="546" class="table1" border="0" cellspacing="0" cellpadding="3" align="center">
      <tr align="center" bgcolor="#CAE4FF">
        <td colspan="6" valign="middle" bgcolor="#006699" class="Tahoma13"><span class="style19">ADD TABLE</span></td>
      </tr>
      <tr bgcolor="#EAEAEA">
        <td width="115" height="30" align="right" ><span class="style27">TABLE NUMBER</span></td>
        <td width="12" height="30" class="Tahoma20 style28"><? if($a1==""){?>
        <div align="center">*</div>
		<?}else{?>
        <div align="center" class="style29">*</div>
        <?}?>		</td>
        <td width="136" height="30" class="Tahoma20">
        <input name="table_num" type="text" id="table_num" value="<?echo $table_num;?>"  size="15"   autocomplete="off" />      </td>
        <td width="86" height="30" >&nbsp;</td>
        <td width="6" height="30" class="Tahoma20 style28">&nbsp;</td>
        <td width="155" height="30" class="Tahoma20 style24">&nbsp;</td>
      </tr>
      <tr bgcolor="#EAEAEA">
        <td height="30" colspan="6" align="center" >
          <input type="submit" id ="sub1" name="sub1" value="CONFIRM"   ></td>
      </tr>
      <tr bgcolor="#DCFF93">
        <td width="115" height="36" align="right" bgcolor="#EAEAEA" class="Tahoma20 style24">&nbsp;</td>
        <td width="12" bgcolor="#EAEAEA" class="Tahoma20 style24">&nbsp;</td>
        <td width="136" bgcolor="#EAEAEA" class="Tahoma20 style24">&nbsp;</td>
        <td width="86" bgcolor="#EAEAEA" class="Tahoma20 style24">&nbsp;</td>
        <td width="6" bgcolor="#EAEAEA" class="Tahoma20 style24">&nbsp;</td>
        <td width="155" bgcolor="#EAEAEA" class="Tahoma20 style24">&nbsp;</td>
      </tr>
    </table>
 
</form> </div>
<p align="center">&nbsp;</p>
</div>
</body>
</html>
