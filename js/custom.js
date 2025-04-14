$(document).ready(function(){
	$(document).on('change','.discount',function(){ 
 		var price=$('#product_price').val();
	    var discount=$('#discount').val();    
	    var new_price= price-((price*discount)/100);
	    $('#selling_price').val(new_price); 
	});

	var croppicContainerModalOptions = 
    {
        uploadUrl:'./js/croppic/img_save_to_file.php',
        cropUrl:'./js/croppic/img_crop_to_file.php',
        modal:true,
        imgEyecandyOpacity:0.4,
        loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
        onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
        onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
        onImgDrag: function(){ console.log('onImgDrag') },
        onImgZoom: function(){ console.log('onImgZoom') },
        onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
        onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
        onReset:function(){ console.log('onReset') },
        onError:function(errormessage){ console.log('onError:'+errormessage) }
    }
    $(".img_crop").each(function() {
        var id=$(this).attr('id');
        var cropContainerModal = new Croppic(id, croppicContainerModalOptions);
    });

	$(document).on("click",".add_croppic",function(){ //on add input button click   
        var clonedRow = $(this).parents('.croppic').find('.dyna_croppic:first').clone();
        clonedRow.find('.actions_button').append('<button title="Delete Record" class="btn btn-danger delete_croppic" type="button" style="margin-top: -31px; padding: 5px;"><i class="fa fa-trash-o"></i></button>');
        clonedRow.find('.img_crop').html('');
        clonedRow.find('.img_crop').css('background','url(http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image) repeat scroll 0% 0% / 100% 100%');
        clonedRow.find('input').val('');
        clonedRow.find('select').val('');
        clonedRow.find('.result').removeAttr('src');
        clonedRow.find('.date-picker').datepicker({orientation: "right", autoclose: true,}); 
        $(this).closest('.croppic').append(clonedRow); //add input box
        var k=1;
        $(".img_crop").each(function() {
            $(this).attr('id','cropContainerModal'+k);
            k++;
        });
        var id =clonedRow.find('.img_crop').attr('id');
        var cropContainerModal = new Croppic(id, croppicContainerModalOptions);
    });


    $(document).on('click','.delete_croppic', function(){ 
        $(this).parents('.dyna_croppic').remove(); 
    }); 
    
    $(document).on('click','.delete_croppic_tbl', function()
    {
        var deleteRow = $(this);
        var url= $(this).attr('rev');
        var id= $(this).attr('rel');
        bootbox.confirm("Are you sure?", function(result) 
        {
            if(result)
            {
                $.ajax({
                    url : completeURL(url),
                    type:'POST',
                    dataType:'json',
                    data: "id="+id,
                    success:function(data)
                    {
                        if(data.valid)
                        {
                            deleteRow.parents('.dyna_croppic').remove(); 
                        }  
                    }
                });
            }
        }); 
    });

    
    $(document).on('change','.user_city_name', function()
    {
        var id= $(this).val();
        $.ajax({
            url : completeURL('user_city_name'),
            type:'POST',
            dataType:'json',
            data: "id="+id,
            success:function(data)
            {
                window.location.href=window.location.href;
            }
        });
    });
    $(document).on('click','.change_user_city', function()
    {
        $('#modal_screen').css('display','block');
        $('#modal_content').fadeIn('slow');
    });
    $(document).on('click','.skip', function()
    {
        $('#modal_screen').css('display','none');
        $('#modal_content').fadeOut('slow');
    });

    $(document).on('click','.quantity-down,.quantity-up', function(){
        var qty = $(this).parents('.product-quantity').find('#product-quantity').val();
        var url = $(this).parents('.product-quantity').find('#product-quantity').attr('rev');
        var data={qty:qty};
        $.ajax({
            url : completeURL(url),
            type : 'POST', 
            dataType : 'json',
            data:data,
            success:function(data)
            { 
                 window.location.href=window.location.href;
            },
            complete: function()
            { 

            } 
        });
    });

    $(document).on('click','#wishlist',function(e){ 
        var product_id = $(this).attr("rel");
        var user_id = $(this).attr("rev");
        $.ajax({
            url:completeURL('save_wish_list'),
            data:{product_id:product_id,user_id:user_id},
            type:'POST',
            dataType:'json',
            success:function(data){
                if(data.valid)
                { 
                    bootbox.alert(data.msg,function(){
                        window.location.href = window.location.href="wish_list";
                    });
                }
                else
                {
                    bootbox.alert(data.msg, function() {
                        setTimeout(function(){  

                        },2000); 
                    });
                }
            }             
        });      
    });

    $(document).on('change','.fetch_report',function(){  
        var status = $('.status').select2('val');
        var user_id = $('.user_id').select2('val');
        var val1 = $('.val1').val();
        var val2 = $('.val2').val();
        var url= $(this).data('url');
        $.ajax({
            type:'POST',
            url:completeURL(url),
            data:{status:status,user_id:user_id,val1:val1,val2:val2},
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

    $(document).on('click','.selected_val', function(){ 
        $('.selected_val').css({"border-color": "#eaeaea", "border-weight":"2px", "border-style":"solid"});
        if($('.address').is(":checked"))
        {
            $(this).closest('.selected_val').css({"border-color": "#E84D1C", "border-weight":"2px", "border-style":"solid"});
        }
    }); 

    $(document).on('change','.search_val', function(){
        var search_input=$('.search_val').val();
        if(search_input)
        {
            document.location.href=completeURL('search_result/'+search_input);
        }
    });

    $(document).on('change','.product_filter',function(){
        var cat_id = $('#slider-range').attr('rel');  
        var sortby=$('.sortby').val();
        $( "#slider-range" ).slider({range: true});     
        var slider1=$( "#slider-range" ).slider( "values", 0 );
        var slider2=$( "#slider-range" ).slider( "values", 1 );
        $.ajax({
            type:'POST',
            url:completeURL('product_filter'),
            data:{slider1:slider1,slider2:slider2,sortby:sortby,cat_id:cat_id},
            dataType:'json',
            success:function(data)
            {      
                if(data.valid)
                {  
                     $("#product_div").html(data.view);
                }
            },
            complete:function()
            {

            }
        });
    });

    $(document).on('click','.checkout_save',function(e){       
        var form = '#'+$(this).parents('form').attr('id');
        var id = $(this).attr('rel');
        $('.checkout_save').prop('disabled',true);
        Metronic.startPageLoading({animate: true});
        var pay_type=$("input[type='radio'][name='pay_type']:checked").val();
        if(pay_type=='Online')
        {
            $(form).attr('action',completeURL('book_order_online'));
            $(form).submit();
        }
        else
        {
            var url = $(form).attr('action');
            var serialize_data = $(form).serialize();
            serialize_data = {serialize_data:serialize_data,id:id};
            $(form).ajaxSubmit({
                type:'POST',
                url:completeURL(url), 
                dataType:'json',
                data:serialize_data,
                success:function(data)
                {   
                    Metronic.stopPageLoading(); 
                    $('.checkout_save').prop('disabled',false);
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
                        bootbox.alert(data.msg);
                    }
                }
            });
        }        
    });
   
});