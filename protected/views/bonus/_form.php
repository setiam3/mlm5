<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bonus-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'kode_member'); ?>
		<?php echo $form->textField($model,'kode_member',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'kode_member'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal'); ?>
		<?php echo $form->textField($model,'tanggal'); ?>
		<?php echo $form->error($model,'tanggal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bonus'); ?>
		<?php echo $form->textField($model,'bonus'); ?>
		<?php echo $form->error($model,'bonus'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'poin'); ?>
		<?php echo $form->textField($model,'poin'); ?>
		<?php echo $form->error($model,'poin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bonus_diambil'); ?>
		<?php echo $form->textField($model,'bonus_diambil',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'bonus_diambil'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal_ambil'); ?>
		<?php echo $form->textField($model,'tanggal_ambil'); ?>
		<?php echo $form->error($model,'tanggal_ambil'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->