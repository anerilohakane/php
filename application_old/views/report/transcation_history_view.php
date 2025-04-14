<div class="portlet box green">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-gift"></i>Transcation History
		</div> 
		<div class="actions pull-right">
            <a href="<?php echo (isset($url) && !empty($url))?$url:'print_transcation_report/0/0' ; ?>" class="btn btn-primary btn-sm"><i class="fa fa-print"></i>Print</a>
        </div>
	</div> 
	<div class="portlet-body">
		<table class="table table-striped table-bordered table-hover masterTable" >
			<thead>
				<tr class="heading">
					<th scope="col">Sr.no</th>
					<th scope="col"> Name</th>
					<th scope="col"> Transcation id</th>	
					<th scope="col"> Mode</th>	
					<th scope="col"> Membership Plan</th>	
					<th scope="col"> Date</th>	
					<th scope="col"> Validity</th>
					<th scope="col"> Amount</th>
					<th scope="col"> Action</th>
				</tr>
			</thead>
			<tbody> 
				<?php if(isset($transcation_data ) && !empty($transcation_data ))
				{ $i = 1;
					foreach ($transcation_data as $key) 
					{ ?>
						<tr class="odd gradeX">
							<td><?php echo $i++;?></td>
							<td><?php echo (isset($key->customer_name) && !empty($key->customer_name))?$key->customer_name:''; ?></td>
							<td><?php echo (isset($key->transcation_id) && !empty($key->transcation_id))?$key->transcation_id:''; ?></td>
							<td><?php echo (isset($key->payment_mode) && !empty($key->payment_mode))?$key->payment_mode:''; ?></td>
							<td><?php echo (isset($key->membership_plan) && !empty($key->membership_plan))?$key->membership_plan:''; ?></td>
							<td><?php echo (isset($key->created_on) && !empty($key->created_on))?date('d-m-Y',strtotime($key->created_on)):''; ?></td>
							<td><?php echo (isset($key->membership_validity) && !empty($key->membership_validity))?$key->membership_validity:''; ?></td>
							<td><?php echo (isset($key->membership_amt) && !empty($key->membership_amt))?$key->membership_amt:''; ?></td>
							<td>
								<a class="" href="<?php echo base_url(); ?>download_invoice/<?php echo (isset($key->payment_id) && !empty($key->payment_id))?$key->payment_id:''; ?>"><i class="fa fa-download" style="font-size: 30px;margin-left: 30px; color: green;" data-original-title="Bio-data" data-placement="top"></i> </a>
							</td>
						</tr>
					<?php } 
				}?>
			</tbody>
		</table>
	</div>
</div>