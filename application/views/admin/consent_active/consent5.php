<?php 
// echo '<pre>';
// print_r($sub_name);
// die;
?>
<script type="text/javascript">
    $(function () {
        $('input').blur(function () {
            $(this).val(
                $.trim($(this).val())
            );
        });
    });
</script>
<style>
    .table-ms td,
    .table-ms th {
        border: 1px solid black;
    }

    .table-ms td:last-child {
        /* border-right: none; */
    }

    .formatColor {
        color:red;
        font-size:0.75rem;
    }

</style>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="card card-default color-palette-bo">
            <div class="card-header">
                <div class="d-inline-block">
                    <h3 class="card-title"> <i class="fa fa-pencil"></i> Update Details for - <span
                            style="font-weight:bold;">
                            <?php echo $user['exam_name']; ?>
                        </span> </h3>
                </div>
                </div>
  <div class="card-body">
                    <div class="container">
                        <div class="card">
                            <div class="form">
                                <div class="left-side">
                                    <!-- <div class="left-heading">
                                        <h3></h3>
                                    </div> -->
                                    <div class="steps-content">
                                        <h3 class="mb-0">Step <span class="step-number">6</span></h3>
                                        <!--<p class="step-number-content active">Enter your School/College Information.</p>
                                            <p class="step-number-content d-none">Enter your School/College Principal Deatils</p>
                                            <p class="step-number-content d-none">Enter your School/College Centre Superintendent Details</p>
                                            <p class="step-number-content d-none">Enter your School/College Centre Infrastructure Details.</p>
                                            <p class="step-number-content d-none">Add Bank Details</p>
                                            <p class="step-number-content d-none">Add your School/College Images as per required filed</p>-->
                                    </div>
                                    <ul class="progress-bar">
                                        <li>School/College Information <br>स्कूल/कॉलेज/विश्वविद्यालय विवरण</li>
                                        <li>Principal Deatils<br>प्रधानाचार्य का विवरण</li>
                                        <li>Centre Superintendent Details<br>केंद्र अधीक्षक का विवरण</li>
                                        <li>Infrastructure Details<br>बुनियादी ढांचे का विवरण</li>
                                        <li>Bank Details<br>बैंक विवरण</li>
                                        <li class="active">Upload Images<br>तश्वीरें अपलोड करो</li>
                                    </ul>
                                </div>
                                <div class="right-side">
                                    <?php echo form_open_multipart(base_url('admin/consent_active/consent_add_5'), 'id="xin-form" class="form-horizontal" '); ?>

                                    <script>
                                        function valueChanged() {
                                            if ($('#checkbox2').is(":checked")) {
                                                $("#down_form_up").hide();
                                                $("#upload_from").show();
                                                // $('#dwn').prop('disabled', true);
                                            } else {
                                                // $("#upload_from").hide();
                                                $("#upload_from").show();
                                            }
                                        }

                                    </script>
                                    <!-- <div class="main active" id="upload_from" style="display:none;" > -->
                                    <div class="main active" id="upload_from">
                                        <div class="text">
                                            <h2>Upload Images (तश्वीरें अपलोड करो)</h2>
                                            <p>Add your School/College/Institute Images as per required filed</p>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Parking Image <span class="formatColor">(JPG format Only)* </span><i style="color:#ff0000; font-size:12px;">*</i>
                                                </label>
                                                <input type="file" style="height: 35px !important; font-size: 14px !important;" class="form-control" name="fileName1" id="fileName1"
                                                    data-file_detail="file_detail1" onchange="get_detail(this);" />
                                                
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Classroom Image <span class="formatColor">(JPG format Only)* </span><i
                                                        style="color:#ff0000; font-size:12px;">*</i></label>
                                                <input type="file" style="height: 35px !important; font-size: 14px !important;" class="form-control" name="fileName2" id="fileName2"
                                                    data-file_detail="file_detail2" onchange="get_detail(this);" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Washroom Image <span class="formatColor">(JPG format Only)* </span><i
                                                        style="color:#ff0000; font-size:12px;">*</i></label>
                                                <input type="file" style="height: 35px !important; font-size: 14px !important;" class="form-control" name="fileName3" id="fileName3"
                                                    data-file_detail="file_detail3" onchange="get_detail(this);" />
                                                
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Main Gate Image <span class="formatColor">(JPG format Only)* </span><i
                                                        style="color:#ff0000; font-size:12px;">*</i></label>
                                                <input type="file" style="height: 35px !important; font-size: 14px !important;" class="form-control" name="fileName4" id="fileName4"
                                                    data-file_detail="file_detail4" onchange="get_detail(this);" />
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Locker Image <span class="formatColor">(JPG format Only)* </span><i
                                                        style="color:#ff0000; font-size:12px;">*</i></label>
                                                <input type="file" style="height: 35px !important; font-size: 14px !important;" class="form-control" name="fileName5" id="fileName5"
                                                    data-file_detail="file_detail5" onchange="get_detail(this);" />
                                                
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Main Gate image <span class="formatColor">(JPG format Only)* </span><i
                                                        style="color:#ff0000; font-size:12px;">*</i></label>
                                                <input type="file" style="height: 35px !important; font-size: 14px !important;" class="form-control" name="fileName6" id="fileName6"
                                                    data-file_detail="file_detail5" onchange="get_detail(this);" />
                                                
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-12">
                                                <h5 style="color: #373250;">Subject Line :-
                                                    <span class="text-bold" style="color: #e14658;">
                                                        <?php echo $info[0]['subjectline']?>
                                                    </span> 
                                                </h5>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover table-striped" style="">
                                                        <thead>
                                                            <tr>
                                                                <th>Date</th>
                                                                <th>Name in english</th>
                                                                <th>Exam shift</th>
                                                                <th>Exam Time </th>
                                                                <th>Options</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            // echo '<pre>';
                                                            // print_r($sub_info);
                                                            
                                                            foreach($sub_info as $x => $val) {
                                                            //    echo '<pre>';
                                                            //    print_r($val); 
                                                            $all_value = $val['id'];
                                                            ?>
                                                        
                                                            <tr>
                                                                <td>
                                                                    <?= $val['date_exam']; ?>
                                                                </td>
                                                                <td>
                                                                    <?= $val['sub_name_english'].'<br/>'.$val['sub_name_hindi'];?>
                                                                </td>
                                                                <td>
                                                                    <?= $val['shft_exam_array']; ?>
                                                                </td>
                                                                <td>
                                                                    <?= $val['time_exam_array']; ?>
                                                                </td>
                                                                <td>
                                                                    <input type="hidden" id="yes" id="examincation_ids"
                                                                        name="examincation_ids" value="<?= $val['sub_name'] ?>">
                                                                    <input type="radio" id="yes" name="exmin_ceter_option[]<?= $x; ?>"
                                                                        value="Yes" checked>Yes
                                                                    <input type="radio" id="no" name="exmin_ceter_option[]<?= $x; ?>"
                                                                        value="No">No
                                                                    <input type="hidden" name="examincation_id" id="examincation_id"
                                                                        value="<?= $all_value; ?>" />
                                                                </td>
        
        
        
                                                            </tr>
                                                        
                                                        <?php    
                                                                // print_r($val);
                                                            }
                                                            // die;
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <?php $segment_value = $this->uri->segment(4);?>
                                                <input type="hidden" name="ci_exam_registrationid5"
                                                    id="ci_exam_registrationid5" value="<?= $segment_value; ?>">
                                                <div class="form-group">
                                                    <a href="<?= base_url("admin/consent_active/consent_add_4".'/'.$segment_value ); ?>" id="dwn" class="btn btn-sec">
                                                        Back
                                                    </a>
                                                    <input type="submit" name="submit" id="submit"
                                                        class="btn btn-primary next_button"
                                                        value="Preview and Download Form">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <?php echo form_close(); ?>
                                    <?php echo form_open_multipart(base_url('admin/consent_active/consent_add_5'), 'id="from_upload" class="form-horizontal" '); ?>

                                    <div class="main active" id="from_upload_show">
                                        <div class="text ">
                                            <h2>Upload Downloaded Consent Form (Signed and Stamped)<span class="formatColor">(Only PDF & Maximum size 30MB)* </span></h2>
                                            <!-- <p>Add your School/College/Institute Images as per required filed</p> -->
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <input type="file" style="height: 35px !important; font-size: 14px !important;" class="form-control" name="from_upload_file"
                                                    id="from_upload_file" data-file_detail="file_detail1"
                                                    onchange="get_detail(this);" />
                                                <!-- <span>Upload File (दस्तावेज अपलोड करें) <i style="color:#ff0000; font-size:12px;">*</i> </span> -->
                                            </div>
                                        </div>
                                        <div class="input-text1">
                                            <?php $segment_value = $this->uri->segment(4);?>
                                            <input type="hidden" name="ci_exam_fileupload6" id="ci_exam_fileupload6"
                                                value="<?= $segment_value; ?>">
                                            <input type="submit" name="submitupload" id="submitupload"
                                                class="btn btn-primary btn-block btn-flat next_button"
                                                value="Upload Consent Form">
                                        </div>
                                    </div>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>


                        </div>
                    </div>
            </div>
            </div>
