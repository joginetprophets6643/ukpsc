<div class="content-wrapper">

    <section class="content">

        <div class="card">

            <div class="card-header">

                <div class="d-inline-block">

                    <h3 class="card-title"><i class="fa fa-plus"></i>&nbsp; Create Exam List&nbsp;(परीक्षा सूची बनाएं)</h3>

                </div>

                <div class="d-inline-block float-right">


                </div>

            </div>

            <div class="card-body">



                <?php echo validation_errors(); ?>           

                <?php echo form_open_multipart(base_url('admin/master/invitation_add'), 'id="xin-form"  class="form-horizontal"'); ?> 

               

                <div class="after-add-more field_wrapper">
            
     
        
        <div class="row">
             <div class="col-md-6">

                <div class="form-group">

                 <label for="name" class="col-sm- control-label">Add Exam&nbsp;(परीक्षा जोड़ें)<i style="color:#ff0000; font-size:12px;">*</i></label>

                       <select name="exam_name" class="form-control" id="exam_name" >

                        <option value="">Select Exam Name</option>

                        <?php
                         foreach ($exam as $k => $exam) { ?>

                        <option value="<?= $exam->id ?>"  ><?= $exam->exam_name ?></option>

                     <?php }
                        ?>

                     </select>

                    </div>

                   
            </div>
        </div>

         
            <div class="row">
             <div class="col-md-4">

                <div class="form-group">

                    <label for="name" class="col-sm- control-label">Start Date of exam</label>

                    <input type="date" readonly name="startdate" id="startdate" class="form-control date_disable" placeholder="Subject" >

                    </div>

            </div>
    
             <div class="col-md-4">

                <div class="form-group">

                    <label for="name" class="col-sm- control-label">End Date of exam</label>

                    <input type="date" readonly id="end_date"  name="enddate" class="form-control date_disable" placeholder="Subject" >

                    </div>

            </div>
        </div> 


                    <div class="row">

                          <div class="col-md-1.5">

              

                </div>

                <div class="col-md-4" style="margin-left:20px; margin-left: 5px;">

                    <div class="form-group">

                    <label for="name" class="col-sm- control-label">Subject Name <i style="color:#ff0000; font-size:12px;">*</i></label>
                    <br>
                        <!-- <input type="text" name="sub_name[]" class="form-control"  placeholder="Subject Name" > -->

                           <select name="sub_name[]" class="form-control" id="sub_name" style="width:420px;" >

                        <option value="">Select Subject</option>

                        <?php
                        $b = $subject;

                        foreach ($subject as $k => $subject) { ?>

                        <option value="<?= $subject->id ?>"  ><?php echo $subject->sub_name.'(' .$subject->sub_name_hindi .')'; ?></option>

                     <?php }
                        ?>

                     </select>

                    </div>

                </div>





                <script> 

            

   $(document).ready(function () {


   var x = 1; //Initial field counter is 1    

   var maxField = 60; //Input fields increment limitation

   var addButton = $('.add-more'); //Add button selector

   var wrapper = $('.field_wrapper'); //Input field wrapper

   var fieldHTML ='<div id="'+x+'"> <div class="after-add-more field_wrapper"> <div class="row"> <div class="col-md-4" style="margin-left:5px; "value", px;"> <div class="form-group"> <label for="name" class="col-sm- control-label">Subject Name <i style="color:#ff0000; font-size:12px;">*</i></label> <br><select name="sub_name[]" class="form-control" id="sub_name" style="width:420px;" required> <option value="">Select Subject</option> <?php foreach (
       $b as $k => $subjects) { ?> <option value="<?php echo $subjects->id; ?>" ><?php echo $subjects->sub_name."(".$subjects->sub_name_hindi.")"; ?></option> <?php } ?> </select> </div></div><div class="class="col-md-1.5" style="margin-left:20px;"> <div class="form-group"><label for="name" class="col-sm- control-label">No. of Candidate<i style="color:#ff0000; font-size:12px;">*</i></label> <input type="number" name="no_candidate[]" min=1 style="width:140px;" class="form-control" required placeholder="No. of Candidate"/></div></div><div class="col-md-1.5" style="margin-left:20px;"> <div class="form-group"><label for="name" class="col-sm- control-label">Exam Date<i style="color:#ff0000; font-size:12px;">*</i></label> <input type="date" name="date_exam[]" class="form-control abc " id="date_exam1" style="width:150px;" placeholder="Number of Candidate" required/></div></div><div class=col-md-1.5"  style="margin-left:20px;"> <div class="form-group"> <label for="name" class="col-sm- control-label">Exam Shift <i style="color:#ff0000; font-size:12px;">*</i></label><br> <select class="form-control" name="shft_exam[]" style="width:140px;" class="" id="shft_exam" required> <option value="">Select</option> <option value="Morning">Morning</option> <option value="Evening">Evening</option> </select> </div></div><div class="col-md-2.5" style="margin-left:20px;"> <div class="form-group"><label for="name" class="col-sm- control-label">Exam Time <i style="color:#ff0000; font-size:12px;">*</i></label> <input type="text" style="width:90%;" name="time_exam[]" class="form-control" id="time_exam" placeholder="Exam Time" required/></div></div><a class="btn btn-danger remove_button" style="height:40px ; margin-top:30px; margin-left:7px; padding:12px; text-align:center; color:white; font-weight:bolder;"> - </a> </div></div></div>';

 

    $(addButton).click(function(){

        if(x < maxField){ 

            x++; 

            $(wrapper).append(fieldHTML); //Add field html      

        }

    });

     $(wrapper).on('click', '.remove_button', function(e){

        e.preventDefault();

        $(this).parent('div').remove(); //Remove field html

        x--; //Decrement field counter

    });
     var dtToday = new Date();
// alert(dtToday);
var month = dtToday.getMonth() + 1;     // getMonth() is zero-based
var day = dtToday.getDate();
var year = dtToday.getFullYear();
if(month < 10)
   month = '0' + month.toString();
if(day < 10)
   day = '0' + day.toString();

var maxDate = year + '-' + month + '-' + day;
$('.abc').attr('min', maxDate);

        });

            </script>

                            <div class="col-md-1.5" style="margin-left:20px;">

                    <div class="form-group">

                    <label for="name" class="col-sm- control-label">No. of Candidate <i style="color:#ff0000; font-size:12px;">*</i></label>

                        <input type="number" style="width:140px;" min=1 name="no_candidate[]" id="no_candidate" class="form-control"  placeholder="No. of Candidate"oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">

                    </div>
