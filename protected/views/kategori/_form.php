<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kategori-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


<div class="row">
	<div class="form-group">
		<div class="col-sm-2">
			<?php echo $form->labelEx($model,'nama_kategori'); ?>
		</div>
        <div class="col-sm-6">
				<?php echo $form->textField($model,'nama_kategori',array('class'=>'form-control','size'=>45,'maxlength'=>45)); ?>
			<?php echo $form->error($model,'nama_kategori'); ?>
		</div>
	</div>
</div>


<div class="row">
	<div class="form-group">
		<div class="col-sm-2">
			<?php echo $form->labelEx($model,'detail_kategori'); ?>
		</div>
        <div class="col-sm-6">
				<?php echo $form->textField($model,'detail_kategori',array('class'=>'form-control','size'=>45,'maxlength'=>45)); ?>
			<?php echo $form->error($model,'detail_kategori'); ?>
		</div>
	</div>
</div>


<div class="row">
	<div class="form-group">
		<div class="col-sm-2">
			<?php echo $form->labelEx($model,'kode_kategori'); ?>
		</div>
        <div class="col-sm-6">
				<?php echo $form->textField($model,'kode_kategori',array('class'=>'form-control','size'=>45,'maxlength'=>45)); ?>
			<?php echo $form->error($model,'kode_kategori'); ?>
		</div>
	</div>
</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->