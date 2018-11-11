<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kode_member'); ?>
		<?php echo $form->textField($model,'kode_member',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tanggal'); ?>
		<?php echo $form->textField($model,'tanggal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bonus'); ?>
		<?php echo $form->textField($model,'bonus'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'poin'); ?>
		<?php echo $form->textField($model,'poin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bonus_diambil'); ?>
		<?php echo $form->textField($model,'bonus_diambil',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tanggal_ambil'); ?>
		<?php echo $form->textField($model,'tanggal_ambil'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->