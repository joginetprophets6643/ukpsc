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
                                                            foreach($sub_info as $x => $val) {                                                    
                                                            $all_value = $val['id'];
                                                            // $passValue = ['dateExam'=>date("d-m-Y", strtotime($val['date_exam'])),'shiftExam'=>$val['shft_exam_array'],'timeExam'=>$val['time_exam_array'],'examId'=>$examinationid,'schoolId'=>$schoolId]
                                                            $passValue = $examinationid.",".$schoolId.",". date("d-m-Y", strtotime($val['date_exam'])).",".$val['shft_exam_array'].",".$val['time_exam_array'];

                                                            ?>
                                                        
                                                            <tr>
                                                                <td>
                                                                    <?= date("d-m-Y", strtotime($val['date_exam'])); ?>
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
                                                                    <input type="radio" id="yes" onclick="optionFunction('<?=$passValue?>','yes')" name="exmin_ceter_option[]<?= $x; ?>"
                                                                        value="Yes" checked>Yes
                                                                    <input type="radio" id="no"  onclick="optionFunction('<?=$passValue?>','no')" name="exmin_ceter_option[]<?= $x; ?>"
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
                    });
             
                });
                    // yes ANd No Function 
                function optionFunction(passArray,option)
                 {
                    var url = "<?php echo base_url('admin/Consent_active/optionsCheck/')?>"
                        $.ajax({
                            url: url,
                            type:'get',
                            data : {passArray: passArray,option:option},
                            success:function(result){
                                return false;
                                if(result)
                                {
                                $('.loader').addClass('d-none');
                                alert("success, Sent Sucessfully");
                                this.checked = false; 
                                window.location.reload(); 
                                }
                            
                            }
                        });

                 }
            </script>