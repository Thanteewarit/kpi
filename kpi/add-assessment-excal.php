<?php $page="add-assessment"; $ac="add-assessment-kpi"; session_start();?>
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
                                                        <li class="breadcrumb-item"><a href="add-assessment.php">รายชื่อผู้มีสิทธิ์ การประเมิน</a>
                                                        </li>
                                                        <li class="breadcrumb-item"><a href="#!"><?php echo cut(TokenVerify($_GET['key'], $secret))?></a>
                                                        </li>
                                                    </ul>

<!--
                                                    <div class="text-right">
                                                        <button type="button" class="btn btn-warning btn-outline-warning waves-effect md-trigger" data-modal="modal-15" onclick="clearVlue()">เพิ่มการประเมินการประเมิน</button>
                                                    </div>
-->

                                                </div>
                                                <hr style="width: 95%;">

                                            </div>
                                            <div class="card-block">
                                                <div class="dt-responsive table-responsive">
                                                    <table id="footer-search" class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>CODE</th>
                                                                <th>Name</th>
                                                                <th>ID STAFF</th>
                                                                <th>ตำแหน่ง</th>
                                                                <th>พนักงาน</th>
                                                                <th>ประจำเดือน- ปี</th>
                                                                <th>สถานะการประเมิน</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php                                               
                                                            $valuei="
                                                            SELECT r1.evaluation_code, r2.kpi_master_name, r1.evaluation_start, r1.evaluation_end, r1.evaluation_year, r1.evaluation_month,
                                                            r3.staff_Name, r3.staff_Sername, r3.staff_code, r5.level_position_name
                                                            FROM tb_evaluation AS r1
                                                            JOIN tb_kpi_master AS r2 ON r1.evaluation_code = r2.assessment_time_code
                                                            JOIN tb_staff AS r3 ON r1.evaluation_id_staff = r3.staff_code
                                                            JOIN tb_level_position AS r5 ON r5.level_position_code = r3.staff_level_position
                                                            WHERE r1.evaluation_year='2019' 
                                                            AND r1.evaluation_month='01' 
                                                            GROUP BY r1.evaluation_id_staff,r1.evaluation_month
                                                            ORDER BY r1.evaluation_year,r1.evaluation_month DESC";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                           <tr>
                                                                <td><?php echo $key+1;?></td>
                                                                <td><?php echo $r['evaluation_code'];?></td>
                                                                <td><?php echo $r['assessment_time_name'];?></td>
                                                                <td><?php echo $r['staff_code'];?></td>
                                                                <td><?php echo $r['level_position_name'];?></td>
                                                                <td><?php echo $r['staff_Name']." ".$r['staff_Sername'];?></td>
                                                                <td><?php echo $r['evaluation_year']."-".$r['evaluation_month'];?></td>
                                                               <td><span class="pcoded-badge label label-<?php echo $r['ifStatusC'];?>"><?php echo $r['ifStatus']?></span></td>
                                                                
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
                                            <form class="md-float-material" action="../class/sql-insert.php" method="post">
                                                <div class="form-group row">

                                                    <label class="col-sm-3 col-form-label">ชื่อแบบประเมิน</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control sale_name" width="300px"  value="">
                                                        <input type="hidden" name="evaluation_code" id="ao_Sale" value="" placeholder="ID Sale">

                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <label class="col-sm-3 col-form-label">Year</label>
                                                    <div class="col-sm-9">

                                                         <select name="evaluation_year" class="form-control form-control-info">
                                                            <?php $day=date("Y");  for($i = date('Y')+2 ; $i >= date('Y')-2; $i--){ ?>
                                                             <option value="<?php echo $i ?>" <?php if($i==$day){ echo "selected"; } ?> ><?php echo $i ?></option>
                                                             <?php }?>
                                                            </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <label class="col-sm-3 col-form-label">Month</label>
                                                    <div class="col-sm-9">

                                                         <select name="evaluation_month" class="form-control form-control-info">
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

                                                    <label class="col-sm-3 col-form-label">Job grade</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control job_grade_name" name="job_grade_name" width="300px"  value="">
                                                        <input type="hidden" name="job_grade_names" id="job_grade_name" value="" >

                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <label class="col-sm-3 col-form-label">วันที่เริ่มต้น</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="assessment_time_start" class="form-control" required>

                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <label class="col-sm-3 col-form-label">วันที่สิ้นสุด</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="assessment_time_end" class="form-control" required>

                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <label class="col-sm-3 col-form-label"></label>
                                                    <div class="col-sm-9">
                                                        <button type="submit" name="addTime" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" onclick="chkLength()">เพิ่มการประเมิน</button>
                                                        <input type="hidden" name="Mode" value="addEvaluation">
                                                        

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
    


</body>


</html>