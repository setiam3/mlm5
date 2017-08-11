<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'deliveryreceipt-form',
    'action'=>Yii::app()->createUrl($model->isNewRecord?$this->id.'/create':$this->id.'/update/'.$model->id),
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
    <div class="form-group">
		<?php echo $form->labelEx($model,'nomor_dr',array('class'=>'control-label col-sm-2')); ?>
        <div class="col-sm-4">
		<?php echo $form->textField($model,'nomor_dr',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
		</div></div>
	</div>
	<div class="row">
    <div class="form-group">
		<?php echo $form->labelEx($model,'kapal',array('class'=>'control-label col-sm-2')); ?>
        <div class="col-sm-4">
		<?php echo 
             $form->dropDownList($model,'kapal', 
                CHtml::listData(Order::model()->nojo(),'kapal', 'kapal'),
                array('data-allow-clear'=>'true',
                    'prompt'=>'','data-placeholder'=>'Kapal',$model->isNewRecord ?'disable="true"':'',
                    'ajax'=>array(
                        'type'=>'POST',
                        'url'=>$this->createUrl('bl/getVoyage'),
                        'update'=>'#Deliveryreceipt_voyage',
                        'data'=>array('kapal'=>'js:this.value'),
                        ),
                    'class'=>'select2 visible'));
                     ?>
		</div></div>
	</div>
	<div class="row">
    <div class="form-group">
		<?php echo $form->labelEx($model,'voyage',array('class'=>'control-label col-sm-2')); ?>
        <div class="col-sm-4">
		<?php echo $model->isNewRecord? $form->dropDownList($model,'voyage',array(),array('data-allow-clear'=>'true',
                            'prompt'=>'','data-placeholder'=>'voyage',
                            'class'=>'select2 visible')):
            $form->dropDownList($model,'voyage',CHtml::listData(Order::model()->findAllByAttributes(array('kapal'=>$model->kapal)),'voyage','voyage'),array('data-allow-clear'=>'true',
                            'prompt'=>'','data-placeholder'=>'voyage',
                            'class'=>'select2 visible'));
                     ?>
		</div></div>
	</div>
	<!--<div class="row">
    <div class="form-group">
		<?php echo $form->labelEx($model,'pelayaran',array('class'=>'control-label col-sm-2')); ?>
        <div class="col-sm-4">
		<?php echo $form->textField($model,'pelayaran',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
		</div></div>
	</div>-->

	<div class="row">
    <div class="form-group">
		<?php echo $form->labelEx($model,'nomor_kontainer',array('class'=>'control-label col-sm-2')); ?>
        <div class="col-sm-4">
		<?php echo $form->textField($model,'nomor_kontainer',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
		</div></div>
	</div>

	<div class="row">
    <div class="form-group">
		<?php echo $form->labelEx($model,'komoditi',array('class'=>'control-label col-sm-2')); ?>
        <div class="col-sm-4">
		<?php echo $form->textArea($model,'komoditi',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
		</div></div>
	</div>

	<div class="row">
    <div class="form-group">
		<?php echo $form->labelEx($model,'penerima',array('class'=>'control-label col-sm-2')); ?>
        <div class="col-sm-4">
		<?php echo $form->textField($model,'penerima',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
		</div></div>
	</div>

	<div class="row">
    <div class="form-group">
		<?php echo $form->labelEx($model,'alamat_penerima',array('class'=>'control-label col-sm-2')); ?>
        <div class="col-sm-4">
		<?php echo $form->textArea($model,'alamat_penerima',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
		</div>
	</div></div>

	<div class="row">
    <div class="form-group">
		<?php echo $form->labelEx($model,'up_penerima',array('class'=>'control-label col-sm-2')); ?>
        <div class="col-sm-4">
		<?php echo $form->textField($model,'up_penerima',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
		</div></div>
	</div>

	<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-blue')); ?>

<?php $this->endWidget(); ?>

<!-- Imported styles on this page -->
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/select2/select2-bootstrap.css">
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/select2/select2.css">
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/daterangepicker/daterangepicker-bs3.css">
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/icheck/skins/minimal/_all.css">
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/icheck/skins/square/_all.css">
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/icheck/skins/flat/_all.css">
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/icheck/skins/futurico/futurico.css">
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/icheck/skins/polaris/polaris.css">

<!-- Bottom scripts (common) -->
<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>

<!-- Imported scripts on this page -->
<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/fileinput.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/dropzone/dropzone.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/select2/select2.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/bootstrap-tagsinput.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/typeahead.min.js"></script>

<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/bootstrap-datepicker.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/moment.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/jquery.multi-select.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/icheck/icheck.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/neon-chat.js"></script>