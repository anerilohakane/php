<form action="save_password_chang"  id="save_password_chang" class="form-horizontal update" method="post">
  <div class="form-body">  
    <div class="row">
      <div class="col-md-10">
        <div class="form-group">
          <label class="control-label col-md-5">Your current Password
          </label>
          <div class="col-md-6">
            <div class="input-icon right">
              <i class="fa"></i>
              <input type="password" class="form-control password" name="current_pass" placeholder="your current password" value="<?php echo (isset($singleCountry->country_desc) && !empty($singleCountry->country_desc))?$singleCountry->country_desc:''?>"/>
            </div>
          </div>
          <div class="col-md-1"><a href="javascript:void(0);" class="btn btn-icon-only default"><i class="fa fa-eye show_pass"></i></a></div>
        </div>                      
      </div>
    </div>  
    <div class="row">
      <div class="col-md-10">
        <div class="form-group">
          <label class="control-label col-md-5">New Password
          </label>
          <div class="col-md-6">
            <div class="input-icon right">
              <i class="fa"></i>
              <input type="password" id="user_pass" class="form-control password" name="new_pass" placeholder="New Password" value="<?php echo (isset($singleCountry->country_desc) && !empty($singleCountry->country_desc))?$singleCountry->country_desc:''?>"/>
            </div>
          </div>
           <div class="col-md-1"><a href="javascript:void(0);" class="btn btn-icon-only default"><i class="fa fa-eye show_pass"></i></a></div>
        </div>                      
      </div>
    </div>                 
    <div class="row">
      <div class="col-md-10">
        <div class="form-group">
          <label class="control-label col-md-5">Confirm New Password
          </label>
          <div class="col-md-6">
            <div class="input-icon right">
              <i class="fa"></i>
              <input type="password" class="form-control password" name="confirm_pass" placeholder="Confirm New Password" value="<?php echo (isset($singleCountry->country_desc) && !empty($singleCountry->country_desc))?$singleCountry->country_desc:''?>"/>
            </div>
          </div>
           <div class="col-md-1"><a href="javascript:void(0);" class="btn btn-icon-only default"><i class="fa fa-eye show_pass"></i></a></div>
        </div>                      
      </div>
    </div>
  </div>
</form>              
