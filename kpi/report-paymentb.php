<?php $pag="report-paymentb"; $pcoded="report";?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("inc-header.php");?>
</head>

<body onload="sumBuy()">
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
                                            <h5 class="m-b-10">รายงานการชำระเงิน</h5>
                                            <!--                                            <p class="text-muted m-b-10">แสดงรายงานการจองทั้งหมดที่ยังไม่ได้ชำระเงิน สามารถข้อมูลตามวันที่ทำรายการได้</p>-->
                                            <ul class="breadcrumb-title b-t-default p-t-10">

                                            </ul>
                                            <div class="text-right">
                                                <div class="card-block">
                                                    <form action="?" method="post">
                                                        <div class="form-group row">
                                                            <div class="col-sm-4">
                                                                <input type="date" name="dayStart" class="form-control" value="<?php echo $_SESSION['dayStart']?>" required>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <input type="date" name="dayEnd" class="form-control" value="<?php echo $_SESSION['dayEnd']?>" required>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <select name="market_id" class="form-control" required>
                                                                    <option value="">กรุณาเลือกตลาด</option>
                                                                    <?php 
                                                                        $valuei="select * from btmarketinformation where mi_Status='Y'";
                                                                        foreach(c_scelectS($valuei) AS $r) {
                                                                        ?>
                                                                    <option value="<?php echo $r['mi_Id'];?>" <?php if($_SESSION['market_id']==$r['mi_Id']){ echo "selected"; }?>>
                                                                        <?php echo $r['mi_Name'];?>
                                                                    </option>
                                                                    <?php }?>
                                                                </select>
                                                            </div>
                                                            <!--
                                                            <div class="col-sm-4">
                                                                <select name="bu_Id" class="form-control" required>
                                                                    <option value="">เลือกสถานะ</option>
                                                                    <option value="1">ทั้งหมด</option>
                                                                    <option value="2">ใช้งาน</option>
                                                                    <option value="3">ยกเลิก</option>
                                                                </select>
                                                            </div>
