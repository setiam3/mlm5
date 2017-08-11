
<div class="panel panel-primary"> 
    <div class="panel-heading">
        <div class="panel-title">Form Upload BL</div>
    </div>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'tbl-form',
    'action'=>'create',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('multiple'=>'multiple',
        'enctype' => 'multipart/form-data',
    ),
)); ?>
<div class="panel-body">
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <?php echo $form->errorSummary($model); ?>

    <div class="row">
    <div class="form-group">
        <?php echo $form->labelEx($model,'no_jo',array('class'=>'control-label col-sm-2')); ?>
        <div class="col-sm-4">
            <?php echo $model->isNewRecord ?
             $form->dropDownList($model,'no_jo', 
                CHtml::listData(
                    Order::model()->nojo(), 
                'no_jo', 'no_jo'),
                array('data-allow-clear'=>'true',
                    'prompt'=>'','data-placeholder'=>'JO',$model->isNewRecord ?'disable="true"':'',
                    'ajax'=>array(
                        'type'=>'POST',
                        'url'=>$this->createUrl('getcustomer'),
                        'data'=>array('q'=>'js:this.value'),
                        'dataType'=>'JSON',
                        'success'=>'function(response){
                    $("#customer").html("customer : "+response["customer"]);
                    $("#agen").html("agen : "+response["agen"]);
                    if(response["agen"]===""){
                        alert("agen tak boleh kosong, asign dulu...");
                    }
                }'
                        ),
                    'class'=>'select2 visible')):$model->no_jo;
                     ?>
        </div>
        <?php $cust=$this->actionGetcustomer($model->no_jo);
        $agen=$this->actionGetcustomer($model->no_jo);
        ?>
        <div class="col-sm-4"><div id='customer'><?php echo $model->isNewRecord?'':'customer : '.$cust["customer"];?></div></div>
        <div class="col-sm-2">
            <div id='agen'>
                <?php echo $model->isNewRecord?'':'agen : '.$agen["agen"];?>   
            </div>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="form-group">
        <?php echo $form->labelEx($model,'foto',array('class'=>'col-sm-2')); ?>
            <div class="col-xs-6">
                <input type="file" name="foto"/>
                <?php
                    echo $model->isNewRecord?'':'<img src="'.Yii::app()->baseUrl.'/images/'.$model->foto.'" class="img-thumbnail" />'
                ?>
            </div>
        </div>
        </div>
        </div>
    <div class="panel-footer">
        <div class="form-group buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-blue')); ?>
    </div>
    </div>
<?php $this->endWidget(); ?>
</div>
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