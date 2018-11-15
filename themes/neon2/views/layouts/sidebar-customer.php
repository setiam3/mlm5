<div class="sidebar-menu">

		<div class="sidebar-menu-inner">
			
			<header class="logo-env">

				<!-- logo -->
<div class="logo">
	<a href="<?php echo Yii::app()->createUrl('/');?>">
		<?php echo (isset(SettingPerusahaan::model()->findByPk(1)->logo))?CHtml::image($this->imagesUrl().SettingPerusahaan::model()->findByPk(1)->logo,'LOGO',array('width'=>150)):'';?>
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
				<li class="has-sub">
					<a href="<?php echo Yii::app()->createUrl('site/index')?>">
						<i class="entypo-gauge"></i>
						<span class="title">Dashboard</span>
					</a>
					<ul>
						<li>
                                <a href="<?php echo Yii::app()->createUrl('site/index')?>">
                                <i class="entypo-chart-pie"></i>
								<span class="title">Dashboard Saya</span>
							</a>
						</li>
					</ul>
				</li>
				
				<li class="has-sub">
					<a href="<?php echo Yii::app()->createUrl('member/index')?>">
						<i class="entypo-newspaper"></i>
						<span class="title">Member</span>
						<span class="badge badge-secondary"></span>
					</a>
					<ul>
						<li>
							<a href="<?php echo Yii::app()->createUrl('member/view/'.Yii::app()->user->id)?>">
							<i class="entypo-newspaper"></i>
								<span class="title">My Profile</span>
							</a>
						</li>
						<li>
                                <a href="<?php echo Yii::app()->createUrl('member/update/'.Yii::app()->user->id)?>">
                                <i class="entypo-pencil"></i>
								<span class="title">Edit Profile</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="has-sub">
					<a href="#">
						<i class="entypo-doc-text"></i>
						<span class="title">Cart</span>
					</a>
					<ul>
						<li>
							<a href="<?php echo Yii::app()->createUrl('cart/index')?>">
							<i class="entypo-doc-text"></i>
								<span class="title">Cart</span>
							</a>
						</li>
						
					</ul>
				</li>
				<li class="has-sub">
					<a href="#">
						<i class="entypo-docs"></i>
						<span class="title">Pesananku</span>
					</a>
					<ul>
						<li>
							<a href="<?php echo Yii::app()->createUrl('order/index')?>">
							<i class="entypo-docs"></i>
								<span class="title">Pesananku</span>
							</a>
						</li><li>
							<a href="<?php echo Yii::app()->createUrl('order/create')?>">
							<i class="entypo-docs"></i>
								<span class="title">Add Pemesanan</span>
							</a>
						</li>
						
					</ul>
				</li>
				<li class="has-sub">
					<a href="#">
						<i class="entypo-docs"></i>
						<span class="title">Bonus</span>
					</a>
					<ul>
						<li>
							<a href="<?php echo Yii::app()->createUrl('bonus/index')?>">
							<i class="entypo-docs"></i>
								<span class="title">My Bonus</span>
							</a>
						</li>
						
					</ul>
				</li>
				
			</ul>
			
		</div>

	</div>