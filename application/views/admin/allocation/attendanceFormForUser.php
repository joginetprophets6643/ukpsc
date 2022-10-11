
<div class="content-wrapper">
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="d-inline-block">
                    <h3 class="card-title">&nbsp; Mark Attendance&nbsp;(मार्क अटेंडेंस) For <?php echo $Exam_subject_line;?></h3>
                </div>
            </div>
            <div class="card-body">

                <?php echo validation_errors(); ?>     
                      
                <?php echo form_open(base_url('admin/allocation_user/markattedanceData'), 'id="xin-form"  class="form-horizontal"'); ?> 
                <div class="row" hidden>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="col-sm- control-label">Exam Date&nbsp;(परीक्षा तिथि)<i style="color:#ff0000; font-size:12px;">*</i></label>
                            <input type="text" name="exam_date_old" value="<?php echo implode(",",$date_exam)?>"  class="form-control" id="exam_date" placeholder="Enter a Date"  >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="col-sm- control-label">Exam Shift&nbsp;(परीक्षा शिफ्ट)<i style="color:#ff0000; font-size:12px;">*</i></label>
                            <input type="text" name="exam_shift_old" value="<?php echo implode(",",$shft_exam)?>" class="form-control" id="exam_shift" placeholder="Enter a Shift ">

                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="col-sm- control-label">Exam Date&nbsp;(परीक्षा तिथि)<i style="color:#ff0000; font-size:12px;">*</i></label>
                            <input type="text" name="exam_date" value="<?php echo $date_exam[$key]?>"  class="form-control" id="exam_date" placeholder="Enter a Date"  >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="col-sm- control-label">Exam Shift&nbsp;(परीक्षा शिफ्ट)<i style="color:#ff0000; font-size:12px;">*</i></label>
                            <input type="text" name="exam_shift" value="<?php echo $shft_exam[$key]?>" class="form-control" id="exam_shift" placeholder="Enter a Shift ">

                        </div>
                    </div>
                </div> 
                <div class="row">   
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="col-sm- control-label">Present Candidate&nbsp;(वर्तमान उम्मीदवार)<i style="color:#ff0000; font-size:12px;">*</i></label>
                            <input type="text" required name="present_candidate" value="<?php echo $present_candidate ?>" class="form-control"  placeholder="Present Candidates" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
                    </div>
                  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="col-sm- control-label">Absent Candidate&nbsp;(अनुपस्थित उम्मीदवार)<i style="color:#ff0000; font-size:12px;">*</i></label>
                            <input type="text" required name="absent_candidate" value="<?php echo $absent_candidate ?>" class="form-control"  placeholder="Absent Candidates" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
                    </div>
                   
                </div> 
                <div class="row" hidden>   
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name" class="col-sm- control-label">School Id<i style="color:#ff0000; font-size:12px;">*</i></label>
                            <input type="text"  name="school_id" value="<?php echo $school_id; ?>" class="form-control" >
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name" class="col-sm- control-label">Exam Id<i style="color:#ff0000; font-size:12px;">*</i></label>
                            <input type="text"  name="exam_id" value="<?php echo $exam_id;?>" class="form-control">
                        </div>
                    </div>
                  
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name" class="col-sm- control-label">Admin Id<i style="color:#ff0000; font-size:12px;">*</i></label>
                            <input type="text"  name="admin_id" value="<?php echo $admin_id;?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name" class="col-sm- control-label">key<i style="color:#ff0000; font-size:12px;">*</i></label>
                            <input type="text"  name="key" value="<?php echo $key;?>" class="form-control">
                        </div>
                    </div>
                   
                </div> 

                <div class="row">
                    <div class="col-12">
                        <div class="d-flex">
                            <div class="form-group mb-0" >
                                <input type="button" onclick="window.history.go(-1)" class="btn btn-sec mr-4" value="Back"></input>
                            </div>
    
                            <div class="form-group mb-0">
                                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary">
                            </div>

                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </section> 
</div>
<script>
