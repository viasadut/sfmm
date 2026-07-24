<html>
<head>
<title>ThaiCreate.Com PHP & MySQL Tutorial</title>
</head>
<body>
<?php
$objConnect = mysql_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysql_select_db("sfmmkpjnew");

	for($i=0;$i<count($_POST["chkDel"]);$i++)
	{
		if($_POST["chkDel"][$i] != "")
		{
			$strSQL = "UPDATE radio set code='12' ";
			$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}

	echo "Record Deleted.";

mysql_close($objConnect);
?>
</body>
</html>