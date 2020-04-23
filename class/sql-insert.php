<?php 
    error_reporting(0);
//    echo "<pre>";
//    //print_r(c_scelectS($valuei));
//    echo "</pre>";
session_start();
header('Content-Type: text/html; charset=utf-8');
include("phpUN/function.php");
include("class.php");
$mode=cut(TokenVerify($_POST['Mode'], $secret));
if($_POST['Mode']=="addHospital")
{
    $table="tb_hospital";
    $column="hospital_id, hospital_NameTh, hospital_NameEn, hospital_Code";
    $valuei="NULL,'".$_POST['hospital_NameTh']."', '".$_POST['hospital_NameEn']."','".$_POST['hospital_Code']."' ";
    oInsert($table,$column,$valuei);
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="addDirector")
{
    $table="tb_hospital_director_assistant";
    $column="director_assistant_id, hospital_id, director_assistant_Name, director_assistant_Status";
    $valuei="NULL,'".$_SESSION["hospitaLslevel1"]."', '".$_POST['director_assistant_Name']."', '".$_POST['director_assistant_Status']."' ";
    oInsert($table,$column,$valuei);
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="addDivisionDirector")
{
    $table="tb_division_director";
    $column="division_director_id, director_assistant_id, division_director_Name, division_director_Status";
    $valuei="NULL,'".$_POST['director_assistant_id']."','".$_POST['division_director_Name']."', '".$_POST['division_director_Status']."' ";
    oInsert($table,$column,$valuei);
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="addDivisionManagerHead")
{
    $table="tb_division_manager_head";
    $column="division_manager_head_id, director_assistant_id, division_director_id, division_manager_head_Name, division_manager_head_Status";
    $valuei="NULL,'".$_POST['director_assistant_id']."', '".$_POST['division_director_id']."' ,'".$_POST['division_manager_head_Name']."', '".$_POST['division_manager_head_Status']."' ";
    oInsert($table,$column,$valuei);
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="addDivisionManagerSub"){

    $table="tb_division_manager_sub";
    $column="division_manager_sub_id, director_assistant_id, division_director_id, division_manager_head_id, division_manager_sub_Name, division_manager_sub_Status";
    $valuei="NULL,'".$_POST['director_assistant_id']."', '".$_POST['division_director_id']."' ,'".$_POST['division_manager_head_id']."', '".$_POST['division_manager_sub_Name']."', '".$_POST['division_manager_sub_Status']."' ";
    oInsert($table,$column,$valuei);
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="addDepatmentHead"){
    $table="tb_depatment_head";
    $column="depatment_head_id, division_manager_sub_id, director_assistant_id, division_director_id, division_manager_head_id, depatment_head_Name, depatment_head_Status";
    $valuei="NULL,'".$_POST['division_manager_sub_id']."', '".$_POST['director_assistant_id']."' ,'".$_POST['division_director_id']."', '".$_POST['division_manager_head_id']."', '".$_POST['depatment_head_Name']."', '".$_POST['depatment_head_Status']."' ";
    oInsert($table,$column,$valuei);
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="addDepartment"){
    $table="tb_department";
    $column="department_id, department_Code, department_Name, department_Status";
    $valuei="NULL,'".$_POST['department_Code']."', '".$_POST['department_Name']."' ,'".$_POST['department_Status']."' ";
    oInsert($table,$column,$valuei);
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="addDepartment_work"){
    $table="tb_department_work";
    $column="department_work_id, department_id, department_work_Code, department_work_Name, tb_department_Status";
    $valuei="NULL,'".$_POST['department_id']."', '".$_POST['department_work_Code']."' ,'".$_POST['department_work_Name']."','".$_POST['tb_department_Status']."' ";
    oInsert($table,$column,$valuei);
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="addStaff"){ 
    if($_POST['staff_status']=="Y" or $_POST['staff_id']==""){

        $table="tb_staff";
        $valuei="staff_status='N' where staff_code='".$_POST['staff_code']."' ";
        oUpdate($table,$valuei);

    $table="tb_staff";
    $column="staff_id, staff_code, staff_title, 
    staff_Name, staff_Sername, staff_department_id, 
    staff_department_work_id, staff_job_code, staff_job_description, 
    staff_job_grade, staff_hospital_id, staff_director_assistant_id, 
    staff_division_director_id, staff_division_manager_head_id, staff_division_manager_sub_id, 
    staff_depatment_head_id, staff_start, staff_end, staff_status, staff_level_position";
    
    $valuei="NULL,'".$_POST['staff_code']."', '".$_POST['staff_title']."' ,
    '".$_POST['staff_Name']."','".$_POST['staff_Sername']."', '".$_POST['staff_department_id']."', 
    '".$_POST['staff_department_work_id']."', '".$_POST['staff_job_code']."', '".$_POST['staff_job_description']."', 
    '".$_POST['staff_job_grade']."', '".$_POST['staff_hospital_id']."', '".$_POST['staff_director_assistant_id']."',
    '".$_POST['staff_division_director_id']."', '".$_POST['staff_division_manager_head_id']."', '".$_POST['staff_division_manager_sub_id']."', 
    '".$_POST['staff_depatment_head_id']."', '".$_POST['staff_start']."', '".$_POST['staff_end']."', 'Y', '".$_POST['staff_level_position']."' ";
    oInsert($table,$column,$valuei);
    }
    if(isset($_POST['staff_id']))
    {
        $table="tb_staff";
        $valuei="staff_status='N' where staff_id='".$_POST['staff_id']."' ";
        oUpdate($table,$valuei);
    } 
    echo "<script>alert('ทำรายการสำเร็จ');window.location='../kpi/staff-list.php';</script>"; 
}
if($_GET['Mode']=="outStaff"){ 

    $table="tb_staff";
    $valuei="staff_status='N' where staff_code='".$_GET['staff_code']."' ";
    oUpdate($table,$valuei);

    echo "<script>alert('ทำรายการสำเร็จ');window.location='../kpi/staff-list.php';</script>"; 
}
if($_POST['Mode']=="addAdmin"){ 
    $table="tb_management";
    $column="ma_id, staff_code, ma_1, ma_2, ma_3, ma_4, ma_5, ma_status";
    
    $valuei="NULL,'".$_POST['staff_code']."', '".$_POST['ma_1']."' ,
    '".$_POST['ma_2']."','".$_POST['ma_3']."', '".$_POST['ma_4']."', 
    '".$_POST['ma_5']."', 'Y'";
    oInsert($table,$column,$valuei);
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="changPass" AND $oInsert=="mP@ssWord") 
{
        $table="tb_staff";
        $valuei="staff_password='".$_POST['new1_password']."'
        where staff_code='".$_POST['staff_code']."' ";
        oUpdate($table,$valuei); 
        
        echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="addTime" AND $oInsert=="mP@ssWord"){ 
    
    $table="tb_assessment_time";
    $column="assessment_time_id, assessment_time_code, assessment_time_name, 
    assessment_time_start, assessment_time_end, assessment_time_type";
    
    $valuei="NULL,'".$_POST['assessment_time_code']."', '".$_POST['assessment_time_name']."' ,
    '".$_POST['assessment_time_start']."','".$_POST['assessment_time_end']."','".$_POST['assessment_time_type']."'";
    oInsert($table,$column,$valuei);
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="addTypeKpi" AND $oInsert=="mP@ssWord"){ 

    $table="tb_kpi_type";
    $column="kpi_type_id, kpi_type_name, kpi_type_status, kpi_types";
    
    $valuei="NULL,'".$_POST['kpi_type_name']."', '".$_POST['kpi_type_status']."', '".$_POST['kpi_types']."'";
    oInsert($table,$column,$valuei);
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="EditTypeKpi" AND $oInsert=="mP@ssWord"){ 

    $table="tb_kpi_type";
    $valuei="kpi_type_name='".$_POST['kpi_type_name']."',kpi_type_status='".$_POST['kpi_type_status']."'
    where kpi_type_id='".$_POST['kpi_type_id']."' ";
    oUpdate($table,$valuei);
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="editDirector" AND $oInsert=="mP@ssWord"){ 

    $table="tb_hospital_director_assistant";
    $valuei="director_assistant_Name='".$_POST['director_assistant_Name']."',
    director_assistant_Status='".$_POST['director_assistant_Status']."'
    where director_assistant_id='".$_POST['director_assistant_id']."' ";
    oUpdate($table,$valuei);
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="editDirector2" AND $oInsert=="mP@ssWord"){ 

    $table="tb_division_director";
    $valuei="division_director_Name='".$_POST['division_director_Name']."',
    division_director_Status='".$_POST['division_director_Status']."'
    where division_director_id='".$_POST['division_director_id']."' ";
    oUpdate($table,$valuei);
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="editDirector3" AND $oInsert=="mP@ssWord"){ 

    $table="tb_division_manager_head";
    $valuei="division_manager_head_Name='".$_POST['division_manager_head_Name']."',
    division_manager_head_Status='".$_POST['division_manager_head_Status']."'
    where division_manager_head_id='".$_POST['division_manager_head_id']."' ";
    oUpdate($table,$valuei);
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="editDirector4" AND $oInsert=="mP@ssWord"){ 

    $table="tb_division_manager_sub";
    $valuei="division_manager_sub_Name='".$_POST['division_manager_sub_Name']."',
    division_manager_sub_Status='".$_POST['division_manager_sub_Status']."'
    where division_manager_sub_id='".$_POST['division_manager_sub_id']."' ";
    oUpdate($table,$valuei);
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="editDirector5" AND $oInsert=="mP@ssWord"){ 

    $table="tb_depatment_head";
    $valuei="depatment_head_Name='".$_POST['depatment_head_Name']."',
    depatment_head_Status='".$_POST['depatment_head_Status']."'
    where depatment_head_id='".$_POST['depatment_head_id']."' ";
    oUpdate($table,$valuei);
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="editDirector6" AND $oInsert=="mP@ssWord"){ 

    $table="tb_hospital";
    $valuei="hospital_NameTh='".$_POST['hospital_NameTh']."', 
    hospital_NameEn='".$_POST['hospital_NameEn']."', 
    hospital_Code='".$_POST['hospital_Code']."',
    hospital_Status='".$_POST['hospital_Status']."'
    where hospital_id='".$_POST['hospital_id']."' ";
    oUpdate($table,$valuei);
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}

