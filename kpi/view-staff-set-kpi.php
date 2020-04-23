<?php $page="admim-kpi"; $ac="add-hospitals-kpi"; session_start();?>
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
    <link rel="stylesheet" href="../files/bower_components/select2/css/select2.min.css" />
    <!-- Multi Select css -->
    <link rel="stylesheet" type="text/css"
        href="../files/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css" />
    <link rel="stylesheet" type="text/css" href="../files/bower_components/multiselect/css/multi-select.css" />
    <link rel="stylesheet" href="../files/new/jquery-ui.1.10.1.min.css" type="text/css" />
    <link rel="stylesheet" href="../files/new/style.css" type="text/css" />
</head>
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
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="page-header">
                                                        <div class="card-block">

                                                            <ul class="breadcrumb-title  p-t-10">
                                                                <li class="breadcrumb-item">
                                                                    <a href="index.html"> <i class="fa fa-home"></i>
                                                                    </a>
                                                                </li>
                                                                <li class="breadcrumb-item"><a href="#!">KPI</a>
                                                                </li>
                                                                <li class="breadcrumb-item"><a
                                                                        href="hospitals-kpi-list.php">Add KPI</a>
                                                                <li class="breadcrumb-item">List KPI
                                                                </li>
                                                            </ul>
                                                            
                                                        </div>
                                                        <hr style="width: 95%;">

                                                    </div>
                                                    <div class="card-block">
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="simpletable"
                                                                class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>GROUP KPI</th>
                                                                        <th>Codes KPI</th>
                                                                        <th>KPI Name</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php 
                                                            $valuei="
                                                            SELECT *
                                                            FROM tb_evaluation_all AS r1
                                                            JOIN tb_kpi_master AS r2 ON r1.kpi_master_id = r2.kpi_master_id
                                                            JOIN tb_assessment_time AS r3 ON r3.assessment_time_code = r1.evaluation_code
                                                            JOIN tb_kpi_type AS r4 ON r4.kpi_type_id = r2.kpi_type_id
                                                            WHERE r1.evaluation_all_staff = '".$_GET['id']."'
                                                            AND r1.evaluation_all_year = '".date("Y")."'
                                                            AND r1.evaluation_code ='".cut(TokenVerify($_GET['key'], $secret))."'
                                                            ";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                                    <tr>
                                                                        <td><?php echo $key+1;?></td>
                                                                        <td><?php echo $r['kpi_type_name'];?></td>
                                                                        <td><?php echo $r['evaluation_code']?></td>
                                                                        <td><?php echo $r['kpi_master_name']?></td>
                                                                    </tr>
                                                                    <?php }?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="md-modal md-effect-15" id="modal-15">
                                        <div class="md-content">
                                            <h3>Hospitals KPI</h3>
                                            <div class="card-block" id="contents">
                                                <form method="post" action="../class/sql-insert.php">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Codes KPI</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control"
                                                                name="assessment_time_code" id="assessment_time_code"
                                                                value="<?php echo cut(TokenVerify($_GET['key'], $secret))?>"
                                                                required readonly>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">GROUP KPI</label>
                                                        <div class="col-sm-9">
                                                            <select name="kpi_type_id" id="kpi_type_id"
                                                                class="form-control" required>
                                                                <option value="" selected="selected">---Please select
                                                                    ---</option>
                                                                <?php 
                                                                $valuei="select * from tb_kpi_type WHERE kpi_type_status = 'Y' AND kpi_types = '1'";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                                <option value="<?php echo $r['kpi_type_id'];?>">
                                                                    <?php echo $r['kpi_type_name'];?>
                                                                    <?php } ?>

                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">KPI Name</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control"
                                                                name="kpi_master_name" id="kpi_master_name" required
                                                                autocomplete="off">

                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Weight <span
                                                                class="pcoded-badge label label-warning"
                                                                onclick="allea()"><i
                                                                    class="fa fa-question warning"></i></span></label>
                                                        <div class="col-sm-9">
                                                            <input type="number" class="form-control"
                                                                name="kpi_master_weight" id="kpi_master_weight"
                                                                autocomplete="off">

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Target </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control"
                                                                name="kpi_master_target" id="kpi_master_target" required
                                                                autocomplete="off">

                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-12 col-form-label text-center">ระดับการให้คะแนน</label>
                                                    </div>
                                                    <!--
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">คะแนน 0</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="kpi_master_standard_0" id="kpi_master_standard_0" required autocomplete="off">

                                                        </div>
                                                    </div>
