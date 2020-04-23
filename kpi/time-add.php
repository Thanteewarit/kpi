<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("inc-header.php"); session_start();?>
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
<script type="text/javascript">
    function myFunction() {

        var tablea = '';
        if (screen.width < 800) {
            tablea = 'id="new-cons" class="table table-striped table-bordered nowrap"';
        } else {
            tablea = 'class="table table-bordered"';
        }
        var jsonObj = {
            'Mode': 'Set',
            'x': tablea
        }

        $.ajax({
            type: "POST",
            url: "ck.php",
            data: jsonObj,
            success: function(result) {

            }
        });

    }
</script>
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
                                <div class="row m-t-25 text-left">
                                    <div class="col-12">
                                        <!--
                                        <div class="checkbox-fade fade-in-primary d-">
                                            <label>
                                                <input type="checkbox" value="">
                                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                <span class="text-inverse">Remember me</span>
                                            </label>
                                        </div>
-->
                                        <div class="forgot-phone text-left f-left">
                                            <a href="auth-reset-password.html" class="text-right f-w-600 text-inverse">กรุณาเลือกเวลาการประเมิน</a>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="input-group">
                                    <?php  
                                    $year = date("Y");
                                    ?>
                                    <select name="month" class="form-control form-control-primary">
                                        <option value="">เลือกเวลาการประเมิน</option>
                                        <?php  
                                        $valuei="SELECT * FROM tb_evaluation
                                        WHERE evaluation_year = '$year'
                                        GROUP BY evaluation_month
                                       
                                        ";
                                        foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                                
                                        <option value="<?php echo $r['evaluation_year']."-".$r['evaluation_month']?>"><?php echo $r['evaluation_year']?>-<?php echo $r['evaluation_month']?></option>
                                        <?php } ?>
                                                                
                                    </select>
                                </div>
                                
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">เลือกเวลา</button>
                                        <input type="hidden" name="Mode" value="addCodeTime">
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
    <!-- i18next.min.js -->
    <script src="../files/bower_components/i18next/js/i18next.min.js"></script>
    <script src="../files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
    <script src="../files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
    <script src="../files/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
    <script src="../files/assets/js/common-pages.js"></script>
</body>

</html>