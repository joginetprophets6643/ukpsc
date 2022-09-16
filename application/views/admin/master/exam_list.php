<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css"> 

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
    <!-- For Messages -->
    <?php $this->load->view('admin/includes/_messages.php') ?>
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <div class="d-inline-block">
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Exam List&nbsp;(परीक्षा सूची)</h3>
        </div>
          <div class="d-flex justify-content-end">
          <?php if($this->rbac->check_operation_permission('quetion_paper_add')): ?>
            <a href="<?= base_url('admin/master/exam_add'); ?>" class="btn btn-success"> Add Exam&nbsp;(परीक्षा जोड़ें)</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body table-responsive">
        <table id="na_datatable" class="table table-bordered table-striped" width="100%">
          <thead>
            <tr>
              <th>#</th>
              <th>Exam English Name</th>
              <th>Exam Hindi Name</th>
              <th>Advertisement Number</th>
               <th>No of Candidates</th>
               <th>Start Date</th>
               <th>End Date</th>
               <!-- <th>Status</th> -->
              <th>Action</th>

            </tr>
          </thead>
        </table>
      </div>
    </div>
  </section>  
</div>


<!-- DataTables -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>

<script>
$(document).ready(function () {
    window.setTimeout(function() {
         $("#consent_recieved").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
            <?php unset($_SESSION['success'])?>
         });
      }, 4000);
});    
  //---------------------------------------------------
  var table = $('#na_datatable').DataTable( {
    "processing": true,
    "serverSide": false,
    "ajax": "<?=base_url('admin/master/datatable_json_exam')?>",
    "order": [[0,'asc']],
    "columnDefs": [
    { "targets": 0, "name": "id", 'searchable':true, 'orderable':true},
    { "targets": 1, "name": "exam_name", 'searchable':true, 'orderable':true},
    { "targets": 1, "name": "exam_hindi_name", 'searchable':true, 'orderable':true},
    { "targets": 2, "name": "advertise_name", 'searchable':true, 'orderable':true},
    { "targets": 3, "name": "no_of_cand", 'searchable':true, 'orderable':true},
    { "targets": 3, "name": "start_date_exam", 'searchable':true, 'orderable':true},
    { "targets": 3, "name": "end_date_exam", 'searchable':true, 'orderable':true},
    { "targets": 4, "name": "created_at", 'searchable':true, 'orderable':true},
    ]
  });
</script>