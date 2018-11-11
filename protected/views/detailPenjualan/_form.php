<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detail-penjualan-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'kode_penjualan'); ?>
		<?php echo $form->textField($model,'kode_penjualan',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'kode_penjualan'); ?>
	</div>

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
		<?php echo $form->labelEx($model,'jumlah_barang'); ?>
		<?php echo $form->textField($model,'jumlah_barang'); ?>
		<?php echo $form->error($model,'jumlah_barang'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->