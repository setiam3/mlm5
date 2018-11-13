<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'order_code'); ?>
		<?php echo $form->textField($model,'order_code',array('class'=>'form-control','size'=>17,'maxlength'=>17)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'order_date'); ?>
		<?php echo $form->textField($model,'order_date',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kode_member'); ?>
		<?php echo $form->textField($model,'kode_member',array('class'=>'form-control','size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bank_transfer'); ?>
		<?php echo $form->textField($model,'bank_transfer',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'payment_status'); ?>
		<?php echo $form->textField($model,'payment_status',array('class'=>'form-control')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->