-->
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-4">
                                                                <select name="statu" class="form-control" required>
                                                                    <option value="">ค้นหาด้วย</option>
                                                                    <option value="1" <?php if($_SESSION['statu']=="1"){ echo "selected"; }?>>ทั้งหมด</option>
                                                                    <option value="2" <?php if($_SESSION['statu']=="2"){ echo "selected"; }?>>ชำระเงินรอออกใบเสร็จ</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <select name="ORDER" class="form-control" required>
                                                                    <option value="">เรียงตาม</option>
                                                                    <option value="booking_id" <?php if($_SESSION['ORDER']=="booking_id"){ echo "selected"; }?>>เลขที่ใบจอง</option>
                                                                    <option value="booking_created_date" <?php if($_SESSION['ORDER']=="booking_created_date"){ echo "selected"; }?>>วันที่จัดงาน</option>
                                                                    <option value="booking_created_date" <?php if($_SESSION['ORDER']=="booking_created_date"){ echo "selected"; }?>>วันที่ชำระเงิน</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <button type="submit" name="ok" style="width: 100%;" class="btn btn-warning btn-outline-warning waves-effect md-trigger">ค้นหาข้อมูล</button>
                                                            </div>

                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <?php 
                                    if(isset($_POST['ok'])) 
                                    {
                                        $_SESSION['dayStart']=$_POST['dayStart'];
                                        $_SESSION['dayEnd']=$_POST['dayEnd'];
                                        $_SESSION['market_id']=$_POST['market_id'];
                                        $_SESSION['statu']=$_POST['statu'];
                                        $_SESSION['ORDER']=$_POST['ORDER']; 
                                    
                                    ?>

                                    <!-- Page-header end -->

                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <!-- Base Style table start -->
                                        <div class="card">
                                            <!--
                                            <div class="card-header">
                                                <h5>Base Style</h5>
                                                <span>The DataTables default style file has a number of features which can be enabled based on the class name of the table. These features are.</span>
                                            </div>
-->
                                            <div class="card-block">

                                                <div class="row">
                                                    <div class="col-10">
                                                        <div class="timeline-details">
                                                            <div class="chat-header">บริษัท เอสซี แอสเสท คอร์ปอเรชั่น จำกัด (มหาชน) </div>
                                                            <p class="text-muted">
                                                                <?php 
                                                            $valuei="btmarketinformation where mi_Id='".$_POST['market_id']."'";
                                                            echo ck_check("mi_codeT",$valuei);
                                                            ?>
                                                                <?php 
                                                            $valuei="btmarketinformation where mi_Id='".$_POST['market_id']."'";
                                                            echo ck_check("mi_Name",$valuei);
                                                            ?> </p>
                                                            <p class="text-muted">การชำระเงิน</p>
                                                            <p class="text-muted">ระหว่างวันที่
                                                                <?php echo DateThai($_POST['dayStart']);?> ถึง
                                                                <?php echo DateThai($_POST['dayEnd']);?>
                                                            </p>
                                                            <p></p>
<!--
                                                            <div  class="text-muted">
                                                                <label for="checkbox18">
                                                                    สถานะการชำระเงิน &nbsp;&nbsp;
                                                                </label>
                                                                <div class="checkbox-color checkbox-info">
                                                                    <input id="checkbox13" type="checkbox" checked="">
                                                                    <label for="checkbox13">
                                                                        ชำระเงินแล้วรอออกใบเสร็จ
                                                                    </label>
                                                                </div>
                                                                <div class="checkbox-color checkbox-info">
                                                                    <input id="checkbox14" type="checkbox" >
                                                                    <label for="checkbox14">
                                                                        ออกใบเสร็จรับเงินแล้ว
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div  class="text-muted">
                                                                <label>สถานะ&nbsp;&nbsp;&nbsp; </label>
                                                                <div class="checkbox-color checkbox-info">
                                                                    <input id="checkbox8" type="checkbox" checked="">
                                                                    <label for="checkbox8">
                                                                        ใช้งาน
                                                                    </label>
                                                                </div>
                                                                <div class="checkbox-color checkbox-info">
                                                                    <input id="checkbox7" type="checkbox">
                                                                    <label for="checkbox7">
                                                                        ยกเลิก
                                                                    </label>
                                                                </div>
                                                            </div>
-->
                                                        </div>
                                                    </div>

                                                    <div class="col-2">
                                                        <form action="report-excel-paymentb.php" method="post">
                                                            <button id="getExceal" style="width: 100%;" class="btn btn-out-dotted btn-info btn-square">ดึงข้อมูล Excel</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <h4 class="sub-title"></h4>
                                                <div class="dt-responsive table-responsive">
                                                    <table id="base-style" class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>ลำดับที่</th>
                                                                <th>เลขที่ใบจอง</th>
                                                                <th>วันที่จัดงาน</th>
                                                                <th>ลูกค้า</th>
                                                                <th>วันที่ชำระเงิน</th>
                                                                <th>จำนวนเงินก่อน VAT</th>
                                                                <th>ส่วนลด</th>
                                                                <th>VAT 7% </th>
                                                                <th>ภาษีหัก ณ ที่จ่าย</th>
                                                                <th>ยอดที่ชำระ</th>
                                                                <th>File ใบเสร็จรับเงิน</th>
                                                                <th>สถานะ</th>
                                                                <th>เหตุผล</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                            if($_SESSION['statu']=="1"){
                                                                $status="AND bk.booking_status_id != '0'";
                                                            }
                                                            if($_SESSION['statu']=="2"){
                                                                $status="AND bk.booking_status_id = '3' ";
                                                            }
                                                            $valuei="
SELECT bkd.bd_booking_id, bkd.bd_booking_date, bm.mb_Name, bk.booking_created_date, ba.status_name, bk.booking_status_id, bm.mb_Type,

(SELECT IF(bk.booking_status_id='4', '0', bb_Price)  FROM `btbooth` WHERE `bb_Id`=bkd.bd_booth_id) AS printBootn,

(SELECT IF(bk.booking_status_id='4', '0', (SELECT CASE WHEN SUM(bh.at_Price*bda.qty) IS NULL THEN 0 ELSE SUM(bh.at_Price*bda.qty) END
FROM btbooking_detail_another AS bda 
LEFT JOIN btanother AS bh ON bh.at_id = bda.at_id 
WHERE bda.bd_booking_id = bkd.bd_booking_id AND bda.bd_booking_date = bkd.bd_booking_date ))  FROM `btbooth` WHERE `bb_Id`=bkd.bd_booth_id) AS another


FROM btbooking_detail AS bkd
JOIN btbooking AS bk ON bk.booking_id = bkd.bd_booking_id 
JOIN btstatus AS ba ON ba.status_id = bk.booking_status_id
JOIN btmember AS bm ON bm.mb_Id = bk.booking_member_id
WHERE bk.booking_market_id = '".$_POST['market_id']."' 
$status
AND bk.booking_created_date BETWEEN '".$_POST['dayStart']."' AND '".$_POST['dayEnd']."'
ORDER BY bk.booking_id ASC
";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ 
                                                                $valuei="SELECT cp.coupon_dicount
FROM transaction_details as td
INNER JOIN transaction_master as  tm on td.trans_id = tm.trans_id
INNER JOIN payment_transaction as pt on td.trans_id = pt.referenceNo
LEFT JOIN btcoupon cp on tm.coupon_id = cp.coupon_id
where pt.resultCode = '00' AND td.booking_id = '".$r['bd_booking_id']."'";
                                                                $discount=c_scelectOne($valuei);
                                                                $discount=$discount["coupon_dicount"]; //หาส่วนลดเป็น %
                                                                $pricet = $pricet + $price=$r['printBootn']+$r['another'];
                                                                $price = $r['printBootn']+$r['another']; //หาราคาBooth + กับ อุปกรเสริม 
                                                                $discount = $price*$discount/100; //หาส่วนลด เป็นบาท
                                                                $price = $price-$discount; //ราคาลบส่วนลด
                                                                
                                                                $priceVat7t = $priceVat7t + $priceVat7=$price*7/100;
                                                                if($r['mb_Type']=="02"){ $v3=$price*3/100; }else{ $v3=0;}
                                                                $priceVat3t = $priceVat3t + $v3;
                                                                $priceTotlett = $priceTotlett+ ($price+$priceVat7)-$v3;
                                                                $priceTotle = $price+$priceVat7+$v3;
                                                            ?>
                                                            <tr>
                                                                <td class="text-center">
                                                                    <?php echo $key+1;?>
                                                                </td>
                                                                <td class="text-center">
                                                                    <?php echo $r['bd_booking_id'];?>
                                                                </td>
                                                                <td class="text-center">
                                                                    <?php echo DateThai($r['bd_booking_date']);?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $r['mb_Name'];?>
                                                                </td>
                                                                <td class="text-center">
                                                                    <?php echo DateThai($r['booking_created_date']);?>
                                                                </td>
                                                                <td class="text-right">
                                                                    <?php echo number_format( $price , 2 );?>

                                                                </td>
                                                                <td class="text-center">
                                                                    <?php echo $discount;?>

                                                                <td class="text-right">
                                                                    <?php echo number_format($priceVat7 , 2);?>
                                                                </td>
                                                                <td class="text-right">
                                                                    <?php echo number_format($v3 , 2);?>

                                                                </td>
                                                                <td class="text-right">
                                                                    <?php echo number_format($priceTotle , 2);?>

                                                                </td>
                                                                <td class="text-center">
                                                                    รอดำเนินการ
                                                                </td>
                                                                <td class="text-center">
                                                                    <?php echo $r['status_name'];?>
                                                                </td>
                                                                <td>
                                                                    <?php if($r['booking_status_id']==4) { echo "Time out"; }?>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th colspan="4"></th>
                                                                <th class="text-right">Total</th>
                                                                <th class="text-right"><?php echo number_format($pricet,2);?></th>
                                                                <th class="text-right">
                                                                    <div id="discount"></div>
                                                                </th>
                                                                <th class="text-right"><?php echo number_format($priceVat7t,2);?></th>
                                                                <th class="text-right"><?php echo number_format($priceVat3t,2);?></th>
                                                                <th class="text-right"><?php echo number_format($priceTotlett,2);?></th>
                                                                <th colspan="3"></th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                                <h4 class="sub-title"></h4>
                                                <div class="timeline-details ">
                                                    <div class="chat-header">หมายเหตุ </div>
                                                    <p class="text-muted">&nbsp;&nbsp;&nbsp;*&nbsp;1. รายงานแสดงข้อมูลตามเลขที่ใบจอง</p>
                                                    <p class="text-muted">&nbsp;&nbsp;&nbsp;*&nbsp;2. สถานะยกเลิก ไม่แสดงจำนวนเงิน</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Base Style table end -->

                                    </div>
                                    <?php } ?>

                                </div>
                            </div>
                            <!-- Main-body end -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
    <script src="../Tem/files/bower_components/jquery/js/jquery.min.js"></script>
    <script src="../Tem/files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script src="../Tem/files/bower_components/popper.js/js/popper.min.js"></script>
    <script src="../Tem/files/bower_components/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script src="../Tem/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script src="../Tem/files/bower_components/modernizr/js/modernizr.js"></script>
    <script src="../Tem/files/bower_components/modernizr/js/css-scrollbars.js"></script>
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
    <script src="../Tem/files/assets/js/script.js"></script>
