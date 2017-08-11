<?php
$this->breadcrumbs=array(
	'Laporan',
);?>
<h1>MUTASI</h1>
<div class="panel panel-primary"> 
    <div class="panel-heading">
        <div class="panel-title">Form filter pelaporan</div>
    </div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'order-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="panel-body">
   <div class="row">
        <div class="form-group">
    <?php echo $form->labelEx($model,'jo',array('class'=>'control-label col-sm-4')); ?>
            <div class="col-sm-8">
                <?php echo $form->dropDownList($model,'jo', CHtml::listData(Order::model()->cache(1000)->findAll(array('select'=>'no_jo','condition'=>'status <>"complete" or status is NULL')), 
                'no_jo', 'no_jo'),array('class'=>'select2 visible','data-allow-clear'=>"true",'prompt'=>'','data-placeholder'=>'SEMUA',

                )); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
    <?php echo $form->labelEx($model,'kapal',array('class'=>'control-label col-sm-4')); ?>
            <div class="col-sm-8">
                <?php echo $form->dropDownList($model,'kapal', 
                    CHtml::listData(Kapal::model()->cache('1000')->findAll(), 'nama_kapal','nama_kapal' ),
                    array('data-allow-clear'=>'true','prompt'=>'','data-placeholder'=>'SEMUA','class'=>'select2 visible')); ?>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="form-group">
        <?php echo $form->labelEx($model,'customer',array('class'=>'control-label col-sm-4')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->dropDownList($model,'customer',
CHtml::listData(Customer::model()->findAll(),'nama','nama' ),
                                array('data-allow-clear'=>'true',
                                    'prompt'=>'','data-placeholder'=>'SEMUA',
                                    'class'=>'select2 visible')); ?>
                        <?php echo $form->error($model,'customer'); ?>
                    </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                    <?php echo $form->labelEx($model,'tujuan',array('class'=>'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model,'tujuan',array('placeholder'=>'SEMUA','size'=>50,'maxlength'=>50,'class'=>'form-control typeahead','data-remote'=>$this->createUrl('cari?q=%QUERY'))); ?>
                    </div>
            </div>
        </div>
        <div class="row">
        	<div class="form-group">
                    <?php echo $form->labelEx($model,'tgl_stuffing',array('class'=>'control-label col-sm-4')); ?>
                    <div class="col-sm-1">Dari</div>
                    <div class="col-sm-3">
                        <?php echo $form->textField($model,'tgl_stuffing',array(
                            'size'=>50,
                            'maxlength'=>50,
                            'class'=>'form-control datepicker',
                            'data-format'=>"dd-mm-yyyy",
                            'value'=>date('d-m-Y'))); ?>
                    </div>
                    <div class="col-sm-1">Sampai</div>
                    <div class="col-sm-3">
                        <?php echo $form->textField($model,'tgl_stuffing1',array(
                            'size'=>50,
                            'maxlength'=>50,
                            'class'=>'form-control datepicker',
                            'data-format'=>"dd-mm-yyyy",
                            'value'=>date('d-m-Y'))); ?>
                    </div>
            </div>
        </div>
</div>
	<div class="panel-footer">
        <div class="form-group buttons">
		<input type='submit' value='cari' class='btn btn-blue'/>
		</div>
    </div>
<?php $this->endWidget(); ?>
</div>
<div id="chartJO"></div>
<script type="text/javascript">
	//var ChartJO=<?php echo $this->grafikJo();?>;
</script>

<!-- Imported styles on this page -->
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/select2/select2.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/selectboxit/jquery.selectBoxIt.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/icheck/skins/minimal/_all.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/icheck/skins/square/_all.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/icheck/skins/flat/_all.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/icheck/skins/futurico/futurico.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/icheck/skins/polaris/polaris.css">

    
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>

    <script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/select2/select2.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/bootstrap-tagsinput.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/typeahead.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/selectboxit/jquery.selectBoxIt.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/morris.min.js"></script>

    <script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/bootstrap-timepicker.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/bootstrap-colorpicker.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/moment.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/jquery.multi-select.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/icheck/icheck.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/neon-chat.js"></script>
    <!--<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/neon-charts.js"></script>-->
