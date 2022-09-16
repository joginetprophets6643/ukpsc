 <!-- Datatable style -->

<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css"> 
<div class="content-wrapper">  
 <section class="content">
  <!-- For Messages -->
  <?php $this->load->view('admin/includes/_messages.php') ?>
  <div class="card">
    <div class="card-header">
      <div class="d-inline-block">
        <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; City/Towns List</h3>
      </div>
      <div class="d-inline-block float-right">
        <?php if($this->rbac->check_operation_permission('town_add')): ?>
          <a href="<?= base_url('admin/location/town/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New City/Town</a>
        <?php endif; ?>
      </div>
    </div>
    <div class="card-body">
      <table id="na_datatable" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>No</th>
          <th>District Name</th>
          <th>City Name</th>
          <!-- <th>Status</th> -->
          <th style="width: 150px;" class="text-right">Action</th>
        </tr>
            </thead>

        <?php foreach ($info as $key=> $row): {  $i = $key+1; ?>
                 
         
          <tbody>
             
             <td> <?= $i ?></td>
             <td><?php echo get_district_name($row['district_id']); ?> </td>
             <td><?php echo $row['city']; ?> </td>
             <!-- <td><?php echo $row['status']; ?> </td> -->
             <td><a title="Delete" class="delete btn btn-sm btn-danger"  href="<?= base_url("admin/location/town_del/" . $row['id']); ?>" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a></td>
             
          </tbody>

        <?php } endforeach ?>
    
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  </section>  
</div>


  <!-- DataTables -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
  <script>
  //---------------------------------------------------
  // var table = $('#na_datatable').DataTable( {
  //     "processing": true,
  //     "serverSide": true,
  //     "ajax": "<?=base_url('admin/location/town_json')?>",
  //     "order": [[1,'asc']],
  //     "columnDefs": [
  //       { "targets": 0, "name": "", 'searchable':false, 'orderable':true},
  //       { "targets": 1, "name": "district_id", 'searchable':true, 'orderable':true},
  //       { "targets": 2, "name": "name", 'searchable':true, 'orderable':true},
  //       { "targets": 3, "name": "status", 'searchable':true, 'orderable':true},
  //       { "targets": 4, "name": "action", 'searchable':false, 'orderable':false,'width':'100px'}
  //     ]
  //   });
  </script>
  <!-- Scripts for this page -->
  <script type="text/javascript">
     $(document).ready(function(){
      $(".btn-delete").click(function(){
        if (!confirm("Do you want to delete")){
          return false;
        }
      });
    });
  </script>
  <script>
  $("#location").addClass('active');
  </script>

