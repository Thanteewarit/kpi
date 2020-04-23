<?php $page="admin"; $ac="Organization"; session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("inc-header.php")?>
    <!-- Favicon icon -->
    <link rel="icon" href="../files/assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../files/bower_components/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="../files/assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="../files/assets/icon/icofont/css/icofont.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="../files/assets/icon/font-awesome/css/font-awesome.min.css">
    <!-- Treeview css -->
    <link rel="stylesheet" type="text/css" href="../files/bower_components/jstree/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="../files/assets/pages/treeview/treeview.css">
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
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="page-header">
                                                        <div class="card-block">

                                                            <ul class="breadcrumb-title  p-t-10">
                                                                <li class="breadcrumb-item">
                                                                    <a href="index.html"> <i class="fa fa-home"></i> </a>
                                                                </li>
                                                                <li class="breadcrumb-item"><a href="#!">ข้อมูลพนักงาน</a>
                                                                </li>
                                                                <li class="breadcrumb-item"><a href="org-chartN.php">organization chart แนวนอน</a>
                                                                </li>
                                                                <li class="breadcrumb-item"><a href="org-chart.php">organization chart แนวตั้ง</a>
                                                                </li>
                                                            </ul>
                                                            <!--
                                                            <div class="text-right">
                                                                <button type="button" class="btn btn-warning btn-outline-warning waves-effect md-trigger" data-modal="modal-15">Add Division Manager Sub</button>
                                                            </div>
-->
                                                        </div>
                                                        <hr style="width: 95%;">

                                                    </div>
                                                    <div class="card-block">
                                                        <div class="card-block tree-view">
                                                            <div id="basicTree">
                                                                <ul> 
<!--                                                                    <li data-jstree='{"opened":true}'>-->
                                                                    <?php 
                                                                            $valuei="select * from tb_hospital_director_assistant WHERE hospital_id = '".$_SESSION["hospitaLslevel1"]."' ";
                                                                            foreach(c_scelectS($valuei) AS $key2 => $r2){ ?>
                                                                    <li  onclick="(<?php echo $r2['director_assistant_Name']?>)"><font size="3" color="red">[ ชั้นที่ 1 : <?php echo $r2['director_assistant_id']?> ]</font>   <?php echo $r2['director_assistant_Name']?>
                                                                        <ul>
                                                                            <?php 
                                                                            $valuei="select * from tb_division_director Where director_assistant_id = '".$r2['director_assistant_id']."' ";
                                                                            foreach(c_scelectS($valuei) AS $key3 => $r3){ ?>
                                                                            <li ><font size="3" color="red">[ ชั้นที่ 2 : <?php echo $r3['division_director_id']?> ] </font>  <?php echo $r3['division_director_Name']?>
                                                                                <ul>
                                                                                    <?php 
                                                                            $valuei="select * 
                                                                            from tb_division_manager_head 
                                                                            Where director_assistant_id = '".$r2['director_assistant_id']."' 
                                                                            AND  division_director_id = '".$r3['division_director_id']."' ";
                                                                            foreach(c_scelectS($valuei) AS $key4 => $r4){ ?>
                                                                                    <li ><font size="3" color="red"> [ ชั้นที่ 3 : <?php echo $r4['division_manager_head_id']?> ]</font>   <?php echo $r4['division_manager_head_Name']?>
                                                                                        <ul>
                                                                                            <?php 
                                                                            $valuei="select * 
                                                                            from tb_division_manager_sub 
                                                                            Where director_assistant_id = '".$r2['director_assistant_id']."' 
                                                                            AND  division_director_id = '".$r3['division_director_id']."'
                                                                            AND division_manager_head_id = '".$r4['division_manager_head_id']."' ";
                                                                            foreach(c_scelectS($valuei) AS $key5 => $r5){ ?>
                                                                                            <li ><font size="3" color="red"> [ ชั้นที่ 4 : <?php echo $r5['division_manager_sub_id']?> ] </font>  <?php echo $r5['division_manager_sub_Name']?>
                                                                                                <ul>
                                                                                                    <?php 
                                                                            $valuei="select * 
                                                                            from tb_depatment_head 
                                                                            Where director_assistant_id = '".$r2['director_assistant_id']."' 
                                                                            AND  division_director_id = '".$r3['division_director_id']."'
                                                                            AND division_manager_head_id = '".$r4['division_manager_head_id']."'
                                                                            AND division_manager_sub_id = '".$r5['division_manager_sub_id']."' ";
                                                                            foreach(c_scelectS($valuei) AS $key6 => $r6){ ?>
                                                                                                    <li ><font size="3" color="red"> [ ชั้นที่ 5 : <?php echo $r6['depatment_head_id']?> ] </font> : <?php echo $r6['depatment_head_Name']?>
                                                                                                        <!--
                                                                                                                <ul>
                                                                                                                    <li data-jstree='{"type":"file"}'>XX</li>

                                                                                                                </ul>
-->
                                                                                                    </li>
                                                                                                    <?php } ?>

                                                                                                </ul>
                                                                                            </li>
                                                                                            <?php } ?>

                                                                                        </ul>
                                                                                    </li>

                                                                                    <?php } ?>
                                                                                </ul>
                                                                            </li>
                                                                            <?php } ?>
                                                                        </ul>
                                                                    </li>
                                                                    <?php }?>
                                                                </ul>
                                                            </div>
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

    </div>
    <script src="../files/bower_components/jquery/js/jquery.min.js"></script>
    <script src="../files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script src="../files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script src="../files/bower_components/popper.js/js/popper.min.js"></script>
    <script src="../files/bower_components/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script src="../files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script src="../files/bower_components/modernizr/js/modernizr.js"></script>
    <script src="../files/bower_components/modernizr/js/css-scrollbars.js"></script>
    <!-- Tree view js -->
    <script src="../files/bower_components/jstree/js/jstree.min.js"></script>
    <script src="../files/assets/pages/treeview/jquery.tree.js"></script>
    <script src="../files/assets/js/pcoded.min.js"></script>
    <script src="../files/assets/js/vertical/vertical-layout.min.js"></script>
    <script src="../files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Custom js -->
    <script src="../files/assets/js/script.js"></script>
    <script>
        function getDate(id) {
            alert(id);
            //            $("#division_director_id").html("");
            //            $.ajax({
            //                url: "../class/class.php",
            //                global: false,
            //                type: "POST",
            //                data: ({
            //                    id: $("#director_assistant_id").val() ,
            //                    Mode: "getDivisionDirector"
            //                }),
            //                dataType: "JSON",
            //                async: false,
            //                success: function(jd) {
            //                    $.each(jd, function(key, val) {
            //                        
            //                        var opt='<option value="" selected="selected">---Please select Division director---</option>';
            //				        $.each(jd, function(key, val){
            //				            opt +="<option value='"+ val["division_director_id"] +"'>"+val["division_director_Name"]+"</option>";
            //    				    });
            //				        $("#division_director_id").html( opt );
            //                    });
            //                }
            //            });
        }
    </script>
</body>

</html>