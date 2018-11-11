<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'barang-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'kode_barang'); ?>
		<?php echo $form->textField($model,'kode_barang',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'kode_barang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_barang'); ?>
		<?php echo $form->textField($model,'nama_barang',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nama_barang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'detail_barang'); ?>
		<?php echo $form->textArea($model,'detail_barang',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'detail_barang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kode_kategori'); ?>
		<?php echo $form->dropDownList($model,'kode_kategori', 
                                CHtml::listData(Kategori::model()->findAll(),
                                        'kode_kategori','nama_kategori' ),
                                array('data-allow-clear'=>'true',
                                    'prompt'=>'','data-placeholder'=>'Kode Kategori',
                                    'class'=>'select2 visible')); ?>
		<?php //echo $form->textField($model,'kode_kategori',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'kode_kategori'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->