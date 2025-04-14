<form action="quick_result" enctype="multipart/form-data" id="popup_save"  method="post" class="horizontal-form">
	<div class="form-body">						 
		<div class="row">
			<div class="col-md-6 col-sm-12">
				<div class="form-group">
					<label class="control-label">Caste <span class="require" aria-required="true" style="color:red">*</span></label>
					<select class="form-control select2me " name="mangal">
                        <option value="">select</option>
                        <?php if(isset($cast_data) && !empty($cast_data))
                        {
                          foreach ($cast_data as $key) 
                          { ?>
                            <option value="<?php echo $key->cast_id?>" ><?php echo $key->cast_name;?></option>
                          <?php }                             
                        } ?>                            
                    </select>
				</div>
			</div>
			<div class="col-md-3 col-sm-12">
                <div class="form-group">
					<label class="control-label"> Age From <span class="require" aria-required="true" style="color:red">*</span></label>
					<select class="form-control select2me " name="age_from">
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
			<div class="col-md-3 col-sm-12">
				<div class="form-group">
					<label class="control-label"> Age to <span class="require" aria-required="true" style="color:red">*</span></label>
					<select class="form-control select2me " name="ag_to">
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
		</div>
		<div class="row">
			<div class="col-md-5 col-sm-12">
				<div class="form-group">
					<label class="control-label">Marital Status <span class="require" aria-required="true" style="color:red">*</span></label>
					<select class="form-control select2me " name="marital_status">
                        <option value="">select</option>
                        <?php if(isset($marital_data) && !empty($marital_data))
                        {
                          foreach ($marital_data as $key) 
                          { ?>
                            <option value="<?php echo $key->marital_id?>" ><?php echo $key->marital_name;?></option>
                          <?php }                             
                        } ?>                            
                    </select>
				</div>
			</div>
			<div class="col-md-4 col-sm-12" style="margin-top: 30px;">
                 <div class="form-group">
                    <span style="float: right;">With Photo Only </span>  <span style="float: left;"><input style="margin-top: -8px;"  type="checkbox" value="Yes" id="photo" name='photo' class="" > </span>
                </div>         
            </div>
            <div class="col-md-3 col-sm-12" style="margin-top: 30px;">
                <div class="form-group">
                    <button type="submit" class="btn btn-default ">Search</button>
                </div>
            </div>
		</div>
        <div class="row">
            <div class="col-md-7" style="text-align: right;">
                <a href="javascript:void(0);" class="popup_save1" rev="search_matches_by_id"><b>Search By Profile id</b><span style="margin-left: 30px;"> |</span></a>
            </div>
            <div class="col-md-5" style="text-align: left;">
                <a href="javascript:void(0);" class="popup_save1" rev="advance_search"><b>Advanced Search</b></a>
            </div>
        </div>
	</div>
</form>