<div id="a"></div>
                </div>

                    <div class="col-md-1.5" style="margin-left:20px;">

                    <div class="form-group">

                    <label for="name" class="col-sm- control-label">Exam Date<i style="color:#ff0000; font-size:12px;">*</i></label>

                        <input type="date" name="date_exam[]" class="form-control date_disable" id="date_exam" placeholder="Number of Candidate" style="width:150px;">

                    </div>

                </div>

                <div class="col-md-1.5"  style="margin-left:20px;"> 

                    <div class="form-group">

                    <label for="name" class="col-sm- control-label">Exam Shift<i style="color:#ff0000; font-size:12px;">*</i></label>

                        <!-- <input type="text" name="shft_exam[]" class="form-control" id="shft_exam" placeholder="Shift of Exam" > -->
                        <br>
                        <select name="shft_exam[]" class="form-control" class="" id="shft_exam" style="width:140px;">

                        <option>Select</option>

                        <option value="Morning" >Morning</option>

                        <option value="Evening">Evening</option>

                        </select>

                    </div>

                </div> 

                  <div class="col-md-2.5"  style="margin-left:20px;">

                    <div class="form-group">

                    <label for="name" class="col-sm- control-label">Exam Time<i style="color:#ff0000; font-size:12px;">*</i></label>

                        <input type="text" name="time_exam[]" class="form-control" id="time_exam" placeholder="Exam Time" style="width:90%;">

                    </div>

                </div> 



                        <div class="col-md-1">

                            <div class="form-group change">

                                <label for="">&nbsp;</label><br/>

                                <a class="btn btn-success add-more" style="margin-top: 0px;height:40px; padding: 10px; text-align: center; color: white; text-overflow: initial; font-weight: bold;">+ </a>

                            </div>

                        </div>

                    </div>

                </div> 
             
                <div class="row">
                    
                    <div class="form-group" >
                    <div class="col-md-3">
                        <!-- <input type="submit" name="submit" value="Update Admin" class="btn btn-primary pull-right"> -->
                        <input type="button" onclick="window.history.go(-1)" class="btn btn-primary " value="Back"></input>
                    </div>
                </div>

                <div class="form-group">

                    <div class="col-md-6">
                        <input type="hidden" readonly name="speedpost" id="speedpost">
                        <input type="submit" name="submit" value="Create " class="btn btn-primary pull-center">

                    </div>

                </div>
            </div>

     <?php echo form_close(); ?>

            </div>



        </div>

    </section> 

