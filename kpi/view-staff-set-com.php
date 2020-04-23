<?php $page=""; $ac=""; session_start();?>
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
                                                                        href="hospitals-kpi-list.php">Add competency</a>
                                                                <li class="breadcrumb-item">List competency
                                                                </li>
                                                            </ul>
                                                            <div class="text-right">
                                                                <!-- <button type="button"
                                                                    class="btn btn-warning btn-outline-warning waves-effect md-trigger"
                                                                    data-modal="modal-15">Add competency</button> -->
                                                                <!--                                                                <button type="button" class="btn btn-warning  waves-effect" onclick="openit()">เลือก Competency ที่มีอยู่</button>-->
                                                            </div>
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
                                                                        <th>Codes KPI</th>
                                                                        <th>KPI Name</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php 
                                                            $valuei="
                                                            SELECT *
                                                            FROM tb_evaluation_competency_all AS r1
                                                            JOIN tb_competency_master AS r2 ON r1.competency_master_id = r2.competency_master_id
                                                            JOIN tb_assessment_time AS r3 ON r3.assessment_time_code = r1.evaluation_competency_code
                                                            JOIN tb_kpi_type AS r4 ON r4.kpi_type_id = r2.kpi_type_id
                                                            WHERE r1.evaluation_competency_all_staff= '".$_GET['id']."'
                                                            AND r1.evaluation_competency_all_year = '".date("Y")."'
                                                            AND r1.evaluation_competency_code ='".cut(TokenVerify($_GET['key'], $secret))."'
                                                            ";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                                    <tr>
                                                                        <td><?php echo $r['kpi_type_name'];?></td>
                                                                        <td><?php echo $r['assessment_time_code']?></td>
                                                                        <td><?php echo $r['competency_master_name']?>
                                                                        </td>
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
                                            <h3>Add competency</h3>


                                            <div class="card-block" id="contents">
                                                <form method="post" action="../class/sql-insert.php">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Codes competency</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control"
                                                                name="assessment_time_code" id="assessment_time_code"
                                                                value="<?php echo cut(TokenVerify($_GET['key'], $secret))?>"
                                                                required readonly>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Type competency</label>
                                                        <div class="col-sm-9">
                                                            <select name="kpi_type_id" id="kpi_type_id"
                                                                class="form-control" required>
                                                                <option value="" selected="selected">---Please select
                                                                    ---</option>
                                                                <?php 
                                                                $valuei="select * from tb_kpi_type WHERE kpi_type_status = 'Y' AND kpi_types = '2' ";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                                <option value="<?php echo $r['kpi_type_id'];?>">
                                                                    <?php echo $r['kpi_type_name'];?>
                                                                    <?php } ?>

                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">competency Name</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control"
                                                                name="competency_master_name"
                                                                id="competency_master_name" required autocomplete="off">

                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Weight</label>
                                                        <div class="col-sm-9">
                                                            <input type="number" class="form-control"
                                                                name="competency_master_weight"
                                                                id="competency_master_weight" required
                                                                autocomplete="off">

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">ค่าคาดหวัง </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control"
                                                                name="competency_master_target"
                                                                id="competency_master_target" required
                                                                autocomplete="off">

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">ตัวอย่าง</label>
                                                        <div class="col-sm-9">
                                                            <textarea name="competency_master_example"
                                                                id="competency_master_example" rows="6"
                                                                cols="52"></textarea>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Status </label>
                                                        <div class="col-sm-9">
                                                            <select name="competency_master_status"
                                                                id="competency_master_status" class="form-control"
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
                                                        name="Mode" value="addCompetencyList">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="modal_add_comment" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true" style="top: 100px;">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header pt-2 pb-2 btnh_primary">
                                                    <h5 class="modal-title" id="exampleModalLabel">เลือก competency
                                                        จากคลัง</h5>
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
                                                                                        name="competency_master_id[]"
                                                                                        class="searchable staff_codes"
                                                                                        multiple='multiple'>
                                                                                        <?php 
    $valuei="SELECT * FROM tb_assessment_time WHERE assessment_time_code = '".cut(TokenVerify($_GET['key'], $secret))."'";
    $arr=c_scelectOne($valuei);
    $assessment_time_type = $arr['assessment_time_type'];
                                                                $valuei="select *
                                                             from tb_competency_master WHERE 
                                                             competency_master_type='$assessment_time_type' 
                                                             AND  competency_master_status = 'Y' GROUP BY competency_master_name";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                                                        <option
                                                                                            value="<?php echo $r['competency_master_id']?>">
                                                                                            <?php echo $r['competency_master_name']?>
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
                                                                                        class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">บันทึกข้อมูล
                                                                                    </button>
                                                                                    <input type="hidden"
                                                                                        class="form-control form-control-normal"
                                                                                        name="Mode"
                                                                                        value="addCompetencyhospitalSelect">

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
                                    <div class="modal fade" id="adddetile" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true" style="top: 100px;">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header pt-2 pb-2 btnh_primary">
                                                    <h5 class="modal-title" id="exampleModalLabel">คำอธิบาย</h5>
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
                                                                                        class="form-control" id="ccksss"
                                                                                        value="" required readonly>
                                                                                    <input type="hidden"
                                                                                        class="form-control"
                                                                                        name="competency_master_id"
                                                                                        id="competency_master_id"
                                                                                        required readonly>

                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <textarea
                                                                                        name="competency_master_example"
                                                                                        id="cckss">
                                                                                    </textarea>
                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                            <div class="form-group row">
                                                                                <div class="col-3"></div>
                                                                                <div class="col-5">
                                                                                    <button type="submit" name="addTime"
                                                                                        class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">บันทึกข้อมูล
                                                                                    </button>
                                                                                    <input type="hidden"
                                                                                        class="form-control form-control-normal"
                                                                                        name="Mode"
                                                                                        value="edit_example">

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
    <script src="../files/assets/pages/ckeditor/ckeditor.js"></script>