-->
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">คะแนน 1</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control"
                                                                name="kpi_master_standard_1" id="kpi_master_standard_1"
                                                                required autocomplete="off">

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">คะแนน 2</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control"
                                                                name="kpi_masterl_standard_2" id="kpi_master_standard_2"
                                                                required autocomplete="off">

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">คะแนน 3</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control"
                                                                name="kpi_master_standard_3" id="kpi_master_standard_3"
                                                                required autocomplete="off">

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">คะแนน 4</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control"
                                                                name="kpi_master_standard_4" id="kpi_master_standard_4"
                                                                required autocomplete="off">

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">คะแนน 5</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control"
                                                                name="kpi_master_standard_5" id="kpi_master_standard_5"
                                                                required autocomplete="off">

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Status </label>
                                                        <div class="col-sm-9">
                                                            <select name="kpi_master_status" class="form-control"
                                                                required>
                                                                <option value="Y">ใช้งาน</option>
                                                                <option value="N">ปิดการใช้งาน</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3"></label>
                                                        <div class="col-sm-9">
                                                            <input type="submit" class="btn btn-primary m-b-0"
                                                                value="Save">
                                                        </div>
                                                    </div>
                                                    <input type="hidden" class="form-control form-control-normal"
                                                        name="Mode" value="addKpihospital">
                                                    <input type="hidden" class="form-control form-control-normal"
                                                        name="in_type" id="in_type">

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="modal_add_comment" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true" style="top: 100px;">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header pt-2 pb-2 btnh_primary">
                                                    <h5 class="modal-title" id="exampleModalLabel">เลือก KPI จากคลัง
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card-block" id="contents">
                                                        <form class="md-float-material" action="../class/sql-insert.php"
                                                            method="post">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="card" style="margin-bottom: 0px;">
                                                                        <div class="card-block">

                                                                            <div class="form-group row">

                                                                                <div class="col-sm-12">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="assessment_time_code"
                                                                                        id="assessment_time_code"
                                                                                        value="<?php echo cut(TokenVerify($_GET['key'], $secret))?>"
                                                                                        required readonly>

                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <select id='custom-headers'
                                                                                        name="kpi_master_id[]"
                                                                                        class="searchable staff_codes"
                                                                                        multiple='multiple'>
                                                                                        <?php 
                                                                $valuei="select *
                                                             from tb_kpi_master WHERE kpi_master_status = 'Y' GROUP BY kpi_master_name";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                                                        <option
                                                                                            value="<?php echo $r['kpi_master_id']?>">
                                                                                            <?php echo $r['kpi_master_name']?>
                                                                                        </option>
                                                                                        <?php }?>
                                                                                    </select>

                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                            <div class="form-group row">
                                                                                <div class="col-3"></div>
                                                                                <div class="col-5">
                                                                                    <button type="submit" name="addTime"
                                                                                        class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">บันทึกข้อมูล</button>
                                                                                    <input type="hidden"
                                                                                        class="form-control form-control-normal"
                                                                                        name="Mode"
                                                                                        value="addKpihospitalSelect">

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
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
    <script src="../files/bower_components/select2/js/select2.full.min.js"></script>
    <!-- Multiselect js -->
    <script src="../files/bower_components/bootstrap-multiselect/js/bootstrap-multiselect.js">
    </script>
    <script src="../files/bower_components/multiselect/js/jquery.multi-select.js"></script>
    <script src="../files/assets/js/jquery.quicksearch.js"></script>
    <!-- Custom js -->
    <script src="../files/assets/pages/advance-elements/select2-custom.js"></script>
    <script type="text/javascript" src="../files/new/jquery-ui.1.12.1.min.js"></script>
</body>
<script>
function ChangeTheValue(id) {

    $.ajax({
        url: "../class/sql-insert.php",
        global: false,
        type: "POST",
        data: ({
            id: id,
            weightCh: $("#w" + id).val(),
            Mode: "ChangeTheValue"
        }),
        dataType: "JSON",
        async: false,
        success: function(jd) {

        }
    });
    var sumValue = 0;
    $.each($('input[name="kpi_master_weights[]"]'), function(i, v) {
        if (parseInt(v.value) >= 0) sumValue += parseInt(v.value)
    })
    $("#SUMkpi_master_weight").empty().append(sumValue);
    if (sumValue == 100) {
        document.getElementById("p1").style.backgroundColor = "#FFFFFF";
    } else {
        document.getElementById("p1").style.backgroundColor = "#ff1919";
    }
}

function ChangeTheValuetarget(id) {

    $.ajax({
        url: "../class/sql-insert.php",
        global: false,
        type: "POST",
        data: ({
            id: id,
            targetCh: $("#T" + id).val(),
            Mode: "ChangeTheValuetarget"
        }),
        dataType: "JSON",
        async: false,
        success: function(jd) {

        }
    });
}

function ChangeTheValues(id, type) {

    $.ajax({
        url: "../class/sql-insert.php",
        global: false,
        type: "POST",
        data: ({
            id: id,
            targetCh: $("#B" + type + id).val(),
            Mode: "ChangeTheValues",
            type: type
        }),
        dataType: "JSON",
        async: false,
        success: function(jd) {

        }
    });
}

function allea() {

    alert("หน้ำหนักของ KPI รวมกันทุกตัวในชุดประเมิน ควรเป็น 100 %");
}

function openit() {

    $("#modal_add_comment").modal("show");
}

$("#kpi_master_name").autocomplete({
    minLength: 0,

    source: function(request, response) {
        $.ajax({
            url: "../class/class.php",
            data: {
                id: request.term,
                Mode: "getKpi_master_Li",
                factor: $("#kpi_type_id").val(),
            },
            type: "POST",
            dataType: "json",
            success: function(data) {
                response(data);
            },
        });
    },
    select: function(event, ui) {


        //            document.getElementById('kpi_master_name').value = ui.item.id;
        document.getElementById('kpi_master_weight').value = ui.item.in_weight;
        document.getElementById('kpi_master_target').value = ui.item.in_target;
        //document.getElementById('kpi_master_standard_0').value = ui.item.in_standard_0;
        document.getElementById('kpi_master_standard_1').value = ui.item.in_standard_1;
        document.getElementById('kpi_master_standard_2').value = ui.item.in_standard_2;
        document.getElementById('kpi_master_standard_3').value = ui.item.in_standard_3;
        document.getElementById('kpi_master_standard_4').value = ui.item.in_standard_4;
        document.getElementById('kpi_master_standard_5').value = ui.item.in_standard_5;
        document.getElementById('in_type').value = ui.item.in_type;
        console.log(ui.item.id);
        console.log(ui.item.label);
        console.log(ui.item.value);


    }

});
</script>

</html>