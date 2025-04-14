<html><head>
	<style type="text/css"> table {border-collapse: collapse; table-layout: fixed; } table, th, td {border: 1px solid black; padding: 3px; }.abc{ border: 0px; }  </style>
</head><body>
<!-- <h2>Promotion Emails</h2> -->
<table class="abc" width="100%" >

	<tr class="abc">
		<td width="100%" class="abc" align="left">
			<span> <?php echo (isset($promotion_details[0]->content) && !empty($promotion_details[0]->content))?$promotion_details[0]->content:'';?></span>
			
		</td>
	</tr>

	<tr class="abc">
		<td width="100%" class="abc" align="left">
			<a href="<?php echo (isset($promotion_details[0]->redirect_url) && !empty($promotion_details[0]->redirect_url))?$promotion_details[0]->redirect_url:'';?>">
				<img src="./uploads/promotion_photo/<?php echo (isset($promotion_details[0]->promotion_photo) && !empty($promotion_details[0]->promotion_photo))?$promotion_details[0]->promotion_photo:'';?>"> 
			</a>
		</td>
	</tr>
</table>
</body></html>		









		