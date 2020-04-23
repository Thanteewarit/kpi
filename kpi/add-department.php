<?php $page="admin"; $ac="add-department"; session_start();?>
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
    <style>
        #contents{
  max-height: 600px;
  width: 100%;
  overflow-y: scroll;
}
    </style>
</head>

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
                                                        <li class="breadcrumb-item"><a href="#!">ข้อมูลโรงพญาบาล</a>
                                                        </li>
                                                        <li class="breadcrumb-item"><a href="#!">ฝ่าย</a>
                                                        </li>
                                                    </ul>
                                                    
                                                            <div class="text-right">
                                                                <button type="button" class="btn btn-warning btn-outline-warning waves-effect md-trigger" data-modal="modal-15">เพิ่มฝ่าย</button>
                                                            </div>

                                                </div>
                                                <hr style="width: 95%;">

                                            </div>
                                            <div class="card-block">
                                                <div class="dt-responsive table-responsive">
                                                    <table id="footer-search" class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>ลำดับที่</th>
                                                                <th>รหัสฝ่าย</th>
                                                                <th>ชื่อฝ่าย</th>
                                                                <th>สถานะ</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                             <?php 
                                                            $valuei="SELECT department_Code, department_Name, IF(department_Status='Y','เปิดใช้งาน','ปิดใช้งาน') AS IFdepartment_Status FROM tb_department ";
                                                            foreach(c_scelectS($valuei) AS $key => $r){
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $key+1;?></td>
                                                                <td><?php echo $r['department_Code']?></td>
                                                                <td><?php echo $r['department_Name']?></td>
                                                                <td><?php echo $r['IFdepartment_Status']?></td>
                                                            </tr>
                                                            <?php } ?>
                                                         
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>ลำดับที่</th>
                                                                <th>รหัสฝ่าย</th>
                                                                <th>ชื่อฝ่าย</th>
                                                                <th>สถานะ</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="md-modal md-effect-15" id="modal-15">
                                        <div class="md-content" >
                                            <h3>เพิ่มฝ่าย</h3>
                                            <div class="card-block" id="contents">
                                                <form method="post" action="../class/sql-insert.php">
                                                     <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Director assistant </label>
                                                        <div class="col-sm-9">
                                                            <select name="director_assistant_id" id="director_assistant_id" class="form-control" onchange="getDate()" required>
                                                                <option value="" selected="selected">---Please select Director assistant---</option>
                                                                <?php 
                                                                $valuei="select director_assistant_id, director_assistant_Name
                                                             from tb_hospital_director_assistant WHERE director_assistant_Status = 'Y' ";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                                <option value="<?php echo $r['director_assistant_id'];?>"><?php echo $r['director_assistant_Name'];?></option>
                                                                <?php } ?>
                                                                
                                                            </select>

                                                        </div>
                                                    </div>
                                                     <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Division director head</label>
                                                        <div class="col-sm-9">
                                                            <select name="division_director_id" id="division_director_id" class="form-control" required onchange="getDate2()">
                                                                
                                                                <option value=""></option>
                                                                
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">division Manager Sub line</label>
                                                        <div class="col-sm-9">
                                                            <select name="division_manager_head_id" id="division_manager_head_id" class="form-control" required  onchange="getDate3()">
                                                                
                                                                <option value=""></option>
                                                                
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Division director sub</label>
                                                        <div class="col-sm-9">
                                                            <select name="division_manager_sub_id" id="division_manager_sub_id" class="form-control" required  onchange="getDate4()">
                                                                
                                                                <option value=""></option>
                                                                
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">ชื่อฝ่าย</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="department_Name" id="department_Name"  required>

                                                        </div>
                                                    </div>
                                                     <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">รหัสแผนก</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="department_Code" id="department_Code"  required>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">สถานะใช้งาน</label>
                                                        <div class="col-sm-9">
                                                            <select name="department_Status" class="form-control" required>
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
                                                    <input type="hidden" class="form-control form-control-normal" name="Mode" value="addDepartment">
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
    function getHospital() {
            //$("#director_assistant_id").html("");
            $("#division_director_id").html("");
            $("#division_manager_head_id").html("");
            $("#division_manager_sub_id").html("");
            $("#depatment_head_id").html("");
            $("#StaffName").val("");
            $.ajax({
                url: "../class/class.php",
                global: false,
                type: "POST",
                data: ({
                    id: $("#nameHospital").val() ,
                    Mode: "getHospital"
                }),
                dataType: "JSON",
                async: false,
                success: function(jd) {
                    $.each(jd, function(key, val) {

				        $.each(jd, function(key, val){
                            $("#codeHospital").val(val["hospital_Code"]);
    				    });
                    });
                }
            });
        }
        function getDate() {
            $("#division_director_id").html("");
            $("#division_manager_head_id").html("");
            $("#division_manager_sub_id").html("");
            $("#depatment_head_id").html("");
            $("#StaffName").val("");
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
            $("#division_manager_sub_id").html("");
            $("#depatment_head_id").html("");
            $("#StaffName").val(""); 
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
        function getDate3() {
            $("#division_manager_sub_id").html("");
            $("#depatment_head_id").html("");
            $("#StaffName").val(""); 
            
            $.ajax({
                url: "../class/class.php",
                global: false,
                type: "POST",
                data: ({
                    director_assistant_id: $("#director_assistant_id").val() ,
                    division_director_id: $("#division_director_id").val() ,
                    division_manager_head_id: $("#division_manager_head_id").val() ,
                    Mode: "addDepatmentHead"
                }),
                dataType: "JSON",
                async: false,
                success: function(jd) {
                    $.each(jd, function(key, val) {
                        
                        var opt='<option value="" selected="selected">---Please select Division director---</option>';
				        $.each(jd, function(key, val){
				            opt +="<option value='"+ val["division_manager_sub_id"] +"'>"+val["division_manager_sub_Name"]+"</option>";
    				    });
				        $("#division_manager_sub_id").html( opt );
                    });
                }
            });
        }
        function getDate4() {
            $("#depatment_head_id").html("");
            $("#StaffName").val(""); 
                        $.ajax({
                url: "../class/class.php",
                global: false,
                type: "POST",
                data: ({
                    director_assistant_id: $("#director_assistant_id").val() ,
                    division_director_id: $("#division_director_id").val() ,
                    division_manager_head_id: $("#division_manager_head_id").val() ,
                    division_manager_sub_id: $("#division_manager_sub_id").val() ,
                    Mode: "addDepatmentHeadId"
                }),
                dataType: "JSON",
                async: false,
                success: function(jd) {
                    $.each(jd, function(key, val) {
                        
                        var opt='<option value="" selected="selected">---Please select Division director---</option>';
				        $.each(jd, function(key, val){
				            opt +="<option value='"+ val["depatment_head_id"] +"'>"+val["depatment_head_Name"]+"</option>";
    				    });
				        $("#depatment_head_id").html( opt );
                    });
                }
            });
        }function getDate5() {
            $("#StaffName").val(""); 
        }
    </script>
</html>