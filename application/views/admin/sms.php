<form action="send_sms" enctype="multipart/form-data" id="popup_save"  method="post" class="horizontal-form">
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
						<textarea class="form-control" id="maxlength_textarea" rows="3" cols="10" name="subject" maxlength="158" placeholder="Subject"></textarea>
					</div>												
				</div>
			</div>
		</div>
	</div>
</form>