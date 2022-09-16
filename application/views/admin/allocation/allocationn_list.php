

<div class="datalist">
   <div class="row">
   <table id="example1" class="table table-bordered table-hover" >
      <thead>
         <tr>
            <th width="50">S.No.</th>
            <th>School Name</th>
            <th>Exam Name</th>
            <th>Exam Date</th>
            <th>Selected Exam Date $ Subject </th>
            <th>No of Candidate</th>
            
            <th>Allocate No of Student</th>
            <!-- <th>Bank Details</th> -->
            <!-- <th>Date of Apply</th> -->
            <!-- <th>Documents</th> -->

            <th width="120"><?= trans('action') ?></th>
         </tr>
      </thead>
      <tbody>
          
         <?php
         
            $i = 1;
            foreach ($info as $row):
               // echo "<pre>";
               // print_r($row); die();
               // echo "</pre>";
      
                $admin_role_id = $this->session->userdata('admin_role_id');
                $admin_id = $this->session->userdata('admin_id');
                if (($admin_role_id != 6) && ((in_array($row['file_movement'], array(1))) )) {
                    continue;
              }      
      ?>

         <tr>
            <label>School Name</label></br>
            <td>
               <?= $i ?>
            </td>
            <td>
               
               <input type="text" value="<?= $row['school_name'] ?>" name="">
            </td>
            <td>
               <label>Exam Name</label></br>
                <?= get_exam_name($row['exam_name']) ?>        
            </td>
            <td>  
                <label>Date of Exam</label></br>
               <span> <?= $row['date_exam_re']; ?></span> </br>
               
            </td>
             <td>
                <label>Subject Name</label></br>
                      <?=$row['sub_name_re'] ?>    
            </td>
            <td>
                <label>Candidate No.</label></br>
             <?php     $cand_no =  explode(',',$row['cand_no']); 
                            $can =  implode(',',$cand_no);    
                  ?>
                 <?php echo $can; ?>

         </td>
         <td>
         <input type="text" name="allocated_student" class="form-control"  value="<?php echo $can; ?>" id="allocated_student">
         </td>
               

            <td>
            <?php  if ($admin_role_id == 6 )  { ?>
            
             </a> 
          <?php }  if ($admin_role_id == 5 )  { ?>
            <a href="<?= base_url("admin/allocation_admin/save/" . $row['id']); ?>" title="Save" class="btn btn-warning btn-xs mr5"  style="margin-top: 8px !important; padding:3% !important;  font-weight: 100 !important; font-size: 15px;">
            <label>Save </label>
             </a>

            <?php }
            if ($admin_role_id == 5 ) { ?>
          
            <?php }
            ?>
      
            </td>
         </tr>
         <?php
            $i++;
            endforeach;
            ?>
      </tbody>
   </table>
</div>
   <!-- Modal -->
   
       
      </div>
      </div>

<script>
  
   function myfunction(id){
     $.ajax({
       url: 'send_mail/',
        type:'get',
        dataType: 'html',
        // data : {data:id},
        success:function(result){
            alert('Mail Sent Sucessfully!')
        } 
    });
   }
 


  $('#publish_permanent').click(function(event) {

   
});


</script>
<style type="text/css">
   .permanent_info{
      margin-bottom: 05px;
   }
   .remarkss{
      padding: 15px;
      /*font-size: 12px;*/
   }
   .his{
      margin: 0 0 10px 0;
   }
   .mr5{
      margin-bottom: 5px;
      
   }

</style>