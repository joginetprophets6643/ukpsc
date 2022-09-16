$(document).ready(function () {
    $(document).on('change', '#Ownership', function ()
    {
        let get_val = $(this).val();
        let token = $("input[name=csrf_test_name]").val();
        let get_text = $("#Ownership option:selected").text();
        if (get_val == 0) {
            $('#Ownership_1').hide();
        } else {

            $.ajax({
                url: base_url + 'admin/certificate/getOwnership',
                data: {'id': get_val, 'csrf_test_name': token},
                type: 'post',
                dataType: 'json',
                success: function (result) {
                    $('#base_sector').text(get_text);
                    $('#show_owners').html(result);
                    $('#Ownership_1').show();
                }
            });
        }
    });

    $(document).on('change', '.degree', function ()
    {
        let get_val = $(this).val();
        var child_id = $(this).data('child_id');
        var label_name = $(this).data('label_name');
        let token = $("input[name=csrf_test_name]").val();
        let get_text = $("#Degree option:selected").text();
        if (get_val != '')
        {
            $.ajax({
                url: base_url + 'admin/certificate/getmedicaldegree',
                data: {'id': get_val, 'label_name': label_name, 'csrf_test_name': token},
                type: 'post',
                dataType: 'html',
                success: function (result) {
                    $('#' + child_id).html(result);
                }
            });

        }
    });
    //same as owner code  for filling data  
    $('.same_as_above').change(function ()
    {

        var prev_block = $(this).data('prev_block');
        var data_block = $(this).data('data_block');

        if (this.checked) {

            $("#" + data_block + "_address1").val($("#" + prev_block + "_address1").val());
            $("#" + data_block + "_address2").val($("#" + prev_block + "_address2").val());
            $("#" + data_block + "_fname").val($("#" + prev_block + "_fname").val());
            $("#" + data_block + "_city").val($("#" + prev_block + "_city").val());

            $("#state2").val($("#state").val());
            let city_val = $('#district_establishment').val();

            $("#" + data_block + "_city").val($("#" + prev_block + "_city").val());
            $("#" + data_block + "_mname").val($("#" + prev_block + "_mname").val());
            $("#" + data_block + "_lname").val($("#" + prev_block + "_lname").val());
            $("#" + data_block + "_mobile").val($("#" + prev_block + "_mobile").val());
            $("#" + data_block + "_fax").val($("#" + prev_block + "_fax").val());
            $("#" + data_block + "_web").val($("#" + prev_block + "_web").val());
            $("#" + data_block + "_tele").val($("#" + prev_block + "_tele").val());
            $("#" + data_block + "_email").val($("#" + prev_block + "_email").val());
            $("#" + data_block + "_std").val($("#" + prev_block + "_std").val());
            $("#" + data_block + "_pin").val($("#" + prev_block + "_pin").val());
            let distric_name = $("#state2").data('distric_name');
            changeDis($("#state2").val(), distric_name, city_val, 'district_owner');

        } else {
            $("#" + data_block + "_address1").val('');
            $("#" + data_block + "_address2").val('');
            $("#" + data_block + "_fname").val($("#" + prev_block + "_fname").val());
            $("#" + data_block + "_city").val($("#" + prev_block + "_city").val());
            $("#" + data_block + "_mname").val($("#" + prev_block + "_mname").val());
            $("#" + data_block + "_lname").val($("#" + prev_block + "_lname").val());
            $("#" + data_block + "_mobile").val($("#" + prev_block + "_mobile").val());
            $("#" + data_block + "_fax").val($("#" + prev_block + "_fax").val());
            $("#" + data_block + "_web").val($("#" + prev_block + "_web").val());
            $("#" + data_block + "_tele").val($("#" + prev_block + "_tele").val());
            $("#" + data_block + "_email").val($("#" + prev_block + "_email").val());
            $("#" + data_block + "_std").val($("#" + prev_block + "_std").val());
            $("#" + data_block + "_pin").val($("#" + prev_block + "_pin").val());


        }
    })

    $("#xin-form")["submit"](function (d)
    {


        var btn = $(this).find("input[type=submit]:focus").val();

        if ($("#establishment").val() == "") {
            alert("Please fill 'Establishment' field");
            $("#establishment").focus();
            return false;
        }
        if ($("#permanent_type").val() == "") {
            alert("Please Select 'Type' field");
            $("#permanent_type").focus();
            return false;
        }
        if ($("#establishment_address1").val() == "") {
            alert("Please fill 'Address' field");
            $("#establishment_address1").focus();
            return false;
        }

        var state = $("select#state option").filter(":selected").val();
        if (state == "") {
            alert("Please fill 'State' field");
            $("select#state").focus();
            return false;
        }
        var district = $("select#district_establishment option").filter(":selected").val();
        if (district == "") {
            alert("Please fill 'District' field");
            $("select#district_establishment").focus();
            return false;
        }
        var fpin = $("#establishment_pin").val();
        if ($('#establishment_pin').val() == "") {
            alert("Please fill 'Pin Code' field");
            $('#establishment_pin').focus();
            return false;
        }
        if (fpin.length != 6) {
            alert("Please fill 'PIN Number' field with 6 digit number");
            $('#establishment_pin').focus();
            return false;
        }
        if ($('#establishment_std').val() == "") {
            alert("Please fill 'STD Code' field");
            $('#establishment_std').focus();
            return false;
        }
        if ($('#establishment_tele').val() == "") {
            alert("Please fill 'Telephone' field");
            $('#establishment_tele').focus();
            return false;
        }
        
        var fmobileno = $('#establishment_mobile').val();
         var mobile_start = /^[6,7,8,9][0-9]{0,9}$/;
      
         if (!fmobileno.match(mobile_start)) {
            alert("Mobile Number should start from 9,8,7,6!");
            $("#establishment_mobile").focus();
            return false;
        }
        if (fmobileno == "") {
            alert("Please fill 'Mobile Number' field");
            $('#establishment_mobile').focus();
            return false;
        }

        if (fmobileno.length != 10) {
            alert("Please fill 'Mobile Number' field with 10 digit number");
            $('#establishment_mobile').focus();
            return false;
        }
        if ($('#establishment_fax').val() == "") {
            alert("Please fill 'Fax' field");
            $('#establishment_fax').focus();
            return false;
        }
        //Validation For Emailid
        var femail = $("#establishment_email").val();
        if (femail == "") {
            alert("Please fill 'Email Address' field");
            $("#establishment_email").focus();
            return false;
        }
        var mailformat = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (!femail.match(mailformat)) {
            alert("You have entered an invalid email address!");
            $("#establishment_email").focus();
            return false;
        }

        if ($("#owner_fname").val() == "") {
            alert("Please fill 'First Name' field");
            $("#owner_fname").focus();
            return false;
        }

       
        if ($("#owner_address1").val() == "") {
            alert("Please fill 'Address' field");
            $("#owner_address1").focus();
            return false;
        }
        var state = $("select#state2 option").filter(":selected").val();
        if (state == "") {
            alert("Please fill 'State' field");
            $("select#state2").focus();
            return false;
        }
        var district = $("select#district_establishment option").filter(":selected").val();
        if (district == "") {
            alert("Please fill 'District' field");
            $("select#district_owner").focus();
            return false;
        }
        var fmobileno = $('#owner_mobile').val();
        if (fmobileno == "") {
            alert("Please fill 'Mobile Number' field");
            $('#owner_mobile').focus();
            return false;
        }
        if (fmobileno.length != 10) {
            alert("Please fill 'Mobile Number' field with 10 digit number");
            $('#owner_mobile').focus();
            return false;
        }

        if ($("#person_fname").val() == "") {
            alert("Please fill 'First Name' field");
            $("#person_fname").focus();
            return false;
        }

      
        if ($("#Degree").val() == "") {
            alert("Select 'Degree' field");
            $("#Degree").focus();
            return false;
        }
        if ($("#catogory_1").val() == "") {
            alert("Select 'Catogory' field");
            $("#catogory_1").focus();
            return false;
        }
        if ($("#person_registration").val() == "") {
            alert("Please fill 'Registration' field");
            $("#person_registration").focus();
            return false;
        }
         if ($("#person_registration").val() == "") {
            alert("Please fill 'Registration' field");
            $("#person_registration").focus();
            return false;
        }
        if ($("#mobile_person").val() == "") {
            alert("Please fill 'Mobile' field");
            $("#mobile_person").focus();
            return false;
        }if ($("#person_email").val() == "") {
            alert("Please fill 'Email' field");
            $("#person_email").focus();
            return false;
        }
        if ($("#Ownership").val() == "") {
            alert("Please Select 'Ownership Type' field");
            $("#Ownership").focus();
            return false;
        }if ($("#show_owners").val() == "") {
            alert("Please Select 'Ownership' field");
            $("#show_owners").focus();
            return false;
        }
        if ($("#clinical_services").val() == "") {
            alert("Please Select 'Clinical Services' field");
            $("#clinical_services").focus();
            return false;
        }
       





        var extension = $('#fileName1').val().replace(/^.*\./, '');
        if (btn == 'Apply') {
            if (extension == '') {
                $("#fileName1").focus();
                alert("Please select fileName1");
                $('#fileName1').val('')
                return false;

            }
        }
        if (extension != '' && extension != 'pdf') {
            $("#fileName1").focus();
            alert("Please select pdf file in fileName1");
            $('#fileName1').val('')
            return false;

        }
        var fsize = $('#fileName1')[0].files[0].size;

        const file = Math.round((fsize / 1024));
        if (extension != '' && file > 1024) {
            $("#fileName1").focus();
            alert("fileName1 should be less than 1Mb");
            return false;

        }

        //-------------------------------------------------------------------------------------------------------------------------------

        var extension = $('#fileName2').val().replace(/^.*\./, '');
        if (btn == 'Apply') {
            if (extension == '') {
                $("#fileName2").focus();
                alert("Please select fileName2");
                $('#fileName2').val('')
                return false;

            }
        }
        if (extension != '' && extension != 'pdf') {
            $("#fileName2").focus();
            alert("Please select pdf in fileName2");
            $('#fileName2').val('')
            return false;

        }
        var fsize = $('#fileName2')[0].files[0].size;

        const file2 = Math.round((fsize / 1024));
        if (extension != '' && file > 1024) {
            $("#fileName2").focus();
            alert("fileName2 should be less than 1Mb");
            return false;

        }

        //-----------------------------------------------------------------------------------------------------------------------------------------------

        var extension = $('#fileName3').val().replace(/^.*\./, '');
        if (btn == 'Apply') {
            if (extension == '') {
                $("#fileName3").focus();
                alert("Please select fileName3");
                $('#fileName1').val('')
                return false;

            }
        }
        if (extension != '' && extension != 'pdf') {
            $("#fileName3").focus();
            alert("Please select pdf in fileName3");
            $('#fileName3').val('')
            return false;

        }
        var fsize = $('#fileName3')[0].files[0].size;

        const file3 = Math.round((fsize / 1024));
        if (extension != '' && file > 1024) {
            $("#fileName3").focus();
            alert("fileName3 should be less than 1Mb");
            return false;

        }

        //------------------------------------------------------------------------------------------------------------------------------------------------------
        // var extension = $('#fileName4').val().replace(/^.*\./, '');

        // if (btn == 'Apply') {
        //     if (extension == '') {
        //         $("#fileName4").focus();
        //         alert("Please select fileName4");
        //         $('#fileName4').val('')
        //         return false;

        //     }
        // }
        // if (extension != '' && extension != 'pdf') {
        //     $("#fileName4").focus();
        //     alert("Please select pdf in fileName4");
        //     $('#fileName4').val('')
        //     return false;

        // }
        // var fsize = $('#fileName4')[0].files[0].size;

        // const file4 = Math.round((fsize / 1024));
        // if (extension != '' && file > 1024) {
        //     $("#fileName4").focus();
        //     alert("fileName4 should be less than 1Mb");
        //     return false;
        // }
        if ($("#declaration").val() == "") {
            alert("Please Check  'Declaration' first");
            $("#declaration").focus();
            return false;
        }

        function sure_to_submite() {
            confirm("Are you sure!");
        }

    });

    $(".Print_preview").click(function ()
    {
        alert("Click Ok!");
        window.print();
    });

    $('.dd_state').change(function ()
    {
//        alert("Hi");
        var state_id = $(this).val();
        var distric_name = $(this).data('distric_name');
        changeDis(state_id, distric_name);
    });
    function changeDis(state_id, distric_name, replaceId = false, replaceIdVal = false) {

        if (state_id != '') {
            $('#othstate').val('').hide();
            $.ajax({
                type: "POST",
                url: base_url + 'admin/location/get_city_by_state_id',
                dataType: 'html',
                data: {'state_id': state_id, 'csfr_token_name': csfr_token_value},
                success: function (data) {
                    $('#district_' + distric_name).html(data);
                    if (replaceId) {
                        //alert(replaceIdVal);
                        $('#' + replaceIdVal).val(replaceId);
                    }
                }
            });
        } else {
            $('#state').val('').hide();
            $('#othstate').show();
    }
    }

    $(document).on('click', '.show_hide_form', function ()
    {
        let input_id = $(this).attr('id');
        let isChecked = $(this).is(':checked');

        if (isChecked) {
            $('#div_' + input_id).show();
        } else {
            $('#div_' + input_id).hide();
        }
    });


})