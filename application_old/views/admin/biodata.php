<html><head>
	<style type="text/css"> table {border-collapse: collapse; table-layout: fixed; } table, th, td {border: 1px solid black; padding: 3px; }.abc{ border: 0px; }  </style>
</head><body>
<h3 style="text-align: center;">BIODATA</h3>
<table class="abc" width="100%">
	<tr class="abc">
		<td width="20%" class="abc">
			<img style="width: 150px; height: 100px;" src="./uploads/favicon1.png">
		</td>
		<td width="60%" class="abc">
			<span>Durga Prasad Apartments, S. No. 26/6, Flat No. 1, Above Udyam Vikas Bank,<br> Hingne KD, Sinhagad Road, Pune 411051, Maharashtra, India
				<br>
			Mobile : +91-8888438693 / +91-8888438694,</span><br>
	        <span>  Email : support@shivbandhan.com | info@shivbandhan.com <br>Website : www.shivbandhan.com  </span>
		</td>
		<td width="20%" class="abc">
			<span style="margin-bottom: 5px;">Available On</span><br><br>
			<a href="https://bit.ly/2BHSHXs" target="_blank"><img  src="./uploads/app.png"></a><br>
		</td>
	</tr>
</table><hr>
<table class="abc" width="100%">
	<tr class="abc">
		<td width="20%" class="abc">
			<img style="width: 200px; height: 180px;" src="./uploads/customer_photo/<?php echo (isset($cust_data->customer_photo) && !empty($cust_data->customer_photo))?$cust_data->customer_photo:'user.png';?>">
		</td>
		<td width="80%" class="abc">
			<span><?php  echo (isset($cust_data->f_name) && !empty($cust_data->f_name))?$cust_data->f_name.' '.$cust_data->m_name.' '.$cust_data->l_name:'';?></span><br>
	        <span>  DOB : <?php echo (isset($cust_data->dob) && !empty($cust_data->dob))?date('d-m-Y',strtotime($cust_data->dob)):''; ?> </span><br>
	        <span> Gender : <?php  echo (isset($cust_data->gender) && !empty($cust_data->gender))?$cust_data->gender:'';?></span><br>
	        <span> Education : <?php  echo (isset($cust_data->education_name) && !empty($cust_data->education_name))?$cust_data->education_name:'';?></span><br>
	        <span> Income : <?php  echo (isset($cust_data->income) && !empty($cust_data->income))?$cust_data->income:'';?></span><br>
	        <span> Caste : <?php  echo (isset($cust_data->cast_name) && !empty($cust_data->cast_name))?$cust_data->cast_name:'';?></span><br><br>
		</td>
	</tr>
