<?php
 include("../class/connect.php");
 $requestData = $_REQUEST;
 print_r($requestData);
 $columns = array( 
  0 => 'assessment_time_code',
  1 => 'assessment_time_name',
  2 => 'assessment_time_type'
 );
    $strSQL         = "SELECT * FROM tb_assessment_time WHERE 1 "; 
    $table          =mysql_query($strSQL);
    $row_count      =mysql_num_rows($table); 
 $totalFiltered  = $row_count;
 $strSQL = "SELECT * FROM tb_assessment_time WHERE assessment_time_status = 'Y' ";
 if( !empty($requestData['search']['value']) ) {
  $strSQL.="AND (tb_assessment_time.assessment_time_code LIKE '%".$requestData['search']['value']."%' ";
  $strSQL.="OR tb_assessment_time.assessment_time_name LIKE '%".$requestData['search']['value']."%' ";
  $strSQL.="OR tb_assessment_time.assessment_time_type LIKE '%".$requestData['search']['value']."%')";
 }  
    $strSQL.=" ORDER BY ". $columns[$requestData['order'][0]['column']]." ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
    $table          =mysql_query($strSQL);
 $data = array();
 while($rs = mysql_fetch_array($table)) 
 {
   
  $nestedData   = array();     
  $nestedData[] = $rs['assessment_time_code'];
  $nestedData[] = $rs['assessment_time_name'];
  $nestedData[] = $rs['assessment_time_type'];
  $data[] = $nestedData;
 } 
 $json_data = array(
    "draw"            => intval( $requestData['draw'] ),
    "recordsTotal"    => intval( $row_count ),
    "recordsFiltered" => intval( $totalFiltered ),
    "data"            => $data
 );
 echo json_encode($json_data);
?>