</section>
      </div>
            <?php echo form_close(); ?>
            <script type='text/javascript' src='#'></script>
            <script type='text/javascript' src='#'></script>
            <script type='text/javascript' src='#'></script>
            <script type='text/javascript' src='#'></script>
            <script type='text/javascript'>
                                                // var next_click = document.querySelectorAll(".next_button");
                                                // var main_form = document.querySelectorAll(".main");
                                                // var step_list = document.querySelectorAll(".progress-bar li");
                                                // var num = document.querySelector(".step-number");
                                                // let formnumber = 0;

                                                // next_click.forEach(function (next_click_form) {
                                                //     next_click_form.addEventListener('click', function () {
                                                //         if (!validateform()) {
                                                //             return false
                                                //         }
                                                //         formnumber++;
                                                //         updateform();
                                                //         progress_forward();
                                                //         contentchange();
                                                //     });
                                                // });

                                                // var back_click = document.querySelectorAll(".back_button");
                                                // back_click.forEach(function (back_click_form) {
                                                //     back_click_form.addEventListener('click', function () {
                                                //         formnumber--;
                                                //         updateform();
                                                //         progress_backward();
                                                //         contentchange();
                                                //     });
                                                // });

                                                // var username = document.querySelector("#principal_name");
                                                // var shownname = document.querySelector(".shown_name");


                                                // var submit_click = document.querySelectorAll(".submit_button");
                                                // submit_click.forEach(function (submit_click_form) {
                                                //     submit_click_form.addEventListener('click', function () {
                                                //         shownname.innerHTML = username.value;
                                                //         formnumber++;
                                                //         updateform();
                                                //     });
                                                // });

                                                // var heart = document.querySelector(".fa-heart");
                                                // heart.addEventListener('click', function () {
                                                //     heart.classList.toggle('heart');
                                                // });


                                                // var share = document.querySelector(".fa-share-alt");
                                                // share.addEventListener('click', function () {
                                                //     share.classList.toggle('share');
                                                // });



                                                // function updateform() {
                                                //     main_form.forEach(function (mainform_number) {
                                                //         mainform_number.classList.remove('active');
                                                //     })
                                                //     main_form[formnumber].classList.add('active');
                                                // }

                                                // function progress_forward() {
                                                //     // step_list.forEach(list => {

                                                //     //     list.classList.remove('active');

                                                //     // });


                                                //     num.innerHTML = formnumber + 1;
                                                //     step_list[formnumber].classList.add('active');
                                                // }

                                                // function progress_backward() {
                                                //     var form_num = formnumber + 1;
                                                //     step_list[form_num].classList.remove('active');
                                                //     num.innerHTML = form_num;
                                                // }

                                                // var step_num_content = document.querySelectorAll(".step-number-content");

                                                // function contentchange() {
                                                //     step_num_content.forEach(function (content) {
                                                //         content.classList.remove('active');
                                                //         content.classList.add('d-none');
                                                //     });
                                                //     step_num_content[formnumber].classList.add('active');
                                                // }


                                                // function validateform() {
                                                //     validate = true;
                                                //     var validate_inputs = document.querySelectorAll(".main.active input");
                                                //     validate_inputs.forEach(function (vaildate_input) {
                                                //         vaildate_input.classList.remove('warning');
                                                //         if (vaildate_input.hasAttribute('require')) {
                                                //             if (vaildate_input.value.length == 0) {
                                                //                 validate = false;
                                                //                 vaildate_input.classList.add('warning');
                                                //             }
                                                //         }
                                                //     });
                                                //     return validate;

                                                // }
            </script>
            <script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');
                myLink.addEventListener('click', function (e) {
                    e.preventDefault();
                });
            </script>
            <script>
                $(document).ready(function () {

                    $("#xin-form")["submit"](function () {

                        var fileName1 = $("#fileName1").val();
                        var extension1 = fileName1.split('.').pop().toUpperCase();
                        if (fileName1 == "") {
                            alert("Please upload images 'Parking'\nकृपया चित्र अपलोड करें 'पार्किंग'");
                            $("#fileName1").focus();
                            return false;
                        } else if (extension1 != "PDF" && extension1 != "JPG" && extension1 != "JPEG") {
                            avatarok = 0;
                            alert("Invalid extension " + extension1 + " Please upload PDF,JPG,JPEG\n" + "अमान्य एक्सटेंशन" + extension1 + "कृपया पीडीएफ, जेपीजी, जेपीईजी अपलोड करें");
                            $("#fileName1").focus();
                            return false;
                        }

                        var fileName2 = $("#fileName1").val();
                        var extension2 = fileName2.split('.').pop().toUpperCase();
                        if ($("#fileName2").val() == "") {
                            alert("Please upload images 'Classroom'\nकृपया चित्र अपलोड करें 'कक्षा'");
                            $("#fileName2").focus();
                            return false;
                        } else if (extension2 != "PDF" && extension2 != "JPG" && extension2 != "JPEG") {
                            avatarok = 0;
                            alert("Invalid extension " + extension2 + " Please upload PDF,JPG,JPEG\n" + "अमान्य एक्सटेंशन" + extension2 + "कृपया पीडीएफ, जेपीजी, जेपीईजी अपलोड करें");
                            $("#fileName2").focus();
                        }

                        var fileName3 = $("#fileName1").val();
                        var extension3 = fileName3.split('.').pop().toUpperCase();
                        if ($("#fileName3").val() == "") {
                            alert("Please upload images 'Washroom'\nकृपया चित्र अपलोड करें 'वाशरूम'");
                            $("#fileName3").focus();
                            return false;
                        } else if (extension3 != "PDF" && extension3 != "JPG" && extension3 != "JPEG") {
                            avatarok = 0;
                            alert("Invalid extension " + extension3 + " Please upload PDF,JPG,JPEG\n" + "अमान्य एक्सटेंशन" + extension3 + "कृपया पीडीएफ, जेपीजी, जेपीईजी अपलोड करें");
                            $("#fileName3").focus();
                            return false;
                        }

                        var fileName4 = $("#fileName4").val();
                        var extension4 = fileName4.split('.').pop().toUpperCase();
                        if ($("#fileName4").val() == "") {
                            alert("Please upload images 'Main Gate'\nकृपया चित्र अपलोड करें 'मेन गेट'");
                            $("#fileName4").focus();
                            return false;
                        } else if (extension4 != "PDF" && extension4 != "JPG" && extension4 != "JPEG") {
                            avatarok = 0;
                            alert("Invalid extension " + extension4 + " Please upload PDF,JPG,JPEG\n" + "अमान्य एक्सटेंशन" + extension4 + "कृपया पीडीएफ, जेपीजी, जेपीईजी अपलोड करें");
                            $("#fileName4").focus();
                            return false;
                        }

                        var fileName5 = $("#fileName5").val();
                        var extension5 = fileName5.split('.').pop().toUpperCase();
                        if (fileName5 == "") {
                            alert("Please upload images 'Locker'\nकृपया चित्र अपलोड करें 'लॉकर'");
                            $("#fileName5").focus();
                            return false;
                        } else if (extension5 != "PDF" && extension5 != "JPG" && extension5 != "JPEG") {
                            avatarok = 0;
                            alert("Invalid extension " + extension5 + " Please upload PDF,JPG,JPEG\n" + "अमान्य एक्सटेंशन" + extension5 + "कृपया पीडीएफ, जेपीजी, जेपीईजी अपलोड करें");
                            $("#fileName5").focus();
                            return false;
                        }

                        var fileName6 = $("#fileName6").val();
                        var extension6 = fileName6.split('.').pop().toUpperCase();
                        if (fileName6 == "") {
                            alert("Please upload 'Main Gate image'\nकृपया 'मेन गेट इमेज' अपलोड करें");
                            $("#fileName6").focus();
                            return false;
                        } else if (extension6 != "PDF" && extension6 != "JPG" && extension6 != "JPEG") {
                            avatarok = 0;
                            alert("Invalid extension " + extension6 + " Please upload PDF,JPG,JPEG\n" + "अमान्य एक्सटेंशन" + extension6 + "कृपया पीडीएफ, जेपीजी, जेपीईजी अपलोड करें");
                            $("#fileName6").focus();
                            return false;
                        }

                    });
                    $("#submitupload").click(function () {
                        var from_upload_file = $("#from_upload_file").val();
                        var from_upload_fileex = from_upload_file.split('.').pop().toUpperCase();
                        if (from_upload_file == "") {
                            alert("Please upload file 'Upload Sign and Stamp Consent Form'\nकृपया फ़ाइल अपलोड करें 'अपलोड साइन और स्टाम्प सहमति फॉर्म'");
                            $("#from_upload_file").focus();
                            return false;
                        } else if (from_upload_fileex != "PDF") {
                            avatarok = 0;
                            alert("Invalid extension " + from_upload_fileex + " Please upload PDF\n" + "अमान्य एक्सटेंशन" + from_upload_fileex + "कृपया पीडीएफ अपलोड करें");
                            $("#from_upload_file").focus();
                            return false;
                        }
                        $("#submitupload").submit();

                        // alert("123214564");
                        // return false;
                        //  $("#from_upload")["submitupload"](function () {
                        //     alert("123214564");
                        //     return false;
                        // });
                    });

                });
//     $('#xin-form').submit(function() {
//     $.ajax({
//         type: 'POST',
//         url: $(this).attr('action'),
//         dataType: 'json',
//         success: function(json) {
//            window.location.href = "<?php //base_url("admin/examshedule_schedule/invitation_reply/" . urlencrypt($info['id'])); ?>";
//         }
//     })
//     return false;
// });

            </script>