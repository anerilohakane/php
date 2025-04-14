<form action="send_promotion_emails" enctype="multipart/form-data" id="popup_save"  method="post" class="horizontal-form">
	<div class="form-body">						 
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Total Count</label><br>
					<span class=""><?php echo (isset($pramo_data) && !empty($pramo_data))?count($pramo_data):'0';?></span> Count.
				</div>
			</div>
		</div>	
		<div class="row">
			<div class="col-md-12">

				<div class="form-group">
					<label class="control-label"> Subject <span class="require" aria-required="true" style="color:red">*</span></label>		
					<div class="input-icon right">
						<i class="fa"></i>
						<input type="text" class="form-control " name="subject" value="" placeholder="Subject" required>
					</div>												
				</div>

				<div class="form-group">
					<label class="control-label"> Content <span class="require" aria-required="true" style="color:red">*</span></label>		
					<div class="input-icon right">
						<i class="fa"></i>
						<textarea class="form-control" id="maxlength_textarea" rows="3" cols="10" name="content" maxlength="158" placeholder="Content" required></textarea>
					</div>												
				</div>

				<div class="form-group">
					<label class="control-label"> Redirect URL <span class="require" aria-required="true" style="color:red">*</span></label>		
					<div class="input-icon right">
						<i class="fa"></i>
						<input type="url" class="form-control " name="redirect_url" value="" placeholder="URL" required>
					</div>												
				</div>

				<div class="form-group">
					<div class="fileinput fileinput-new" data-provides="fileinput">
		                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
		                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
		                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
		                <div>
		                    <span class="btn default btn-file">
		                        <span class="fileinput-new"> Select image </span>
		                        <span class="fileinput-exists"> Change </span>
		                        <input type="file" name="promotion_photo" accept="image/*" required> </span>
		                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
		                </div>
		            </div>												
				</div>

			</div>
		</div>
	</div>
</form>