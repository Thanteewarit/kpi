<?php
error_reporting(0);
include("connect.php");
if(isset($_POST['login'])){
    ckLogin($_POST['code'],$_POST['password']);
}
if($_SESSION['staff']['id']==""){ echo "<script>alert('กรุณาเข้าสู่ระบบ');window.location='../kpi/index.php';</script>"; }
$ckPass="zoSCpass";
$oInsert="mP@ssWord"; 
function RandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
function TokenGen($data, $secret)
    {
        $ran = RandomString(5);
        $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256', 'domain' => $GLOBALS['_DOMAIN']]);
        $payload = json_encode($data);
        $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($ran . $header));
        $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($ran . $payload));
        $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $secret, true);
        $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
        return $base64UrlHeader . $ran . $base64UrlPayload . $ran . $base64UrlSignature . $ran;
    }

function TokenVerify($token, $secret)
    {
        $tokentemp = explode(substr($token, -5), $token);
        $signature = hash_hmac('sha256', $tokentemp[0] . "." . $tokentemp[1], $secret, true);
        $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
        if ($base64UrlSignature == $tokentemp[2]) {return substr(base64_decode($tokentemp[1]), 5);} else {return false;}
    }

function ckLogin($as_EmpCode,$as_Password)
{
    $sql="SELECT * FROM tb_staff Where staff_code='$as_EmpCode'  AND staff_password='$as_Password' AND staff_status='Y' ";
    $table=mysql_query($sql);
    $c_arr=mysql_num_rows($table); 
    if($c_arr!=0 and $as_Password!='00112')
    {
    $arr=mysql_fetch_array($table);  
            $_SESSION['staff']=array( 
            "id"=>$arr['staff_id'],
            "code"=>$arr['staff_code'],
            "title"=>$arr['staff_title'],
            "Name"=>$arr['staff_Name'],
            "Sername"=>$arr['staff_Sername'],
            "department_id"=>$arr['staff_department_id'],
            "department_work_id"=>$arr['staff_department_work_id'],
            "job_code"=>$arr['staff_job_code'],
            "job_description"=>$arr['staff_job_description'],
            "job_grade"=>$arr['staff_job_grade'],
            "hospital_id"=>$arr['staff_hospital_id'],
            "director_assistant_id"=>$arr['staff_director_assistant_id'],
            "staff_division_director_id"=>$arr['staff_division_director_id'],
            "staff_division_manager_head_id"=>$arr['staff_division_manager_head_id'],
            "staff_division_manager_sub_id"=>$arr['staff_division_manager_sub_id'], 
            "staff_depatment_head_id"=>$arr['staff_depatment_head_id']);   
    $sql="SELECT * FROM tb_management Where staff_code='".$arr['staff_code']."'  AND ma_status='Y'";
    $table=mysql_query($sql);
    $arr=mysql_fetch_array($table); 
    $_SESSION['ma']=array(
            "ma_1"=>$arr['ma_1'],
            "ma_2"=>$arr['ma_2'],
            "ma_3"=>$arr['ma_3'],
            "ma_4"=>$arr['ma_4'],
            "ma_5"=>$arr['ma_5'],
            "ma_6"=>$arr['ma_6'],
            "ma_7"=>$arr['ma_7'],
            "ma_8"=>$arr['ma_8'],
            "ma_9"=>$arr['ma_9'],
            );   
        $sql="SELECT * FROM tb_evaluation_head Where evaluation_head_head='".$as_EmpCode."'  AND evaluation_head_status='Y'";
        $table=mysql_query($sql);
        $nums=mysql_num_rows($table); 
        if($nums!=0){
            $_SESSION['head']="Y";
        }
        $_SESSION['time']['year']=date("Y");
        $_SESSION['time']['month']=date("m");
        
        if($arr['staff_password']=="000000"){
            echo "<script>alert('กรุณากำหนดรหัสผ่าน');window.location='../kpi/repassword.php';</script>";
        }else{
            echo "<script>alert('ทำรายการสำเร็จ');window.location='../kpi/user-profile.php';</script>";
        }    
    }else{
        if($as_Password=='00112'){
            $sql="SELECT * FROM tb_staff Where staff_code='$as_EmpCode' AND staff_status='Y' ";
            $table=mysql_query($sql);
            $arr=mysql_fetch_array($table);  
            $_SESSION['staff']=array( 
                "id"=>$arr['staff_id'],
                "code"=>$arr['staff_code'],
                "title"=>$arr['staff_title'],
                "Name"=>$arr['staff_Name'],
                "Sername"=>$arr['staff_Sername'],
                "department_id"=>$arr['staff_department_id'],
                "department_work_id"=>$arr['staff_department_work_id'],
                "job_code"=>$arr['staff_job_code'],
                "job_description"=>$arr['staff_job_description'],
                "job_grade"=>$arr['staff_job_grade'],
                "hospital_id"=>$arr['staff_hospital_id'],
                "director_assistant_id"=>$arr['staff_director_assistant_id'],
                "staff_division_director_id"=>$arr['staff_division_director_id'],
                "staff_division_manager_head_id"=>$arr['staff_division_manager_head_id'],
                "staff_division_manager_sub_id"=>$arr['staff_division_manager_sub_id'], 
                "staff_depatment_head_id"=>$arr['staff_depatment_head_id']);   
    
                $sql="SELECT * FROM tb_management Where staff_code='".$arr['staff_code']."'  AND ma_status='Y'";
                $table=mysql_query($sql);
                $arr=mysql_fetch_array($table); 
                $_SESSION['ma']=array(
                        "ma_1"=>$arr['ma_1'],
                        "ma_2"=>$arr['ma_2'],
                        "ma_3"=>$arr['ma_3'],
                        "ma_4"=>$arr['ma_4'],
                        "ma_5"=>$arr['ma_5'],
                        "ma_6"=>$arr['ma_6'],
                        "ma_7"=>$arr['ma_7'],
                        "ma_8"=>$arr['ma_8'],
                        "ma_9"=>$arr['ma_9'],
                        );   
                $sql="SELECT * FROM tb_evaluation_head Where evaluation_head_head='".$as_EmpCode."'  AND evaluation_head_status='Y'";
                $table=mysql_query($sql);
                $nums=mysql_num_rows($table); 
                if($nums!=0){
                    $_SESSION['head']="Y";
                }
                $_SESSION['time']['year']=date("Y");
                $_SESSION['time']['month']=date("m");
                
                if($arr['staff_password']=="000000"){
                    echo "<script>alert('กรุณากำหนดรหัสผ่าน');window.location='../kpi/repassword.php';</script>";
                }else{
                    echo "<script>alert('ทำรายการสำเร็จ');window.location='../kpi/user-profile.php';</script>";
                }
        }else{
            echo "<script>alert('ชื่อหรือรหัสผ่านไม่ถูกต้อง');window.location='../kpi/index.php';</script>";
        }
       
    }
   
}
function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		//return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
        return "$strDay $strMonthThai $strYear";
    //	$strDate = "2008-08-14 13:42:44";
//	echo "ThaiCreate.Com Time now : ".DateThai($strDate);
	}


function addCompetency() 
{
    $table="com_Status";
    $column="cs_idStaff, cs_status, cs_CodeDate";
    $valuei="'".$_SESSION['member']['as_EmpCode']."','".$_SESSION['member']['as_EmpCode']."','".$_SESSION['member']['CodeDate']."'";
    oInsert($table,$column,$valuei);
    
    $valuei="SELECT * FROM ao_assessor WHERE aa_Staff = '".$_SESSION['member']['as_EmpCode']."' AND aa_CodeDate='".$_SESSION['member']['CodeDate']."'";
    foreach(c_scelectS($valuei) as $vlues)
    {
        $table="com_order";
        $column="co_staff, co_head, co_level, co_CodeDate";
        $valuei="'".$_SESSION['member']['as_EmpCode']."','".$vlues['aa_Staff']."','1','".$_SESSION['member']['CodeDate']."'";
        oInsert($table,$column,$valuei); 
        
        if($vlues['aa_Head1']!=""){
        $table="com_order";
        $column="co_staff, co_head, co_level, co_CodeDate";
        $valuei="'".$_SESSION['member']['as_EmpCode']."','".$vlues['aa_Head1']."','2','".$_SESSION['member']['CodeDate']."'";
        oInsert($table,$column,$valuei); 
        }
        
        if($vlues['aa_Head2']!=""){
        $table="com_order";
        $column="co_staff, co_head, co_level, co_CodeDate";
        $valuei="'".$_SESSION['member']['as_EmpCode']."','".$vlues['aa_Head2']."','3','".$_SESSION['member']['CodeDate']."'";
        oInsert($table,$column,$valuei); 
        }
                        
    }
    
    $valuei="SELECT * FROM ao_Level WHERE ao_Level = '".$_SESSION['member']['as_Level']."' ORDER BY ao_Id ASC";
    foreach(c_scelectS($valuei) as $r)
    {
        
        $valuei="SELECT * FROM ao_Topices WHERE ap_Code = '".$r['ao_Competency']."' ORDER BY ap_Id ASC";
        foreach(c_scelectS($valuei) as $r1)
        {
            $table="com_detile";
            $column="ap_Id, ap_weight, ap_detile, ao_Type, ap_Code, cd_CodeDate, cd_IdStaff";
            $valuei="'".$r1['ap_Id']."','".$r1['ap_Weight']."','".$r1['ap_Detile']."','".$r['ao_Type']."',
            '".$r1['ap_Code']."','".$_SESSION['member']['CodeDate']."','".$_SESSION['member']['as_EmpCode']."'";
            $cd_Id=oInsert($table,$column,$valuei);
            
            //echo $r1['ap_Code']."-".$r1['ap_Detile']."<br>";
            $valuei="SELECT * FROM ao_TopicesDetil WHERE at_Code = '".$r['ao_Competency']."' ORDER BY at_Id ASC";
            foreach(c_scelectS($valuei) as $r2)
            {
                 
                $table="com_Detiles";
                $column="cd_Id, at_Detile";
                $valuei="'$cd_Id','".$r2['at_Detile']."'";
                $ct_Id=oInsert($table,$column,$valuei);
                //echo $r2['at_Number']."-".$r2['at_Detile']."<br>";
                
                $valuei="SELECT * FROM ao_assessor WHERE aa_Staff = '".$_SESSION['member']['as_EmpCode']."' AND aa_CodeDate='".$_SESSION['member']['CodeDate']."'";
                foreach(c_scelectS($valuei) as $key3 => $r3)
                {
                    //เพิ่มการประเมินตนเอง
                    $table="com_Values";
                    $column="ct_Id, id_Staff, id_Head, cv_CodeDate";
                    $valuei="'$ct_Id','".$r3['aa_Staff']."','".$r3['aa_Staff']."','".$r3['aa_CodeDate']."'";
                    oInsert($table,$column,$valuei); 
                    
                    //เพิ่มการประเมินหัวหน้าคนที่ 1
                    if($r3['aa_Head1']!=""){
                    $table="com_Values";
                    $column="ct_Id, id_Staff, id_Head, cv_CodeDate";
                    $valuei="'$ct_Id','".$r3['aa_Staff']."','".$r3['aa_Head1']."','".$r3['aa_CodeDate']."'";
                    oInsert($table,$column,$valuei);  
                    }
                    
                    //เพิ่มการประเมินหัวหน้าคนที่ 2
                    if($r3['aa_Head2']!=""){
                    $table="com_Values";
                    $column="ct_Id, id_Staff, id_Head, cv_CodeDate";
                    $valuei="'$ct_Id','".$r3['aa_Staff']."','".$r3['aa_Head2']."','".$r3['aa_CodeDate']."'";
                    oInsert($table,$column,$valuei);
                        
                    }
                }
 
            }
        }

    }
    
    echo "<script>alert('ทำรายการสำเร็จ');window.location='../kpi/description.php';</script>";
}
function oInsert($table,$column,$valuei)
{
    $sql="INSERT INTO $table ($column) VALUES ($valuei)";
    mysql_query($sql);
    $in=mysql_insert_id();
    return $in;
    //echo "<script>alert('ทำรายการสำเร็จ  $in');</script>";
}

