<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kontainerjo-form',
    'action'=>Yii::app()->createUrl($model->isNewRecord?$this->id.'/create':$this->id.'/update/'.$model->id),
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('multiple'=>'multiple',
        'enctype' => 'multipart/form-data',
    ),
)); ?>
	<?php echo $form->errorSummary($model); ?>
        <div class="row">
        <div class="form-group">
		<?php echo $form->labelEx($model,'no_jo',array('class'=>'col-sm-2')); ?>
            <div class="col-sm-6">
                <?php echo $model->isNewRecord ?
                $form->dropDownList($model,'no_jo', CHtml::listData(Order::model()->cache(1000)->findAll(array('select'=>'no_jo','condition'=>'status <>"complete" or status is NULL')), 
                'no_jo', 'no_jo'),array('class'=>'select2 visible','data-allow-clear'=>"true",'prompt'=>'','data-placeholder'=>'JO',
                'ajax'=>array(
                        'type'=>'POST',
                        'url'=>$this->createUrl('getCustomer'),
                        'update'=>'#customer',
                        'data'=>array('q'=>'js:this.value'),
                        ),

                )):$model->no_jo; ?>
            </div>
		<?php echo $form->error($model,'no_jo'); ?>
        <div class="col-sm-3">
            <div id='customer'><?php echo $model->isNewRecord?'':$this->actionGetCustomer($model->no_jo);?></div>
        </div>
	</div>
	</div>
        <div class="row">
	<div class="form-group">
		<?php echo $form->labelEx($model,'nomor_kontainer',array('class'=>'col-sm-2 control-label')); ?>
            <div class="col-sm-6">
                    <?php echo $form->textField($model,'nomor_kontainer',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
            </div>
	</div>
	</div>
	<div class="row">
    <div class="form-group">
        <?php echo $form->labelEx($model,'type_kontainer',array('class'=>'col-sm-2 control-label')); ?>
            <div class="col-sm-6">
                    <?php echo $form->textField($model,'type_kontainer',array('size'=>60,'maxlength'=>100,'class'=>'form-control typeahead','data-remote'=>$this->createUrl('cari?act=typekontainer&q=%QUERY'))); ?>
            </div>
    </div>
    </div>
        <div class="row">
	<div class="form-group">
		<?php echo $form->labelEx($model,'komoditi',array('class'=>'col-sm-2')); ?>
            <div class="col-sm-6">
		<?php echo $form->textField($model,'komoditi',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
            </div>
		<?php echo $form->error($model,'komoditi'); ?>
	</div>
	</div>
        <div class="row">
	<div class="form-group">
		<?php echo $form->labelEx($model,'nopol',array('class'=>'col-sm-2')); ?>
            <div class="col-sm-6">
		<?php echo $form->textField($model,'nopol',array('size'=>20,'maxlength'=>20,'class'=>'form-control')); ?>
            </div>
		<?php echo $form->error($model,'nopol'); ?>
	</div>
	</div>
        <div class="row">
	<div class="form-group">
		<?php echo $form->labelEx($model,'supir',array('class'=>'col-sm-2')); ?>
            <div class="col-sm-6">
		<?php echo $form->textField($model,'supir',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
            </div>
		<?php echo $form->error($model,'supir'); ?>
	</div>
	</div>
        <div class="row">
	<div class="form-group">
		<?php echo $form->labelEx($model,'foto',array('class'=>'col-sm-2')); ?>
            <div class="col-sm-6">
<input name="foto[]" accept="image/*" type="file" class="form-control file2 inline btn btn-primary" multiple="multiple" data-label="<i class='glyphicon glyphicon-circle-arrow-up'></i> &nbsp;Browse Files1" />
	</div>
	</div>
	</div>
        <div class="row">
            <div class="form-group">
            <div class="col-sm-2"></div>
                <div class="col-xs-6">
                    <input type="file" name="foto2" 
                    class="form-control file2 inline btn btn-primary" data-label="<i class='glyphicon glyphicon-circle-arrow-up'></i> &nbsp;Browse Files2" />
                </div>
            </div>
        </div>

        <div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-blue')); ?>
	</div>
    
    <?php $this->endWidget(); ?>
<!-- Imported styles on this page -->
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/select2/select2-bootstrap.css">
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/select2/select2.css">
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

<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/moment.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/icheck/icheck.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/neon-chat.js"></script>