</table>
<hr>
<h3>Personal Info</h3>
<hr>
<table class="abc" width="100%">
	<tr class="abc">
		<td width="20%" class="abc">
			<span> Name : </span>
		</td>
		<td width="30%" class="abc">
			<span> <?php  echo (isset($cust_data->f_name) && !empty($cust_data->f_name))?$cust_data->f_name.' '.$cust_data->m_name.' '.$cust_data->l_name:'';?></span>
			
		</td>
		<td width="20%" class="abc">
			<span> Mobile : </span>
			
		</td>
		<td width="30%" class="abc">
			<span>  <?php  echo (isset($cust_data->mobile) && !empty($cust_data->mobile))?$cust_data->mobile:'';?></span>
			
		</td>
	</tr>
	<tr class="abc">
		<td width="20%" class="abc">
			<span> Email : </span>
		</td>
		<td width="30%" class="abc">
			<span> <?php  echo (isset($cust_data->email) && !empty($cust_data->email))?$cust_data->email:'';?></span>
			
		</td>
		<td width="20%" class="abc">
			<span> DOB : </span>
			
		</td>
		<td width="30%" class="abc">
			<span>  <?php echo (isset($cust_data->dob) && !empty($cust_data->dob))?date('d-M-Y',strtotime($cust_data->dob)):''; ?>
		</td>
	</tr>
	<tr class="abc">
		<td width="20%" class="abc">
			<span> Marital Status  : </span>
		</td>
		<td width="30%" class="abc">
			<span> <?php  echo (isset($cust_data->marital_name) && !empty($cust_data->marital_name))?$cust_data->marital_name:'';?></span>
			
		</td>

		<?php if (isset($cust_data->marital_status) && !empty($cust_data->marital_status) && ($cust_data->marital_status!='3') && ($cust_data->marital_status!='4') && ($cust_data->marital_status!='7')) { ?>

			<td width="20%" class="abc">
				<span> No Of Childs : </span>
				
			</td>
			<td width="30%" class="abc">
				<span>  <?php  echo (isset($cust_data->no_of_childs) && !empty($cust_data->no_of_childs))?$cust_data->no_of_childs:'0';?></span>
			</td>

		<?php  } else { ?>

		<!-- <td width="20%" class="abc">
				<span> No Of Childs : </span>
				
			</td>
			<td width="30%" class="abc">
				<span>  <?php  echo (isset($cust_data->no_of_childs) && !empty($cust_data->no_of_childs))?$cust_data->no_of_childs:'';?></span>
			</td> -->

		<?php } ?>

	</tr>
	<tr class="abc">

		<td width="20%" class="abc">
			<span> Community : </span>
			
		</td>
		<td width="30%" class="abc">
			<span>  <?php  echo (isset($cust_data->community_name) && !empty($cust_data->community_name))?$cust_data->community_name:'';?></span>
			
		</td>

		<td width="20%" class="abc">
			<span> Caste : </span>
			
		</td>
		<td width="30%" class="abc">
			<span>  <?php  echo (isset($cust_data->cast_name) && !empty($cust_data->cast_name))?$cust_data->cast_name:'';?></span>
			
		</td>

	</tr>
	<tr class="abc">

		<td width="20%" class="abc">
			<span> Sub Caste : </span>
		</td>
		<td width="30%" class="abc">
			<span> <?php  echo (isset($cust_data->sub_caste) && !empty($cust_data->sub_caste))?$cust_data->sub_caste:'';?></span>
			
		</td>

		<td width="20%" class="abc">
			<span> Height : </span>
			
		</td>
		<td width="30%" class="abc">
			<span>  <?php  echo (isset($cust_data->height) && !empty($cust_data->height))?$cust_data->height:'';?></span>
			
		</td>
		
	</tr>
	<tr class="abc">
		<td width="20%" class="abc">
			<span> Weight : </span>
		</td>
		<td width="30%" class="abc">
			<span> <?php  echo (isset($cust_data->weight) && !empty($cust_data->weight))?$cust_data->weight:'';?></span>
			
		</td>

		<td width="20%" class="abc">
			<span> Blood Group : </span>
			
		</td>
		<td width="30%" class="abc">
			<span>  <?php  echo (isset($cust_data->blood_group) && !empty($cust_data->blood_group))?$cust_data->blood_group:'';?></span>
			
		</td>

	</tr>
	<tr class="abc">

		<td width="20%" class="abc">
			<span> Complexion : </span>
		</td>
		<td width="30%" class="abc">
			<span> <?php  echo (isset($cust_data->complexion_name) && !empty($cust_data->complexion_name))?$cust_data->complexion_name:'';?></span>
			
		</td>

		<td width="20%" class="abc">
			<span> Lens : </span>
			
		</td>
		<td width="30%" class="abc">
			<span>  <?php  echo (isset($cust_data->lens) && !empty($cust_data->lens))?$cust_data->lens:'';?></span>
			
		</td>
	</tr>	

	</tr>
	<tr class="abc">

		<td width="20%" class="abc">
			<span> Permanant Address : </span>
		</td>
		<td width="30%" class="abc">
			<span> <?php  echo (isset($cust_data->permanant_address) && !empty($cust_data->permanant_address))?$cust_data->permanant_address:'';?></span>
			
		</td>
		
		<td width="20%" class="abc">
			<span> Residance Address : </span>
			
		</td>
		<td width="30%" class="abc">
			<span>  <?php  echo (isset($cust_data->residence_address) && !empty($cust_data->residence_address))?$cust_data->residence_address:'';?></span>
			
		</td>
	</tr>
