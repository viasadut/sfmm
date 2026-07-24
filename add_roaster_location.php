
    <div class="preloader flex-column justify-content-center align-items-center">
        <h1>Settings</h1>
    </div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Settings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/sfmm/ticketv2/dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Settings</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <!-- <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal-default">
                Add New Department <i class="fas fa-plus"></i>
            </button> -->
            <?php
                if ($c>0 && $c_subdept>1) {
            ?>
                <div class="row">
                    <h3>
                        <?php echo $hod_user_dept_data["name"]; ?>
                    </h3>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Service List</h3>
                                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal-default-service">
                                    Add New Type <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Service Type</th>
                                    </tr>
                                </thead>
                                    <?php
                                        $type_query = "SELECT * FROM `ticket_service_type` WHERE dept_id='$hod_dept_id'";
                                        $run_type = $con->query($type_query) or die("ticket count".$con->error);
                                        while ($row = $run_type->fetch_object()){
                                    ?>
                                    <tr>
                                        <td><?php echo $row->type ;?></td>
                                    </tr>
                                    <?php }  ?>
                                </table>        
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Category List</h3>
                                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal-default-category">
                                    Add New Category <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <div class="card-body">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Service Category</th>
                                    </tr>
                                </thead>
                                    <?php
                                        $type_query = "SELECT * FROM `ticket_service_category` WHERE dept_id='$hod_dept_id'";
                                        $run_type = $con->query($type_query) or die("ticket count".$con->error);
                                        while ($row = $run_type->fetch_object()){
                                    ?>
                                    <tr>
                                        <td><?php echo $row->category ;?></td>
                                    </tr>
                                    <?php }  ?>
                                </table>        
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- add new category -->
                <div class="modal fade" id="modal-default-category">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Category</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form class="form-horizontal" action=""  method="post"">
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-12 col-form-label">Category:</label>
                                        <div class="col-sm-12">
                                            <input name="dept_id" type="hidden" class="form-control" value="<?php echo $hod_user_dept_data["id"]; ?>">
                                            <input name="category" type="text" class="form-control" placeholder="Enter Service Category">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close <i class="fas fa-times"></i></button>
                                    <button name="scategory" type="submit" id="btn-submit" class="btn btn-info">Save  <i class="fas fa-save"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- add new category -->
                <!-- add new type -->
                <div class="modal fade" id="modal-default-service">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Service Type</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form class="form-horizontal" action=""  method="post"">
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-12 col-form-label">Type:</label>
                                        <div class="col-sm-12">
                                            <input name="dept_id" type="hidden" class="form-control" value="<?php echo $hod_user_dept_data["id"]; ?>">
                                            <input name="type" type="text" class="form-control" placeholder="Enter Service Type">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close <i class="fas fa-times"></i></button>
                                    <button name="stype" type="submit" id="btn-submit" class="btn btn-info">Save  <i class="fas fa-save"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- add new type -->
            <?php 
                }
                if ($c_subdept == '1') {
            ?>
            <div class="row">
                    <h3>
                        <?php echo $hod_user_subdept_data["name"]; ?>
                    </h3>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Service List</h3>
                                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal-default-service">
                                    Add New Type <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Service Type</th>
                                    </tr>
                                </thead>
                                    <?php
                                        $type_query = "SELECT * FROM `ticket_service_type` WHERE dept_id='$hod_subdept_id'";
                                        $run_type = $con->query($type_query) or die("ticket count".$con->error);
                                        while ($row = $run_type->fetch_object()){
                                    ?>
                                    <tr>
                                        <td><?php echo $row->type ;?></td>
                                    </tr>
                                    <?php }  ?>
                                </table>        
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Category List</h3>
                                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal-default-category">
                                    Add New Category <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <div class="card-body">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Service Category</th>
                                    </tr>
                                </thead>
                                    <?php
                                        $type_query = "SELECT * FROM `ticket_service_category` WHERE dept_id='$hod_subdept_id'";
                                        $run_type = $con->query($type_query) or die("ticket count".$con->error);
                                        while ($row = $run_type->fetch_object()){
                                    ?>
                                    <tr>
                                        <td><?php echo $row->category ;?></td>
                                    </tr>
                                    <?php }  ?>
                                </table>        
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- add new category -->
                <div class="modal fade" id="modal-default-category">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Category</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form class="form-horizontal" action=""  method="post"">
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-12 col-form-label">Category:</label>
                                        <div class="col-sm-12">
                                            <input name="dept_id" type="hidden" class="form-control" value="<?php echo $hod_user_subdept_data["id"]; ?>">
                                            <input name="category" type="text" class="form-control" placeholder="Enter Service Category">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close <i class="fas fa-times"></i></button>
                                    <button name="scategory" type="submit" id="btn-submit" class="btn btn-info">Save  <i class="fas fa-save"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- add new category -->
                <!-- add new type -->
                <div class="modal fade" id="modal-default-service">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Service Type</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form class="form-horizontal" action=""  method="post"">
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-12 col-form-label">Type:</label>
                                        <div class="col-sm-12">
                                            <input name="dept_id" type="hidden" class="form-control" value="<?php echo $hod_user_subdept_data["id"]; ?>">
                                            <input name="type" type="text" class="form-control" placeholder="Enter Service Type">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close <i class="fas fa-times"></i></button>
                                    <button name="stype" type="submit" id="btn-submit" class="btn btn-info">Save  <i class="fas fa-save"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- add new type -->
            <?php 
                }
            ?>
        </div>

        <!-- add new department -->
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add New Department</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-horizontal" action=""  method="post"">
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-12 col-form-label">Department Name:</label>
                                <div class="col-sm-12">
                                    <input name="name" type="text" class="form-control" placeholder="Enter Department Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-12 col-form-label">Short Code:</label>
                                <div class="col-sm-12">
                                    <input name="short_code" type="text" class="form-control" placeholder="Enter Short Code">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-12 col-form-label">Description:</label>
                                <div class="col-sm-12">
                                    <textarea id="editor" name="description" class="form-control" placeholder="Enter Product's Specification"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close <i class="fas fa-times"></i></button>
                            <button name="submit" type="submit" id="btn-submit" class="btn btn-info">Save  <i class="fas fa-save"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- add new department -->
        
    </section>

<?php include 'ticketv2/template/footer.php';?>

<script>
    initSample();
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
        }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
</script>
