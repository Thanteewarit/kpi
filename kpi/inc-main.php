<div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <!-- <th>#</th> -->
                                                                <th>Name</th>
                                                                <th>คะแนนเต็ม</th>
                                                                <th>ทำได้</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <!-- <th scope="row">1</th> -->
                                                                <td>Hospitals KPIs </td>
                                                                <td><?php echo number_format($weight_hot,2);?></td>
                                                                <td><?php echo number_format($sum_hot,2);?></td>
                                                            </tr>
                                                            <tr>
                                                                <!-- <th scope="row">2</th> -->
                                                                <td>Department KPIs</td>
                                                                <td><?php echo number_format($weight_dev,2);?></td>
                                                                <td><?php echo number_format($sum_dev,2);?></td>
                                                            </tr>
                                                            <tr>
                                                                <!-- <th scope="row">3</th> -->
                                                                <td>Job KPIs</td>
                                                                <td><?php echo number_format($weight_job,2);?></td>
                                                                <td><?php echo number_format($sum_job,2);?></td>
                                                            </tr>
                                                            <tr>
                                                                <!-- <th scope="row">4</th> -->
                                                                <td>Behavior KPIs</td>
                                                                <td><?php echo number_format($weight_Bhv,2);?></td>
                                                                <td><?php echo number_format($sum_bhv,2);?></td>
                                                            </tr>
                                                            <tr>
                                                                <!-- <th scope="row">5</th> -->
                                                                <td>Managerial Competency</td>
                                                                <td><?php echo number_format($weight_mc,2);?></td>
                                                                <td><?php echo number_format($sum_mc,2);?></td>
                                                            </tr>
                                                            <tr>
                                                                <!-- <th scope="row">6</th> -->
                                                                <td>Functional Competency</td>
                                                                <td><?php echo number_format($weight_fc,2);?></td>
                                                                <td><?php echo number_format($sum_fc,2);?></td>
                                                            </tr>
                                                            <!-- <tr>
                                                                <th scope="row">7</th>
                                                                <td>Core Competency</td>
                                                                <td><?php echo number_format($weight_cc,2);?></td>
                                                                <td><?php echo number_format($sum_cc,2);?></td>
                                                            </tr> -->
                                                            <tr>
                                                                <!-- <th scope="row">7</th> -->
                                                                <td class="text-right">รวมคะแนน</td>
                                                                <td>100.00</td>
                                                                <td><?php echo number_format($sum_all,2);?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <ul class="breadcrumb-title b-t-default p-t-10">
                                                <a href="kpi-hospitals.php"><button type="button" class="btn btn-out-dashed btn-info btn-square">Hospitals</button></a>
                                                <a href="kpi-department.php"><button type="button" class="btn btn-out-dashed btn-info btn-square" >Department</button></a>
                                                <a href="kpi-job.php"><button type="button" class="btn btn-out-dashed btn-info btn-square" >Job</button></a>
                                                <a href="kpi-behavior.php"><button type="button" class="btn btn-out-dashed btn-info btn-square" >Behavior</button></a>
                                                <a href="kpi-mc.php"><button type="button" class="btn btn-out-dashed btn-info btn-square" >Managerial</button></a>
                                                <a href="kpi-fc.php"><button type="button" class="btn btn-out-dashed btn-info btn-square" >Functional</button></a>

                                                <!-- <a href="kpi-cc.php"><button type="button" class="btn btn-out-dashed btn-info btn-square" >Core</button></a> -->
                                            </ul>