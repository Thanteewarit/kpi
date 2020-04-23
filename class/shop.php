<!DOCTYPE html>
<html lang="en">
<?php include("imc-herder.php"); ?>
<?php if ($_GET['size'] == "") {
    $size = "A";
} else {
    $size = $_GET['size'];
} ?>
<style>
    .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: #3366FF;
        color: white;
        text-align: center;
    }

    .containes {
        width: 100%;
        height: 341px;
        overflow: scroll;
        /* showing scrollbars */
    }

    div.a {
        /*    white-space: nowrap; */
        width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
        border: 0px solid #000000;
    }

    div.a:hover {
        overflow: visible;
    }

    .tacx {
        position: absolute;
        top: auto;
        right: auto;
        height: auto;
        margin-top: auto;
        width: 188px;
        margin-left: auto;
    }

    .taxleft {
        position: absolute;
        top: -4px;
        left: -4px;
    }

    .col-lg-2 {
        position: relative;
        width: 100%;
        min-height: 1px;
        padding-right: 7px !important;
        padding-left: 2px !important;
    }

    p.test2 {
        width: 95%;
        border: 1px solid #000000;
        word-break: break-all;
    }

    .maraginDiv {
        margin-top: 10px;
        height: 43px;
        overflow: hidden;
    }

    .cards {
        background: #ffffff none repeat scroll 0 0;
        margin: 4px 0;
        padding: 7px;
        border: 0 solid #e7e7e7;
        border-radius: 5px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    }

    .img-thumbnails {
        padding: .25rem;
        background-color: #fff;
        /* border: 1px solid #dee2e6; */
        border-radius: .25rem;
        max-width: 100%;
        height: auto;
    }

    .imgFig {
        /*
        position: relative;
        padding-bottom: 50%;
*/
        overflow: hidden;
        height: 120px;
    }

    /*
    .imgFig img{
        position: absolute;
        
    }
*/
</style>

<body class="fix-header fix-sidebar" onload="getfocus()">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <div>

            <?php include("imc-herdOn.php") ?>
            <!-- <div class="w3-bar w3-black ">
                <div class="w3-bar-item" style="text-align: center;">โดเมนจะหมดอายุใน 30 สิงหาคม 2562</div> 
               
            </div> -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="card col-lg-12 containes" style="height: 560px;background-color: rgba(70, 128, 255, 0.16);">
                            <div class="row">
                                <?php
                                $sqls = " SELECT ast.*, apd.*  FROM 
                                ao_stork AS ast 
                                JOIN ao_Product AS apd ON apd.ap_id=ast.ast_idProduct
                                WHERE apd.ap_status='Y' AND apd.ap_size='$size' AND ast.ast_bu='" . $_SESSION['member']['as_bu'] . "'";
                                foreach (c_scelectS($sqls) as $r) { ?>
                                <div class="col-lg-2" onclick="alress('<?php echo $r['ap_barCode']; ?>');">

                                    <div class="cards">
                                        <div id="home-promotion" style="position:absolute;top:-4px;left:-4px;">
                                            <!--<img src="pro.png" width="70%" />-->
                                        </div>
                                        <div class="testimonial-widget-one p-0">
                                            <div class="testimonial-widget-one owl-carousel owl-theme">
                                                <div class="item">
                                                    <div class="testimonial-content">

                                                        <a href="#" data-toggle="popover" title="<?php echo strip_tags($r['ap_name']); ?>" data-content="<?php echo $r['ap_name']; ?> ขนาด : <?php echo $r['ap_typeName']; ?>">
                                                            <div class="imgFig">
                                                                <img src="pic/<?php echo $r['ap_picture'] ?>" class="img-thumbnails" alt="<?php echo $r['ap_name']; ?>">
                                                            </div>
                                                        </a>
                                                        <!--                                            <div class="testimonial-author">Lincoln</div>-->
                                                        <div class="maraginDiv">
                                                            <div class="testimonial-author-position a " style="	
text-overflowt : ellipsis;">
                                                                <h6><?php echo $r['ap_name']; ?></h6>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <?php } ?>
                            </div>


                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="text-right">
                            <div class="card bg-primary" style="height: 100px;">
                                <div class="media widget-ten">
                                    <div class="media-left meida media-middle">
                                        <span><a class=" btn waves-effect waves-light m-r-5 text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <!--                                                            <i class="fa fa-floppy-o"></i> -->
                                                Note</a>
                                            <div class="dropdown-menu animated zoomIn">
                                                <div class="row justify-content-center">
                                                    <div class="col-lg-12">
                                                        <div class="card card-outline-primary">
                                                            <div class="card-header">
                                                                <h4 class="m-b-0 text-white">เขียน Note แร่งด่วน</h4>
                                                            </div>
                                                            <div class="card-body">
                                                                <form action="oClass/sql-insert.php" method="post">
                                                                    <div class="form-body">
                                                                        <div class="row p-t-20">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group has-danger">
                                                                                    <label class="control-label">เรื่อง</label>
                                                                                    <input type="text" style="height:60px;" class="form-control form-control-danger" name="am_title">
                                                                                    <input type="hidden" name="Mode" value="addMSG">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">ข้อความ</label>

                                                                                    <textarea rows="4" cols="50" placeholder="ใส่ข้อมความ" name="am_detile"></textarea>
                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                    <div class="form-actions">
                                                                        <button type="submit" class="btn btn-success" style="width:100%; height:60px; "> <i class="fa fa-check"></i>ส่งข้อความ</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </span>
                                    </div>
                                    <div class="media-body media-text-right">
                                        <h6 class="color-white" id="totle"></h6>
                                        <p class="m-b-0" id="priceDis"></p>
                                        <h2 class="color-white" id="totleA"></h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="form-group m-b-0">
                                <div class="text-right">
                                    <a class=" btn btn-success waves-effect waves-light m-r-5 text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <!--                                                            <i class="fa fa-floppy-o"></i> -->
                                        ชำระ</a>
                                    <div class="dropdown-menu animated zoomIn">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-12">
                                                <div class="card card-outline-primary">
                                                    <div class="card-header">
                                                        <h4 class="m-b-0 text-white">ชำระเงิน</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <form action="#">
                                                            <div class="form-body">
                                                                <div class="row p-t-20">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="control-label">จำนวนเงินที่ต้องชำระ</label>
                                                                            <input type="text" id="PriceTo" style="height:60px;" class="form-control" readonly>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <div class="form-group has-error">
                                                                            <label class="control-label">รับเงินมา</label>
                                                                            <input type="text" id="chisTO" style="height:60px;" class="form-control form-control-danger" onkeyup="calculate()" autocomplete="off">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group has-danger">
                                                                            <label class="control-label">เงินทอน</label>
                                                                            <input type="text" id="VillTO" style="height:60px;" class="form-control form-control-danger" readonly>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="form-actions">
                                                                <button type="submit" class="btn btn-success" style="width:100%; height:80px;" onclick="ckStatus()"> <i class="fa fa-check"></i> ชำระเงิน</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-danger waves-effect waves-light m-r-5" onclick="Canceled()"> ยกเลิก</button>
                                </div>
                            </div>
                            <br>
                            <!--
                            <div class="card-title">
                                <h6>รายการขาย <span id="toNum"></span> </h6>
                            </div>
