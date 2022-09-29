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

                        Consent List for Sending Invitations&nbsp;(आमंत्रण भेजने के लिए सहमति सूची)

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
                <table id="send_invitation_list" class="table table-bordered table-striped" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Exam Name</th>
                            <th>Total Candidates</th>
                            <th>Start Date of exam</th>
                            <th>End Date of exam Details</th>
                            <th width="120"><?= trans('action') ?></th>
                        </tr>
                    </thead>
                    <!-- <div style="margin-left:63%;padding: 0 0 20px 10px;"> -->
                    <!-- <span id="total_candidate_display" style="display:none;" class="total_candidate_display" name="total_candidate_display"></span>
                      <input type="hidden" id="send_consent_id" name="send_consent_id" value="<?= $this->uri->segment(4);?>"> -->
                    <!-- </div> -->
                    <!-- <div id="allcheckids" style="margin-left:50%;padding: 0 0 20px 10px;">
                          <input  type="button" class="select_all_count btn btn-success" id="select-all1" value="Select All(सभी चुनें)"> 
                          <input  type="button"  class="btn btn-success" id="select_all" onclick="return confirm('Are you sure want to send all invitation?\nक्या आप वाकई सभी आमंत्रण भेजना चाहते हैं?')" value="Send to All(सभी को भेजो)"> 
                          <input  type="button"class=" btn btn-success" id="select_single_count" onclick="return confirm('Are you sure want to send select user invitation?\nक्या आप वाकई चुनिंदा उपयोगकर्ता आमंत्रण भेजना चाहते हैं?')" value="Send to Selected(चयनित को भेजें)">
                          <input  type="button" class="select_all_uncheck btn btn-success" id="select-all1" value="Uncheck(अनचेक)"> 
                      </div> -->
                </table>
            </div>
        </div>

    </section>

    <!-- /.content -->

</div>







<!-- DataTables -->

<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>

<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>




<!-- <script>

  $(function () {

    $("#example1").DataTable();

  });



</script>  -->



<script>
var table = $('#send_invitation_list').DataTable({
    "processing": true,
    "serverSide": false,
    "ajax": "<?=base_url('admin/Examshedule_schedule/invitation_sent_list_data')?>",
    "order": [
        [0, 'asc']
    ],
    "columnDefs": [{
            "targets": 0,
            "name": "id",
            'searchable': true,
            'orderable': true
        },
        {
            "targets": 1,
            "name": "school_name",
            'searchable': true,
            'orderable': true
        },
        {
            "targets": 2,
            "name": "district",
            'searchable': true,
            'orderable': true
        },
        {
            "targets": 3,
            "name": "city",
            'searchable': true,
            'orderable': true
        },
        {
            "targets": 4,
            "name": "principal_name",
            'searchable': true,
            'orderable': true
        },
        {
            "targets": 5,
            "name": "created_at",
            'searchable': true,
            'orderable': true
        },
    ]
});

//------------------------------------------------------------------

// function filter_data()

// {

// $('.data_container').html('<div class="text-center"><img src="<?=base_url('assets/dist/img')?>/loading.png"/></div>');

// $.post('<?=base_url('admin/certificate/filterdata')?>',$('.filterdata').serialize(),function(){

// 	$('.data_container').load('<?=base_url('admin/examshedule_schedule/invitation_sent_list_data')?>');

// });

// }

// //------------------------------------------------------------------

// function load_records()

// {

// $('.data_container').html('<div class="text-center"><img src="<?=base_url('assets/dist/img')?>/loading.png"/></div>');

// $('.data_container').load('<?=base_url('admin/examshedule_schedule/invitation_sent_list_data')?>');

// }

// load_records();



// //---------------------------------------------------------------------

// $("body").on("change",".tgl_checkbox",function(){

// $.post('<?=base_url("admin/certificate/change_status")?>',

// {

//     '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',

// 	id : $(this).data('id'),

// 	status : $(this).is(':checked')==true?1:0

// },

// function(data){

// 	$.notify("Status Changed Successfully", "success");

// });

// });



// $(function() {

// $('.dd_state').change( function() {

// var state_id = $(this).val();



// if (state_id != '') {



// $.ajax({

// type: "POST", 

// url: base_url+'admin/location/get_city_by_state_id',

// dataType: 'html',

// data: { 'state_id' : state_id, 'csfr_token_name':csfr_token_value },

// success: function(data) {

// console.log(data);

// $('#district_filter').html( data );

// }

// });

// }

// else {

// $('#state').val('').hide();



// }

// });

// });
$(document).ready(function() {

    $(function() {
        $('.dd_state').change(function() {
            var district_id = $(this).val();
            if (district_id != '') {
                $('#othstate').val('').hide();

                $.ajax({
                    type: "POST",
                    url: base_url + 'admin/location/get_city_by_state_id',
                    dataType: 'html',
                    data: {
                        'district_id': district_id,
                        'csfr_token_name': csfr_token_value
                    },
                    success: function(data) {
                        $('#city').html(data);
                    }
                });
            } else {
                $('#state').val('').hide();
                $('#othstate').show();
            }
        });
    });
});
</script>