<?php 
include("connect.php");
include("class.php");
$secret="zoSCpass";
//ฟังชั้นเช็ค - 
function CheckValue($text)
{
	if(preg_match("/-/",$text))
    {
	 	return true;
	}
	else
	{
		return false;
	}	
}
//ฟังชั่นอักขละพิเศษ
function cutTextSpecial($str)
{
	$word=array("<", ">", "%","=",",");
	for($i=0;$i<count($word);$i++)
	{
		$str=str_replace($word[$i], "", $str);
	}
	return $str;
}
//แยกค่า

function asc($v1,$v2,$v3,$v4,$v5,$isVlue)
{
    //เช็คว่ามี - กลางหรือไม่ถ้า มีก็เข้าสู่การคิด
    if(CheckValue($v2))
    {
        if($isVlue<=$v1)
        {
            return 1;
        }
        else if($isVlue>=SplitValue($v2)[0] && $isVlue<=SplitValue($v2)[1])
        {
            return 2;
        }
        else if($isVlue>=SplitValue($v3)[0] && $isVlue<=SplitValue($v3)[1])
        {
            return 3;
        }
        else if($isVlue>=SplitValue($v4)[0] && $isVlue<=SplitValue($v4)[1])
        {
            return 4;
        }
        else if($isVlue>=$v5)
        {
            return 5;
        }
        else
        {
            return "Invalid value";
        }
        
    }
    else //การคำนวนเเบบจำนวนเต็ม < ไปหา >  
    {
        if($isVlue<$v1)
        {
            return 1;
        }
        else if($isVlue>=$v1 && $isVlue<$v2)
        {
            return (($isVlue-$v1)/($v2-$v1)+1);
        }
        else if($isVlue>=$v2 && $isVlue<$v3)
        {
            return (($isVlue-$v2)/($v3-$v2)+2);
        }
        else if($isVlue>=$v3 && $isVlue<$v4)
        {
            return (($isVlue-$v3)/($v4-$v3)+3);
        }
        else if($isVlue>=$v4 && $isVlue<$v5)
        {
            return (($isVlue-$v4)/($v5-$v4)+4);
        }
        else if($isVlue>=$v5)
        {
            return 5;
        }
        else
        {
            return "Invalid value";
        }
    }
}
function desc($v1,$v2,$v3,$v4,$v5,$isVlue)
{
    //เช็คว่ามี - กลางหรือไม่ถ้า มีก็เข้าสู่การคิด
    if(CheckValue($v2))
    {
        if($isVlue>=$v1)
        {
            return 1;
        }
        else if($isVlue>=SplitValue($v2)[0] && $isVlue<=SplitValue($v2)[1])
        {
            return 2;
        }
        else if($isVlue>=SplitValue($v3)[0] && $isVlue<=SplitValue($v3)[1])
        {
            return 3;
        }
        else if($isVlue>=SplitValue($v4)[0] && $isVlue<=SplitValue($v4)[1])
        {
            return 4;
        }
        else if($isVlue<=$v5)
        {
            return 5;
        }
        else
        {
            return "Invalid value";
        }
        
    }
    else //การคำนวนเเบบจำนวนเต็ม > ไปหา <
    {
        if($isVlue>=$v1)
        {
            return 1;
        }
        else if($isVlue<$v1 && $isVlue>=$v2)
        {
            return (($isVlue-$v1)/($v2-$v1)+1);
        }
        else if($isVlue<$v2 && $isVlue>=$v3)
        {
            return (($isVlue-$v2)/($v3-$v2)+2);
        }
        else if($isVlue<$v3 && $isVlue>=$v4)
        {
            return (($isVlue-$v3)/($v4-$v3)+3);
        }
        else if($isVlue<$v4 && $isVlue>=$v5)
        {
            return (($isVlue-$v4)/($v5-$v4)+4);
        }
        else if($isVlue<=$v5)
        {
            return 5;
        }
        else
        {
            return "Invalid value";
        }
    }
}
if($_POST['Mode']=="getScore"){
if($_POST['v1']<$_POST['v5'])
{
    $score=asc(cutTextSpecial($_POST['v1']),cutTextSpecial($_POST['v2']),
        cutTextSpecial($_POST['v3']),cutTextSpecial($_POST['v4']),cutTextSpecial($_POST['v5']),$_POST['id']);
}
else
{
    $score=desc(cutTextSpecial($_POST['v1']),cutTextSpecial($_POST['v2']),
        cutTextSpecial($_POST['v3']),cutTextSpecial($_POST['v4']),cutTextSpecial($_POST['v5']),$_POST['id']);
}
    
    if(isset($_POST['evaluation_id']))
    {
        $table="tb_evaluation";
        $valuei="evaluation_value='".$_POST['id']."', 
        evaluation_total_score = '".number_format($score*$_POST['Weight']/100, 2)."', 
        evaluation_value_score = '$scoreWeight' 
        where kpi_master_id='".$_POST['kpi_master_id']."'
        AND evaluation_year = '".$_POST['year']."' 
        AND evaluation_month = '".$_POST['month']."' 
        AND evaluation_id_staff = '".$_POST['idStaff']."'
        AND evaluation_id = '".$_POST['evaluation_id']."'
        "; 
        oUpdate($table,$valuei);
        //echo "YES";
    }
    else
    {
        $table="tb_evaluation";
        $valuei="evaluation_value='".$_POST['id']."', 
        evaluation_total_score = '".number_format($score*$_POST['Weight']/100, 2)."', 
        evaluation_value_score = '$scoreWeight' 
        where kpi_master_id='".$_POST['kpi_master_id']."'
        AND evaluation_year = '".$_POST['year']."' 
        AND evaluation_month = '".$_POST['month']."' 
        AND evaluation_id_staff = '".$_POST['idStaff']."'
        "; 
        oUpdate($table,$valuei);
        //echo "NO";
    }

    

    
    $valuei = "SELECT * FROM tb_evaluation_all WHERE evaluation_all_id = '".$_POST['evaluation_all_id']."'";
    $arr = c_scelectOne($valuei);
    if($_POST['typeIn']==1){

        if($_SESSION['time']['month']==01)
        {
            $valueAll = $arr['evaluation_all_month_1'];
        }
        if($_SESSION['time']['month']==02)
        {
            $valueAll = $arr['evaluation_all_month_1']+$arr['evaluation_all_month_2'];
        }
        if($_SESSION['time']['month']==03)
        {
            $valueAll = $arr['evaluation_all_month_1']+$arr['evaluation_all_month_2']+$arr['evaluation_all_month_3'];
        }
        if($_SESSION['time']['month']==04)
        {
            $valueAll = $arr['evaluation_all_month_1']+$arr['evaluation_all_month_2']+$arr['evaluation_all_month_3']+$arr['evaluation_all_month_4'];
        }
        if($_SESSION['time']['month']==05)
        {
            $valueAll = $arr['evaluation_all_month_1']+$arr['evaluation_all_month_2']+$arr['evaluation_all_month_3']+$arr['evaluation_all_month_4']+$arr['evaluation_all_month_5'];
        }
        if($_SESSION['time']['month']==06)
        {
            $valueAll = $arr['evaluation_all_month_1']+$arr['evaluation_all_month_2']+$arr['evaluation_all_month_3']+$arr['evaluation_all_month_4']+$arr['evaluation_all_month_5']+$arr['evaluation_all_month_6'];
        }
        if($_SESSION['time']['month']==07)
        {
            $valueAll = $arr['evaluation_all_month_1']+$arr['evaluation_all_month_2']+$arr['evaluation_all_month_3']+$arr['evaluation_all_month_4']+$arr['evaluation_all_month_5']+$arr['evaluation_all_month_6']+$arr['evaluation_all_month_7'];
        }
        if($_SESSION['time']['month']==08)
        {
            $valueAll = $arr['evaluation_all_month_1']+$arr['evaluation_all_month_2']+$arr['evaluation_all_month_3']+$arr['evaluation_all_month_4']+$arr['evaluation_all_month_5']+$arr['evaluation_all_month_6']+$arr['evaluation_all_month_7']+$arr['evaluation_all_month_8'];
        }
        if($_SESSION['time']['month']==09)
        {
            $valueAll = $arr['evaluation_all_month_1']+$arr['evaluation_all_month_2']+$arr['evaluation_all_month_3']+$arr['evaluation_all_month_4']+$arr['evaluation_all_month_5']+$arr['evaluation_all_month_6']+$arr['evaluation_all_month_7']+$arr['evaluation_all_month_8']+$arr['evaluation_all_month_9'];
        }
        if($_SESSION['time']['month']==10)
        {
            $valueAll = $arr['evaluation_all_month_1']+$arr['evaluation_all_month_2']+$arr['evaluation_all_month_3']+$arr['evaluation_all_month_4']+$arr['evaluation_all_month_5']+$arr['evaluation_all_month_6']+$arr['evaluation_all_month_7']+$arr['evaluation_all_month_8']+$arr['evaluation_all_month_9']+$arr['evaluation_all_month_10'];
        }
        if($_SESSION['time']['month']==11)
        {
            $valueAll = $arr['evaluation_all_month_1']+$arr['evaluation_all_month_2']+$arr['evaluation_all_month_3']+$arr['evaluation_all_month_4']+$arr['evaluation_all_month_5']+$arr['evaluation_all_month_6']+$arr['evaluation_all_month_7']+$arr['evaluation_all_month_8']+$arr['evaluation_all_month_9']+$arr['evaluation_all_month_10']+$arr['evaluation_all_month_11'];
        }
        if($_SESSION['time']['month']==12)
        {
            $valueAll = $arr['evaluation_all_month_1']+$arr['evaluation_all_month_2']+$arr['evaluation_all_month_3']+$arr['evaluation_all_month_4']+$arr['evaluation_all_month_5']+$arr['evaluation_all_month_6']+$arr['evaluation_all_month_7']+$arr['evaluation_all_month_8']+$arr['evaluation_all_month_9']+$arr['evaluation_all_month_10']+$arr['evaluation_all_month_11']+$arr['evaluation_all_month_12'];
        }
    }
    if($_POST['typeIn']==2){
        if($_SESSION['time']['month']==01)
        {
            $valueAll = $arr['evaluation_all_month_1'];
        }
        if($_SESSION['time']['month']==02)
        {
            $valueAll = ($arr['evaluation_all_month_1']+$arr['evaluation_all_month_2'])/2;
        }
        if($_SESSION['time']['month']==03)
        {
            $valueAll = ($arr['evaluation_all_month_1']+$arr['evaluation_all_month_2']+$arr['evaluation_all_month_3'])/3;
        }
        if($_SESSION['time']['month']==04)
        {
            $valueAll = ($arr['evaluation_all_month_1']+$arr['evaluation_all_month_2']+$arr['evaluation_all_month_3']+$arr['evaluation_all_month_4'])/4;
        }
        if($_SESSION['time']['month']==05)
        {
            $valueAll = ($arr['evaluation_all_month_1']+$arr['evaluation_all_month_2']+$arr['evaluation_all_month_3']+$arr['evaluation_all_month_4']+$arr['evaluation_all_month_5'])/5;
        }
        if($_SESSION['time']['month']==06)
        {
            $valueAll = ($arr['evaluation_all_month_1']+$arr['evaluation_all_month_2']+$arr['evaluation_all_month_3']+$arr['evaluation_all_month_4']+$arr['evaluation_all_month_5']+$arr['evaluation_all_month_6'])/6;
        }
        if($_SESSION['time']['month']==07)
        {
            $valueAll = ($arr['evaluation_all_month_1']+$arr['evaluation_all_month_2']+$arr['evaluation_all_month_3']+$arr['evaluation_all_month_4']+$arr['evaluation_all_month_5']+$arr['evaluation_all_month_6']+$arr['evaluation_all_month_7'])/7;
        }
        if($_SESSION['time']['month']==08)
        {
            $valueAll = ($arr['evaluation_all_month_1']+$arr['evaluation_all_month_2']+$arr['evaluation_all_month_3']+$arr['evaluation_all_month_4']+$arr['evaluation_all_month_5']+$arr['evaluation_all_month_6']+$arr['evaluation_all_month_7']+$arr['evaluation_all_month_8'])/8;
        }
        if($_SESSION['time']['month']==09)
        {
            $valueAll = ($arr['evaluation_all_month_1']+$arr['evaluation_all_month_2']+$arr['evaluation_all_month_3']+$arr['evaluation_all_month_4']+$arr['evaluation_all_month_5']+$arr['evaluation_all_month_6']+$arr['evaluation_all_month_7']+$arr['evaluation_all_month_8']+$arr['evaluation_all_month_9'])/9;
        }
        if($_SESSION['time']['month']==10)
        {
            $valueAll = ($arr['evaluation_all_month_1']+$arr['evaluation_all_month_2']+$arr['evaluation_all_month_3']+$arr['evaluation_all_month_4']+$arr['evaluation_all_month_5']+$arr['evaluation_all_month_6']+$arr['evaluation_all_month_7']+$arr['evaluation_all_month_8']+$arr['evaluation_all_month_9']+$arr['evaluation_all_month_10'])/10;
        }
        if($_SESSION['time']['month']==11)
        {
            $valueAll = ($arr['evaluation_all_month_1']+$arr['evaluation_all_month_2']+$arr['evaluation_all_month_3']+$arr['evaluation_all_month_4']+$arr['evaluation_all_month_5']+$arr['evaluation_all_month_6']+$arr['evaluation_all_month_7']+$arr['evaluation_all_month_8']+$arr['evaluation_all_month_9']+$arr['evaluation_all_month_10']+$arr['evaluation_all_month_11'])/11;
        }
        if($_SESSION['time']['month']==12)
        {
            $valueAll = ($arr['evaluation_all_month_1']+$arr['evaluation_all_month_2']+$arr['evaluation_all_month_3']+$arr['evaluation_all_month_4']+$arr['evaluation_all_month_5']+$arr['evaluation_all_month_6']+$arr['evaluation_all_month_7']+$arr['evaluation_all_month_8']+$arr['evaluation_all_month_9']+$arr['evaluation_all_month_10']+$arr['evaluation_all_month_11']+$arr['evaluation_all_month_12'])/12;
        }
    }
    
    $table="tb_evaluation_all";
    $valuei="evaluation_all_YTD='$valueAll' where evaluation_all_id = '".$_POST['evaluation_all_id']."' "; 
    oUpdate($table,$valuei);
    
    $json_data[]        = array(
        "score"         =>  number_format($score,2),
        "scoreAll"      =>  number_format($score*$_POST['Weight']/100, 2),
        "st"            =>  "Y",
        "scoreIn"       =>  $_POST['id'],
        "valueAll"      =>  $valueAll
        
        );
    $scoreWeight        =   number_format($score*$_POST['Weight']/100, 2);
    $score              =   number_format($score,2);
    
    echo json_encode($json_data);
}