if($_POST['Mode']=="addKpihospital" AND $oInsert=="mP@ssWord"){ 
    
    $table="tb_kpi_master";
    $column="kpi_master_id, kpi_type_id, assessment_time_code,
    kpi_master_name, kpi_master_weight, kpi_master_target,
    kpi_master_standard_0, kpi_master_standard_1, kpi_masterl_standard_2,
    kpi_master_standard_3, kpi_master_standard_4, kpi_master_standard_5,
    kpi_master_status, kpi_master_type, kpi_master_in_type
    ";
    
    $valuei="NULL,'".$_POST['kpi_type_id']."', '".$_POST['assessment_time_code']."',
    '".$_POST['kpi_master_name']."', '".$_POST['kpi_master_weight']."', '".$_POST['kpi_master_target']."',
    '".$_POST['kpi_master_standard_0']."', '".$_POST['kpi_master_standard_1']."', '".$_POST['kpi_masterl_standard_2']."',
    '".$_POST['kpi_master_standard_3']."', '".$_POST['kpi_master_standard_4']."', '".$_POST['kpi_master_standard_5']."',
    '".$_POST['kpi_master_status']."','1', '".$_POST['in_type']."' ";
    
    oInsert($table,$column,$valuei);
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="addWeightGroup" AND $oInsert=="mP@ssWord"){ 

        
    $table="tb_weight_group";
    $column="weight_group_id, weight_group_jobcode, weight_group_jobdesc, 
    weight_group_jobgrade, weight_group_department, weight_group_corpreate, 
    weight_group_departmen, weight_group_mc, weight_group_fc, 
    weight_group_cc, weight_group_jobkpi, weight_group_attribute, 
    weight_group_dis_par, weight_group_total, weight_group_hot
    ";
    
    $valuei="NULL,'".$_POST['weight_group_jobcode']."', '".$_POST['weight_group_jobdesc']."',
    '".$_POST['weight_group_jobgrade']."', '".$_POST['weight_group_department']."', '".$_POST['weight_group_corpreate']."',
    '".$_POST['weight_group_departmen']."', '".$_POST['weight_group_mc']."', '".$_POST['weight_group_fc']."',
    '".$_POST['weight_group_cc']."', '".$_POST['weight_group_jobkpi']."', '".$_POST['weight_group_attribute']."',
    '".$_POST['weight_group_dis_par']."','".$_POST['weight_group_total']."','".$_POST['weight_group_hot']."' ";
    
    oInsert($table,$column,$valuei);
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="addKpihospitalSelect" AND $oInsert=="mP@ssWord"){ 
    for($i=0;$i<count($_POST['kpi_master_id']); $i++)
    {
        $valuei="SELECT * FROM tb_kpi_master WHERE kpi_master_id = '".$_POST['kpi_master_id'][$i]."'";
        $arr=c_scelectOne($valuei);
        
        $table="tb_kpi_master";
        $column="kpi_master_id, kpi_type_id, assessment_time_code,
        kpi_master_name, kpi_master_target,
        kpi_master_standard_0, kpi_master_standard_1, kpi_masterl_standard_2,
        kpi_master_standard_3, kpi_master_standard_4, kpi_master_standard_5,
        kpi_master_status, kpi_master_type
        ";

        $valuei="NULL,'".$arr['kpi_type_id']."', '".$_POST['assessment_time_code']."',
        '".$arr['kpi_master_name']."', '".$arr['kpi_master_target']."',
        '".$arr['kpi_master_standard_0']."', '".$arr['kpi_master_standard_1']."', '".$arr['kpi_masterl_standard_2']."',
        '".$arr['kpi_master_standard_3']."', '".$arr['kpi_master_standard_4']."', '".$arr['kpi_master_standard_5']."',
        '".$arr['kpi_master_status']."','1' ";

        oInsert($table,$column,$valuei);
    }
    
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="upCsvFileSetName") 
{
    $_SESSION['filename']=$_POST['filename'];
    $tmp_name = $_FILES["rm_card"]["tmp_name"];
    $file = $_FILES["rm_card"]["name"];
    $sizefile = $_FILES["rm_card"]["size"]; 
    $type= strrchr($file,".");
    $nn=$_SESSION['filename']."SetName";
    $name_m=$nn."$type";
    $_SESSION['fileNameCsv']=$name_m;
    $folder= "../kpi/import/";
    if(move_uploaded_file($tmp_name,"$folder$name_m")){
    $objCSV = fopen("../kpi/import/$name_m", "r");
    $i=1;
    while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {

        $table="tb_assessment_time";
        $column="assessment_time_code, assessment_time_name, assessment_time_type, fileTime";

        $valuei="'".$objArr[1]."', '".$objArr[2]."', '".$objArr[3]."', '".$_SESSION['filename']."' ";   
        
        oInsert($table,$column,$valuei); 
        } 
    }

        echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="upCsvFileSetCompetency") 
{
    $_SESSION['filename']=$_POST['filename']; 
    $tmp_name = $_FILES["rm_card"]["tmp_name"];
    $file = $_FILES["rm_card"]["name"];
    $sizefile = $_FILES["rm_card"]["size"]; 
    $type= strrchr($file,".");
    $nn=$_SESSION['filename']."SetCompetency";
    $name_m=$nn."$type";
    $_SESSION['fileNameCsv']=$name_m;
    $folder= "../kpi/import/";
    if(move_uploaded_file($tmp_name,"$folder$name_m")){
    $objCSV = fopen("../kpi/import/$name_m", "r");
    $i=1;
    while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {

        $table="tb_competency_master";
        $column="competency_master_type, kpi_type_id, assessment_time_code, ";
        $column.="competency_master_name, competency_master_example, competency_master_weight,";
        $column.="competency_master_target, competency_master_status, fileTime";

        $valuei="'".$objArr[1]."', '".$objArr[2]."', '".$objArr[3]."', "; 
        $valuei.="'".$objArr[4]."', '".$objArr[5]."', '".$objArr[6]."', "; 
        $valuei.="'".$objArr[7]."', 'Y', '".$_SESSION['filename']."' "; 
        
        oInsert($table,$column,$valuei); 
        } 
    }

        echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="upCsvFileSetKpi") 
{
    $_SESSION['filename']=$_POST['filename']; 
    $tmp_name = $_FILES["rm_card"]["tmp_name"];
    $file = $_FILES["rm_card"]["name"];
    $sizefile = $_FILES["rm_card"]["size"]; 
    $type= strrchr($file,".");
    $nn=$_SESSION['filename']."Setkpi";
    $name_m=$nn."$type";
    $_SESSION['fileNameCsv']=$name_m;
    $folder= "../kpi/import/";
    if(move_uploaded_file($tmp_name,"$folder$name_m")){
    $objCSV = fopen("../kpi/import/$name_m", "r");
    $i=1;
    while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {

        $table="tb_kpi_master";
        $column="kpi_master_type ,  kpi_master_in_type ,  kpi_type_id ,";
        $column.="assessment_time_code ,  kpi_master_name ,  kpi_master_weight , ";
        $column.="kpi_master_target ,  kpi_master_standard_1 ,  kpi_masterl_standard_2 ,";
        $column.="kpi_master_standard_3 ,  kpi_master_standard_4 ,  kpi_master_standard_5,";
        $column.="kpi_master_status ,  fileTime";

        $valuei="'".$objArr[1]."', '".$objArr[2]."', '".$objArr[3]."', "; 
        $valuei.="'".$objArr[4]."', '".$objArr[5]."', '".$objArr[6]."', "; 
        $valuei.="'".$objArr[7]."', '".$objArr[8]."', '".$objArr[9]."', "; 
        $valuei.="'".$objArr[10]."', '".$objArr[11]."', '".$objArr[12]."', "; 
        $valuei.=" 'Y', '".$_SESSION['filename']."' "; 
        
        oInsert($table,$column,$valuei); 
        } 
    }

        echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="addMasterKpi" AND $oInsert=="mP@ssWord"){ 

        $table="tb_kpi_master_in";
        $column="kpi_master_in_id, kpi_master_in_type, kpi_master_in_groub, 
        kpi_master_in_name, kpi_master_in_weight, kpi_master_in_target, 
        kpi_master_in_standard_0, kpi_master_in_standard_1, kpi_master_in_standard_2, 
        kpi_master_in_standard_3, kpi_master_in_standard_4, kpi_master_in_standard_5, 
        kpi_master_in_status,kpi_master_in_factor
        ";

        $valuei="NULL,'".$_POST['kpi_master_in_type']."', '".$_POST['kpi_master_in_groub']."',
        '".$_POST['kpi_master_in_name']."', '".$_POST['kpi_master_in_weight']."','".$_POST['kpi_master_in_target']."', 
        '".$_POST['kpi_master_in_standard_0']."', '".$_POST['kpi_master_in_standard_1']."','".$_POST['kpi_master_in_standard_2']."', '".$_POST['kpi_master_in_standard_3']."', '".$_POST['kpi_master_in_standard_4']."','".$_POST['kpi_master_in_standard_5']."',
        '".$_POST['kpi_master_in_status']."','".$_POST['kpi_master_in_factor']."' ";

        oInsert($table,$column,$valuei);
    
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="addMasteCompetency" AND $oInsert=="mP@ssWord"){ 


        $table="tb_competency_master_in";
        $column="competency_master_in_id, competency_master_in_groub, competency_master_in_factor, 
        competency_master_in_name, competency_master_in_weight, competency_master_in_target, 
        competency_master_in_example, competency_master_in_status
        ";

        $valuei="NULL,'".$_POST['competency_master_in_groub']."', '".$_POST['competency_master_in_factor']."',
        '".$_POST['competency_master_in_name']."', '".$_POST['competency_master_in_weight']."','".$_POST['competency_master_in_target']."', 
        '".$_POST['competency_master_in_example']."', 'Y' ";

        oInsert($table,$column,$valuei);
    
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="editMasteCompetency" AND $oInsert=="mP@ssWord"){ 


        $table="tb_competency_master_in";
        $valuei="competency_master_in_groub='".$_POST['competency_master_in_groub']."',competency_master_in_factor='".$_POST['competency_master_in_factor']."', competency_master_in_name='".$_POST['competency_master_in_name']."', competency_master_in_weight='".$_POST['competency_master_in_weight']."', competency_master_in_target='".$_POST['competency_master_in_target']."', competency_master_in_example='".$_POST['competency_master_in_example']."',
        competency_master_in_status='".$_POST['competency_master_in_status']."'
        where competency_master_in_id='".$_POST['competency_master_in_id']."' ";
    
        oUpdate($table,$valuei);
        
    
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="editMasterKpi" AND $oInsert=="mP@ssWord"){ 

    
        $table="tb_kpi_master_in";
        $valuei="kpi_master_in_type='".$_POST['kpi_master_in_type']."',kpi_master_in_groub='".$_POST['kpi_master_in_groub']."', kpi_master_in_name='".$_POST['kpi_master_in_name']."', kpi_master_in_weight='".$_POST['kpi_master_in_weight']."', kpi_master_in_target='".$_POST['kpi_master_in_target']."', kpi_master_in_standard_0='".$_POST['kpi_master_in_standard_0']."',
        kpi_master_in_standard_1='".$_POST['kpi_master_in_standard_1']."', kpi_master_in_standard_2='".$_POST['kpi_master_in_standard_2']."',
        kpi_master_in_standard_3='".$_POST['kpi_master_in_standard_3']."', kpi_master_in_standard_4='".$_POST['kpi_master_in_standard_4']."',
        kpi_master_in_standard_5='".$_POST['kpi_master_in_standard_5']."', kpi_master_in_status='".$_POST['kpi_master_in_status']."',
        kpi_master_in_factor = '".$_POST['kpi_master_in_factor']."'
        where kpi_master_in_id='".$_POST['kpi_master_in_id']."' ";
        oUpdate($table,$valuei);

    
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="addCompetencyhospitalSelect" AND $oInsert=="mP@ssWord"){ 
    for($i=0;$i<count($_POST['competency_master_id']); $i++)
    {
        $valuei="SELECT * FROM tb_competency_master WHERE competency_master_id = '".$_POST['competency_master_id'][$i]."'";
        $arr=c_scelectOne($valuei);
        
        $table="tb_competency_master";
        $column="competency_master_id, competency_master_type, kpi_type_id,
        assessment_time_code, competency_master_name,competency_master_weight, 
        competency_master_target, competency_master_example
        ";

        $valuei="NULL,'".$arr['competency_master_type']."', '".$arr['kpi_type_id']."',
        '".$_POST['assessment_time_code']."', '".$arr['competency_master_name']."', '".$arr['competency_master_weight']."', '".$arr['competency_master_target']."','".$arr['competency_master_example']."' ";

        oInsert($table,$column,$valuei);
    }
    
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="addCompetencyList" AND $oInsert=="mP@ssWord"){ 

    $valuei="SELECT * FROM tb_assessment_time WHERE assessment_time_code = '".$_POST['assessment_time_code']."'";
    $arr=c_scelectOne($valuei);
    $assessment_time_type = $arr['assessment_time_type'];
    
    $table="tb_competency_master";
    $column="competency_master_id, competency_master_type, kpi_type_id, 
    assessment_time_code, competency_master_name, competency_master_weight, 
    competency_master_target, competency_master_status, competency_master_example
    ";
    
    $valuei="NULL,'$assessment_time_type', '".$_POST['kpi_type_id']."',
    '".$_POST['assessment_time_code']."', '".$_POST['competency_master_name']."', '".$_POST['competency_master_weight']."',
    '".$_POST['competency_master_target']."', '".$_POST['competency_master_status']."' , '".$_POST['competency_master_example']."' ";
    
    oInsert($table,$column,$valuei);
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="addKpiDepartment" AND $oInsert=="mP@ssWord"){ 
    
    $table="tb_kpi_master";
    $column="kpi_master_id, kpi_type_id, assessment_time_code,
    kpi_master_name, kpi_master_weight, kpi_master_target,
    kpi_master_standard_0, kpi_master_standard_1, kpi_masterl_standard_2,
    kpi_master_standard_3, kpi_master_standard_4, kpi_master_standard_5,
    kpi_master_status, kpi_master_type
    ";
    
    $valuei="NULL,'".$_POST['kpi_type_id']."', '".$_POST['assessment_time_code']."',
    '".$_POST['kpi_master_name']."', '".$_POST['kpi_master_weight']."', '".$_POST['kpi_master_target']."',
    '".$_POST['kpi_master_standard_0']."', '".$_POST['kpi_master_standard_1']."', '".$_POST['kpi_masterl_standard_2']."',
    '".$_POST['kpi_master_standard_3']."', '".$_POST['kpi_master_standard_4']."', '".$_POST['kpi_master_standard_5']."',
    '".$_POST['kpi_master_status']."','2' ";
    
    oInsert($table,$column,$valuei);
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="addLevelPosition" AND $oInsert=="mP@ssWord"){ 
    $table="tb_level_position";
    $column="level_position_id, level_position_code, level_position_name, job_code";
    
    $valuei="NULL,'".$_POST['level_position_code']."', '".$_POST['level_position_name']."','".$_POST['job_code']."'";
    
    oInsert($table,$column,$valuei);
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="addEvaluation" AND $oInsert=="mP@ssWord"){ 
    
    $valuei="SELECT *
    FROM tb_staff AS r1
    LEFT JOIN tb_evaluation_head AS r2 ON r1.staff_code = r2.evaluation_head_staff
    JOIN tb_kpi_master AS r3 ON r3.assessment_time_code = '".$_POST['evaluation_code']."'
    WHERE r1.staff_job_grade = '".$_POST['job_grade_name']."' 
    AND r1.staff_hospital_id = '".$_POST['staff_hospital_id']."'
    AND r1.staff_director_assistant_id = '".$_POST['staff_director_assistant_id']."'
    AND r1.staff_division_director_id = '".$_POST['staff_division_director_id']."'
    AND r1.staff_division_manager_head_id = '".$_POST['staff_division_manager_head_id']."'
    AND r1.staff_division_manager_sub_id = '".$_POST['staff_division_manager_sub_id']."'
    AND r1.staff_depatment_head_id = '".$_POST['staff_depatment_head_id']."'
    AND r1.staff_job_code = '".$_POST['job_code']."'
    AND r1.staff_status = 'Y'
    
    ";
    // echo "----------";
    // echo "<br>";
    // echo $_POST['evaluation_code'];
    // echo "<br>";
    // echo $_POST['job_grade_name'];
    // echo "<br>";
    // echo $_POST['staff_hospital_id'];
    // echo "<br>";
    // echo $_POST['staff_director_assistant_id'];
    // echo "<br>";
    // echo $_POST['staff_division_director_id'];
    // echo "<br>";
    // echo $_POST['staff_division_manager_head_id'];
    // echo "<br>";
    // echo $_POST['staff_division_manager_sub_id'];
    // echo "<br>";
    // echo $_POST['staff_depatment_head_id'];
    // echo "<br>";
    // echo $_POST['job_code'];
    // echo "<br>";
    foreach(c_scelectS($valuei) as $vlues)
    {
        
        if($vlues["evaluation_head_staff"]!="")
        {
            for($i=1; $i<=12; $i++)
            {
            $table="tb_evaluation";
            $column="evaluation_id, kpi_master_id, evaluation_code, 
            evaluation_year, evaluation_month, evaluation_id_staff, 
            evaluation_id_head, evaluation_status, evaluation_start, evaluation_end, evaluation_type";
            if($i<=9){ $in = "0"; }else{ $in=""; }
            $month = $in.$i;
             $valuei="NULL, '".$vlues['kpi_master_id']."','".$_POST['evaluation_code']."', 
            '".$_POST['evaluation_year']."', '$month', '".$vlues['evaluation_head_staff']."', 
            '".$vlues['evaluation_head_head']."' , 'N', '".$_POST['evaluation_start']."', '".$_POST['evaluation_end']."', '".$vlues['kpi_master_in_type']."'";
            oInsert($table,$column,$valuei);
            }
        }
    }
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="addOneEvaluation" AND $oInsert=="mP@ssWord"){ 
    
    $valuei="SELECT *
    FROM tb_staff AS r1
    LEFT JOIN tb_evaluation_head AS r2 ON r1.staff_code = r2.evaluation_head_staff
    JOIN tb_kpi_master AS r3 ON r3.assessment_time_code = '".$_POST['evaluation_code']."'
    WHERE r1.staff_code = '".$_POST['staff_code']."'
    AND r1.staff_status = 'Y'
    
    ";
    // echo "----------";
    // echo "<br>";
    // echo $_POST['evaluation_code'];
    // echo "<br>";
    // echo $_POST['job_grade_name'];
    // echo "<br>";
    // echo $_POST['staff_hospital_id'];
    // echo "<br>";
    // echo $_POST['staff_director_assistant_id'];
    // echo "<br>";
    // echo $_POST['staff_division_director_id'];
    // echo "<br>";
    // echo $_POST['staff_division_manager_head_id'];
    // echo "<br>";
    // echo $_POST['staff_division_manager_sub_id'];
    // echo "<br>";
    // echo $_POST['staff_depatment_head_id'];
    // echo "<br>";
    // echo $_POST['staff_code'];
    // echo "<br>";
    foreach(c_scelectS($valuei) as $vlues)
    {
        
        if($vlues["evaluation_head_staff"]!="")
        {
            for($i=1; $i<=12; $i++)
            {
            $table="tb_evaluation";
            $column="evaluation_id, kpi_master_id, evaluation_code, 
            evaluation_year, evaluation_month, evaluation_id_staff, 
            evaluation_id_head, evaluation_status, evaluation_start, evaluation_end, evaluation_type";
            if($i<=9){ $in = "0"; }else{ $in=""; }
            $month = $in.$i;
            $valuei="NULL, '".$vlues['kpi_master_id']."','".$_POST['evaluation_code']."', 
            '".$_POST['evaluation_year']."', '$month', '".$vlues['evaluation_head_staff']."', 
            '".$vlues['evaluation_head_head']."' , 'N', '".$_POST['evaluation_start']."', '".$_POST['evaluation_end']."', '".$vlues['kpi_master_in_type']."'";
            echo "<hr>";
            oInsert($table,$column,$valuei);
            }
        }
    }
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="addEvaluationDepartment" AND $oInsert=="mP@ssWord"){ 
    
    $valuei="SELECT *
    FROM tb_staff AS r1
    JOIN tb_kpi_master AS r3 ON r3.assessment_time_code = '".$_POST['evaluation_code']."'
    WHERE r1.staff_code = '".$_POST['staff_code']."' 
    AND r1.staff_status = 'Y'";
    foreach(c_scelectS($valuei) as $vlues)
    {
        if($vlues["staff_code"]!="")
        {
            for($i=1; $i<=12; $i++)
            {
                
            $table="tb_evaluation";
            $column="evaluation_id, kpi_master_id, evaluation_code, evaluation_year, 
            evaluation_month, evaluation_id_staff, evaluation_id_head, evaluation_status, 
            evaluation_start, evaluation_end, evaluation_hospital_id, evaluation_director_assistant_id, 
            evaluation_division_director_id, evaluation_division_manager_head_id, evaluation_division_manager_sub_id, evaluation_depatment_head_id, evaluation_type, evaluation_key";
            if($i<=9){ $in = "0"; }else{ $in=""; }
            $month = $in.$i;
                
            $valuei="NULL, '".$vlues['kpi_master_id']."','".$_POST['evaluation_code']."', '".$_POST['evaluation_year']."', 
            '$month', '".$_POST['staff_code']."', '".$_POST['staff_code']."' , 'N', 
            '".$_POST['evaluation_start']."', '".$_POST['evaluation_end']."', '".$_POST['hospital_id']."', '".$_POST['director_assistant_id']."', 
            '".$_POST['division_director_id']."', '".$_POST['division_manager_head_id']."', '".$_POST['division_manager_sub_id']."', '".$_POST['depatment_head_id']."', '".$vlues['kpi_master_in_type']."' , '".$_POST['evaluation_key']."'";
           
             oInsert($table,$column,$valuei); 
            }
            
        }
    
    }
    
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="addEvaluationHospitals" AND $oInsert=="mP@ssWord"){ 
    
    $valuei="SELECT *
    FROM tb_staff AS r1
    JOIN tb_kpi_master AS r3 ON r3.assessment_time_code = '".$_POST['evaluation_code']."'
    WHERE r1.staff_code = '".$_POST['staff_code']."' 
    AND r1.staff_status = 'Y'";
    foreach(c_scelectS($valuei) as $vlues)
    {
        if($vlues["staff_code"]!="")
        {
            for($i=1; $i<=12; $i++)
            {
                
            $table="tb_evaluation";
            $column="evaluation_id, kpi_master_id, evaluation_code, evaluation_year, 
            evaluation_month, evaluation_id_staff, evaluation_id_head, evaluation_status, 
            evaluation_hospital_id, evaluation_director_assistant_id, evaluation_division_director_id, evaluation_division_manager_head_id, evaluation_division_manager_sub_id, evaluation_depatment_head_id, evaluation_type,evaluation_key";
            if($i<=9){ $in = "0"; }else{ $in=""; }
            $month = $in.$i;
                
            $valuei="NULL, '".$vlues['kpi_master_id']."','".$_POST['evaluation_code']."', '".$_POST['evaluation_year']."', 
            '$month', '".$_POST['staff_code']."', '".$_POST['staff_code']."' , 'N', 
            '".$_POST['hospital_id']."', 'NA', 'NA', 
            'NA', 'NA', 'NA','".$vlues['kpi_master_in_type']."','".$_POST['evaluation_key']."'";  
                
             oInsert($table,$column,$valuei); 
            }
            
        }
    
    }
    
    echo "<script>alert('ทำรายการสำเร็จ');window.location='../kpi/add-hospitals-kpin.php';</script>"; 
}
if($_POST['Mode']=="addEvaluation2" AND $oInsert=="mP@ssWord"){ 
    
    $valuei="SELECT *
    FROM tb_staff AS r1
    LEFT JOIN tb_evaluation_head AS r2 ON r1.staff_code = r2.evaluation_head_staff
    JOIN tb_kpi_master AS r3 ON r3.assessment_time_code = '".$_POST['evaluation_code']."'
    WHERE r1.staff_job_grade = '".$_POST['job_grade_name']."' 
    AND r1.staff_hospital_id = '".$_POST['staff_hospital_id']."'
    AND r1.staff_status = 'Y'";
    // $valuei="SELECT *
    // FROM tb_staff AS r1
    // LEFT JOIN tb_evaluation_head AS r2 ON r1.staff_code = r2.evaluation_head_staff
    // JOIN tb_kpi_master AS r3 ON r3.assessment_time_code = '".$_POST['evaluation_code']."'
    // WHERE r1.staff_job_grade = '".$_POST['job_grade_name']."' 
    // AND r1.staff_hospital_id = '".$_POST['staff_hospital_id']."'
    // AND r1.staff_director_assistant_id = '".$_POST['staff_director_assistant_id']."'
    // AND r1.staff_division_director_id = '".$_POST['staff_division_director_id']."'
    // AND r1.staff_division_manager_head_id = '".$_POST['staff_division_manager_head_id']."'
    // AND r1.staff_division_manager_sub_id = '".$_POST['staff_division_manager_sub_id']."'
    // AND r1.staff_depatment_head_id = '".$_POST['staff_depatment_head_id']."'
    // AND r1.staff_job_code = '".$_POST['job_code']."'
    // AND r1.staff_status = 'Y'";

    foreach(c_scelectS($valuei) as $vlues)
    {
        if($vlues["evaluation_head_staff"]!="")
        {
            for($i=1; $i<=12; $i++)
            {
                if($i<=9){ $in = "0"; }else{ $in=""; }
                $month = $in.$i;
                $table="tb_evaluation";
                $column="evaluation_id, kpi_master_id, evaluation_code, 
                evaluation_year, evaluation_month, evaluation_id_staff, 
                evaluation_id_head, evaluation_status, evaluation_start, evaluation_end, evaluation_type";
                $valuei="NULL, '".$vlues['kpi_master_id']."','".$_POST['evaluation_code']."', 
                '".$_POST['evaluation_year']."', '$month', '".$vlues['evaluation_head_staff']."', 
                '".$vlues['evaluation_head_head']."' , 'N', '".$_POST['evaluation_start']."', '".$_POST['evaluation_end']."', '".$vlues['kpi_master_in_type']."'";
                
                oInsert($table,$column,$valuei);
            }
        }
    }
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="addEvaluationCompetency" AND $oInsert=="mP@ssWord"){ 
    
    $valuei="SELECT *
    FROM tb_staff AS r1
    LEFT JOIN tb_evaluation_head AS r2 ON r1.staff_code = r2.evaluation_head_staff
    JOIN tb_competency_master AS r3 ON r3.assessment_time_code = '".$_POST['evaluation_code']."'
    WHERE r1.staff_job_grade = '".$_POST['job_grade_name']."' 
    AND r1.staff_hospital_id = '".$_POST['hospital_id']."'
    AND r1.staff_director_assistant_id = '".$_POST['director_assistant_id']."'
    AND r1.staff_division_director_id = '".$_POST['division_director_id']."'
    AND r1.staff_division_manager_head_id = '".$_POST['division_manager_head_id']."'
    AND r1.staff_division_manager_sub_id = '".$_POST['division_manager_sub_id']."'
    AND r1.staff_depatment_head_id = '".$_POST['depatment_head_id']."'
    AND r1.staff_job_code = '".$_POST['job_code']."'
    AND r1.staff_status = 'Y'";
    // echo "=========";
    // echo $_POST['evaluation_code'];
    // echo "<br>";
    // echo $_POST['job_grade_name'];
    // echo "<br>";
    // echo $_POST['hospital_id'];
    // echo "<br>";
    // echo $_POST['director_assistant_id'];
    // echo "<br>";
    // echo $_POST['division_director_id'];
    // echo "<br>";
    // echo $_POST['division_manager_head_id'];
    // echo "<br>";
    // echo $_POST['division_manager_sub_id'];
    // echo "<br>";
    // echo $_POST['depatment_head_id'];
    // echo "<br>";
    // echo $_POST['job_code'];
    // echo "<br>";
    // echo "==================================";
    // echo "<br>";
    foreach(c_scelectS($valuei) as $key => $vlues)
    {
        if($vlues["evaluation_head_staff"]!="")
        {
            $table="tb_evaluation_competency";
            $column="evaluation_competency_id, evaluation_competency_code, evaluation_competency_year, 
            evaluation_competency_month, evaluation_competency_id_staff, evaluation_competency_id_head, 
            evaluation_competency_status, competency_master_id, evaluation_start, evaluation_end";
            
            $valuei="NULL, '".$_POST['evaluation_code']."', '".$_POST['evaluation_year']."', 
            '".$_POST['evaluation_month']."', '".$vlues['evaluation_head_staff']."', '".$vlues['evaluation_head_head']."' , 
            'N', '".$vlues['competency_master_id']."', '".$_POST['assessment_time_start']."', '".$_POST['assessment_time_end']."'";
            // echo "<br>";
            // echo "==================================";
            // echo "<br>";
            oInsert($table,$column,$valuei);
        }
    }
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="addOneEvaluationCompetency" AND $oInsert=="mP@ssWord"){ 
    
    $valuei="SELECT *
    FROM tb_staff AS r1
    LEFT JOIN tb_evaluation_head AS r2 ON r1.staff_code = r2.evaluation_head_staff
    JOIN tb_competency_master AS r3 ON r3.assessment_time_code = '".$_POST['evaluation_code']."'
    WHERE r1.staff_code = '".$_POST['staff_code']."'
    AND r1.staff_status = 'Y'";
    foreach(c_scelectS($valuei) as $key => $vlues)
    {
        if($vlues["evaluation_head_staff"]!="")
        {
            $table="tb_evaluation_competency";
            $column="evaluation_competency_id, evaluation_competency_code, evaluation_competency_year, 
            evaluation_competency_month, evaluation_competency_id_staff, evaluation_competency_id_head, 
            evaluation_competency_status, competency_master_id, evaluation_start, evaluation_end";
            
            echo $valuei="NULL, '".$_POST['evaluation_code']."', '".$_POST['evaluation_year']."', 
            '".$_POST['evaluation_month']."', '".$vlues['evaluation_head_staff']."', '".$vlues['evaluation_head_head']."' , 
            'N', '".$vlues['competency_master_id']."', '".$_POST['assessment_time_start']."', '".$_POST['assessment_time_end']."'";
            echo "<hr>";
            oInsert($table,$column,$valuei);
        }
    }
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="getStaffAddHead" AND $oInsert=="mP@ssWord"){ 
    for($i=0;$i<count($_POST['evaluation_head_staff']); $i++)
    {
        $table="tb_evaluation_head";
        $column="evaluation_head_id, evaluation_head_staff, evaluation_head_head, evaluation_head_status";
        $valuei="NULL,'".$_POST['evaluation_head_staff'][$i]."','".$_POST['evaluation_head_head']."','Y'";
            
        oInsert($table,$column,$valuei);
    }
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="addDownload"  AND $oInsert=="mP@ssWord")
{
    if($_FILES["filUpload"]["tmp_name"]!="")
    { 
        $nn=date("YmdIsh");
        $tmp_name = $_FILES["filUpload"]["tmp_name"];
        $file = $_FILES["filUpload"]["name"];
        $sizefile = $_FILES["filUpload"]["size"]; 
        $type= strrchr($file,".");
        $name_m=$nn."$type";
        $folder= "../fileDownload/";	
        move_uploaded_file($tmp_name,"$folder$name_m");
        
        $table="tb_download";
        $column="download_id, download_hospitals, download_name, download_files_Name, download_by";
        $valuei="NULL,'".$_POST['download_hospitals']."','".$_POST['download_name']."','$name_m','".$_SESSION['staff']['code']."'";
            
        oInsert($table,$column,$valuei);
    }
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
 
if($_GET['Mode']=="chDel") 
{

        $table="btMarketPicture";
        $valuei="mp_Id='".$_GET['id']."'";
        oDeleteS($table,$valuei); 
        
        echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_GET['Mode']=="headDel") 
{
        $table="tb_evaluation_head";
        $valuei="evaluation_head_id='".$_GET['id']."'";
        oDeleteS($table,$valuei); 
        
        echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_GET['Mode']=="ckDelectL1") 
{

        $table="tb_hospital_director_assistant";
        $valuei="director_assistant_id='".cut(TokenVerify($_GET['key'], $secret))."'";
        oDeleteS($table,$valuei); 
        
        echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_GET['Mode']=="delect-job-kpi") 
{

        $table="tb_evaluation";
        $valuei="evaluation_code='".cut(TokenVerify($_GET['key'], $secret))."'";
        oDeleteS($table,$valuei); 

        $table="tb_evaluation_all";
        $valuei="evaluation_code='".cut(TokenVerify($_GET['key'], $secret))."'";
        oDeleteS($table,$valuei); 
        
        echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_GET['Mode']=="delect-dev-kpi") 
{

        $table="tb_evaluation";
        $valuei="evaluation_code='".cut(TokenVerify($_GET['key'], $secret))."'";
        oDeleteS($table,$valuei); 

        $table="tb_evaluation_all";
        $valuei="evaluation_code='".cut(TokenVerify($_GET['key'], $secret))."'";
        oDeleteS($table,$valuei); 
        
        echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_GET['Mode']=="delHot") 
{

    
        $table="tb_kpi_master";
        $valuei="kpi_master_id='".$_GET['id']."'";
        oDeleteS($table,$valuei); 
        
        echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}

if($_GET['Mode']=="delectMasterId") 
{

    
        $table="tb_competency_master";
        $valuei="competency_master_id='".$_GET['id']."'";
        oDeleteS($table,$valuei); 
        
        echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_GET['Mode']=="delect-behavior-list") 
{
        $table="tb_assessment_time";
        $valuei="assessment_time_code='".cut(TokenVerify($_GET['key'], $secret))."'";
        oDeleteS($table,$valuei); 

        $table="tb_kpi_master";
        $valuei="assessment_time_code='".cut(TokenVerify($_GET['key'], $secret))."'";
        oDeleteS($table,$valuei); 
        

        $table="tb_evaluation";
        $valuei="evaluation_code='".cut(TokenVerify($_GET['key'], $secret))."'";
        oDeleteS($table,$valuei); 

        $table="tb_evaluation_all";
        $valuei="evaluation_code='".cut(TokenVerify($_GET['key'], $secret))."'";
        oDeleteS($table,$valuei); 
        
        echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_GET['Mode']=="delect-staff-list") 
{

    
        $table="tb_assessment_time";
        $valuei="assessment_time_code='".cut(TokenVerify($_GET['key'], $secret))."'";
        oDeleteS($table,$valuei); 

        $table="tb_kpi_master";
        $valuei="assessment_time_code='".cut(TokenVerify($_GET['key'], $secret))."'";
        oDeleteS($table,$valuei); 
        

        $table="tb_evaluation";
        $valuei="evaluation_code='".cut(TokenVerify($_GET['key'], $secret))."'";
        oDeleteS($table,$valuei); 

        $table="tb_evaluation_all";
        $valuei="evaluation_code='".cut(TokenVerify($_GET['key'], $secret))."'";
        oDeleteS($table,$valuei); 
        
        echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_GET['Mode']=="delect-competency") 
{

        $table="tb_evaluation_competency";
        $valuei="evaluation_competency_code='".cut(TokenVerify($_GET['key'], $secret))."'";
        oDeleteS($table,$valuei); 

        $table="tb_evaluation_competency_all";
        $valuei="evaluation_competency_code='".cut(TokenVerify($_GET['key'], $secret))."'";
        oDeleteS($table,$valuei); 
        
        echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_GET['Mode']=="delSetStaff") 
{

    // echo $_GET['type'];
    // echo "<br>";
    // echo cut(TokenVerify($_GET['key'], $secret));
    // echo "<br>";
    // echo $_GET['id'];
    // echo "<br>";
    if($_GET['type']=="com"){
        $table="tb_evaluation_competency";
        $valuei="evaluation_competency_code='".cut(TokenVerify($_GET['key'], $secret))."' AND evaluation_competency_id_staff ='".$_GET['id']."'";
        oDeleteS($table,$valuei); 

        $table="tb_evaluation_competency_all";
        $valuei="evaluation_competency_code='".cut(TokenVerify($_GET['key'], $secret))."' AND evaluation_competency_all_staff='".$_GET['id']."'";
        oDeleteS($table,$valuei); 
    }

    if($_GET['type']=="kpi"){
        $table="tb_evaluation";
        $valuei="evaluation_code='".cut(TokenVerify($_GET['key'], $secret))."' AND evaluation_id_staff ='".$_GET['id']."'";
        oDeleteS($table,$valuei); 

        $table="tb_evaluation_all";
        $valuei="evaluation_code='".cut(TokenVerify($_GET['key'], $secret))."' AND evaluation_all_staff='".$_GET['id']."'";
        oDeleteS($table,$valuei); 
    }
        
        echo "<script>alert('เรียบร้อย');window.opener.location.reload();window.close();</script>";
}

if($_GET['Mode']=="delect-competency-list") 
{
        $table="tb_assessment_time";
        $valuei="assessment_time_code='".cut(TokenVerify($_GET['key'], $secret))."'";
        oDeleteS($table,$valuei); 

        $table="tb_competency_master";
        $valuei="assessment_time_code='".cut(TokenVerify($_GET['key'], $secret))."'";
        oDeleteS($table,$valuei); 
        
        echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_GET['Mode']=="ckDelectL2") 
{

        $table="tb_division_director";
        $valuei="division_director_id='".cut(TokenVerify($_GET['key'], $secret))."'";
        oDeleteS($table,$valuei); 
        
        echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_GET['Mode']=="ckDelectL3") 
{

        $table="tb_division_manager_head";
        $valuei="division_manager_head_id='".cut(TokenVerify($_GET['key'], $secret))."'";
        oDeleteS($table,$valuei); 
        
        echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_GET['Mode']=="ckDelectL4") 
{

        $table="tb_division_manager_sub";
        $valuei="division_manager_sub_id='".cut(TokenVerify($_GET['key'], $secret))."'";
        oDeleteS($table,$valuei); 
        
        echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_GET['Mode']=="ckDelectL5") 
{

        $table="tb_depatment_head";
        $valuei="depatment_head_id='".cut(TokenVerify($_GET['key'], $secret))."'";
        oDeleteS($table,$valuei); 
        
        echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="upCsvFile") 
{
    $_SESSION['filename']=$_POST['filename'];
    $tmp_name = $_FILES["rm_card"]["tmp_name"];
    $file = $_FILES["rm_card"]["name"];
    $sizefile = $_FILES["rm_card"]["size"]; 
    $type= strrchr($file,".");
    $nn=$_SESSION['filename']."staffList";
    $name_m=$nn."$type";
    $_SESSION['fileNameCsv']=$name_m;
    $folder= "../kpi/import/";
    if(move_uploaded_file($tmp_name,"$folder$name_m")){
    $objCSV = fopen("../kpi/import/$name_m", "r");
    $i=1;
    while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
        $table="tb_staff";
        $column="staff_code, staff_password, staff_title,";
        $column.="staff_Name, staff_Sername, staff_department_id, staff_department_work_id,";
        $column.="staff_job_code, staff_job_description, staff_job_grade, staff_hospital_id,";
        $column.="staff_director_assistant_id, staff_division_director_id, staff_division_manager_head_id, staff_division_manager_sub_id,";
        $column.="staff_depatment_head_id, staff_start, staff_level_position, staff_end, staff_status, staff_level, fileTime";

        $valuei="'".$objArr[1]."', '000000', '".$objArr[3]."', '".$objArr[4]."',"; 
        $valuei.="'".$objArr[5]."', '".$objArr[6]."', '".$objArr[7]."', '".$objArr[8]."',"; 
        $valuei.="'".$objArr[9]."', '".$objArr[10]."', '".$objArr[11]."', '".$objArr[12]."',"; 
        $valuei.="'".$objArr[13]."', '".$objArr[14]."', '".$objArr[15]."', '".$objArr[16]."',"; 
        $valuei.="'".$objArr[17]."', '".$objArr[18]."', '".$objArr[19]."', '".$objArr[20]."', '".$objArr[21]."', '".$_SESSION['filename']."'"; 

        
        oInsert($table,$column,$valuei);
    } 
}

        echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="upCsvFileMasterKpi") 
{
    $_SESSION['filename']=$_POST['filename'];
    $tmp_name = $_FILES["rm_card"]["tmp_name"];
    $file = $_FILES["rm_card"]["name"];
    $sizefile = $_FILES["rm_card"]["size"]; 
    $type= strrchr($file,".");
    $nn=$_SESSION['filename']."masterKpi";
    $name_m=$nn."$type";
    $_SESSION['fileNameCsv']=$name_m;
    $folder= "../kpi/import/";
    if(move_uploaded_file($tmp_name,"$folder$name_m")){
    $objCSV = fopen("../kpi/import/$name_m", "r");
    $i=1;
    while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {

        $table="tb_kpi_master_in";
        $column="kpi_master_in_type, kpi_master_in_groub, kpi_master_in_factor,";
        $column.="kpi_master_in_name, kpi_master_in_weight, kpi_master_in_target,";
        $column.="kpi_master_in_standard_1, kpi_master_in_standard_2, kpi_master_in_standard_3,";
        $column.="kpi_master_in_standard_4, kpi_master_in_standard_5, fileTime";

        $valuei="'".$objArr[1]."', '".$objArr[2]."', '".$objArr[3]."', "; 
        $valuei.="'".$objArr[4]."', '".$objArr[5]."', '".$objArr[6]."',"; 
        $valuei.="'".$objArr[7]."', '".$objArr[8]."', '".$objArr[9]."', "; 
        $valuei.="'".$objArr[10]."', '".$objArr[11]."', '".$_SESSION['filename']."' ";  
        
        oInsert($table,$column,$valuei); 
        } 
    }

        echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="upCsvFileMasterCompetency") 
{
    $_SESSION['filename']=$_POST['filename'];
    $tmp_name = $_FILES["rm_card"]["tmp_name"];
    $file = $_FILES["rm_card"]["name"];
    $sizefile = $_FILES["rm_card"]["size"]; 
    $type= strrchr($file,".");
    $nn=$_SESSION['filename']."masterKpi";
    $name_m=$nn."$type";
    $_SESSION['fileNameCsv']=$name_m;
    $folder= "../kpi/import/";
    if(move_uploaded_file($tmp_name,"$folder$name_m")){
    $objCSV = fopen("../kpi/import/$name_m", "r");
    $i=1;
    while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {

        $table="tb_competency_master_in";
        $column="competency_master_in_groub, competency_master_in_factor, competency_master_in_name,";
        $column.="competency_master_in_weight, competency_master_in_target, competency_master_in_example,";
        $column.="competency_master_in_status, fileTime";

        $valuei="'".$objArr[1]."', '".$objArr[2]."', '".$objArr[3]."', "; 
        $valuei.="'".$objArr[4]."', '".$objArr[5]."', '".$objArr[6]."',"; 
        $valuei.="'Y', '".$_SESSION['filename']."' ";   
        
        oInsert($table,$column,$valuei); 
        } 
    }

        echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="upCsvFilePosition") 
{
    $_SESSION['filename']=$_POST['filename'];
    $tmp_name = $_FILES["rm_card"]["tmp_name"];
    $file = $_FILES["rm_card"]["name"];
    $sizefile = $_FILES["rm_card"]["size"]; 
    $type= strrchr($file,".");
    $nn=$_SESSION['filename']."position";
    $name_m=$nn."$type";
    $_SESSION['fileNameCsv']=$name_m;
    $folder= "../kpi/import/";

    if(move_uploaded_file($tmp_name,"$folder$name_m")){

        
    $objCSV = fopen("../kpi/import/$name_m", "r");
    $i=1;
    while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {

        $table="tb_level_position";
        $column="level_position_code, level_position_name, level_position_status, fileTime";
        $valuei="'".$objArr[1]."', '".$objArr[2]."', '".$objArr[3]."','".$_SESSION['filename']."' ";    

        oInsert($table,$column,$valuei); 
        } 
    }

        echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="copyNewEven")
{
        $table="btModel";
        $column="bu_Id, md_Name, md_Start, md_End, md_Type";
        $valuei="'".$_SESSION['BU']['bd_Id']."','".$_POST['md_Name']."','".$_POST['md_Start']."',
        '".$_POST['md_End']."','".$_POST['md_Type']."'";
        $id=oInsert($table,$column,$valuei);
        $valuei="SELECT * FROM btBooth WHERE md_Id = '".$_POST['ct_Id']."' ORDER BY bb_Id ASC";
        foreach(c_scelectS($valuei) as $r)
        {
            $table="btBooth";
            $column="bu_Id, ct_Id, gu_Id, md_Id, bb_Name, bb_Price";
            $valuei="'".$r['bu_Id']."','".$r['ct_Id']."','".$r['gu_Id']."','$id','".$r['bb_Name']."','".$r['bb_Price']."'";
            
            oInsert($table,$column,$valuei);
        }
        echo "<script>history.back();</script>";
}
//Add New Even
if($_POST['Mode']=="addNewEven")
{
        $table="btModel";
        $column="bu_Id, md_Name, md_Start, md_End, md_Type";
        $valuei="'".$_SESSION['BU']['bd_Id']."','".$_POST['md_Name']."','".$_POST['md_Start']."',
        '".$_POST['md_End']."','".$_POST['md_Type']."'";
        $id=oInsert($table,$column,$valuei);
        $valuei="SELECT * FROM btBooth WHERE md_Id = '".$_POST['ct_Id']."' ORDER BY bb_Id ASC";
        for($i=1; $i<=$_POST['Numbe']; $i++)
        {
            $table="btBooth";
            $column="bu_Id, md_Id, bb_Name, bb_Price";
            $valuei="'".$_SESSION['BU']['bd_Id']."','$id','$i','".$_POST['bb_Price']."'";
            
            oInsert($table,$column,$valuei);
        }
        echo "<script>history.back();</script>";
}

