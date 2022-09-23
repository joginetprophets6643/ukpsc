<!-- DataTables -->

<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css"> 

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

    <section class="content">

         <!-- For Messages -->

        <?php $this->load->view('admin/includes/_messages.php') ?>

        <div class="card">

            <div class="card-body">

                <div class="d-inline-block">

                  <h3 class="card-title">

                    <i class="fa fa-list"></i>

                    Consent Not Recieved List&nbsp;(सहमति प्राप्त नहीं हुई सूची)

                  </h3>

                    

              </div>

           

              <div class="d-inline-block float-right">

                

              </div>

            </div>

            <div class="card-body">

                <?php echo form_open("/",'class="filterdata"') ?>    

                <div class="row">
                  
                    <?php 

                    if (in_array($_SESSION['admin_role_id'], array(1,2,3,4,5,6))){?>

                    <div class="col-md-3">
                    <label>District&nbsp;ज़िला</label>
                        <div class="form-group">

                            <!-- <select name="state" class="form-control dd_state" onchange="filter_data()" > -->
                            <select id="state" name="state" class="form-control dd_state">

                                <option value="">Select District</option>

                                <?php foreach($states as $state):?>

                                    <option value="<?=$state->id?>"><?=$state->name?></option>

                                <?php endforeach;?>

                            </select>

                        </div>

                    </div>

                    <?php }

                    if (in_array($_SESSION['admin_role_id'], array(1,2,3,4,5,6))){

                        

                             ?>

                    <div class="col-md-3">
                        <label>City&nbsp;शहर</label>
                        <div class="form-group">
                            <select name="district" id="district" class="form-control">
                                <option value=""> Select City</option>
                            </select>
                            <!-- <select name="district" id="city" class="form-control" onchange="filter_data()" > -->
                            <!-- <select name="district" id="district" class="form-control" >

                                <option value="">Select City</option>

                                <?php 

                                // if(isset($districts) and count($districts ) >0){

                                //     foreach($districts as $k=> $district){

                                //     echo  '<option value="'.$district['id'].'">'.$district['subcityname'].'</option>';

                                //      }

                                // }?>

                                ?>

                            </select> -->

                        </div>

                    </div>

                     <?php } ?>

                    <div class="col-md-2">
                    <label>Grade&nbsp;श्रेणी</label>
                        <div class="form-group">

                            <!-- <select name="status" class="form-control" onchange="filter_data()" > -->
                            <select id="grade"  name="status" class="form-control">

                                <option value="">Select Grade</option>

                                

                                <?php foreach(ALLOWED_FILE_MOVEMENT_ROLE_ID[1] as $k=>$v):

                                    if (in_array($_SESSION['admin_role_id'], array(5)) && $k==5)

                                        continue;

                                        ?>



                                    <!-- <option value="<?=$k?>"><?=$v?></option> -->
                                    <option value="<?=$v?>"><?=$v?></option>

                                <?php endforeach;?>

                                

                            </select>

                        </div>

                    </div>


                </div>

                <?php echo form_close(); ?> 

            </div> 

        </div>

    </section>





    <!-- Main content -->

    <section class="content mt10">
        <div class="card">
            <div class="card-body table-responsive">
            <div id="countInDistrict" class="d-none">Total Applicants in District : <span id="districtCounts"></span></div>
                <div id="schoolCount" class="d-none">Total No. of Applicants Selected in School : <span id="schoolWiseCounts"></span></div>
                <table id="consent_not_recieved_by_user_list" class="table table-bordered table-striped" width="100%">
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
                        <!-- <div style="margin-left:63%;padding: 0 0 20px 10px;"> -->
                        <span id="total_candidate_display" style="display:none;" class="total_candidate_display" name="total_candidate_display"></span>
                        <input type="hidden" id="send_consent_id" name="send_consent_id" value="<?= $this->uri->segment(4);?>">
                        <!-- </div> -->
                        <div id="allcheckids" style="margin-left:50%;padding: 0 0 20px 10px;">
                            <input  type="button" class="select_all_count btn btn-success" id="select_all" value="Select All(सभी चुनें)"> 
                            <input  type="button"  class="btn btn-success" id="send_all" onclick="return confirm('Are you sure want to send all invitation?\nक्या आप वाकई सभी आमंत्रण भेजना चाहते हैं?')" value="Send to All(सभी को भेजो)"> 
                            <input  type="button"class=" btn btn-success" id="select_single_count" onclick="return confirm('Are you sure want to send select user invitation?\nक्या आप वाकई चुनिंदा उपयोगकर्ता आमंत्रण भेजना चाहते हैं?')" value="Send to Selected(चयनित को भेजें)">
                            <input  type="button" class="select_all_uncheck btn btn-success" id="select-all1" value="Uncheck(अनचेक)"> 
                            <!-- <label style="font-weight:bold;" for="car"></label> -->
                        </div>
                    </table>
            </div>
        </div>
    </section>

    <!-- /.content -->

