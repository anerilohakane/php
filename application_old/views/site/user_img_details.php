<form action="javascript:void(0);" enctype="multipart/form-data" id=""  method="post" class="horizontal-form">
  <div class="form-body"> 
    <div class="row">
      <?php if(isset($cust_data) && !empty($cust_data))
      { ?>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <?php if(isset($cust_data->customer_photo1) && !empty($cust_data->customer_photo1))
            { ?>
                <li data-target="#myCarousel" data-slide-to="1"></li>
            <?php } ?>
          </ol>
          <div class="carousel-inner">
            <div class="item active">
              <img src="<?php echo base_url(); ?>uploads/customer_photo/<?php echo(isset($cust_data->customer_photo) && !empty($cust_data->customer_photo))?$cust_data->customer_photo:''?>" >
            </div>
            <?php if(isset($cust_data->customer_photo1) && !empty($cust_data->customer_photo1))
            { ?>
              <div class="item">
                <img src="<?php echo base_url(); ?>uploads/customer_photo/<?php echo(isset($cust_data->customer_photo1) && !empty($cust_data->customer_photo1))?$cust_data->customer_photo1:''?>" >
              </div>
            <?php } ?>
          </div>
          <?php if(isset($cust_data->customer_photo1) && !empty($cust_data->customer_photo1))
          { ?>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
              <span class="sr-only">Next</span>
            </a>
          <?php } ?>
        </div>
      <?php } ?>
    </div>
  </div>
</form>