<div class="content-wrapper">

    <section class="content">

        <div class="card">

            <div class="card-header">

                <div class="d-inline-block">

                    <h3 class="card-title"><i class="fa fa-plus"></i>&nbsp; Add Candidates&nbsp;(उम्मीदवार जोड़ें)</h3>

                </div>

                <div class="d-inline-block float-right">


                </div>

            </div>

            <div class="card-body">



                <?php echo validation_errors(); ?>

                <?php echo form_open_multipart(base_url('admin/master/candidate_add'), 'id="xin-form"  class="form-horizontal"'); ?>



                <div>

                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group">

                                <label for="name" class="col-sm- control-label">Exam Name<br />परीक्षा का नाम<i style="color:#ff0000; font-size:12px;">*</i></label>

                                <select name="exam_name" class="form-control" id="exam_name">

                                    <option value="">Select Exam Name</option>

                                    <?php
                                    foreach ($exam as $k => $exam) {
                                        if ($exam->exam_hindi_name == '') {
                                            $examination_name = $exam->exam_name;
                                        } else {
                                            $examination_name = $exam->exam_name . '(' . $exam->exam_hindi_name . ')';
                                        }

                                    ?>
                                        <option value="<?= $exam->id ?>"><?= $examination_name ?></option>

                                    <?php }
                                    ?>

                                </select>

                            </div>


                        </div>
                    <!-- </div>
                    <div class="row"> -->
                        <div class="form-group has-feedback col-md-2">
                            <label>District<br />जिला<span>*</span></label>
                            <select class="state" name="state[]" id="state" class="form-control">
                                <option value=""><?= trans('select_state') ?></option>
                                <?php foreach ($states as $k => $state) { ?>
                                    <option value="<?= $state->id ?>"><?= $state->name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        
                        <div class="col-md-2">

                            <div class="form-group">

                                <label for="name" class="col-sm- control-label">District Code<br />जिला कोड<span>*</span></label>

                                <input type="text" id="district_code" name="district_code[]" class="form-control" placeholder="District Code">

                            </div>
                    

                        </div>
                    <!-- </div>    
                    <div class="row"> -->
                        <div class="form-group has-feedback col-md-2">
                            <label>City<br />शहर<span>*</span></label>
                            <select class="city" name="city[]" id="city" class="form-control">
                                <option value=""> Select City</option>
                            </select>
                        </div>
                        <div class="col-md-1">

                            <div class="form-group">
                                <label for="name" class="col-sm- control-label">City Code<br />शहर कोड<span>*</span></label>
                                <input type="text" id="city_code" name="city_code[]" class="form-control" placeholder="City Code">
                            </div>


                        </div>
                        <!-- </div>
                        <div class="row"> -->
                        <div class="form-group has-feedback col-md-2">
                            <label for="name" class="col-sm- control-label">Subject Name<br/>विषय नाम<span>*</span></label>
                                <select name="sub_name[]" class="form-control" id="sub_name" >
                                    <option value="">Select Subject</option>
                                   
                                </select>
                        </div>
                        
                        <div class="col-md-2">

                            <div class="form-group">

                                <label for="name" class="col-sm- control-label">Number of Candidates<br />संबंधित की संख्या<span>*</span></label>

                                <input type="number" id="number_of_can" name="number_of_can[]" min=1 class="form-control" placeholder="Number of Candidates">

                            </div>
                    

                        </div>
                        <div class="col-md-1">
                            <a class="btn btn-success add-more" style="margin-top: 51px;height:34px; padding: 5px 10px; text-align: center; color: white; text-overflow: initial; font-weight: bold;">+ </a>
                        </div>
                        <div class="after-add-more field_wrapper  col-md-12">
                        </div>    
                        <!-- </div> 
                        <div class="row"> -->
                            <div class="col-md-12">
                                <div class="d-flex">
                                    <div class="form-group">
                                        <input type="button" style="margin-top:25px; " onclick="window.history.go(-1)" class="btn btn-primary " value="Back"></input>
                                    </div>
                                
                                    <div class="form-group" style="margin-left:25px;">
                                        <input type="submit" name="submit" style="margin-top:25px;" value="Create " class="btn btn-primary pull-center">
                                    </div>

                                </div>
                            </div>
                        <!-- </div> -->
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </section>
</div> 
<script>
$(document).ready(function() {
    
    var x = 1; //Initial field counter is 1    
    var maxField = 100; //Input fields increment limitation
    var addButton = $('.add-more'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper

    $(addButton).click(function(){
      var id = $('select[name=exam_name]').val();
        if(id){
            if(x < maxField){ 
            var fieldHTML ='<div id="'+x+'"><div class="after-add-more field_wrapper"><div class="row"><div class="col-md-2"><div class="form-group"><label for="name" class="col-sm- control-label">District<i style="color:#ff0000; font-size:12px;">*</i></label> <select class="state" name="state[]" id="state'+x+'" class="form-control" onchange="getval(this,'+x+');"><option value=""><?= trans('select_state') ?></option><?php foreach ($states as $k => $state) { ?><option value="<?= $state->id ?>"><?= $state->name ?></option><?php } ?></select></div></div><div class="col-md-2"><div class="form-group"><label for="name" class="col-sm- control-label">District Code<i style="color:#ff0000; font-size:12px;">*</i></label> <input type="number" name="district_code[]" id="district_code'+x+'" min=1 class="form-control" required placeholder="District Code"/></div></div><div class="col-md-2"><div class="form-group"><label for="name" class="col-sm- control-label">City<i style="color:#ff0000; font-size:12px;">*</i></label> <select name="city[]" id="city'+x+'" class="form-control"><option value=""> Select City</option></select></div></div><div class="col-md-1"><div class="form-group"><label for="name" class="col-sm- control-label">City Code<i style="color:#ff0000; font-size:12px;">*</i></label> <input type="number" name="city_code[]" id="city_code'+x+'" min=1 class="form-control" required placeholder="City Code"/></div></div><div class="col-md-2"><div class="form-group"><label for="name" class="col-sm- control-label">Subject Name <i style="color:#ff0000; font-size:12px;">*</i></label> <br/><select name="sub_name[]" class="form-control" id="sub_name'+x+'" required><option value="">Select Subject</option><?php foreach ($subject as $k => $subjects) {if($subjects->exam_id==$_COOKIE['exam_id']){ ?> <option value="<?php echo $subjects->id; ?>" ><?php echo $subjects->sub_name."(".$subjects->sub_name_hindi.")"; ?></option><?php }} ?></select></div></div><div class="col-md-2"><div class="form-group"><label for="name" class="col-sm- control-label">No. of Candidate<i style="color:#ff0000; font-size:12px;">*</i></label> <input type="number" name="number_of_can[]" id="number_of_can'+x+'" min=1 class="form-control" required placeholder="No. of Candidate"/></div></div><div class="col-md-1"><a class="btn btn-danger remove_button" style="height:34px ; margin-top:29px; padding:5px 12px; text-align:center; color:white; font-weight:bolder;"> - </a></div></div> </div>';

             
            x++;             
            $(wrapper).append(fieldHTML); //Add field html      
        }
        }else{
            alert('Please first select the exam')
        }
      
    });

    $(wrapper).on('click', '.remove_button', function(e){
       
        e.preventDefault();
        $(this).parent('div').parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });

    $(function () {
        $('#state').change(function () {
            var district_id = $(this).val();
            if (district_id != '') {
                $.ajax({
                    type: "POST",
                    url: base_url + 'admin/location/get_city_by_state_id',
                    dataType: 'html',
                    "processing": true,
                    "serverSide": false,
                    data: {'district_id': district_id, 'csfr_token_name': csfr_token_value},
                    success: function (data) {
                        // console.log(data);
                        $('#city').html(data);
                    }
                });
            } else {
          
                $('#state').val('').hide();
                // $('#othstate').show();
            }
        });
    });    

    $("#xin-form")["submit"](function(d) {

        if ($("#exam_name").val() === "") {

            alert("Please fill 'Exam Name'\nकृपया 'परीक्षा का नाम' भरें");
            $("#exam_name").focus();
            return false;

        }

        if ($("#state").val() === "") {

            alert("Please fill 'state'\n(कृपया 'राज्य' भरें)");
            $("#state").focus();
            return false;
        }

        if ($("#district_code").val() === "") {

            alert("Please fill 'District Code'\n(कृपया 'जिला कोड' भरें)");
            $("#district_code").focus();
            return false;
        }

        if ($("#city").val() === "") {

            alert("Please fill 'city'\n(कृपया 'सिटी' भरें)");
            $("#city").focus();
            return false;
        }

        if ($("#city_code").val() === "") {

            alert("Please fill 'City Code'\n(कृपया 'सिटी कोड' भरें)");
            $("#city_code").focus();
            return false;
        }

        if ($("#number_of_can").val() === "") {

            alert("Please fill 'Number Of Can'\n(कृपया 'कैन की संख्या' भरें)");
            $("#number_of_can").focus();
            return false;
        }
    });

   
        
});

function getval(sel,id){
    // alert(sel.value);
    var district_id = sel.value;
    
    if (district_id != '') {

        $.ajax({
            type: "POST",
            url: base_url + 'admin/location/get_city_by_state_id',
            dataType: 'html',
            data: {'district_id': district_id, 'csfr_token_name': csfr_token_value},
            success: function (data) {
                $('#city'+id+'').html(data);
            }
        });
    } else {
        // $('#state'+id).val('').hide();
        // $('#othstate').show();
    }
}

$('document').ready(function () {
$("#exam_name").change(function () {
        var id = $('select[name=exam_name]').val();
        document.cookie = `exam_id=${$('select[name=exam_name]').val()}`;
        var url = "<?php echo base_url('admin/Examshedule_schedule/getSubjectNameNew/');?>"
               // 22-09-2022
                $.ajax({
                    url:url,
                    type: 'get',
                    dataType: 'html',
                    data: { 'exam_id' : id, 'csfr_token_name':csfr_token_value },
                    success: function (data) {
                       $('#sub_name').html(data);
                    }
                });
    });
});
</script>                        