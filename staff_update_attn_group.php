<?php
    require('db1.php');
    

    if(isset($_POST['uid'])){
        $uid = $_REQUEST['uid'];
        $date1 = $_REQUEST['date1'];
        $date =  $date1 .' '. date("H:i:s", strtotime($_REQUEST['date']));
        $status = $_REQUEST['status'];
        $otime = $date1 .' '. $_REQUEST['otime'];

        echo count($uid);

        if(!empty($uid)){
            foreach($_REQUEST["uid"] as $key => $value){
                $uid_i  = $uid[$key];

                $sql = "UPDATE `tm3` SET `date`= '$date', `otime`= '$otime', `status`= '$status' WHERE `uid`='$uid_i' AND `date1`= '$date1' " ;

                if(mysqli_query($con, $sql) === TRUE){
                    $valid[1] = "Update Successfully";
                    echo $valid[1];
                } 
                else{
                    $valid[2] = "Error while Update";
                    echo $valid[2];
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
</style>
    <link rel="stylesheet" href="../styles.css">
    <script src="script.js"></script>
    <script type="text/javascript">
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
    </script>
</head>
<body>
    <div id='cssmenu'>
        <ul>
            <li><a href='viewnew11'><span>Home</span></a></li>
            <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
        </ul>
    </div>

    <p align="center" class="style1">Staff's Attendance  Update </p>
    <form action="" method="POST">
        <div class="grid-container">
            <table align="center" class="table table-bordered" id="dynamic_field">
                <tr>
                    <td colspan="2"><label><strong>Select Date:</strong></label></td>
                    <td colspan="2"><label><strong>In Time:</strong></label></td>
                    <td colspan="2"><label><strong>Out Time:</strong></label></td>
                    <td colspan="2"><label><strong>Status:</strong></label></td>
                    <td><label><strong>Action:</strong></label></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="date" name="date1" id="" placeholder="Select Date" size="15"></td>  
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
            </table>
    
        </div>
        <div class="grid-container">
            <div class="grid-item" id="div2" ondrop="drop(event)" ondragover="allowDrop(event)">
                
            </div>
    </form>
            <div class="grid-item" id="div1" ondrop="drop(event)" ondragover="allowDrop(event)">
                <table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
                    <tr>
                        <th width="10%"><strong>S.No</strong></th>
                        <th width="20%"><strong>ID</strong></th>
                        <th width="70%"><strong>Name</strong></th>
                    </tr>
                    <tbody>
                        <?php
                            
                            $count=1;
                            $sel_query="SELECT * FROM `staff3`";
                            $result = mysqli_query($con,$sel_query);
                            while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <form action="ok.php" >
                            <tr draggable="true" ondragstart="drag(event)" id="drag<?php echo $count; ?>">
                                <td><?php echo $count; ?></td>
                                <td style="font-size:15px;"><?php echo $row['sid1']; ?></td>
                                <td><?php echo $row['sname']; ?>,</br><?php echo $row['desig']; ?>,</br> <?php echo $row['dept']; ?> </td>
                                <input type="hidden" name="name[]" value="<?php echo $row['sname']; ?>">
                                <input type="hidden" name="dept[]" value="<?php echo $row['dept']; ?>">
                                <input type="hidden" name="uid[]" value="<?php echo $row['sid1']; ?>">
                                
                            </tr>
                        </form>
                        <?php $count++; } ?>
                    </tbody>
                </table>
            </div>
            
            
        </div>
</body>

</html>