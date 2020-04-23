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
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="../files/assets/css/style.css">
</head>

<body class="fix-menu" onload="myFunction()">
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <!-- Pre-loader end -->

    <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="login-card card-block auth-body mr-auto ml-auto">
                        <form class="md-float-material" action="../class/sql-insert.php" method="post">

                            <div class="auth-box">
                                <div class="row text-center">
                                    <div class="col-12 text-center">
                                        <img src="../image/principalcapitallogo.png" alt="logo.png">
                                    </div>
                                </div>
                                <hr />
                                <br>
                                <div class="input-group">
                                <span class="text-inverse">ชื่อแบบประเมิน</span>
                                </div>
                                <div class="input-group">
                                    <input type="text" name="assessment_time_name" class="form-control color-class" placeholder="ระบุชื่อการประเมิน" maxlength="50">
                                </div>
                                <div class="input-group">
                                <span class="text-inverse">Code การประเมิน</span>
                                </div>
                                <div class="input-group">
                                    <input type="text" name="assessment_time_code" class="form-control" placeholder="201901-001" maxlength="10">
                                </div>
                                <div class="input-group">
                                <span class="text-inverse">วันที่เริ่มต้น</span>
                                </div>
                                <div class="input-group">
                                    <input type="date" name="assessment_time_start" class="form-control">
                                </div>
                                <div class="input-group">
                                <span class="text-inverse">วันที่สิ้นสุด</span>
                                </div>
                                <div class="input-group">
                                    <input type="date" name="assessment_time_end" class="form-control">
                                </div>

                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" name="addTime" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">เพิ่มการประเมิน</button>
                                        <input type="hidden" class="form-control form-control-normal" name="Mode" value="addTime">
                                    </div>
                                </div>
                                <div class="card-block">
                            <div class="row">
                                <div class="col-sm-12 col-xl-4 m-b-30">
                                    <input type="checkbox" class="js-single" checked />
                                </div>

                                <div class="col-sm-12 col-xl-4 m-b-30" hidden>
                                    <input type="checkbox" class="js-dynamic-state" checked />
                                    <button class="btn btn-primary js-dynamic-enable"></button>
                                    <button class="btn btn-inverse js-dynamic-disable m-t-10"></button>  

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <input type="checkbox" class="js-default" checked />
                                    <input type="checkbox" class="js-primary" checked />
                                    <input type="checkbox" class="js-success" checked />
                                    <input type="checkbox" class="js-info" checked />
                                    <input type="checkbox" class="js-warning" checked />
                                    <input type="checkbox" class="js-danger" checked />
                                    <input type="checkbox" class="js-inverse" checked />
                                </div>
                                <div class="col-sm-4">
                                    <input type="checkbox" class="js-large" checked />
                                    <input type="checkbox" class="js-medium" checked />
                                    <input type="checkbox" class="js-small" checked />
                                </div>
                            </div>
                        </div>
                                <hr />
                                <!--
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="text-inverse text-left m-b-0">Thank you and enjoy our website.</p>
                                        <p class="text-inverse text-left"><b>Your Authentication Team</b></p>
                                    </div>
                                    <div class="col-md-2">
                                        <img src="../files/assets/images/auth/Logo-small-bottom.png" alt="small-logo.png">
                                    </div>
                                </div>
-->

                            </div>
                        </form>
                        <!-- end of form -->
                    </div>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="../files/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="../files/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="../files/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="../files/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="../files/assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script src="../files/bower_components/jquery/js/jquery.min.js"></script>
    <script src="../files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script src="../files/bower_components/popper.js/js/popper.min.js"></script>
    <script src="../files/bower_components/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script src="../files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script src="../files/bower_components/modernizr/js/modernizr.js"></script>
    <script src="../files/bower_components/modernizr/js/css-scrollbars.js"></script>
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
    <script src="../files/assets/js/vertical/vertical-layout.min.js"></script>
    <script src="../files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../files/assets/js/script.js"></script>
</body>

</html>