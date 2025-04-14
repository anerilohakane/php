<!DOCTYPE html>
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8">
<title>Shivbandh| Franchiser User</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport">
<meta content="" name="description">
<meta content="" name="author">
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo base_url();?>assets/global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/css/plugins-md.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
<link href="<?php echo base_url();?>assets/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="<?php echo base_url(); ?>uploads/favicon.png"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
<!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->
<body class="page-md">
<?php $this->load->view('common/header'); ?>
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="<?php echo base_url(); ?>admin_user">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					Franchiser User Master
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="portlet box green">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-gift"></i>Franchiser User Master
					</div>
				</div>
				<div class="portlet-body form">
					<form action="save_franchiser_registration" enctype="multipart/form-data" id="save_franchiser_registration"  method="post" class="horizontal-form">
						<div class="form-body">
							<h3 class="form-section">User Info</h3>

							<div class="row">								
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">First Name<span class="require" aria-required="true" style="color:red">*</span></label>
										<div class="input-icon right">
                      						<i class="fa"></i>
											<input type="text" class="form-control " name="user_fname" value="<?php echo(isset($single_user->user_fname) && !empty($single_user->user_fname))?$single_user->user_fname:''?>" placeholder="First name">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Last Name<span class="require" aria-required="true" style="color:red">*</span></label>
										<div class="input-icon right">
                      						<i class="fa"></i>
											<input type="text" class="form-control " name="user_lname" value="<?php echo(isset($single_user->user_lname) && !empty($single_user->user_lname))?$single_user->user_lname:''?>" placeholder="Last name">
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Email<span class="require" aria-required="true" style="color:red">*</span></label>
										<div class="input-icon right">
                      						<i class="fa"></i>
											<input type="text" class="form-control " name="user_email" value="<?php echo(isset($single_user->user_email) && !empty($single_user->user_email))?$single_user->user_email:''?>" placeholder="User Email">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Mobile<span class="require" aria-required="true" style="color:red">*</span></label>
										<div class="input-icon right">
                      						<i class="fa"></i>
											<input type="text" class="form-control " name="user_mobile" value="<?php echo(isset($single_user->user_mobile) && !empty($single_user->user_mobile))?$single_user->user_mobile:''?>" placeholder="User Mobile">
										</div>
									</div>
								</div>
							</div>
												
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Role<span class="require" aria-required="true" style="color:red">*</span></label>
										<div class="input-icon ">          						
											<select class="form-control select2me" name="role_id">
												<option value="">select</option>
												<?php if(isset($role_data) && !empty($role_data))
												{
													foreach ($role_data as $key) 
													{ ?>
														<option value="<?php echo $key->role_id?>" selected <?php echo (isset($single_user->role_id) && !empty($single_user->role_id) && ($single_user->role_id==$key->role_id))?'selected="selected"':'';?>><?php echo $key->role_name;?></option>
													<?php }															
												} ?>														
											</select>
										</div>
									</div> 
								</div>
								<!-- <div class="col-md-6">
									<div class="form-group">
										<label class="control-label">User Name<span class="require" aria-required="true" style="color:red">*</span></label>
										<div class="input-icon right">
                      						<i class="fa"></i>
											<input type="text" class="form-control" name="user_name" value="<?php echo(isset($single_user->user_name) && !empty($single_user->user_name))?$single_user->user_name:''?>" placeholder="User Name">
										</div>
									</div>
								</div> -->
								<div class="col-md-6">
									<div class="form-group">
							            <label for="email" >Address <span class="require" aria-required="true" style="color:red">*</span></label>
							            <input type="text" name="address" class="form-control" id="address" value="<?php echo(isset($single_user->address) && !empty($single_user->address))?$single_user->address:''?>">
					          		</div>
					          	</div>									
							</div>

							<div class="row">
					          	<div class="col-md-6">
					          		<div class="form-group">
						                <label for="email" >Landmark <span class="require" aria-required="true" style="color:red">*</span></label>
						                <input type="text" name="address_landmark" class="form-control" id="address_landmark" value="<?php echo(isset($single_user->address_landmark) && !empty($single_user->address_landmark))?$single_user->address_landmark:''?>">
					            	</div>
					            </div>
					            <div class="col-md-6">
					            	<div class="form-group">
						                <label for="email" >State <span class="require" aria-required="true" style="color:red">*</span></label>
						                <input type="text" name="address_state" class="form-control" id="address_state" value="<?php echo(isset($single_user->address_state) && !empty($single_user->address_state))?$single_user->address_state:''?>">
					            	</div>
					            </div>  
					        </div>

							<div class="row">
					            <div class="col-md-6">
					            	<div class="form-group">                  
						                <label for="email" >City <span class="require" aria-required="true" style="color:red">*</span></label>                            
						                <input type="text" name="address_city" class="form-control" id="address_city" value="<?php echo(isset($single_user->address_city) && !empty($single_user->address_city))?$single_user->address_city:''?>">
					            	</div>
					            </div>
					            <div class="col-md-6">
					            	<div class="form-group">
						                <label for="email" >Zip/Postal Code <span class="require" aria-required="true" style="color:red">*</span></label>                            
						                <input type="text" name="address_pincode" class="form-control" id="address_pincode" value="<?php echo(isset($single_user->address_pincode) && !empty($single_user->address_pincode))?$single_user->address_pincode:''?>">
					            	</div>
					            </div>
					        </div>

					        <div class="row">
					            <div class="col-md-4">
					            	<div class="form-group">                  
						                <label for="email" >Pan Card No <span class="require" aria-required="true" style="color:red">*</span></label>                            
						                <input type="text" name="pan_card_no" class="form-control" id="pan_card_no" value="<?php echo(isset($single_user->pan_card_no) && !empty($single_user->pan_card_no))?$single_user->pan_card_no:''?>">
					            	</div>
					            </div>
					            <div class="col-md-4">
					            	<div class="form-group">
						                <label for="email" >GSTIN No <span class="require" aria-required="true" style="color:red">*</span></label>                            
						                <input type="text" name="gst_no" class="form-control" id="gst_no" value="<?php echo(isset($single_user->gst_no) && !empty($single_user->gst_no))?$single_user->gst_no:''?>">
					            	</div>
					            </div>
			
					            <div class="col-md-4">
					            	<div class="form-group">                  
						                <label for="email" >TAN No <span class="require" aria-required="true" style="color:red">*</span></label>                            
						                <input type="text" name="tan_no" class="form-control" id="tan_no" value="<?php echo(isset($single_user->tan_no) && !empty($single_user->tan_no))?$single_user->tan_no:''?>">
					            	</div>
					            </div>
					        </div>

							<?php if(!isset($single_user) && empty($single_user))
							{ ?>
								<div class="row" >
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Password<span class="require" aria-required="true" style="color:red">*</span></label>
											<div class="input-icon right">
	                      						<i class="fa"></i>
												<input type="Password" class="form-control" name="user_pass" value="" placeholder="Password">
											</div>
										</div> 
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Confirm Password<span class="require" aria-required="true" style="color:red">*</span></label>
											<div class="input-icon right">
	                      						<i class="fa"></i>
												<input type="Password" class="form-control" name="cuser_pass" value="" placeholder="Confirm Password">
											</div>
										</div>
									</div>									
								</div>
							<?php }	?>

							<div class="row">
								<div class="col-md-4">
									<div class="col-md-12">
	                                    <div class="form-group">
	                                      <label class="control-label"> Upload Document<span class="required">*</span></label><br>
	                                      <?php if(isset($single_user->document) && !empty($single_user->document))
	                                      { 
	                                        $path = 'uploads/document/'. $single_user->document;  
	                                        if (file_exists($path)) {?>
	                                        <div class="fileinput fileinput-exists" data-provides="fileinput">
	                                          <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 100%; max-height: 150px;">
	                                            <?php echo $single_user->document; ?>

	                                            <!-- <img src="<?php echo base_url(); ?>uploads/document/<?php echo $single_user->document; ?>" alt=""/>   -->
	                                          </div>

	                                              <input type="hidden" class="" value="<?php echo (isset($single_user->document) && !empty($single_user->document))?$single_user->document:''?>" name="hidden_document" accept=".pdf">
	                                          <div>
	                                            <span class="btn default btn-file">
	                                            <span class="fileinput-new">
	                                            Select Document </span>
	                                            <span class="fileinput-exists">
	                                            Change </span>
	                                            <input id="uploadPDF" type="file"  name="document" accept=".pdf">
	                                            </span>
	                                            <a href="javascript:;" class="btn red fileinput-exists remove_image" data-dismiss="fileinput">
	                                            Remove </a>
	                                          </div>
	                                        </div>                                 
	                                      <?php } else
	                                      { ?>
	                                        <div class="fileinput fileinput-new" data-provides="fileinput">
	                                          <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
	                                              <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+pdf" alt="" /> </div>
	                                          <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
	                                          <div>
	                                              <span class="btn default btn-file">
	                                                  <span class="fileinput-new"> Select imDocumentage </span>
	                                                  <span class="fileinput-exists"> Change </span>
	                                                  <input id="uploadPDF" type="file" name="document" accept=".pdf"> </span>
	                                              <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
	                                          </div>
	                                        </div>         
	                                      <?php } }
	                                      else
	                                      { ?>
	                                        <div class="fileinput fileinput-new" data-provides="fileinput">
	                                          <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
	                                              <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+pdf" alt="" /> </div>
	                                          <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
	                                          <div>
		                                          <span class="btn default btn-file">
		                                              <span class="fileinput-new"> Select Document </span>
		                                              <span class="fileinput-exists"> Change </span>
		                                              <input id="uploadPDF" type="file" name="document" accept=".pdf"> </span>
		                                          <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>

		                                          <input class="btn green common_save" type="button" value="Preview" onclick="PreviewImage();" />

	                                            <br><br>
										        <div style="clear:both" >
										           <iframe id="viewer" frameborder="0" scrolling="no" width="400" height="600" style="display: none;"></iframe>
										        </div>

	                                          </div>
	                                        </div>         
	                                      <?php } ?>
	                                      <span class="help-block" style="color:#d44;">(Note-Max size of file should not exceed than 1mb and file type is PDF )</span>

	                                    </div>
	                                </div>
								</div>
							</div>

						</div>
						<div class="form-actions right">
							<button type="button" class="btn default cancel" title="Click To Cancel"> Cancel</button>							
							<button type="submit" class="btn green common_save" title="Click To Save" rel="<?php echo(isset($single_user->user_id) && !empty($single_user->user_id))?$single_user->user_id:''?>"><i class="fa fa-check"></i><?php if(isset($single_user->user_id) && !empty($single_user->user_id)) {echo 'Update';} else { echo 'Save'; }?></button>
						</div>
					</form>
				</div>
			</div>	
			<?php if(isset($user_data) && !empty($user_data))
			{ ?> 
				<div class="portlet box green">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-gift"></i>User Master table
						</div> 
					</div> 
					<div class="portlet-body">
						<table class="table table-striped table-bordered table-hover masterTable" >
							<thead>
								<tr class="heading">
									<th scope="col">Sr.no</th>
									<th scope="col">Name</th>
									<th scope="col">Role</th>
									<th scope="col">Email</th>
									<th scope="col">Mobile</th>	
									<th scope="col">Address</th>
									<!-- <th scope="col">Pan Card No</th>
									<th scope="col">GSTIN No</th>
									<th scope="col">TAN No</th> -->
									<th scope="col">Documents</th>
									<th style="text-align:center;">Action</th>
								</tr>
							</thead>
							<tbody> 
								<?php $i = 1;
								foreach ($user_data as $key) { ?>
									<tr class="odd gradeX">
										<td><?php echo $i++;?></td>
										<td><?php echo $key->user_fname .' ' . $key->user_lname; ?></td>
										<td><?php echo $key->role_name; ?></td>
										<td><?php echo $key->user_email; ?></td>
										<td><?php echo $key->user_mobile; ?></td>																					
										<td><?php echo $key->address; ?> <?php echo $key->address_landmark; ?><br><?php echo $key->address_state; ?>,<br><?php echo $key->address_city; ?>-<?php echo $key->address_pincode; ?></td>	

										<!-- <td><?php echo $key->pan_card_no; ?></td>
										<td><?php echo $key->gst_no; ?></td>
										<td><?php echo $key->tan_no; ?></td> -->

										<td>
											<a href="<?php echo base_url();?>uploads/document/<?php echo isset($key->document) && !empty($key->document)?$key->document:'-'; ?>" class="tooltips" data-title="View File">

												<?php if(isset($key->document) && !empty($key->document)) { ?>
													<i class="fa fa-file-pdf-o" style="font-size: 30px; margin-top: 15px; color: red;" aria-hidden="true"></i>
												<?php } else { echo "-"; }?>
											</a>
										</td>																			

										<td style="text-align:center;" align="8%">
											<?php if (isset($key->role_id) && !empty($key->role_id) && $key->role_id!='1') 
											{ ?>
												<span style="cursor: pointer;" class="tooltips editRecord" rel="<?php echo(isset($key->user_id) && !empty($key->user_id))?$key->user_id:''?>" rev="edit_franchiser_registration" title="Edit Record">
													<i class="fa fa-edit"></i>
												</span>
												<span style="cursor: pointer;" class="tooltips deleteRecord" rel="<?php echo(isset($key->user_id) && !empty($key->user_id))?$key->user_id:''?>" rev="delete_franchiser_registration" title="Delete Record">
													<i class="fa fa-trash-o"></i>
												</span>	
											<?php } else {	echo $key->role_name; } ?>																			
										</td>  
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			<?php } ?>	
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php $this->load->view('common/footer');?>
<script src="<?php echo base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo base_url();?>assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/select2/select2.min.js"></script>
<script src="<?php echo base_url();?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
<!-- Addaed by me -->
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

<script src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js"></script>
<script src="<?php echo base_url();?>assets/admin/pages/scripts/table-advanced.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>js/common.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   	// initiate layout and plugins
   	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
   	TableAdvanced.init();

});
</script>

<script type="text/javascript">
    function PreviewImage() {
        pdffile=document.getElementById("uploadPDF").files[0];
        pdffile_url=URL.createObjectURL(pdffile);
        $('#viewer').attr('src',pdffile_url);

        if (pdffile) {
        	$('#viewer').show();
		    }
		    else {
		        $('#viewer').hide();
		    }
    }
</script>

<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>