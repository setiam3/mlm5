<div class="">
<div class=" panel-default">
    <div class="panel-heading">
        <div class="panel-title">Form Booking</div>
    </div>
</div>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'booking-form',
    //'action'=>Yii::app()->createUrl($model->isNewRecord?$this->id.'/create':$this->id.'/update/'.$model->id),
    'enableAjaxValidation'=>false,
)); ?>
        <?php echo $form->errorSummary($model); ?>
        <div class="col-sm-6">
        <div class="row">
            <div class="form-group">
                    <?php echo $form->labelEx($model,'tanggal_stuffing',array('class'=>'control-label col-sm-4')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model,'tanggal_stuffing',array(
                            'size'=>50,
                            'maxlength'=>50,
                            'class'=>'form-control datepicker',
                            'data-format'=>"dd-mm-yyyy",
                            'value'=>$model->isNewRecord ?date('d-m-Y'):$model->tanggal_stuffing)); ?>
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
                    <?php echo $form->labelEx($model,'POD',array('class'=>'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model,'POD',array('placeholder'=>'POD','size'=>50,'maxlength'=>50,'class'=>'form-control typeahead','data-remote'=>$this->createUrl('cari?q=%QUERY'))); ?>
                    </div>
            </div>
        </div>
        
        </div>
        <div class="col-sm-6">
        <div class="row">
            <div class="form-group">
                <?php echo $form->labelEx($model,'stuffing_stripping',array('class'=>'col-sm-4 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->dropDownList($model,'stuffing_stripping', array_combine(array_values(array('dalam','luar')),array('dalam','luar')),array('class'=>'selectboxit visible')); ?>
                        <?php echo $form->error($model,'tanggal_stuffing'); ?>
                    </div>
            </div>
        </div>
        <div class="row">
<div class="form-group">
    
    <?php $kontainers=Kontainer::model()->findAll(array('select'=>'size,type'))?>
        <div class="col-sm-3">
            <div class="qty">Qty</div>
            <input type="number" id="qty" class="form-control">
        </div>
        <div class="col-sm-3">
            <div class="size">Size</div>
            <select id="size" class="form-control"><?php foreach($kontainers as $size){
                echo "<option value=".$size->size.">".$size->size.'</option>';
                }?></select>
        </div>
        <div class="col-sm-3">
            <div class="type">Type</div>
            <select id="type" class="form-control"><?php 
            foreach ($kontainers as $type) {
                if(!empty($type->type)){
                echo '<option value="'.$type->type.'">'.$type->type.'</option>';
                }
            }
            ?></select>
        </div>
        <div class="col-sm-1"><br>
            <div class="add btn" id="add">add</div>
        </div>
        </div>
        </div>
        <div class="row">
        <table id="kontainer" class="form-group"><tr><td class="col-sm-3">--- Qty ---</td><td class="col-sm-3">--- Size --- </td><td class="col-sm-3">---  Type  ---</td></tr>
            
        </table>
        </div>
    
    </div>

        <div class="col-sm-12"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-blue')); ?></div>
    
    <?php $this->endWidget(); ?>
</div>
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

        $('#add').click(function(){
        var trRowId = Math.random().toString(36).substring(7);
        var tr = 'kontainer[' + trRowId + ']';

            $('#kontainer').append(
                '<tr id='+trRowId+' align="center"><td><input type="hidden" name='+tr+'[qty] value="'+$('#qty').val()+'">'+$('#qty').val()+'</td><td>'+
                '<input type="hidden" name='+tr+'[size] value="'+$('#size').val()+'">'+$('#size').val()+'</td><td>'+
                '<input type="hidden" name='+tr+'[type] value="'+$('#type').val()+'">'+$('#type').val()+'</td><td><a href="javascript:void(0)" class="btn btn-remove" rel='+trRowId+'>x</a></td></tr>');
            removeTr();
        })
        function removeTr(){
            $('.btn-remove').on('click', function(e){
                //alert('tes');
                e.preventDefault();
                var tr = $(this).attr('rel');
                $('#' + tr).remove();
            });
        }
        removeTr();
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