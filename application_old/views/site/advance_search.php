<form action="advance_result" enctype="multipart/form-data" id="popup_save"  method="post" class="horizontal-form">
  <div class="form-body">            
    <div class="row">
      <div class="col-md-4 col-sm-12">
        <div class="form-group">
          <label class="control-label"> Age From <span class="require" aria-required="true" style="color:red">*</span></label>
          <select class="form-control select2me " name="birth_year_from">
            <option value="">select</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                        <option value="32">32</option>
                        <option value="33">33</option>
                        <option value="34">34</option>
                        <option value="35">35</option>
                        <option value="36">36</option>
                        <option value="37">37</option>
                        <option value="38">38</option>
                        <option value="39">39</option>
                        <option value="40">40</option>
                        <option value="41">41</option>
                        <option value="42">42</option>
                        <option value="43">43</option>
                        <option value="44">44</option>
                        <option value="45">45</option>
                        <option value="46">46</option>
                        <option value="47">47</option>
                        <option value="48">48</option>
                        <option value="49">49</option>
                        <option value="50">50</option>
                        <option value="51">51</option>
                        <option value="52">52</option>
                        <option value="53">53</option>
                        <option value="54">54</option>
                        <option value="55">55</option>
                        <option value="56">56</option>
                        <option value="57">57</option>
                        <option value="58">58</option>
                        <option value="59">59</option>
                        <option value="60">60</option>
                        <option value="61">61</option>
                        <option value="63">63</option>
                        <option value="64">64</option>
                        <option value="65">65</option>
                        <option value="66">66</option>
                        <option value="67">67</option>
                        <option value="68">68</option>
                        <option value="69">69</option>
                        <option value="70">70</option>
                    </select>
        </div>
      </div>
      <div class="col-md-4 col-sm-12">
        <div class="form-group">
          <label class="control-label"> Age to <span class="require" aria-required="true" style="color:red">*</span></label>
          <select class="form-control select2me " name="birth_year_to">
                        <option value="">select</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                        <option value="32">32</option>
                        <option value="33">33</option>
                        <option value="34">34</option>
                        <option value="35">35</option>
                        <option value="36">36</option>
                        <option value="37">37</option>
                        <option value="38">38</option>
                        <option value="39">39</option>
                        <option value="40">40</option>
                        <option value="41">41</option>
                        <option value="42">42</option>
                        <option value="43">43</option>
                        <option value="44">44</option>
                        <option value="45">45</option>
                        <option value="46">46</option>
                        <option value="47">47</option>
                        <option value="48">48</option>
                        <option value="49">49</option>
                        <option value="50">50</option>
                        <option value="51">51</option>
                        <option value="52">52</option>
                        <option value="53">53</option>
                        <option value="54">54</option>
                        <option value="55">55</option>
                        <option value="56">56</option>
                        <option value="57">57</option>
                        <option value="58">58</option>
                        <option value="59">59</option>
                        <option value="60">60</option>
                        <option value="61">61</option>
                        <option value="63">63</option>
                        <option value="64">64</option>
                        <option value="65">65</option>
                        <option value="66">66</option>
                        <option value="67">67</option>
                        <option value="68">68</option>
                        <option value="69">69</option>
                        <option value="70">70</option>
                    </select>
        </div>
      </div>
      <div class="col-md-4 col-sm-12">
        <div class="form-group">
          <label class="control-label">Education <span class="require" aria-required="true" style="color:red">*</span></label>
          <select class="form-control select2me " name="education">
              <option value="">select</option>
              <?php if(isset($education_data) && !empty($education_data))
              {
                foreach ($education_data as $key) 
                { ?>
                  <option value="<?php echo $key->education_id?>" ><?php echo(isset($key->education_name) && !empty($key->education_name))?$key->education_name:''?></option>
                <?php }                             
              } ?>                            
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 col-sm-12">
        <div class="form-group">
          <label class="control-label">District-1 <span class="require" aria-required="true" style="color:red">*</span></label>
          <select class="form-control select2me " name="district1">
              <option value="">select</option>
              <?php if(isset($district_data) && !empty($district_data))
              {
                foreach ($district_data as $key) 
                { ?>
                  <option value="<?php echo $key->city_id?>" ><?php echo(isset($key->city_name) && !empty($key->city_name))?$key->city_name:''?></option>
                <?php }                             
              } ?>                            
          </select>
        </div>
      </div>
      <div class="col-md-4 col-sm-12">
        <div class="form-group">
          <label class="control-label">District-2 <span class="require" aria-required="true" style="color:red">*</span></label>
          <select class="form-control select2me " name="district2">
              <option value="">select</option>
              <?php if(isset($district_data) && !empty($district_data))
              {
                foreach ($district_data as $key) 
                { ?>
                  <option value="<?php echo $key->city_id?>" ><?php echo(isset($key->city_name) && !empty($key->city_name))?$key->city_name:''?></option>
                <?php }                             
              } ?>                            
          </select>
        </div>
      </div>
      <div class="col-md-4 col-sm-12">
        <div class="form-group">
          <label class="control-label">District-3 <span class="require" aria-required="true" style="color:red">*</span></label>
          <select class="form-control select2me " name="district3">
              <option value="">select</option>
              <?php if(isset($district_data) && !empty($district_data))
              {
                foreach ($district_data as $key) 
                { ?>
                  <option value="<?php echo $key->city_id?>" ><?php echo(isset($key->city_name) && !empty($key->city_name))?$key->city_name:''?></option>
                <?php }                             
              } ?>                            
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 col-sm-12">
        <div class="form-group">
          <label class="control-label">Height From <span class="require" aria-required="true" style="color:red">*</span></label>
          <div class="input-icon right">
            <i class="fa"></i>
            <input  type="text" class="form-control " name="height_from" value="" placeholder=" Enter Height (in cm 180)" >
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-12">
        <div class="form-group">
          <label class="control-label">Height To <span class="require" aria-required="true" style="color:red">*</span></label>
          <div class="input-icon right">
            <i class="fa"></i>
            <input  type="text" class="form-control " name="height_to" value="" placeholder=" Enter Height (in cm 187)" >
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-12">
        <div class="form-group">
          <label class="control-label">Manglic <span class="require" aria-required="true" style="color:red">*</span></label>
          <select class="form-control select2me " name="manglic">
              <option value="">select</option>
              <option value="Yes">Yes</option>
              <option value="No">No</option>
                                        
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 col-sm-12" style="margin-top: 30px;">
         <div class="form-group">
            <span style="float: right;">With Photo </span>  <span style="float: left;"><input style="margin-top: -8px;"  type="checkbox" value="Yes" id="photo" name='photo' class=""  > </span>
        </div>         
      </div>
      <div class="col-md-3 col-sm-12" style="margin-top: 30px; " >
          <div class="form-group">
              <button type="submit" class="btn btn-default ">Search</button>
          </div>
      </div>
    </div>
  </div>
</form>