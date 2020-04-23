<!DOCTYPE html>
<html lang="en">
<?php $page="competency"; $ac="core"; ?> 

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
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        <form action="../class/sql-insert.php" method="post">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>สมรรถนะและพฤติกรรมหลักขององค์กร (Core Competency)</h5>
                                            </div>
                                            <div class="card-block">
                                                <div class="dt-responsive table-responsive">
                                                    <table id="new-cons2" class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th class="no-sort">Competencies สมรรถนะ และ พฤติกรรม</th>
                                                                <th class="no-sort">ประเมิน</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            
                                                            <tr style="background: #2a97a5;">
                                                                <td>1. Creatively Unconventional (คิดต่างอย่างสร้างสรรค์)</td>
                                                                <td> <?php //echo $r['ap_weight']?></td>
                                                            </tr>
                                                            
                                                            <?php for($i=0; $i<10; $i++){?>
                                                            <tr>

                                                                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                   1. <?php echo $i+1;?> เรียนรู้และพัฒนาตนเองให้มีความคิดริเริ่มในการทำงาน</td>
                                                                <td class="tabledit-edit-mode">
                                                                    <select class="tabledit-input form-control input-sm" onchange="onCompanyChange(this.value,'<?php echo $r1['ct_Id']?>')"  required >
                                                                        <option value="">กรุณาเลือกคะแนน</option>
                                                                        <option value="0" <?php if($arr['cv_Values']=="0"){ echo "selected";}?>>0</option>
                                                                        <option value="1" <?php if($arr['cv_Values']=="1"){ echo "selected";}?>>1</option>
                                                                        <option value="2" <?php if($arr['cv_Values']=="2"){ echo "selected";}?>>2</option>
                                                                    </select></td>
                                                            </tr>
                                                            <?php }?>
                                                            <tr style="background: #2a97a5;">
                                                                <td>2. Passionately Refined (ทำงานอย่างปราณีตด้วยใจที่มุ่งมั่น)</td>
                                                                <td> <?php //echo $r['ap_weight']?></td>
                                                            </tr>
                                                            
                                                            <?php for($i=0; $i<10; $i++){?>
                                                            <tr>

                                                                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                   2. <?php echo $i+1;?> ตรวจสอบความถูกต้องของงานได้ตามมาตรฐานที่กำหนดขึ้น</td>
                                                                <td class="tabledit-edit-mode">
                                                                    <select class="tabledit-input form-control input-sm" onchange="onCompanyChange(this.value,'<?php echo $r1['ct_Id']?>')"  required >
                                                                        <option value="">กรุณาเลือกคะแนน</option>
                                                                        <option value="0" <?php if($arr['cv_Values']=="0"){ echo "selected";}?>>0</option>
                                                                        <option value="1" <?php if($arr['cv_Values']=="1"){ echo "selected";}?>>1</option>
                                                                        <option value="2" <?php if($arr['cv_Values']=="2"){ echo "selected";}?>>2</option>
                                                                    </select></td>
                                                            </tr>
                                                            <?php }?>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                            <input type="hidden" name="Mote" value="addCompetency">
                                            <button type="submit" class="btn btn-out-dashed btn-success btn-square">บันทึกผล และส่ง</button>
<!--                                            <button type="submit" class="btn btn-out-dashed btn-success btn-square" onclick="return confirm('คุณต้องการส่งการประเมิน?');">บันทึกผล และส่ง</button>-->
                                        </form>
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
    <!-- data-table js -->
    <script src="../files/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../files/assets/pages/data-table/js/jszip.min.js"></script>
    <script src="../files/assets/pages/data-table/js/pdfmake.min.js"></script>
    <script src="../files/assets/pages/data-table/js/vfs_fonts.js"></script>
    <script src="../files/assets/pages/data-table/extensions/responsive/js/dataTables.responsive.min.js"></script>
    <script src="../files/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../files/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <!-- Custom js -->
    <script src="../files/assets/pages/data-table/extensions/responsive/js/responsive-custom.js"></script>
    <script src="../files/assets/js/pcoded.min.js"></script>
    <script src="../files/assets/js/vertical/vertical-layout.min.js"></script>
    <script src="../files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../files/assets/js/script.js"></script>
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
</script>

</html>