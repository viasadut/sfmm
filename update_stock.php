<?php 
include "con_db.php";
?>
<!doctype html>
<html>
    <head>
        <title>Update Multiple Selected Records with PHP</title>

        <?php 
        if(isset($_POST['but_update'])){

            if(isset($_POST['update'])){
                foreach($_POST['update'] as $updateid){

                    $fname = $_POST['fname_'.$updateid];
                    $lname = $_POST['lname_'.$updateid];
                   

                    if($fname !='' && $lname !='' ){
                        $updateUser = "UPDATE users SET 
                            password='".$fname."',usertype='".$lname."'
                            WHERE id=".$updateid;
                        mysqli_query($con,$updateUser);
                    }
                    
                }
            }
            
        }
        ?>
    </head>
    <body>
        <div class='container'>

            <!-- Form -->
            <form method='post' action=''>
                <input type='submit' value='Update Selected Records' name='but_update'><br><br>
            

                <!-- Record list -->
                <table border='1' style='border-collapse: collapse;' >
                    <tr style='background: whitesmoke;'>
                        <!-- Check/Uncheck All-->
                        <th><input type='checkbox' id='checkAll' > Check</th>

                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Age</th>
                        <th>Salary</th>
                        <th>Email</th>
                    </tr>

                    <?php 
                    $query = "SELECT * FROM users";
                    $result = mysqli_query($con,$query);

                    while($row = mysqli_fetch_array($result) ){
                        $id = $row['id'];
                        $username = $row['username'];
                        $fname = $row['password'];
                        $lname = $row['usertype'];
                        
                    ?>
                        <tr>

                            <!-- Checkbox -->
                            <td><input type='checkbox' name='update[]' value='<?= $id ?>' ></td>
                            
                            <td><?= $username ?></td>
                            <td><input type='text' name='fname_<?= $id ?>' value='<?= $fname ?>' ></td>
                            <td><input type='text' name='lname_<?= $id ?>' value='<?= $lname ?>' ></td>
                           

                        </tr>
                    <?php

                    }
                    ?>
                </table>
            </form>
        </div>

        <!-- Script -->
        <script src='a_j_q/jquery-3.3.1.min.js' type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){

                // Check/Uncheck ALl
                $('#checkAll').change(function(){
                    if($(this).is(':checked')){
                        $('input[name="update[]"]').prop('checked',true);
                    }else{
                        $('input[name="update[]"]').each(function(){
                            $(this).prop('checked',false);
                        }); 
                    }
                });

                // Checkbox click
                $('input[name="update[]"]').click(function(){
                    var total_checkboxes = $('input[name="update[]"]').length;
                    var total_checkboxes_checked = $('input[name="update[]"]:checked').length;

                    if(total_checkboxes_checked == total_checkboxes){
                        $('#checkAll').prop('checked',true);
                    }else{
                        $('#checkAll').prop('checked',false);
                    }
                });
            });
        </script>
    </body>
</html>