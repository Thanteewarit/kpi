<?php //if(!isset($_SESSION["ModeTable"])){ echo "<script>alert('กรุณาเข้าสู่ระบบ');window.location.href = 'index.php';</script>"; }
?>
<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <ul class="pcoded-item pcoded-left-item">
            <li class=" ">
                <a href="time-add.php">
                    <span class="pcoded-micon"><i class="ti-time"></i><b>N</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.navigate.main">Time of Evaluate</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <ul class="pcoded-item pcoded-left-item">
            <li class="<?php if ($ac == "job") {
                            echo "active";
                        } ?>">
                <a href="kpi-hospitals.php">
                    <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.navigate.main">My KPIs</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="<?php if ($ac == "download") {
                            echo "active";
                        } ?>">
                <a href="download.php">
                    <span class="pcoded-micon"><i class="ti-bag"></i><b>N</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.navigate.main">Download</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <?php if($_SESSION['head']=="Y"){ ?>
        <div class="pcoded-navigation-label">Evaluation</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="<?php if ($ac == "list-job-kpi-new") {
                            echo "active";
                        } ?>">
                <a href="list-job-kpi-new.php">
                    <span class="pcoded-micon"><i class="ti-bag"></i><b>N</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.navigate.main">Evaluate</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

        </ul>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext">In put data</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php if ($ac == "hospitals") {
                                    echo "active";
                                } ?>">
                        <a href="list-hospitals-kpi.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">Hospitals KPI</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if ($ac == "department-all") {
                                    echo "active";
                                } ?>">
                        <a href="list-department-kpi.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">Department KPI</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>

                </ul>
            </li>
  
        </ul>
        <?php } ?>
        <?php if ($_SESSION['ma']['ma_8'] == "Y") { ?>
        <div class="pcoded-navigation-label">ดาวน์โหลด</div>
        <ul class="pcoded-item pcoded-left-item">
            
            <li class="<?php if ($ac == "download-add") {
                            echo "active";
                        } ?>">
                <a href="download-add.php">
                    <span class="pcoded-micon"><i class="ti-bag"></i><b>N</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.navigate.main">Add file Download</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
                    
        </ul>
        <?php }?>
        <?php if ($_SESSION['ma']['ma_2'] == "Y") { ?>

        <div class="pcoded-navigation-label">Admin</div>
        <ul class="pcoded-item pcoded-left-item">
            
            <li class="pcoded-hasmenu <?php if ($page == "admin") {
                                                echo "active pcoded-trigger";
                                            } ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext">Hospitals Data</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php if ($ac == "Organization") {
                                        echo "active";
                                    } ?>">
                        <a href="org-chartN.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">Organization Chart</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if ($ac == "list") {
                                        echo "active";
                                    } ?>">
                        <a href="hospital-list.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">รายชื่อโรงพยาบาล</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if ($ac == "hospital_director_assistant") {
                                        echo "active";
                                    } ?>">
                        <a href="hospital_director_assistant.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">ชั้นที่ 1</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if ($ac == "division_director") {
                                        echo "active";
                                    } ?>">
                        <a href="division_director.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">ชั้นที่ 2</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if ($ac == "division_manager_head") {
                                        echo "active";
                                    } ?>">
                        <a href="division_manager_head.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">ชั้นที่ 3</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if ($ac == "division_manager_sub") {
                                        echo "active";
                                    } ?>">
                        <a href="division_manager_sub.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">ชั้นที่ 4</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if ($ac == "depatment_head") {
                                        echo "active";
                                    } ?>">
                        <a href="depatment_head.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">ชั้นที่ 5</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if ($ac == "add-level-position") {
                                        echo "active";
                                    } ?>">
                        <a href="add-level-position.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">ตำแหน่งงาน</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
            <?php if ($_SESSION['ma']['ma_3'] == "Y") { ?>
            <li class="pcoded-hasmenu <?php if ($page == "Staff") {
                                                echo "active pcoded-trigger";
                                            } ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext">Employee Data</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php if ($ac == "staff-list") {
                                        echo "active";
                                    } ?>">
                        <a href="staff-list.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">Employee Data</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if ($ac == "staff-list-head") {
                                        echo "active";
                                    } ?>">
                        <a href="staff-list-head.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">Employee Data-Head</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if ($ac == "staff-password") {
                                        echo "active";
                                    } ?>">
                        <a href="staff-editpass.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">Employee Password</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="pcoded-hasmenu <?php if ($page == "Weight") {
                                                echo "active pcoded-trigger";
                                            } ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext">Evaluation Weight</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php if ($ac == "staff-list") {
                                        echo "active";
                                    } ?>">
                        <a href="evaluation-weight.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">Evaluation Weight</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
            <?php } ?>
            <?php if ($_SESSION['ma']['ma_4'] == "Y") { ?>
            <li class="pcoded-hasmenu <?php if ($page == "Staff-admin") {
                                                echo "active pcoded-trigger";
                                            } ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-settings"></i><b>D</b></span>
                    <span class="pcoded-mtext">Admin Data</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php if ($ac == "admin-list") {
                                        echo "active";
                                    } ?>">
                        <a href="admin-list.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">Admin Data</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
            <?php } ?>
            <?php if ($_SESSION['ma']['ma_5'] == "Y") { ?>
            <li class="pcoded-hasmenu <?php if ($page == "Import") {
                                                echo "active pcoded-trigger";
                                            } ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-import"></i><b>D</b></span>
                    <span class="pcoded-mtext">Import Data</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php if ($ac =="staff") {
                                        echo "active";
                                    } ?>">
                        <a href="import-staff.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">Import Employee</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if ($ac == "master-kpi") {
                                        echo "active";
                                    } ?>">
                        <a href="import-master-kpi.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">Import Master KPIs</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if ($ac == "master-competency") {
                                        echo "active";
                                    } ?>">
                        <a href="import-master-competency.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">Import Master Competency</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if ($ac == "position") {
                                        echo "active";
                                    } ?>">
                        <a href="import-position.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">Import Position</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if ($ac == "set-name") {
                                        echo "active";
                                    } ?>">
                        <a href="import-set-name.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">Import set</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if ($ac == "set-detil") {
                                        echo "active";
                                    } ?>">
                        <a href="import-set-detil.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">Import KPIs Set</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if ($ac == "set-Competency") {
                                        echo "active";
                                    } ?>">
                        <a href="import-set-Competency.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">Import Competency set</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
            <?php } ?>

        </ul>
        <?php } ?>
        <?php if ($_SESSION['ma']['ma_6'] == "Y") { ?>
        <div class="pcoded-navigation-label">Kpis setup</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="<?php if ($ac == "kpi-master") {
                            echo "active";
                        } ?>">
                <a href="kpi-master.php">
                    <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.navigate.main">KPI Master</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <ul class="pcoded-item pcoded-left-item">
            <li class="<?php if ($ac == "competency-master") {
                            echo "active";
                        } ?>">
                <a href="competency-master.php">
                    <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.navigate.main">Competency Master</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <ul class="pcoded-item pcoded-left-item">
            <li class="<?php if ($ac == "time-list") {
                            echo "active";
                        } ?>">
                        <a href="time-list.php">
                
                    <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.navigate.main">KPI Set</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <ul class="pcoded-item pcoded-left-item">
            <li class="<?php if ($ac == "time-list") {
                            echo "active";
                        } ?>">
                <a href="view-staff-set.php">
                    <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.navigate.main">Delete Employee by group</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu <?php if ($page == "admim-kpi") {
                                            echo "active pcoded-trigger";
                                        } ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext">KPI</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php if ($ac == "kpi-type") {
                                    echo "active";
                                } ?>">
                        <a href="kpi-type.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">KPI TYPE</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if ($ac == "add-hospitals-kpi") {
                                    echo "active";
                                } ?>">
                        <a href="hospitals-kpi-list.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">Add Hospitals KPI</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if ($ac == "add-department-kpi") {
                                    echo "active";
                                } ?>">
                        <a href="add-department-list.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">Add Department KPI</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if ($ac == "add-staff-kpi") {
                                    echo "active";
                                } ?>">
                        <a href="add-staff-list.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">Add Job KPI</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if ($ac == "add-behavior-list") {
                                    echo "active";
                                } ?>">
                        <a href="add-behavior-list.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">Add Behavior KPI</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="pcoded-hasmenu <?php if ($page == "list-competency") {
                                            echo "active pcoded-trigger";
                                        } ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-view-list-alt"></i><b>D</b></span>
                    <span class="pcoded-mtext">Competency</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php if ($ac == "competency-type") {
                                    echo "active";
                                } ?>">
                        <a href="competency-type.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">Competency TYPE</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if ($ac == "add-competency") {
                                    echo "active";
                                } ?>">
                        <a href="add-competency-list.php">
                            <span class="pcoded-micon"><i class="ti-view-list-alt"></i></span>
                            <span class="pcoded-mtext">Add Managerial</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if ($ac == "add-functional") {
                                    echo "active";
                                } ?>">
                        <a href="add-functional-list.php">
                            <span class="pcoded-micon"><i class="ti-view-list-alt"></i></span>
                            <span class="pcoded-mtext"> Add Functional</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if ($ac == " ") {
                                    echo "active";
                                } ?>">
                        <a href="add-core-list.php">
                            <span class="pcoded-micon"><i class="ti-view-list-alt"></i></span>
                            <span class="pcoded-mtext">Core</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="pcoded-hasmenu <?php if ($page == "add-assessment") {
                                            echo "active pcoded-trigger";
                                        } ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-view-list-alt"></i><b>D</b></span>
                    <span class="pcoded-mtext">Assignment setup</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php if ($ac == "add-head") {
                                    echo "active";
                                } ?>">
                        <a href="add-head.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">Assign manager</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if ($ac == "add-job-kpi") {
                                    echo "active";
                                } ?>">
                        <a href="add-job-kpi.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">Assign Job KPI</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if ($ac == "add-department-kpin") {
                                    echo "active";
                                } ?>">
                        <a href="add-department-kpin.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">Assign Department Kpi</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if ($ac == "add-hospitals-kpi") {
                                    echo "active";
                                } ?>">
                        <a href="add-hospitals-kpin.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">Assign Hospitals Kpi</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if ($ac == "add-behavior-kpi") {
                                    echo "active";
                                } ?>">
                        <a href="add-behavior-kpi.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">Assign behavior Kpi</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if ($ac == "add-job-kpi-all") {
                                    echo "active";
                                } ?>">
                        <a href="add-job-kpi-all.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">Assign  KPI Employee</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if ($ac == "add-assessment-competency") {
                                    echo "active";
                                } ?>">
                        <a href="add-assessment-competency.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">Assign competency</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if ($ac == "add-assessment-competency-all") {
                                    echo "active";
                                } ?>">
                        <a href="add-assessment-competency-all.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">Assign competency Employee</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <?php } ?>
        <?php if ($_SESSION['ma']['ma_7'] == "Y") { ?>
        <div class="pcoded-navigation-label">Report</div>
        <ul class="pcoded-item pcoded-left-item">

            <li class="pcoded-hasmenu <?php if ($page == "report-kpi") {
                                            echo "active pcoded-trigger";
                                        } ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext">KPI</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php if ($ac == "report-hospitals-kpi") {
                                    echo "active";
                                } ?>">
                        <a href="report-hospitals-kpi.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">รายงานรวม ทั้งหมด</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if ($ac == "report-hospitals-search.php") {
                                    echo "active";
                                } ?>">
                        <a href="report-hospitals-search.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">รายงาน แบบกรองข้อมูล</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    

                </ul>
            </li>
            <li class="pcoded-hasmenu <?php if ($page == "report-com") {
                                            echo "active pcoded-trigger";
                                        } ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext">Competency</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php if ($ac == "report-competency-excel.php") {
                                    echo "active";
                                } ?>">
                        <a href="report-competency-excel.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">รายงานรายแผนก</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if ($ac == "report-hospitals-search.php") {
                                    echo "active";
                                } ?>">
                        <a href="report-hospitals-search.php">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.navigate.main">รายงาน แบบกรองข้อมูล</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    

                </ul>
            </li>
        </ul>
                            <?php } ?>
        <ul class="pcoded-item pcoded-left-item">
            <li class="<?php if ($ac == "hospitals") {
                            echo "active";
                        } ?>">
                <a href="../class/class.php?Mode=Logout">
                    <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.navigate.main">Logout</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>


    </div>
</nav>