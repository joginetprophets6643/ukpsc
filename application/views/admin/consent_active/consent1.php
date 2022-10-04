<script type="text/javascript">
    $(function () {
        $('input').blur(function () {
            $(this).val(
                    $.trim($(this).val())
                    );
        });
    });
</script>
<style type="text/css">
    .color{
        background-color: #d7d2d2;
    }
</style>
 
<div class="content-wrapper">
<!-- Main content -->
<section class="content">
<div class="card card-default color-palette-bo">
  <div class="card-header">
    <div class="d-inline-block">
      <h3 class="card-title"> <i class="fa fa-pencil"></i> Update Details for - <span style="font-weight:bold;"> <?= $exam_name[0]['subjectline']; ?> </span> </h3>
    </div>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="http://localhost/uk/assets/dist/css/cerrs.css">
    <style>

</style>
</head>
<body className='snippet-body'>
<div class="container">
  <div class="card">
   
    <div class="form">
      <div class="left-side">
        <!-- <div class="left-heading">
          <h3></h3>
        </div> -->
        <div class="steps-content">
          <h3 class="mb-0">Step <span class="step-number">2</span></h3>
          <!--<p class="step-number-content active">Enter your School/College Information.</p>
          <p class="step-number-content d-none">Enter your School/College Principal Deatils</p>
          <p class="step-number-content d-none">Enter your School/College Centre Superintendent Details</p>
          <p class="step-number-content d-none">Enter your School/College Centre Infrastructure Details.</p>
		  <p class="step-number-content d-none">Add Bank Details</p>
		  <p class="step-number-content d-none">Add your School/College Images as per required filed</p>-->
		   
        </div>
        <ul class="progress-bar">
          <li >School/College/University Information<br>स्कूल/कॉलेज/विश्वविद्यालय विवरण</li>
          <li class="active">Principal Deatils<br>प्रधानाचार्य का विवरण</li>
          <li>Centre Superintendent Details<br>केंद्र अधीक्षक का विवरण</li>
          <li>Infrastructure Details<br>बुनियादी ढांचे का विवरण</li>		  
		  <li>Bank Details<br>बैंक विवरण</li>
		  <li>Upload Images<br>तश्वीरें अपलोड करो</li>
        </ul>
      </div>
   
      <div class="right-side">
       
        <?php echo form_open_multipart(base_url('admin/consent_active/consent_add_1'), 'id="xin-formsubmit" class="form-horizontal" '); ?> 
        <div class="main active">
          <div class="text">
            <h2>Principal's Deatils (प्राचार्य का विवरण)</h2>
            <p>Enter your School/College/Institute Principal Deatils</p>
          </div>
          <div class="input-text">
            <div class="form-group">              
              <label>Principal Name (प्राचार्य का नाम)<i style="color:#ff0000; font-size:12px;">*</i></label>
              <input class="form-control" type="text" name="principal_name"  id="principal_name" value="<?php echo $admin[0]['principal_name'] ?>" >
          </div>
            <div class="form-group">
              <label>Mobile No. (मोबाइल नंबर)<i style="color:#ff0000; font-size:12px;">*</i></label>
              <input class="form-control" type="text" name="pri_mobile" id="pri_mobile" maxlength="10" value="<?php echo $admin[0]['pri_mobile'] ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
            </div>
          
		     <div class="form-group">
              <label>Email ID (ईमेल आईडी)</label> 
               <input class="form-control" type="text" name="email" id="email" class="color" required readonly value="<?php echo $admin[0]['email'] ?>" >
          </div>
         
            <div class="form-group">
              
              <label>Whats App No. (व्हाट्सएप नंबर)<i style="color:#ff0000; font-size:12px;">*</i></label> 
              <input class="form-control" type="text" name="whats_num" id="whats_num" maxlength="10" value="<?php echo $admin[0]['whats_num'] ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">

            </div>
          </div>
          <div class="form-group mt-4">
          <?php 
            $segment_value = $this->uri->segment(4);
            $admin_id = $this->session->userdata['admin_id'];
            // echo '<pre>';
            // print_r($admin);
          ?>
            <input class="form-control" type="hidden" name="ci_exam_registrationid1" id="ci_exam_registrationid1" value="<?= $segment_value; ?>">
            <!-- <input type="hidden" name="ref_id" id="ref_id" value="<?= $segment_value ?>"> -->
            <a  href="<?= base_url("admin/consent_active/consent_add/".$admin_id.'/'.$segment_value); ?>" title="Download Form"  class="btn btn-sec">Back</a>
             
             <input type="submit" name="submit" id="submit" class="btn btn-primary next_button" value="Save and Next">
          </div>
        </div>
         <?php echo form_close(); ?>

        </div>
		 
 
      </div>
    </div>
  </div>
