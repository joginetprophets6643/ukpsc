<!-- DataTables -->

<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css"> 

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

    <section class="content">

         <!-- For Messages -->

        <?php $this->load->view('admin/includes/_messages.php') ?>

        <div class="card">

            <div class="card-header border-0">

                <div class="d-inline-block">

                  <h3 class="card-title mt-0">

                    <i class="fa fa-list"></i>

                    Examination Allocated (परीक्षा आवंटित)


                  </h3>

                    

              </div>

           

              <div class="d-inline-block float-right">

                

              </div>

            </div>

            <div class="card-body" style="display:none;">

                <?php echo form_open("/",'class="filterdata"') ?>    

                <div class="row">

                    <?php 

                    if (in_array($_SESSION['admin_role_id'], array(1,2,3,4,5,6))){?>

                    <div class="col-md-3">

                        <div class="form-group">

                            <select name="state" class="form-control dd_state" onchange="filter_data()" >

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

                    <div class="col-md-3">

                        <div class="form-group">

                            <select name="district" id="district_filter" class="form-control" onchange="filter_data()" >

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

                    <div class="col-md-2">

                        <div class="form-group">

                            <select name="status" class="form-control" onchange="filter_data()" >

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

                    <div class="col-md-3">

                        <div class="form-group">

                            <input type="text" name="keyword" class="form-control"  placeholder="<?= trans('search_from_here') ?>..." onkeyup="filter_data()" />

                        </div>

                    </div>

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







<!-- DataTables -->

<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>

<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>

<script>

  $(function () {

    $("#example1").DataTable();

  });



</script> 



<script>

//------------------------------------------------------------------

function filter_data()

{

$('.data_container').html('<div class="text-center"><img src="<?=base_url('assets/dist/img')?>/loading.png"/></div>');

$.post('<?=base_url('admin/certificate/filterdata')?>',$('.filterdata').serialize(),function(){

	$('.data_container').load('<?=base_url('admin/allocation_user/allocation_list_data_user')?>');

});

}

//------------------------------------------------------------------

function load_records()

{

$('.data_container').html('<div class="text-center"><img src="<?=base_url('assets/dist/img')?>/loading.png"/></div>');

$('.data_container').load('<?=base_url('admin/allocation_user/allocation_list_data_user')?>');

}

load_records();



//---------------------------------------------------------------------

$("body").on("change",".tgl_checkbox",function(){

$.post('<?=base_url("admin/certificate/change_status")?>',

{

    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',

	id : $(this).data('id'),

	status : $(this).is(':checked')==true?1:0

},

function(data){

	$.notify("Status Changed Successfully", "success");

});

});



    $(function() {

        $('.dd_state').change( function() {

            var state_id = $(this).val();



            if (state_id != '') {

           

                $.ajax({

                   type: "POST", 

                   url: base_url+'admin/location/get_city_by_state_id',

                   dataType: 'html',

                   data: { 'state_id' : state_id, 'csfr_token_name':csfr_token_value },

                   success: function(data) {

                       console.log(data);

                       $('#district_filter').html( data );

                   }

                });

            }

            else {

               $('#state').val('').hide();



            }

        });

    });

</script>