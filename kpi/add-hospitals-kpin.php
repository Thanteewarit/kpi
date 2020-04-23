<?php $page="add-assessment"; $ac="add-hospitals-kpi"; session_start();?>
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
                                                            onclick="clearVlue()">เพิ่มการประเมินการประเมิน</button>
                                                    </div>

                                                </div>
                                                <hr style="width: 95%;">

                                            </div>
                                            <div class="card-block">
                                                <div class="dt-responsive table-responsive">
                                                    <table id="footer-search"
                                                        class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>ประเภท</th>
                                                                <th>CODE</th>
                                                                <th>Name</th>
                                                                <th>เดือน</th>
                                                                <th>น้ำหนักรวม</th>
                                                                <th>จัดการ</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $valuei="
SELECT * 
FROM tb_evaluation AS  r1
JOIN tb_assessment_time AS r2 ON r1.evaluation_code = r2.assessment_time_code
JOIN tb_type_code AS r3 ON r2.assessment_time_type = r3.type_code_id
WHERE r2.assessment_time_status = 'Y' 
AND r1.evaluation_year = '".date("Y")."'
AND r2.assessment_time_type = '1'
GROUP BY r1.evaluation_code,r1.evaluation_year,  r1.evaluation_hospital_id ,r1.evaluation_director_assistant_id, r1.evaluation_division_director_id, r1.evaluation_division_manager_head_id, r1.evaluation_division_manager_sub_id, r1.evaluation_depatment_head_id
";
                                                            foreach (c_scelectS($valuei) as $key => $r) { ?>
                                                            <tr>
                                                                <td><?php echo $key+1;?></td>
                                                                <td><?php echo $r['type_code_name'];?></td>
                                                                <td><?php echo $r['assessment_time_code'];?></td>
                                                                <td><?php echo $r['assessment_time_name'];?></td>
                                                                <td><?php echo $r['evaluation_month'];?></td>
                                                                <td>100</td>
                                                                <td><a
                                                                        href="add-assessment-all.php?key=<?php echo TokenGen($r['assessment_time_code'], $secret)?>&month=<?php echo $r['evaluation_month'];?>"><button
                                                                            type="button"
                                                                            class="btn btn-primary btn-mini btn-outline-primary waves-effect md-trigger"
                                                                            data-modal="modal-add">ดูข้อมูล</button></a>
                                                                </td>
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
                                        <h3>เพิ่มรายชื่อผู้ประเมิน</h3>
                                        <div class="card-block" id="contents">
                                            <form class="md-float-material" action="../class/sql-insert.php"
                                                method="post">
                                                <div class="form-group row">

                                                    <label class="col-sm-3 col-form-label">ชื่อแบบประเมิน</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control sale_name" width="300px"
                                                            value="">
                                                        <input type="hidden" name="evaluation_code" id="ao_Sale"
                                                            value="" placeholder="ID Sale">

                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <label class="col-sm-3 col-form-label">

                                                        โรงพญาบาล</label>
                                                    <div class="col-sm-9">

                                                        <select name="hospital_id" id="hospital_id"
                                                            onchange="getDate0()"
                                                            class="form-control form-control-info">
                                                            <option value="" selected="selected">---Please select ---
                                                            </option>
                                                            <?php
                                                             $valuei = "SELECT * FROM tb_hospital WHERE hospital_Status= 'Y'";
                                                             foreach (c_scelectS($valuei) as $key => $r) { ?>
                                                            <option value="<?php echo $r['hospital_id']; ?>">
                                                                <?php echo $r['hospital_NameTh'] ?></option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <label class="col-sm-3 col-form-label">Year</label>
                                                    <div class="col-sm-9">

                                                        <select name="evaluation_year"
                                                            class="form-control form-control-info">
                                                            <?php $day=date("Y");  for ($i = date('Y')+2 ; $i >= date('Y')-2; $i--) { ?>
                                                            <option value="<?php echo $i ?>" <?php if ($i==$day) {
                                                                 echo "selected";
                                                             } ?>><?php echo $i ?></option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">

                                                    <label class="col-sm-3 col-form-label">ผู้ประเมิน</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control job_grade_name"
                                                            name="job_grade_name" width="300px" value="">
                                                        <input type="hidden" name="staff_code" id="job_grade_name"
                                                            value="">

                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <label class="col-sm-3 col-form-label"></label>
                                                    <div class="col-sm-9">
                                                        <button type="submit" name="addTime"
                                                            class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20"
                                                            onclick="chkLength()">เพิ่มการประเมิน</button>
                                                        <input type="hidden" name="Mode" value="addEvaluationHospitals">
                                                        <input type="hidden" id="assessment_time_type" value="1">
                                                        <input type="hidden" name="evaluation_key" value="<?php echo date("Ymdhism")?>">
                                                        
                                                        


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
    <script>
    $(".sale_name").autocomplete({
        minLength: 0,

        source: function(request, response) {
            $.ajax({
                url: "../class/class.php",
                data: {
                    id: request.term,
                    assessment_time_type: $("#assessment_time_type").val(),
                    Mode: "getCode"
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
    $(".job_grade_name").autocomplete({
        minLength: 0,

        source: function(request, response) {
            $.ajax({
                url: "../class/class.php",
                data: {
                    id: request.term,
                    hospital_id: $("#hospital_id").val(),
                    Mode: "getName"
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



</body>


</html>