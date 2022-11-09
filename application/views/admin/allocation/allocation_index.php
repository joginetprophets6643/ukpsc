<!-- DataTables -->

<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css">

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

    <section class="content">

        <!-- For Messages -->

        <?php $this->load->view('admin/includes/_messages.php') ?>

        <div class="card">

            <div class="card-header">

                <div class="d-inline-block">

                    <h3 class="card-title mt-0">

                        <i class="fa fa-list"></i>

                        Exam Centre candidate allocation (परीक्षा केंद्र उम्मीदवार आवंटन) -<?=$exam_name?>


                    </h3>



                </div>

            </div>

            <div class="card-body">

                <?php echo form_open("/",'class="filterdata"') ?>

                <div class="row">
                <input type="text" hidden id="exam_id_new" value="<?php echo $id ?>">
                    <?php 

                    if (in_array($_SESSION['admin_role_id'], array(1,2,3,4,5,6))){?>

                    <div class="col-md-4">

                        <div class="form-group" style="margin-bottom: 0 !important;">

                            <select name="state" id="state_id" class="form-control dd_state">

                                <option value="">Select State</option>

                                <?php foreach($states as $state):?>

                                <option value="<?=$state->id?>"><?=$state->name?></option>

                                <?php endforeach;?>

                            </select>

                        </div>

                    </div>

                    <?php }

                    if (in_array($_SESSION['admin_role_id'], array(1,2,3,4,5,6))){

                        

                             ?>

                    <div class="col-md-4">

                        <div class="form-group" style="margin-bottom: 0 !important;">

                            <select name="district" id="district_filter" class="form-control">

                                <option value="">Select District</option>

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

                    <div class="col-md-4">

                        <div class="form-group" style="margin-bottom: 0 !important;">

                            <select name="status" id="grade" class="form-control">

                                <option value=""><?= trans('all_status') ?></option>



                                <?php foreach(ALLOWED_FILE_MOVEMENT_ROLE_ID[1] as $k=>$v):

                                    if (in_array($_SESSION['admin_role_id'], array(5)) && $k==5)

                                        continue;

                                        ?>



                                <option value="<?=$k?>"><?=$v?></option>

                                <?php endforeach;?>



                            </select>

                        </div>

                    </div>

                    <!-- <div class="col-md-3">

                        <div class="form-group">

                            <input type="text" name="keyword" class="form-control"
                                placeholder="<?= trans('search_from_here') ?>..." onkeyup="filter_data()" />

                        </div>

                    </div> -->

                </div>

                <?php echo form_close(); ?>

            </div>

        </div>

    </section>





    <!-- Main content -->

    <section class="content mt10">

        <div class="card">

            <div class="card-body">
                

                <!-- Load Admin list (json request)-->

                <div class="data_container"></div>

            </div>

        </div>

    </section>

    <!-- /.content -->

</div>






<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>

<script>
//------------------------------------------------------------------

function filter_data()

{

    $('.data_container').html(
        '<div class="text-center"><img src="<?=base_url('assets/dist/img')?>/loading.png"/></div>');

    $.post('<?=base_url('admin/certificate/filterdata')?>', $('.filterdata').serialize(), function() {

        $('.data_container').load('<?=base_url('admin/allocation_admin/allocation_list_data/'.$id)?>');

    });

}

//------------------------------------------------------------------

function load_records()

{
   
    $('.data_container').html(
        '<div class="text-center"><img src="<?=base_url('assets/dist/img')?>/loading.png"/></div>');

    $('.data_container').load('<?=base_url('admin/allocation_admin/allocation_list_data/'.$id)?>');

}

load_records();




//---------------------------------------------------------------------

$("body").on("change", ".tgl_checkbox", function() {

    $.post('<?=base_url("admin/certificate/change_status")?>',

        {

            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',

            id: $(this).data('id'),

            status: $(this).is(':checked') == true ? 1 : 0

        },

        function(data) {

            $.notify("Status Changed Successfully", "success");

        });

});



$(function() {

    $('.dd_state').change(function() {
        var state_id = $(this).val();
        var exam_id = $('#exam_id_new').val();
        var grade = $('#grade').val();
        
        if (state_id != '') {
            // $('#allocationTable').html('');
            $.ajax({
                type: "GET",
                url: base_url + 'admin/location/get_city_by_state_idForAllcationState',
                dataType: 'html',
                data: {
                    'state_id': state_id,
                    'csfr_token_name': csfr_token_value
                },
                success: function(data) {
                    $('#district_filter').html(data);
                    var district_id = $('#district_filter').val();
                        $.ajax({
                            type: "GET",
                            url: base_url + 'admin/Allocation_admin/newChanges',
                            // url: base_url + 'admin/Allocation_admin/allocation_list_datacopy1',
                            dataType: 'html',
                            data: {
                                'state_id': state_id,
                                'exam_id':exam_id,
                                'district_id':district_id,
                                'grade_id':grade,
                                'csfr_token_name': csfr_token_value
                            },
                            success: function(data1) {
                                
                                $('#allocationTable').html(data1);
                            }
                            });
                }

            });

        } else {

            $('#state').val('').hide();



        }

    });

    // Districts tablesorter    tablesorter

    $('#district_filter').change( function() {
          var state_id = $('#state_id').val();
          var exam_id = $('#exam_id_new').val();
          var grade = $('#grade').val();
          var district_id = $(this).val();
            if (district_id != '') {
           
                $.ajax({
                        type: "GET",
                        url: base_url + 'admin/Allocation_admin/newChanges',
                        dataType: 'html',
                        data: {
                            'state_id': state_id,
                            'exam_id':exam_id,
                            'district_id':district_id,
                            'grade_id':grade,
                            'csfr_token_name': csfr_token_value
                        },
                        success: function(data1) {
                            $('#allocationTable').html(data1);
                        }
                        });
            }
            else {
                location.reload();

            }
        });



        $('#grade').change( function() {
          var grade = $(this).val();
          var state_id = $('.dd_state').val();
          var district_id = $('#district_filter').val();
          var exam_id = $('#exam_id_new').val();
                $.ajax({
                        type: "GET",
                        url: base_url + 'admin/Allocation_admin/newChanges',
                        dataType: 'html',
                        data: {
                            'state_id': state_id,
                            'exam_id':exam_id,
                            'grade_id':grade,
                            'district_id':district_id,
                            'csfr_token_name': csfr_token_value
                        },
                        success: function(data1) {
                            $('#allocationTable').html(data1);
                        }
                        });
       
        });

});
</script>