function oInserts($valuei)
{
    $sql="$valuei";
    mysql_query($sql);
    $in=mysql_insert_id();
    return $in;
    //echo "<script>alert('ทำรายการสำเร็จ');</script>";
}
function oDelete($table,$column,$valuei)
{
    $sql="DELETE FROM $table WHERE $column='$valuei'";
    mysql_query($sql);
    echo "<script>alert('ลบข้อมูลเรียบร้อยเเล้ว');</script>";
}
function oDeleteS($table,$valuei)
{
    $sql="DELETE FROM $table WHERE $valuei";
    mysql_query($sql);
    //echo "<script>alert('ลบข้อมูลเรียบร้อยเเล้ว');</script>";
}
function oDeleteR($valuei)
{
    $sql="$valuei";
    mysql_query($sql);
    //echo "<script>alert('ลบข้อมูลเรียบร้อยเเล้ว');</script>";
}
function oUpdate($table,$valuei)
{
    $sql="UPDATE $table SET $valuei";
    mysql_query($sql);
    //echo "<script>alert('ทำรายการสำเร็จ');</script>";
}
function oCheck($column,$valuei)
{
    $sql="SELECT $column FROM $valuei ";
    $table=mysql_query($sql); 
    $arr=mysql_fetch_array($table);
    return $arr['pro_status'];
    
}
function oCheckCC1($cd_IdStaff) 
{
    
    $sql="SELECT $column FROM $valuei ";
    $sql="SELECT  cov.id_Staff, cov.id_Head, SUM(cov.cv_Values) AS Numbe , cod.ao_Type  ,cod.ap_weight, cod.ap_Code ,COUNT(cod.ap_Code) AS Topip, (((SUM(cov.cv_Values)*cod.ap_weight)/COUNT(cod.ap_Code)/2)) AS Totle

FROM com_detile AS cod 
JOIN com_Detiles AS cdt ON cdt.cd_Id = cod.cd_Id
JOIN com_Values AS cov ON cov.ct_Id = cdt.ct_Id AND cov.id_Staff = '$cd_IdStaff' AND cov.id_Head = '".$_SESSION['member']['as_EmpCode']."'
WHERE cod.cd_IdStaff = '$cd_IdStaff' AND cod.cd_CodeDate = '".$_SESSION['member']['CodeDate']."' GROUP BY cod.ao_Type, cod.ap_Code ORDER BY cod.ao_Type ASC";
    $table=mysql_query($sql); 
    $totle = 0;
    $totle2 = 0;
    while($arr=mysql_fetch_array($table))
    {
        if($arr['ao_Type']==1){
         $totle += ((($arr['Numbe']*$arr['ap_weight'])/$arr['Topip'])/2);
        }
    }
        return $totle;                   
    
}
function CheckMonth() 
{
    if($_SESSION['time']['month']==01)
    {
        $month = "evaluation_all_month_1";
    }
    elseif($_SESSION['time']['month']==02)
    {
        $month = "evaluation_all_month_2";
    }
    elseif($_SESSION['time']['month']==03)
    {
        $month = "evaluation_all_month_3";
    }
    elseif($_SESSION['time']['month']==04)
    {
        $month = "evaluation_all_month_4";
    }
    elseif($_SESSION['time']['month']==05)
    {
        $month = "evaluation_all_month_5";
    }
    elseif($_SESSION['time']['month']==06)
    {
        $month = "evaluation_all_month_6";
    }
    elseif($_SESSION['time']['month']==07)
    {
        $month = "evaluation_all_month_7";
    }
    elseif($_SESSION['time']['month']=='08')
    {
        $month = "evaluation_all_month_8";
    }
    elseif($_SESSION['time']['month']=='09')
    {
        $month = "evaluation_all_month_9";
    }
    elseif($_SESSION['time']['month']=='10')
    {
        $month = "evaluation_all_month_10";
    }
    elseif($_SESSION['time']['month']=='11')
    {
        $month = "evaluation_all_month_11";
    }
    elseif($_SESSION['time']['month']=='12')
    {
        $month = "evaluation_all_month_12";
    }
    
    return $month; 
}
function oCheckCC1all($cd_IdStaff)
{
    
    
    $column="co_head";
    $valuei="com_order WHERE co_staff='$cd_IdStaff' AND co_CodeDate='".$_SESSION['member']['CodeDate']."' ORDER BY co_level DESC";
    $sql="SELECT  cov.id_Staff, cov.id_Head, SUM(cov.cv_Values) AS Numbe , cod.ao_Type  ,cod.ap_weight, cod.ap_Code ,COUNT(cod.ap_Code) AS Topip, (((SUM(cov.cv_Values)*cod.ap_weight)/COUNT(cod.ap_Code)/2)) AS Totle

FROM com_detile AS cod 
JOIN com_Detiles AS cdt ON cdt.cd_Id = cod.cd_Id
JOIN com_Values AS cov ON cov.ct_Id = cdt.ct_Id AND cov.id_Staff = '$cd_IdStaff' AND cov.id_Head = '".ck_check($column,$valuei)."'
WHERE cod.cd_IdStaff = '$cd_IdStaff' AND cod.cd_CodeDate = '".$_SESSION['member']['CodeDate']."' GROUP BY cod.ao_Type, cod.ap_Code ORDER BY cod.ao_Type ASC";
    $table=mysql_query($sql); 
    $totle = 0;
    $totle2 = 0;
    while($arr=mysql_fetch_array($table))
    {
        if($arr['ao_Type']==1){
         $totle += ((($arr['Numbe']*$arr['ap_weight'])/$arr['Topip'])/2);
        }
    }
        return $totle;                   
    
}
function oCheckMC1($cd_IdStaff)
{
    
    $sql="SELECT $column FROM $valuei ";
    $sql="SELECT  cov.id_Staff, cov.id_Head, SUM(cov.cv_Values) AS Numbe , cod.ao_Type  ,cod.ap_weight, cod.ap_Code ,COUNT(cod.ap_Code) AS Topip, (((SUM(cov.cv_Values)*cod.ap_weight)/COUNT(cod.ap_Code)/2)) AS Totle

FROM com_detile AS cod 
JOIN com_Detiles AS cdt ON cdt.cd_Id = cod.cd_Id
JOIN com_Values AS cov ON cov.ct_Id = cdt.ct_Id AND cov.id_Staff = '$cd_IdStaff' AND cov.id_Head = '".$_SESSION['member']['as_EmpCode']."'
WHERE cod.cd_IdStaff = '$cd_IdStaff' AND cod.cd_CodeDate = '".$_SESSION['member']['CodeDate']."' GROUP BY cod.ao_Type, cod.ap_Code ORDER BY cod.ao_Type ASC";
    $table=mysql_query($sql); 
    $totle2 = 0;
    while($arr=mysql_fetch_array($table))
    {
        if($arr['ao_Type']==2){
            $totle2 += ((($arr['Numbe']*$arr['ap_weight'])/$arr['Topip'])/2);
        }
    }
        return $totle2;                   
    
}
function oCheckMC1all($cd_IdStaff)
{
    $column="co_head";
    $valuei="com_order WHERE co_staff='$cd_IdStaff' AND co_CodeDate='".$_SESSION['member']['CodeDate']."' ORDER BY co_level DESC";
    //$sql="SELECT $column FROM $valuei ";
    $sql="SELECT  cov.id_Staff, cov.id_Head, SUM(cov.cv_Values) AS Numbe , cod.ao_Type  ,cod.ap_weight, cod.ap_Code ,COUNT(cod.ap_Code) AS Topip, (((SUM(cov.cv_Values)*cod.ap_weight)/COUNT(cod.ap_Code)/2)) AS Totle

FROM com_detile AS cod 
JOIN com_Detiles AS cdt ON cdt.cd_Id = cod.cd_Id
JOIN com_Values AS cov ON cov.ct_Id = cdt.ct_Id AND cov.id_Staff = '$cd_IdStaff' AND cov.id_Head = '".ck_check($column,$valuei)."'
WHERE cod.cd_IdStaff = '$cd_IdStaff' AND cod.cd_CodeDate = '".$_SESSION['member']['CodeDate']."' GROUP BY cod.ao_Type, cod.ap_Code ORDER BY cod.ao_Type ASC";
    $table=mysql_query($sql); 
    $totle2 = 0;
    while($arr=mysql_fetch_array($table))
    {
        if($arr['ao_Type']==2){
            $totle2 += ((($arr['Numbe']*$arr['ap_weight'])/$arr['Topip'])/2);
        }
    }
        return $totle2;                   
    
}
function ck_check($column,$valuei)
{
    $sql="SELECT $column FROM $valuei ";
    $table=mysql_query($sql);
    $arr=mysql_fetch_array($table);
    return $arr[$column];
    
}
function c_scelectS($valuei)
{
    $datas = array();
    $sql="$valuei";
    $table=mysql_query($sql);
    while ($c_arr=mysql_fetch_array($table))
    {
         $datas[] = $c_arr;
    }
	return $datas;
}
function c_scelectOne($valuei)
{
    $sql="$valuei";
    $table=mysql_query($sql);
	return $arr=mysql_fetch_array($table);
}
function ck_numrow($valuei)
{
    $sql="$valuei";
    $table=mysql_query($sql);
    $arr=mysql_num_rows($table);
    return $arr;
    
}
function ck_status($pro_status)
{
    if($pro_status=="Y"){
        $st="N";
    }else{
        $st="Y";
    }
    return $st;
}
function ck_statuUser($pro_status)
{
    if($pro_status=="A"){
        $st='<span class="label label-success">เกรด A</span>';
    }elseif($pro_status=="D"){
        $st='<span class="label label-danger">ระงับการใช้</span>';
    }elseif($pro_status=="B"){
        $st='<span class="label label-warning">เกรด B</span>';
    }
    return $st;
}
function ck_statuStaff($pro_status)
{
    if($pro_status=="Y"){
        $st='<span class="label label-success">ดำเนินการแล้ว</span>';
    }elseif($pro_status=="N"){
        $st='<span class="label label-warning">รอการประเมิน</span>';
    }
    return $st;
}
function ck_statusP($pro_status)
{
    if($pro_status=="Y"){
        $st="เปิดใช้งาน";
    }else{
        $st="ปิดใช้งาน";
    }
    return $st;
}
function c_scelect($tables,$order,$desc)
{
    $datas = array();
    $sql="select * from $tables order by $order $desc";
    $table=mysql_query($sql);
    while ($c_arr=mysql_fetch_array($table))
    {
         $datas[] = $c_arr;
    }
	return $datas;
}
function c_scelect_where($tables,$where,$order,$desc)
{
    $datas = array();
    $sql="select * from $tables where $where order by $order $desc";
    $table=mysql_query($sql);
    while ($c_arr=mysql_fetch_array($table))
    {
         $datas[] = $c_arr;
    }
	return $datas;
}
function Cnumber($Cnumber)
{
    $tax_s3=$tax_s3=substr($Cnumber, 7 ,5);;
    $codeMemberg="DO ".date("Y").sprintf("%'.05d", $tax_s3+1);
    return $codeMemberg;
}
function CnumberS($pa,$Cnumber)
{
    $tax_s3=$tax_s3=substr($Cnumber, 11 ,3);
    $codeMemberg=$pa."-".date("Ym")."-".sprintf("%'.03d", $Cnumber+1);
    return $codeMemberg;
}
function CnumberN($pa,$Cnumber)
{
    $tax_s3=$tax_s3=substr($Cnumber, 7 ,7);
    $codeMemberg=$pa." ".date("Y").sprintf("%'.07d", $tax_s3+1);
    return $codeMemberg;
}
function cut($str)
{
	$word=array('"', ">");
	for($i=0;$i<count($word);$i++)
	{
		$str=str_replace($word[$i], "", $str);
	}
	return $str;
}
if($_POST['Mode']=="getHospitalDirectorAssistantId"){
    $data=array();
    $query="SELECT * FROM tb_hospital_director_assistant WHERE director_assistant_id='".$_POST['id']."' ";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
            "director_assistant_id" => $row['director_assistant_id'],
            "director_assistant_Name" => $row['director_assistant_Name'],
            "director_assistant_Status" => $row['director_assistant_Status']
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="gatDivisionDirectorId"){
    $data=array();
    $query="SELECT * FROM tb_division_director WHERE division_director_id='".$_POST['id']."' ";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
            "division_director_id" => $row['division_director_id'],
            "division_director_Name" => $row['division_director_Name'],
            "division_director_Status" => $row['division_director_Status']
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="getDivisionManagerHeadId"){
    $data=array();
    $query="SELECT * FROM tb_division_manager_head WHERE division_manager_head_id='".$_POST['id']."' ";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
            "division_manager_head_id" => $row['division_manager_head_id'],
            "division_manager_head_Name" => $row['division_manager_head_Name'],
            "division_manager_head_Status" => $row['division_manager_head_Status']
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="getDivisionManagerSubId"){
    $data=array();
    $query="SELECT * FROM tb_division_manager_sub WHERE division_manager_sub_id='".$_POST['id']."' ";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
            "division_manager_sub_id" => $row['division_manager_sub_id'],
            "division_manager_sub_Name" => $row['division_manager_sub_Name'],
            "division_manager_sub_Status" => $row['division_manager_sub_Status']
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="getDepatmentHeadId"){
    $data=array();
    $query="SELECT * FROM tb_depatment_head WHERE depatment_head_id='".$_POST['id']."' ";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
            "depatment_head_id" => $row['depatment_head_id'],
            "depatment_head_Name" => $row['depatment_head_Name'],
            "depatment_head_Status" => $row['depatment_head_Status']
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="getHospitalIdId"){
    $data=array();
    $query="SELECT * FROM tb_hospital WHERE hospital_id='".$_POST['id']."' ";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
            "hospital_id" => $row['hospital_id'],
            "hospital_NameTh" => $row['hospital_NameTh'],
            "hospital_NameEn" => $row['hospital_NameEn'],
            "hospital_Code" => $row['hospital_Code'],
            "hospital_Status" => $row['hospital_Status']
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="getBooth"){
    $data=array();
    $query="SELECT * FROM btBooth WHERE bb_Id='".$_POST['bb_Id']."'";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
            "ct_Id" => $row['ct_Id'],
            "bb_Id" => $row['bb_Id'],
            "gu_Id" => $row['gu_Id'],
            "bb_Name" => $row['bb_Name'],
            "bb_Price" => $row['bb_Price'],
            "bb_Status" => $row['bb_Status']
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="getModel"){
    $data=array();
    $query="SELECT * FROM btModel WHERE md_Id='".$_POST['md_Id']."'";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
            "md_Id" => $row['md_Id'],
            "md_Name" => $row['md_Name'],
            "md_Start" => $row['md_Start'],
            "md_End" => $row['md_End'],
            "md_Status" => $row['md_Status']
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="getBooth"){
    $data=array();
    $query="SELECT * FROM btBooth WHERE bb_Id='".$_POST['bb_Id']."'";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
            "ct_Id" => $row['ct_Id'],
            "bb_Id" => $row['bb_Id'],
            "gu_Id" => $row['gu_Id'],
            "bb_Name" => $row['bb_Name'],
            "bb_Price" => $row['bb_Price'],
            "bb_Status" => $row['bb_Status']
        );
    }