</body>
<script>
    $('#base-style').dataTable({
        "searching": true,
        "info": false,
        "paging": true,
        "lengthChange": true,
        "order": [],
        "columnDefs": [{
            "targets": 'no-sort',
            "orderable": false,
        }]
    });

    function sumBuy() {
        var Number1 = 0;
        $.each($('input[name="price[]"]'), function(i, v) {
            if (parseFloat(v.value) >= 0) Number1 += parseFloat(v.value)
        })
        $("#price").empty().append(Number1.toFixed(2));

        var discount = 0;
        $.each($('input[name="discount[]"]'), function(i, v) {
            if (parseFloat(v.value) >= 0) discount += parseFloat(v.value)
        })
        $("#discount").empty().append(discount.toFixed(2));

        var vat = 0;
        $.each($('input[name="vat[]"]'), function(i, v) {
            if (parseFloat(v.value) >= 0) vat += parseFloat(v.value)
        })
        $("#vat").empty().append(vat.toFixed(2));

        var vat3 = 0;
        $.each($('input[name="vat3[]"]'), function(i, v) {
            if (parseFloat(v.value) >= 0) vat3 += parseFloat(v.value)
        })
        $("#vat3").empty().append(vat3.toFixed(2));

        var pay = 0;
        $.each($('input[name="pay[]"]'), function(i, v) {
            if (parseFloat(v.value) >= 0) pay += parseFloat(v.value)
        })
        $("#pay").empty().append(pay.toFixed(2));



    }