</table><hr>

<!-- mss -->
<h3>Education Info</h3>
<hr>
<table class="abc" width="100%">
	<tr class="abc">
		<td width="20%" class="abc">
			<span> Education Area : </span>
		</td>
		<td width="30%" class="abc">
			<span> <?php  echo (isset($cust_data->education_name) && !empty($cust_data->education_name))?$cust_data->education_name:'';?></span>
			
		</td>
		<td width="20%" class="abc">
			<span> Occupation City : </span>
			
		</td>
		<td width="30%" class="abc">
			<span>  <?php  echo (isset($cust_data->occupation_city_name) && !empty($cust_data->occupation_city_name))?$cust_data->occupation_city_name:'';?></span>
			
		</td>
	</tr>
	<tr class="abc">
		<td width="20%" class="abc">
			<span> Educational Specification : </span>
		</td>
		<td width="30%" class="abc">
			<span> <?php  echo (isset($cust_data->education_specification) && !empty($cust_data->education_specification))?$cust_data->education_specification:'';?></span>
			
		</td>
		<td width="20%" class="abc">
			<span> Occupation : </span>
			
		</td>
		<td width="30%" class="abc">
			<span>  <?php  echo (isset($cust_data->occupation) && !empty($cust_data->occupation))?$cust_data->occupation:'';?></span>
			
		</td>
	</tr>
	<tr class="abc">
		<td width="20%" class="abc">
			<span> Income : </span>
		</td>
		<td width="30%" class="abc">
			<span> <?php  echo (isset($cust_data->income) && !empty($cust_data->income))?$cust_data->income:'0';?></span>
			
		</td>
	</tr>

</table><hr>
<!-- mss -->

