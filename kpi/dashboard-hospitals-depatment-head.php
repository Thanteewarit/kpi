<?php $page="dashboard"; $ac="dashboard-hospitals-depatment-head"; session_start();?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("inc-header.php")?>
    <?php $Tid=cut(TokenVerify($_GET['key'], $secret));?>
    <?php if($Tid!=""){ $_SESSION["division_manager_sub_id"]=$Tid; }?>
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
                                                        <li class="breadcrumb-item"><a href="#!">dashboard</a>
                                                        </li>
                                                        <li class="breadcrumb-item"><a href="dashboard-hospitals-all.php">Hospital</a>
                                                        </li>
                                                        <li class="breadcrumb-item"><a href="dashboard-hospitals-all.php"><?php 
                                                            $valuei = "SELECT hospital_NameTh FROM tb_hospital WHERE hospital_id = '".$_SESSION["hospitals"]."'";
                                                            foreach(c_scelectS($valuei) AS $key => $r)
                                                            {
                                                                echo $r['hospital_NameTh'];
                                                            }
                                                             ?></a>
                                                        </li>
                                                        <li class="breadcrumb-item"><a href="dashboard-hospitals-director-assistant.php"> Director assistant</a>
                                                        </li> 
                                                        <li class="breadcrumb-item"><a href="dashboard-hospitals-division_director.php">Division director</a>
                                                        </li>
                                                        <li class="breadcrumb-item"><a href="dashboard-hospitals-manager-head.php">Manager Head</a>
                                                        </li>
                                                        <li class="breadcrumb-item"><a href="dashboard-hospitals-manager-sub.php">Manager Sub</a>
                                                        </li> 
                                                        <li class="breadcrumb-item"><a href="dashboard-hospitals-depatment-head.php">Depatment Head</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <hr style="width: 95%;">

                                            </div>
                                            <div class="card-block">
                                                <div class="dt-responsive table-responsive">
                                                    <table id="footer-search" class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>ลำดับที่</th>
                                                                <th>Name En</th>
                                                                <th>คะแนน</th>
                                                                <th>ดูรายละเอียด</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                             <?php 
                                                            $valuei="
                                                            SELECT * FROM tb_depatment_head WHere director_assistant_id='".$_SESSION["director_assistant_id"]."' AND  
                                                            division_director_id = '".$_SESSION["division_director_id"]."' AND
                                                            division_manager_head_id = '".$_SESSION["division_manager_head_id"]."' AND division_manager_sub_id = '".$_SESSION["division_manager_sub_id"]."' AND
                                                            depatment_head_Status = 'Y' ";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                            <tr>
                                                                 <td><?php echo $key+1;?></td>
                                                                <td><?php echo $r['depatment_head_Name'];?></td>
                                                                <td>3.5</td>
                                                                <td><a href="dashboard-hospitals-division_director.php?key=<?php echo TokenGen($r['division_manager_sub_id'], $secret)?>"><button class="btn btn-info">ดูรายละเอียด</button></a></td>
                                                                
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>ลำดับที่</th>
                                                                <th>Name En</th>
                                                                <th>คะแนน</th>
                                                                <th>ดูรายละเอียด</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
</html>