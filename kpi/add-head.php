<?php $page="add-assessment"; $ac="add-head"; session_start();?>
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
    <link rel="stylesheet" href="../files/new/jquery-ui.1.10.1.min.css" type="text/css" />
    <link rel="stylesheet" href="../files/new/style.css" type="text/css" />
    
    
    <link rel="stylesheet" href="../files/bower_components/select2/css/select2.min.css" />
    <!-- Multi Select css -->
    <link rel="stylesheet" type="text/css" href="../files/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css" />
    <link rel="stylesheet" type="text/css" href="../files/bower_components/multiselect/css/multi-select.css" />



    <style>
        #contents {
            max-height: 600px;
            width: 100%;
            overflow-y: scroll;
        }
    </style>
    <style>
  .ui-autocomplete {
position: absolute;
z-index: 2150000000 !important;
cursor: default;
border: 2px solid #ccc;
padding: 5px 0;
border-radius: 2px;
}
.staff_code {
position: absolute;
z-index: 2150000000 !important;
cursor: default;
border: 2px solid #FFGG00;
padding: 5px 0;
border-radius: 2px;
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
                                                        <li class="breadcrumb-item"><a href="#!">เพิ่มการประเมิน</a>
                                                        </li>
                                                        <li class="breadcrumb-item"><a href="#!">เพิ่มรายชื่อหัวหน้าประเมินลูกน้อง</a>
                                                        </li>
                                                    </ul>

                                                    <div class="text-right">
                                                        <button type="button" class="btn btn-warning btn-outline-warning waves-effect md-trigger" data-modal="modal-15" onclick="ClearData()">เพิ่มรายชื่อผู้ถูกประเมิน</button>
                                                         
                                                    </div>

                                                </div>
                                                <hr style="width: 95%;">

                                            </div>
                                            <div class="card-block">
                                                <div class="dt-responsive table-responsive">
                                                    <table id="footer-search" class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Code ผู้ประเมิน</th>
                                                                <th>ผู้ประเมิน</th>
                                                                <th>CODE ลูกน้อง</th>
                                                                <th>ลูกน้อง</th>
                                                                <th>จัดการ</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                            $valuei="SELECT *,
                                                            (SELECT CONCAT(staff_Name, ' ', staff_Sername)  FROM tb_staff WHERE staff_code =evaluation_head_head LIMIT 1) AS head,
                                                            (SELECT CONCAT(staff_Name, ' ', staff_Sername)  FROM tb_staff WHERE staff_code = evaluation_head_staff LIMIT 1) AS Staff
                                                             FROM tb_evaluation_head WHERE evaluation_head_status = 'Y'";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                            <tr>
                                                                <td><?php echo $key+1;?></td>
                                                                <td><?php echo $r['evaluation_head_head'];?></td>
                                                                <td><?php echo $r['head'];?></td>
                                                                <td><?php echo $r['evaluation_head_staff'];?></td>
                                                                <td><?php echo $r['Staff'];?></td>
                                                                <td><a href="../class/sql-insert.php?Mode=headDel&id=<?php echo $r['evaluation_head_id']?>"><button type="button" class="btn btn-primary btn-mini btn-outline-primary waves-effect md-trigger" data-modal="modal-add">ลบ</button></a></td>
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>

                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="md-modal md-effect-15" id="modal-15">
                                    <div class="md-content">
                                        <h3>เพิ่มรายชื่อผู้ถูกประเมิน</h3>
                                        <div class="card-block" id="contents">
                                            <form class="md-float-material" action="../class/sql-insert.php" method="post">
                                                <div class="form-group row">

                                                    <label class="col-sm-3 col-form-label">ค้นหาชื่อหัวหน้า</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control sale_name" width="300px"  value="">
                                                        <input type="hidden" class="form-control" width="300px" name="evaluation_head_head" id="ao_Sale" value="" readonly>

                                                    </div>
                                                </div> 
                                               
<!--
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Name Hospital</label>
                                                    <div class="col-sm-9">
                                                        <select name="staff_hospital_id" id="nameHospital" class="form-control" onchange="getHospital()" required>
                                                            <option value="" selected="selected">---Please select Director assistant---</option>
                                                            <?php 
                                                                $valuei="select hospital_id, hospital_NameTh
                                                             from tb_hospital WHERE hospital_Status = 'Y' ";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                            <option value="<?php echo $r['hospital_id'];?>"><?php echo $r['hospital_NameTh'];?></option>
                                                            <?php } ?>

                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Code Hospital</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="codeHospital" id="codeHospital" readonly required>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Director assistant </label>
                                                    <div class="col-sm-9">
                                                        <select name="staff_director_assistant_id" id="director_assistant_id" class="form-control" onchange="getDate()" required>
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
                                                    <label class="col-sm-3 col-form-label">แผนก</label>
                                                    <div class="col-sm-9">
                                                        <select name="staff_division_manager_sub_id" id="division_manager_sub_id" class="form-control" required onchange="getDate4()">

                                                            <option value=""></option>

                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">แผนกย่อย</label>
                                                    <div class="col-sm-9">
                                                        <select name="staff_depatment_head_id" id="depatment_head_id" class="form-control" onchange="getDate5()">

                                                            <option value=""></option>

                                                        </select>

                                                    </div>
                                                </div>
