<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kategori-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_kategori'); ?>
		<?php echo $form->textField($model,'nama_kategori',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nama_kategori'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'detail_kategori'); ?>
		<?php echo $form->textField($model,'detail_kategori',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'detail_kategori'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kode_kategori'); ?>
		<?php echo $form->textField($model,'kode_kategori',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'kode_kategori'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->