</div>
<!--     <?php //echo form_close(); ?>  
<script type='text/javascript' src='#'></script>
<script type='text/javascript' src='#'></script>
<script type='text/javascript' src='#'></script>
<script type='text/javascript' src='#'></script>
 <script type='text/javascript'>
    var next_click=document.querySelectorAll(".next_button");
var main_form=document.querySelectorAll(".main");
var step_list = document.querySelectorAll(".progress-bar li");
var num = document.querySelector(".step-number");
let formnumber=0;

next_click.forEach(function(next_click_form){
    next_click_form.addEventListener('click',function(){
        if(!validateform()){
            return false
        }
       formnumber++;
       updateform();
       progress_forward();
       contentchange();
    });
}); 

var back_click=document.querySelectorAll(".back_button");
back_click.forEach(function(back_click_form){
    back_click_form.addEventListener('click',function(){
       formnumber--;
       updateform();
       progress_backward();
       contentchange();
    });
});

var username=document.querySelector("#principal_name");
var shownname=document.querySelector(".shown_name");
 

var submit_click=document.querySelectorAll(".submit_button");
submit_click.forEach(function(submit_click_form){
    submit_click_form.addEventListener('click',function(){
       shownname.innerHTML= username.value;
       formnumber++;
       updateform(); 
    });
});

var heart=document.querySelector(".fa-heart");
heart.addEventListener('click',function(){
   heart.classList.toggle('heart');
});


var share=document.querySelector(".fa-share-alt");
share.addEventListener('click',function(){
   share.classList.toggle('share');
});

 

function updateform(){
    main_form.forEach(function(mainform_number){
        mainform_number.classList.remove('active');
    })
    main_form[formnumber].classList.add('active');
} 
 
function progress_forward(){
    // step_list.forEach(list => {
        
    //     list.classList.remove('active');
         
    // }); 
    
     
    num.innerHTML = formnumber+1;
    step_list[formnumber].classList.add('active');
}  

function progress_backward(){
    var form_num = formnumber+1;
    step_list[form_num].classList.remove('active');
    num.innerHTML = form_num;
} 
 
var step_num_content=document.querySelectorAll(".step-number-content");

 function contentchange(){
     step_num_content.forEach(function(content){
        content.classList.remove('active'); 
        content.classList.add('d-none');
     }); 
     step_num_content[formnumber].classList.add('active');
 } 
 
 
function validateform(){
    validate=true;
    var validate_inputs=document.querySelectorAll(".main.active input");
    validate_inputs.forEach(function(vaildate_input){
        vaildate_input.classList.remove('warning');
        if(vaildate_input.hasAttribute('require')){
            if(vaildate_input.value.length==0){
                validate=false;
                vaildate_input.classList.add('warning');
            }
        }
    });
    return validate;
    
}</script> -->
<script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');
                                myLink.addEventListener('click', function(e) {
                                  e.preventDefault();
                                });</script>
</script>
<script>
$(document).ready(function () {
  $("#xin-formsubmit")["submit"](function () {
    if ($("#principal_name").val() == "") {
      alert("Please enter 'principal_name'\nकृपया 'प्रिंसिपल_नाम' दर्ज करें");
      $("#principal_name").focus();
      return false;
    }

    var primobile = $('#pri_mobile').val();
    
    if (primobile == "") {
    
      alert("Please enter 'Mobile No'.\nकृपया 'मोबाइल नंबर' दर्ज करें।'");
      $('#pri_mobile').focus();
      return false;

    }else if (primobile.length != 10) {

      alert("Please enter 'Mobile Number' with 10 digit number\nकृपया 10 अंकों की संख्या के साथ 'मोबाइल नंबर' दर्ज करें");
      $('#pri_mobile').focus();
      return false;

    }

    var primobile = $('#whats_num').val();
    
    if (primobile == "") {
    
      alert("Please enter 'Whats App No'.\nकृपया 'व्हाट्सएप नंबर' दर्ज करें।");
      $('#whats_num').focus();
      return false;

    }else if (primobile.length != 10) {

      alert("Please enter 'Whats App No' with 10 digit number\nकृपया 10 अंकों की संख्या के साथ 'व्हाट्सएप नंबर' दर्ज करें");
      $('#whats_num').focus();
      return false;

    }

    // alert(123456);
  });
});
</script>
