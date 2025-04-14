$(document).ready(function(){

    /*window.onbeforeunload = function () {
               return 'Are you really want to perform the action?';
            }*/
    
     if (jQuery().datepicker) {
        $('.date1').datepicker({
            orientation: "right",
            autoclose: true,
        });
    }
    
     $(document).on('change','.gender',function(){

       if($(this).is(":checked"))
       {
            $(this).parents('.row').find('#from_date').val('');
            var gender= $(this).val();
            if(gender=='Male')
            {
                var endDate = new Date();
                endDate.setDate(endDate.getDate() - 7665);
                $('.date2').datepicker('setEndDate', endDate);
            }
            if(gender=='Female')
            {
                var endDate = new Date();
                endDate.setDate(endDate.getDate() - 6570);
                $('.date2').datepicker('setEndDate', endDate);
            }
       }
    }); 

    if (jQuery().datepicker) {
        $('.date2').datepicker({
            orientation: "right",
            autoclose: true,
        });
    }

    $(document).on('click','.addDynaRowupload',function(){        
            
            var clonedRow = $(this).parents('.appendDynaRowupload').find('.appendDynaRowupload1').find('div:first').clone();
            
            clonedRow.removeClass('display-hide');           
            clonedRow.find('span.fileinput-exists').css('display','none');           
            clonedRow.find('span.fileinput-new').css('display','block');            
            clonedRow.find('.fileinput-filename').html(' ');
            clonedRow.find('.fileinput-exists').removeClass('close');
            clonedRow.find('.tooltip').css('display','none');       
            clonedRow.find('div.addDeleteButton').append('<span class="tooltips deleteParticularRowupload" data-placement="top" data-original-title="Remove" style="cursor: pointer;"><a>Remove File </a> </span>');
            clonedRow.find('.tooltips').tooltip({placement: 'top'});
            $(this).parents('.appendDynaRowupload').find('.appendDynaRowupload1').append(clonedRow);       
    });

    $(document).on('click','.deleteParticularRowupload', function(){  
        //$(this).parents('.appendDynaRowupload').find('.plus').show();  
        $(this).parents('.delete_div').remove();     
    });


    $(document).on('click','.common_save',function(e){
        var form = '#'+$(this).parents('form').attr('id');
        var error = $('.alert-danger', form);
        var success = $('.alert-success', form);
        var id = $(this).attr('rel');

        $(form).validate({ 
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: ".ignore,:hidden",  // validate all fields including form hidden input
            rules: {
                country_name: 
                { 
                    required: true
                },
                first_name: 
                { 
                    required: true
                },
                last_name: 
                { 
                    required: true
                },
                contact_no: 
                { 
                    required: true,
                    number:true
                },
                email_address: 
                { 
                    required: true,
                    email:true
                },
                country_name: 
                { 
                    required: true
                },
                state_name:
                {
                    required:true
                },
                city_name:
                {
                    required:true
                },
                role_name:
                {
                    required:true
                },
                user_fname:
                {
                    required:true
                },
                user_lname:
                {
                    required:true
                },
                user_email:
                {
                    required:true
                },
                user_mobile:
                {
                    required:true
                },
                role_id:
                {
                    required:true
                },
                user_name:
                {
                    required:true
                },
                user_pass:
                {
                    required:true
                },
                cuser_pass:
                {
                    required:true
                },

                slider_name:
                {
                    required:true
                },
                slider_desc:
                {
                    required:true
                },
                profile_for:
                {
                    required:true
                },
                f_name:
                {
                    required:true
                },
                m_name:
                {
                    required:true
                },
                l_name:
                {
                    required:true
                },
                email_id:
                {
                    required:true
                },
                mobile_no:
                {
                    required:true
                },
                dob:
                {
                    required:true
                },
                name:
                {
                    required:true
                },
                comment:
                {
                    required:true
                },
                date:
                {
                    required:true
                },
                profile_name:
                {
                    required:true
                },
                profile_desc:
                {
                    required:true
                },
                cast_name:
                {
                    required:true
                },
                cast_desc:
                {
                    required:true
                },
                charan_name:
                {
                    required:true
                },
                charan_desc:
                {
                    required:true
                },
                community_name:
                {
                    required:true
                },
                community_desc:
                {
                    required:true
                },
                complexion_name:
                {
                    required:true
                },
                complexion_desc:
                {
                    required:true
                },
                education_name:
                {
                    required:true
                },
                education_desc:
                {
                    required:true
                },
                gan_name:
                {
                    required:true
                },
                gan_desc:
                {
                    required:true
                },
                mangal_name:
                {
                    required:true
                },
                mangal_desc:
                {
                    required:true
                },
                marital_name:
                {
                    required:true
                },
                marital_desc:
                {
                    required:true
                },
                nadi_name:
                {
                    required:true
                },
                nadi_desc:
                {
                    required:true
                },
                nakshtra_name:
                {
                    required:true
                },
                nakshtra_desc:
                {
                    required:true
                },
                rashi_name:
                {
                    required:true
                },
                rashi_desc:
                {
                    required:true
                },
                sub_cast_name:
                {
                    required:true
                },
                sub_cast_desc:
                {
                    required:true
                },
                amount:
                {
                    required:true
                },
                desc:
                {
                    required:true
                },
                validity:
                {
                    required:true
                },
                otp: 
                { 
                    required: true
                },
                customer: 
                { 
                    required: true
                },
                membership: 
                { 
                    required: true
                },
                payment_mode: 
                { 
                    required: true
                },
                check_no: 
                { 
                    required: true
                }
            }, 

            invalidHandler: function (event, validator) { //display error alert on form submit              
                success.hide();
                error.show();
                $('html,body').animate({scrollTop:0});
            },
 
            errorPlacement: function (error, element) { // render error placement for each input type
                var icon = $(element).parent('.input-icon').children('i');
                icon.removeClass('fa-check').addClass("fa-warning");  
                icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
            },

            highlight: function (element) { // hightlight error inputs
                $(element).closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
            },

            unhighlight: function (element) { // revert the change done by hightlight
                
            },

            success: function (label, element) {
                var icon = $(element).parent('.input-icon').children('i');
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                icon.removeClass("fa-warning").addClass("fa-check");
            },

            submitHandler: function (form) {
                $('.common_save').prop('disabled',true);
                var url = $(form).attr('action');
                var serialize_data = $(form).serialize();
                serialize_data = {id:id};
                Metronic.startPageLoading({animate: true});
                $(form).ajaxSubmit({
                    type:'POST',
                    url:completeURL(url), 
                    dataType:'json',
                    data:serialize_data,
                    success:function(data)
                    {  
                        Metronic.stopPageLoading(); 
                        $('.common_save').prop('disabled',false);
                        if(data.valid) 
                        {   
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
                            if(data.no_popup)
                            {
                               bootbox.alert(data.msg);
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

                    }
                });
            }
        });
    });

    $(document).on('click','.password_updation',function(){        
        var tburl=$(this).data('url');
        var title=$(this).attr('rev');
        var id = $(this).attr('rel');        
        $.ajax({
            url:completeURL(tburl),         
            type:'POST',
            dataType:'json',
            success: function(data)
            {
                var dialog = bootbox.dialog({
                    message: data.view,
                    title: 'Change Your Password',
                    buttons: 
                    {
                        success: {
                            label: "Submit",
                            className: "green changeButtonType",
                            callback: function() 
                            {
                                var form= '#'+ $('.update').attr('id');
                                var url=$(form).attr('action');
                                                                
                                var form2 = $(form);
                                var error2 = $('.alert-danger', form2);
                                var success2 = $('.alert-success', form2);

                                var validate = $(form).validate({
                                    errorElement: 'span', //default input error message container
                                    errorClass: 'help-block', // default input error message class
                                    focusInvalid: false, // do not focus the last invalid input
                                    ignore: "",  // validate all fields including form hidden input,
                                    debug: true,
                                    rules: {
                                        current_pass : {                                            
                                            required: true                     
                                        },
                                        new_pass  : {                                            
                                            required: true            
                                        },
                                        confirm_pass  : {                                            
                                            required: true,
                                            equalTo: "#user_pass"                                                               
                                        }                                        
                                    },

                                    invalidHandler: function (event, validator) { //display error alert on form submit              
                                        success2.hide();
                                        error2.show();
                                        Metronic.scrollTo(error2, -200);
                                    },

                                    errorPlacement: function (error, element) { // render error placement for each input type
                                        var icon = $(element).parent('.input-icon').children('i');
                                        icon.removeClass('fa-check').addClass("fa-warning");  
                                        icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
                                    }, 

                                    highlight: function (element) { // hightlight error inputs
                                        $(element)
                                            .closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
                                    },

                                    unhighlight: function (element) { // revert the change done by hightlight
                                        $(element)
                                            .closest('.form-group').removeClass('has-error'); // set error class to the control group
                                    },

                                    success: function (label, element) {
                                        var icon = $(element).parent('.input-icon').children('i');
                                        $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                                        icon.removeClass("fa-warning").addClass("fa-check");
                                    },

                                    submitHandler: function (form) {
                                        
                                    }
                                }).form();
                                
                                var $valid = $(form).valid();
                                if(!$valid) 
                                {                                                               
                                    return false;
                                }
                                else
                                {                               
                                    $('.changeButtonType').attr('disabled','disabled');                     
                                    
                                    $(form).ajaxSubmit({
                                        url:url,                                   
                                        dataType:'json',
                                        success: function(data)
                                        {
                                            if(data.valid)
                                            {
                                                dialog.modal('hide');
                                                bootbox.alert(data.msg, function(){});                 
                                            }
                                            else
                                            {
                                                bootbox.alert(data.msg, function() {
                                                    $('.changeButtonType').removeAttr('disabled');  
                                                });                 
                                            } 
                                        }

                                    });  
                                    return false;
                                }
                            }
                        },
                        danger: {
                            label: "Cancel",
                            className: "btn-danger",
                            callback: function() {
                                // Example.show("uh oh, look out!");
                            }
                        }                   
                    }
                });
            },
            complete:function() {                
               $('.modal-footer').find('.changeButtonType').attr('type','submit');
            }
        });
    }); 

    $(document).on('click','.password_updation1',function(){        
        var tburl=$(this).data('url');
        var title=$(this).attr('rev');
        var id = $(this).attr('rel');        
        $.ajax({
            url:completeURL(tburl),         
            type:'POST',
            dataType:'json',
            success: function(data)
            {
                var dialog = bootbox.dialog({
                    message: data.view,
                    title: 'Forgot Password',
                    buttons: 
                    {
                        success: {
                            label: "Submit",
                            className: "green changeButtonType",
                            callback: function() 
                            {
                                var form= '#'+ $('.update').attr('id');
                                var url=$(form).attr('action');
                                                                
                                var form2 = $(form);
                                var error2 = $('.alert-danger', form2);
                                var success2 = $('.alert-success', form2);

                                var validate = $(form).validate({
                                    errorElement: 'span', //default input error message container
                                    errorClass: 'help-block', // default input error message class
                                    focusInvalid: false, // do not focus the last invalid input
                                    ignore: "",  // validate all fields including form hidden input,
                                    debug: true,
                                    rules: {
                                        email : {                                            
                                            required: true,
                                            email:true                    
                                        }                                       
                                    },

                                    invalidHandler: function (event, validator) { //display error alert on form submit              
                                        success2.hide();
                                        error2.show();
                                        Metronic.scrollTo(error2, -200);
                                    },

                                    errorPlacement: function (error, element) { // render error placement for each input type
                                        var icon = $(element).parent('.input-icon').children('i');
                                        icon.removeClass('fa-check').addClass("fa-warning");  
                                        icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
                                    }, 

                                    highlight: function (element) { // hightlight error inputs
                                        $(element)
                                            .closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
                                    },

                                    unhighlight: function (element) { // revert the change done by hightlight
                                        $(element)
                                            .closest('.form-group').removeClass('has-error'); // set error class to the control group
                                    },

                                    success: function (label, element) {
                                        var icon = $(element).parent('.input-icon').children('i');
                                        $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                                        icon.removeClass("fa-warning").addClass("fa-check");
                                    },

                                    submitHandler: function (form) {
                                        
                                    }
                                }).form();
                                
                                var $valid = $(form).valid();
                                if(!$valid) 
                                {                                                               
                                    return false;
                                }
                                else
                                {                               
                                    $('.changeButtonType').attr('disabled','disabled');                     
                                    
                                    $(form).ajaxSubmit({
                                        url:url,                                   
                                        dataType:'json',
                                        success: function(data)
                                        {
                                            if(data.valid)
                                            {
                                                dialog.modal('hide');
                                                bootbox.alert(data.msg, function() {
                                                    setTimeout(function(){
                                                        document.location.href=document.location.href;                                
                                                    },1500);
                                                });                 
                                            }
                                            else
                                            {
                                                bootbox.alert(data.msg, function() {
                                                    $('.changeButtonType').removeAttr('disabled');  
                                                });                 
                                            } 
                                        }

                                    });  
                                    return false;
                                }
                            }
                        },
                        danger: {
                            label: "Cancel",
                            className: "btn-danger",
                            callback: function() {
                                // Example.show("uh oh, look out!");
                            }
                        }                   
                    }
                });
            },
            complete:function() {                
               $('.modal-footer').find('.changeButtonType').attr('type','submit');
            }
        });
    });   
    
    $(document).on('mousedown','.show_pass', function(){
        $(this).parents('.row').find('.password').attr("type","text");
    });

    $(document).on('mouseup','.show_pass', function(){
        $(this).parents('.row').find('.password').attr("type","password");
    }); 

    $(document).on('change','.role_configuration',function(){    
        var id = $(this).val();
       $.ajax({
            type:'POST',
            url:completeURL('fetch_role_config'),
            data:{id:id},
            dataType:'json', 
            success:function(data) 
            {             
                $('.prevelege_data').html(data.view);
            },
            complete:function()
            {
                Metronic.init(); // init metronic core components
                Layout.init(); // init current layout
            }
        }); 
    });
    
    $(document).on('change','.category_select_all',function(){
       if($(this).is(":checked"))
       {
            $(this).parents('.panel-collapse').find('.portlet-body input[type=checkbox]').each(function( index ) {
                $(this).prop('checked', true); 
            });
       }else
       {
            $(this).parents('.panel-collapse').find('.portlet-body').find('input[type=checkbox]').prop('checked', false);
       }
       $.uniform.update();
    }); 

    $(document).on('click','.editRecord', function(){
        var id = $(this).attr('rel');
        var url = $(this).attr('rev');

        $.ajax({
            url : completeURL(url),
            type : 'POST',
            dataType : 'html',
            data:{id:id},
            success:function(data)
            {          
                $('html, body').animate({scrollTop:0});
                $('.form').html($(data).find('.form').html());
            },
            complete:function(){
                Metronic.init();
                if (jQuery().select2) {
                    $(".taglist").select2({tags: [] });
                }
                if(jQuery().summernote)
                {
                    $('.summernote').summernote({height: 200});
                }
                if (jQuery().datepicker) {
                    $('.date1').datepicker({
                        orientation: "right",
                        autoclose: true,
                    });
                }
            }
        }); 
    });


    
    $(document).on('click','.clearData', function(){

        var formId = '#'+$(this).parents('form').attr('id');
        $(formId).find('input:text, input:password, input:file, textarea, select').val('');
        $(formId).find('input:checkbox').removeAttr('checked').removeAttr('selected');
        $(formId).find('.select2-container').select2('val','0');
        $('html, body').animate({scrollTop:0});
    });
    $(document).on('click','.deleteRecord' , function(){
        var deleteDiv = $(this);
        bootbox.confirm("Are you sure?", function(result) {
            if(result)
            {
                var id = deleteDiv.attr('rel');
                var url = deleteDiv.attr('rev');
                
                $.ajax({
                    url : completeURL(url),
                    type:'POST',
                    dataType:'json',
                    data:{id:id},
                    success:function(data)
                    {
                        bootbox.alert(data.msg, function() {
                            setTimeout(function(){
                                document.location.href=document.location.href;                                
                            },1500);
                        });
                    }
                });
            }
        }); 
    });

    $(document).on('click','.send_request' , function(){
        var deleteDiv = $(this);
        var id = deleteDiv.attr('rel');
        var url = deleteDiv.attr('rev');
        $.ajax({
            url : completeURL(url),
            type:'POST',
            dataType:'json',
            data:{id:id},
            success:function(data)
            {
                bootbox.alert(data.msg, function() {
                    setTimeout(function(){
                        document.location.href=document.location.href;                                
                    },1500);
                });
            }
        }); 
    });
    
    $(document).on('change','.pre_country',function(){ 
        var id = $(this).val();
        $.ajax({
            type:'POST',
            url:completeURL('state_by_country'),
            data:{id:id},
            dataType:'json',
            success:function(data)
            {      
                $('.pre_state').html(data);
            },
            complete:function()
            {
                //Metronic.stopPageLoading(); 
                $('select').select2();
            }
        }); 
    });

    $(document).on('change','.pre_state',function(){    
        var id = $(this).val();
        $.ajax({
            type:'POST',
            url:completeURL('city_by_state'),
            data:{id:id},
            dataType:'json',
            success:function(data)
            {      
                $('.pre_city').html(data);
            },
            complete:function()
            {
                //Metronic.stopPageLoading(); 
                $('select').select2();
            }
        }); 
    });

    $(document).on('click','.popup_save',function()
    {
        var id = $(this).attr('rel');
        var url = $(this).attr('rev');
        var title= $(this).data('title');
        var data={id:id};
        $.ajax({
            url:completeURL(url), 
            data:data,          
            type:'POST',  
            dataType:'json', 
            success: function(data)
            {   
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

                    var dialog = bootbox.dialog({
                        message: data.view,
                        title: title, 
                        buttons: { 
                            success: {
                                label: "Submit",
                                className: "btn-success",
                                callback: function() {
                                    var form= '#popup_save';
                                    var url = $(form).attr('action');
                                    // alert(url);
                                    var serialize_data = $(form).serialize();
                                    serialize_data = {serialize_data:serialize_data,id:id};
                                    //alert(serialize_data);                                    

                                    var form2 = $(form);
                                    var error2 = $('.alert-danger', form2);
                                    var success2 = $('.alert-success', form2);

                                    var validate = $(form).validate({
                                        errorElement: 'span', //default input error message container
                                        errorClass: 'help-block', // default input error message class
                                        focusInvalid: false, // do not focus the last invalid input
                                        ignore: "hidden",  // validate all fields including form hidden input,
                                        debug: true,
                                        rules: {
                                          
                                            user_fname: 
                                            {
                                                required: true
                                            },
                                            user_lname: 
                                            {
                                                required: true
                                            },  
                                            user_email: 
                                            {
                                                required: true,
                                                email:true
                                            },  
                                            user_mobile: 
                                            {
                                                required: true,
                                                number: true
                                            }, 
                                            address_name: 
                                            {
                                                required: true
                                            }, 
                                            address_mobile: 
                                            {
                                                required: true,
                                                number:true
                                            },
                                            address_mail: 
                                            {
                                                required: true,
                                                email:true
                                            }, 
                                            address: 
                                            {
                                                required: true
                                            },
                                            address_landmark: 
                                            {
                                                required: true
                                            },
                                            address_state: 
                                            {
                                                required: true
                                            },
                                            address_city: 
                                            {
                                                required: true
                                            },
                                            address_pincode: 
                                            {
                                                required: true,
                                                number:true
                                            },
                                            amount: 
                                            {
                                                required: true,
                                                number:true
                                            },
                                            validity: 
                                            {
                                                required: true,
                                                number:true
                                            },
                                            desc: 
                                            {
                                                required: true
                                            }
                                        },

                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                            success2.hide();
                                            error2.show();
                                           /* Metronic.scrollTo(error2, -200);*/
                                        },

                                        errorPlacement: function (error, element) { // render error placement for each input type
                                            var icon = $(element).parent('.input-icon').children('i');
                                            icon.removeClass('fa-check').addClass("fa-warning");  
                                            icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
                                        }, 

                                        highlight: function (element) { // hightlight error inputs
                                            $(element)
                                                .closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
                                        },

                                        unhighlight: function (element) { // revert the change done by hightlight
                                            $(element)
                                                .closest('.form-group').removeClass('has-error'); // set error class to the control group
                                        },

                                        success: function (label, element) {
                                            var icon = $(element).parent('.input-icon').children('i');
                                            $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                                            icon.removeClass("fa-warning").addClass("fa-check");
                                        },

                                        submitHandler: function (form) {
                                            
                                        }
                                    }).form();
                                    var $valid = $(form).valid();
                                    if(!$valid) 
                                    {                                                               
                                        return false;
                                    }
                                    else
                                    { 
                                        Metronic.startPageLoading({animate: true});
                                        $(form).ajaxSubmit({
                                            type:'POST',
                                            url:completeURL(url), 
                                            dataType:'json',
                                            data: serialize_data,
                                            success:function(data)
                                            {   
                                               Metronic.stopPageLoading();
                                                if(data.valid)
                                                {  
                                                    if(data.redirect)
                                                    {
                                                        bootbox.alert(data.msg, function() {
                                                            window.location.href = data.redirect;
                                                        }); 
                                                    }
                                                    else
                                                    {
                                                        bootbox.alert(data.msg, function() {
                                                            window.location.href = window.location.href;
                                                        }); 
                                                    }
                                                }   
                                                else
                                                {
                                                    bootbox.alert(data.msg, function() {
                                                        window.location.href = window.location.href;
                                                    }); 
                                                }                                        
                                            }
                                        });
                                    }                                         
                                }
                            },
                            danger: {
                                label: "Cancel",
                                className: "btn-danger",
                                callback: function() { }
                            } 
                        }
                    });
                }
            },
            complete:function()
            {   
                if (jQuery().select2)
                {
                    $('select').select2();   
                }    
            }
        }); 
    });

    $(document).on('click','.popup_save1',function()
    {
        var id = $(this).attr('rel');
        var url = $(this).attr('rev');
        var title= $(this).data('title');
        var data={id:id};
        $.ajax({
            url:completeURL(url), 
            data:data,          
            type:'POST',  
            dataType:'json', 
            success: function(data)
            {   
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

                    var dialog = bootbox.dialog({
                        message: data.view,
                        title: title, 
                       /* buttons: {*/ 
                            success: {
                                //label: "Search",
                                //className: "btn-success",
                                callback: function() {
                                    var form= '#popup_save';
                                    var url = $(form).attr('action');
                                    // alert(url);
                                    var serialize_data = $(form).serialize();
                                    serialize_data = {serialize_data:serialize_data,id:id};
                                    //alert(serialize_data);                                    

                                    var form2 = $(form);
                                    var error2 = $('.alert-danger', form2);
                                    var success2 = $('.alert-success', form2);

                                    var validate = $(form).validate({
                                        errorElement: 'span', //default input error message container
                                        errorClass: 'help-block', // default input error message class
                                        focusInvalid: false, // do not focus the last invalid input
                                        ignore: "hidden",  // validate all fields including form hidden input,
                                        debug: true,
                                        rules: {
                                          
                                            user_fname: 
                                            {
                                                required: true
                                            }
                                        },

                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                            success2.hide();
                                            error2.show();
                                           /* Metronic.scrollTo(error2, -200);*/
                                        },

                                        errorPlacement: function (error, element) { // render error placement for each input type
                                            var icon = $(element).parent('.input-icon').children('i');
                                            icon.removeClass('fa-check').addClass("fa-warning");  
                                            icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
                                        }, 

                                        highlight: function (element) { // hightlight error inputs
                                            $(element)
                                                .closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
                                        },

                                        unhighlight: function (element) { // revert the change done by hightlight
                                            $(element)
                                                .closest('.form-group').removeClass('has-error'); // set error class to the control group
                                        },

                                        success: function (label, element) {
                                            var icon = $(element).parent('.input-icon').children('i');
                                            $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                                            icon.removeClass("fa-warning").addClass("fa-check");
                                        },

                                        submitHandler: function (form) {
                                            
                                        }
                                    }).form();
                                    var $valid = $(form).valid();
                                    if(!$valid) 
                                    {                                                               
                                        return false;
                                    }
                                    else
                                    { 
                                        Metronic.startPageLoading({animate: true});
                                        $(form).ajaxSubmit({
                                            type:'POST',
                                            url:completeURL(url), 
                                            dataType:'json',
                                            data: serialize_data,
                                            success:function(data)
                                            {   
                                               Metronic.stopPageLoading();
                                                if(data.valid)
                                                {  
                                                    if(data.redirect)
                                                    {
                                                        bootbox.alert(data.msg, function() {
                                                            window.location.href = data.redirect;
                                                        }); 
                                                    }
                                                    else
                                                    {
                                                        bootbox.alert(data.msg, function() {
                                                            window.location.href = window.location.href;
                                                        }); 
                                                    }
                                                }   
                                                else
                                                {
                                                    bootbox.alert(data.msg, function() {
                                                        window.location.href = window.location.href;
                                                    }); 
                                                }                                        
                                            }
                                        });
                                    }                                         
                                }
                            }
                            /*danger: {
                                label: "Cancel",
                                className: "btn-danger",
                                callback: function() { }
                            }*/ 
                        /*}*/
                    });
                }
            },
            complete:function()
            {   
                if (jQuery().select2)
                {
                    $('select').select2();   
                } 
                $('.modal-dialog').css({
                     width:'60%'
                });   
            }
        }); 
    });

    $(document).on('click','.pro_pop', function(){
        var id = $(this).attr('rev');
        var this1=$(this);
        $.ajax({
            url : completeURL('pro_pop'),
            type : 'POST',
            dataType : 'html',
            data:{id:id},
            success:function(data)
            {          
                $('#product-pop-up').html(data);
            },
            complete:function(){
                Layout.init();   
                Layout.initImageZoom();
                Layout.initTouchspin();
                //$('.share-button').simpleSocialShare();
            }
        }); 
    });

    $(document).on('click','.sendotp' , function(){
        var deleteDiv = $(this);
        var id = deleteDiv.attr('rel');
        var url = deleteDiv.attr('rev');
        
        $.ajax({
            url : completeURL(url),
            type:'POST',
            dataType:'json',
            data:{id:id},
            success:function(data)
            {
                bootbox.alert(data.msg, function() {
                    setTimeout(function(){
                        document.location.href=document.location.href;                                
                    },1500);
                });
            }
        });
    });

    $(document).on('blur','.sendotp1' , function(){
        var deleteDiv = $(this);
        var mob = deleteDiv.val();
        var url = deleteDiv.attr('rev');
        deleteDiv.prop('readonly', true);
        deleteDiv.parents('.row').find('.otp').css('display','block');
        $.ajax({
            url : completeURL(url),
            type:'POST',
            dataType:'json',
            data:{mob:mob},
            success:function(data)
            {
                
            }
        });
    });

    $(document).on('change','.cal_gst',function(){
        var amount = $('.amount').val()*1;
        var gst = $('.gst').val()*1;
        var per = amount/100;
        var gst1= per*gst;
        var total=amount + gst1 ; 
        $('.final_price').val(total);
    });

    /*$(document).on('click','.pay_online',function(e){       
        var membership_amt = $(this).attr('rel');
        var membership_id = $(this).attr('rev');
        var data={membership_amt:membership_amt,membership_id:membership_id};
        $.ajax({
            url:completeURL('book_online'),
            data:data,
            type:'POST',
            dataType:'json',
            success:function(data)
            {
                if(data.valid)
                {
                    if(data.redirect)
                    {
                        document.location.href=data.redirect;  
                    }
                    else
                    {
                        document.location.href=document.location.href;                         
                    }
                }
            }
        });
    });*/


    $(document).on('click','.pay_online',function(e){       
        var form = '#'+$(this).parents('form').attr('id');
        var membership_amt = $(this).attr('rel');
        var membership_id = $(this).attr('rev');
        $('.pay_online').prop('disabled',true);
        //Metronic.startPageLoading({animate: true});
        $(form).attr('action',completeURL('book_online'));
        $(form).submit();
    });
    
    $(document).on('click','.block',function(event){
        event.preventDefault();
        bootbox.alert('<div class="alert modify alert-info">Become a Paid Membership For More Details.</div>');
    });

    $(document).on('change','.customer',function(e){       
        var id = $(this).val();
        var data={id:id};
        $.ajax({
            url:completeURL('fetch_customer'),
            data:data,
            type:'POST',
            dataType:'json',
            success:function(data)
            {
                $('.name').val(data.name);
                $('.mobile').val(data.mobile);
                $('.email').val(data.email);
                $('.profile_code').val(data.profile_code);
                $('.gender').val(data.gender);
                $('.customer_id').val(data.customer_id);

             }
        });
    });

    $(document).on('change','.membership_plan',function(e){       
        var id = $(this).val();
        var data={id:id};
        $.ajax({
            url:completeURL('fetch_membership'),
            data:data,
            type:'POST',
            dataType:'json',
            success:function(data)
            {
                $('.membership_plan').val(data.name);
                $('.amount').val(data.amount);
                $('.validity').val(data.validity);
                $('.membership_id').val(data.membership_id);

             }
        });
    });

    $(document).on('change','.check' , function(){
        var deleteDiv = $(this);
        var mob = deleteDiv.val();
        if(mob=='check')
        {
            deleteDiv.parents('.row').find('.check1').css('display','block');
        }
        else
        {
            deleteDiv.parents('.row').find('.check1').css('display','none');
        }
    });
    $(document).on('change','.fetch_date_report',function(){  
        var val1 = $('.val1').val();
        var val2 = $('.val2').val();

        var url= $(this).data('url');
        $.ajax({
            type:'POST',
            url:completeURL(url),
            data:{val1:val1,val2:val2},
            dataType:'html',
            success:function(data)
            {      
                $('.report_div').html(data);
            },
            complete:function()
            {
                $('select').select2();
                TableAdvanced.init();
            }
        });
    });

});

 


function getCookie(key) 
{  
   var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');  
   return keyValue ? keyValue[2] : null;  
} 

function replaceurl(url)
{
    var url1=url.replace("%3A",":"); 
    var url2=url1.replace(/%2F/g,"/");  
    return url2;
}   

function completeURL(url)
{
    try
    {
        var target= getCookie('shivbandh')+url;
        target=replaceurl(target);
        return replaceurl(target);      
    }
    catch(e)
    {
        alert(e);
    }
}