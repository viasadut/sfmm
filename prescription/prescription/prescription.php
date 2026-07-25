<?php include '../template/header.php';?>
    <div class="preloader flex-column justify-content-center align-items-center">
        <h1>Prescription</h1>
    </div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Prescription</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Prescription</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- patient info -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Patient Information</h3>
                            <i class="fa fa-user float-right fa-lg"></i>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <b>Name:</b><strong> <a href="#"> Asadut Zaman Asadut Zaman</a></strong> <br>
                                    <b>PMRN:</b><strong><a href="#"> 123456</a></strong><br>
                                    <b>Age:</b> 30 <br>
                                    <b>Gender:</b> Male  <br>
                                    <b>Phone:</b> 01810008080
                                </div>
                                <div class="col-md-6">
                                    <b>Occupation:</b> Software Engineer <br>
                                    <b>Marital Status:</b> No <br>
                                    <b>Height (CM):</b> 30 <br>
                                    <b>Weight (KG):</b> 40  <br>
                                    <b>BMI:</b> 01810008080
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Vitals Information</h3>
                            <i class="fa fa-heartbeat float-right fa-lg"></i>
                        </div>
                        <div class="card-body">
                            <b>Pulse:</b> 100 <br>
                            <b>Blood Pressure:</b> 100 <br>
                            <b>Temperature:</b> 30 <br>
                            <b>SPO2:</b> 40  <br>
                            <b>RR:</b> 100
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Comorbidities</h3>
                            <i class="fa fa-stethoscope float-right fa-lg"></i>
                        </div>
                        <div class="card-body">
                            <b>Hypertension:</b> NO <br>
                            <b>Heart Disease:</b> NO <br>
                            <b>DM:</b> NO <br>
                            <b>Kidney Disease</b> NO  <br>
                            <b>Asthma:</b> NO<br>
                            <b>Thyriod Disease:</b> NO<br>
                            <b>Neuro Disorder:</b> NO<br>
                            <b>Liver Disease:</b> NO
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>
    <section class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-9">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Prescription</h3>
                            <i class="fas fa-prescription float-right fa-lg"></i>
                        </div>
                        <form class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Patient's Clinical Details:</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="" id="" rows="3" placeholder="Patient's Clinical Details"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Patient's Diagnosis:</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="" id="" rows="3" placeholder="Patient's Diagnosis"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Diet Instructions:</label>
                                    <div class="col-sm-10">
                                        <input list=diet1 name="pdiet" placeholder="Select Diet" class="form-control" >
                                        <select>
                                            <option value=''>-Select Diet-</option>
                                            <option value=''>-Select Diet1-</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Other Instructions:</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="" id="" rows="3" placeholder="Other Instructions"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Save</button>
                                <button type="submit" class="btn btn-default float-right">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">History</h3>
                            <i class="fas fa-hospital-user float-right fa-lg"></i>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-block btn-info"><i class="fa fa-pills float-left fa-2x"></i> Medication</button>
                            <button type="button" class="btn btn-block btn-info"><i class="fas fa-vials float-left fa-2x"></i> Invistigation</button>
                            <button type="button" class="btn btn-block btn-info"><i class="fa fa-stethoscope float-left fa-2x"></i> Record of Previous Visits</button>
                            <button type="button" class="btn btn-block btn-info"><i class="fas fa-notes-medical float-left fa-2x"></i> Template Of Previous Visits</button>
                            <button type="button" class="btn btn-block btn-info"><i class="fas fa-microscope float-left fa-2x"></i> LAB REPORT</button>
                            <button type="button" class="btn btn-block btn-info"><i class="fa fa-user-md float-left fa-2x"></i> SURGERY NOTE</button>
                            <button type="button" class="btn btn-block btn-info"><i class="fas fa-lungs-virus float-left fa-2x"></i> COVID Record</button>
                            <button type="button" class="btn btn-block btn-info"><i class="fas fa-notes-medical float-left fa-2x"></i> OPD PROCEDURE NOTE </button>
                        </div>
                        <div class="card-footer">
                            Patient History
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
<?php include '../template/footer.php';?>