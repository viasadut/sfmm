<?php
    require('../db.php');
    require('../connect.php');
    session_start();
    if ($_SESSION["sess_username"]!='') {
        
    } else {
        header('Location: /sfmm');
    }
    $user_id    = $_SESSION["sess_username"];
    $role       = $_SESSION['sess_userrole'];
    $user_name  = $_SESSION['sess_fullname'];
    $project_id = $_REQUEST['project_id'];
    
    $page = 'project/index';
$adate=date('Y-m-d h:i:s');
    

    


    if(isset($_POST['submitEquipment'])){
        $p_name                               = $con->real_escape_string($_POST['p_name']);
		$pt_mrn                               = $con->real_escape_string($_POST['pt_mrn']);
       
        $remarks               = $con->real_escape_string($_POST['remarks']);
        
        
        
		if($p_name!=''){
		try {
                        $dbh->beginTransaction();
                        $dbh->query("INSERT INTO `project_sample` ( 
                        `p_name`,`remarks`,`add_by`,`add_time`,`pmrn`) VALUES
						('$p_name','$remarks','$user_id','$adate','$pt_mrn')");
                        
                        $dbh->commit();
                        header("location:add_sample.php");
                    } catch (\Throwable $e) {
                        $dbh->rollback();
                        throw $e;
                        echo '<script language="javascript">';
                        echo 'alert("Unsuccessful !!Something went wrong "); ';
                        echo '</script>';
                    }
		
		
		}
		        
	}
    

?>
<?php 
    include '../template/header1.php';

    
?>
<script type="text/javascript">                               
$(function(){                                            
$('.content').ckeditor();                             
});             
</script>  
    
                <div class="col-md-16">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Project List</h3>
                           
                            <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal-default">
                                Add New <i class="fas fa-plus"></i>
                            </button>
                            
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="example1">
                                <thead>
                                    <tr>
                                        <th>SNO</th>
                                        <th>Project Name</th>
										<th>Patient MRN</th>
                                        
                                        <th>Remarks</th>
										
                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        try {
                                            $query  = "Select * from project_sample where status='0' order by id desc";
                                            $stmt 	= $dbh->prepare($query);
                                            $stmt	->execute();
                                        } catch(PDOException $e) {
                                            echo "Error: " . $e->getMessage();
                                        }

                                        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                                    ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        
                                        <td><?php echo $row['p_name']; ?></td>
										<td>
										<a target='_blank' href="../../deathstatdetailsmng.php?pmrn=<?php echo $row['pmrn']; ?>">
                                                
                                            
										<?php echo $row['pmrn']; ?>
										</a>
										
										</td>
                                        <td><?php echo $row['remarks']; ?></td>

                                       
                                       
										
										</td>
                                        
                                        <td>
                                            <a target='_blank' class="btn btn-outline-info btn-sm btn-block" href="sample_view.php?id=<?php echo $row['id']; ?>">
                                                <i class="fas fa-info"></i> View
                                            </a>
											
											<input type="button" name="edit_co" value="Close Case" id="<?php echo $row['id'];?>" class="btn btn-info btn-xs edit_data_co" />
                                        </td>
										
																				
										
										
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>        
                        </div>
                        <div class="card-footer">
                                
                        </div>
                    </div>
                    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Project Name</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form class="form-horizontal" action=""  method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Project Name</label>  
                         
						  
						 <select name="p_name" class="form-control">
        <option value=''>-Select-</option>
		


<?php 
			$sql = "select * from `project`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->p_name."'>".$row->p_name."</option>";
				}
			}
			?>
			
</select>
                                                </div>
                                            </div>
                                            
                                        </div>
										
										 <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label  class="col-sm-12 col-form-label">Patient MRN:</label>
                                                    <input name="pt_mrn" type="text" class="form-control" placeholder="Enter Project Name" Required>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label  class="col-form-label">Remarks:</label>
                                                <textarea id="editor3" name="remarks" class="form-control" placeholder="Enter Product's summary technical specification"></textarea>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close <i class="fas fa-times"></i></button>
                                        <button name="submitEquipment" type="submit" id="btn-submit" class="btn btn-info">Save  <i class="fas fa-save"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        initSample();
        CKEDITOR.replace( 'editor1' );
        CKEDITOR.replace( 'editor2' );
        CKEDITOR.replace( 'editor3' );
        CKEDITOR.replace( 'editor4' );
    </script>

<?php include '../template/footer.php';?>
<script>
    initSample();
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": true, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>


 <div id="dataModal7" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"></h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modal7" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Case Portal</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" name="insert_form7" id="insert_form7">  
                         <label>Project Name</label>  
                          <input type="text" name="name1" id="name1" class="form-control" size="15" readonly/>  
                          
                          <label>MRN</label>  
                          <input type="text" name="address1" id="address1" class="form-control"  size="15"readonly/>  
                          
						  
					
						  
                          
						  
						 <label>Remarks</label>  
                          <input type="text" name="event" id="event" class="form-control" value=""  size="15"required >  
						  
						  
                          
                          <input type="hidden" name="employee_id2" id="employee_id2" />  
                         <input type="submit" name="insert" id="insert450" value="Insert" class="btn btn-success" />  
													
													
                           
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  




 <script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form7')[0].reset();  
      });  
      $(document).on('click', '.edit_data_co', function(){  
           var employee_id2 = $(this).attr("id");  
           $.ajax({  
                url:"pull_project_data.php",  
                method:"POST",  
                data:{employee_id2:employee_id2},  
				
                dataType:"json",  
                success:function(data){  
                      $('#name1').val(data.p_name);  
                     $('#address1').val(data.pmrn);  
                     $('#result1').val(data.remarks); 
					 
					 
					 
					 
					 $('#employee_id2').val(data.id);  
                     $('#insert450').val("Update");  
                     $('#add_data_Modal7').modal('show');  
					  
                              

		  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form7').on("submit", function(event){  
           event.preventDefault();  
           if($('#name1').val() == "")  
           {  
                alert("Name is required");  
           }  
         
           
           else  
           {  
          $.ajax({  
                     url:"pull_project_data1.php",  
                     method:"POST",  
                     data:$('#insert_form7').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form7')[0].reset();  
                          $('#add_data_Modal7').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });   
     
 });  
 </script>