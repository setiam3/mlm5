<?php
$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
?>
<?php if(Yii::app()->user->hasFlash('loginMessage')): ?>
<div class="login-container">
<div class="success">
	<?php echo Yii::app()->user->getFlash('loginMessage'); ?>
</div>
<?php endif; ?>
<div class="login-header login-caret">
		<div class="login-content">
			<a href="#" class="logo">
				<img src="<?=Yii::app()->theme->baseUrl?>/assets/images/logo_tosi.png" width="300" alt="" />
			</a>
                        <p class="description"><?php echo UserModule::t("Dear user, log in to access the member area!"); ?></p>
			<!-- progress bar indicator 
			<div class="login-progressbar-indicator">
				<h3>43%</h3>
				<span>logging in...</span>
			</div>-->
		</div>
	</div>
    <div class="login-form">
		
        <div class="login-content">
            <?php echo CHtml::beginForm(); ?>
	<?php echo CHtml::errorSummary($model); ?>
    <div class="form-group">				
            <div class="input-group">
                    <div class="input-group-addon">
                            <i class="entypo-user"></i>
                    </div>
                <?php echo CHtml::activeTextField($model,'username',array('placeholder'=>'Username','class'=>'form-control')) ?>
                <!--<input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off" />-->
            </div>
    </div>
        <div class="form-group">			
            <div class="input-group">
                    <div class="input-group-addon">
                            <i class="entypo-key"></i>
                    </div>
                <?php echo CHtml::activePasswordField($model,'password',array('placeholder'=>'Password','class'=>'form-control')) ?>
                    <!--<input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" />-->
            </div>
    </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-login">
                        <i class="entypo-login"></i>
                        Login In
                </button>
        </div>
	<div class="login-bottom-links">
            <?php echo CHtml::link(UserModule::t("Register"),Yii::app()->getModule('user')->registrationUrl); ?> | <?php echo CHtml::link(UserModule::t("Lost Password?"),Yii::app()->getModule('user')->recoveryUrl); ?>
<!--<a href="extra-forgot-password.html" class="link">Forgot your password?</a>-->
            <br>
            <a href="#">ToS</a>  - <a href="#">Privacy Policy</a>
    </div>
	
<?php echo CHtml::endForm(); ?>
            
        </div>
        </div>
<?php
$form = new CForm(array(
    'elements'=>array(
        'username'=>array(
            'type'=>'text',
            'maxlength'=>32,
        ),
        'password'=>array(
            'type'=>'password',
            'maxlength'=>32,
        ),
        'rememberMe'=>array(
            'type'=>'checkbox',
        )
    ),

    'buttons'=>array(
        'login'=>array(
            'type'=>'submit',
            'label'=>'Login',
        ),
    ),
), $model);
?>
</div>