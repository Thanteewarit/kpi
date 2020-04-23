<!DOCTYPE html>
<html lang="en">
<?php $page=""; $ac="download"; session_start();?>

<head>
    <?php include("inc-header.php")?>

    <link rel="icon" href="../files/assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="../files/bower_components/bootstrap/css/bootstrap.min.css">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="../files/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Date-time picker css -->
    <link rel="stylesheet" type="text/css" href="../files/assets/pages/advance-elements/css/bootstrap-datetimepicker.css">
    <!-- Date-range picker css  -->
    <link rel="stylesheet" type="text/css" href="../files/bower_components/bootstrap-daterangepicker/css/daterangepicker.css" />
    <!-- Date-Dropper css -->
    <link rel="stylesheet" type="text/css" href="../files/bower_components/datedropper/css/datedropper.min.css" />
    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css" href="../files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="../files/assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="../files/assets/icon/icofont/css/icofont.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="../files/assets/icon/font-awesome/css/font-awesome.min.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="../files/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../files/assets/css/jquery.mCustomScrollbar.css">
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
                    <?php 
                    $valuei="
                                                            SELECT * FROM tb_staff AS r1 
LEFT JOIN tb_depatment_head AS r2 ON r2.depatment_head_id = r1.staff_depatment_head_id
LEFT JOIN tb_department AS r3 ON r3.department_id = r1.staff_department_id
LEFT JOIN tb_department_work AS r4 ON r4.department_work_id = r1.staff_department_work_id
LEFT JOIN tb_division_director AS r5 ON r5.division_director_id = r1.staff_division_director_id
LEFT JOIN tb_division_manager_head AS r6 ON r6.division_manager_head_id = r1.staff_division_manager_head_id
LEFT JOIN tb_division_manager_sub AS r7 ON r7.division_manager_sub_id = r1.staff_division_manager_sub_id
LEFT JOIN tb_hospital AS r8 ON r8.hospital_id = r1.staff_hospital_id
LEFT JOIN tb_hospital_director_assistant AS r9 ON r9.director_assistant_id = r1.staff_director_assistant_id
LEFT JOIN tb_level_position AS r10 ON r10.level_position_code = r1.staff_level_position
WHERE r1.staff_id = '".$_SESSION['staff']['id']."' AND r1.staff_status = 'Y'";
                    $r=c_scelectOne($valuei);
                    ?>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <!--profile cover start-->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="cover-profile">
                                                    <div class="profile-bg-img">
                                                        <img class="profile-bg-img img-fluid" src="../files/assets/images/user-profile/headder.jpg" alt="bg-img">
                                                        <div class="card-block user-info">
                                                            <div class="col-md-12">
                                                                <!-- <div class="media-left">
                                                                    <a href="#" class="profile-image">
                                                                        <img class="user-img img-radius" src="../files/assets/images/user-profile/user-img.jpg" alt="user-img">
                                                                    </a>
                                                                </div> -->
                                                                <div class="media-body row">
                                                                    <div class="col-lg-12">
                                                                        <div class="user-title">
                                                                            <h2><?php echo $r['staff_Name']?> <?php echo $r['staff_Sername']?></h2>
                                                                            <span class="text-white"><?php echo $r['level_position_name']?></span>
                                                                        </div>
                                                                    </div>
                                                                    <!--
                                                                    <div>
                                                                        <div class="pull-right cover-btn">
                                                                            <button type="button" class="btn btn-primary m-r-10 m-b-5"><i class="icofont icofont-plus"></i> Follow</button>
                                                                            <button type="button" class="btn btn-primary"><i class="icofont icofont-ui-messaging"></i> Message</button>
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
                                        <!--profile cover end-->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <!-- tab header start -->
                                                <div class="tab-header card">
                                                    <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-toggle="tab" href="#personal" role="tab">ข้อมูลส่วนตัว</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#binfo" role="tab">ประวัติการทำงาน</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#pass" role="tab">เปลี่ยนรหัสผ่าน</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- tab header end -->
                                                <!-- tab content start -->
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="personal" role="tabpanel">
                                                        <!-- personal card start -->
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h5 class="card-header-text">ข้อมูลส่วนตัว</h5>
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
                                                                                                        <td><?php echo $r['staff_level_position'];?></td>
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
                                                        <!-- personal card end-->
                                                    </div>
                                                    <div class="tab-pane" id="binfo" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h5>รายชื่อผู้ประเมิน</h5>
                                                                    </div>
                                                                    <div class="card-block">
                                                                        <div class="dt-responsive table-responsive">
                                                                          <table id="footer-search" class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Name Hospital</th>
                                                                <th>Director assistant</th>
                                                                <th>Division director head</th>
                                                                <th>division Manager Sub line</th>
                                                                <th>Division director sub</th>
                                                                <th>Division director</th>
                                                                <th>ตำแหน่งงาน</th>
                                                                <th>Job Code</th>
                                                                <th>Job Deception</th>
                                                                <th>Job Grade</th>
                                                                <th>วันที่เริ่มต้น</th>
                                                                <th>วันที่ สิ้นสุด</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
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
WHERE r1.staff_code = '".$_SESSION['staff']['code']."' ORDER BY r1.staff_id asc
                                                            ";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                            <tr>
                                                                
                                                                 <td><?php echo $r['hospital_NameTh'];?></td>
                                                                 <td><?php echo $r['director_assistant_Name'];?></td>
                                                                <td><?php echo $r['division_manager_head_Name'];?></td>
                                                                <td><?php echo $r['division_manager_sub_Name'];?></td>
                                                                <td><?php echo $r['division_director_Name'];?></td>
                                                                 <td><?php echo $r['depatment_head_Name'];?></td>
                                                                <td><?php echo $r['level_position_name'];?></td>
                                                                 <td><?php echo $r['staff_job_code'];?></td>
                                                                 <td><?php echo $r['staff_job_description'];?></td>
                                                                 <td><?php echo $r['staff_job_grade'];?></td>
                                                                <td><?php echo DateThai($r['staff_start']);?></td>
                                                                <td><?php if($r['staff_end']!=date("0000-00-00")){ echo DateThai($r['staff_end']); }?></td>

                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- info card end -->
                                                    </div>
                                                    <div class="tab-pane" id="pass" role="tabpanel">
                                                        <div class="card">
                                                            <form method="post" action="../class/sql-insert.php">
                                                                <div class="card-block">
                                                                    <h4 class="sub-title">เปลี่ยนแปลงรหัสผ่าน</h4>
                                                                    <div class="form-group  row">
                                                                        <div class="col-sm-2">
                                                                            <label class="col-form-label" for="inputSuccess1">ID Staff</label>
                                                                        </div>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" name="staff_code" class="form-control form-control-success" readonly value="<?php echo $r['staff_code']?>">

                                                                        </div>
                                                                    </div>
                                                                    <!-- <div class="form-group  row">
                                                                        <div class="col-sm-2">
                                                                            <label class="col-form-label" for="inputSuccess1">รหัสผ่านเดิม</label>
                                                                        </div>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" name="old_password" class="form-control form-control-success">

                                                                        </div>
                                                                    </div> -->
                                                                    <div class="form-group  row">
                                                                        <div class="col-sm-2">
                                                                            <label class="col-form-label" for="inputSuccess1">รหัสผ่านใหม่</label>
                                                                        </div>
                                                                        <div class="col-sm-10">
                                                                            <input type="password" name="new1_password" class="form-control form-control-success">

                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group  row">
                                                                        <div class="col-sm-2">
                                                                            <label class="col-form-label" for="inputSuccess1">ยืนยัน รหัสผ่านใหม่</label>
                                                                        </div>
                                                                        <div class="col-sm-10">
                                                                            <input type="password" name="new2_password" class="form-control form-control-success">

                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group  row">
                                                                        <div class="col-sm-2">

                                                                        </div>
                                                                        <div class="col-sm-10">

                                                                            <input type="hidden" class="form-control form-control-normal" name="Mode" value="changPass">
                                                                            <button type="submit" id="idRunTheCode" class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add note">เปลี่ยนรหัสผ่าน</button>

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!-- info card end -->
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

</html>