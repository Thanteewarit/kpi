<?php $page="admim-kpi"; $ac="add-department-kpi"; session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("inc-header.php")?>
    <!-- Favicon icon -->
    <link rel="icon" href="../files/assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="../files/bower_components/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="../files/assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="../files/assets/icon/icofont/css/icofont.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="../files/assets/icon/font-awesome/css/font-awesome.min.css">
    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css" href="../files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../files/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../files/assets/pages/data-table/extensions/responsive/css/responsive.dataTables.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="../files/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../files/assets/css/component.css">
    <link rel="stylesheet" type="text/css" href="../files/assets/css/jquery.mCustomScrollbar.css">
</head>
    <style>
        #contents {
            max-height: 600px;
            width: 100%;
            overflow-y: scroll;
        }
    </style>
<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <?php include("inc-nav.php");?>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <?php include("inc-menu.php");?>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="page-header">
                                                        <div class="card-block">

                                                            <ul class="breadcrumb-title  p-t-10">
                                                                <li class="breadcrumb-item">
                                                                    <a href="index.html"> <i class="fa fa-home"></i> </a>
                                                                </li>
                                                                <li class="breadcrumb-item"><a href="#!">KPI</a>
                                                                </li>
                                                                <li class="breadcrumb-item"><a href="#!">Add Department KPI</a>
                                                                </li>
                                                            </ul>
                                                            <div class="text-right">
                                                                <button type="button" class="btn btn-warning btn-outline-warning waves-effect md-trigger" data-modal="modal-15">Add Department KPI</button>
                                                            </div>
                                                        </div>
                                                        <hr style="width: 95%;">

                                                    </div>
                                                    <div class="card-block">
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Codes KPI</th>
                                                                        <th>KPI Name</th>
                                                                        <th>Weight</th>
                                                                        <th>Target</th>
                                                                        <th>ค่ามาตรฐาน 0 </th>
                                                                        <th>ค่ามาตรฐาน 1</th>
                                                                        <th>ค่ามาตรฐาน 2</th>
                                                                        <th>ค่ามาตรฐาน 3</th>
                                                                        <th>ค่ามาตรฐาน 4</th>
                                                                        <th>ค่ามาตรฐาน 5</th>
                                                                        <th>สถานะ</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php 
                                                            $valuei="select 
                                                            r1.kpi_master_id, r1.assessment_time_code,
                                                            r1.kpi_master_name, r1.kpi_master_weight, r1.kpi_master_target,
                                                            r1.kpi_master_standard_0, r1.kpi_master_standard_1, r1.kpi_masterl_standard_2,
                                                            r1.kpi_master_standard_3, r1.kpi_master_standard_4, r1.kpi_master_standard_5,
                                                            r1.kpi_master_status, r2.kpi_type_name, 
                                                            (select SUM(kpi_master_weight) FROM tb_kpi_master WHERE kpi_master_type = '2')  AS SUMkpi_master_weight,
                                                            IF(r1.kpi_master_status='Y','เปิดใช้งาน','ระงับการใช้งาน') AS IFstatus,
                                                            IF(r1.kpi_master_status='Y', 'info', 'danger') AS IFstatusColor
                                                            from tb_kpi_master AS r1
                                                            JOIN tb_kpi_type AS r2 ON r2.kpi_type_id = r1.kpi_type_id
                                                            WHERE r1.kpi_master_type = '2'
                                                            ";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                                    <tr>
                                                                        <td><?php echo $r['kpi_type_name'];?></td>
                                                                        <td><?php echo $r['assessment_time_code']?></td>
                                                                        <td><?php echo $r['kpi_master_name']?></td>
                                                                        <td><?php echo $r['kpi_master_weight']?></td>
                                                                        <td><?php echo $r['kpi_master_target']?></td>
                                                                        <td><?php echo $r['kpi_master_standard_0']?></td>
                                                                        <td><?php echo $r['kpi_master_standard_1']?></td>
                                                                        <td><?php echo $r['kpi_master_standard_1']?></td>
                                                                        <td><?php echo $r['kpi_master_standard_1']?></td>
                                                                        <td><?php echo $r['kpi_master_standard_1']?></td>
                                                                        <td><?php echo $r['kpi_master_standard_1']?></td>
                                                                        <td><span class="pcoded-badge label label-<?php echo $r['IFstatusColor'];?>"><?php echo $r['IFstatus']?></span></td>
                                                                       
                                                                    </tr>
                                                                    <?php }?>
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr <?php if($r['SUMkpi_master_weight']!=100){ echo 'style="background-color: red;"';}?>>
                                                                        <th colspan="3" class="text-right">น้ำหนักรวม</th>
                                                                        <th><?php echo $r['SUMkpi_master_weight'];?></th>
                                                                        <th colspan="9">100 % </th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="md-modal md-effect-15" id="modal-15">
                                        <div class="md-content">
                                            <h3>Add Department KPI</h3>
                                            <div class="card-block" id="contents">
                                                <form method="post" action="../class/sql-insert.php">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Codes KPI</label>
                                                        <div class="col-sm-9">
                                                            <select name="assessment_time_code" class="form-control" required>
                                                                <option value="" selected="selected">---Please select ---</option>
                                                                <?php 
                                                                $valuei="select * from tb_assessment_time WHERE assessment_time_status = 'Y' ";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                                <option value="<?php echo $r['assessment_time_code'];?>"> <?php echo $r['assessment_time_code'];?> [ <?php echo $r['assessment_time_name'];?> ]
                                                                <?php } ?> 
                                                                
                                                            </select>

                                                        </div>
                                                    </div>
                                                     <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Type KPI</label>
                                                        <div class="col-sm-9">
                                                            <select name="kpi_type_id" class="form-control" required>
                                                                <option value="" selected="selected">---Please select ---</option>
                                                                <?php 
                                                                $valuei="select * from tb_kpi_type WHERE kpi_type_status = 'Y' ";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                                <option value="<?php echo $r['kpi_type_id'];?>"> <?php echo $r['kpi_type_name'];?>
                                                                <?php } ?> 
                                                                
                                                            </select>

                                                        </div>
                                                    </div>
                                                     <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">KPI Name</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="kpi_master_name" id="kpi_master_name" required autocomplete="off">

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Weight</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="kpi_master_weight" id="kpi_master_weight" required autocomplete="off">

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Target </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="kpi_master_target" id="kpi_master_target" required autocomplete="off">

                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-form-label text-center">ค่ามาตรฐานการให้คะแนน</label>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">คะแนน 0</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="kpi_master_standard_0" id="kpi_master_standard_0" required autocomplete="off">

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">คะแนน 1</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="kpi_master_standard_1" id="kpi_master_standard_1" required autocomplete="off">

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">คะแนน 2</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="kpi_masterl_standard_2" id="kpi_masterl_standard_2" required autocomplete="off">

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">คะแนน 3</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="kpi_master_standard_3" id="kpi_master_standard_3" required autocomplete="off">

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">คะแนน 4</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="kpi_master_standard_4" id="kpi_master_standard_4" required autocomplete="off">

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">คะแนน 5</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="kpi_master_standard_5" id="kpi_master_standard_5" required autocomplete="off">

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Director Status </label>
                                                        <div class="col-sm-9">
                                                            <select name="kpi_master_status" class="form-control" required>
                                                                <option value="Y">ใช้งาน</option>
                                                                <option value="N">ปิดการใช้งาน</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3"></label>
                                                        <div class="col-sm-9">
                                                            <input type="submit" class="btn btn-primary m-b-0" value="Save">
                                                        </div>
                                                    </div>
                                                    <input type="hidden" class="form-control form-control-normal" name="Mode" value="addKpiDepartment">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="md-overlay"></div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="../files/bower_components/jquery/js/jquery.min.js"></script>
    <script src="../files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script src="../files/bower_components/popper.js/js/popper.min.js"></script>
    <script src="../files/bower_components/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script src="../files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script src="../files/bower_components/modernizr/js/modernizr.js"></script>
    <script src="../files/bower_components/modernizr/js/css-scrollbars.js"></script>
    <!-- sweet alert js -->
    <script src="../files/bower_components/sweetalert/js/sweetalert.min.js"></script>
    <script src="../files/assets/js/modal.js"></script>
    <!-- sweet alert modal.js intialize js -->
    <!-- modalEffects js nifty modal window effects -->
    <script src="../files/assets/js/classie.js"></script>
    <script src="../files/assets/js/modalEffects.js"></script>
    <script src="../files/assets/js/pcoded.min.js"></script>
    <script src="../files/assets/js/vertical/vertical-layout.min.js"></script>
    <script src="../files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Custom js -->
    <script src="../files/assets/js/script.js"></script>
    <!-- data-table js -->
    <script src="../files/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../files/assets/pages/data-table/js/jszip.min.js"></script>
    <script src="../files/assets/pages/data-table/js/pdfmake.min.js"></script>
    <script src="../files/assets/pages/data-table/js/vfs_fonts.js"></script>
    <script src="../files/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../files/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <!-- Custom js -->
    <script src="../files/assets/pages/data-table/js/data-table-custom.js"></script>
