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
					<a href="user">
						<i class="entypo-layout"></i>
						<span class="title">User Management</span>
					</a>
					<ul>
						<li>
							<a href="<?php echo Yii::app()->createUrl('user/admin/create')?>">
								<span class="title">Tambah User</span>
							</a>
						</li>
						<li>
							<a href="<?php echo Yii::app()->createUrl('user/admin/admin')?>">
								<span class="title">Edit User</span>
							</a>
						</li>
						<li>
							<a href="<?php echo Yii::app()->createUrl('rights')?>">
								<span class="title">User Access</span>
							</a>
						</li>
					</ul>
				</li>
				
				<li class="has-sub">
					<a href="<?php echo Yii::app()->createUrl('order/index')?>">
						<i class="entypo-newspaper"></i>
						<span class="title">Job Order</span>
						<span class="badge badge-secondary"><?php echo count(Order::model()->cache(1000)->findAll(array('condition'=>'MONTH(tanggal_jo)='.date('m'))))?></span>
					</a>
					<ul>
						<li>
							<a href="<?php echo Yii::app()->createUrl('order/index')?>">
								<span class="title">JOB Order</span>
							</a>
						</li>
						<li>
                                <a href="<?php echo Yii::app()->createUrl('order/create')?>">
								<span class="title">Tambah JO</span>
							</a>
						</li>
						<li>
                                <a href="<?php echo Yii::app()->createUrl('order/admin')?>">
								<span class="title">Edit JO</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="has-sub">
					<a href="#">
						<i class="entypo-window"></i>
						<span class="title">Positions</span>
					</a>
					<ul>
						<li>
                                <a href="<?php echo Yii::app()->createUrl('detail/index')?>">
								<span class="title">Positions</span>
							</a>
						</li>
						<li>
                                <a href="<?php echo Yii::app()->createUrl('detail/create')?>">
								<span class="title">Tambah Position</span>
							</a>
						</li>
						<li>
                                <a href="<?php echo Yii::app()->createUrl('detail/admin')?>">
								<span class="title">Edit Position</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="has-sub">
					<a href="#">
						<i class="entypo-doc-text"></i>
						<span class="title">Container JO</span>
					</a>
					<ul>
						<li>
							<a href="<?php echo Yii::app()->createUrl('kontainerjo/index')?>">
							<i class="entypo-doc-text"></i>
								<span class="title">Container JO</span>
							</a>
						</li>
						<li>
							<a href="<?php echo Yii::app()->createUrl('kontainerjo/create')?>">
							<i class="entypo-pencil"></i>
								<span class="title">Tambah Container JO</span>
							</a>
						</li>
						<li>
							<a href="<?php echo Yii::app()->createUrl('kontainerjo/admin')?>">
							<i class="entypo-pencil"></i>
								<span class="title">Edit Container JO</span>
							</a>
						</li>
					</ul>
				</li>				
				
			</ul>
			
		</div>

	</div>