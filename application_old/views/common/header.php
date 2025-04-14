<?php 
$user_role = $this->session->userdata('user_id');
if((!isset($user_role) && empty($user_role)))
{
    redirect('admin_logout');
} ?>

<div class="page-header">
	<div class="page-header-top">
		<div class="container">
			<div class="page-logo">
				<a href="<?php echo base_url();?>admin_user"><img src="<?php echo base_url();?>assets/admin/layout3/img/logo-default.png" style=" width: 29%; margin-top: 1px;" alt="logo" class="logo-default"></a>
			</div>
			<a href="javascript:;" class="menu-toggler"></a>
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					<li class="droddown dropdown-separator">
						<span class="external"></span>
					</li>
					<!--  -->
					<?php $user_name=$this->session->userdata('user_name'); ?>
					<li class="dropdown dropdown-user dropdown-dark">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<img alt="" class="img-circle" src="<?php echo base_url();?>assets/admin/layout3/img/avatar.png">
						<span class="username username-hide-mobile"><?php echo $user_name?></span>
						</a>
						<ul class="dropdown-menu dropdown-menu-default">
							<!-- <li>
								<a href="<?php echo base_url(); ?>admin_user">
								<i class="icon-user"></i> My Profile </a>
							</li>
							<li class="divider">
							</li> -->
							<li>
								<a href="javascript:void(0);" class="password_updation" data-url="change_pass">
								<i class="icon-key"></i> Change Password </a>
							</li>
							<!-- <li class="divider">
							</li>
							<li>
								<a href="javascript:void(0);" class="popup_save" rev="greetings" data-title="Send Greeting">
								<i class="icon-envelope"></i> Greetings </a>
							</li> -->
							<li class="divider">
							</li>
							<li>
								<a href="<?php echo base_url();?>admin_logout">
								<i class="icon-lock"></i> Log Out </a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="page-header-menu">
		<div class="container">
			<div class="hor-menu ">
				<ul class="nav navbar-nav">
					<li class="<?php echo (isset($title) && ($title=='dashboard'))?'active':''; ?>">
						<a href="<?php echo base_url();?>admin_user">Dashboard</a>
					</li>
					<?php 
					$user_id=$this->session->userdata('user_role');
					$this->load->model('common_model');
					$menu_data=$this->common_model->menu_list($user_id);
					$k=0;
					if(isset($menu_data) && !empty($menu_data))
					{
						foreach ($menu_data as $key ) 
						{
							$k++;
							$menu=$key['menu'];
							$submenu=$key['submenu']; ?>
							<li class="menu-dropdown classic-menu-dropdown <?php echo (isset($title) && ($title=='javascript:void(0);'))?'active':''; ?>">
								<a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:void(0);" class="dropdown-toggle" >
								<?php echo (isset($menu->icon) && !empty($menu->icon))?$menu->icon:''; ?> <?php echo (isset($menu->menu_name) && !empty($menu->menu_name))?$menu->menu_name:''; ?> <i class="fa fa-angle-down"></i>
								</a>						
								<ul class="dropdown-menu">
									<?php if(isset($submenu) && !empty($submenu))
									{ 
										$i=0;
										foreach ($submenu as $row) 
										{ $i++; ?>
											<li class="<?php echo (isset($title) && ($title==$row->action))?'active':''; ?>">
												<a href="<?php echo base_url();?><?php echo (isset($row->action) && !empty($row->action))?$row->action:''; ?>" class="iconify">								
												<i class="icon-plus"></i>  <?php echo (isset($row->submenu_name) && !empty($row->submenu_name))?$row->submenu_name:''; ?>
												</a>
											</li>
										<?php }
									} ?>
								</ul>										
							</li>
						<?php }
					} ?>	
				</ul>
			</div>
		</div>
	</div>
</div>