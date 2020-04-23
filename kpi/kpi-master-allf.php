<?php include("inc-header.php")?>



</tbody>
<table style="width:100%; " border="1">
    <tr>
        <th>Number</th>
        <th>Code</th>
        <th>Staff</th>
        <th>Name</th>
    </tr>
    <?php 
                                                            $valuei="SELECT r2.evaluation_all_staff, r1.assessment_time_code, r1.assessment_time_name 
                                                            FROM tb_assessment_time as r1 
                                                            JOIN tb_evaluation_all as r2 ON r1.assessment_time_code = r2.evaluation_code 
                                                            GROUP BY r1.assessment_time_name, r2.evaluation_code ,r2.evaluation_all_staff
                                                            ";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
    <tr>
        <td><?php echo $key+1 ;?></td>
        <td><?php echo $r['assessment_time_code']?></td>
        <td><?php echo $r['evaluation_all_staff']?></td>
        <td><?php echo $r['assessment_time_name']?></td>
    </tr>
    <?php }?>
</table>