<h3>Relative Info</h3>
<hr>
<table class="abc" width="100%">
	<tr class="abc">
		<td width="20%" class="abc">
			<span> Father Name : </span>
		</td>
		<td width="30%" class="abc">
			<span> <?php  echo (isset($cust_data->father_full_name) && !empty($cust_data->father_full_name))?$cust_data->father_full_name:'';?></span>
		
		</td>
		<td width="20%" class="abc">
			<span> Parent Residence City : </span>
			
		</td>
		<td width="30%" class="abc">
			<span>  <?php  echo (isset($cust_data->parent_residence_city_name) && !empty($cust_data->parent_residence_city_name))?$cust_data->parent_residence_city_name:'';?></span>
			
		</td>
	</tr>

	<tr class="abc">
		<td width="20%" class="abc">
			<span> Mother : </span>
		</td>
		<td width="30%" class="abc">
			<span> <?php  echo (isset($cust_data->mother) && !empty($cust_data->mother))?$cust_data->mother:'';?></span>
		
		</td>

		<td width="20%" class="abc">
			<span> Brothers : </span>
		</td>
		<td width="30%" class="abc">
			<span> <?php  echo (isset($cust_data->brothers) && !empty($cust_data->brothers))?$cust_data->brothers:'0';?></span>
			
		</td>

	</tr>

	<tr class="abc">
		<td width="20%" class="abc">
			<span> Married Brothers : </span>
			
		</td>
		<td width="30%" class="abc">
			<span>  <?php  echo (isset($cust_data->married_brothers) && !empty($cust_data->married_brothers))?$cust_data->married_brothers:'0';?></span>
			
		</td>

		<td width="20%" class="abc">
			<span> Sisters : </span>
		</td>
		<td width="30%" class="abc">
			<span> <?php  echo (isset($cust_data->sisters) && !empty($cust_data->sisters))?$cust_data->sisters:'0';?></span>
			
		</td>
	</tr>
	<tr class="abc">
		<td width="20%" class="abc">
			<span> Married Sisters : </span>
			
		</td>
		<td width="30%" class="abc">
			<span>  <?php  echo (isset($cust_data->married_sisters) && !empty($cust_data->married_sisters))?$cust_data->married_sisters:'0';?></span>
			
		</td>

		<td width="20%" class="abc">
			<span> Native District : </span>
		</td>
		<td width="30%" class="abc">
			<span> <?php  echo (isset($cust_data->native_district_name) && !empty($cust_data->native_district_name))?$cust_data->native_district_name:'';?></span>
			
		</td>
	</tr>
	<tr class="abc">
		<td width="20%" class="abc">
			<span> Native City : </span>
			
		</td>
		<td width="30%" class="abc">
			<span>  <?php  echo (isset($cust_data->native_city_name) && !empty($cust_data->native_city_name))?$cust_data->native_city_name:'';?></span>
			
		</td>

		<td width="20%" class="abc">
			<span> Family Wealth : </span>
		</td>
		<td width="30%" class="abc">
			<span> <?php  echo (isset($cust_data->family_wealth) && !empty($cust_data->family_wealth))?$cust_data->family_wealth:'';?></span>
			
		</td>
	</tr>
	<tr class="abc">
		<td width="20%" class="abc">
			<span> Relative Surname : </span>
			
		</td>
		<td width="30%" class="abc">
		<?php $string1=(isset($cust_data->relative_surname) && !empty($cust_data->relative_surname))?$cust_data->relative_surname:'';
             $parts1=str_split($string1, 30);
             if(isset($parts1) && !empty($parts1))
             {
             	foreach ($parts1 as $key) 
             	{
             		echo $key.'<br>';
             	}
             }
             ?>
		</td>

		<td width="20%" class="abc">
			<span> Parent Occupation : </span>
		</td>
		<td width="30%" class="abc">
			<span> <?php  echo (isset($cust_data->parent_occupation) && !empty($cust_data->parent_occupation))?$cust_data->parent_occupation:'';?></span>
			
		</td>
	</tr>
	<tr class="abc">
		<td width="20%" class="abc">
			<span> Mama Surname : </span>
			
		</td>
		<td width="30%" class="abc">
			<span>  <?php  echo (isset($cust_data->mama_surname) && !empty($cust_data->mama_surname))?$cust_data->mama_surname:'';?></span>
			
		</td>
	</tr>
</table><hr>

<h3>Horoscope Info</h3><hr>
<table class="abc" width="100%">
	<tr class="abc">
		<td width="20%" class="abc">
			<span> Rashi : </span>
		</td>
		<td width="30%" class="abc">
			<span> <?php  echo (isset($cust_data->rashi_name) && !empty($cust_data->rashi_name))?$cust_data->rashi_name:'';?></span>
			
		</td>
		<td width="20%" class="abc">
			<span> Nakshtra : </span>
			
		</td>
		<td width="30%" class="abc">
			<span>  <?php  echo (isset($cust_data->nakshtra_name) && !empty($cust_data->nakshtra_name))?$cust_data->nakshtra_name:'';?></span>
			
		</td>
	</tr>
	<tr class="abc">
		<td width="20%" class="abc">
			<span> Charan : </span>
		</td>
		<td width="30%" class="abc">
			<span> <?php  echo (isset($cust_data->charan) && !empty($cust_data->charan))?$cust_data->charan:'';?></span>
			
		</td>
		<td width="20%" class="abc">
			<span> Gan : </span>
			
		</td>
		<td width="30%" class="abc">
			<span>  <?php  echo (isset($cust_data->gan_name) && !empty($cust_data->gan_name))?$cust_data->gan_name:'';?></span>
			
		</td>
	</tr>
	<tr class="abc">
		<td width="20%" class="abc">
			<span> Nadi : </span>
		</td>
		<td width="30%" class="abc">
			<span> <?php  echo (isset($cust_data->nadi_name) && !empty($cust_data->nadi_name))?$cust_data->nadi_name:'';?></span>
			
		</td>
		<td width="20%" class="abc">
			<span> Mangal : </span>
			
		</td>
		<td width="30%" class="abc">
			<span>  <?php  echo (isset($cust_data->mangal_name) && !empty($cust_data->mangal_name))?$cust_data->mangal_name:'';?></span>
			
		</td>
	</tr>
	<tr class="abc">
		<td width="20%" class="abc">
			<span> Birth Place : </span>
		</td>
		<td width="30%" class="abc">
			<span> <?php  echo (isset($cust_data->birth_place) && !empty($cust_data->birth_place))?$cust_data->birth_place:'';?></span>
			
		</td>
		<td width="20%" class="abc">
			<span> Birth Time : </span>
			
		</td>
		<td width="30%" class="abc">
			<span>  <?php  echo (isset($cust_data->birth_time) && !empty($cust_data->birth_time))?$cust_data->birth_time:'';?></span>
			
		</td>
	</tr>
	<tr class="abc">
		<td width="20%" class="abc">
			<span>Gotra/Devak : </span>
		</td>
		<td width="30%" class="abc">
			<span> <?php  echo (isset($cust_data->gotra) && !empty($cust_data->gotra))?$cust_data->gotra:'';?></span>
			
		</td>
	</tr>
