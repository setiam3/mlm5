<?php
/* @var $this KabupatenKotaController */
/* @var $model KabupatenKota */
/* @var $form CActiveForm */
?>

<div class="panel panel-primary"> 
    <div class="panel-heading">
        <div class="panel-title">Form Kabupaten Kota</div>
    </div>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kabupaten-kota-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="panel-body">
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
	<div class="form-group">
		<?php echo $form->labelEx($model,'id',array('class'=>'control-label col-sm-4')); ?>
		<div class="col-sm-8">
		<?php echo $model->isNewRecord?$form->textField($model,'id',array('size'=>4,'maxlength'=>4,'class'=>'form-control')):$model->id; ?>
	</div>
	</div>
	</div>

	<div class="row">
	<div class="form-group">
		<?php echo $form->labelEx($model,'province_id',array('class'=>'control-label col-sm-4')); ?>
		<div class="col-sm-8">
		<?php echo $form->textField($model,'province_id',array('size'=>2,'maxlength'=>2,'class'=>'form-control')); ?>
	</div>
	</div>
	</div>

	<div class="row">
	<div class="form-group">
		<?php echo $form->labelEx($model,'name',array('class'=>'control-label col-sm-4')); ?>
		<div class="col-sm-8">
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
	</div>
	</div>
	</div>

	<div class="row">
	<div class="form-group">
		<?php echo $form->labelEx($model,'alias',array('class'=>'control-label col-sm-4')); ?>
		<div class="col-sm-8">
		<?php echo $form->textField($model,'alias',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
	</div>
	</div>
	</div>
</div>
<div class="panel-footer">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-blue')); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->