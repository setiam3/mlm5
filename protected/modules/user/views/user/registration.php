<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Registration");
//$this->breadcrumbs=array(UserModule::t("Registration"),);
?>
<div class="main-content" style="padding: 0 30% 10% 30%;">
<h1><?php echo UserModule::t("Registration"); ?></h1>

<?php if(Yii::app()->user->hasFlash('registration')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('registration'); 
echo '<a href="'.Yii::app()->baseUrl.'/site/index"> BACK</a>';
?>

</div>
<?php else: ?>

<?php $form=$this->beginWidget('UActiveForm', array(
	'id'=>'registration-form',
	'enableAjaxValidation'=>true,
	'disableAjaxValidationAttributes'=>array('RegistrationForm_verifyCode'),
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
	
	<?php echo $form->errorSummary(array($model,$profile)); ?>
	<div class="row">
	<div class="form-group">
	<?php echo $form->labelEx($model,'email',array('class'=>'col-md-4')); ?>
	<div class="col-md-5 ">
	<?php echo $form->textField($model,'email',array('class'=>'form-control')); ?>
	</div>
	</div>
	</div>
	<div class="row">
	<div class="form-group">
	<?php echo $form->labelEx($model,'password',array('class'=>'col-md-4')); ?>
	<div class="col-md-5 ">
	<?php echo $form->passwordField($model,'password',array('class'=>'form-control')); ?>
	</div>
	</div>
	</div>
	<div class="row">
	<div class="form-group">
	<?php echo $form->labelEx($model,'verifyPassword',array('class'=>'col-md-4')); ?>
	<div class="col-md-5 ">
	<?php echo $form->passwordField($model,'verifyPassword',array('class'=>'form-control')); ?>
	</div>
	</div>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'kode_upline',array('class'=>'col-md-2')); ?>
		<div class="col-sm-6">
        <?php echo $form->dropDownList($model,'kode_upline',Controller::comboUpline(),array('data-allow-clear'=>'true','prompt'=>'','data-placeholder'=>'pilih Upline','class'=>'select2 visible',
        	'ajax'=>array(
                        'type'=>'post',
                        'url'=>$this->createUrl('combosponsor'),
                        'update'=>'#Member_sponsor',
                        'data'=>array('kode_member'=>'js:this.value'),
                        'success'=>'function(datae){
                            $("#Member_sponsor").html(datae);
                        }'
                        ),
                    )
        ); ?>
        </div>
		<?php echo $form->error($model,'kode_upline'); ?>
	</div>
<div class="row">
		<?php echo $form->labelEx($model,'sponsor',array('class'=>'col-md-2')); ?>
		<div class="col-sm-6">
        <?php echo $form->dropDownList($model,'sponsor',Controller::comboSponsor(isset($upline)?$upline:''),array('data-allow-clear'=>'true','prompt'=>'','data-placeholder'=>'pilih sponsor','class'=>'select2 visible')); ?>
        </div>
		<?php echo $form->error($model,'sponsor'); ?>
	</div>
<?php 
		$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
			<div class="row">
	<div class="form-group">
		<?php echo $form->labelEx($profile,$field->varname,array('class'=>'col-md-4')); ?>
		<div class="col-md-5 ">
		<?php 
		if ($field->widgetEdit($profile)) {
			echo $field->widgetEdit($profile);
		} elseif ($field->range) {
			echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
		} elseif ($field->field_type=="TEXT") {
			echo$form->textArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
		} else {
			echo $form->textField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255),'class'=>'form-control'));
		}
		 ?>
		
	</div>	
	</div>	
	</div>	
			<?php
			}
		}
?>
	<?php if (UserModule::doCaptcha('registration')): ?>
		<div class="row">
	<div class="form-group">
		<?php echo $form->labelEx($model,'verifyCode',array('class'=>'col-md-4')); ?>
		<div class="col-md-5">
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode',array('class'=>'form-control')); ?>
	</div>
	</div>
	</div>
	<?php endif; ?>
	
	<div class="row submit" style="width: 12%;margin: 0 auto;">
		<?php echo CHtml::submitButton(UserModule::t("Register"),array('class'=>'btn btn-blue')); ?>
	</div>

<?php $this->endWidget(); ?>
<?php endif; ?>
</div>