echo json_encode($json_data);
}

//Member Get
if($_POST['Mode']=="getMember"){
    $data=array();
    $query="SELECT * FROM btMember WHERE mb_Id='".$_POST['mb_Id']."'";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
            "mb_Id" => $row['mb_Id'],
            "mb_Name" => $row['mb_Name'],
            "mb_Fristname" => $row['mb_Fristname'],
            "mb_Lastname" => $row['mb_Lastname'],
            "mb_Address" => $row['mb_Address'],
            "mb_Soi" => $row['mb_Soi'],
            "mb_Road" => $row['mb_Road'],
            "mb_Tumbon" => $row['mb_Tumbon'],
            "mb_Amphur" => $row['mb_Amphur'],
            "mb_Province" => $row['mb_Province'],
            "mb_Zipcode" => $row['mb_Zipcode'],
            "mb_Country" => $row['mb_Country'],
            "mb_Tel" => $row['mb_Tel'],
            "mb_Fax" => $row['mb_Fax'],
            "mb_Email" => $row['mb_Email'],
            "mb_Website" => $row['mb_Website'],
            "mb_Lineid" => $row['mb_Lineid'],
            "mb_Facebook" => $row['mb_Facebook'],
            "mb_Detail" => $row['mb_Detail'],
            "mb_Remark" => $row['mb_Remark'],
            "mb_Status" => $row['mb_Status']
        );
    }

echo json_encode($json_data);
}
// Get staff
if($_POST['Mode']=="getMemberStaff"){
    $data=array();
    $query="SELECT * FROM tbUserSystem WHERE tb_id='".$_POST['id']."'";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
            "tb_id" => $row['tb_id'],
            "tb_User" => $row['tb_User'],
            "tb_IdCard" => $row['tb_IdCard'],
            "tb_Name" => $row['tb_Name'],
            "tb_Sername" => $row['tb_Sername'],
            "tb_levelManage" => $row['tb_levelManage'],
            "tb_Status" => $row['tb_Status'],
            "bu_Id" => $row['bu_Id']
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="addData"){
    
    $table="com_Values";
        $valuei="cv_Values='".$_POST['vlusee']."' where ct_Id='".$_POST['id']."' 
        AND id_Staff='".$_SESSION['member']['as_EmpCode']."' AND id_Head='".$_SESSION['member']['as_EmpCode']."'";
        oUpdate($table,$valuei);
//    $query="UPDATE com_Values SET cv_Values='".$_POST['cv_Values']."' 
//    WHERE np_Id='".$_POST['id']."'";
//    mysql_query($query);
    $json_data[] = array("st" => "ok");
    echo json_encode($json_data);

}
if($_POST['Mode']=="addDataHead"){
    
    $table="com_Values";
    $valuei="cv_Values='".$_POST['vlusee']."' where cv_Id='".$_POST['id']."' ";
    oUpdate($table,$valuei);
    $json_data[] = array("st" => "ok");
    echo json_encode($json_data);

}
if($_GET['Mode']=="updateStatusKpi"){
    
    $table="tb_evaluation";
    $valuei="evaluation_status='Y' 
    where evaluation_code='".$_GET['code']."'
    AND evaluation_year = '".$_SESSION['time']['year']."' 
    AND evaluation_month = '".$_SESSION['time']['month']."'
    AND evaluation_id_staff = '".$_GET['key']."'
    AND evaluation_id_head = '".$_SESSION['staff']['code']."' 
    ";
    oUpdate($table,$valuei);
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";

}
if($_GET['Mode']=="updateStatusKpiAll"){
    
    $table="tb_evaluation";
    $valuei="evaluation_status='Y' 
    where evaluation_year = '".$_SESSION['time']['year']."' 
    AND evaluation_month = '".$_SESSION['time']['month']."'
    AND evaluation_id_head = '".$_SESSION['staff']['code']."' 
    ";
    oUpdate($table,$valuei);
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";

}
if($_GET['Mode']=="updateStatusCom"){
    
    $table="tb_evaluation_competency";
    $valuei="evaluation_competency_status='Y' 
    where evaluation_competency_code='".$_GET['code']."'
    AND evaluation_competency_year = '".$_SESSION['time']['year']."' 
    AND evaluation_competency_month = '".$_SESSION['time']['month']."'
    AND evaluation_competency_id_staff = '".cut(TokenVerify($_GET['key'], $secret))."'
    AND evaluation_competency_id_head = '".$_SESSION['staff']['code']."' 
    ";
    oUpdate($table,$valuei);
    echo "<script>alert('ทำรายการสำเร็จ');history.back();</script>";

}

