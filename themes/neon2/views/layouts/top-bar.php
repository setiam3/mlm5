<div class="row">
		
			<!-- Profile Info and Notifications -->
			<div class="col-md-6 col-sm-8 clearfix">
		
				<ul class="user-info pull-left pull-none-xsm">
		
					<!-- Profile Info -->
					<li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->
		
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<img src="<?php echo Yii::app()->theme->baseUrl?>/assets/images/thumb-1@2x.png" alt="" class="img-circle" width="44" />
hi, <?php echo Yii::app()->user->name; ?>
</a>

                                            <ul class="dropdown-menu">

                                                    <!-- Reverse Caret -->
                                                    <li class="caret"></li>

                                                    <!-- Profile sub-links -->
                                                    <li>
                                                            <a href="<?php echo Yii::app()->createUrl('user/admin/update/id/'.Yii::app()->user->id)?>">
                                                                    <i class="entypo-user"></i>
                                                                    Edit Profile
                                                            </a>
                                                    </li>

                                            </ul>
					</li>
		
				</ul>
				
			
		
			</div>
		
		
			<!-- Raw Links -->
			<div class="col-md-6 col-sm-4 clearfix hidden-xs">
		
				<ul class="list-inline links-list pull-right">
		
					<li>
                                            <a href="<?= Yii::app()->createUrl('user/logout')?>">
							Log Out <i class="entypo-logout right"></i>
						</a>
					</li>
				</ul>
		
			</div>
		
		</div>
<div class="row"><hr /></div>