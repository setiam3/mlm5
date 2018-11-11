<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pemesanan-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'kode_pesan'); ?>
		<?php echo $form->textField($model,'kode_pesan',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'kode_pesan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kode_member'); ?>
		<?php echo $form->textField($model,'kode_member',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'kode_member'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal'); ?>
		<?php echo $form->textField($model,'tanggal',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'tanggal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'grand_total'); ?>
		<?php echo $form->textField($model,'grand_total'); ?>
		<?php echo $form->error($model,'grand_total'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->