<?php
/* @var $this TosController */
/* @var $model TOS */
/* @var $form CActiveForm */
?>

<div class="panel panel-primary"> 
    <div class="panel-heading">
            <div class="panel-title">Form Term Of Shippment</div>
    </div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tos-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="panel-body">
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model); ?>
	<div class="row">
	<div class="form-group">
		<?php echo $form->labelEx($model,'kode',array('class'=>'col-sm-2 control-label')); ?>
		<div class='col-sm-4'>
		<?php echo $form->textField($model,'kode',array('size'=>7,'maxlength'=>7,'class'=>'form-control')); ?>
		</div>
	</div>
	</div>
	<div class="row">
	<div class="form-group">
		<?php echo $form->labelEx($model,'tos',array('class'=>'col-sm-2 control-label')); ?>
		<div class='col-sm-4'>
		<?php echo $form->textField($model,'tos',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
		</div>
		</div>
	</div>
</div>
	<div class="panel-footer">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-blue')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->