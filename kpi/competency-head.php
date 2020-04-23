<!DOCTYPE html>
<html lang="en">
<?php $page="kpi"; $ac="job"; session_start(); ?>

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
    <link rel="stylesheet" href="../files/bower_components/nvd3/css/nv.d3.css" type="text/css" media="all">
</head>
<style>
    .table td,
    .table th {
        padding: 5px;
        vertical-align: top;
        border-top: 1px solid #e9ecef;
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
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <?php 
                    $valuei="
                                                            SELECT r1.staff_code, r1.staff_Name, r1.staff_Sername, r2.depatment_head_Name, r3.department_Name, r4.department_work_Name, r5.division_director_Name, r6.division_manager_head_Name, r7.division_manager_sub_Name, r8.hospital_NameTh, r9.director_assistant_Name, r1.staff_job_code, r1.staff_job_description, r1.staff_job_grade, r8.hospital_Code, r4.department_work_Code,  r1.staff_start, r1.staff_end, r10.level_position_name
FROM tb_staff AS r1 
LEFT JOIN tb_depatment_head AS r2 ON r2.depatment_head_id = r1.staff_depatment_head_id
LEFT JOIN tb_department AS r3 ON r3.department_id = r1.staff_department_id
LEFT JOIN tb_department_work AS r4 ON r4.department_work_id = r1.staff_department_work_id
LEFT JOIN tb_division_director AS r5 ON r5.division_director_id = r1.staff_division_director_id
LEFT JOIN tb_division_manager_head AS r6 ON r6.division_manager_head_id = r1.staff_division_manager_head_id
LEFT JOIN tb_division_manager_sub AS r7 ON r7.division_manager_sub_id = r1.staff_division_manager_sub_id
LEFT JOIN tb_hospital AS r8 ON r8.hospital_id = r1.staff_hospital_id
LEFT JOIN tb_hospital_director_assistant AS r9 ON r9.director_assistant_id = r1.staff_director_assistant_id
LEFT JOIN tb_level_position AS r10 ON r10.level_position_code = r1.staff_level_position
WHERE r1.staff_code = '".cut(TokenVerify($_GET['key'], $secret))."' AND r1.staff_status = 'Y'";
                    $r=c_scelectOne($valuei);
                    ?>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-header-text">ข้อมูลส่วนตัว </h5>
                                        </div>
                                        <div class="card-block">
                                            <div class="view-info">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="general-info">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-xl-6">
                                                                    <div class="table-responsive">
                                                                        <table class="table m-0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th scope="row">โรงพยาบาล</th>
                                                                                    <td><?php echo $r['hospital_NameTh']?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">ชื่อย่อของโรงพยาบาล</th>
                                                                                    <td><?php echo $r['hospital_Code'];?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">ฝ่าย</th>
                                                                                    <td><?php echo $r['department_Name'];?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">ชื่อแผนก</th>
                                                                                    <td><?php echo $r['department_work_Name'];?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">ชื่อย่อแผนก</th>
                                                                                    <td><?php echo $r['department_work_Code'];?></td>
                                                                                </tr>

                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <!-- end of table col-lg-6 -->
                                                                <div class="col-lg-12 col-xl-6">
                                                                    <div class="table-responsive">
                                                                        <table class="table">
                                                                            <tbody>

                                                                                <tr>
                                                                                    <th scope="row">รหัสพนักงาน</th>
                                                                                    <td><a href="#!"><?php echo  $r['staff_code']?></a></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">ชื่อ</th>
                                                                                    <td><?php echo $r['staff_Name']?> - <?php echo $r['staff_Sername']?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">สายงาน</th>
                                                                                    <td><?php echo $r['depatment_head_Name']?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">ตำแหน่งงาน</th>
                                                                                    <td><?php echo $r['hospital_Code'];?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">รหัสแผนก</th>
                                                                                    <td><?php echo $r['hospital_Code'];?></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <!-- end of table col-lg-6 -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end of row -->
                                            </div>
                                        </div>
                                        <!-- end of card-block -->
                                    </div>
                                    <div class="card">

                                        
                                        <div class="card-block">
                                            <div class="dt-responsive table-responsive">
                                                <table id="new-cons2" class="table table-striped table-bordered nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th class="no-sort">Core Competency</th>
                                                            <th class="no-sort">ประเมิน</th>
                                                            <th class="no-sort">Veiw</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                        $valuei = "SELECT * 
                                                        FROM tb_kpi_type  WHERE kpi_types = '2'";
                                                        foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                        <tr style="background: #2a97a5;">
                                                            <td><?php echo ($key+1)." . ".$r['kpi_type_name'];?></td>
                                                            <td> <?php //echo $r['ap_weight']?></td>
                                                            <td> <?php //echo $r['ap_weight']?></td>
                                                        </tr>

                                                        <?php 
                                                        $valuei = "SELECT * 
FROM tb_evaluation_competency AS r1 
JOIN tb_competency_master AS r2 ON r1.competency_master_id = r2.competency_master_id

WHERE r2.kpi_type_id  = '".$r['kpi_type_id']."' 
AND r1.evaluation_competency_code = '".$_GET['code']."'
AND r1.evaluation_competency_year = '".$_SESSION['time']['year']."'
AND r1.evaluation_competency_month = '".$_SESSION['time']['month']."'
AND r1.evaluation_competency_id_staff = '".cut(TokenVerify($_GET['key'], $secret))."'

";
                                                        foreach(c_scelectS($valuei) AS $key2 => $r2){ ?>
                                                        
                                                        <tr>

                                                            <td> &nbsp;&nbsp;&nbsp;&nbsp;
                                                                <?php echo $key+1?>. <?php echo $key2+1;?> <?php echo $r2['competency_master_name']?> <i class="fa fa-question-circle-o btn-warning " onclick="adddetile(<?php echo $r2['competency_master_id']?>)"></i></td>
                                                            <td class="tabledit-edit-mode">
                                                            <select class="tabledit-input form-control input-sm" onchange="upDateCompetency(this.value,'<?echo $r2['evaluation_competency_id']?>','<?echo $r2['competency_master_weight']?>')" >
                                                            <option value="">กรุณาเลือกคะแนน</option>
                                                <?php for($i=1; $i<=($r2['competency_master_target']+1); $i++) { ?> 
                                                                <option value="<?php echo $i?>" <?php if($r2['evaluation_competency_value']==$i ){ echo "selected" ;}?>><?php echo $i;?></option>
                                                        <?php } ?>
                                                            </select>
                                                            </td>
                                                            <td class="tabledit-edit-mode">
                                                                <a href="#" onclick="villGraph('<?php echo $r2['competency_master_id']?>','<?php echo $r2['evaluation_competency_code']?>','<?php echo $r2['evaluation_competency_year']?>','<?php echo $r2['evaluation_competency_id_staff']?>');"><button class="btn btn-success btn-round btn-sm">view</button></a>
                                                            </td>
                                                        </tr>
                                                        <?php } }?>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                                <div class="modal fade" id="villGraph" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="width: 90%;">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header pt-2 pb-2 btnh_primary">
                                            <h5 class="modal-title" id="exampleModalLabel">ประเมิน KPI</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card-block" style="margin: 5px;" id="contents">

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <label class="col-12 col-form-label text-center">รายละเอียด</label>
                                                        </div>

                                                        <div class="card">
                                                            <div class="card-block">
                                                                <div id="placeholder" class="demo-placeholder" style="height:300px; width:700px;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Name</label>
                                                            <div class="col-10">
                                                                <input type="text" class="form-control" id="showKpiName" readonly>

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Weight</label>
                                                            <div class="col-10">
                                                                <input type="text" class="form-control" id="showWeight" readonly>

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">ค่าคาดหวัง</label>
                                                            <div class="col-10">
                                                                <input type="text" class="form-control" id="showTarget" readonly>

                                                            </div>
                                                        </div>
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="new-cons" class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Jan</th>
                                                                        <th>Feb</th>
                                                                        <th>Mar</th>
                                                                        <th>Apr</th>
                                                                        <th>May</th>
                                                                        <th>Jun</th>
                                                                        <th>Jul</th>
                                                                        <th>Aug</th>
                                                                        <th>Sep</th>
                                                                        <th>Oct</th>
                                                                        <th>Nov</th>
                                                                        <th>Dec</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <div id="dm1"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="dm2"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="dm3"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="dm4"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="dm5"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="dm6"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="dm7"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="dm8"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="dm9"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="dm10"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="dm11"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="dm12"></div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