</div>



<script>

    $("#country").addClass('active');

    $(document).ready(function () {

        $("#xin-form")["submit"](function (d) {

            if ($("#exam_name").val() === "") {

                alert("Please Select 'Exam Name'\nकृपया 'परीक्षा का नाम' चुनें");

                $("#exam_name").focus();

                return false;

            }

            if ($("#sub_name").val() === "") {

                alert("Please fill 'Subject Name'\nकृपया 'विषय का नाम' भरें");

                $("#sub_name").focus();

                return false;

            }
            
            if ($("#no_candidate").val() === "") {

                alert("Please fill 'No Candidate'\nकृपया 'कोई उम्मीदवार नहीं' भरें");

                $("#no_candidate").focus();

                return false;

            }
            
            if ($("#date_exam").val() === "") {

                alert("Please fill 'Exam Date'\nकृपया 'परीक्षा तिथि' भरें");

                $("#date_exam").focus();

                return false;

            }
            
            if ($("#shft_exam").val() === "") {

                alert("Please fill 'Exam Shift'\nकृपया 'परीक्षा पाली' भरें");

                $("#shft_exam").focus();

                return false;

            }
            
            if ($("#time_exam").val() === "") {

                alert("Please fill 'Exam Time'\nकृपया 'परीक्षा का समय' भरें");

                $("#time_exam").focus();

                return false;

            }

        });

    });



</script>
<script >
var dtToday = new Date();
// alert(dtToday);
var month = dtToday.getMonth() + 1;     // getMonth() is zero-based
var day = dtToday.getDate();
var year = dtToday.getFullYear();
if(month < 10)
   month = '0' + month.toString();
if(day < 10)
   day = '0' + day.toString();

var maxDate = year + '-' + month + '-' + day;
$('.date_disable').attr('min', maxDate);

$("#exam_name").change(function () {                            
   var id= $('select[name=exam_name]').val(); 
   var url ="<?php echo base_url('admin/examshedule_schedule/fetch_examname_data/');?>"
   // alert(id); 
   $.ajax({
      url: url+id,
      type: 'get',
      dataType: 'json',
      data: {id:id},
        success: function (data) {
              
      $('#no_candidate').val(data.no_of_cand); 
      $('#startdate').val(data.start_date_exam); 
      $('#end_date').val(data.end_date_exam); 
      // $('#no_candidate').val(data.no_candidate); 
        // alert(data.id)
        
    }});
});
$('document').ready(function()
{
    $('textarea').each(function(){
            $(this).val($(this).val().trim());
        }
    );
});


</script>

   





