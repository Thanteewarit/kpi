<!DOCTYPE html>
<html lang="en">
<?php $page=""; $ac="download"; ?>

<head>
    <?php include("inc-header.php")?>
    <meta name="author" content="codedthemes" />
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
    <!-- Nvd3 chart css -->
    <link rel="stylesheet" href="../files/bower_components/nvd3/css/nv.d3.css" type="text/css" media="all">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="../files/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../files/assets/css/jquery.mCustomScrollbar.css">
    <style>
        .ui-autocomplete {
            position: absolute;
            z-index: 999999 !important;
            cursor: default;
            border: 2px solid #ccc;
            background-color: #FFFFFF;
            padding: 5px 0;
            border-radius: 2px;
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
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">

                                        <!--profile cover end-->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <!-- tab content start -->
                                                <div class="tab-content">
                                                    <div class="row">
                                                        <div class="col-xl-3">
                                                            <!-- user contact card left side start -->
                                                            <!-- <div class="card">
                                                                <div class="card-header contact-user">
                                                                    <i class="fa fa-institution"></i>
                                                                    <h5 class="m-l-10">โรงพญาบาล</h5>
                                                                </div>

                                                                <input type="hidden" id="hospital_id">
                                                                <div class="card-block groups-contact">
                                                                    <ul class="list-group">
                                                                        <?php 
                                                            $valuei="
                                                            SELECT *,
(select COUNT(*) From tb_download where download_hospitals = r1.hospital_id ) AS cons
FROM tb_hospital aS r1 
WHERE hospital_Status LIKE 'Y'
                                                            ";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                                        <a href="#">
                                                                            <li onclick="ale(<?php echo $r['hospital_id']?>)" class="list-group-item justify-content-between">
                                                                                <?php echo $r['hospital_NameTh']?>
                                                                                <span class="badge badge-primary badge-pill"><?php echo $r['cons']?></span>
                                                                            </li>
                                                                        </a>
                                                                        <?php } ?>
                                                                    </ul>
                                                                </div>
                                                            </div> -->
                                                            <!-- user contact card left side end -->
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <!-- contact data table card start -->
                                                                    <div class="card">
                                                                        <div class="card-header">
                                                                            <input type="text" class="form-control col-12 job_grade_name" id="hospital_id" placeholder="ค้นหา">

                                                                            <input type="hidden" name="staff_job_grade" id="staff_job_grade">
                                                                        </div>
                                                                        <div class="card-block contact-details">
                                                                            <div class="data_table_main table-responsive dt-responsive">
                                                                                <table id="simpletables" class="table  table-striped table-bordered nowrap">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>#</th>
                                                                                            <th>รายการ</th>
                                                                                            <th>วันที่</th>
                                                                                            <th>Action</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody id="opt">

                                                                                    </tbody>
                                                                                    <!-- <tfoot>
                                                                                        <tr>
                                                                                            <th>#</th>
                                                                                            <th>รายการ</th>
                                                                                            <th>วันที่</th>
                                                                                            <th>Action</th>
                                                                                        </tr>
                                                                                    </tfoot> -->
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- contact data table card end -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- tab content end -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                            </div>
                            <!-- Warning Section Starts -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php //include("inc-footer.php");?>
</body>
<script src="../files/bower_components/jquery/js/jquery.min.js"></script>
<script src="../files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script src="../files/bower_components/popper.js/js/popper.min.js"></script>
<script src="../files/bower_components/bootstrap/js/bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script src="../files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script src="../files/bower_components/modernizr/js/modernizr.js"></script>
<script src="../files/bower_components/modernizr/js/css-scrollbars.js"></script>

<!-- Bootstrap date-time-picker js -->
<script src="../files/assets/pages/advance-elements/moment-with-locales.min.js"></script>
<script src="../files/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="../files/assets/pages/advance-elements/bootstrap-datetimepicker.min.js"></script>
<!-- Date-range picker js -->
<script src="../files/bower_components/bootstrap-daterangepicker/js/daterangepicker.js"></script>
<!-- Date-dropper js -->
<script src="../files/bower_components/datedropper/js/datedropper.min.js"></script>
<!-- data-table js -->
<script src="../files/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<!-- ck editor -->
<script src="../files/assets/pages/ckeditor/ckeditor.js"></script>
<!-- echart js -->
<script src="../files/assets/pages/chart/echarts/js/echarts-all.js"></script>
<script src="../files/assets/pages/user-profile.js"></script>
<script src="../files/assets/js/pcoded.min.js"></script>
<script src="../files/assets/js/vertical/vertical-layout.min.js"></script>
<script src="../files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- Custom js -->
<script src="../files/assets/js/script.js"></script>
<script>
    function ale(hospital_id) {
        //alert(hospital_id);
        document.getElementById("hospital_id").value = hospital_id;
        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                id: hospital_id,
                Mode: "getDownload"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                var opt = '';
                $.each(jd, function(key, val) {

                    opt += '<tr>';
                    opt += '<td><i class="fa fa-star" aria-hidden="true"></i></td>';
                    opt += '<td>' + val["download_name"] + '</td>';
                    opt += '<td>' + val["hospital_NameTh"] + '</td>';
                    opt += '<td class="dropdown">';
                    opt += '<a href="../fileDownload/' + val["download_files_Name"] + '" target="_blank"><button type="button" class="btn btn-primary btn-sm" id="pnotify-permanent-buttons">Click here! <i class="icofont icofont-play-alt-2"></i></button></a>';
                    opt += '</td>';
                    opt += '</tr>';
                });
                
                $("#opt").empty().append(opt);
                
            }
        });
    }

    function Addtemf() {
        //alert("hospital_id");
        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                id: $("#staff_job_grade").val(),
                Mode: "getDownloadname"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                var opt = '';
                $.each(jd, function(key, val) {

                    opt += '<tr>';
                    opt += '<td><i class="fa fa-star" aria-hidden="true"></i></td>';
                    opt += '<td>' + val["download_name"] + '</td>';
                    opt += '<td>' + val["hospital_NameTh"] + '</td>';
                    opt += '<td class="dropdown">';
                    opt += '<a href="../fileDownload/' + val["download_files_Name"] + '" target="_blank"><button type="button" class="btn btn-primary btn-sm" id="pnotify-permanent-buttons">Click here! <i class="icofont icofont-play-alt-2"></i></button></a>';
                    opt += '</td>';
                    opt += '</tr>';
                });
                $("#opt").empty().append(opt);
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
                    Mode: "getDownloads"
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
            Addtemf();


        }

    });
</script>

</html>