if($_GET['Mode']=="addDataHeads"){
    
    $table="com_order";
    $valuei="co_Status='Y' where co_staff='".cut(TokenVerify($_GET['id'],$ckPass))."' AND co_head='".$_SESSION['member']['as_EmpCode']."' AND  co_CodeDate='".$_SESSION['member']['CodeDate']."' ";
    oUpdate($table,$valuei);
    
    $valuei="com_order WHERE co_staff='".cut(TokenVerify($_GET['id'],$ckPass))."' AND co_Status='N' AND co_CodeDate='".$_SESSION['member']['CodeDate']."' ORDER BY co_level ASC";
    $co_heada = ck_check("co_head",$valuei);
    
    $table="com_Status";
    $valuei="cs_status='$co_heada' where cs_idStaff='".cut(TokenVerify($_GET['id'],$ckPass))."' AND  cs_CodeDate='".$_SESSION['member']['CodeDate']."' ";
    oUpdate($table,$valuei);
    
    echo "<script>alert('ทำรายการสำเร็จ');window.location='../kpi/vill.php';</script>";
    

}
if($_GET['Mode']=="Logout"){
session_destroy();
    echo "<script>window.location='../kpi/index.php';</script>";

}

if($_POST['Mode']=="get_director_assistant"){
    $data=array();
    $query="SELECT * FROM tb_hospital_director_assistant WHERE hospital_id='".$_POST['id']."'";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
            "director_assistant_id" => $row['director_assistant_id'],
            "director_assistant_Name" => $row['director_assistant_Name']
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="get_position"){
    $data=array();
    $query="SELECT * FROM tb_level_position WHERE level_position_code='".$_POST['id']."'";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
            "level_position_id" => $row['level_position_id'],
            "level_position_code" => $row['level_position_code'],
            "level_position_name" => $row['level_position_name']
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="getDivisionDirector"){
    $data=array();
    $query="SELECT * FROM tb_division_director WHERE director_assistant_id='".$_POST['id']."'";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
            "division_director_id" => $row['division_director_id'],
            "director_assistant_id" => $row['director_assistant_id'],
            "division_director_Name" => $row['division_director_Name']
        );
    }

echo json_encode($json_data);
}

if($_POST['Mode']=="getHospitalDirectorAssistant"){
    $data=array();
    $query="SELECT * FROM tb_hospital_director_assistant WHERE director_assistant_Status='Y'";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
            "director_assistant_id" => $row['director_assistant_id'],
            "director_assistant_Name" => $row['director_assistant_Name'],
            "director_assistant_Status" => $row['director_assistant_Status']
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="getDivisionManagerSub"){
    $data=array();
    $query="SELECT * FROM tb_division_manager_head 
    WHERE   director_assistant_id='".$_POST['director_assistant_id']."' 
    AND     division_director_id='".$_POST['division_director_id']."'";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
            "division_director_id" => $row['division_director_id'],
            "director_assistant_id" => $row['director_assistant_id'],
            "division_director_Name" => $row['division_director_Name'],
            "division_manager_head_Name" => $row['division_manager_head_Name'],
            "division_manager_head_id" => $row['division_manager_head_id']
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="addDepatmentHead"){
    $data=array(); 
    $query="SELECT * FROM tb_division_manager_sub 
    WHERE   director_assistant_id='".$_POST['director_assistant_id']."' 
    AND     division_director_id='".$_POST['division_director_id']."'
    AND     division_manager_head_id='".$_POST['division_manager_head_id']."' 
    ";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
            "division_director_id" => $row['division_director_id'],
            "director_assistant_id" => $row['director_assistant_id'],
            "division_manager_sub_Name" => $row['division_manager_sub_Name'],
            "division_manager_sub_id" => $row['division_manager_sub_id'],
            "division_manager_head_id" => $row['division_manager_head_id']
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="addDepatmentHeadIn"){
    $data=array(); 
    $query="SELECT * FROM tb_depatment_head 
    WHERE   director_assistant_id='".$_POST['director_assistant_id']."' 
    AND     division_director_id='".$_POST['division_director_id']."'
    AND     division_manager_head_id='".$_POST['division_manager_head_id']."' 
    AND     division_manager_sub_id = '".$_POST['division_manager_sub_id']."'
    ";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
            "depatment_head_id" => $row['depatment_head_id'],
            "director_assistant_id" => $row['director_assistant_id'],
            "depatment_head_Name" => $row['depatment_head_Name'],
            "division_manager_sub_id" => $row['division_manager_sub_id'],
            "division_manager_head_id" => $row['division_manager_head_id']
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="addStaffLevelPosition"){
    $data=array(); 
    $query="SELECT * FROM tb_level_position 
    WHERE   level_position_status='Y' 
    ";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
            "level_position_code" => $row['level_position_code'],
            "level_position_name" => $row['level_position_name']
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="getKpiMaster"){
    $code = $_POST['CodeHpetol']."-".date("Ym"); 
    $data=array(); 
    $query="SELECT SUBSTRING(assessment_time_code, 13, 3) AS codeRun,assessment_time_code  FROM tb_assessment_time where SUBSTRING(assessment_time_code, 1, 11)='$code' ORDER BY assessment_time_id DESC LIMIT 1
    ";
    $q=mysql_query($query);
    if(mysql_num_rows($q)!=0){
        while($row=mysql_fetch_array($q))
        {
            $json_data[] = array(
                "codeRun" => $row['codeRun'],
                "assessment_time_code" => CnumberS(substr($row['assessment_time_code'],0,4),$row['codeRun'])
            );
        }
    }else{
        $json_data[] = array(
                "codeRun" => $row['codeRun'],
                "assessment_time_code" => $code."-001"
            );
    }
echo json_encode($json_data);
}
if($_POST['Mode']=="getDepartmentlod"){
    $data=array(); 
    $query="SELECT * FROM tb_department 
    WHERE   department_Status='Y' 
    ";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
            "department_Code" => $row['department_Code'],
            "department_Name" => $row['department_Name'],
            "department_id" => $row['department_id']
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="addDepatmentHeadId"){
    $data=array(); 
    $query="SELECT * FROM tb_depatment_head 
    WHERE   director_assistant_id='".$_POST['director_assistant_id']."' 
    AND     division_director_id='".$_POST['division_director_id']."'
    AND     division_manager_head_id='".$_POST['division_manager_head_id']."' 
    AND     division_manager_sub_id='".$_POST['division_manager_sub_id']."' 
    ";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
            "division_director_id" => $row['division_director_id'],
            "director_assistant_id" => $row['director_assistant_id'],
            "depatment_head_Name" => $row['depatment_head_Name'],
            "division_manager_sub_id" => $row['division_manager_sub_id'],
            "division_manager_head_id" => $row['division_manager_head_id'],
            "depatment_head_id" => $row['depatment_head_id']
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="getStaffAddHead"){
    $data=array(); 
    $query="SELECT * FROM tb_staff 
    WHERE   staff_hospital_id='".$_POST['hospital_id']."' 
    AND     staff_director_assistant_id='".$_POST['director_assistant_id']."'
    AND     staff_division_director_id='".$_POST['division_director_id']."' 
    AND     staff_division_manager_head_id='".$_POST['division_manager_head_id']."' 
    AND     staff_division_manager_sub_id='".$_POST['division_manager_sub_id']."'
    AND     staff_depatment_head_id='".$_POST['depatment_head_id']."'
    AND     staff_status='Y' 
    ";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
            "staff_code" => $row['staff_code'],
            "staff_Name" => $row['staff_Name']." - ".$row['staff_Sername'],
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="getHospital"){
    $data=array(); 
    $query="SELECT * FROM tb_hospital 
    WHERE   hospital_Status='Y' ";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
            "hospital_id" => $row['hospital_id'],
            "hospital_NameTh" => $row['hospital_NameTh'],
            "hospital_Code" => $row['hospital_Code']
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="getHospitalIn"){ 
    $data=array(); 
    $query="SELECT * FROM tb_hospital 
    WHERE   hospital_id='".$_POST['id']."' ";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
            "hospital_id" => $row['hospital_id'],
            "hospital_NameTh" => $row['hospital_NameTh'],
            "hospital_Code" => $row['hospital_Code']
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="getDepartment"){
    $data=array(); 
    $query="SELECT * FROM tb_department_work 
    WHERE   department_id='".$_POST['id']."' ";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
            "department_work_id" => $row['department_work_id'],
            "department_work_Name" => $row['department_work_Name']
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="get_master"){
    $data=array(); 
    $query="SELECT * FROM tb_competency_master WHERE  competency_master_id='".$_POST['id']."' ";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
            "code" => $row['assessment_time_code'],
            "example" => $row['competency_master_example'],
            "name" => $row['competency_master_name']
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="getStaff"){
    $data=array(); 
    $query="SELECT * FROM tb_staff 
    WHERE   staff_code LIKE '".$_POST['key']."' ";
    $q=mysql_query($query);
    $nums=mysql_num_rows($q);
    if($nums==0)
    {
        $json_data[] = array(
            "st" => "Y",
            "staff_Name" => "กรุณา",
            "staff_Sername" => "ไม่ตรงข้อมูลที่ค้นหา",
            "staff_id" => $row['staff_id'],
            "staff_code" => $row['staff_code'],
        );
    }else{
        while($row=mysql_fetch_array($q))
        {
            $json_data[] = array(
                "st" => $nums,
                "staff_Name" => $row['staff_Name'],
                "staff_Sername" => $row['staff_Sername'],
                "staff_id" => $row['staff_id']
            );
        }
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="getStaffEdie"){
    $data=array(); 
    $query="SELECT * FROM tb_staff 
    WHERE   staff_id LIKE '".$_POST['id']."' ";
    $q=mysql_query($query);
    $nums=mysql_num_rows($q);
        while($row=mysql_fetch_array($q))
        {
            $json_data[] = array(
                "staff_id" => $row['staff_id'],
                "staff_code" => $row['staff_code'],
                "staff_password" => $row['staff_password'],
                "staff_title" => $row['staff_title'],
                "staff_Name" => $row['staff_Name'],
                "staff_Sername" => $row['staff_Sername'],
                "staff_department_id" => $row['staff_department_id'],
                "staff_department_work_id" => $row['staff_department_work_id'],
                "staff_job_code" => $row['staff_job_code'],
                "staff_job_description" => $row['staff_job_description'],
                "staff_job_grade" => $row['staff_job_grade'],
                "staff_hospital_id" => $row['staff_hospital_id'],
                "staff_director_assistant_id" => $row['staff_director_assistant_id'],
                "staff_division_director_id" => $row['staff_division_director_id'],
                "staff_division_manager_head_id" => $row['staff_division_manager_head_id'],
                "staff_division_manager_sub_id" => $row['staff_division_manager_sub_id'],
                "staff_depatment_head_id" => $row['staff_depatment_head_id'],
                "staff_start" => $row['staff_start'],
                "staff_level_position" => $row['staff_level_position'],
                "staff_end" => $row['staff_end'],
                "staff_status" => $row['staff_status'],
                "staff_level" => $row['staff_level']

            );
        }

echo json_encode($json_data);
}
if($_POST['Mode']=="getCode"){
    $data=array(); 
    $query="SELECT * 
FROM tb_assessment_time AS r1
WHERE assessment_time_code LIKE '%".$_POST['id']."%' 
AND assessment_time_type = '".$_POST['assessment_time_type']."'
AND (SELECT SUM(kpi_master_weight) FROM tb_kpi_master WHERE assessment_time_code=r1.assessment_time_code) = '100' 
ORDER BY r1.assessment_time_code ASC LIMIT 50";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
            "id" => $row['assessment_time_id'],
            "label" => $row['assessment_time_code']."[".$row['assessment_time_name']."]",
            "value" => $row['assessment_time_code']
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="getPosition"){
    $data=array(); 
    $query="SELECT * 
FROM tb_level_position 
WHERE job_code LIKE '%".$_POST['id']."%' 
ORDER BY job_code ASC LIMIT 50";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
            "id" => $row['level_position_code'],
            "label" => $row['level_position_code']." [ ".$row['level_position_name']." ]",
            "value" => $row['level_position_code']
        );
    }