if($_POST['Mode']=="getScoreInscore"){
if($_POST['v1']<$_POST['v5'])
{
    $score=asc(cutTextSpecial($_POST['v1']),cutTextSpecial($_POST['v2']),
        cutTextSpecial($_POST['v3']),cutTextSpecial($_POST['v4']),cutTextSpecial($_POST['v5']),$_POST['id']);
}
else
{
    $score=desc(cutTextSpecial($_POST['v1']),cutTextSpecial($_POST['v2']),
        cutTextSpecial($_POST['v3']),cutTextSpecial($_POST['v4']),cutTextSpecial($_POST['v5']),$_POST['id']);
}
    if(isset($_POST['evaluation_id']))
    {
        $table="tb_evaluation";
        $valuei="evaluation_value='".$_POST['id']."', evaluation_total_score = '".number_format($score*$_POST['Weight']/100, 2)."', evaluation_value_score = '$scoreWeight' 
        where kpi_master_id='".$_POST['kpi_master_id']."'
        AND evaluation_year = '".$_SESSION['time']['year']."' 
        AND evaluation_month = '".$_SESSION['time']['month']."' 
        AND evaluation_id_staff = '".$_POST['idStaff']."' 
        AND evaluation_id = '".$_POST['evaluation_id']."'
        "; 
        oUpdate($table,$valuei);
    }
    else
    {
        $table="tb_evaluation";
        $valuei="evaluation_value='".$_POST['id']."', evaluation_total_score = '".number_format($score*$_POST['Weight']/100, 2)."', evaluation_value_score = '$scoreWeight' 
        where kpi_master_id='".$_POST['kpi_master_id']."'
        AND evaluation_year = '".$_SESSION['time']['year']."' 
        AND evaluation_month = '".$_SESSION['time']['month']."' 
        AND evaluation_id_staff = '".$_POST['idStaff']."' "; 
        oUpdate($table,$valuei);
    }

    
        $json_data[] = array(
        "score" => number_format($score,2),
        "scoreAll" => number_format($score*$_POST['Weight']/100, 2),
        "st" => "Y",
        "scoreIn" => $_POST['id']
        );
    
    echo json_encode($json_data);
}
if($_POST['Mode']=="InSrcore")
{
    $table="tb_evaluation_all";
    $valuei="evaluation_all_scor='".$_POST['Srcore']."' where evaluation_all_id = '".$_POST['evaluation_all_id']."' "; 
    oUpdate($table,$valuei);
    
    $table="tb_evaluation";
    $valuei="evaluation_total_score='".$_POST['Srcore']."' where evaluation_id = '".$_POST['evaluation_id']."' "; 
    oUpdate($table,$valuei);
        $json_data[] = array(
        "st" => "Y"
        );
    echo json_encode($json_data);
}

