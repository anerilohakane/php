var FormWizard = function () {


    return {
        //main function to initiate the module
        init: function () {
            if (!jQuery().bootstrapWizard) {
                return;
            }

            function format(state) {
                if (!state.id) return state.text; // optgroup
                return "<img class='flag' src='../../assets/global/img/flags/" + state.id.toLowerCase() + ".png'/>&nbsp;&nbsp;" + state.text;
            }

            $("#country_list").select2({
                placeholder: "Select",
                allowClear: true,
                formatResult: format,
                formatSelection: format,
                escapeMarkup: function (m) {
                    return m;
                }
            });

            var form = $('#submit_form');
            var error = $('.alert-danger', form);
            var success = $('.alert-success', form);

            form.validate({
                doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: ":hidden", 
                rules: {                    
                    f_name: {
                        required: true
                    },
                    m_name: {
                        required: true
                    },
                    l_name: {
                        required: true
                    },
                    mobile: {
                        required: true
                    },
                    dob: {
                        required: true
                    },
                    marital_status: {
                        required: true
                    },
                    caste: {
                        required: true
                    },
                    sub_caste: {
                        required: true
                    },
                    height: {
                        required: true
                    },
                    weight: {
                        required: true
                    },
                    blood_group: {
                        required: true
                    },
                    complexion: {
                        required: true
                    },
                    physical_disability: {
                        required: true
                    },
                    lens: {
                        required: true
                    },
                    rashi: {
                        required: true
                    },
                    nakshtra: {
                        required: true
                    },
                    charan: {
                        required: true
                    },
                    gan: {
                        required: true
                    },
                    nadi: {
                        required: true
                    },
                    mangal: {
                        required: true
                    },
                    birth_place: {
                        required: true
                    },
                    gotra: {
                        required: true
                    },
                    education: {
                        required: true
                    },
                    occupation_city: {
                        required: true
                    },
                    education_specification: {
                        required: true
                    },
                    occupation: {
                        required: true
                    },

                    income: {
                        required: true
                    },
                    document_no: {
                        required: true
                    },
                    phone: {
                        required: true
                    },
                    permanant_address: {
                        required: true
                    },
                    residence_address: {
                        required: true
                    },
                    father: {
                        required: true
                    },
                    father_full_name: {
                        required: true
                    },
                    mother: {
                        required: true
                    },
                    parent_residence_city: {
                        required: true
                    },
                    brothers: {
                        required: true
                    },
                    married_brothers: {
                        required: true
                    },
                    sisters: {
                        required: true
                    },
                    married_sisters: {
                        required: true
                    },
                    native_district: {
                        required: true
                    },
                    family_wealth: {
                        required: true
                    },
                    any_intercast_marriage: {
                        required: true
                    },
                    expected_mangal: {
                        required: true
                    },
                    expected_cast: {
                        required: true
                    },preffered_city: {
                        required: true
                    },
                    age_difference: {
                        required: true
                    },
                    expected_height: {
                        required: true
                    },
                    divorcee: {
                        required: true
                    },
                    expected_education: {
                        required: true
                    },
                    expected_income_per_annum: {
                        required: true
                    }
                },

                messages: { // custom messages for radio buttons and checkboxes
                    'payment[]': {
                        required: "Please select at least one option",
                        minlength: jQuery.validator.format("Please select at least one option")
                    }
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.attr("name") == "gender") { // for uniform radio buttons, insert the after the given container
                        error.insertAfter("#form_gender_error");
                    } else if (element.attr("name") == "payment[]") { // for uniform checkboxes, insert the after the given container
                        error.insertAfter("#form_payment_error");
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    success.hide();
                    error.show();
                    Metronic.scrollTo(error, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    if (label.attr("for") == "gender" || label.attr("for") == "payment[]") { // for checkboxes and radio buttons, no need to show OK icon
                        label
                            .closest('.form-group').removeClass('has-error').addClass('has-success');
                        label.remove(); // remove error label here
                    } else { // display success icon for other inputs
                        label
                            .addClass('valid') // mark the current input as valid and display OK icon
                        .closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                    }
                },

                submitHandler: function (form) {
                    if (jQuery().datepicker) {
                    $('.mask_date2').inputmask("d-m-y", {
                        autoUnmask: false
                    });
                }
                    success.show();
                    error.hide();
                    //add here some ajax code to submit your form or just call form.submit() if you want to submit the form without ajax
                }

            });
        
            var displayConfirm = function() {
                $('#tab4 .form-control-static', form).each(function(){
                    var input = $('[name="'+$(this).attr("data-display")+'"]', form);
                    if (input.is(":radio")) {
                        input = $('[name="'+$(this).attr("data-display")+'"]:checked', form);
                    }
                    if (input.is(":text") || input.is("textarea")) {
                        $(this).html(input.val());
                    } else if (input.is("select")) {
                        $(this).html(input.find('option:selected').text());
                    } else if (input.is(":radio") && input.is(":checked")) {
                        $(this).html(input.attr("data-title"));
                    } else if ($(this).attr("data-display") == 'payment[]') {
                        var payment = [];
                        $('[name="payment[]"]:checked', form).each(function(){ 
                            payment.push($(this).attr('data-title'));
                        });
                        $(this).html(payment.join("<br>"));
                    }
                });
            }

            var handleTitle = function(tab, navigation, index) {
                var total = navigation.find('li').length;
                var current = index + 1;
                // set wizard title
                $('.step-title', $('#form_wizard_1')).text('Step ' + (index + 1) + ' of ' + total);
                // set done steps
                jQuery('li', $('#form_wizard_1')).removeClass("done");
                var li_list = navigation.find('li');
                for (var i = 0; i < index; i++) {
                    jQuery(li_list[i]).addClass("done");
                }

                if (current == 1) {
                    $('#form_wizard_1').find('.button-previous').hide();
                } else {
                    $('#form_wizard_1').find('.button-previous').show();
                }

                if (current >= total) {
                    $('#form_wizard_1').find('.button-next').hide();
                    $('#form_wizard_1').find('.button-submit').show();
                    displayConfirm();
                } else {
                    $('#form_wizard_1').find('.button-next').show();
                    $('#form_wizard_1').find('.button-submit').hide();
                }
                Metronic.scrollTo($('.page-title'));
            }

            // default form wizard
            $('#form_wizard_1').bootstrapWizard({
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                onTabClick: function (tab, navigation, index, clickedIndex) {
                    return false;
                    /*
                    success.hide();
                    error.hide();
                    if (form.valid() == false) {
                        return false;
                    }
                    handleTitle(tab, navigation, clickedIndex);
                    */
                },
                onNext: function (tab, navigation, index) {
                    success.hide();
                    error.hide();
                    if (form.valid() == false) {
                        return false;
                    }
                    else 
                    {
                        handleTitle(tab, navigation, index);                        
                        var url = $(form).data('url');
                        var id = $('.button-next').attr('id');
                        var serialize_data = $(form).serialize();
                        serialize_data = {id:id,step:index};
                        Metronic.startPageLoading({animate: true});
                        
                        $(form).ajaxSubmit({
                            url:completeURL(url),          
                            data:serialize_data,
                            dataType:'json',
                            success: function(data)
                            {   //alert(); 
                             Metronic.stopPageLoading();                       
                                if(data.valid)
                                { 
                                    $('#form_wizard_1').find('.button-next').attr('id',data.id);  
                                    $('#form_wizard_1').find('.button-submit').attr('id',data.id);   
                                }
                                else
                                {
                                    bootbox.alert(data.msg);   
                                    $('#form_wizard_1').bootstrapWizard('show',1);               
                                }
                                
                            },
                            complete: function()
                            {
                                
                            }
                        }); 
                    } 
                },
                onPrevious: function (tab, navigation, index) {
                    success.hide();
                    error.hide();

                    handleTitle(tab, navigation, index);
                },
                onTabShow: function (tab, navigation, index) {
                    var total = navigation.find('li').length;
                    var current = index + 1;
                    var $percent = (current / total) * 100;
                    $('#form_wizard_1').find('.progress-bar').css({
                        width: $percent + '%'
                    });
                }
            });

            $('#form_wizard_1').find('.button-previous').hide();
            $('#form_wizard_1 .button-submit').click(function () {
                var url = $(form).data('url');
                var id = $('.button-submit').attr('id');
                var serialize_data = $(form).serialize();
                serialize_data = {id:id,step:'6'};

                $('.button-submit').attr('disabled','disabled');
                Metronic.startPageLoading({animate: true});
                
                $(form).ajaxSubmit({
                    url:completeURL(url),                     
                    data:serialize_data,
                    dataType:'json',
                    success: function(data)
                    { 
                        Metronic.stopPageLoading();

                        if(data.valid)
                        {                
                            //dialog.modal('hide');
                           /* bootbox.alert(data.msg, function(){
                                window.location.href=window.location.href;
                            });*/  
                            if(data.redirect)
                            {
                                bootbox.alert(data.msg, function() {
                                    setTimeout(function(){
                                        document.location.href=data.redirect;                                
                                    },1500);
                                });
                            }
                            else
                            {
                                bootbox.alert(data.msg, function() {
                                    setTimeout(function(){
                                        document.location.href=document.location.href;                                
                                    },1500);
                                });
                            }            
                        }
                        else
                        {
                            bootbox.alert(data.msg, function() {
                                $('.button-submit').removeAttr('disabled');  
                            });                 
                        }                        
                    },
                    complete: function()
                    {
                        
                    }
                }); 
                //alert('Finished! Hope you like it :)');
            }).hide();

            //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
            $('#country_list', form).change(function () {
                form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });
        
        }

    };

}();