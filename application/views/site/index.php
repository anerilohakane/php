<!DOCTYPE html>
<html lang="en">

<head>
<title>Shivbandh</title>
<meta charset="utf-8" />
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<link href="<?php echo base_url();?>assets/site1/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/site/revolution/css/settings.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/site/revolution/css/layers.css">
<link href="<?php echo base_url();?>assets/site1/css/font-awesome.min.css" rel="stylesheet" type="text/css"/> 
<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet"> 
<link href="<?php echo base_url();?>assets/site1/css/menumaker.css" rel="stylesheet" type="text/css"/> 
<link href="<?php echo base_url();?>assets/site1/css/owl.carousel.css" rel="stylesheet" type="text/css"/> 
<link href="<?php echo base_url();?>assets/site1/css/magnific-popup.css" rel="stylesheet" type="text/css"/> 
<link href="<?php echo base_url();?>assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/site1/css/flaticon.css" rel="stylesheet" type="text/css"/> 
<link href="<?php echo base_url();?>assets/site1/css/style.css" rel="stylesheet" type="text/css"/> 
<link href="<?php echo base_url();?>assets/site1/css/stucture.css" rel="stylesheet" type="text/css"/> 
<link href="<?php echo base_url();?>assets/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
<link href="<?php echo base_url();?>uploads/favicon.png" rel="icon" type="image/x-icon"/>
<style type="text/css">
  /*#rev_slider_1066_1_wrapper
  {
    height: 700px !important;
  }*/
  .bootbox 
  {
    z-index: 999999999 !important;
  }
  /*#register-model
  {
    z-index: 999999999 !important;
  }*/
