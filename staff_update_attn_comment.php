<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>



<?php
    require('db1.php');
    
    if(isset($_POST['uid'])){
        $uid = $_REQUEST['uid'];
        $date1 = $_REQUEST['date1'];
        $date1_2 = $_REQUEST['date1_2'];
        $date =  $date1 .' '. date("H:i:s", strtotime($_REQUEST['date']));
        $status = $_REQUEST['status'];
        $otime = $date1 .' '. $_REQUEST['otime'];
        $comment = $_REQUEST['comment'];

        count($uid);

        if(!empty($uid)){
            foreach($_REQUEST["uid"] as $key => $value){
                $uid_i  = $uid[$key];

                $sql = "UPDATE `tm3` SET `date`= '$date', `comment`= '$comment', `otime`= '$otime', `status`= '$status' WHERE `uid`='$uid_i' AND (`date1` BETWEEN '$date1' AND '$date1_2') " ;

                if(mysqli_query($con, $sql) === TRUE){
                    $valid[1] = "Update Successfully";
                } 
                else{
                    $valid[2] = "Error while Update";
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="css/style2.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#sortable1, #sortable2" ).sortable({
      connectWith: ".connectedSortable"
    }).disableSelection();
  } );
  </script>
<style type="text/css">
    html { box-sizing: border-box; }

*, *:before, *:after {
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

    body {
        font-family: 'Nunito',sans-serif;
        color: #384047;
        background: #A085C6;
    }

    form {
        max-width: 600px;
        margin: 10px auto;
        padding: 10px 20px;
        background: #f4f7f8;
        border-radius: 8px;
        border: 1px solid #8265B0;
        box-shadow: 3px 3px 3px rgba(0,0,0,0.2)
    }

    h1 {
        margin: 0 0 30px 0;
        text-align: center;
    }

    input[type="text"],
    input[type="password"],
    input[type="date"],
    input[type="datetime"],
    input[type="email"],
    input[type="number"],
    input[type="search"],
    input[type="tel"],
    input[type="time"],
    input[type="url"],
    textarea,
    select {
        background: rgba(255,255,255,0.1);
        border: none;
        font-size: 16px;
        height: auto;
        margin: 0;
        outline: 0;
        padding: 15px;
        width: 100%;
        background-color: #e8eeef;
        color: #8a97a0;
        box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
        margin-bottom: 30px;
    }

    input[type="radio"],
    input[type="checkbox"] {
        margin: 0 4px 8px 0;
    }

    select {
        padding: 6px;
        height: 32px;
        border-radius: 2px;
    }

    button {
        padding: 19px 39px 18px 39px;
        color: #FFF;
        background-color: #A085C6;
        /*#4bc970*/
        font-size: 18px;
        text-align: center;
        font-style: normal;
        border-radius: 5px;
        width: 100%;
        border: 1px solid #8265B0;
        /*#3ac162*/
        border-width: 1px 1px 3px;
        box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
        margin-bottom: 10px;
    }

    fieldset {
        margin-bottom: 30px;
        border: none;
    }

    legend {
        font-size: 1.4em;
        margin-bottom: 10px;
    }

    label {
        display: block;
        margin-bottom: 8px;
    }

    label.light {
        font-weight: 300;
        display: inline;
    }

    .number {
        background-color: #A085C6;
        /*#5fcf80*/
        color: #fff;
        height: 30px;
        width: 30px;
        display: inline-block;
        font-size: 0.8em;
        margin-right: 4px;
        line-height: 30px;
        text-align: center;
        text-shadow: 0 1px 0 rgba(255,255,255,0.2);
        border-radius: 100%;
    }

    abbr[title] {
        border-bottom-width: 0;
    }
    @media screen and (min-width: 480px) {
        form {
            max-width: 1200px;
        }
    }

    .grid-container {
        display: grid;
        grid-template-columns: auto auto;
        background-color: powderblue;
        padding: 1px;
    }
    .grid-item {
        background-color: rgba(255, 255, 255, 0.8);
        border: 1px solid rgba(0, 0, 0, 0.8);
        padding: 2px;
        font-size: 10px;
        text-align: center;
    }
    .card {
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        width: 100%;
        background-color:#80cbc4;
    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }

    .container {
        padding: 2px 16px;
    }
    .conn {
        min-height: 90%;
        height: 100%;
        /* background:red; */
        margin-top: 10px;
    }
</style>
    <link rel="stylesheet" href="../styles.css">
    <script src="script.js"></script>
    <!-- <script type="text/javascript">
        function confirm_click(){
            return confirm("Are you Sure to Confirm this Leave ?");
        }
    </script>
    <script>
        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
        }

        function drop(ev) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            ev.target.appendChild(document.getElementById(data));
        }
    </script> -->
</head>
<body>
    <div id='cssmenu'>
        <ul>
            <li><a href='homestaff'><span>Home</span></a></li>
            <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
        </ul>
    </div>

    <p align="center" class="style1">Staff's Attendance  Update </p>
    <form action="" method="POST">
        <div class="grid-container">
            <table align="center" class="table table-bordered" id="dynamic_field">
                <tr>
                    <td colspan="2"><label><strong>From Date:</strong></label></td>
                    <td colspan="2"><label><strong>To Date:</strong></label></td>
                    <td colspan="2"><label><strong>In Time:</strong></label></td>
                    <td colspan="2"><label><strong>Out Time:</strong></label></td>
                    <td colspan="2"><label><strong>Status:</strong></label></td>
                    <td><label><strong>Action:</strong></label></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="date" name="date1" id="" placeholder="Select Date" size="15"></td>  
                    <td colspan="2"><input type="date" name="date1_2" id="" placeholder="Select Date" size="15"></td>  
                    <td colspan="2"><input type="time" name="date" placeholder="Select Start Time" size="15"></td>
                    <td colspan="2"><input type="time" name="otime" placeholder="Select Start Time" size="15"></td>
                    <td colspan="2">
                        <select name="status" id="">
                            <option value="">--Select--</option>
                            <option value="P">Present</option>
                            <option value="A">Absent</option>
                            <option value="LT">Late</option>
                            <option value="L">Leave</option>
                        </select>
                    </td>
                    <td><button type="submit" name="submit">Submit</button></td>
                </tr>
                <tr>
                    <td colspan="6">
                        <input type="text" name="comment" placeholder="Please write your comment on attendance">
                    </td>
                </tr>
            </table>
    
        </div>
        <div class="grid-container">
        
            
       
            <div class="grid-item" >
                <div class="card"><h2>Drag here</h2></div>
                <ul id="sortable1" class="connectedSortable conn" style="list-style-type:none;">
                    
                </ul>
            </div>
    </form>
            <div class="grid-item" >
                <div class="card"><h2>Take from here</h2></div>
                <form action="ok.php" >
                    <ul id="sortable2" class="connectedSortable" style="list-style-type:none;">
                        <?php
                            $count=1;
                            $sel_query="SELECT * FROM `staff3`";
                            $result = mysqli_query($con,$sel_query);
                            while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <li class="ui-state-highlight">
                            <div class="card">
                                <h2><b><?php echo $row['sid1']; ?></b></h2><p><?php echo $row['sname']; ?></br><?php echo $row['dept']; ?></p>
                                <input type="hidden" name="name[]" value="<?php echo $row['sname']; ?>">
                                <input type="hidden" name="dept[]" value="<?php echo $row['dept']; ?>">
                                <input type="hidden" name="uid[]" value="<?php echo $row['sid1']; ?>">
                            </div>
                        </li>
                        <?php $count++; } ?>
                    </ul>
                </form>
            </div>
        </div>
</body>

</html>