<html><head>
	<style type="text/css"> table {border-collapse: collapse; } table, th, td {border: 1px solid black; padding: 3px; }.abc{ border: 0px; }  </style>
</head><body style="width: 90%; text-align: center; border: 2px solid black;">
<table class="abc" width="100%">
	<tr class="abc">
		<td width="20%" class="abc">
			<img style="width: 150px; height: 150px;" src="./uploads/favicon1.png">
		</td>
		<td width="80%" class="abc">
			<span><b>Shivbandhan Matrimony LLP</b><br>Durga Prasad Apartments, S. No. 26/6, Flat No. 1, Above Udyam Vikas Bank, Hingne KD, Sinhagad Road, Pune 411051, Maharashtra, India
				<br>
			Mobile : 8888438693/94,</span><br>
	        <span>  Email : info@shivbandhan.com <br>Website : www.shivbandhan.com  </span>
		</td>
	</tr>
</table><hr>
<h3 style="text-align: center;">Invoice</h3><hr>
<table class="abc" width="100%">
	<tr class="abc">
		<td width="15%" class="abc">
			<span><b>Name :</b> </span>
		</td>
		<td width="50%" class="abc">
			<span><?php echo (isset($cust_data->customer_name) && !empty($cust_data->customer_name))?$cust_data->customer_name:'-'; ?> </span>
		</td>
		<td width="10%" class="abc">
			<span><b>Date :</b> </span>
		</td>
		<td width="30%" class="abc">
			<span><?php echo (isset($cust_data->created_on) && !empty($cust_data->created_on))?date('d-M-Y',strtotime($cust_data->created_on)):' -'; ?> </span>
		</td>
	</tr>
	<tr class="abc">
		<td width="15%" class="abc">
			<span><b>Profile id:</b> </span>
		</td>
		<td width="40%" class="abc">
			<span><?php echo (isset($cust_data->profile_code) && !empty($cust_data->profile_code))?$cust_data->profile_code:'-'; ?> </span>
		</td>
		<td width="15%" class="abc">
			<span><b>Invoice No :</b> </span>
		</td>
		<td width=30%" class="abc">
			<span><?php echo (isset($cust_data->payment_id) && !empty($cust_data->payment_id))?'SHIVBN000'.$cust_data->payment_id:'-'; ?> </span>
		</td>
	</tr>
	<tr class="abc">
		<td width="15%" class="abc">
			<span><b>Mobile :</b> </span>
		</td>
		<td width="30%" class="abc">
			<span><?php echo (isset($cust_data->mobile) && !empty($cust_data->mobile))?$cust_data->mobile:'-'; ?> </span>
		</td>
		<td width="15%" class="abc">
			<span><b>Transcation id :</b> </span>
		</td>
		<td width="40%" class="abc">
			<span><?php echo (isset($cust_data->transcation_id) && !empty($cust_data->transcation_id))?$cust_data->transcation_id:'-'; ?> </span>
		</td>
	</tr>
	<tr class="abc">
		<td width="15%" class="abc">
			<span><b>Email :</b> </span>
		</td>
		<td width="50%" class="abc" >
			<span><?php echo (isset($cust_data->email) && !empty($cust_data->email))?$cust_data->email:'-'; ?> </span>
		</td>
		<td width="10%" class="abc">
			<span><b>Package :</b> </span>
		</td>
		<td width="25%" class="abc" >
			<span><?php echo (isset($cust_data->membership_plan) && !empty($cust_data->membership_plan))?$cust_data->membership_plan.' Package':'-'; ?> </span>
		</td>
	</tr>
	<tr class="abc">
		<td width="15%" class="abc">
			<span><b>Address :</b> </span>
		</td>
		<td width="70%" class="abc" colspan="2">
			<span><?php echo (isset($cust_data->permanant_address) && !empty($cust_data->permanant_address))?$cust_data->permanant_address:'-'; ?>  </span>
		</td>
	</tr>
</table>
<hr>
<table class="" width="100%">
	<tr class="">
		<th width="70%" class="" style="text-align: left;">
			<span>Perticular</span>
		</th>
		<th width="30%" class="" style="text-align: right;">
			<span>Amount </span>
		</th>
	</tr>
	<tr class="">
		<td width="70%" class="" >
			<span><?php echo (isset($cust_data->membership_plan) && !empty($cust_data->membership_plan))?$cust_data->membership_plan.' Package':'-'; ?> </span>
		</td>
		<td width="30%" class="" style="text-align: right;">
			<span><?php echo (isset($cust_data->membership_amt1) && !empty($cust_data->membership_amt1))?$cust_data->membership_amt1:'00'; ?> </span>
		</td>
	</tr>
	<tr class="">
		<td width="70%" class="" style="text-align: right;">
			<span><b>Sub Total</b> </span>
		</td>
		<td width="30%" class="" style="text-align: right;">
			<span><?php echo (isset($cust_data->membership_amt1) && !empty($cust_data->membership_amt1))?$cust_data->membership_amt1:'00'; ?> </span>
		</td>
	</tr>
	<tr class="">
		<td width="70%" class="" style="text-align: right;">
			<span><b>CGST (<?php echo (isset($cust_data->gst) && !empty($cust_data->gst))?(($cust_data->gst/2)).'%':'-'; ?>)</b> </span>
		</td>
		<td width="30%" class="" style="text-align: right;">
			<span><?php echo (isset($cust_data->total_amount) && !empty($cust_data->total_amount))?(($cust_data->total_amount-$cust_data->membership_amt1)/2):'00'; ?> </span>
		</td>
	</tr>
	<tr class="">
		<td width="70%" class="" style="text-align: right;">
			<span><b>SGST (<?php echo (isset($cust_data->gst) && !empty($cust_data->gst))?(($cust_data->gst/2)).'%':'-'; ?>)</b> </span>
		</td>
		<td width="30%" class="" style="text-align: right;">
			<span><?php echo (isset($cust_data->total_amount) && !empty($cust_data->total_amount))?(($cust_data->total_amount-$cust_data->membership_amt1)/2):'00'; ?> </span>
		</td>
	</tr>
	<tr class="">
		<td width="70%" class="" style="text-align: right;">
			<span><b>Total</b></span>
		</td>
		<td width="30%" class="" style="text-align: right;">
			<span><?php echo (isset($cust_data->total_amount) && !empty($cust_data->total_amount))?$cust_data->total_amount:'00'; ?></span>
		</td>
	</tr>
</table>
<hr>
<table class="abc" width="100%">
	<tr class="abc">
		<td width="70%" class="abc">
			<span> GST No : ############ </span><br>
			<span> PAN NO : ADUFS8915R </span><br>
			<span> LLP REG. NO : AAN-6893 </span>
		</td>
		<td width="30%" class="abc">
			<span>From shivbandhan  Matrimony LLP. </span>
		</td>
	</tr>
</table>
</body></html>		









		