</table><hr >
<h3 >Expectation</h3><hr>
<table class="abc" width="100%" style="table-layout: fixed;">
	<tr class="abc">
		<td width="20%" class="abc">
			<span> Mangal : </span>
		</td>
		<td width="30%" class="abc">
			<span> <?php  echo (isset($cust_data->mangal_name) && !empty($cust_data->mangal_name))?$cust_data->mangal_name:'';?></span>
			
		</td>
		<td width="20%" class="abc">
			<span> Expected Caste : </span>
			
		</td>
		<td width="30%" class="abc" >
			<span>  <?php  echo (isset($cust_data->expected_cast_name) && !empty($cust_data->expected_cast_name))?$cust_data->expected_cast_name:'';?></span>
		</td>
	</tr>
	</tr>
	<tr class="abc">
		<td width="20%" class="abc">
			<span> Preferred City : </span>
		</td>
		<td width="30%" class="abc">
			 <?php $string=(isset($cust_data->preffered_city_name) && !empty($cust_data->preffered_city_name))?$cust_data->preffered_city_name:'';
             $parts=str_split($string, 40);
             if(isset($parts) && !empty($parts))
             {
             	foreach ($parts as $key) 
             	{
             		echo $key.'<br>';
             	}
             }
             ?>
			
		</td>
		<td width="20%" class="abc">
			<span> Expected Age Difference : </span>
			
		</td>
		<td width="30%" class="abc">
			<span>  <?php  echo (isset($cust_data->age_difference) && !empty($cust_data->age_difference))?$cust_data->age_difference:'';?></span>
			
		</td>
	</tr>
	</tr>
	<tr class="abc">
		<td width="20%" class="abc">
			<span>  Expecteed Education : </span>
		</td>
		<td width="30%" class="abc">
			<span> <?php  echo (isset($cust_data->expected_education_name) && !empty($cust_data->expected_education_name))?$cust_data->expected_education_name:'';?></span>
		</td>
		<td width="20%" class="abc">
			<span>  Divorcee : </span>
			
		</td>
		<td width="30%" class="abc">
			<span>  <?php  echo (isset($cust_data->divorcee) && !empty($cust_data->divorcee))?$cust_data->divorcee:'';?></span>
			
		</td>
	</tr>
	</tr>
	<tr class="abc">
		<td width="20%" class="abc">
			<span>  Expected Height : </span>
		</td>
		<td width="30%" class="abc">
			<span> <?php  echo (isset($cust_data->expected_height) && !empty($cust_data->expected_height))?$cust_data->expected_height:'';?></span>
			
		</td>
		<td width="20%" class="abc">
			<span>  Expected Income : </span>
			
		</td>
		<td width="%" class="abc">
			<span>  <?php  echo (isset($cust_data->expected_income_per_annum) && !empty($cust_data->expected_income_per_annum))?$cust_data->expected_income_per_annum:'';?></span>
			
		</td>
	</tr>
</table>
</body></html>		









		