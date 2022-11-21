<!-- <div class="datalist"> -->
<div class="table-responsive">
    <table id="invitation_recreate" class="table table-bordered table-striped" style="border-collapse: collapse !important;">
        <thead>
            <tr>
                <th>#</th>
                <th>School Name </th>
                <th>District</th>
                <th>City</th>
                <th>Principal Details</th>
                
                <th>Grade</th>
                <th width="120">Max No of Applicant</th>
                <th width="120"><?= trans('action') ?></th>
            </tr>
        </thead>
        <tbody>

            <?php
       
            if(!empty($data)){   
                  $i = 1;
                  foreach ($data as $row):
                    
                     $admin_role_id = $this->session->userdata('admin_role_id');
                     $admin_id = $this->session->userdata('admin_id');
                  //    if (($admin_role_id != 6) && ((in_array($row['file_movement'], array(1))) )) {
                  //       continue;
                  // }
               // if($row['school_name'] != '' && $row['school_name'] != '' && $row['district'] != ''){      
               if(1==1){      
         ?>

            <tr>
                <td>
                    <?= $i ?>
                </td>
                <td>
                    <?= $row['school_name'] ?>
                </td>
                <td>
                    <?= $row['district'] ?>
                </td>
                <td>
                    <?= $row['city']; ?>
                </td>
                <td>
                    <?= $row['principal_name']; ?>
                    <br />
                    <small class="text-muted">
                        <?php echo $row['pri_mobile']; ?>
                    </small>
                    <br />
                    <small class="text-muted">
                        <?php echo $row['email']; ?>
                    </small>

                </td>
            

                <small class="text-muted">
                    <?php //echo $row[5]; ?>
                </small>
                <!-- </td>   -->
                <td>
                    <?= $row['ranking_admin']; ?>
                </td>
                <td>
                    <?= $row['max_allocate_candidate']; ?>
                    <input style="height: 50px;width: 1px;" type="checkbox" id="a" id="sum_value" name="sum_value"
                        class="checkbox-item sum" rel="<?php echo $row['max_allocate_candidate']; ?>">
                </td>
                <td style="text-align: center;">
                    <!-- <input type="checkbox" id="a" class="checkbox-item" rel="<?php echo $row['id']; ?>"> -->


                    <?php  if ($admin_role_id == 5 )  { 
                            $invitationStatus = checkExamInvitationStatus($exam_id,$row['id']);
                            $invt_recieved = isset($invitationStatus['invt_recieved'])?$invitationStatus['invt_recieved']:0;
                            $invite_sent = isset($invitationStatus['invite_sent'])?$invitationStatus['invite_sent']:0;
                           ?>
                    <?php    
                     if($invt_recieved==0 && $invite_sent==1)
                     {?>
                    Status: <img src="<?= base_url(); ?>assets/img/pending.png" alt="">
                    <?php
                     }
                     elseif ($invt_recieved==1 && $invite_sent==1) {
                        ?>
                    Status: <img src="<?= base_url(); ?>assets/img/check.png" alt=""> <br>
                    <a title="Send Invitations" class="btn btn-warning mt-2"
                        onClick="revokeConsentsInvitations('.$row['id'].')"> Revoke Consent </a>
                    <?php }
                     else{
                        ?>
                    <input type="checkbox" id="a" class="send_email_ids" name="send_email_ids"
                        rel="<?php echo $row['id']; ?>" value="<?php echo $row['id']; ?>">
                    <a onClick="single_send_invitations(<?php echo $row['id']; ?>)" title="Send Invitations"
                        class="btn btn-success">
                        <i class="fa fa-paper-plane-o"></i>
                    </a>
                    <?php }?>
                    <?php }  if ($admin_role_id == 5 )  { ?>

                    <?php }
                           if ($admin_role_id == 1 ) { ?>

                    <?php }
                        ?>
                </td>
            </tr>
            <?php
         }
            $i++;
            endforeach;
         }else{
            ?>
            <tr>
                <td style="text-align: center;" colspan="11">No data available in table</td>
            </tr>
            <?php
         }
         ?>


        </tbody>
    </table>
    <!-- </div> -->
    <!-- Modal -->


</div>
<!-- </div> -->

<script>
$(document).ready(function() {
    $('.permanent_info').click(function() {
        var prov_id = $(this).data('id');
        var establishment = $(this).data('establishment');
        var remark_dra = $(this).data('remark_dra');
        $('#exampleModalLongTitle').html(establishment);
        // $('#exampleModalLongTitle').html(remark_dra);
        // AJAX request
        // $.ajax({
        //     url: 'permanent_info/',
        //     type: 'get',
        //     data: {prov_id: prov_id, 'csfr_token_name': csfr_token_value},
        //     success: function (response) {
        //         $('.modal-body').html(response);
        //         $('#empModal').modal('show');
        //     }
        // });
    });
});

function myfunction(id) {
    $.ajax({
        url: 'send_mail/',
        type: 'get',
        dataType: 'html',
        // data : {data:id},
        success: function(result) {
            alert('Mail Sent Sucessfully!')
        }
    });
}



$('#publish_permanent').click(function(event) {

    if (!event.detail || event.detail ==
        1) { //activate on first click only to avoid hiding again on double clicks

        $(this).slideToggle();
    }
});


$(document).ready(function() {
    let arr = [];
    $('.send_email_ids').click(function(e) {
        if ($(this).is(":checked")) {
            arr.push(e.target.value)
        } else {
            arr = arr.filter(item => item !== e.target.value)
        }
        console.log(arr);
        // New Logic For Count Students on the basis of School Id  -- Jogi
        $.ajax({
            type: "GET",
            url: base_url + 'admin/Examshedule_schedule/totalCountSchoolWise',
            data: {
                'school_ids': arr,
                'csfr_token_name': csfr_token_value
            },
            success: function(data) {
                $('#schoolCount').removeClass("d-none");
                $('#schoolWiseCounts').html(data);
            }

        });

    });

})
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