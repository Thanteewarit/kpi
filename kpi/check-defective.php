<?php $pcoded="9"; $pag="check-defective";?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("inc-header.php");?>
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
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-header start -->
                                    <div class="page-header card">
                                        <div class="card-block">
                                            <h5 class="m-b-10">รายงานการขาย</h5>
                                            <p class="text-muted m-b-10">แสดงรายการการขายรายวัน โดยดึงจากรายชื่อผู้ขาย จากยอดการจองเเต่ละวัน</p> 
                                            <ul class="breadcrumb-title b-t-default p-t-10">
                                                <li class="breadcrumb-item">
                                                    <a href="index.html"> <i class="fa fa-home"></i> </a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#!">Report</a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#!">รายงานการขาย</a>
                                                </li>
                                            </ul>
                                            <?php 
                                    if(isset($_POST['usbmit'])) 
                                    {
                                        $_SESSION['Sdate']=$_POST['Sdate'];
                                        $_SESSION['Edate']=$_POST['Edate'];
                                    }
                                    ?>
                                            <div class="text-right">
                                               <div class="card-block">
                                                <h4 class="sub-title"></h4>
                                                <form action="?" method="post">
                                                        <div class="form-group row">
                                                            <div class="form-group row col-sm-5">
                                                                <label class="col-sm-3 col-form-label text-left">เริ่มต้น</label>
                                                                <div class="col-sm-9 text-left">
                                                                    <input type="date" class="form-control form-control-normal" name="Sdate" value="<?php
                                        if($_SESSION['Sdate']=="") { echo date("Y-m-d"); }else{ echo $_SESSION['Sdate'];} ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row col-sm-5">
                                                                <label class="col-sm-3 col-form-label text-left">ถึงวันที่</label>
                                                                <div class="col-sm-9 text-left">
                                                                    <input type="date" class="form-control form-control-normal" name="Edate" value="<?php
                                        if($_SESSION['Edate']=="") { echo date("Y-m-d"); }else{ echo $_SESSION['Edate'];} ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <button type="submit" name="usbmit" class="btn btn-warning btn-outline-warning waves-effect md-trigger">ค้นหาข้อมูล</button>
                                                            </div>

                                                        </div>
                                                    </form>
                                            </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-header end -->

                                                                        <!-- Page-body start -->
                                    <div class="page-body">
                                        
                                        <!-- Base Style table start -->
                                        <div class="card">
                                            
                                           <div class="card-header">
                                                <div class="row">
                                                    <div class="col-10">
                                                        <div class="timeline-details">
                                                            <div class="chat-header">บริษัท เอสซี แอสเสท คอร์ปอเรชั่น จำกัด (มหาชน) </div>
                                                            <p class="text-muted">อาคาร
                                                                <?php 
                                                                if(isset($_POST['usbmit']))
                                                            {
                                                                $sdate=$_POST['Sdate']; $edate=$_POST['Edate'];
                                                            }else{
                                                                $sdate=date("Y-m-")."1"; $edate=date("Y-m-")."30";
                                                            }
                                                                                                        $valuei="btmarketinformation where mi_Id='".$_POST['market_id']."'";
                                                                                                        echo ck_check("mi_codeT",$valuei);
                                                                                                        ?> (
                                                                <?php 
                                                                                                        $valuei="btmarketinformation where mi_Id='".$_SESSION['member']['bu_Id']."'";
                                                                                                        echo ck_check("mi_Name",$valuei);
                                                                                                        ?> )</p>

                                                            <p class="text-muted">ระหว่างวันที่
                                                                <?php echo DateThai($sdate);?> ถึง
                                                                <?php echo DateThai($edate);?>
                                                            </p>

                                                        </div>
                                                    </div>

<!--
                                                    <div class="col-2">
                                                        <form action="#" method="post">
                                                            <button id="getExceal" style="width: 100%;" class="btn btn-out-dotted btn-info btn-square">ดึงข้อมูล Excel</button>
                                                        </form>
                                                    </div>
-->
                                                </div>
                                            </div>
                                            
                                            <div class="card-block">
                                                <div class="dt-responsive table-responsive">
                                                    <table id="basic-btn" class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>เลขที่ใบจอง</th>
                                                                <th>ตลาด</th>
                                                                <th>ชื่อผู้จอง</th>
                                                                <th>สถานะการตรวจสอบ</th>
                                                                <th>จ่ายเงินเพิ่ม</th>
                                                                <th>รูปภาพ</th>
                                                                <th>ชื่อ Booth</th>
                                                                <th>สินค้าขาย</th>
                                                                <th>วันที่ขาย</th>
                                                               
                                                               

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                            if(isset($_POST['usbmit']))
                                                            {
                                                                $sdate=$_POST['Sdate']; $edate=$_POST['Edate'];
                                                            }else{
                                                                $sdate=date("Y-m-")."1"; $edate=date("Y-m-")."30";
                                                            }
                                                            
                                                            $valuei="select * 
