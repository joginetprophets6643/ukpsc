<!-- DataTables -->

<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css">

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

    <section class="content">

        <!-- For Messages -->

        <?php $this->load->view('admin/includes/_messages.php') ?>

        <div class="card">

            <div class="card-body">

                <div class="d-inline-block">

                    <h3 class="card-title">

                        <i class="fa fa-list"></i>

                        <?php echo $title ;?>&nbsp;(आमंत्रण भेजने के लिए सहमति सूची)

                    </h3>



                </div>



                <div class="d-inline-block float-right">



                </div>

            </div>

            <!-- <div class="card-body">

                <?php echo form_open("/",'class="filterdata"') ?>    

                <div class="row">

                    <?php 

                    if (in_array($_SESSION['admin_role_id'], array(1,2,3,4,5,6))){?>

                    <div class="col-md-3">

                        <div class="form-group">

                            <select name="state" class="form-control dd_state" onchange="filter_data()" >

                                <option value="">Select District</option>

                                <?php foreach($states as $state):?>

                                    <option value="<?=$state->id?>"><?=$state->name?></option>

                                <?php endforeach;?>

                            </select>

                        </div>

                    </div>

                    <?php }

                    if (in_array($_SESSION['admin_role_id'], array(1,2,3,4,5,6))){

                        

                             ?>

                    <div class="col-md-3">

                        <div class="form-group">

                            <select name="district" id="city" class="form-control" onchange="filter_data()" >

                                <option value="">Select City</option>

                                <?php 

                                if(isset($districts) and count($districts ) >0){

                                    foreach($districts as $k=> $district){

                                    echo  '<option value="'.$district['id'].'">'.$district['name'].'</option>';

                                     }

                                }?>

                                ?>

                            </select>

                        </div>

                    </div>

                     <?php } ?>

                    <div class="col-md-2">

                        <div class="form-group">

                            <select name="status" class="form-control" onchange="filter_data()" >

                                <option value="">Select Grade</option>

                                

                                <?php foreach(ALLOWED_FILE_MOVEMENT_ROLE_ID[1] as $k=>$v):

                                    if (in_array($_SESSION['admin_role_id'], array(5)) && $k==5)

                                        continue;

                                        ?>



                                    <option value="<?=$k?>"><?=$v?></option>

                                <?php endforeach;?>

                                

                            </select>

                        </div>

                    </div>


                </div>

                <?php echo form_close(); ?> 

            </div>  -->

        </div>

    </section>





    <!-- Main content -->

    <section class="content mt10">

        <div class="card">
            <div class="card-body table-responsive">
                <table id="na_datatable" class="table table-bordered table-striped" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Examination Center</th>
                            <th>Center Code</th>
                            <th>Total Candidates</th>
                        </tr>
                    </thead>
                     <?php foreach ($info   as $key=> $d){?> 
                        <tr>
                            <td><?php echo $key+1;?></td>
                            <td><?php echo $d['school_id'];?></td>
                            <td><?php echo $d['school_id'];?></td>
                            <td><?php foreach(explode(",",$d['exam_date']) as $key1=>$d1){?>
                               <h5>Exam Date:<?php echo $d1; ?></h5>
                               <h5>Exam Shift:<?php echo explode(",",$d['exam_shift'])[$key1]; ?></h5>
                               <h5>Present Candidate:<?php echo explode(",",$d['present_candidate'])[$key1]; ?></h5>
                               <h5>Absent Candidate:<?php echo explode(",",$d['absent_candidate'])[$key1]; ?></h5>

                           <?php } ?></td>
                        </tr> 
                        <?php }?>                  
                </table>
            </div>
        </div>

    </section>

    <!-- /.content -->

</div>
<!-- DataTables -->

<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>

<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script>
    var table = $('#na_datatable').DataTable( {
    "processing": true,
    "serverSide": false, 
  });
</script>