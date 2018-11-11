<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'setting-perusahaan-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


<div class="row">
	<div class="form-group">
		<div class="col-sm-2">
			<?php echo $form->labelEx($model,'nama_perusahaan'); ?>
		</div>
        <div class="col-sm-6">
				<?php echo $form->textField($model,'nama_perusahaan',array('class'=>'form-control','size'=>45,'maxlength'=>45)); ?>
			<?php echo $form->error($model,'nama_perusahaan'); ?>
		</div>
	</div>
</div>


<div class="row">
	<div class="form-group">
		<div class="col-sm-2">
			<?php echo $form->labelEx($model,'alamat'); ?>
		</div>
        <div class="col-sm-6">
				<?php echo $form->textArea($model,'alamat',array('class'=>'form-control','rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'alamat'); ?>
		</div>
	</div>
</div>


<div class="row">
	<div class="form-group">
		<div class="col-sm-2">
			<?php echo $form->labelEx($model,'telp'); ?>
		</div>
        <div class="col-sm-6">
				<?php echo $form->textField($model,'telp',array('class'=>'form-control','size'=>15,'maxlength'=>15)); ?>
			<?php echo $form->error($model,'telp'); ?>
		</div>
	</div>
</div>


<div class="row">
	<div class="form-group">
		<div class="col-sm-2">
			<?php echo $form->labelEx($model,'email'); ?>
		</div>
        <div class="col-sm-6">
				<?php echo $form->textField($model,'email',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'email'); ?>
		</div>
	</div>
</div>


<div class="row">
	<div class="form-group">
		<div class="col-sm-2">
			<?php echo $form->labelEx($model,'logo'); ?>
		</div>
        <div class="col-sm-6">
				<?php echo $form->textField($model,'logo',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'logo'); ?>
		</div>
	</div>
</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->