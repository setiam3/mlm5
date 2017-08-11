<?php 
$form=$this->beginWidget('CActiveForm', array(
    'id'=>'tbl-form',
    'action'=>Yii::app()->createUrl($model->isNewRecord?$this->id.'/create':$this->id.'/update/'.$model->id),
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('multiple'=>'multiple',
        'enctype' => 'multipart/form-data',
    ),
)); ?>
    <?php echo $form->errorSummary($model); ?>
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
                        'url'=>$this->createUrl('getVoyage'),
                        'update'=>'#TBl_voyage',
                        'data'=>array('kapal'=>'js:this.value'),
                        ),
                    'class'=>'select2 visible'));
                     ?>
        </div>
    </div>
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
        </div>
    </div>
    </div>
    <div class="row">
            <div class="form-group">
                <?php echo $form->labelEx($model,'agen',array('class'=>'col-sm-2 control-label')); ?>
                <div class="col-sm-4">
                    <?php echo $form->dropDownList($model,'agen', CHtml::listData(User::model()->cache('1000')->findAllByAttributes(array('level'=>'agen','status'=>1)), 'username','username' ),
                            array('data-allow-clear'=>'true','prompt'=>'','data-placeholder'=>'Pilih Agen','class'=>'select2 visible')); ?>
                        <?php echo $form->error($model,'agen'); ?>
                </div>
            </div>
    </div>
    <div class="row">
        <div class="form-group">
        <?php echo $form->labelEx($model,'ETA',array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
        <?php 
        if($model->isNewRecord){
            $modeldate='';
            }else{
                $modeldate=explode(' ',$model->ETA);
                $modeldate=$this->tanggal_indo($modeldate[0]);
            }
        echo $form->textField($model,'ETA',array(
                'size'=>50,
                'maxlength'=>50,
                'class'=>'form-control datepicker',
                'data-format'=>"dd-mm-yyyy",
                'value'=>$modeldate,
                )); ?>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
        <?php echo $form->labelEx($model,'foto',array('class'=>'col-sm-2')); ?>
            <div class="col-xs-6">
            <input id='TBl_foto' name="foto[]" accept="image/*" type="file" class="form-control file2 inline btn btn-primary" multiple="multiple" data-label="<i class='glyphicon glyphicon-circle-arrow-up'></i> &nbsp;Browse" />
                
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
<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/bootstrap-datepicker.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/fileinput.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/dropzone/dropzone.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/select2/select2.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/bootstrap-tagsinput.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/typeahead.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/moment.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/jquery.multi-select.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/icheck/icheck.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/neon-chat.js"></script>