</style>
</head>
<body>
  <?php $this->load->view('site/header');?>
  <section class="home-revo-slider-2 ">
    <article class="content">    
      <div id="rev_slider_1066_1_wrapper" class="rev_slider_wrapper fullscreen-container col-md-6 col-xs-12 col-sm-6" data-alias="  notgeneric125" data-source="gallery" style="background-color:transparent;padding:0px; ">
        <div id="rev_slider_1066_1" class="rev_slider fullscreenbanner" style="display:none; margin-top:50px;" data-version="5.3.0.2">
          <ul> 
            <?php if(isset($slider_data) && !empty($slider_data))
            { 
              foreach ($slider_data as $key ) 
              { ?>
                <li class="slider-li-one" data-index="rs-3004" data-transition="zoomout" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000" data-rotate="0" data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Intro" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                  <img src="<?php echo base_url();?>uploads/slider_photos/<?php echo (isset($key->slider_photo) && !empty($key->slider_photo))?$key->slider_photo:'';?>"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                  
                </li>
              <?php }
            } ?>
          </ul>
        </div>
      </div>
    </article>
  </section> 
  <section class="ptb10 manage-section-padding">
    <div class="container">
      <div class="section text-center" style="margin-top: 30px; margin-bottom: 20px;">
        <?php if(isset($news_data) && !empty($news_data))
        { $i=0;?> 
          <marquee>  
            <?php foreach ($news_data as $key ) 
            { $i++;?>
              <span style="font-size: 20px; color: red; margin-right: 15px;"><!-- <?php echo $i.')';?> --><?php echo (isset($key->news_desc) && !empty($key->news_desc))?$key->news_desc:'';?></span>
            <?php } ?>
          </marquee>
        <?php } ?>
      </div>
     <!--  <div class="row">
        <?php if(isset($inspiral_data) && !empty($inspiral_data))
        {
          foreach ($inspiral_data as $key ) 
          { ?>
            <div class="col-md-4 col-sm-6" >
              <div class="upcoming-wedding-block">
                <div class="upcoming-wedd-img">
                  <a href="javascript:void(0);"><img src="<?php echo base_url();?>uploads/inspiral/<?php echo (isset($key->photo) && !empty($key->photo))?$key->photo:'';?>" class="img-responsive" alt="Shivbandhan Story" style="height: 235px;"></a>
                </div>
                <div class="upcoming-wedding-dtl text-center">
                  <div class="date"><?php echo (isset($key->date) && !empty($key->date))?date('d-M-Y',strtotime($key->date)):'';?></div>
                  <h4 class="wdding-couple"><a href="javascript:void(0);"><?php echo (isset($key->name) && !empty($key->name))?$key->name:'';?></a></h4>
                  <img src="images/sep-1.png" class="img-responsive" alt="icon">
                </div>
              </div>
            </div>
          <?php }
        } ?>
      </div> -->
    </div>
  </section>
  <section id="call-out" class="call-out-main-block">
    <div class="parallax" style="background-image: url('images/call-out-parr.jpg');">
     <div class="container text-center">
        <div class="call-out-dtl">
          <h2 class="call-out-heading">Are you Searching ?</h2>
          <?php if(isset($customer_id) && !empty($customer_id))
          { ?>
            <a href="javascript:void(0);" class="btn btn-pink popup_save1" rev="search_matches">Start Searching Today</a>
         <?php } 
         else
         { ?>
              <a href="javascript:void(0);" class="btn btn-pink" data-toggle="modal" data-target="#register-model">Start Enroll Today</a>
        <?php } ?>
        </div>
      </div>
    </div>
  </section>
  <section id="why-choose" class="why-choose-main-block" >
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="section">
            <div class="row">
              <div class="col-md-4 col-sm-4">
                <h3 class="section-heading">Why Choose Shivbandh</h3>
              </div>
              <div class="col-md-8 col-sm-8">
                <p class="section-sub-heading">Marriages are made in heaven but we solemnize them at Shivbandhan Maratha Vadhu Var.” Shivbandhan Maratha Vadhu Var is an online marriage bureau based in Pune, dedicated to help people, meet their life partners for marriage in a comfortable environment. </p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <div class="why-choose-block">
                <div class="row">
                  <div class="col-xs-3">
                    <div class="why-choose-icon">
                      <img src="images/why-ch-icon-bg.png" class="img-responsive" alt="icon">
                      <i class=""><img src="<?php echo base_url();?>images/personal.png" style="height:40px;"></i>
                    </div>
                  </div>
                  <div class="col-xs-9">
                    <div class="why-choose-dtl">
                      <h4 class="why-choose-heading">PERSONAL ATTENTION</h4>
                      <p class="why-choose-sub-heading">Experience The Attention as we are the Member of Family.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="why-choose-block">
                <div class="row">
                  <div class="col-xs-3">
                    <div class="why-choose-icon">
                      <img src="images/why-ch-icon-bg.png" class="img-responsive" alt="icon">
                      <i class=""><img src="<?php echo base_url();?>images/trust.png" style="height:40px;"></i>
                    </div>
                  </div>
                  <div class="col-xs-9">
                    <div class="why-choose-dtl">
                      <h4 class="why-choose-heading">TRUST</h4>
                      <p class="why-choose-sub-heading">Our motto is to provide a pleasant and superior matchmaking experience to our brides and grooms to meet their prospective life partners along with protecting their privacy and security.</p>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="why-choose-block">
                <div class="row">
                  <div class="col-xs-3">
                    <div class="why-choose-icon">
                      <img src="images/why-ch-icon-bg.png" class="img-responsive" alt="icon">
                      <i class="f"><img src="<?php echo base_url();?>images/organized.png" style="height:40px;"></i>
                    </div>
                  </div>
                  <div class="col-xs-9">
                    <div class="why-choose-dtl">
                      <h4 class="why-choose-heading">ORGANIZED SEARCH</h4>
                      <p class="why-choose-sub-heading">We are in for an organized approach to searching for your soul mate.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="why-choose-block">
                <div class="row">
                  <div class="col-xs-3">
                    <div class="why-choose-icon">
                      <img src="images/why-ch-icon-bg.png" class="img-responsive" alt="icon">
                      <i class=""> <img src="<?php echo base_url();?>images/compitability.png" style="height:40px;"></i>
                    </div>
                  </div>
                  <div class="col-xs-9">
                    <div class="why-choose-dtl">
                      <h4 class="why-choose-heading">COMPATABILITY</h4>
                      <p class="why-choose-sub-heading">The more compatible your life partner is with you, the happier your life is bound to be…. you want to marry someone who is really compatible to you and find ... To start your partner search through SHIVBANDHAN </p>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="weddlist-img">
            <img src="images/weddlist.png" class="img-responsive" alt="weddlist img">
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="testimonial-block" class="testimonial-main-block" style="background-image: url('images/call-out-parr.jpg');">
    <div class="overlay-bg"></div>
    <div class="container">
      <div class="section text-center">
        <h3 class="section-heading">Our Success Story</h3>
      </div>
      <div id="testimonials-slider" class="testimonials-slider">
        <?php if(isset($success_story_data) && !empty($success_story_data))
        {
          foreach ($success_story_data as $key ) 
          { ?>
            <div class="item testimonial-block text-center">
              <p class="testimonial-comment">“ <?php echo (isset($key->comment) && !empty($key->comment))?$key->comment:'';?> ”</p>
              <div class="testimonial-client-img">
                <img src="<?php echo base_url();?>uploads/success_story/<?php echo (isset($key->photo) && !empty($key->photo))?$key->photo:'';?>" class="img-responsive" alt="testimonial" style="height: 120px; width: 180px;">
              </div>
              <div class="testimonial-dtl">
                <h5 class="testimonial-client"><?php echo (isset($key->name) && !empty($key->name))?$key->name:'';?></h5>
                <div class="date"><?php echo (isset($key->date) && !empty($key->date))?date('d-M-Y',strtotime($key->date)):'';?></div>
              </div>
            </div>
            <div class="item testimonial-block text-center">
              <p class="testimonial-comment">“<?php echo (isset($key->comment) && !empty($key->comment))?$key->comment:'';?> ”</p>
              <div class="testimonial-client-img">
                <img src="<?php echo base_url();?>uploads/success_story/<?php echo (isset($key->photo) && !empty($key->photo))?$key->photo:'';?>" class="img-responsive" alt="testimonial" style="height: 120px; width: 180px;">
              </div>
              <div class="testimonial-dtl">
                <h5 class="testimonial-client"><?php echo (isset($key->name) && !empty($key->name))?$key->name:'';?></h5>
                <div class="date"><?php echo (isset($key->date) && !empty($key->date))?date('d-M-Y',strtotime($key->date)):'';?></div>
              </div>
            </div>
          <?php }
        } ?>
            
      </div>
    </div>    
  </section>
  <?php $this->load->view('site/footer');?>