</body>
<script>
function getDate() {
    $("#division_director_id").html("");
    $("#division_manager_head_id").html("");
    $("#division_manager_sub_Name").val("");
    $.ajax({
        url: "../class/class.php",
        global: false,
        type: "POST",
        data: ({
            id: $("#director_assistant_id").val(),
            Mode: "getDivisionDirector"
        }),
        dataType: "JSON",
        async: false,
        success: function(jd) {
            $.each(jd, function(key, val) {

                var opt =
                    '<option value="" selected="selected">---Please select Division director---</option>';
                $.each(jd, function(key, val) {
                    opt += "<option value='" + val["division_director_id"] + "'>" + val[
                        "division_director_Name"] + "</option>";
                });
                $("#division_director_id").html(opt);
            });
        }
    });
}

function getDate2() {
    $("#division_manager_head_id").html("");
    $("#division_manager_sub_Name").val("");
    $.ajax({
        url: "../class/class.php",
        global: false,
        type: "POST",
        data: ({
            director_assistant_id: $("#director_assistant_id").val(),
            division_director_id: $("#division_director_id").val(),
            Mode: "getDivisionManagerSub"
        }),
        dataType: "JSON",
        async: false,
        success: function(jd) {
            $.each(jd, function(key, val) {

                var opt =
                    '<option value="" selected="selected">---Please select Division director---</option>';
                $.each(jd, function(key, val) {
                    opt += "<option value='" + val["division_manager_head_id"] + "'>" + val[
                        "division_manager_head_Name"] + "</option>";
                });
                $("#division_manager_head_id").html(opt);
            });
        }
    });
}

function openit() {

    $("#modal_add_comment").modal("show");
}
CKEDITOR.replace('competency_master_example');
CKEDITOR.replace('cckss');

function adddetile(id) {



    $("#adddetile").modal("show");

    $.ajax({
        url: "../class/class.php",
        global: false,
        type: "POST",
        data: ({
            id: id,
            Mode: "get_master"
        }),
        dataType: "JSON",
        async: false,
        success: function(jd) {
            $.each(jd, function(key, val) {

                document.getElementById("ccksss").value = val["name"];
                document.getElementById("competency_master_id").value = id;
                CKEDITOR.instances.cckss.setData(val["example"]);

            });
        }
    });
}

function ChangeTheValue(id) {
    console.log(id);

    $.ajax({
        url: "../class/sql-insert.php",
        global: false,
        type: "POST",
        data: ({
            id: id,
            weightCh: $("#w" + id).val(),
            Mode: "ChangeTheValueCom"
        }),
        dataType: "JSON",
        async: false,
        success: function(jd) {

        }
    });
    var sumValue = 0;
    $.each($('input[name="competency_master_weights[]"]'), function(i, v) {
        if (parseInt(v.value) >= 0) sumValue += parseInt(v.value)
    })
    $("#SUMcompetency_master_weights").empty().append(sumValue);
    //                    CKEDITOR.instances.cckss.setData(val["example"]);
    if (sumValue == 100) {
        document.getElementById("p1").style.backgroundColor = "#FFFFFF";
    } else {
        document.getElementById("p1").style.backgroundColor = "#ff1919";
    }
}

function ChangeTheValueb(id) {
    console.log(id);

    $.ajax({
        url: "../class/sql-insert.php",
        global: false,
        type: "POST",
        data: ({
            id: id,
            weightCh: $("#b" + id).val(),
            Mode: "ChangeTheValueTarget"
        }),
        dataType: "JSON",
        async: false,
        success: function(jd) {

        }
    });
}
$("#competency_master_name").autocomplete({
    minLength: 0,

    source: function(request, response) {
        $.ajax({
            url: "../class/class.php",
            data: {
                id: request.term,
                Mode: "getCom_master_Li",
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


        document.getElementById('competency_master_weight').value = ui.item.competency_master_in_weight;
        document.getElementById('competency_master_name').value = ui.item.competency_master_name;
        document.getElementById('competency_master_target').value = ui.item.competency_master_in_target;
        document.getElementById('competency_master_status').value = ui.item.competency_master_in_status;
        //document.getElementById('competency_master_example').value = ui.item.competency_master_in_example;
        //$('#competency_master_example').summernote('code',ui.item.competency_master_in_example);
        CKEDITOR.instances.competency_master_example.setData(ui.item.competency_master_in_example);

        console.log(ui.item.id);
        console.log(ui.item.label);
        console.log(ui.item.value);


    }

});
</script>

</html>