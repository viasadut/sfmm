<html>
<head>
<title>ThaiCreate.Com PHP & MySQL Tutorial</title>
</head>
<body>
<script language="JavaScript">
	function ClickCheckAll(vol)
	{
	
		var i=1;
		for(i=1;i<=document.frmMain.hdnCount.value;i++)
		{
			if(vol.checked == true)
			{
				eval("document.frmMain.chkDel"+i+".checked=true");
			}
			else
			{
				eval("document.frmMain.chkDel"+i+".checked=false");
			}
		}
	}

	function onDelete()
	{
		if(confirm('Do you want to delete ?')==true)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
</script>
<form name="frmMain" action="phpMySQLDeleteMultiRecord.php" method="post" OnSubmit="return onDelete();">
<?php
$objConnect = mysql_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysql_select_db("sfmmkpjnew");
$strSQL = "SELECT * FROM radio";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">CustomerID </div></th>
    <th width="98"> <div align="center">Name </div></th>
    <th width="198"> <div align="center">Email </div></th>
    <th width="97"> <div align="center">CountryCode </div></th>
    
    <th width="30"> <div align="center">
      <input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
    </div></th>
  </tr>
<?php
$i = 0;
while($objResult = mysql_fetch_array($objQuery))
{
$i++;
?>
  <tr>
    <td><div align="center"><?php echo $objResult["id"];?></div></td>
    <td><?php echo $objResult["iname"];?></td>
    <td><?php echo $objResult["type"];?></td>
    <td><div align="center"><?php echo $objResult["subtype"];?></div></td>
    
    <td align="center"><input type="checkbox" name="chkDel[]" id="chkDel<?php echo $i;?>" value="<?php echo $objResult["id"];?>"></td>
  </tr>
<?php
}
?>
</table>
<?php
mysql_close($objConnect);
?>
<input type="submit" name="btnDelete" value="Delete">
<input type="hidden" name="hdnCount" value="<?php echo $i;?>">
</form>
</body>
</html>