if($_POST['Mode']=="addCodeTime") 
{
    //2019-01
    $_SESSION['time']['year']=substr($_POST['month'],0,4);
    $_SESSION['time']['month']=substr($_POST['month'],5,2);
    echo "<script>alert('เลือกเวลาการประเมิน');window.location='../kpi/kpi-hospitals.php';</script>";
    //echo "<script>alert('เลือกเวลาการประเมิน');window.location='../kpi/job-kpi.php';</script>";
}

if($_POST['Mode']=="test")
{
    if($_FILES["filUpload"]["tmp_name"]!="")
    { 
        $nn=date("YmdIsh");
        $tmp_name = $_FILES["filUpload"]["tmp_name"];
        $file = $_FILES["filUpload"]["name"];
        $sizefile = $_FILES["filUpload"]["size"]; 
        $type= strrchr($file,".");
        $name_m=$nn."$type";
        $folder= "../pic/";	
        move_uploaded_file($tmp_name,"$folder$name_m");
        $table="ao_Product";
        $valuei="ap_barCode='".$_POST['ap_barCode']."',ap_name='".$_POST['ap_name']."', ap_typeName='".$_POST['ap_typeName']."', 
        ap_picture='$name_m', ap_promotion='".$_POST['ap_promotion']."'
        where ap_id='".$_POST['ap_id']."' ";
        oUpdate($table,$valuei);
    }else{
        $table="ao_Product";
        $valuei="ap_barCode='".$_POST['ap_barCode']."',ap_name='".$_POST['ap_name']."', ap_typeName='".$_POST['ap_typeName']."', 
        ap_promotion='".$_POST['ap_promotion']."'
        where ap_id='".$_POST['ap_id']."' ";
        oUpdate($table,$valuei);
    }
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="ChangeTheValue")
{

        $table="tb_kpi_master";
        $valuei="kpi_master_weight='".$_POST['weightCh']."' where kpi_master_id='".$_POST['id']."' ";
        oUpdate($table,$valuei);
}
if($_POST['Mode']=="Reepass")
{

        $table="tb_staff";
        $valuei="staff_password='".$_POST['staff_password']."' where staff_id='".$_POST['id']."' ";
        oUpdate($table,$valuei);
        echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}
