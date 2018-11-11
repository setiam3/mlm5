<div class="sidebar-menu">
		<div class="sidebar-menu-inner">
			<header class="logo-env">
				<!-- logo -->
				<div class="logo">
					<a href="<?php echo Yii::app()->createUrl('/');?>">
						<img src="<?php echo Yii::app()->theme->baseUrl;?>/assets/images/logo_tosi.png" width="150" alt="" />
					</a>
				</div>
				<!-- logo collapse icon -->
				<div class="sidebar-collapse">
					<a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
						<i class="entypo-menu"></i>
					</a>
				</div>
				<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
				<div class="sidebar-mobile-menu visible-xs">
					<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
						<i class="entypo-menu"></i>
					</a>
				</div>
			</header>
			<ul id="main-menu" class="main-menu">
				<!-- add class "multiple-expanded" to allow multiple submenus to open -->
				<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
				<li class="has-sub">
					<a href="<?php echo Yii::app()->createUrl('site/index')?>">
						<i class="entypo-gauge"></i>
						<span class="title">Dashboard</span>
					</a>
					<ul>
						<li>
                                <a href="<?php echo Yii::app()->createUrl('site/index')?>">
								<span class="title">Dashboard 1</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="has-sub">
					<a href="#">
						<i class="entypo-window"></i>
						<span class="title">My JO</span>
					</a>
					<ul>
						<li>
                                <a href="<?php echo Yii::app()->createUrl('order/index')?>">
								<span class="title">JO</span>
							</a>
						</li>
						
					</ul>
				</li>	
				<li class="has-sub">
					<a href="#">
						<i class="entypo-window"></i>
						<span class="title">Booking JO</span>
					</a>
					<ul>
						<li>
                                <a href="<?php echo Yii::app()->createUrl('member/booking')?>">
								<span class="title">Booking</span>
							</a>
						</li>
						
					</ul>
				</li>
								
			</ul>
		</div>
	</div>
	<script type="text/javascript">
		$().ready(function(){
			$('#accordion-test').remove();
		})
	</script>