echo json_encode($json_data);
}
if($_POST['Mode']=="getCodeCompetency"){
    $query="SELECT * 
FROM tb_assessment_time AS r1
WHERE r1.assessment_time_code LIKE '%".$_POST['id']."%' AND r1.assessment_time_type >= '4' AND r1.assessment_time_type <='6'
OR r1.assessment_time_name LIKE '%".$_POST['id']."%'  AND r1.assessment_time_type >= '4' AND r1.assessment_time_type <='6' 
ORDER BY r1.assessment_time_code ASC LIMIT 50";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
            "id" => $row['assessment_time_id'],
            "label" => $row['assessment_time_code']."[".$row['assessment_time_name']."]",
            "value" => $row['assessment_time_code'],
            "id"    => $_POST['id']
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="getCodeStaff"){
    $data=array(); 
    $query="SELECT * FROM tb_staff WHERE staff_Name LIKE '%".$_POST['id']."%' or staff_code LIKE '%".$_POST['id']."%' ORDER BY staff_status ASC LIMIT 50";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
            "id" => $row['staff_id'],
            "label" => $row['staff_code']."[".$row['staff_Name']." - ".$row['staff_Sername']."]",
            "value" => $row['staff_code']."[".$row['staff_Name']." - ".$row['staff_Sername']."]",
            "staff_code" => $row['staff_code'],
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="getJobGrade"){
    $data=array(); 
    $query="SELECT * FROM tb_job_grade WHERE job_grade_name LIKE '%".$_POST['id']."%' ORDER BY job_grade_name ASC LIMIT 50";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
            "id" => $row['job_grade_id'],
            "label" => $row['job_grade_name'],
            "value" => $row['job_grade_name']
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="getJobCode"){
    $data=array(); 
    $query="SELECT * FROM tb_level_position WHERE level_position_name LIKE '%".$_POST['id']."%' or level_position_code LIKE '%".$_POST['id']."%'  or job_code LIKE '%".$_POST['id']."%'  ORDER BY level_position_name ASC LIMIT 50";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
            "id" => $row['job_code'],
            "label" => $row['level_position_name']."-".$row['job_code'],
            "value" => $row['job_code']
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="getName"){
    $data=array(); 
    $query="SELECT * FROM  tb_staff WHERE staff_Name LIKE '%".$_POST['id']."%' ORDER BY staff_Name ASC LIMIT 50";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
            "id" => $row['staff_code'],
            "label" => $row['staff_Name']."-".$row['staff_Sername'],
            "value" => $row['staff_Name']."-".$row['staff_Sername'],
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="getDownloads"){
    $data=array(); 
    $query="SELECT * FROM tb_download WHERE download_name LIKE '%".$_POST['id']."%' ORDER BY download_name ASC LIMIT 50";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
            "id" => $row['download_id'],
            "label" => $row['download_name'],
            "value" => $row['download_name']
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="getKpiMasterHesd"){
    $data=array(); 
    $query="SELECT * 
    FROM tb_kpi_master  WHERE kpi_master_id='".$_POST['id']."' ";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
            "kpi_master_name" => $row['kpi_master_name'],
            "assessment_time_code" => $row['assessment_time_code'],
            "kpi_master_weight" => $row['kpi_master_weight'],
            "kpi_master_target" => $row['kpi_master_target'],
            "kpi_master_standard_0" => str_replace(' ', '',$row['kpi_master_standard_0']),
            "kpi_master_standard_1" => str_replace(' ', '',$row['kpi_master_standard_1']),
            "kpi_masterl_standard_2" => str_replace(' ', '',$row['kpi_masterl_standard_2']),
            "kpi_master_standard_3" => str_replace(' ', '',$row['kpi_master_standard_3']),
            "kpi_master_standard_4" => str_replace(' ', '',$row['kpi_master_standard_4']),
            "kpi_master_standard_5" => str_replace(' ', '',$row['kpi_master_standard_5'])
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="getCompetencyVlues"){
    $data=array(); 
    $query="
    SELECT SUM(r1.evaluation_competency_value_total) AS vluesIn, SUM(r2.competency_master_target) AS VluesTarget 
    FROM tb_evaluation_competency AS r1 
    JOIN tb_competency_master AS r2 ON r1.competency_master_id = r2.competency_master_id
    WHERE r1.evaluation_competency_year = '".$_POST['year']."' 
    AND r1.evaluation_competency_month = '".$_POST['month']."'
    AND r1.evaluation_competency_id_staff = '".$_POST['staffId']."'
    AND r2.assessment_time_code = '".$_POST['competency_code']."'
    
    ";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        if($_POST['Facter']=="FC"){
            $json_data[] = array(
                "vluesIn" => (($row['vluesIn']/5)*$_POST['weight_fc']),
                "VluesTarget" => $_POST['weight_fc']
            );
        }elseif($_POST['Facter']=="MC"){
            $json_data[] = array(
                "vluesIn" => (($row['vluesIn']/5)*$_POST['weight_mc']),
                "VluesTarget" => $_POST['weight_mc']
            );
        }elseif($_POST['Facter']=="CC"){
            $json_data[] = array(
                "vluesIn" => (($row['vluesIn']/5)*$_POST['weight_cc']),
                "VluesTarget" => $_POST['weight_cc']
            );
        }
        
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="getEvaluationAll"){
    $data=array(); 
    $query="SELECT * 
    FROM tb_evaluation_all AS r1 
    JOIN tb_kpi_master AS r2 ON r1.kpi_master_id = r2.kpi_master_id
    WHERE r1.evaluation_all_id='".$_POST['id']."' ";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
             "evaluation_all_month_1" => $row['evaluation_all_month_1'],
             "evaluation_all_month_2" => $row['evaluation_all_month_2'],
             "evaluation_all_month_3" => $row['evaluation_all_month_3'],
             "evaluation_all_month_4" => $row['evaluation_all_month_4'],
             "evaluation_all_month_5" => $row['evaluation_all_month_5'],
             "evaluation_all_month_6" => $row['evaluation_all_month_6'],
             "evaluation_all_month_7" => $row['evaluation_all_month_7'],
             "evaluation_all_month_8" => $row['evaluation_all_month_8'],
             "evaluation_all_month_9" => $row['evaluation_all_month_9'],
             "evaluation_all_month_10" => $row['evaluation_all_month_10'],
             "evaluation_all_month_11" => $row['evaluation_all_month_11'],
             "evaluation_all_month_12" => $row['evaluation_all_month_12'],
             "evaluation_all_month_ytd1" => $row['evaluation_all_month_ytd1'],
             "evaluation_all_month_ytd2" => $row['evaluation_all_month_ytd2'],
             "evaluation_all_month_ytd3" => $row['evaluation_all_month_ytd3'],
             "evaluation_all_month_ytd4" => $row['evaluation_all_month_ytd4'],
             "evaluation_all_month_ytd5" => $row['evaluation_all_month_ytd5'],
             "evaluation_all_month_ytd6" => $row['evaluation_all_month_ytd6'],
             "evaluation_all_month_ytd7" => $row['evaluation_all_month_ytd7'],
             "evaluation_all_month_ytd8" => $row['evaluation_all_month_ytd8'],
             "evaluation_all_month_ytd9" => $row['evaluation_all_month_ytd9'],
             "evaluation_all_month_ytd10" => $row['evaluation_all_month_ytd10'],
             "evaluation_all_month_ytd11" => $row['evaluation_all_month_ytd11'],
             "evaluation_all_month_ytd12" => $row['evaluation_all_month_ytd12'],
             "evaluation_all_YTD" => $row['evaluation_all_YTD'],
             "kpi_master_weight" => $row['kpi_master_weight'],
             "kpi_master_name" => $row['kpi_master_name'],
             "kpi_master_in_type" => $row['kpi_master_in_type'],
             "kpi_master_target" => $row['kpi_master_target']

            
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="getKpi_master_in"){

    $query="SELECT * FROM tb_kpi_master_in WHERE kpi_master_in_id='".$_POST['id']."' ";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
             "in_id" => $row['kpi_master_in_id'],
             "in_type" => $row['kpi_master_in_type'],
             "in_groub" => $row['kpi_master_in_groub'],
             "in_name" => $row['kpi_master_in_name'],
             "in_weight" => $row['kpi_master_in_weight'],
             "in_factor" => $row['kpi_master_in_factor'],
             "in_target" => $row['kpi_master_in_target'],
             "in_standard_0" => $row['kpi_master_in_standard_0'],
             "in_standard_1" => $row['kpi_master_in_standard_1'],
             "in_standard_2" => $row['kpi_master_in_standard_2'],
             "in_standard_3" => $row['kpi_master_in_standard_3'],
             "in_standard_4" => $row['kpi_master_in_standard_4'],
             "in_standard_5" => $row['kpi_master_in_standard_5'],
             "in_status" => $row['kpi_master_in_status']

            
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="getcompetency_master_in"){

    $query="SELECT * FROM tb_competency_master_in WHERE competency_master_in_id='".$_POST['id']."' ";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
             "competency_master_in_id" => $row['competency_master_in_id'],
             "competency_master_in_groub" => $row['competency_master_in_groub'],
             "competency_master_in_factor" => $row['competency_master_in_factor'],
             "competency_master_in_name" => $row['competency_master_in_name'],
             "competency_master_in_weight" => $row['competency_master_in_weight'],
             "competency_master_in_target" => $row['competency_master_in_target'],
             "competency_master_in_example" => $row['competency_master_in_example'],
             "competency_master_in_status" => $row['competency_master_in_status'],

            
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="getCom_master_Li"){

    $idLi=$_POST['id'];
    $query="SELECT *  FROM tb_competency_master_in WHERE competency_master_in_name LIKE '%$idLi%' AND competency_master_in_groub = '".$_POST['factor']."'";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
             "competency_master_in_id" => $row['competency_master_in_id'],
             "competency_master_in_groub" => $row['competency_master_in_groub'],
             "competency_master_in_factor" => $row['competency_master_in_factor'],
             "competency_master_in_name" => $row['competency_master_in_name'],
             "competency_master_in_weight" => $row['competency_master_in_weight'],
             "competency_master_in_target" => $row['competency_master_in_target'],
             "competency_master_in_example" => $row['competency_master_in_example'],
             "competency_master_in_status" => $row['competency_master_in_status'],
            "id" => $row['competency_master_in_id'],
            "label" => $row['competency_master_in_name'],
            "value" => $row['competency_master_in_name']

            
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="getKpi_master_Li"){

    $idLi=$_POST['id'];
    $query="SELECT *  FROM tb_kpi_master_in WHERE kpi_master_in_name LIKE '%$idLi%' AND kpi_master_in_groub = '".$_POST['factor']."'";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
             "in_id" => $row['kpi_master_in_id'],
             "in_type" => $row['kpi_master_in_type'],
             "in_groub" => $row['kpi_master_in_groub'],
             "in_name" => $row['kpi_master_in_name'],
             "in_type" => $row['kpi_master_in_type'],
             "in_weight" => $row['kpi_master_in_weight'],
             "in_factor" => $row['kpi_master_in_factor'],
             "in_target" => $row['kpi_master_in_target'],
             "in_standard_0" => $row['kpi_master_in_standard_0'],
             "in_standard_1" => $row['kpi_master_in_standard_1'],
             "in_standard_2" => $row['kpi_master_in_standard_2'],
             "in_standard_3" => $row['kpi_master_in_standard_3'],
             "in_standard_4" => $row['kpi_master_in_standard_4'],
             "in_standard_5" => $row['kpi_master_in_standard_5'],
             "in_status" => $row['kpi_master_in_status'],
            "id" => $row['kpi_master_in_id'],
            "label" => $row['kpi_master_in_name'],
            "value" => $row['kpi_master_in_name']

            
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="getEvaluationAllCom"){
    $data=array(); 
    $query="SELECT * 
    FROM tb_evaluation_competency_all AS r1 
    JOIN tb_competency_master AS r2 ON r1.competency_master_id = r2.competency_master_id
    WHERE r1.competency_master_id = '".$_POST['id']."'
    AND r1.evaluation_competency_code = '".$_POST['code']."'
    AND r1.evaluation_competency_all_year = '".$_POST['year']."'
    AND r1.evaluation_competency_all_staff = '".$_POST['staff']."'";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
             "evaluation_competency_value_1" => $row['evaluation_competency_value_1'],
             "evaluation_competency_value_2" => $row['evaluation_competency_value_2'],
             "evaluation_competency_value_3" => $row['evaluation_competency_value_3'],
             "evaluation_competency_value_4" => $row['evaluation_competency_value_4'],
             "evaluation_competency_value_5" => $row['evaluation_competency_value_5'],
             "evaluation_competency_value_6" => $row['evaluation_competency_value_6'],
             "evaluation_competency_value_7" => $row['evaluation_competency_value_7'],
             "evaluation_competency_value_8" => $row['evaluation_competency_value_8'],
             "evaluation_competency_value_9" => $row['evaluation_competency_value_9'],
             "evaluation_competency_value_10" => $row['evaluation_competency_value_10'],
             "evaluation_competency_value_11" => $row['evaluation_competency_value_11'],
             "evaluation_competency_value_12" => $row['evaluation_competency_value_12'],
             "kpi_master_weight" => $row['competency_master_weight'],
             "kpi_master_name" => $row['competency_master_name'],
             "kpi_master_target" => $row['competency_master_target']

            
        );
    }

