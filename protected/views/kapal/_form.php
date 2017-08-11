<?php
/* @var $this KapalController */
/* @var $model Kapal */
/* @var $form CActiveForm */
?>
<div class="panel panel-primary"> 
    <div class="panel-heading">
            <div class="panel-title">Form Kapal</div>
    </div>
    <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'kapal-form',
    'enableAjaxValidation'=>false,
)); ?> 
    <div class="panel-body">
<p class="note">Fields with <span class="required">*</span> are required.</p>
    <?php echo $form->errorSummary($model); ?>
                <div class="row">
           <div class="form-group">     
                    <label for="Kapal[nama_kapal]" class="col-sm-2 control-label"><?php echo $form->labelEx($model,'nama_kapal'); ?></label>
                    <div class="col-sm-6">
                        <?php echo $form->textField($model,'nama_kapal',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
                    </div>
                    </div>
            </div>
                <div class="row">
            <div class="form-group">
                    <label for="Kapal[pelayaran]" class="col-sm-2 control-label"><?php echo $form->labelEx($model,'pelayaran'); ?></label>
                    <div class="col-sm-6">
                        <?php echo $form->textField($model,'pelayaran',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
                    </div>
                    </div>
            </div>
            </div>
            <div class="panel-footer">
                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-blue')); ?>
            </div>
<?php $this->endWidget(); ?>
</div>