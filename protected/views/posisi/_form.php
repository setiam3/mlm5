<div class="panel panel-primary"> 
    <div class="panel-heading">
            <div class="panel-title">Form Posisi</div>
    </div>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'posisi-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="panel-body">
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
<div class='row'>
	<div class="form-group">
		<?php echo $form->labelEx($model,'posisi',array('class'=>'control-label col-sm-2')); ?>
		<div class="col-sm-6">
		<?php echo $form->textField($model,'posisi',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
		</div>
	</div>
	</div>
<div class='row'>
	<div class="form-group">
		<?php echo $form->labelEx($model,'jenis',array('class'=>'control-label col-sm-2')); ?>
		<div class="col-sm-6">
		<?php echo $form->dropDownList($model,'jenis', array_combine(array_values(array('dalam','luar')),array('dalam','luar')),array('class'=>'selectboxit visible')); ?>
		<?php //echo $form->textField($model,'jenis',array('size'=>60,'maxlength'=>200,'class'=>'form-control')); ?>
		</div>
	</div>
	</div>
</div>
<div class="panel-footer">
<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-blue')); ?>
</div>
<?php $this->endWidget(); ?>

</div><!-- form -->