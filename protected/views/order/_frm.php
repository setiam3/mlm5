<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'order-form',
    'action'=>Yii::app()->createUrl($model->isNewRecord?$this->id.'/create':$this->id.'/update/'.$model->id),
	'enableAjaxValidation'=>false,
)); ?>
        <?php echo $form->errorSummary($model); ?>
        <div class="row">
        <div class="col-sm-4">
        <div class="row">
            <div class="form-group">
                    <?php echo $form->labelEx($model,'no_jo',array('class'=>'control-label col-sm-4')); ?>
                    <div class="col-sm-8">
<?php echo $form->textField($model,'no_jo',array('placeholder'=>'nomor Job Order','size'=>50,'maxlength'=>50,'class'=>'form-control',$model->isNewRecord?'':'disabled'=>true)); ?>
                    </div>
            </div>
            <div class="form-group">
                    <?php echo $form->labelEx($model,'tanggal_jo',array('class'=>'control-label col-sm-4')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model,'tanggal_jo',array(
                            'size'=>50,
                            'maxlength'=>50,
                            'class'=>'form-control datepicker',
                            'data-format'=>"dd-mm-yyyy",
                            'value'=>$model->isNewRecord ?date('d-m-Y'):$model->tanggal_jo)); ?>
                    </div>
            </div>
        </div>
        
        <div class="row">
            <div class="form-group">
        <?php echo $form->labelEx($model,'service',array('class'=>'control-label col-sm-4')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->dropDownList($model,'service', 
                                CHtml::listData(TOS::model()->findAll(),
                                        'tos','tos' ),
                                array('data-allow-clear'=>'true',
                                    'prompt'=>'','data-placeholder'=>'Term Of Shipment',
                                    'class'=>'select2 visible')); ?>
                    </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                    <?php echo $form->labelEx($model,'POL',array('class'=>'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model,'POL',array('placeholder'=>'POL','size'=>50,'maxlength'=>50,'class'=>'form-control typeahead','data-remote'=>$this->createUrl('cari?act=tes&q=%QUERY'))); ?>
                    </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                    <?php echo $form->labelEx($model,'tujuan',array('class'=>'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model,'tujuan',array('placeholder'=>'POD','size'=>50,'maxlength'=>50,'class'=>'form-control typeahead','data-remote'=>$this->createUrl('cari?q=%QUERY'))); ?>
                    </div>
            </div>
        </div>
        
        </div>
        <div class="col-sm-4">
        <div class="row">
            <div class="form-group">
                <?php echo $form->labelEx($model,'pengirim',array('class'=>'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model,'pengirim',array('placeholder'=>'Pengirim','size'=>50,'maxlength'=>50,'class'=>'form-control typeahead','data-remote'=>$this->createUrl('cari?act=customer&q=%QUERY'))); ?>
                    </div>
            </div>
        </div>
	<div class="row">
            <div class="form-group">
                <?php echo $form->labelEx($model,'telp_pengirim',array('class'=>'col-sm-4 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->textField($model,'telp_pengirim',array('placeholder'=>'Telp Pengirim','size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
                </div>
            </div>
        </div>
    <!--    
	<div class="row">
            <div class="form-group">
                <?php echo $form->labelEx($model,'penerima',array('class'=>'col-sm-4 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->textField($model,'penerima',array('placeholder'=>'Penerima','size'=>50,'maxlength'=>50,'class'=>'form-control typeahead','data-remote'=>$this->createUrl('cari?act=customer&q=%QUERY'))); ?>
                </div>
            </div>
        </div>
	<div class="row">
            <div class="form-group">
                <?php echo $form->labelEx($model,'telp_penerima',array('class'=>'col-sm-4 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->textField($model,'telp_penerima',array('placeholder'=>'Telp Penerima','size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
                </div>
            </div>
        </div>-->
        <div class="row">
            <div class="form-group">
                <?php echo $form->labelEx($model,'stuffing',array('class'=>'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->dropDownList($model,'stuffing', array_combine(array_values(array('dalam','luar')),array('dalam','luar')),array('class'=>'selectboxit visible')); ?>
                        <?php echo $form->error($model,'tanggal_stuffing'); ?>
                    </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <?php echo $form->labelEx($model,'agen',array('class'=>'col-sm-4 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->dropDownList($model,'agen', CHtml::listData(User::model()->cache('1000')->findAllByAttributes(array('level'=>'agen','status'=>1)), 'username','username' ),
                            array('data-allow-clear'=>'true','prompt'=>'','data-placeholder'=>'Pilih Agen','class'=>'select2 visible')); ?>
                        <?php echo $form->error($model,'agen'); ?>
                </div>
            </div>
    </div>
    <div class="row">
            <div class="form-group">
                <?php echo $form->labelEx($model,'operator',array('class'=>'col-sm-4 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->dropDownList($model,'operator', CHtml::listData(User::model()->cache('1000')->findAllByAttributes(array('level'=>'operasional','status'=>1)), 'username','username' ),
                            array('data-allow-clear'=>'true','prompt'=>'','data-placeholder'=>'Pilih Operator','class'=>'select2 visible')); ?>
                        <?php echo $form->error($model,'operator'); ?>
                </div>
            </div>
    </div>
</div>
        <div class="col-sm-4">
    <div class="row">
        <div class="form-group">
    <?php echo $form->labelEx($model,'kapal',array('class'=>'control-label col-sm-4')); ?>
            <div class="col-sm-8">
                <?php echo $form->dropDownList($model,'kapal', 
                    CHtml::listData(Kapal::model()->cache('1000')->findAll(), 'nama_kapal','nama_kapal' ),
                    array('data-allow-clear'=>'true','prompt'=>'','data-placeholder'=>'Pilih Kapal','class'=>'select2 visible')); ?>
            </div>
        </div>
    </div>
	<div class="row">
            <div class="form-group">
                <?php echo $form->labelEx($model,'voyage',array('class'=>'control-label col-sm-4')); ?>
                <div class="col-sm-8">
                    <?php echo $form->textField($model,'voyage',array(
                        'placeholder'=>'Voyage',
                        'size'=>50,
                        'maxlength'=>50,
                        'class'=>'form-control ',
                        )); ?>
                </div>
            </div>
	</div>
            
	<div class="row">
            <div class="form-group">
                <?php echo $form->labelEx($model,'ETD',array('class'=>'col-sm-4 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->textField($model,'ETD',array(
                        'size'=>50,'maxlength'=>50,
                         'data-format'=>"dd-mm-yyyy",
                        'placeholder'=>'dd-mm-yyyy',
                        'class'=>'form-control datepicker')); ?>
                    <?php echo $form->error($model,'ETD'); ?>
                </div>
            </div>
	</div>
	<div class="row">
            <div class="form-group">
            <?php echo $form->labelEx($model,'ETA',array('class'=>'col-sm-4 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->textField($model,'ETA',array(
                        'size'=>50,'maxlength'=>50,
                        'data-format'=>"dd-mm-yyyy",
                        'placeholder'=>'dd-mm-yyyy',
                        'class'=>'form-control datepicker')); ?>
                    <?php echo $form->error($model,'ETA'); ?>
                </div>
            </div>
	</div>
            <div class="row">
            <div class="form-group">
        <?php echo $form->labelEx($model,'customer',array('class'=>'control-label col-sm-4')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->dropDownList($model,'customer',
                                        //CHtml::listData(User::model()->cache('1000')->findAllByAttributes(array('level'=>'customer','status'=>1)),
CHtml::listData(Customer::model()->findAll(),'nama','nama' ),
                                array('data-allow-clear'=>'true',
                                    'prompt'=>'','data-placeholder'=>'Pilih Customer',
                                    'class'=>'select2 visible')); ?>
                        <?php echo $form->error($model,'customer'); ?>
                    </div>
            </div>
        </div>
	</div>
	</div>

        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-blue')); ?>
    
    <?php $this->endWidget(); ?>

<script type="text/javascript">
    jQuery(function($){
        $("#Order_telp_pengirim").click(function(){
            $.ajax({
                type:'get',
                url:'<?php echo $this->createUrl('cari')?>',
                data:{act:'telp',q:$("#Order_pengirim").val()},
                success:function(response){
                    $("#Order_telp_pengirim").val(response);
                }
            });
        });
        $("#Order_telp_penerima").click(function(){
            $.ajax({
                type:'get',
                url:'<?php echo $this->createUrl('cari')?>',
                data:{act:'telp',q:$("#Order_penerima").val()},
                success:function(response){
                    $("#Order_telp_penerima").val(response);
                }
            });
        });
    });    
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

    <!-- Bottom scripts (common) -->
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>

    <!-- Imported scripts on this page -->

    <script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/select2/select2.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/bootstrap-tagsinput.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/typeahead.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/selectboxit/jquery.selectBoxIt.min.js"></script>

    <script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/bootstrap-timepicker.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/bootstrap-colorpicker.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/moment.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/jquery.multi-select.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/icheck/icheck.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/neon-chat.js"></script>