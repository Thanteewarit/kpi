<?php $page="Staff"; $ac="staff-list"; session_start();?>
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
        #contents {
            max-height: 100%;
            width: 100%;
            overflow-y: scroll;
        }
    </style>
</head>

<body onload="onload();">
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
                                            <!-- Basic Form Inputs card start -->
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>แก้ไขข้อมูลพนักงาน</h5>
                                                </div>
                                                <div class="card-block">
                                                    <h4 class="sub-title">แก้ไขข้อมูล </h4>
                                                    <div class="card-block" id="contents">
                                            <form method="post" action="../class/sql-insert.php">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Name Hospital</label>
                                                    <div class="col-sm-9">
                                                        <select name="staff_hospital_id" id="staff_hospital_id" class="form-control" required >

                                                            <option value=""></option>

                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Director assistant </label>
                                                    <div class="col-sm-9">
                                                        <select name="staff_director_assistant_id" id="director_assistant_id" class="form-control" onchange="getDate()" required>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Division director head</label>
                                                    <div class="col-sm-9">
                                                        <select name="staff_division_director_id" id="division_director_id" class="form-control" required onchange="getDate2()">

                                                            <option value=""></option>

                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">division Manager Sub line</label>
                                                    <div class="col-sm-9">
                                                        <select name="staff_division_manager_head_id" id="division_manager_head_id" class="form-control" required onchange="getDate3()">

                                                            <option value=""></option>

                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Division director sub</label>
                                                    <div class="col-sm-9">
                                                        <select name="staff_division_manager_sub_id" id="division_manager_sub_id" class="form-control" required onchange="getDate4()">

                                                            <option value=""></option>

                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Division director </label>
                                                    <div class="col-sm-9">
                                                        <select name="staff_depatment_head_id" id="depatment_head_id" class="form-control" required onchange="getDate5()">

                                                            <option value=""></option>

                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">ตำแหน่งงาน</label>
                                                    <div class="col-sm-9">
                                                        <select name="staff_level_position" id="level_position_code" class="form-control" required>
                                                            <option value="">---Please select Director assistant---</option>
                                                            
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">ID Staff</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="staff_code" id="staff_code" required readonly>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">คำนำหน้า</label>
                                                    <div class="col-sm-9">
                                                        <select name="staff_title" id="staff_title" class="form-control" required>
                                                            <option value="Mr">Mr.</option>
                                                            <option value="Miss">Miss.</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">ชื่อจริง </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="staff_Name" id="staff_Name" required>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">นามสกุล </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="staff_Sername" id="staff_Sername" required>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">แผนก</label>
                                                    <div class="col-sm-9">
                                                        <select name="staff_department_id" id="department_id" class="form-control" onchange="getdata6()" required>
                                                            <option value="" selected="selected">---Please select ---</option>
                                                            <?php 
                                                                $valuei="SELECT *  FROM tb_department WHERE department_Status = 'Y' ";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                            <option value="<?php echo $r['department_id'];?>"><?php echo $r['department_Name'];?></option>
                                                            <?php } ?>

                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">แผนกย่อย</label>
                                                    <div class="col-sm-9">
                                                        <select name="staff_department_work_id" id="department_work_id" class="form-control" required>

                                                            <option value=""></option>

                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Job Code</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="staff_job_code" id="staff_job_code" required>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Job Deception</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="staff_job_description" id="staff_job_description" required>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Job Grade</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="staff_job_grade" id="staff_job_grade" required>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">วันเริ่มงาน</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control" name="staff_start" id="staff_start" required>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">สิ้นสุดงาน</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control" name="staff_end" id="staff_end">

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Director Status </label>
                                                    <div class="col-sm-9">
                                                        <select name="staff_status" class="form-control" required>
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
                                                <input type="hidden" name="Mode" value="addStaff">
                                                <input type="hidden" name="staff_id" value="<?php echo cut(TokenVerify($_GET['key'], $secret));?>">
                                            </form>
                                        </div>
                                                
                                                </div>
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
      function onload() {

        <?php 
        $valuei="SELECT * FROM tb_staff WHERE staff_id = '".cut(TokenVerify($_GET['key'], $secret))."' ";
        $arr=c_scelectOne($valuei);
        ?>

          var  staff_id = '<?php echo $arr['staff_id']?>';  
          var  staff_code = '<?php echo $arr['staff_code']?>'; 
          var  staff_title = '<?php echo $arr['staff_title']?>'; 
          var  staff_Name = '<?php echo $arr['staff_Name']?>';
          var  staff_Sername = '<?php echo $arr['staff_Sername']?>'; 
          var  staff_department_id = '<?php echo $arr['staff_department_id']?>';
          var  staff_department_work_id = '<?php echo $arr['staff_department_work_id']?>'; 
          var  staff_job_code = '<?php echo $arr['staff_job_code']?>'; 
          var  staff_job_description = '<?php echo $arr['staff_job_description']?>'; 
          var  staff_job_grade = '<?php echo $arr['staff_job_grade']?>';
          var  staff_hospital_id = '<?php echo $arr['staff_hospital_id']?>'; 
          var  staff_director_assistant_id = '<?php echo $arr['staff_director_assistant_id']?>'; 
          var  staff_division_director_id = '<?php echo $arr['staff_division_director_id']?>'; 
          var  staff_division_manager_head_id = '<?php echo $arr['staff_division_manager_head_id']?>'; 
          var  staff_division_manager_sub_id = '<?php echo $arr['staff_division_manager_sub_id']?>'; 
          var  staff_depatment_head_id = '<?php echo $arr['staff_depatment_head_id']?>'; 
          var  staff_start = '<?php echo $arr['staff_start']?>'; 
          var  staff_end = '<?php echo $arr['staff_end']?>'; 
          var  staff_status = '<?php echo $arr['staff_status']?>';
          var  staff_level_position = '<?php echo $arr['staff_level_position']?>'; 
        
        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                id: staff_hospital_id ,
                Mode: "getHospital"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {
                    
                    var opt = '<option value="">---Please select Division director---</option>';
                    $.each(jd, function(key, val) {
                        if(val["hospital_id"]==staff_hospital_id)
                        {
                            opt += '<option value="'+ val["hospital_id"] + '" selected="selected">'+ val["hospital_NameTh"] + '</option>';
                        }else
                        {
                            opt += '<option value="'+ val["hospital_id"] + '">'+ val["hospital_NameTh"] + '</option>';
                        }
                        
                    });
                    $("#staff_hospital_id").html(opt);
                });
            }
        });
        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                Mode: "getHospitalDirectorAssistant"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {
                    
                    var opt = '<option value="">---Please select Division director---</option>';
                    $.each(jd, function(key, val) {
                        if(val["director_assistant_id"]==staff_director_assistant_id)
                        {
                            opt += '<option value="'+ val["director_assistant_id"] + '" selected="selected">'+ val["director_assistant_Name"] + '</option>';
                        }else
                        {
                            opt += '<option value="'+ val["director_assistant_id"] + '">'+ val["director_assistant_Name"] + '</option>';
                        }
                        
                    });
                    $("#director_assistant_id").html(opt);
                });
            }
        });
        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                id : staff_director_assistant_id ,
                Mode: "getDivisionDirector"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {
                    
                    var opt = '<option value="">---Please select Division director---</option>';
                    $.each(jd, function(key, val) {
                        if(val["division_director_id"]==staff_division_director_id)
                        {
                            opt += '<option value="'+ val["division_director_id"] + '" selected="selected">'+ val["division_director_Name"] + '</option>';
                        }else
                        {
                            opt += '<option value="'+ val["division_director_id"] + '">'+ val["division_director_Name"] + '</option>';
                        }
                        
                    });
                    $("#division_director_id").html(opt);
                });
            }
        });
        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                director_assistant_id: staff_director_assistant_id,
                division_director_id: staff_division_director_id,
                Mode: "getDivisionManagerSub",
                dd : "hhh"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {
                    
                    var opt = '<option value="">---Please select Division director---</option>';
                    $.each(jd, function(key, val) {
                        if(val["division_manager_head_id"]==staff_division_manager_head_id)
                        {
                            opt += '<option value="'+ val["division_manager_head_id"] + '" selected="selected">'+ val["division_manager_head_Name"] + '</option>';
                        }else
                        {
                            opt += '<option value="'+ val["division_manager_head_id"] + '">'+ val["division_manager_head_Name"] + '</option>';
                        }
                        
                    });
                    $("#division_manager_head_id").html(opt);
                });
            }
        });
        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                director_assistant_id: staff_director_assistant_id,
                division_director_id: staff_division_director_id,
                division_manager_head_id: staff_division_manager_head_id,
                Mode: "addDepatmentHead"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {
                    
                    var opt = '<option value="">---Please select Division director---</option>';
                    $.each(jd, function(key, val) {
                        if(val["division_manager_sub_id"]==staff_division_manager_sub_id)
                        {
                            opt += '<option value="'+ val["division_manager_sub_id"] + '" selected="selected">'+ val["division_manager_sub_Name"] + '</option>';
                        }else
                        {
                            opt += '<option value="'+ val["division_manager_sub_id"] + '">'+ val["division_manager_sub_Name"] + '</option>';
                        }
                        
                    });
                    $("#division_manager_sub_id").html(opt);
                });
            }
        });
        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                director_assistant_id: staff_director_assistant_id,
                division_director_id: staff_division_director_id,
                division_manager_head_id: staff_division_manager_head_id,
                division_manager_sub_id: staff_division_manager_sub_id,
                Mode: "addDepatmentHeadId"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {
                    
                    var opt = '<option value="">---Please select Division director---</option>';
                    $.each(jd, function(key, val) {
                        if(val["depatment_head_id"]==staff_depatment_head_id)
                        {
                            opt += '<option value="'+ val["depatment_head_id"] + '" selected="selected">'+ val["depatment_head_Name"] + '</option>';
                        }else
                        {
                            opt += '<option value="'+ val["depatment_head_id"] + '">'+ val["depatment_head_Name"] + '</option>';
                        }
                        
                    });
                    $("#depatment_head_id").html(opt);
                });
            }
        });
          $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                Mode: "addStaffLevelPosition"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {
                    
                    var opt = '<option value="">---Please select Division director---</option>';
                    $.each(jd, function(key, val) {
                        if(val["level_position_code"]==staff_level_position)
                        {
                            opt += '<option value="'+ val["level_position_code"] + '" selected="selected">'+ val["level_position_name"] + '</option>';
                        }else
                        {
                            opt += '<option value="'+ val["level_position_code"] + '">'+ val["level_position_name"] + '</option>';
                        }
                        
                    });
                    $("#level_position_code").html(opt);
                });
            }
        });
        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                Mode: "getDepartmentlod"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {
                    
                    var opt = '<option value="">---Please select Division director---</option>';
                    $.each(jd, function(key, val) {
                        if(val["department_id"]==staff_department_id)
                        {
                            opt += '<option value="'+ val["department_id"] + '" selected="selected">'+ val["department_Name"] + '</option>';
                        }else
                        {
                            opt += '<option value="'+ val["department_id"] + '">'+ val["department_Name"] + '</option>';
                        }
                        
                    });
                    $("#department_id").html(opt);
                });
            }
        });
        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                id: staff_department_id,
                Mode: "getDepartment"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {

                    var opt = '<option value="">---Please select Division director---</option>';
                    $.each(jd, function(key, val) {
                        if(val["department_work_id"]==staff_department_work_id)
                        {
                            opt += '<option value="'+ val["department_work_id"] + '" selected="selected">'+ val["department_work_Name"] + '</option>';
                        }else
                        {
                            opt += '<option value="'+ val["department_work_id"] + '">'+ val["department_work_Name"] + '</option>';
                        }
                        
                    });
                    $("#department_work_id").html(opt);
                });
            }
        });
          
           $("#staff_code").val(staff_code);
           $("#staff_Name").val(staff_Name);
           $("#staff_Sername").val(staff_Sername);
          $("#staff_job_code").val(staff_job_code);
          $("#staff_job_description").val(staff_job_description);
          $("#staff_job_grade").val(staff_job_grade);
          $("#staff_start").val(staff_start);
          $("#staff_end").val(staff_end);
          $("#staff_title").val(staff_title);
    }  