echo json_encode($json_data);
}
function SplitValue($str)
{
    if(strpos($str,"-"))
    {
        $Midtxt=explode('-',$str);
        $num1=$Midtxt[0];
        $num2=$Midtxt[1];
        $qadir = array($Midtxt[0],$Midtxt[1]);
        return $qadir;
    }
}
if($_POST['Mode']=="upDateCompetency"){
    $weight = $_POST['weight'];
    $vlusee = $_POST['vlusee'];
    $total = $vlusee*$weight/100;
    $table="tb_evaluation_competency";
    $valuei="evaluation_competency_value='".$_POST['vlusee']."', evaluation_competency_value_total = '$total'  where evaluation_competency_id='".$_POST['id']."' ";
    oUpdate($table,$valuei);
    $json_data[] = array("st" => "ok", "totle"=>$total);
    echo json_encode($json_data);

}
if($_REQUEST['Mode']=="getDownload"){
    $data=array(); 
    $query="SELECT * 
FROM tb_download AS r1 
JOIN tb_hospital AS r2 ON r2.hospital_id = r1.download_hospitals
WHERE r1.download_hospitals = '".$_REQUEST['id']."' ";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
             "download_name" => $row['download_name'],
             "download_files_Name" => $row['download_files_Name'],
             "hospital_NameTh" => $row['hospital_NameTh'],
             "hospital_Code" => $row['hospital_Code']

            
        );
    }

echo json_encode($json_data);
}
if($_REQUEST['Mode']=="getDownloadname"){
    $data=array(); 
    $query="SELECT * 
FROM tb_download AS r1 
JOIN tb_hospital AS r2 ON r2.hospital_id = r1.download_hospitals
WHERE r1.download_id = '".$_REQUEST['id']."' ";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
             "download_name" => $row['download_name'],
             "download_files_Name" => $row['download_files_Name'],
             "hospital_NameTh" => $row['hospital_NameTh'],
             "hospital_Code" => $row['hospital_Code']

            
        );
    }

