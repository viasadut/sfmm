
<?php 
//$vbCrLf = chr(13).chr(10);

require('db1.php');
?>

<html>
<head>
<title>Update Page</title>


<script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
</head>

<body>


<select id="PageId" name="PageId" onchange='SelectChanged();'>
            <option value="Select One">Select One</option>
           <?php 
			$sql = "select * from `doctor` where status='Active'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->details."'>".$row->dname."</option>";
				}
			}
			?>
        </select>
<br>
<!-- php below; Creates a form to update database content -->
<form  method="post"  action="update_website_page_handle.php">
<table width="943" height="528">
<tr>
<td align="right">&nbsp;</td>
<td height="32" colspan="2" align="left"><h1> Update Page </h1></td>
</tr>
<tr>
<td width="60" align="left">&nbsp;</td>
<td width="134" height="32" align="left"><p>Select Page ID:</p></td>
<td width="733">
    <?php echo $DropDownList; ?>
</td>
</tr>
<tr>
<td align="left" valign="top">&nbsp;</td>
<td align="left" valign="top"><p>Page Title:</p></td>
<td><textarea style="width: 500px; height: 50px;" name="PageTitle" id="PageTitle" class="heading"></textarea></td>
</tr>
<tr>
<td align="left" valign="top">&nbsp;</td>
<td align="left" valign="top"><p>Page Content:</p></td>
<td>
  <textarea style="width: 500px; height: 200px;" name="PageContent" id="PageContent" class="date"></textarea>

                    <script>
                    CKEDITOR.replace( 'PageContent' );
                    </script>   

</td>
</tr>
<tr>
<td align="left" valign="top">&nbsp;</td>
<td align="left" valign="top"><p>Extra Page Content:</p></td>
<td>
        <textarea style="width: 500px; height: 200px;" name="PageContent2" id="PageContent2" class="details"></textarea>

                <script>
                CKEDITOR.replace('PageContent2');               
                </script>

</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>
  <input name="update" type="submit"  id="update" value="Update">
</td>
</tr>
</table>
</form>
<script language="Javascript" type="text/javascript">
var PageTitleArray = new Array();
<?php echo $PageTitlePhp; ?>
var PageContentArray = new Array();
<?php echo $PageContentPhp; ?>
var PageContent2Array = new Array();
<?php echo $PageContent2Php; ?>
/*function SelectChanged()
{
    var PageId = document.getElementById('PageId').value;
    document.getElementById('PageTitle').value = PageTitleArray[PageId];
    document.getElementById('PageContent').value = PageContentArray[PageId];
    document.getElementById('PageContent2').value = PageContent2Array[PageId];
}
SelectChanged(); // added to execute the function after loading to select first value.*/

function SelectChanged()
{
    var PageId = document.getElementById('PageId').value;
    document.getElementById('PageTitle').value = PageTitleArray[PageId];
    CKEDITOR.instances["PageContent"].setData(PageContentArray[PageId]);
    CKEDITOR.instances["PageContent2"].setData(PageContent2Array[PageId]);
}
</script>


</body>
</html>