from btbooking AS bk 
LEFT JOIN btbu AS bb ON bb.bu_Id = bk.booking_building_id
LEFT JOIN btmember AS bm ON bm.mb_Id = bk.booking_member_id
LEFT JOIN btmarketinformation AS bf ON bf.mi_Id = bk.booking_market_id
LEFT JOIN btbooking_detail AS bkd ON bk.booking_id = bkd.bd_booking_id
LEFT JOIN btbooth AS bo ON bo.bb_Id = bkd.bd_booth_id
LEFT JOIN btproduct_booking AS bbg ON bbg.booking_id = bkd.bd_booking_id  AND bbg.product_booking_date = bkd.bd_booking_date 
LEFT JOIN btproduct AS btp ON btp.pd_Id = bbg.product_id
LEFT JOIN audit_status AS r1 ON bkd.audit_status = r1.audit_status_id
LEFT JOIN audit_checker_details AS r2 ON bkd.bd_id = r2.bd_id
LEFT JOIN audit_checker_details_image AS r3 ON r2.bd_id = r3.bd_id
                                                            WHERE bk.booking_building_id = '".$_SESSION['member']['bu_Id']."' 
                                                            AND bk.booking_status_id = '3'  
                                                            AND r2.chk_damage = '1'
                                                            AND SUBSTRING(bkd.bd_booking_date, 1, 10) BETWEEN '$sdate' AND '$edate' GROUP BY bkd.bd_booking_id,bkd.bd_booth_id,bkd.bd_booking_date ";
                                                            foreach(c_scelectS($valuei) AS $key => $r){
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $key+1;?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $r['booking_id'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $r['mi_Name'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $r['mb_Name']?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $r['audit_status_name'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $r['total_price'];?>
                                                                </td>
                                                                <td>
                                                                    <img src="<?php echo $r['url'];?>"height="200px">
                                                                    
                                                                </td>
                                                                <td>
                                                                    <?php echo $r['bb_Name'];?>
                                                                </td>
                                                                
                                                                <td>
                                                                    <?php echo $r['pd_Name'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo DateThai($r['bd_booking_date'])?>
                                                                </td>
                                                                
                                                                
                                                            </tr>
                                                            <?php }?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>เลขที่ใบเสร็จ</th>
                                                                <th>ตลาด</th>
                                                                <th>ชื่อผู้จอง</th>
                                                                <th>สถานะการตรวจสอบ</th>
                                                                <th>จ่ายเงินเพิ่ม</th>
                                                                <th>รูปภาพ</th>
                                                                <th>ชื่อ Booth</th>
                                                                <th>สินค้าขาย</th>
                                                                <th>วันที่ขาย</th>
                                                                
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Base Style table end -->

                                    </div>

                                </div>
                            </div>
                            <!-- Main-body end -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script  src="../Tem/files/bower_components/jquery/js/jquery.min.js"></script>
    <script  src="../Tem/files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script  src="../Tem/files/bower_components/popper.js/js/popper.min.js"></script>
    <script  src="../Tem/files/bower_components/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script  src="../Tem/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script  src="../Tem/files/bower_components/modernizr/js/modernizr.js"></script>
    <script  src="../Tem/files/bower_components/modernizr/js/css-scrollbars.js"></script>
    <!-- data-table js -->
    <script src="../Tem/files/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../Tem/files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../Tem/files/assets/pages/data-table/js/jszip.min.js"></script>
    <script src="../Tem/files/assets/pages/data-table/js/pdfmake.min.js"></script>
    <script src="../Tem/files/assets/pages/data-table/js/vfs_fonts.js"></script>
    <script src="../Tem/files/assets/pages/data-table/extensions/buttons/js/dataTables.buttons.min.js"></script>
    <script src="../Tem/files/assets/pages/data-table/extensions/buttons/js/buttons.flash.min.js"></script>
    <script src="../Tem/files/assets/pages/data-table/extensions/buttons/js/jszip.min.js"></script>
    <script src="../Tem/files/assets/pages/data-table/extensions/buttons/js/vfs_fonts.js"></script>
    <script src="../Tem/files/assets/pages/data-table/extensions/buttons/js/buttons.colVis.min.js"></script>
    <script src="../Tem/files/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../Tem/files/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../Tem/files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../Tem/files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../Tem/files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <!-- Custom js -->
    <script src="../Tem/files/assets/pages/data-table/extensions/buttons/js/extension-btns-custom.js"></script>
    <script src="../Tem/files/assets/js/pcoded.min.js"></script>
    <script src="../Tem/files/assets/js/vertical/vertical-layout.min.js"></script>
    <script src="../Tem/files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script  src="../Tem/files/assets/js/script.js"></script>
</body>

</html>