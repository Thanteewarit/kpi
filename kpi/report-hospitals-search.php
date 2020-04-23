<?php $page="report-kpi"; $ac="report-hospitals-search.php"; session_start();?>
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
    <link rel="stylesheet" type="text/css"
        href="../files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../files/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
        href="../files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css"
        href="../files/assets/pages/data-table/extensions/responsive/css/responsive.dataTables.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="../files/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../files/assets/css/component.css">
    <link rel="stylesheet" type="text/css" href="../files/assets/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="../files/new/jquery-ui.1.10.1.min.css" type="text/css" />
    <link rel="stylesheet" href="../files/new/style.css" type="text/css" />


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
                                                        <li class="breadcrumb-item"><a href="#!">รายชื่อผู้มีสิทธิ์
                                                                การประเมิน</a>
                                                        </li>
                                                        <!--
                                                        <li class="breadcrumb-item"><div class="col-sm-9">
                                                        <input type="text" class="form-control sale_name" width="300px"  value="">
                                                        <input type="hidden" name="ao_Sale" id="ao_Sale" value="" placeholder="ID Sale">

                                                    </div>
                                                        </li>
-->
                                                    </ul>

                                                    <div class="text-right">
                                                        <button type="button"
                                                            class="btn btn-warning btn-outline-warning waves-effect md-trigger"
                                                            data-modal="modal-15"
                                                            onclick="clearVlue()">ค้นหา</button>
                                                    </div>

                                                </div>
                                                <hr style="width: 95%;">

                                            </div>
                                            <div class="card-block">
                                                <div class="dt-responsive table-responsive">
                                                    <table id="basic-btn" class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>ID Staff</th>
                                                                <th>ชื่อ นามสกุล</th>
                                                                <th>โรงพยาบาล</th>
                                                                <th>ตำแหน่ง</th>
                                                                <th>Hospi</th>
                                                                <th>Dev</th>
                                                                <th>MC</th>
                                                                <th>FC</th>
                                                                <th>CC</th>
                                                                <th>Staff</th>
                                                                <th>BHV</th>
                                                                <th>รวม</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            if($_POST['director_assistant_id']=="NA"){
                                                                $hi1="WHERE  r1.staff_hospital_id = '".$_POST['hospital_id']."' ";
                                                            }elseif($_POST['director_assistant_id']!="NA" && $_POST['division_director_id']=="NA" && $_POST['division_manager_head_id']=="NA" && $_POST['division_manager_sub_id']=="NA" && $_POST['depatment_head_id']=="NA"){
                                                                $hi1="WHERE  r1.staff_hospital_id = '".$_POST['hospital_id']."' 
                                                                AND r1.staff_director_assistant_id = '".$_POST['director_assistant_id']."' ";
                                                            }elseif($_POST['director_assistant_id']!="NA" && $_POST['division_director_id']!="NA" && $_POST['division_manager_head_id']=="NA" && $_POST['division_manager_sub_id']=="NA" && $_POST['depatment_head_id']=="NA"){
                                                                $hi1="WHERE  r1.staff_hospital_id = '".$_POST['hospital_id']."' 
                                                                AND r1.staff_director_assistant_id = '".$_POST['director_assistant_id']."'
                                                                AND r1.staff_division_director_id = '".$_POST['division_director_id']."'";
                                                            }elseif($_POST['director_assistant_id']!="NA" && $_POST['division_director_id']!="NA" && $_POST['division_manager_head_id']!="NA" && $_POST['division_manager_sub_id']=="NA" && $_POST['depatment_head_id']=="NA"){
                                                                $hi1="WHERE  r1.staff_hospital_id = '".$_POST['hospital_id']."' 
                                                                AND r1.staff_director_assistant_id = '".$_POST['director_assistant_id']."'
                                                                AND r1.staff_division_director_id = '".$_POST['division_director_id']."'
                                                                AND r1.staff_division_manager_head_id = '".$_POST['division_manager_head_id']."'";
                                                            }elseif($_POST['director_assistant_id']!="NA" && $_POST['division_director_id']!="NA" && $_POST['division_manager_head_id']!="NA" && $_POST['division_manager_sub_id']!="NA" && $_POST['depatment_head_id']=="NA"){
                                                                $hi1="WHERE  r1.staff_hospital_id = '".$_POST['hospital_id']."' 
                                                                AND r1.staff_director_assistant_id = '".$_POST['director_assistant_id']."'
                                                                AND r1.staff_division_director_id = '".$_POST['division_director_id']."'
                                                                AND r1.staff_division_manager_head_id = '".$_POST['division_manager_head_id']."'
                                                                AND r1.staff_division_manager_sub_id = '".$_POST['division_manager_sub_id']."'";
                                                            }
                                                            $valuei="SELECT *
                                                            FROM tb_staff AS r1
                                                            $hi1
                                                            AND r1.staff_status = 'Y'";
                                                            foreach(c_scelectS($valuei) AS $key => $ra) {                        
                                                                $valuei="
                                                                SELECT * 
                                                                FROM tb_evaluation_score as r1
                                                                WHERE r1.evaluation_score_year = '".$_POST['evaluation_year']."' 
                                                                AND r1.evaluation_score_month = '".$_POST['evaluation_month']."'
                                                                AND r1.evaluation_score_staff = '".$ra['staff_code']."'";
                                                                foreach(c_scelectS($valuei) AS $key => $r){ 
                                                                    $valuei1="select * from tb_staff AS r1
                                                                    JOIN tb_level_position AS r2 ON r1.staff_level_position = r2.level_position_code
                                                                    where staff_code='".$r['evaluation_score_staff']."'";
                                                                    $arr1=c_scelectOne($valuei1);

                                                                    $valuei2="select * from tb_weight_group where weight_group_jobcode='".$arr1['staff_job_code']."'";
                                                                    $arr2=c_scelectOne($valuei2);

                                                                    $valuei3="select hospital_NameTh from tb_hospital where hospital_id='".$arr1['staff_hospital_id']."'";
                                                                    $arr3=c_scelectOne($valuei3);

                                                                    $hot    =   $r['evaluation_score_kpi_hospitals']/5*$arr2['weight_group_corpreate'];
                                                                    $dev    =   $r['evaluation_score_kpi_department']/5*$arr2['weight_group_departmen'];
                                                                    $mc     =   $r['evaluation_score_competency_mc']/5*$arr2['weight_group_mc'];
                                                                    $fc     =   $r['evaluation_score_competency_fc']/5*$arr2['weight_group_fc'];
                                                                    $cc     =   $r['evaluation_score_competency_cc']/5*$arr2['weight_group_cc'];
                                                                    $staff  =   $r['evaluation_score_kpi_staff']/5*$arr2['weight_group_jobkpi'];
                                                                    $bhv    =   $r['evaluation_score_kpi_behavior']/5*$arr2['weight_group_attribute'];
                                                                    $all    =   $hot+$dev+$mc+$fc+$cc+$staff+$bhv;
                                                                ?>
                                                            <tr>
                                                                <td><?php echo $key+1;?></td>
                                                                <td>#<?php echo $arr1['staff_code']?></td>
                                                                <td><?php echo $arr1['staff_Name']." ".$arr1['staff_Sername']?></td>
                                                                <td><?php echo $arr3['hospital_NameTh'];?></td>
                                                                <td><?php echo $arr1['level_position_name'];?></td>
                                                                <td><?php echo $hot;?></td>
                                                                <td><?php echo $dev;?></td>
                                                                <td><?php echo $mc; ?></td>
                                                                <td><?php echo $fc; ?></td>
                                                                <td><?php echo $cc;?></td>
                                                                <td><?php echo $staff; ?></td>
                                                                <td><?php echo $bhv ;?></td>
                                                                <td><?php echo $all ;?></td>
                                                            </tr>
                                                            <?php }} ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="md-modal md-effect-15" id="modal-15">
                                    <div class="md-content">
                                        <h3>ค้นหาข้อมูล</h3>
                                        <div class="card-block" id="contents">
                                            <form class="md-float-material" action="?"
                                                method="post">
                                                <div class="form-group row">

                                                    <label class="col-sm-3 col-form-label">Year</label>
                                                    <div class="col-sm-9">

                                                        <select name="evaluation_year"
                                                            class="form-control form-control-info">
                                                            <?php $day=date("Y");  for($i = date('Y')+2 ; $i >= date('Y')-2; $i--){ ?>
                                                            <option value="<?php echo $i ?>"
                                                                <?php if($i==$day){ echo "selected"; } ?>>
                                                                <?php echo $i ?></option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <label class="col-sm-3 col-form-label">Month</label>
                                                    <div class="col-sm-9">

                                                        <select name="evaluation_month"
                                                            class="form-control form-control-info">
                                                            <option value="01">มกราคม</option>
                                                            <option value="02">กุมภาพันธ์</option>
                                                            <option value="03">มีนาคม</option>
                                                            <option value="04">เมษายน</option>
                                                            <option value="05">พฤษภาคม</option>
                                                            <option value="06">มิถุนายน</option>
                                                            <option value="07">กรกฎาคม</option>
                                                            <option value="08">สิงหาคม</option>
                                                            <option value="09">กันยายน</option>
                                                            <option value="10">ตุลาคม</option>
                                                            <option value="11">พฤศจิกายน</option>
                                                            <option value="12">ธันวาคม</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <label class="col-sm-3 col-form-label">โรงพยาบาล</label>
                                                    <div class="col-sm-9">

                                                        <select name="hospital_id" id="hospital_id"
                                                            onchange="getDate0()"
                                                            class="form-control form-control-info">
                                                            <option value="" selected="selected">---Please select ---
                                                            </option>
                                                            <?php 
         $valuei = "SELECT * FROM tb_hospital WHERE hospital_Status= 'Y'";
         foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                            <option value="<?php echo $r['hospital_id']; ?>">
                                                                <?php echo $r['hospital_NameTh'] ?></option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">ชั้นที่ 1</label>
                                                    <div class="col-sm-9">
                                                        <select name="director_assistant_id" id="director_assistant_id"
                                                            class="form-control" onchange="getDate()" required>
                                                            <option value="NA">---NULL---</option>


                                                        </select>


                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">ชั้นที่ 2</label>
                                                    <div class="col-sm-9">
                                                        <select name="division_director_id" id="division_director_id"
                                                            class="form-control" required onchange="getDate2()">

                                                            <option value="NA">---NULL---</option>

                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">ชั้นที่ 3</label>
                                                    <div class="col-sm-9">
                                                        <select name="division_manager_head_id"
                                                            id="division_manager_head_id" class="form-control" required
                                                            onchange="getDate3()">

                                                            <option value="NA">---NULL---</option>

                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">ชั้นที่ 4</label>
                                                    <div class="col-sm-9">
                                                        <select name="division_manager_sub_id"
                                                            id="division_manager_sub_id" class="form-control" required
                                                            onchange="getDate4()">

                                                            <option value="NA">---NULL---</option>

                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">ชั้นที่ 5</label>
                                                    <div class="col-sm-9">
                                                        <select name="depatment_head_id" id="depatment_head_id"
                                                            class="form-control" required onchange="">

                                                            <option value="NA">---NULL---</option>

                                                        </select>

                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">

                                                    <label class="col-sm-3 col-form-label"></label>
                                                    <div class="col-sm-9">
                                                        <button type="submit" name="addTime"
                                                            class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20"
                                                            onclick="chkLength()">ค้นหาข้อมูล</button>
                                                        <input type="hidden" name="Mode"
                                                            value="addEvaluationCompetency">


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
    <script src="../files/assets/pages/data-table/extensions/buttons/js/dataTables.buttons.min.js"></script>
    <script src="../files/assets/pages/data-table/extensions/buttons/js/buttons.flash.min.js"></script>
    <script src="../files/assets/pages/data-table/extensions/buttons/js/jszip.min.js"></script>
    <script src="../files/assets/pages/data-table/extensions/buttons/js/vfs_fonts.js"></script>
    <script src="../files/assets/pages/data-table/extensions/buttons/js/buttons.colVis.min.js"></script>
    <script src="../files/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../files/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <!-- Custom js -->
    <script src="../files/assets/pages/data-table/extensions/buttons/js/extension-btns-custom.js"></script>

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
    <script>
    $(".sale_name").autocomplete({
        minLength: 0,

        source: function(request, response) {
            $.ajax({
                url: "../class/class.php",
                data: {
                    id: request.term,
                    Mode: "getCodeCompetency"
                },
                type: "POST",
                dataType: "json",
                success: function(data) {
                    response(data);
                },
            });
        },
        select: function(event, ui) {


            document.getElementById('ao_Sale').value = ui.item.value;
            console.log(ui.item.id);
            console.log(ui.item.label);
            console.log(ui.item.value);


        }

    });
    $(".position").autocomplete({
        minLength: 0,

        source: function(request, response) {
            $.ajax({
                url: "../class/class.php",
                data: {
                    id: request.term,
                    Mode: "getPosition"
                },
                type: "POST",
                dataType: "json",
                success: function(data) {
                    response(data);
                },
            });
        },
        select: function(event, ui) {

            document.getElementById('position').value = ui.item.position;

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

    function clearVlue() {
        $(".sale_name").val("");

    }
    </script>
        <script>
        function getDate0() {
            console.log("1");
            $("#division_manager_sub_Name").val("");
            $.ajax({
                url: "../class/class.php",
                global: false,
                type: "POST",
                data: ({
                    id: $("#hospital_id").val(),
                    Mode: "get_director_assistant"
                }),
                dataType: "JSON",
                async: false,
                success: function(jd) {
                    $.each(jd, function(key, val) {

                        var opt = '<option value="NA" selected="selected">---NULL---</option>';
                        $.each(jd, function(key, val) {
                            opt += "<option value='" + val["director_assistant_id"] + "'>" + val["director_assistant_Name"] + "</option>";
                        });
                        $("#director_assistant_id").html(opt);
                    });
                }
            });
        }

        function getDate() {
            console.log("2");
            $("#division_manager_sub_Name").val("");
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

                        var opt = '<option value="NA" selected="selected">---NULL---</option>';
                        $.each(jd, function(key, val) {
                            opt += "<option value='" + val["division_director_id"] + "'>" + val["division_director_Name"] + "</option>";
                        });
                        $("#division_director_id").html(opt);
                    });
                }
            });
        }

        function getDate2() {
            console.log("3");
            $("#depatment_head_Name").val("");
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

                        var opt = '<option value="NA" selected="selected">---NULL---</option>';
                        $.each(jd, function(key, val) {
                            opt += "<option value='" + val["division_manager_head_id"] + "'>" + val["division_manager_head_Name"] + "</option>";
                        });
                        $("#division_manager_head_id").html(opt);
                    });
                }
            });
        }

        function getDate3() {
            console.log("4");

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

                        var opt = '<option value="NA" selected="selected">---NULL---</option>';
                        $.each(jd, function(key, val) {
                            opt += "<option value='" + val["division_manager_sub_id"] + "'>" + val["division_manager_sub_Name"] + "</option>";
                        });
                        $("#division_manager_sub_id").html(opt);
                    });
                }
            });
        }

        function getDate4() {
            console.log("5");
            $.ajax({
                url: "../class/class.php",
                global: false,
                type: "POST",
                data: ({
                    director_assistant_id: $("#director_assistant_id").val(),
                    division_director_id: $("#division_director_id").val(),
                    division_manager_head_id: $("#division_manager_head_id").val(),
                    division_manager_sub_id : $("#division_manager_sub_id").val(),
                    Mode: "addDepatmentHeadIn"
                }),
                dataType: "JSON",
                async: false,
                success: function(jd) {
                    $.each(jd, function(key, val) {

                        var opt = '<option value="NA" selected="selected">---NULL---</option>';
                        $.each(jd, function(key, val) {
                            opt += "<option value='" + val["depatment_head_id"] + "'>" + val["depatment_head_Name"] + "</option>";
                        });
                        $("#depatment_head_id").html(opt);
                    });
                }
            });
        }
        $(".staff_job_code").autocomplete({
        minLength: 0,

        source: function(request, response) {
            $.ajax({
                url: "../class/class.php",
                data: {
                    id: request.term,
                    Mode: "getJobCode"
                },
                type: "POST",
                dataType: "json",
                success: function(data) {
                    response(data);
                },
            });
        },
        select: function(event, ui) {
            $(".staff_job_code").val(value = ui.item.id);
        }

    });
    </script>

</body>


</html>