</div>







<!-- DataTables -->

<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>

<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>

<script>

    var total_candidate = location.search.split('total_number=')[1] ? location.search.split('total_number=')[1] : '0';
    console.log("total_candidate",total_candidate);
    $('#total_candidate_display').html(total_candidate);

    //   $(function () {

    //     $("#example1").DataTable();

    //   });


    var table = $('#consent_not_recieved_by_user_list').DataTable({
        "processing": true,
        "serverSide": false,
        "ajax": "<?=base_url('admin/Examshedule_schedule/consent_notrecieved_by_user_data/'.$id)?>",
        "order": [
            [0, 'asc']
        ],
        "columnDefs": [{"targets": 0,"name": "id",'searchable': true,'orderable': true},
            {"targets": 1,"name": "school_name",'searchable': true,'orderable': true},
            {"targets": 2,"name": "district",'searchable': true,'orderable': true},
            {"targets": 3,"name": "city",'searchable': true,'orderable': true},
            {"targets": 4,"name": "principal_name",'searchable': true,'orderable': true},
            {"targets": 5,"name": "ranking_admin",'searchable': true,'orderable': true},
            {"targets": 6,"name": "max_allocate_candidate",'max_allocate_candidate': true,'orderable': true},
            {"targets": 7,"name": "created_at",'searchable': true,'orderable': true},
        ]
    });


        $(function() {
            $('#state').change( function() {
            // var grade = $('#grade').val();
            // console.log('grade',grade);
            // return false;
                var district_id = $(this).val();
                console.log("district",district_id);
                // return false;
                    if (district_id != '') {
                        $('#othstate').val('').hide();

                        $.ajax({
                            type: "POST",
                            url: base_url + 'admin/location/get_city_by_state_id',
                            dataType: 'html',
                            data: {'district_id': district_id, 'csfr_token_name': csfr_token_value},
                            success: function (data) {
                                $('#district').html(data);
                            }
                        });
                    } 
                    // else {
                    //     $('#state_id').val('').hide();
                    //     $('#othstate').show();
                    // }

            var district_id = $('#district').val();
            console.log("district",district_id);
                //   return false;
            var state_id = $('#state').val();
            var grade = $('#grade').val();
            var district_id =  $('#district').val();;
            // console.log("district_id",district_id);
            // return false;
                if (state_id != '') {
                console.log("state_id asfeasfd",state_id);
                // return false;
            
                    $.ajax({
                    type: "GET", 
                    url: base_url+'admin/Examshedule_schedule/consent_notrecieved_search',
                    dataType: 'html',
                    data: { 'state_id' : state_id, 'district_id':district_id,'grade':grade, 'csfr_token_name':csfr_token_value },
                    success: function(data) {
                        console.log("data 31",data);
                        $('#consent_not_recieved_by_user_list').html(data);
                             // New Logic For Count Students on the basis of Distrcit Id  -- Jogi
                       $.ajax({
                            type: "GET", 
                            url: base_url+'admin/Examshedule_schedule/districtWiseCountOfStudents',
                            // dataType: 'html',
                            data: { 'state_id' : state_id, 'district_id':district_id,'grade':grade, 'csfr_token_name':csfr_token_value },
                            success: function(data) {
                                $('#countInDistrict').removeClass("d-none");
                                $('#districtCounts').html(data);
                                $('#schoolCount').addClass("d-none");
                                $('#schoolWiseCounts').html('');
                               
                            }

                            });
                    }
                    });
                }
                else {
                    location.reload();

                }
        });
        
        $('#district').change( function() {

          var state_id = $('#state').val();
          var grade = $('#grade').val();
          var district_id = $(this).val();
          // console.log("grade",grade);
          // return false;
            if (district_id != '') {
           
                $.ajax({
                   type: "GET", 
                   url: base_url+'admin/Examshedule_schedule/consent_notrecieved_search',
                   dataType: 'html',
                   data: { 'district_id' : district_id, 'state_id':state_id, 'grade':grade, 'csfr_token_name':csfr_token_value },
                   success: function(data) {
                      
                       $('#consent_not_recieved_by_user_list').html(data);
                  
                       
                   }
                });
            }
            else {
                location.reload();

            }
        });

        $('#grade').change( function() {
          var grade = $(this).val();
          var state_id = $('#state').val();
          var district_id = $('#district').val();
            if (grade != '') {
              // console.log("grade_id",grade_id);
              // return false;
           
                $.ajax({
                   type: "GET", 
                   url: base_url+'admin/Examshedule_schedule/consent_notrecieved_search',
                   dataType: 'html',
                   data: { 'district_id' : district_id, 'state_id':state_id, 'grade' : grade, 'csfr_token_name':csfr_token_value },
                   success: function(data) {
                      //  console.log("data",data);
                       $('#consent_not_recieved_by_user_list').html(data);
                   }
                });
            }
            else {

                location.reload();

            }
        });
    });


    $('#select_all').click(function(event) {  
        
        var send_consent_id = $("#send_consent_id").val()
        console.log("send_consent_id",send_consent_id);
        // return false;
        var hrefs = new Array();
        // alert(this.checked).attr('rel');
        // Iterate each checkbox
        // $("input:checkbox.myClass");
            $(':checkbox.send_email_ids').each(function() {
            // alert(this.checked)
                this.checked = true;     
                var r= $(this).attr('rel'); 
                
                if(r != undefined){   
                    hrefs.push(r);       
                }       

            });

        // var url = "<?php echo base_url('admin/examshedule_schedule/send_invitation_user_all/')?>"
        //     $.ajax({
        //         url: url,
        //         type:'get',
        //         dataType: 'text',
        //         data : {data:hrefs,'send_consent_id':send_consent_id},
        //             success:function(result){
        //                 alert("success, Sent Sucessfully");
        //                 $(':checkbox.send_email_ids').each(function() {
        //                 // alert(this.checked)
        //                 this.checked = false;     
        //             });
        //         } 

        //     });  

    });


    $('#send_all').click(function(event) {  



        if($('input[name="send_email_ids"]:checked').length > 2){
            // alert(123456);
            // return false;
            var send_consent_id = $("#send_consent_id").val()
            // console.log("send_consent_id",send_consent_id);
            // console.log('send_email_ids i am',$('input[name="send_email_ids"]:checked').length);
            // return false;

            var hrefs = new Array();
            // alert(this.checked).attr('rel');
            // Iterate each checkbox
            // $("input:checkbox.myClass");
                $(':checkbox.send_email_ids').each(function() {
                // alert(this.checked)
                    this.checked = true;     
                    var r= $(this).attr('rel'); 
                    
                    if(r != undefined){   
                        hrefs.push(r);       
                    }       

                });
                var url = "<?php echo base_url('admin/examshedule_schedule/send_invitation_user_all/')?>"
                    $.ajax({
                        url: url,
                        type:'get',
                        dataType: 'text',
                        data : {data:hrefs,'send_consent_id':send_consent_id},
                            success:function(result){
                                alert("success, Sent Sucessfully");
                                $(':checkbox.send_email_ids').each(function() {
                                // alert(this.checked)
                                this.checked = false;     
                            });
                        } 

                    });  
        }else{

            alert('Please click on send at least two checkbox\n(कृपया कम से कम दो चेकबॉक्स भेजें पर क्लिक करें)');
            $("#allcheckids").focus();
            return false;

        }

    });


    $('.select_all_uncheck').click(function(event) {  
        // alert("13232132");return false;
        var hrefs = new Array();

        var numberNotChecked = $('.sum').filter(':checked').length;
        console.log('numberNotChecked', numberNotChecked);
                
        if($('input[name="send_email_ids"]:checked').length == 0){

            alert('Please click on send atlest one checkbox\n(कृपया कम से कम एक चेकबॉक्स भेजें पर क्लिक करें)');
            $("#allcheckids").focus();
            return false;
            
        }else{

            $(':checkbox').each(function() {
                    this.checked = false;     
                    var r= $(this).attr('rel'); if(r != 'undefined'){   
                    hrefs.push(r);       
                    console.log('i am here', r)
                    // return false;
                }
            });

            var sum = 0;
            $('.sum').each(function(){
                sum += parseFloat($(this).attr('rel'));
            });

            console.log('i am here', sum);
            total_candidate_int = parseInt($("#total_candidate_display").text());
            var renaming_add_value = total_candidate_int + sum;
            console.log('renaming_add_value', renaming_add_value);
            $('#total_candidate_display').html(renaming_add_value);
            return false;
                
        }
        
    });

    function single_send_invitations(id){
    
        var send_consent_id = $("#send_consent_id").val()
        var url = "<?php echo base_url('admin/examshedule_schedule/send_invitation_user_all/')?>"
            $.ajax({
                url: url,
                type:'get',
                dataType: 'text',
                data : {id:id,'send_consent_id':send_consent_id},
                success:function(result){
            
                    alert("success, Sent Sucessfully");
                    this.checked = false;     
                }
            });
    }

    $('#select_single_count').click(function(event) {

    if($('input[name="send_email_ids"]:checked').length > 1){
        
        var hrefs = new Array();
        var send_consent_id = $("#send_consent_id").val();
        
        $('input[name="send_email_ids"]:checked').each(function() {
            
            // console.log($(this).attr('rel'));
            var r= $(this).attr('rel'); 
            if(r != 'undefined'){               
                hrefs.push(r);             
            }

        });
        // console.log('send_email_ids i am',$('input[name="send_email_ids"]:checked').serialize());
        // console.log('send_email_ids i am',$('input[name="send_email_ids"]:checked').length > 0);
        console.log('send_email_ids i am',$('input[name="send_email_ids"]:checked').length);
        // return false;
        var url = "<?php echo base_url('admin/examshedule_schedule/send_invitation_user_all/')?>"
            $.ajax({
                url: url,
                type:'get',
                dataType: 'text',
                data : {data:hrefs,'send_consent_id':send_consent_id},
                    success:function(result){
                        alert("success, Sent Sucessfully");
                        $(':checkbox.send_email_ids').each(function() {
                        // alert(this.checked)
                        this.checked = false;     
                    });
                }
            });

    }else{
        alert('Please click on send at least two checkbox\n(कृपया कम से कम दो चेकबॉक्स भेजें पर क्लिक करें)');
        $("#allcheckids").focus();
        return false;
        
        }

    });



    // New Logic For Count Students on the basis of School Id  -- Jogi
    $(document).ready(function () {
let arr=[];
$('.send_email_ids').click(function(e) {
        if($(this).is(".send_email_ids:checked")) {
            arr.push(e.target.value)
        }
        else{
            arr = arr.filter(item => item !== e.target.value)
        }
      console.log('not recieve');
        $.ajax({
                type: "GET", 
                url: base_url+'admin/Examshedule_schedule/totalCountSchoolWise',
                data: { 'school_ids' : arr,'csfr_token_name':csfr_token_value },
                success: function(data) {
                    $('#schoolCount').removeClass("d-none");
                    $('#schoolWiseCounts').html(data);
                }

            });

    });

$('.select_all_count').click(function(e) {
    //  let arr=[];
        // alert(this.checked).attr('rel');
        // Iterate each checkbox
        
        $('.send_email_ids:checkbox').each(function() {
        // alert(this.checked)
            this.checked = true;     
            var r= $(this).attr('value'); 
            if(r !== 'undefined'){   
                arr.push(r); 
            
            }
        });
        // console.log('testing',arr);
        $.ajax({
                type: "GET", 
                url: base_url+'admin/Examshedule_schedule/totalCountSchoolWise',
                data: { 'school_ids' : 'all','csfr_token_name':csfr_token_value },
                success: function(data) {
                    $('#schoolCount').removeClass("d-none");
                    $('#schoolWiseCounts').html(data);
                }

            });

    });

$('.select_all_uncheck').click(function(e) {  
    $('.send_email_ids:checkbox').each(function() {
        // alert(this.checked)
            this.checked = false;     
            var r= $(this).attr('value'); 
            if(r !== 'undefined'){   
                arr.push(r); 
            
            }
        }); 
    $('#schoolCount').addClass("d-none");
    });
    
})

</script> 








