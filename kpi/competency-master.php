<?php $page=""; $ac="competency-master"; session_start();?>
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
                                                        <li class="breadcrumb-item"><a href="#!">Competency Master</a>
                                                        </li>
                                                    </ul>

                                                    <div class="text-right">
                                                        <button type="button" class="btn btn-warning btn-outline-warning waves-effect md-trigger" data-modal="modal-15" onclick="ClearData()">Add Competency Master</button>
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
                                                                <th>Factor KPI</th>
                                                                <th>Groub type KPI</th>
                                                                <th>KPI Name</th>
                                                                <th>จัดการ</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                            $valuei="SELECT *
FROM tb_competency_master_in AS r1
JOIN tb_kpi_type AS r2 ON r1.competency_master_in_groub = r2.kpi_type_id
JOIN tb_type_code AS r3 On r1.competency_master_in_factor = r3.type_code_id
                                                            ";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                            <tr>
                                                                <td><?php echo $key+1;?></td>
                                                                <td><?php echo $r['type_code_name'];?></td>
                                                                <td><?php echo $r['kpi_type_name'];?></td>
                                                                <td><?php echo $r['competency_master_in_name'];?></td>

                                                                <td><a href="#" onclick="showDetails(<?php echo $r['competency_master_in_id']?>)"><button type="button" class="btn btn-primary btn-mini btn-outline-primary waves-effect md-trigger">แก้ไข</button></a></td>
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>

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
                                        <h3>Add Competency Master</h3>
                                        <div class="card-block" id="contents">
                                            <form method="post" action="../class/sql-insert.php">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Select Factor</label>
                                                    <div class="col-sm-9">
                                                        <select name="competency_master_in_factor" class="form-control" required>
                                                            <option value="" selected="selected">---Please select ---</option>
                                                            <?php 
                                                                $valuei="select * from tb_type_code WHERE type_code_status = 'Y' AND type_code_type = '2'";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                            <option value="<?php echo $r['type_code_id'];?>"> <?php echo $r['type_code_name'];?>
                                                                <?php } ?>

                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">GROUP KPI</label>
                                                    <div class="col-sm-9">
                                                        <select name="competency_master_in_groub" class="form-control" required>
                                                            <option value="" selected="selected">---Please select ---</option>
                                                            <?php 
                                                                $valuei="select * from tb_kpi_type WHERE kpi_type_status = 'Y' AND kpi_types = '2'";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                            <option value="<?php echo $r['kpi_type_id'];?>"> <?php echo $r['kpi_type_name'];?>
                                                                <?php } ?>

                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Competency Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="competency_master_in_name" required autocomplete="off">

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Competency Weight <span class="pcoded-badge label label-warning" onclick="allea()"><i class="fa fa-question warning"></i></span></label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control" name="competency_master_in_weight" autocomplete="off">

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Competency Target </label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control" name="competency_master_in_target" max="5" min="1" required autocomplete="off">

                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <textarea name="competency_master_in_example" id="competency_master_in_example" rows="6" cols="52"></textarea>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <input type="submit" class="btn btn-primary m-b-0" value="Save">
                                                    </div>
                                                </div>
                                                <input type="hidden" class="form-control form-control-normal" name="Mode" value="addMasteCompetency">

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="showDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="width: 90%;">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header pt-2 pb-2 btnh_primary">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Competency Master</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="md-content">

                                                   <div class="card-block" id="contents">
                                            <form method="post" action="../class/sql-insert.php">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Select Factor</label>
                                                    <div class="col-sm-10">
                                                        <select name="competency_master_in_factor" id="competency_master_in_factor" class="form-control" required>
                                                            <option value="" selected="selected">---Please select ---</option>
                                                            <?php 
                                                                $valuei="select * from tb_type_code WHERE type_code_status = 'Y' AND type_code_type = '2'";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                            <option value="<?php echo $r['type_code_id'];?>"> <?php echo $r['type_code_name'];?>
                                                                <?php } ?>

                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">GROUP </label>
                                                    <div class="col-sm-10">
                                                        <select name="competency_master_in_groub" id="competency_master_in_groub" class="form-control" required>
                                                            <option value="" selected="selected">---Please select ---</option>
                                                            <?php 
                                                                $valuei="select * from tb_kpi_type WHERE kpi_type_status = 'Y' AND kpi_types = '2'";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                            <option value="<?php echo $r['kpi_type_id'];?>"> <?php echo $r['kpi_type_name'];?>
                                                                <?php } ?>

                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="competency_master_in_name" id="competency_master_in_name" required autocomplete="off">

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Weight <span class="pcoded-badge label label-warning" onclick="allea()"><i class="fa fa-question warning"></i></span></label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" name="competency_master_in_weight" id="competency_master_in_weight" autocomplete="off">

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Target </label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" name="competency_master_in_target" id="competency_master_in_target" required autocomplete="off">

                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <textarea name="competency_master_in_example" id="cckss"></textarea>

                                                    </div>
                                                </div>
                                                 <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Status </label>
                                                        <div class="col-sm-9">
                                                            <select name="competency_master_in_status" id="competency_master_in_status" class="form-control" required>
                                                                <option value="Y">ใช้งาน</option>
                                                                <option value="N">ปิดการใช้งาน</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <input type="submit" class="btn btn-primary m-b-0" value="Save">
                                                    </div>
                                                </div>
                                                <input type="hidden" class="form-control form-control-normal" name="Mode" value="editMasteCompetency">
                                                <input type="hidden"  name="competency_master_in_id" id="competency_master_in_id">

                                            </form>
                                        </div>
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

    <script src="../files/assets/js/pcoded.min.js"></script>
    <script src="../files/assets/pages/ckeditor/ckeditor.js"></script>





</body>
<script>
    CKEDITOR.replace('competency_master_in_example');
    CKEDITOR.replace('cckss');
    
    function showDetails(id) {

        $("#showDetails").modal("show");
        
        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                id: id,
                Mode: "getcompetency_master_in"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {
                    
                    $("#competency_master_in_id").val(val["competency_master_in_id"]);
                    $("#competency_master_in_groub").val(val["competency_master_in_groub"]);
                    $("#competency_master_in_factor").val(val["competency_master_in_factor"]);
                    $("#competency_master_in_name").val(val["competency_master_in_name"]);
                    $("#competency_master_in_weight").val(val["competency_master_in_weight"]);
                    $("#competency_master_in_target").val(val["competency_master_in_target"]);
                    $("#competency_master_in_example").val(val["competency_master_in_example"]);
                    $("#competency_master_in_status").val(val["competency_master_in_status"]);
                    CKEDITOR.instances.cckss.setData(val["competency_master_in_example"]);
                    

                });
            }
        });



    }
</script>

</html>