<?php
require('db1.php');

if(isset($_POST['Submit'])==1)
{

$dname =$_REQUEST['dname'];
$pname = $_REQUEST['pname'];
$pmrn = $_REQUEST['pmrn'];
$pphone=$_REQUEST['pphone'];
$xl=$_REQUEST['xl'];
$lx= implode($xl);
$m1=$_REQUEST['m1'];
$m2=$_REQUEST['m2'];
$d1=$_REQUEST['d1'];
$d2=$_REQUEST['d2'];

$ins_query="insert into pres (`dname`,`pname`,`pmrn`,`pphone`,`xl`,`m1`,`m2`,`d1`,`d2`) values ('$dname', '$pname','$pmrn','$pphone','$lx','$m1','$m2','$d1','$d2')";
mysqli_query($con,$ins_query) or die(mysql_error());
$status = "New Record Inserted Successfully";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP - Dynamically Add or Remove input fields using JQuery</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="./jquery.multiselect.js"></script>



</head>
<body>


<div class="container">
    <h2 align="center">Prescription</h2>  
    <div class="form-group">
         <form method="post" action="">


           <div class="table-responsive">  
                <table align="center" class="table table-bordered" id="dynamic_field">  
				<tr><td colspan="2"><select name="dname" placeholder="Select Doctor Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Doctor-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
						
						
						</select></td><td><input type="text" name="" class="form-control name_list"</td></tr>
						<tr>
						  <td><input type="text" name="pname" class="form-control name_list" ></td>
						  <td><input type="text" name="pmrn"class="form-control name_list" ></td>  <td><input type="text" name="pphone"class="form-control name_list" ></td></tr>
						<tr><td colspan="3"><textarea class="form-control" id="exampleTextarea" name="hh" rows="5"></textarea></td>  </tr>
												<tr><td colspan="3"><textarea class="form-control" id="exampleTextarea" name="hh" rows="5"></textarea></td>  </tr>
				
														
<tr><td colspan="3"><select name="xl[]" multiple="multiple" class="3col active" >
       <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->id."'>".$row->mname."</option>";
				}
			}
			?>
    </select>

    <script>
    $(function () {
        $('select[multiple].active.3col').multiselect({
            columns: 6,
            placeholder: 'Select Investigation',
            search: true,
            searchOptions: {
                'default': 'Select Investigation'
            },
            selectAll: true
        });

    });
</script>
</td></tr>
<tr><td colspan="2"><select name="m1" multiple="multiple" class="3col active" >
        <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->id."'>".$row->mname."</option>";
				}
			}
			?>
    </select>

    <script>
    $(ee () {
        $('select[multiple1].active.2col').multiselect({
            columns: 2,
            placeholder: 'Select Investigation',
            search: true,
            searchOptions: {
                'default': 'Select Investigation'
            },
            selectAll: true
        });

    });
</script>
</td>
<td><select name="m2" multiple="multiple" class="3col active" >
        <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>
    </select>

    <script>
    $(function () {
        $('select[multiple].active.3col').multiselect({
            columns: 6,
            placeholder: 'Select Investigation',
            search: true,
            searchOptions: {
                'default': 'Select Investigation'
            },
            selectAll: true
        });

    });
</script></td>
</tr>

                    <tr>  
                        <td><select name="d1" placeholder="Enter your Name"class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
						
						
						</select></td>  
						<td><select name="d2" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  						</tr>  
              <tr>  
                        <td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
						
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
												<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
				  </tr>  
						<tr>  
                        <td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
						
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
						</tr>  
						<tr>  
                        <td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
						
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
						</tr>  
						<tr>  
                        <td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
						
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
						</tr>  
						<tr>  
                        <td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
						
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
						</tr>  
						<tr>  
                        <td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
						
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
						</tr>  
						<tr>  
                        <td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
						
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
						</tr>  
						<tr>  
                        <td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
						
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
						</tr>  
						<tr>  
                        <td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
						
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
						</tr>  
						<tr>  
                        <td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
						
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
						</tr>  
						<tr>  
                        <td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
						
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
						</tr>  
						<tr>  
                        <td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
						
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
						</tr>  
						<tr>  
                        <td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
						
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
						</tr>  
						<tr>  
                        <td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
						
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
						</tr>  
						<tr>  
                        <td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
						
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
						</tr>  
						<tr>  
                        <td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
						
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
						</tr>  
						<tr>  
                        <td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
						
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
						</tr>  
						<tr>  
                        <td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
						
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
						</tr>  
						<tr>  
                        <td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
						
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name" class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
					
						
						</select></td>  
						<td><select name="name[]" placeholder="Enter your Name"class="form-control name_list" required="" />
						
						<option value=''>-Select Medicine-</option>
									<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>

						
						</select></td>  
						</tr>  
						
<tr><td colspan="3"><textarea class="form-control" id="exampleTextarea" name="hh" rows="5"></textarea></td>  </tr>
<tr><td colspan="3"><textarea class="form-control" id="exampleTextarea" name="hh" rows="5"></textarea></td>  </tr>
              </table>  
                <input type="button" name="Submit" id="submit" class="btn btn-info" value="Submit" />  
           </div>


         </form>  
    </div> 
</div>


</body>
</html>