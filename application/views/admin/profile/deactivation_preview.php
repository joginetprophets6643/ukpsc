
<!-- Content Wrapper. Contains page content -->
<?php
// print_r($_SESSION); die();

if ($_SESSION['admin_role_id'] != 6) {
    $application_mode = 0;
} else {
    $application_mode = 1;
}

// $complaint_number= now();
// $certificate_number = 'G-' . $_SESSION['state_id'] . '/' . $_SESSION['district_id'] . now();
?>

<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/jquery.collapsibleCheckboxTree.css" type="text/css" />
<script type="text/javascript">
    jQuery(document).ready(function () {
        $('ul#example').collapsibleCheckboxTree();
    });
                        $(function () {
                            $('input').blur(function () {                     
                                $(this).val(
                                    $.trim($(this).val())
                                );
                            });
                        });

</script>

<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="card card-default color-palette-bo">
            <div class="card-header">
                <!-- <div class="d-inline-block">
                    <h3 class="card-title"> <i class="fa fa-pencil"></i>
                        &nbsp; <?= trans('add_grav') ?> Module 
                    </h3>
                </div> -->

            </div>
            <div class="card-body">
                <!-- For Messages -->
                <?php $this->load->view('admin/includes/_messages.php') ?>
                <?php
                echo form_open_multipart(base_url('admin/profile/account_deactivation_add'),
                        'id="xin-form" class="form-horizontal" ')?> 
                <h3 style="text-align:center;  "><span class="label ">*<u>APPLY FOR DEACTIVATION OF ACCOUNT</u>* </span></h3>
                <hr class="style1">
                
                    <div class="row">   
                        <div class="form-group">
                            <label for="State">Select a Reason for Surrender:</label>
                           
                             <select class="form-control"  disabled="disabled"   name="type_fee" id="permanent_type">
                         <option value="">Select Type</option>
                         <option value="Due to change in category of clinic" <?php if($deactivation_data[0]['reason_deactivation']=='Due to change in category of clinic') echo "selected"?>  >Due to change in category of clinic</option>
                         <option value="Due to change of location" <?php if($deactivation_data[0]['reason_deactivation']=='Due to change of location') echo "selected"?>  >Due to change of location</option>
                         <option value="Due to ceasing to function as a clinical establishment" <?php if($deactivation_data[0]['reason_deactivation']=='Due to ceasing to function as a clinical establishment') echo "selected"?>  >Due to ceasing to function as a clinical establishment</option>
                         <option value="Due to some other reasons" <?php if($deactivation_data[0]['reason_deactivation']=='Due to some other reasons') echo "selected"?>  >Due to some other reasons</option>

                     </select>
                        </div>
                        </div>
                        <div class="row">  
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="City" >Application for the surrender of Clinical Establishment:<span style="color:red">*</span></label>
                            <textarea disabled="disabled"  class="form-control" onkeyup="trimSpaces();" id="reason_deactication"  name="reason_deactication"   rows="6" cols="50">  <?php echo $deactivation_data[0]['reason_deactication']; ?>
                            </textarea>
                          
                        </div>
                    </div>     
                <script>
                    function trimSpaces(){
                            s = document.getElementById("reason_deactication").value;
                            s = s.replace(/(^\s*)|(\s*$)/gi,"");
                            s = s.replace(/[ ]{2,}/gi," ");
                            s = s.replace(/\n /,"\n");
                            document.getElementById("reason_deactication").value = s;
                        }
                </script>
            </div>
            <!-- <hr style="1"> -->
                <div class="row">

                    <div class="form-group  col-sm-3">
                        <label>File Uploaded Name</label>
                        <input type="text" disabled="disabled"  class="form-control" name="fileName1" id="fileName1" value="<?php echo $deactivation_data[0]['fileName1'] ?>"  />  
                        <!-- <label for="employee_id">Attachment</label>  -->
                    </div>


                </div>
                  <hr style="1">
                    <table>
                        <thead>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Date:</td>
                                <td> <input type="text" disabled="disabled"  class="form-control" name="deactivation_date" value="<?php echo $deactivation_data[0]['deactivation_date'] ?>" </td>
                            </tr> </br>
                            <tr>
                                <td>Place:</td>
                                <td> <input type="text"  disabled="disabled"  class="form-control" name="deactivation_place" value="<?php echo $deactivation_data[0]['deactivation_place'] ?>"    placeholder="Place" </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
 <div class="card-footer" align="center" >
                <!-- <input type="submit"  name="submit" class="btn btn-primary " value="Save as Draft"></input> -->
                <!-- <input type="submit"   name="submit" class="btn btn-primary" value="Save"></input> -->
                <a href="javascript:history.back()" class="btn btn-primary">Back</a> 
            </div>
            </div>

<?php echo form_close(); ?>
        </div>
        <!-- /.box-body -->
</div>
</section>
</div>

<script type="text/javascript" src="<?= base_url() ?>assets/dist/js/grav.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/dist/js/jquery.collapsibleCheckboxTree.js"></script>
