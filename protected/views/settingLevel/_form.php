<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'setting-level-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


<div class="row">
	<div class="form-group">
		<div class="col-sm-2">
			<?php echo $form->labelEx($model,'id'); ?>
		</div>
        <div class="col-sm-6">
				<?php echo $form->textField($model,'id',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'id'); ?>
		</div>
	</div>
</div>


<div class="row">
	<div class="form-group">
		<div class="col-sm-2">
			<?php echo $form->labelEx($model,'level'); ?>
		</div>
        <div class="col-sm-6">
				<?php echo $form->textArea($model,'level',array('class'=>'form-control','rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'level'); ?>
		</div>
	</div>
</div>


<div class="row">
	<div class="form-group">
		<div class="col-sm-2">
			<?php echo $form->labelEx($model,'member'); ?>
		</div>
        <div class="col-sm-6">
				<?php echo $form->textField($model,'member',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'member'); ?>
		</div>
	</div>
</div>


<div class="row">
	<div class="form-group">
		<div class="col-sm-2">
			<?php echo $form->labelEx($model,'keterangan'); ?>
		</div>
        <div class="col-sm-6">
				<?php echo $form->textArea($model,'keterangan',array('class'=>'form-control','rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'keterangan'); ?>
		</div>
	</div>
</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->