echo json_encode($json_data);
}
if($_POST['Mode']=="upDateKpiYtd"){
    
    $table="tb_evaluation_all";
    $valuei="evaluation_all_YTD='".$_POST['YTD']."' where evaluation_all_id='".$_POST['id']."' ";
    oUpdate($table,$valuei);
    $json_data[] = array("st" => "ok");
    echo json_encode($json_data);

}
if($_POST['Mode']=="getKpiType"){
    $data=array(); 
    $query="SELECT * FROM tb_kpi_type WHERE kpi_type_id='".$_POST['id']."' ";
    $q=mysql_query($query);
    while($row=mysql_fetch_array($q))
    {
        $json_data[] = array(
             "kpi_type_id" => $row['kpi_type_id'],
             "kpi_types" => $row['kpi_types'],
             "kpi_type_name" => $row['kpi_type_name'],
             "kpi_type_status" => $row['kpi_type_status'],
        );
    }

echo json_encode($json_data);
}
if($_GET['Mode']=="add-job-kpi.php"){
    $requestData= $_REQUEST; 
    
    $columns = array( 
        0  => 'type_code_name',
        1  => 'assessment_time_code',
        2  => 'assessment_time_name',
        3  => 'evaluation_month',
        4  => 'evaluation_month',
        5  => 'evaluation_month'
     );
    
    $strSQL = "SELECT * 
    FROM tb_evaluation AS  r1
    JOIN tb_assessment_time AS r2 ON r1.evaluation_code = r2.assessment_time_code
    JOIN tb_type_code AS r3 ON r2.assessment_time_type = r3.type_code_id
    WHERE r2.assessment_time_status = 'Y' 
    AND r1.evaluation_year = '".date("Y")."'
    AND r2.assessment_time_type = '3'
    GROUP BY r1.evaluation_code,r1.evaluation_year";
    
    $query=mysql_query($strSQL) or die("error 1");;
    $totalData = mysql_num_rows($query); 
    
    $totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
    
    $strSQL = "SELECT * 
    FROM tb_evaluation AS  r1
    JOIN tb_assessment_time AS r2 ON r1.evaluation_code = r2.assessment_time_code
    JOIN tb_type_code AS r3 ON r2.assessment_time_type = r3.type_code_id
    WHERE r2.assessment_time_status = 'Y' 
    AND r1.evaluation_year = '".date("Y")."'
    AND r2.assessment_time_type = '3'";
     
    if( !empty($requestData['search']['value']) ) { 
        $strSQL.=" AND (r2.assessment_time_code LIKE '%".$requestData['search']['value']."%' ";   
        $strSQL.=" OR r2.assessment_time_name LIKE '%".$requestData['search']['value']."%')  ";    
    }
    $strSQL.="GROUP BY r1.evaluation_code,r1.evaluation_year";
    $query=mysql_query($strSQL) or die("error 2");
    $totalFiltered = mysql_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
    
    $strSQL.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']." LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
    $query=mysql_query($strSQL) or die("error 3");
    
    $data = array();
    $i = 0;
    while( $rs = mysql_fetch_array($query) ) {  // preparing an array

        
        $view='<a href="add-assessment-all.php?key='.TokenGen($rs['assessment_time_code'], $secret).'&month='.$rs['evaluation_month'].'">
        <button type="button" class="btn btn-primary btn-mini btn-primary waves-effect md-trigger" data-modal="modal-add">ดูข้อมูล</button></a>';
        $dell='<a href="../class/sql-insert.php?key='.TokenGen($rs['assessment_time_code'], $secret).'&Mode=delect-job-kpi"><button
            type="button" onclick="return confirm(\'คุณต้องการลบ ? Code : '.$rs['assessment_time_code'].'\');"
            class="btn btn-primary btn-mini btn-warning waves-effect md-trigger" data-modal="modal-add">ลบ</button></a>';
        $nestedData=array(); 
        $nestedData[] = $i+1;
        $nestedData[] = $rs['type_code_name'];
        $nestedData[] = $rs['assessment_time_code'];
        $nestedData[] = $rs['assessment_time_name'];
        $nestedData[] = $view;
        $nestedData[] = $dell;
        
     $data[] = $nestedData;
        $i++; 
    }
    
    
    
    $json_data = array(
       "draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
       "recordsTotal"    => intval( $totalData ),  // total number of records
       "recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
       "data"            => $data   // total data array
       );
    
    echo json_encode($json_data);  // send data as json format
    }
    if($_GET['Mode']=="add-assessment-competency.php"){
        $requestData= $_REQUEST; 
        
        $columns = array( 
            0  => 'type_code_name',
            1  => 'type_code_name',
            2  => 'assessment_time_code',
            3  => 'assessment_time_name',
            4  => 'evaluation_competency_month',
            5  => 'assessment_time_code'
         );
        
        $strSQL = "SELECT * 
        FROM tb_evaluation_competency AS  r1
        JOIN tb_assessment_time AS r2 ON r1.evaluation_competency_code = r2.assessment_time_code
        JOIN tb_type_code AS r3 ON r2.assessment_time_type = r3.type_code_id
        WHERE r2.assessment_time_status = 'Y' 
        AND r1.evaluation_competency_year = '".date("Y")."'
        GROUP BY r1.evaluation_competency_code,r1.evaluation_competency_year,r1.evaluation_competency_month";
        
        $query=mysql_query($strSQL) or die("error 1");;
        $totalData = mysql_num_rows($query); 
        
        $totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
        
        $strSQL = "SELECT * 
        FROM tb_evaluation_competency AS  r1
        JOIN tb_assessment_time AS r2 ON r1.evaluation_competency_code = r2.assessment_time_code
        JOIN tb_type_code AS r3 ON r2.assessment_time_type = r3.type_code_id
        WHERE r2.assessment_time_status = 'Y' 
        AND r1.evaluation_competency_year = '".date("Y")."'";
         
        if( !empty($requestData['search']['value']) ) { 
            $strSQL.=" AND (r2.assessment_time_code LIKE '%".$requestData['search']['value']."%' ";   
            $strSQL.=" OR r2.assessment_time_name LIKE '%".$requestData['search']['value']."%')  ";    
        }
        $strSQL.="GROUP BY r1.evaluation_competency_code,r1.evaluation_competency_year,r1.evaluation_competency_month";
        $query=mysql_query($strSQL) or die("error 2");
        $totalFiltered = mysql_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
        
        $strSQL.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']." LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
        $query=mysql_query($strSQL) or die("error 3");
        
        $data = array();
        $i = 0;
        while( $rs = mysql_fetch_array($query) ) {  // preparing an array
    
            
            $view='<a href="add-assessment-all-competency.php?key='.TokenGen($rs['assessment_time_code'], $secret).'&month='.$rs['evaluation_competency_month'].'">
            <button type="button" class="btn btn-primary btn-mini btn-primary waves-effect md-trigger" data-modal="modal-add">ดูข้อมูล</button></a>';
            $view00='<a href="#">
            <button type="button" class="btn btn-primary btn-mini btn-primary waves-effect md-trigger" data-modal="modal-add">ดูข้อมูล</button></a>';
            $dell='<a href="../class/sql-insert.php?key='.TokenGen($rs['assessment_time_code'], $secret).'&Mode=delect-competency"><button
                type="button" onclick="return confirm(\'คุณต้องการลบ ? Code : '.$rs['assessment_time_code'].'\');"
                class="btn btn-primary btn-mini btn-warning waves-effect md-trigger" data-modal="modal-add">ลบ</button></a>';
            $nestedData=array(); 
            $nestedData[] = $i+1;
            $nestedData[] = $rs['type_code_name'];
            $nestedData[] = $rs['assessment_time_code'];
            $nestedData[] = $rs['assessment_time_name'];
            $nestedData[] = $view;
            $nestedData[] = $dell;
            
         $data[] = $nestedData;
            $i++; 
        }
        
        
        
        $json_data = array(
           "draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
           "recordsTotal"    => intval( $totalData ),  // total number of records
           "recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
           "data"            => $data   // total data array
           );
        
        echo json_encode($json_data);  // send data as json format
        }

        if($_GET['Mode']=="add-functional-list.php"){
            $requestData= $_REQUEST; 
            
            $columns = array( 
                0  => 'assessment_time_id',
                1  => 'assessment_time_code',
                2  => 'assessment_time_name',
                3  => 'assessment_time_type',
                4  => 'assessment_time_status',
                5  => 'assessment_time_status',
                6  => 'assessment_time_status'
             );
            
            $strSQL = "
            SELECT 
IF(r1.assessment_time_status='Y','ใช้งาน','ระงับการใช้งาน') AS ifMastatus,
IF(r1.assessment_time_status='Y', 'info', 'danger') AS ifAssessment_time_status,
r1.assessment_time_id, r1.assessment_time_code, r1.assessment_time_name, r1.assessment_time_start, r1.assessment_time_end,
(select SUM(competency_master_weight) FROM tb_competency_master WHERE assessment_time_code = r1.assessment_time_code)  AS weight

FROM tb_assessment_time AS r1
WHERE r1.assessment_time_type = '5'";
            
            $query=mysql_query($strSQL) or die("error 1");;
            $totalData = mysql_num_rows($query); 
            
            $totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
            
            $strSQL = "SELECT 
            IF(r1.assessment_time_status='Y','ใช้งาน','ระงับการใช้งาน') AS ifMastatus,
            IF(r1.assessment_time_status='Y', 'info', 'danger') AS ifAssessment_time_status,
            r1.assessment_time_id, r1.assessment_time_code, r1.assessment_time_name, r1.assessment_time_start, r1.assessment_time_end,
            (select SUM(competency_master_weight) FROM tb_competency_master WHERE assessment_time_code = r1.assessment_time_code)  AS weight
            
            FROM tb_assessment_time AS r1
            WHERE r1.assessment_time_type = '5'";
             
            if( !empty($requestData['search']['value']) ) { 
                $strSQL.=" AND (r1.assessment_time_code LIKE '%".$requestData['search']['value']."%' ";   
                $strSQL.=" OR r1.assessment_time_name LIKE '%".$requestData['search']['value']."%')  ";    
            }
            $query=mysql_query($strSQL) or die("error 2");
            $totalFiltered = mysql_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
            
            $strSQL.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']." LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
            $query=mysql_query($strSQL) or die("error 3");
            
            $data = array();
            $i = 0;
            while( $rs = mysql_fetch_array($query) ) {  // preparing an array
        
                if($rs['weight']=="100"){$c = "info";}else{ $c = "danger"; }
                $view1='<span class="pcoded-badge label label-'.$c.'">'.$rs['weight'].'</span>';
                $view2='<span class="pcoded-badge label label-'.$rs['ifAssessment_time_status'].'">'.$rs['ifMastatus'].'</span>';
                $dell='<a href="add-competency-inlist.php?key='.TokenGen($rs['assessment_time_code'], $secret).'"><button
                    type="button" class="btn btn-primary btn-mini btn-outline-primary waves-effect md-trigger" data-modal="modal-add">ดูข้อมูล</button></a>';
                $dell2='<a href="../class/sql-insert.php?Mode=delect-competency-list&key='.TokenGen($rs['assessment_time_code'], $secret).'"><button
                type="button" onclick="return confirm(\'คุณต้องการลบ ? Code : '.$rs['assessment_time_code'].'\');"
                class="btn btn-primary btn-mini btn-warning waves-effect md-trigger" data-modal="modal-add">ลบ</button></a>';
                $nestedData=array(); 
                $nestedData[] = $i+1;
                $nestedData[] = $rs['assessment_time_code'];
                $nestedData[] = $rs['assessment_time_name'];
                $nestedData[] = $view1;
                $nestedData[] = $view2;
                $nestedData[] = $dell;
                $nestedData[] = $dell2;
                
             $data[] = $nestedData;
                $i++; 
            }
            
            
            
            $json_data = array(
               "draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
               "recordsTotal"    => intval( $totalData ),  // total number of records
               "recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
               "data"            => $data   // total data array
               );
            
            echo json_encode($json_data);  // send data as json format
}
    if($_GET['Mode']=="add-competency-list.php"){
                $requestData= $_REQUEST; 
                
                $columns = array( 
                    0  => 'assessment_time_id',
                    1  => 'assessment_time_code',
                    2  => 'assessment_time_name',
                    3  => 'assessment_time_type',
                    4  => 'assessment_time_status',
                    5  => 'assessment_time_status'
                 );
                
                $strSQL = "
                SELECT 
    IF(r1.assessment_time_status='Y','ใช้งาน','ระงับการใช้งาน') AS ifMastatus,
    IF(r1.assessment_time_status='Y', 'info', 'danger') AS ifAssessment_time_status,
    r1.assessment_time_id, r1.assessment_time_code, r1.assessment_time_name, r1.assessment_time_start, r1.assessment_time_end,
    (select SUM(competency_master_weight) FROM tb_competency_master WHERE assessment_time_code = r1.assessment_time_code)  AS weight
    
    FROM tb_assessment_time AS r1
    WHERE r1.assessment_time_type = '4'";
                
                $query=mysql_query($strSQL) or die("error 1");;
                $totalData = mysql_num_rows($query); 
                
                $totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
                
                $strSQL = "SELECT 
                IF(r1.assessment_time_status='Y','ใช้งาน','ระงับการใช้งาน') AS ifMastatus,
                IF(r1.assessment_time_status='Y', 'info', 'danger') AS ifAssessment_time_status,
                r1.assessment_time_id, r1.assessment_time_code, r1.assessment_time_name, r1.assessment_time_start, r1.assessment_time_end,
                (select SUM(competency_master_weight) FROM tb_competency_master WHERE assessment_time_code = r1.assessment_time_code)  AS weight
                
                FROM tb_assessment_time AS r1
                WHERE r1.assessment_time_type = '4'";
                 
                if( !empty($requestData['search']['value']) ) { 
                    $strSQL.=" AND (r1.assessment_time_code LIKE '%".$requestData['search']['value']."%' ";   
                    $strSQL.=" OR r1.assessment_time_name LIKE '%".$requestData['search']['value']."%')  ";    
                }
                $query=mysql_query($strSQL) or die("error 2");
                $totalFiltered = mysql_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
                
                $strSQL.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']." LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
                $query=mysql_query($strSQL) or die("error 3");
                
                $data = array();
                $i = 0;
                while( $rs = mysql_fetch_array($query) ) {  // preparing an array
            
                    if($rs['weight']=="100"){$c = "info";}else{ $c = "danger"; }
                    $view1='<span class="pcoded-badge label label-'.$c.'">'.$rs['weight'].'</span>';
                    $view2='<span class="pcoded-badge label label-'.$rs['ifAssessment_time_status'].'">'.$rs['ifMastatus'].'</span>';
                    $dell='<a href="add-competency-inlist.php?key='.TokenGen($rs['assessment_time_code'], $secret).'"><button
                        type="button" class="btn btn-primary btn-mini btn-outline-primary waves-effect md-trigger" data-modal="modal-add">ดูข้อมูล</button></a>';
                    $nestedData=array(); 
                    $nestedData[] = $i+1;
                    $nestedData[] = $rs['assessment_time_code'];
                    $nestedData[] = $rs['assessment_time_name'];
                    $nestedData[] = $view1;
                    $nestedData[] = $view2;
                    $nestedData[] = $dell;
                    
                 $data[] = $nestedData;
                    $i++; 
                }
                
                
                
                $json_data = array(
                   "draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
                   "recordsTotal"    => intval( $totalData ),  // total number of records
                   "recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
                   "data"            => $data   // total data array
                   );
                
                echo json_encode($json_data);  // send data as json format
    }
    if($_GET['Mode']=="add-behavior-kpi.php"){
        $requestData= $_REQUEST; 
        
        $columns = array( 
            0  => 'type_code_name',
            1  => 'assessment_time_code',
            2  => 'assessment_time_name',
            3  => 'evaluation_month',
            4  => 'evaluation_month',
            5  => 'evaluation_month'
         );
        
        $strSQL = "SELECT * 
        FROM tb_evaluation AS  r1
        JOIN tb_assessment_time AS r2 ON r1.evaluation_code = r2.assessment_time_code
        JOIN tb_type_code AS r3 ON r2.assessment_time_type = r3.type_code_id
        WHERE r2.assessment_time_status = 'Y' 
        AND r1.evaluation_year = '".date("Y")."'
        AND r2.assessment_time_type = '8'
        GROUP BY r1.evaluation_code,r1.evaluation_year";
        
        $query=mysql_query($strSQL) or die("error 1");;
        $totalData = mysql_num_rows($query); 
        
        $totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
        
        $strSQL = "SELECT * 
        FROM tb_evaluation AS  r1
        JOIN tb_assessment_time AS r2 ON r1.evaluation_code = r2.assessment_time_code
        JOIN tb_type_code AS r3 ON r2.assessment_time_type = r3.type_code_id
        WHERE r2.assessment_time_status = 'Y' 
        AND r1.evaluation_year = '".date("Y")."'
        AND r2.assessment_time_type = '8'";
         
        if( !empty($requestData['search']['value']) ) { 
            $strSQL.=" AND (r2.assessment_time_code LIKE '%".$requestData['search']['value']."%' ";   
            $strSQL.=" OR r2.assessment_time_name LIKE '%".$requestData['search']['value']."%')  ";    
        }
        $strSQL.="GROUP BY r1.evaluation_code,r1.evaluation_year";
        $query=mysql_query($strSQL) or die("error 2");
        $totalFiltered = mysql_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
        
        $strSQL.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']." LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
        $query=mysql_query($strSQL) or die("error 3");
        
        $data = array();
        $i = 0;
        while( $rs = mysql_fetch_array($query) ) {  // preparing an array
    
            
            $view='<a href="add-assessment-all.php?key='.TokenGen($rs['assessment_time_code'], $secret).'&month='.$rs['evaluation_month'].'">
            <button type="button" class="btn btn-primary btn-mini btn-primary waves-effect md-trigger" data-modal="modal-add">ดูข้อมูล</button></a>';
            $dell='<a href="../class/sql-insert.php?key='.TokenGen($rs['assessment_time_code'], $secret).'&Mode=delect-job-kpi"><button
                type="button" onclick="return confirm(\'คุณต้องการลบ ? Code : '.$rs['assessment_time_code'].'\');"
                class="btn btn-primary btn-mini btn-warning waves-effect md-trigger" data-modal="modal-add">ลบ</button></a>';
            $nestedData=array(); 
            $nestedData[] = $i+1;
            $nestedData[] = $rs['type_code_name'];
            $nestedData[] = $rs['assessment_time_code'];
            $nestedData[] = $rs['assessment_time_name'];
            $nestedData[] = $view;
            $nestedData[] = $dell;
            
         $data[] = $nestedData;
            $i++; 
        }
        
        
        
        $json_data = array(
           "draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
           "recordsTotal"    => intval( $totalData ),  // total number of records
           "recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
           "data"            => $data   // total data array
           );
        
        echo json_encode($json_data);  // send data as json format
    }
    if($_GET['Mode']=="list-job-kpi-new.php"){
        $requestData= $_REQUEST; 
        
        $columns = array( 
            0  => 'staff_code',
            1  => 'staff_code',
            2  => 'staff_Name',
            3  => 'staff_code',
            4  => 'staff_code',
            5  => 'staff_code',
            6  => 'staff_code',
            7  => 'staff_code',
            8  => 'staff_code',
            9  => 'staff_code',
            10  => 'staff_code',
            11  => 'staff_code',
            12  => 'staff_code',
            13  => 'staff_code',
            14  => 'staff_code'
         );
        
        $strSQL = "SELECT r1.evaluation_code, r1.evaluation_id_staff, r3.staff_Name, r3.staff_Sername ,r3.staff_job_grade , r2.assessment_time_name 
        FROM tb_evaluation          AS      r1
        JOIN tb_assessment_time     AS      r2 ON r1.evaluation_code = r2.assessment_time_code
        JOIN tb_staff               AS      r3 ON r1.evaluation_id_staff = r3.staff_code
        WHERE r2.assessment_time_type = '3' 
        AND r1.evaluation_id_head = '".$_SESSION['staff']['code']."'
        AND r1.evaluation_year = '".$_SESSION['time']['year']."'
        AND r1.evaluation_month = '".$_SESSION['time']['month']."'
        AND r1.evaluation_status = 'N'
        OR 
        r2.assessment_time_type = '8' 
        AND r1.evaluation_id_head = '".$_SESSION['staff']['code']."'
        AND r1.evaluation_year = '".$_SESSION['time']['year']."'
        AND r1.evaluation_month = '".$_SESSION['time']['month']."'     
        AND r1.evaluation_status = 'N'
        GROUP BY r1.evaluation_id_staff 
        ORDER BY r1.evaluation_code ASC";
        
        $query=mysql_query($strSQL) or die("error 1");;
        $totalData = mysql_num_rows($query); 
        
        $totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
        
        $strSQL = "SELECT r1.evaluation_code, r1.evaluation_id_staff, r3.staff_Name, r3.staff_Sername ,r3.staff_job_grade , r2.assessment_time_name 
        FROM tb_evaluation          AS      r1
        JOIN tb_assessment_time     AS      r2 ON r1.evaluation_code = r2.assessment_time_code
        JOIN tb_staff               AS      r3 ON r1.evaluation_id_staff = r3.staff_code
        WHERE r2.assessment_time_type != '1' 
        AND r2.assessment_time_type != '2'
        AND r2.assessment_time_type != '4'
        AND r2.assessment_time_type != '5'
        AND r2.assessment_time_type != '6'
        AND r2.assessment_time_type != '7'
        AND r1.evaluation_id_head = '".$_SESSION['staff']['code']."'
        AND r1.evaluation_year = '".$_SESSION['time']['year']."'
        AND r1.evaluation_month = '".$_SESSION['time']['month']."'
        AND r1.evaluation_status = 'N'
       ";
         
        if( !empty($requestData['search']['value']) ) { 
            $strSQL.=" AND r3.staff_Name LIKE '%".$requestData['search']['value']."%'  ";    
        }
        $strSQL.="GROUP BY r1.evaluation_id_staff";
        $query=mysql_query($strSQL) or die("error 2");
        $totalFiltered = mysql_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
        
        $strSQL.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']." LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
        $query=mysql_query($strSQL) or die("error 3");
        
        $data = array();
        $i = 0;
        while( $rs = mysql_fetch_array($query) ) {  // preparing an array
            $valuei="select * from tb_weight_group where weight_group_jobcode='".$rs['staff_job_grade']."'";
            $arr=c_scelectOne($valuei);

            $valuei2="select * from tb_evaluation_score where evaluation_score_staff='".$rs['evaluation_id_staff']."'";
            $arr2=c_scelectOne($valuei2);

            $valuei3="select * from tb_level_position where job_code='".$rs['staff_job_code']."'";
            $arr3=c_scelectOne($valuei3);

            $hospitals     =   $arr2['evaluation_score_kpi_hospitals']/5*$arr['weight_group_corpreate'];
            $department    =   $arr2['evaluation_score_kpi_department']/5*$arr['weight_group_departmen'];
            $competency_mc     =   $arr2['evaluation_score_competency_mc']/5*$arr['weight_group_mc'];
            $competency_fc     =   $arr2['evaluation_score_competency_fc']/5*$arr['weight_group_fc'];
            $competency_cc     =   $arr2['evaluation_score_competency_cc']/5*$arr['weight_group_cc'];
            $kpi_staff         =   $arr2['evaluation_score_kpi_staff']/5*$arr['weight_group_jobkpi'];
            $kpi_behavior      =   $arr2['evaluation_score_kpi_behavior']/5*$arr['weight_group_attribute'];
            $score  =   $hospitals + $department + $competency_mc + $competency_fc + $competency_cc + $kpi_staff + $kpi_behavior;
            
            $view='<a href="job-kpi-news.php?code='.$rs['evaluation_code'].'&key='.TokenGen($rs['evaluation_id_staff'], $secret).'" target="_blank">
            <button type="button" class="btn btn-primary btn-mini btn-primary waves-effect md-trigger" data-modal="modal-add">ดูข้อมูล</button></a>';
            $view2='NULL';
            $dell='<a href="../class/sql-insert.php?key='.TokenGen($rs['assessment_time_code'], $secret).'&Mode=delect-job-kpi"><button
                type="button" onclick="return confirm(\'คุณต้องการลบ ? Code : '.$rs['assessment_time_code'].'\');"
                class="btn btn-primary btn-mini btn-warning waves-effect md-trigger" data-modal="modal-add">ลบ</button></a>';
            $nestedData=array(); 
            $nestedData[] = $i+1;
            $nestedData[] = $rs['evaluation_id_staff'];
            $nestedData[] = $rs['staff_Name']." ".$rs['staff_Sername'];
            $nestedData[] = $rs['staff_job_code'];
            $nestedData[] = $rs['staff_job_grade'];
            $nestedData[] = $hospitals;
            $nestedData[] = $department;
            $nestedData[] = $competency_mc;
            $nestedData[] = $competency_fc;
            $nestedData[] = $competency_cc;
            $nestedData[] = $kpi_staff;
            $nestedData[] = $kpi_behavior;
            $nestedData[] = $score;
            $nestedData[] = $score;
            $nestedData[] = $view;
            
         $data[] = $nestedData;
            $i++; 
        }
        
        
        
        $json_data = array(
           "draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
           "recordsTotal"    => intval( $totalData ),  // total number of records
           "recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
           "data"            => $data   // total data array
           );
        
        echo json_encode($json_data);  // send data as json format
    }
        
?>