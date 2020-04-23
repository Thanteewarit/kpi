<?php 
error_reporting(0);
session_start();
header('Content-Type: text/html; charset=utf-8');
include("phpUN/function.php");
include("class.php");
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: inline; filename="ชื่อรายงาน Competency Gap.xls" ');
header("Pragma:no-cache");
header('Cache-Control: max-age=0');
$valuei="SELECT *
FROM tb_staff AS r1
WHERE r1.staff_hospital_id = '".$_POST['staff_hospital_id']."'
AND r1.staff_director_assistant_id = '".$_POST['staff_director_assistant_id']."'
AND r1.staff_division_director_id = '".$_POST['staff_division_director_id']."'
AND r1.staff_division_manager_head_id = '".$_POST['staff_division_manager_head_id']."'
AND r1.staff_division_manager_sub_id = '".$_POST['staff_division_manager_sub_id']."'
AND r1.staff_depatment_head_id = '".$_POST['staff_depatment_head_id']."'
AND r1.staff_status = 'Y'";
?>
 <html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 </head>
 <body>
 <strong>ชื่อรายงาน Competency - Gap</strong><br>
 <br>
 <div id="SiXhEaD_Excel" align=center x:publishsource="Excel">
 <table x:str border=1 cellpadding=0 cellspacing=1 width=100% style="border-collapse:collapse">
 <tr>
 <td width="94" height="30" align="center" valign="middle" ><strong>ชื่อ - สกุล</strong></td>
 <td width="200" align="center" valign="middle" ><strong>รหัสพนักงาน</strong></td>
 <td width="181" align="center" valign="middle" ><strong>ชื่อ FC</strong></td>
 <td width="181" align="center" valign="middle" ><strong>ชื่อย่อย</strong></td>
 <td width="181" align="center" valign="middle" ><strong>ชื่อย่อย(ต่อ) </strong></td>
 <td width="181" align="center" valign="middle" ><strong>Target</strong></td>
 <td width="185" align="center" valign="middle" ><strong>Score</strong></td>
 <td width="185" align="center" valign="middle" ><strong>Gap</strong></td>
 </tr>
 <?php
foreach(c_scelectS($valuei) as $key => $vlues)
{ 
    $valuei="SELECT *
    FROM tb_evaluation_competency AS r1 
    JOIN tb_competency_master AS r2 ON r1.competency_master_id = r2.competency_master_id
    JOIN tb_kpi_type AS r3 ON r3.kpi_type_id  = r2.kpi_type_id
    WHERE r1.evaluation_competency_year = '".$_SESSION['time']['year']."'
    AND r1.evaluation_competency_month = '".$_SESSION['time']['month']."'
    AND r1.evaluation_competency_id_staff = '".$vlues['staff_code']."' ";
    foreach(c_scelectS($valuei) as $key => $vlues2)
    { 

 ?>
 <tr>
 <td height="25" align="center" valign="middle" ><?php echo $vlues['staff_Name']?>&nbsp;<?php echo $vlues['staff_Sername'];?></td>
 <td align="center" valign="middle" ><?php echo $vlues['staff_code'];?></td>
 <td align="center" valign="middle"><?php echo $vlues2['kpi_type_name'];?></td>
 <td align="center" valign="middle"><?php echo $vlues2['competency_master_name'];?></td>
 <td align="center" valign="middle"><?php echo $vlues2['competency_master_example'];?></td>
 <td align="center" valign="middle"><?php echo $vlues2['competency_master_target'];?></td>
 <td align="center" valign="middle"><?php echo $vlues2['evaluation_competency_value'];?></td>
 <td align="center" valign="middle"><?php echo ($vlues2['evaluation_competency_value']-$vlues2['competency_master_target']);?></td>
 </tr>
 <?php
    }
    //oInsert($table,$column,$valuei);
}
 ?>
 </table>
 </div>
 <script>
 window.onbeforeunload = function(){return false;};
 setTimeout(function(){window.close();}, 10000);
 </script>
 </body>
 </html>