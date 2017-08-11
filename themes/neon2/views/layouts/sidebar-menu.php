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
                                <i class="entypo-chart-pie"></i>
								<span class="title">Dashboard 1</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="has-sub">
					<a href="user">
						<i class="entypo-users"></i>
						<span class="title">User Management</span>
					</a>
					<ul>
						<li>
							<a href="<?php echo Yii::app()->createUrl('user/admin/create')?>">
							<i class="entypo-user-add"></i>
								<span class="title">Tambah User</span>
							</a>
						</li>
						<li>
							<a href="<?php echo Yii::app()->createUrl('user/admin/admin')?>">
							<i class="entypo-pencil"></i>
								<span class="title">Edit User</span>
							</a>
						</li>
						<li>
							<a href="<?php echo Yii::app()->createUrl('rights')?>">
							<i class="entypo-box"></i>
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
							<i class="entypo-newspaper"></i>
								<span class="title">JOB Order</span>
							</a>
						</li>
						<li>
                                <a href="<?php echo Yii::app()->createUrl('order/admin')?>">
                                <i class="entypo-pencil"></i>
								<span class="title">Edit JO</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="has-sub">
					<a href="#">
						<i class="entypo-progress-3"></i>
						<span class="title">Info Kontainer</span>
					</a>
					<ul>
						<li>
							<a href="<?php echo Yii::app()->createUrl('kontainerjo/index')?>">
							<i class="entypo-progress-3"></i>
								<span class="title">Info Kontainer</span>
							</a>
						</li>
						<li>
							<a href="<?php echo Yii::app()->createUrl('kontainerjo/admin')?>">
							<i class="entypo-pencil"></i>
								<span class="title">Edit Kontainer</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="has-sub">
					<a href="#">
						<i class="entypo-location"></i>
						<span class="title">Posisi Kontainer</span>
					</a>
					<ul>
						<li>
                                <a href="<?php echo Yii::app()->createUrl('detail/index')?>">
                                <i class="entypo-location"></i>
								<span class="title">Posisi Kontainer</span>
							</a>
						</li>
						<li>
                                <a href="<?php echo Yii::app()->createUrl('detail/admin')?>">
                                <i class="entypo-pencil"></i>
								<span class="title">Edit Posisi</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="has-sub">
					<a href="#">
						<i class="entypo-doc-text"></i>
						<span class="title">Bill Of Lading (B/L)</span>
					</a>
					<ul>
						<li>
							<a href="<?php echo Yii::app()->createUrl('bl/index')?>">
							<i class="entypo-doc-text"></i>
								<span class="title">B/L</span>
							</a>
						</li>
						<li>
							<a href="<?php echo Yii::app()->createUrl('bl/admin')?>">
							<i class="entypo-pencil"></i>
								<span class="title">Edit B/L</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="has-sub">
					<a href="#">
						<i class="entypo-docs"></i>
						<span class="title">Delivery Receipt (D/R)</span>
					</a>
					<ul>
						<li>
							<a href="<?php echo Yii::app()->createUrl('deliveryreceipt/index')?>">
							<i class="entypo-docs"></i>
								<span class="title">list D/R</span>
							</a>
						</li>
						<li>
							<a href="<?php echo Yii::app()->createUrl('deliveryreceipt/admin')?>">
							<i class="entypo-pencil"></i>
								<span class="title">Edit D/R</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="has-sub">
					<a href="#">
						<i class="entypo-folder"></i>
						<span class="title">Laporan</span>
					</a>
					<ul>
						<li>
							<a href="<?php echo Yii::app()->createUrl('laporan/index')?>">
							<i class="entypo-folder"></i>
								<span class="title">Laporan</span>
							</a>
						</li>
						
					</ul>
				</li>
				<li class="has-sub">
					<a href="#">
						<i class="entypo-user"></i>
						<span class="title">Member</span>
					</a>
					<ul>
						<li>
							<a href="<?php echo Yii::app()->createUrl('member/index')?>">
								<span class="title">Member</span>
							</a>
						</li>
						<li>
							<a href="<?php echo Yii::app()->createUrl('member/view')?>">
								<span class="title">Profile</span>
							</a>
						</li>
						<li>
							<a href="<?php echo Yii::app()->createUrl('member/update')?>">
								<span class="title">Edit Data</span>
							</a>
						</li>
						<li>
							<a href="<?php echo Yii::app()->createUrl('member/admin')?>">
								<span class="title">Manage Member</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="has-sub">
					<a href="#">
						<i class="entypo-cog"></i>
						<span class="title">Setting</span>
						<!--<span class="badge badge-info badge-roundless">New Items</span>-->
					</a>
					<ul>
						<li class="has-sub">
							<a href="#">
							<i class="entypo-map"></i>
								<span class="title">Kabupaten Kota</span>
								<!--<span class="badge badge-success">3</span>-->
							</a>
							<ul>
								<li>
									<a href="<?php echo Yii::app()->createUrl('kabupatenKota/index') ?>">
									<i class="entypo-map"></i>
										<span class="title">Kabupaten Kota</span>
									</a>
								</li>
								<li>
									<a href="<?php echo Yii::app()->createUrl('kabupatenKota/create') ?>">
									<i class="entypo-plus-squared"></i>
										<span class="title">Tambah Kabupaten Kota</span>
									</a>
								</li>
								<li>
									<a href="<?php echo Yii::app()->createUrl('kabupatenKota/admin') ?>">
									<i class="entypo-pencil"></i>
										<span class="title">Edit Kabupaten Kota</span>
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="<?php echo Yii::app()->createUrl('posisi/admin')?>">
							<i class="entypo-address"></i>
								<span class="title">Posisi</span>
							</a>
						</li>
						<li>
							<a href="<?php echo Yii::app()->createUrl('tos/admin')?>">
							<i class="entypo-pencil"></i>
								<span class="title">TOS</span>
							</a>
						</li>
						<li>
							<a href="<?= Yii::app()->createUrl('kapal/admin')?>">

								<i class="entypo-direction"></i>
								<span class="title">Ships</span>
								
							</a>
						</li>
						
					</ul>
				</li>
				
			</ul>
			
		</div>

	</div>