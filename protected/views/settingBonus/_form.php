<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'setting-bonus-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


<div class="row">
	<div class="form-group">
		<div class="col-sm-2">
			<?php echo $form->labelEx($model,'jenis_bonus'); ?>
		</div>
        <div class="col-sm-6">
				<?php echo $form->textField($model,'jenis_bonus',array('class'=>'form-control','size'=>25,'maxlength'=>25)); ?>
			<?php echo $form->error($model,'jenis_bonus'); ?>
		</div>
	</div>
</div>


<div class="row">
	<div class="form-group">
		<div class="col-sm-2">
			<?php echo $form->labelEx($model,'bonus'); ?>
		</div>
        <div class="col-sm-6">
				<?php echo $form->textField($model,'bonus',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'bonus'); ?>
		</div>
	</div>
</div>


<div class="row">
	<div class="form-group">
		<div class="col-sm-2">
			<?php echo $form->labelEx($model,'param'); ?>
		</div>
        <div class="col-sm-6">
				<?php echo $form->textField($model,'param',array('class'=>'form-control','size'=>25,'maxlength'=>25)); ?>
			<?php echo $form->error($model,'param'); ?>
		</div>
	</div>
</div>


<div class="row">
	<div class="form-group">
		<div class="col-sm-2">
			<?php echo $form->labelEx($model,'keterangan'); ?>
		</div>
        <div class="col-sm-6">
				<?php echo $form->textField($model,'keterangan',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'keterangan'); ?>
		</div>
	</div>
</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->