-->
                            <div class="card-body containes">
                                <div class="table-responsive">
                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                                <th>รายการ</th>
                                                <!--												<th>จำนวน</th>-->
                                                <th>ราคา</th>
                                            </tr>
                                        </thead>
                                        <tbody id="list">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>

            </div>

            <!--            <footer class="footer"> © 2018 All rights reserved. Template designed by <a href="https://colorlib.com">Colorlib</a></footer>-->

        </div>

    </div>
    <?php include("imc-footer.php"); ?>

    <!--
    <script>
    $(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
    </script>
-->
    <!--    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>-->
    <!--    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>-->
    <script>
        function getfocus() {
            document.getElementById('keyword').value = '';
            document.getElementById("keyword").focus();
            getDetilLode();
        }
        $(document).on("keypress", function(e) {

            if (e.which == 13) {
                getDetil();
            }
        });

        function alress(i) {
            $.ajax({
                url: "data.php?Mode=vill",
                type: "POST",
                data: 'keyword=' + i,
                success: function(result) {
                    document.getElementById('keyword').value = '';
                    var obj = jQuery.parseJSON(result);
                    $.each(obj, function(key, val) {
                        if (val['ast_numProduct'] > 0) {
                            var discs = (val["disC"] * val["ap_price"]) / 100;
                            var total = val["ap_price"] - discs;
                            $(function() {
                                $.ajax({
                                    url: "data.php?Mode=add",
                                    type: "POST",
                                    data: 'ap_id=' + val["ap_id"] + '&ap_type=' + val["ap_type"] + '&ap_price=' + val["ap_price"] + '&disC=' + val["disC"] + '&total=' + total,
                                    success: function(result) {
                                        $("#list").empty(list);
                                        getDetilLode();
                                    }

                                });
                            });
                        } else {
                            alert("ไม่มีสินค้าในสต๊อก");
                            //window.location.reload();
                        }
                    });
                    i++;
                }

            });


        }
        var i = 1;

        function getDetil() {
            $.ajax({
                url: "data.php?Mode=vill",
                type: "POST",
                data: 'keyword=' + $("#keyword").val(),
                success: function(result) {
                    document.getElementById('keyword').value = '';
                    var obj = jQuery.parseJSON(result);
                    $.each(obj, function(key, val) {
                        var discs = (val["disC"] * val["ap_price"]) / 100;
                        var total = val["ap_price"] - discs;
                        $(function() {
                            $.ajax({
                                url: "data.php?Mode=add",
                                type: "POST",
                                data: 'ap_id=' + val["ap_id"] + '&ap_type=' + val["ap_type"] + '&ap_price=' + val["ap_price"] + '&disC=' + val["disC"] + '&total=' + total,
                                success: function(result) {
                                    $("#list").empty(list);
                                    getDetilLode();
                                }

                            });
                        });

                    });
                    i++;
                }

            });

        }

        function getDetilLode() {
            $o = 1;
            $.ajax({
                url: "data.php?Mode=villLode",
                type: "POST",
                data: 'keyword=' + $("#keyword").val(),
                success: function(result) {
                    document.getElementById('keyword').value = '';
                    var obj = jQuery.parseJSON(result);
                    $.each(obj, function(key, val) {
                        var str = val["ap_name"];
                        var res = str.replace("<br>", "");
                        var discs = (val["aod_disc"] * val["aod_price"]) / 100;
                        var total = val["ap_price"] - discs;
                        var list = '<tr onclick="delss(' + val["aod_id"] + ')">';
                        list += '<td>' + res + '</td>';
                        list += '<td class="color-primary text-right">' + total.toFixed(2) + '</td>';
                        list += '<input type="hidden" name="aod_productId[]" value="' + val["ap_id"] + '"/>';
                        list += '<input type="hidden" name="aod_typeProduct[]" value="' + val["ap_type"] + '"/>';
                        list += '<input type="hidden" name="aod_price[]" value="' + val["ap_price"] + '"/>';
                        list += '<input type="hidden" name="aod_disc[]" value="' + val["disC"] + '"/>';
                        list += '<input type="hidden" name="discs[]" value="' + discs + '"/>';
                        list += '<input type="hidden" name="aod_priceDisc[]" value="' + total + '"/>';
                        list += '</tr>';
                        $("#list").append(list);
                        $("#toNum").empty();
                        $("#toNum").append('(' + (key + 1) + ')');
                    });

                    sumBuy();
                    getfocus();
                }

            });

        }

        function sumBuy() {
            var sumValue = 0;
            $.each($('input[name="aod_price[]"]'), function(i, v) {
                if (parseFloat(v.value) >= 0) sumValue += parseFloat(v.value)
            })

            var priceDis = 0;
            $.each($('input[name="discs[]"]'), function(i, v) {
                if (parseFloat(v.value) >= 0) priceDis += parseFloat(v.value)
            })
            //ส่วนลด
            priceDis = priceDis.toFixed(2);
            $("#priceDis").empty();
            $("#priceDis").append('ส่วนลด ' + priceDis);

            //
            $("#totle").empty();
            $("#totle").append('ราคา ' + sumValue);
            var totleA = (sumValue - priceDis);
            $("#totleA").empty();
            $("#totleA").append(totleA.toFixed(2));
            document.getElementById('PriceTo').value = totleA.toFixed(2);
            document.getElementById('discTo').value = priceDis;
        }

        function clearVlue() {

            document.getElementById('chisTO').value = "";
            document.getElementById('VillTO').value = "";
        }

        function calculate() {
            var total = 0;
            var PriceTo = parseFloat(document.getElementById('PriceTo').value);
            var chisTO = parseFloat(document.getElementById('chisTO').value);
            if (isNaN(PriceTo)) {
                PriceTo = 0;
            }
            if (isNaN(chisTO)) {
                chisTO = 0;
            }
            total1 = chisTO - PriceTo;
            document.getElementById('VillTO').value = total1.toFixed(2);

        }

        function ckStatus() {
            $.ajax({
                url: "data.php?Mode=ckStatus",
                type: "POST",
                data: {
                    chisTO: $("#chisTO").val(),
                    VillTO: $("#VillTO").val()
                },
                success: function(result) {
                    alert("ชำระเงินเรียบร้อยเเล้ว");
                    $("#list").empty();
                    $("#totleA").empty();
                    $("#priceDis").empty();
                    $("#totle").empty();
                    $("#toNum").empty();
                    getfocus();
                    clearVlue();
                    window.open('print.php');
                }

            });
        }

        function Canceled() {
            $.ajax({
                url: "data.php?Mode=Canceled",
                type: "POST",
                success: function(result) {
                    alert("ยกเลิกรายการเรียบร้อยเเล้ว");
                    $("#list").empty();
                    $("#totleA").empty();
                    $("#priceDis").empty();
                    $("#totle").empty();
                    $("#toNum").empty();
                    getfocus();
                }

            });
        }

        function delss(vals) {
            console.log(vals);
            $.ajax({
                url: "data.php?Mode=delss",
                type: "POST",
                data: "keyword=" + vals,
                success: function(result) {
                    $("#list").empty(list);
                    getDetilLode();
                }

            });
        }
    </script>

</body>

</html>