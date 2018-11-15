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
								<span class="title">Dashboard 1</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="has-sub">
					<a href="#">
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
					<a href="<?php echo Yii::app()->createUrl('member/index')?>">
						<i class="entypo-newspaper"></i>
						<span class="title">Member</span>
						<span class="badge badge-secondary"></span>
					</a>
					<ul>
						<li>
							<a href="<?php echo Yii::app()->createUrl('member/index')?>">
							<i class="entypo-newspaper"></i>
								<span class="title">Member</span>
							</a>
						</li>
						<li>
                                <a href="<?php echo Yii::app()->createUrl('member/admin')?>">
                                <i class="entypo-pencil"></i>
								<span class="title">Edit Member</span>
							</a>
						</li>
						<li>
                                <a href="<?php echo Yii::app()->createUrl('member/create')?>">
                                <i class="entypo-pencil"></i>
								<span class="title">Add Member</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="has-sub">
					<a href="#">
						<i class="entypo-progress-3"></i>
						<span class="title">Barang</span>
					</a>
					<ul>
						<li>
							<a href="<?php echo Yii::app()->createUrl('product/index')?>">
							<i class="entypo-progress-3"></i>
								<span class="title">Barang</span>
							</a>
						</li>
						<li>
							<a href="<?php echo Yii::app()->createUrl('product/admin')?>">
							<i class="entypo-pencil"></i>
								<span class="title">Edit Barang</span>
							</a>
						</li>
						<li>
							<a href="<?php echo Yii::app()->createUrl('product/create')?>">
							<i class="entypo-pencil"></i>
								<span class="title">Add Barang</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="has-sub">
					<a href="#">
						<i class="entypo-location"></i>
						<span class="title">Kategori</span>
					</a>
					<ul>
						<li>
                                <a href="<?php echo Yii::app()->createUrl('kategori/index')?>">
                                <i class="entypo-location"></i>
								<span class="title">Kategori</span>
							</a>
						</li>
						<li>
                                <a href="<?php echo Yii::app()->createUrl('kategori/admin')?>">
                                <i class="entypo-pencil"></i>
								<span class="title">Edit Kategori</span>
							</a>
						</li>
						<li>
                                <a href="<?php echo Yii::app()->createUrl('kategori/create')?>">
                                <i class="entypo-pencil"></i>
								<span class="title">Add Kategori</span>
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
						<span class="title">Pemesanan</span>
					</a>
					<ul>
						<li>
							<a href="<?php echo Yii::app()->createUrl('order/index')?>">
							<i class="entypo-docs"></i>
								<span class="title">Pemesanan</span>
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
								<span class="title">Bonus</span>
							</a>
						</li>
						<li>
							<a href="<?php echo Yii::app()->createUrl('bonus/admin')?>">
							<i class="entypo-docs"></i>
								<span class="title">Manage Bonus</span>
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
						
						<li><a href="<?php echo Yii::app()->createUrl('settingPerusahaan/admin') ?>">
						<i class="entypo-cog"></i>
						<span class="title">Setting Perusahaan</span>
						</a>
						</li>
						<li><a href="<?php echo Yii::app()->createUrl('settingBonus/admin') ?>">
						<i class="entypo-cog"></i>
						<span class="title">Setting Bonus/POIN</span>
						</a>
						</li>
						<li><a href="<?php echo Yii::app()->createUrl('settingLevel/admin') ?>">
						<i class="entypo-cog"></i>
						<span class="title">Setting Level</span>
						</a>
						</li>
					</ul>
					
				</li>
				
			</ul>
			
		</div>

	</div>