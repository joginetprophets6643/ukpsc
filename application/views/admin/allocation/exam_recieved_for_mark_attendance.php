<div class="content-wrapper">
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Mark Attendance </h3>
            </div>
            <div class="card-body">
                <div class="datalist">
                    <div class="row">
                    <table id="example1" class="table table-bordered table-hover"
        style="overflow: auto; border-collapse: collapse !important;">
        <thead>
            <tr style="text-align: center;">
                <th width="50">S.No.</th>
                <th>Letter/Email/Speed Post Number</th>
                <th>Subject Line of Letter</th>
                <th> Start Date of exam</th>
                <th>End Date of exam</th>
            </tr>
        </thead>
            <tbody>
                <?php 
                if(count($info)>0){
                  foreach ($info as $key => $value) {?>
                <tr>
                    <td><?php echo $key+1 ?></td>
                    <td> <a href="<?= base_url("admin/allocation_user/mark_attendance_allocation/" . urlencrypt($value['id']))?>" title="View" class="btn btn-warning"><?php echo $value['subjectline']; ?></a></td>
                    <td><?php echo $value['speedpost']; ?></td>
                    <td><?php echo $value['startdate']; ?></td>
                    <td><?php echo $value['enddate']; ?></td>
                </tr>
                <?php }
                }
           
                ?>
            </tbody>

    </table>

                    </div>
                </div>
            </div>


    </section>
</div>
<!-- Modal -->


</div>
</div>
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>

<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script>
$(document).ready(function() {
var table = $('#example1').DataTable({
    "processing": true,
    "serverSide": false,
});
});
</script>
<style type="text/css">
.permanent_info {
    margin-bottom: 05px;
}

.remarkss {
    padding: 15px;
    /*font-size: 12px;*/
}

.his {
    margin: 0 0 10px 0;
}

.mr5 {
    margin-bottom: 5px;

}
</style>