if($_POST['Mode']=="In_scoreHospitals")
{
    //UPdate ค่า hospitals Kpis
    $valuei="SELECT staff_hospital_id FROM tb_staff WHERE staff_code = '".$_POST['id_staff']."'";
    $idHotspital = c_scelectOne($valuei);
    $valuei="SELECT staff_code FROM tb_staff WHERE staff_hospital_id = '".$idHotspital['staff_hospital_id']."'";
    foreach(c_scelectS($valuei) AS $key => $r)
    {
        $table="tb_evaluation_score";
        $valuei="   evaluation_score_kpi_hospitals  =   '".$_POST['Srcore']."' 
        where       evaluation_score_staff          =   '".$r['staff_code']."'
        AND         evaluation_score_year           =   '".$_SESSION['time']['year']."' 
        AND         evaluation_score_month          =   '".$_SESSION['time']['month']."'"; 
        oUpdate($table,$valuei);
        
    }
}
if($_POST['Mode']=="In_scoreDepartment")
{
    //UPdate ค่า hospitals Kpis
    $valuei="SELECT * FROM tb_staff WHERE staff_code = '".$_POST['id_staff']."'";
    $idHotspital = c_scelectOne($valuei);
    $valuei="
    SELECT  staff_code   FROM tb_staff 
    WHERE   staff_hospital_id               =   '".$idHotspital['staff_hospital_id']."'
    AND     staff_director_assistant_id     =   '".$idHotspital['staff_director_assistant_id']."'
    AND     staff_division_director_id      =   '".$idHotspital['staff_division_director_id']."'
    AND     staff_division_manager_head_id  =   '".$idHotspital['staff_division_manager_head_id']."'
    AND     staff_division_manager_sub_id   =   '".$idHotspital['staff_division_manager_sub_id']."'
    AND     staff_depatment_head_id         =   '".$idHotspital['staff_depatment_head_id']."'
    ";
    foreach(c_scelectS($valuei) AS $key => $r)
    {
        $table="tb_evaluation_score";
        $valuei="   evaluation_score_kpi_department  =   '".$_POST['Srcore']."' 
        where       evaluation_score_staff          =   '".$r['staff_code']."'
        AND         evaluation_score_year           =   '".$_SESSION['time']['year']."' 
        AND         evaluation_score_month          =   '".$_SESSION['time']['month']."'"; 
        oUpdate($table,$valuei);
        
    }
}
?>