-->
                                                <div class="form-group row">

                                                    <label class="col-sm-3 col-form-label">เลือกรายชื่อลูกน้อง</label>
                                                    <div class="col-sm-9">
                                                        <select id='custom-headers' name="evaluation_head_staff[]" class="searchable staff_codes" multiple='multiple'>
                                                             <?php 
                                                                $valuei="select *
                                                             from tb_staff WHERE staff_status = 'Y' ";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                                <option value="<?php echo $r['staff_code']?>"><?php echo $r['staff_Name']?> <?php echo $r['staff_Sername']?></option>
                                                             <?php }?>
                                                            </select>

                                                    </div>
                                                </div>
<!--
                                                <div class="form-group row">

                                                    <label class="col-sm-3 col-form-label">วันที่สิ้นสุด</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="assessment_time_end" class="form-control" required>

                                                    </div>
                                                </div>
-->
                                                <div class="form-group row">

                                                    <label class="col-sm-3 col-form-label"></label>
                                                    <div class="col-sm-9">
                                                        <button type="submit" name="addTime" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" onclick="chkLength()">บันทึกข้อมูล</button>
                                                        <input type="hidden" name="Mode" value="getStaffAddHead">
                                                        <input type="hidden" name="evaluation_id_staff" value="000001">

                                                    </div>
                                                </div>
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

    <!-- Switch component js -->
    <script src="../files/bower_components/switchery/js/switchery.min.js"></script>
    <!-- Tags js -->
    <script src="../files/bower_components/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.10.4/typeahead.bundle.min.js"></script>
    <!-- Max-length js -->
    <script src="../files/bower_components/bootstrap-maxlength/js/bootstrap-maxlength.js"></script>
    <!-- Custom js -->
    <script src="../files/assets/pages/advance-elements/swithces.js"></script>
    <script type="text/javascript" src="../files/new/jquery-ui.1.12.1.min.js"></script>
    
    


    <script  src="../files/bower_components/select2/js/select2.full.min.js"></script>
    <!-- Multiselect js -->
    <script  src="../files/bower_components/bootstrap-multiselect/js/bootstrap-multiselect.js">
    </script>
    <script  src="../files/bower_components/multiselect/js/jquery.multi-select.js"></script>
    <script  src="../files/assets/js/jquery.quicksearch.js"></script>
    <!-- Custom js -->
    <script  src="../files/assets/pages/advance-elements/select2-custom.js"></script>

    
    
    
    
    <script>
        $(".sale_name").autocomplete({
            minLength: 0,

            source: function(request, response) {
                $.ajax({
                    url: "../class/class.php",
                    data: {
                        id: request.term,
                        Mode: "getCodeStaff"
                    },
                    type: "POST",
                    dataType: "json",
                    success: function(data) {
                        response(data);
                    },
                });
            },
            select: function(event, ui) {


                document.getElementById('ao_Sale').value = ui.item.staff_code;
                console.log(ui.item.id);
                console.log(ui.item.label);
                console.log(ui.item.value);


            }

        });
        $(".job_grade_name").autocomplete({
            minLength: 0,

            source: function(request, response) {
                $.ajax({
                    url: "../class/class.php",
                    data: {
                        id: request.term,
                        Mode: "getJobGrade"
                    },
                    type: "POST",
                    dataType: "json",
                    success: function(data) {
                        response(data);
                    },
                });
            },
            select: function(event, ui) {


                document.getElementById('job_grade_name').value = ui.item.id;
                console.log(ui.item.id);
                console.log(ui.item.label);
                console.log(ui.item.value);


            }

        });
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
        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                hospital_id: $("#nameHospital").val(),
                director_assistant_id: $("#director_assistant_id").val(),
                division_director_id: $("#division_director_id").val(),
                division_manager_head_id: $("#division_manager_head_id").val(),
                division_manager_sub_id: $("#division_manager_sub_id").val(),
                depatment_head_id: $("#depatment_head_id").val(),
                Mode: "getStaffAddHead"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {

                    var opt = '';
                    $.each(jd, function(key, val) {
                        opt += "<option value='" + val["staff_code"] + "'>" + val["staff_code"] + "</option>";
                    });
                    
                    $(".staff_codes").html(opt);
                    
                });
            }
        });
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
    $(".job_grade_name").autocomplete({
        minLength: 0,

        source: function(request, response) {
            $.ajax({
                url: "../class/class.php",
                data: {
                    id: request.term,
                    Mode: "getJobGrade"
                },
                type: "POST",
                dataType: "json",
                success: function(data) {
                    response(data);
                },
            });
        },
        select: function(event, ui) {


            document.getElementById('staff_job_grade').value = ui.item.id;
            console.log(ui.item.id);
            console.log(ui.item.label);
            console.log(ui.item.value);


        }

    });
</script>


</body>


</html>