</body>
<script>
        function getDate() {
            $("#division_director_id").html("");
            $("#division_manager_head_id").html("");
            $("#division_manager_sub_Name").val("");
            $.ajax({
                url: "../class/class.php",
                global: false,
                type: "POST",
                data: ({
                    id: $("#director_assistant_id").val() ,
                    Mode: "getDivisionDirector"
                }),
                dataType: "JSON",
                async: false,
                success: function(jd) {
                    $.each(jd, function(key, val) {
                        
                        var opt='<option value="" selected="selected">---Please select Division director---</option>';
				        $.each(jd, function(key, val){
				            opt +="<option value='"+ val["division_director_id"] +"'>"+val["division_director_Name"]+"</option>";
    				    });
				        $("#division_director_id").html( opt );
                    });
                }
            });
        }
        function getDate2() {
            $("#division_manager_head_id").html("");
            $("#division_manager_sub_Name").val("");
            $.ajax({
                url: "../class/class.php",
                global: false,
                type: "POST",
                data: ({
                    director_assistant_id: $("#director_assistant_id").val() ,
                    division_director_id: $("#division_director_id").val() ,
                    Mode: "getDivisionManagerSub"
                }),
                dataType: "JSON",
                async: false,
                success: function(jd) {
                    $.each(jd, function(key, val) {
                        
                        var opt='<option value="" selected="selected">---Please select Division director---</option>';
				        $.each(jd, function(key, val){
				            opt +="<option value='"+ val["division_manager_head_id"] +"'>"+val["division_manager_head_Name"]+"</option>";
    				    });
				        $("#division_manager_head_id").html( opt );
                    });
                }
            });
        }
    </script>

</html>