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
    <link href="orgChart/jquery.orgchart.css" media="all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../files/assets/css/jquery.mCustomScrollbar.css">
    <style type="text/css">
        #orgChart {
            width: auto;
            height: auto;
        }

        #orgChartContainer {
            width: 100%;
            height: 100%;
            overflow: auto;
            background: #eeeeee;
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
                                                        <div id="orgChartContainer">
                                                            <div id="orgChart"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    
                                        <div id="consoleOutput">
    </div>
                                    <div>
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
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <script  src="../files/bower_components/jquery/js/jquery.min.js"></script>
    <script  src="../files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script  src="../files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script  src="../files/bower_components/popper.js/js/popper.min.js"></script>
    <script  src="../files/bower_components/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script  src="../files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script  src="../files/bower_components/modernizr/js/modernizr.js"></script>
    <script  src="../files/bower_components/modernizr/js/css-scrollbars.js"></script>
    <!-- Tree view js -->
    <script  src="../files/bower_components/jstree/js/jstree.min.js"></script>
    <script  src="../files/assets/pages/treeview/jquery.tree.js"></script>
    <script src="../files/assets/js/pcoded.min.js"></script>
    <script src="../files/assets/js/vertical/vertical-layout.min.js"></script>
    <script src="../files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Custom js -->
    <script  src="../files/assets/js/script.js"></script>
    
    <script>
        function getDate() {
            alert("id");
        }
    </script>
<!--    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>-->
    <script type="text/javascript" src="orgChart/jquery.orgchart.js"></script>
    <script type="text/javascript">
        <?php 
        $valuei = "select * from tb_hospital where hospital_id = '".$_SESSION["hospitaLslevel1"]."' and hospital_id = '".$_SESSION["hospitaLslevel1"]."'";
        $arr=c_scelectOne($valuei);
        ?>
    var testData = [
        {id: 'A1', name: '<?php echo $arr['hospital_NameTh']?> ', parent: '0'},
        <?php 
        $a = 2 ;
        $valuei="select * from tb_hospital_director_assistant WHERE hospital_id = '".$_SESSION["hospitaLslevel1"]."' ORDER BY director_assistant_id ASC";
        foreach(c_scelectS($valuei) AS $key2 => $r2){ ?>
        {id: 'A<?php echo $a;?>', name: '<?php echo $r2['director_assistant_Name']?>', parent:'A1'},
        <?php 
            $b = 2;
            $valuei="select * from tb_division_director Where director_assistant_id = '".$r2['director_assistant_id']."'ORDER BY division_director_id ASC ";
            foreach(c_scelectS($valuei) AS $key3 => $r3){ ?>
            {id: 'B-<?php echo $b.$a;?>', name: '<?php echo $r3['division_director_Name']?>', parent:'A<?php echo $a;?>'},
                <?php
                $c = 2 ;
                 $valuei="select * 
                    from tb_division_manager_head 
                    Where director_assistant_id = '".$r2['director_assistant_id']."' 
                    AND  division_director_id = '".$r3['division_director_id']."' ";
                    foreach(c_scelectS($valuei) AS $key4 => $r4){ ?>
                    {id: 'C<?php echo $c.$b.$a;?>', name: '<?php echo $r4['division_manager_head_Name']?>', parent:'B-<?php echo $b.$a;?>'},
        
                        <?php 
                        $valuei="select * 
                        from tb_division_manager_sub 
                        Where director_assistant_id = '".$r2['director_assistant_id']."' 
                        AND  division_director_id = '".$r3['division_director_id']."'
                        AND division_manager_head_id = '".$r4['division_manager_head_id']."' ";
                        foreach(c_scelectS($valuei) AS $key5 => $r5){ ?>
                        {id: 'D<?php echo $d.$c.$b.$a;?>', name: '<?php echo $r5['division_manager_sub_Name']?>', parent:'C<?php echo $c.$b.$a;?>'},
                                <?php 
                                $valuei="select * 
                                from tb_depatment_head 
                                Where director_assistant_id = '".$r2['director_assistant_id']."' 
                                AND  division_director_id = '".$r3['division_director_id']."'
                                AND division_manager_head_id = '".$r4['division_manager_head_id']."'
                                AND division_manager_sub_id = '".$r5['division_manager_sub_id']."' ";
                                foreach(c_scelectS($valuei) AS $key6 => $r6){ ?>
                                {id: 'E<?php echo $e.$d.$c.$b.$a;?>', name: '<?php echo $r6['depatment_head_Name']?>', parent:'D<?php echo $d.$c.$b.$a;?>'},
                                <?php $e++; }?>
        
                        <?php $d++; }?>
        
                <?php $c++; }?>
                                        
            <?php $b++; } ?>
        
        <?php $a++; } ?>
//        {id: 2, name: 'A N:1 = 1 ', parent: 1},
//        {id: 3, name: 'A N:1 = 2 ', parent: 1},
//        {id: 4, name: 'A N:1/1 ', parent: 2},
//        {id: 5, name: 'A N:1/2', parent: 2},
//        {id: 6, name: 'A N:2/2', parent: 3},
//        {id: 7, name: 'A N:1:2:1', parent: 4},
        
    ];
    $(function(){
        org_chart = $('#orgChart').orgChart({
            data: testData,
            showControls: true,
            allowEdit: true,
            onAddNode: function(node){ 
                log('Created new node on node '+node.data.id+' parent '+node.data.parent);
                org_chart.newNode(node.data.id); 
            },
            onDeleteNode: function(node){
                log('Deleted node '+node.data.id);
                org_chart.deleteNode(node.data.id); 
            },
            onClickNode: function(node){
                log('Clicked node '+node.data.id);
            }

        });
    });

    // just for example purpose
    function log(text){
        $('#consoleOutput').append('<p>'+text+'</p>')
    }
    </script><script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
    

</html>