<!--
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Year to date</label>
                                                            <div class="col-4">
                                                                <input type="text" class="form-control" id="" readonly>

                                                            </div>
                                                            <label class="col-2 col-form-label">Score</label>
                                                            <div class="col-4">
                                                                <input type="text" class="form-control" id="" readonly>

                                                            </div>
                                                        </div>
-->
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div class="modal fade" id="adddetile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="top: 100px;">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header pt-2 pb-2 btnh_primary">
                                                    <h5 class="modal-title" id="exampleModalLabel">คำอะธิบาย</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card-block" id="contents">
                                                        <form class="md-float-material" action="../class/sql-insert.php" method="post">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="card" style="margin-bottom: 0px;">
                                                                        <div class="card-block">

                                                                            <div class="form-group row">

                                                                                <div class="col-sm-12">
                                                                                    <input type="text" class="form-control" id="ccksss" value="" required readonly>
                                                                                    <input type="hidden" class="form-control" name="competency_master_id" id="competency_master_id" required readonly>

                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <p id="appens"></p>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
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


    <!-- Float Chart js -->
    <script src="../files/assets/pages/chart/float/jquery.flot.js"></script>
    <script src="../files/assets/pages/chart/float/jquery.flot.categories.js"></script>
    <script src="../files/assets/pages/chart/float/jquery.flot.pie.js"></script>
    <!-- Custom js -->