<script src="<?php echo base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/site/js/owl.carousel.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/site/js/jquery.ajaxchimp.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/site/js/smooth-scroll.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/site/js/jquery.magnific-popup.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/site/js/waypoints.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/site/js/jquery.counterup.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/site/js/menumaker.js"></script>  
<script type="text/javascript" src="<?php echo base_url();?>assets/site/js/jquery.share-tooltip.js"></script>  
<script type="text/javascript" src="<?php echo base_url();?>assets/site/js/price-slider.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/site/revolution/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/site/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/site/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/site/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/site/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/site/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/site/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/site/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/site/js/theme.js"></script> 
<script src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js"></script>

<script src="<?php echo base_url();?>assets/global/scripts/metronic.js" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>js/common.js"></script> 
<!-- end jquery -->
</body>
<script>
jQuery(document).ready(function() {    
    // initiate layout and plugins
    Metronic.init(); 

});
</script> 
<script type="text/javascript">
  var tpj=jQuery;   
  var revapi1066;
  tpj(document).ready(function() {
  if(tpj("#rev_slider_1066_1").revolution == undefined){
  revslider_showDoubleJqueryError("#rev_slider_1066_1");
  } 
  else
  {
  revapi1066 = tpj("#rev_slider_1066_1").show().revolution({
  sliderType:"standard",
  jsFileLocation:"//server.local/revslider/wp-content/plugins/revslider/public/assets/js/",
  sliderLayout:"fullscreen",
  dottedOverlay:"none",
  delay:9000,
  navigation: {
    keyboardNavigation:"off",
    keyboard_direction: "horizontal",
    mouseScrollNavigation:"off",
    mouseScrollReverse:"default",
    onHoverStop:"off",
    touch:{
          touchenabled:"on",
          swipe_threshold: 75,
          swipe_min_touches: 1,
          swipe_direction: "horizontal",
          drag_block_vertical: false
          },
    bullets: {
      container:"slider",
      rtl:false,
      style:"",
      enable:true,
      hide_onmobile:true,              
      hide_onleave:false,
      hide_delay:200,
      hide_delay_mobile:1200,
      hide_under:0,
      hide_over:9999,
      direction:"horizontal",
      h_align:"center",
      v_align:"center",
      space:17,
      h_offset:0,
      v_offset:250,
      tmp:'<span class="tp-bullet-image"></span><span class="tp-bullet-title"></span>'
    }
  },
  responsiveLevels:[1240,1024,778,480],
  visibilityLevels:[1240,1024,778,480],
  gridwidth:[1240,1024,778,480],
  gridheight:[868,768,960,720],
  gridwidth: 1000,
  lazyType:"none",
  parallax: {
    type:"mouse",
    origo:"slidercenter",
    speed:2000,
    levels:[2,3,4,5,6,7,12,16,10,50,46,47,48,49,50,55],
    type:"mouse",
    disable_onmobile:"on"
  },
  shadow:0,
  spinner:"off",
  stopLoop:"off",
  stopAfterLoops:1,
  stopAtSlide:0,
  shuffle:"off",
  autoHeight:"off",
  fullScreenAutoWidth:"off",
  fullScreenAlignForce:"off",
  fullScreenOffsetContainer: ".header",
  fullScreenOffset: "60px",
  disableProgressBar:"on",
  hideThumbsOnMobile:"off",
  hideSliderAtLimit:0,
  hideCaptionAtLimit:0,
  hideAllCaptionAtLilmit:0,
  debugMode:false,
  fallbacks: {
        simplifyAll:"off",
        nextSlideOnWindowFocus:"off",
        disableFocusListener:false,
        }
      });
    }
  });
</script>

</body>
</html>