</script>
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
                id: $("#nameHospital").val(),
                Mode: "getHospital"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {

                    $.each(jd, function(key, val) {
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
                id: $("#director_assistant_id").val(),
                Mode: "getDivisionDirector"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {

                    var opt = '<option value="" selected="selected">---Please select Division director---</option>';
                    $.each(jd, function(key, val) {
                        opt += "<option value='" + val["division_director_id"] + "'>" + val["division_director_Name"] + "</option>";
                    });
                    $("#division_director_id").html(opt);
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
                director_assistant_id: $("#director_assistant_id").val(),
                division_director_id: $("#division_director_id").val(),
                Mode: "getDivisionManagerSub"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {

                    var opt = '<option value="" selected="selected">---Please select Division director---</option>';
                    $.each(jd, function(key, val) {
                        opt += "<option value='" + val["division_manager_head_id"] + "'>" + val["division_manager_head_Name"] + "</option>";
                    });
                    $("#division_manager_head_id").html(opt);
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
                director_assistant_id: $("#director_assistant_id").val(),
                division_director_id: $("#division_director_id").val(),
                division_manager_head_id: $("#division_manager_head_id").val(),
                Mode: "addDepatmentHead"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {

                    var opt = '<option value="" selected="selected">---Please select Division director---</option>';
                    $.each(jd, function(key, val) {
                        opt += "<option value='" + val["division_manager_sub_id"] + "'>" + val["division_manager_sub_Name"] + "</option>";
                    });
                    $("#division_manager_sub_id").html(opt);
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
                director_assistant_id: $("#director_assistant_id").val(),
                division_director_id: $("#division_director_id").val(),
                division_manager_head_id: $("#division_manager_head_id").val(),
                division_manager_sub_id: $("#division_manager_sub_id").val(),
                Mode: "addDepatmentHeadId"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {

                    var opt = '<option value="" selected="selected">---Please select Division director---</option>';
                    $.each(jd, function(key, val) {
                        opt += "<option value='" + val["depatment_head_id"] + "'>" + val["depatment_head_Name"] + "</option>";
                    });
                    $("#depatment_head_id").html(opt);
                });
            }
        });
    }

    function getDate5() {
        $("#StaffName").val("");
    }

    function getdata6() {
        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                id: $("#department_id").val(),
                Mode: "getDepartment"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {

                    var opt = '<option value="" selected="selected">---Please select Division director---</option>';
                    $.each(jd, function(key, val) {
                        opt += "<option value='" + val["department_work_id"] + "'>" + val["department_work_Name"] + "</option>";
                    });
                    $("#department_work_id").html(opt);
                });
            }
        });
    }
</script>

</html>