</body>
<script>
    $('#new-cons').dataTable({
        "searching": false,
        "info": false,
        "paging": false,
        "lengthChange": false,
        "order": [],
        "columnDefs": [{
            "targets": 'no-sort',
            "orderable": false,
        }]
    });

    function upDateCompetency(vlusee,id,weight) {

        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                id: id,
                vlusee : vlusee, 
                weight : weight, 
                Mode: "upDateCompetency"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
            }
        });



    }
        function villGraph(id,code,year,staff) {
            console.log(id);
            console.log(code);
            console.log(year);
            console.log(staff);
        $("#villGraph").modal("show");
        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                id: id,
                code : code, 
                year : year,
                staff : staff,
                Mode: "getEvaluationAllCom"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {

                    var m1 = val["evaluation_all_month_1"];
                    var m2 = val["evaluation_all_month_2"];
                    var m3 = val["evaluation_all_month_3"];
                    var m4 = val["evaluation_all_month_4"];
                    var m5 = val["evaluation_all_month_5"];
                    var m6 = val["evaluation_all_month_6"];
                    var m7 = val["evaluation_all_month_7"];
                    var m8 = val["evaluation_all_month_8"];
                    var m9 = val["evaluation_all_month_9"];
                    var m10 = val["evaluation_all_month_10"];
                    var m11 = val["evaluation_all_month_11"];
                    var m12 = val["evaluation_all_month_12"];



                    $("#showWeight").val(val["kpi_master_weight"]);
                    $("#showTarget").val(val["kpi_master_target"]);
                    $("#showKpiName").val(val["kpi_master_name"]);
                    if (m1 > 0) {
                        $("#dm1").empty().append(m1);
                    }
                    if (m2 > 0) {
                        $("#dm2").empty().append(m2);
                    }
                    if (m3 > 0) {
                        $("#dm3").empty().append(m3);
                    }
                    if (m4 > 0) {
                        $("#dm4").empty().append(m4);
                    }
                    if (m5 > 0) {
                        $("#dm5").empty().append(m5);
                    }
                    if (m6 > 0) {
                        $("#dm6").empty().append(m6);
                    }
                    if (m7 > 0) {
                        $("#dm7").empty().append(m7);
                    }
                    if (m8 > 0) {
                        $("#dm8").empty().append(m8);
                    }
                    if (m9 > 0) {
                        $("#dm9").empty().append(m9);
                    }
                    if (m10 > 0) {
                        $("#dm10").empty().append(m10);
                    }
                    if (m11 > 0) {
                        $("#dm11").empty().append(m11);
                    }
                    if (m12 > 0) {
                        $("#dm11").empty().append(m12);
                    }
                    categoryChart(m1, m2, m3, m4, m5, m6, m7, m8, m9, m10, m11, m12);
                });
            }
        });



    }
        function categoryChart(m1, m2, m3, m4, m5, m6, m7, m8, m9, m10, m11, m12) {
        var data = [
            ["Jan", m1],
            ["Feb", m2],
            ["Mar", m3],
            ["Apr", m4],
            ["May", m5],
            ["Jun", m6],
            ["Jul", m7],
            ["Aug", m8],
            ["Sep", m9],
            ["Oct", m10],
            ["Nov", m11],
            ["Dec", m12]
        ];

        $.plot("#placeholder", [data], {
            series: {
                bars: {
                    show: true,
                    barWidth: 0.3,
                    align: "center",
                }
            },

            xaxis: {
                mode: "categories",
                tickLength: 0,
                tickColor: '#f5f5f5',
            },
            colors: ["#01C0C8", "#83D6DE"],
            labelBoxBorderColor: "red"

        });
    };
       function adddetile(id) {

        
        
        $("#adddetile").modal("show");
           
        
            $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                id: id,
                Mode: "get_master"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {

                document.getElementById("ccksss").value = val["name"];
                $("#appens").empty().append(val["example"]);
                
                
                });
            }
        });
    }

</script>

</html>