if($_POST['Mode']=="ChangeTheValuetarget")
{

        $table="tb_kpi_master";
        $valuei="kpi_master_target='".$_POST['targetCh']."' where kpi_master_id='".$_POST['id']."' ";
        oUpdate($table,$valuei);
}
if($_POST['Mode']=="ChangeTheValues")
{

        $table="tb_kpi_master";
        if($_POST['type']==1)
        {
            $valuei="kpi_master_standard_1='".$_POST['targetCh']."' where kpi_master_id='".$_POST['id']."' ";
        }
        if($_POST['type']==2)
        {
            $valuei="kpi_masterl_standard_2='".$_POST['targetCh']."' where kpi_master_id='".$_POST['id']."' ";
        }
        if($_POST['type']==3)
        {
            $valuei="kpi_master_standard_3='".$_POST['targetCh']."' where kpi_master_id='".$_POST['id']."' ";
        }
        if($_POST['type']==4)
        {
            $valuei="kpi_master_standard_4='".$_POST['targetCh']."' where kpi_master_id='".$_POST['id']."' ";
        }
        if($_POST['type']==5)
        {
            $valuei="kpi_master_standard_5='".$_POST['targetCh']."' where kpi_master_id='".$_POST['id']."' ";
        }
        
        oUpdate($table,$valuei);
}
if($_POST['Mode']=="ChangeTheValueCom")
{

        $table="tb_competency_master";
        $valuei="competency_master_weight='".$_POST['weightCh']."' where competency_master_id='".$_POST['id']."' ";
        oUpdate($table,$valuei);
}
if($_POST['Mode']=="ChangeTheValueTarget")
{

        $table="tb_competency_master";
        $valuei="competency_master_target='".$_POST['weightCh']."' where competency_master_id='".$_POST['id']."' ";
        oUpdate($table,$valuei);
}
if($_POST['Mode']=="edit_example")
{

        $table="tb_competency_master";
        $valuei="competency_master_example='".$_POST['competency_master_example']."' where competency_master_id='".$_POST['competency_master_id']."' ";
        oUpdate($table,$valuei);
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";
}