</script>


</html>

<!--
SELECT bkd.bd_booking_id, bkd.bd_booking_date, bm.mb_Name, bk.booking_created_date, ba.status_name, 

((SELECT CASE WHEN SUM(bh.at_Price*bda.qty) IS NULL THEN 0 ELSE SUM(bh.at_Price*bda.qty) END
FROM btbooking_detail_another AS bda 
LEFT JOIN btanother AS bh ON bh.at_id = bda.at_id
WHERE bda.bd_booking_id = bk.booking_id) +

(SELECT SUM(bt.bb_Price)
FROM btbooking_detail AS bd 
JOIN btbooth AS bt ON bt.bb_Id = bd.bd_booth_id
WHERE bd.bd_booking_id = bk.booking_id)) AS printBootn,

((SELECT CASE WHEN SUM(bh.at_Price*bda.qty) IS NULL THEN 0 ELSE SUM(bh.at_Price*bda.qty) END
FROM btbooking_detail_another AS bda 
LEFT JOIN btanother AS bh ON bh.at_id = bda.at_id
WHERE bda.bd_booking_id = bk.booking_id) +

(SELECT SUM(bt.bb_Price)
FROM btbooking_detail AS bd 
JOIN btbooth AS bt ON bt.bb_Id = bd.bd_booth_id
WHERE bd.bd_booking_id = bk.booking_id)*7/100) AS printVat7



FROM btbooking_detail AS bkd
JOIN btbooking AS bk ON bk.booking_id = bkd.bd_booking_id 
JOIN btstatus AS ba ON ba.status_id = bk.booking_status_id
JOIN btmember AS bm ON bm.mb_Id = bk.booking_member_id
WHERE bk.booking_market_id = '".$_POST['market_id']."' 
AND bk.booking_created_date BETWEEN '".$_POST['dayStart']."' AND '".$_POST['dayEnd']."'
-->