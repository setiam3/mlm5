<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('multiple'=>'multiple',
        'enctype' => 'multipart/form-data',
    ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


<div class="row">
	<div class="form-group">
		<div class="col-sm-2">
			<?php echo $form->labelEx($model,'nama_produk'); ?>
		</div>
        <div class="col-sm-6">
				<?php echo $form->textField($model,'nama_produk',array('class'=>'form-control','size'=>45,'maxlength'=>45)); ?>
			<?php echo $form->error($model,'nama_produk'); ?>
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


<div class="row">
	<div class="form-group">
		<div class="col-sm-2">
			<?php echo $form->labelEx($model,'harga'); ?>
		</div>
        <div class="col-sm-6">
				<?php echo $form->textField($model,'harga',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'harga'); ?>
		</div>
	</div>
</div>


<div class="row">
	<div class="form-group">
		<div class="col-sm-2">
			<?php echo $form->labelEx($model,'desc'); ?>
		</div>
        <div class="col-sm-6">
				<?php echo $form->textArea($model,'desc',array('class'=>'form-control','rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'desc'); ?>
		</div>
	</div>
</div>


<div class="row">
	<div class="form-group">
		<?php echo $form->labelEx($model,'image',array('class'=>'col-sm-2')); ?>
            <div class="col-sm-6">
<input name="foto" accept="image/*" type="file" class="form-control file2 inline btn btn-primary" multiple="multiple" data-label="<i class='glyphicon glyphicon-circle-arrow-up'></i> &nbsp;Browse Files" />
	</div>
	</div>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->