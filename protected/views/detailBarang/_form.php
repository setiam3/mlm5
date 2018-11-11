<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detail-barang-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'kode_barang'); ?>
		<?php echo $form->textField($model,'kode_barang',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'kode_barang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ukuran_barang'); ?>
		<?php echo $form->textField($model,'ukuran_barang',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'ukuran_barang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'satuan'); ?>
		<?php echo $form->textField($model,'satuan',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'satuan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'harga'); ?>
		<?php echo $form->textField($model,'harga'); ?>
		<?php echo $form->error($model,'harga'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->