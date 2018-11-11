<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detail-pemesanan-form',
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

	<div class="row">
		<?php echo $form->labelEx($model,'detail_pemesanancol'); ?>
		<?php echo $form->textField($model,'detail_pemesanancol',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'detail_pemesanancol'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_detail'); ?>
		<?php echo $form->textField($model,'status_detail',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'status_detail'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->