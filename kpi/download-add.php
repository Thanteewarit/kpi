<?php $page=""; $ac="download-add"; session_start();?>
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
                                                        <li class="breadcrumb-item"><a href="#!">ดาวน์โหลด</a>
                                                        </li>
                                                        <li class="breadcrumb-item"><a href="#!">เพิ่มดาวน์โหลด</a>
                                                        </li>
                                                    </ul>

                                                    <div class="text-right">
                                                        <button type="button" class="btn btn-warning btn-outline-warning waves-effect md-trigger" data-modal="modal-15" onclick="ClearData()">เพิ่มดาวน์โหลด</button>
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
                                                                <th>ชื่อ</th>
                                                                <th>โรงพญาบาล</th>
                                                                <th>Code</th>
                                                                <th>Files</th>
                                                                <th>ลบ</th>

                                                            </tr>
                                                        </thead>
                                                                                                                <tbody>
                                                            <?php 
                                                            $valuei="SELECT *
                                                            FROM tb_download AS r1 
                                                            JOIN tb_hospital AS r2 ON r2.hospital_id = r1.download_hospitals
                                                            WHERE r1.download_Status = 'Y'
";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                            <tr>
                                                                <td><?php echo $key+1;?></td>
                                                                <td><?php echo $r['download_name'];?></td>
                                                                <td><?php echo $r['hospital_NameTh'];?></td>
                                                                <td><?php echo $r['hospital_Code'];?></td>
                                                                <td><?php echo $r['download_files_Name'];?></td> 
                                                                <td><a href="add-hospitals-kpi.php?key=<?php echo TokenGen($r['assessment_time_code'], $secret)?>"><button type="button" class="btn btn-primary btn-mini btn-outline-primary waves-effect md-trigger" data-modal="modal-add">ลบทิ้ง</button></a></td>
                                                            </tr>

                                                            <?php } ?>
                                                        </tbody>
                                                        <tfoot>
                                                           <tr>
                                                                <th>#</th>
                                                                <th>ชื่อ</th>
                                                                <th>โรงพญาบาล</th>
                                                                <th>Code</th>
                                                                <th>Files</th>
                                                                <th>ลบ</th>

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
                                        <h3>เพิ่มดาวน์โหลด</h3>
                                        <div class="card-block" id="contents">
                                            <form class="md-float-material" action="../class/sql-insert.php" enctype="multipart/form-data" method="post">
                                                <div class="form-group row">

                                                    <label class="col-sm-3 col-form-label">ชื่อหัวข้อการประเมิน</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="download_name" class="form-control color-class"  maxlength="50" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Codes hospital</label>
                                                    <div class="col-sm-9">
                                                        <select name="download_hospitals" id="assessment_time_codes" class="form-control" onchange="time_code()" required>
                                                            <option value="" selected="selected">---Please select ---</option>
                                                            <?php 
                                                                $valuei="select * from tb_hospital WHERE hospital_Status = 'Y' ";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                            <option value="<?php echo $r['hospital_id'];?>"> <?php echo $r['hospital_Code'];?>
                                                                <?php } ?>

                                                        </select>

                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">

                                                    <label class="col-sm-3 col-form-label">ชื่อโรงพญาบาล</label>
                                                    <div class="col-sm-9">
                                                       <input type="text" id="assessment_time_code" class="form-control"  readonly>

                                                    </div>
                                                </div> 
                                                <div class="form-group row">

                                                    <label class="col-sm-3 col-form-label">ไฟล์ดาวน์โหลด</label>
                                                    <div class="col-sm-9">
                                                        <input type="file" name="filUpload" id="filer_input1">

                                                    </div>
                                                </div>
                                            
                                                <div class="form-group row">

                                                    <label class="col-sm-3 col-form-label"></label>
                                                    <div class="col-sm-9">
                                                        <button type="submit" name="addTime" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" >Save</button>
                                                        <input type="hidden" name="Mode" value="addDownload">
                                                        

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
    
    <script src="../files/assets/pages/form-masking/inputmask.js"></script>
    <script src="../files/assets/pages/form-masking/jquery.inputmask.js"></script>
    <script src="../files/assets/pages/form-masking/autoNumeric.js"></script>
    <script src="../files/assets/pages/form-masking/form-mask.js"></script>



</body>
<script>
    function chkLength() {
        var getId = document.getElementById("assessment_time_code").value.length;
        if (getId != 10) {
            alert("Code มี 10 หลัก");
            $("#assessment_time_code").val("");
            document.getElementById("assessment_time_code").focus();
        }
    }
    function time_code() {
        var datacide = $("#assessment_time_codes").val()+"-"+<?php echo date("Ym")?>;
                $.ajax({
                url: "../class/class.php",
                global: false,
                type: "POST",
                data: ({
                    id: $("#assessment_time_codes").val() ,
                    Mode: "getHospitalIn"
                }),
                dataType: "JSON",
                async: false,
                success: function(jd) {
                    $.each(jd, function(key, val) {
                        document.getElementById("assessment_time_code").value=val["hospital_NameTh"];
                    });
                }
            });
        //var datacide = $("#assessment_time_codes").val()+"-"+<?php echo date("Ym")?>;
        //document.getElementById("assessment_time_code").value=val["assessment_time_code"];
    }

    function ClearData() {
        $("#assessment_time_name").val("");
        $("#assessment_time_code").val("");
        $("#assessment_time_start").val("");
        $("#assessment_time_end").val("");
    }
</script>

</html>