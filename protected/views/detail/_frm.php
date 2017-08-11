<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detail-form','action'=>Yii::app()->createUrl($model->isNewRecord?$this->id.'/create':$this->id.'/update/'.$model->id),
	'enableAjaxValidation'=>false,
)); ?>
	<?php 
    echo $form->errorSummary($model); ?>
    <div class="row">
    <div class="form-group">
        <?php echo $form->labelEx($model,'resi_detail',array('class'=>'control-label col-sm-2')); ?>
        <div class="col-sm-4">
            <?php echo $model->isNewRecord ?
             $form->dropDownList($model,'resi_detail', 
                CHtml::listData(
                    //Order::model()->cache(1000)->findAll(array('select'=>'no_jo','condition'=>'status <>"Delivery Complete" or status is NULL'))
                    Order::model()->nojo(), 
                'no_jo', 'no_jo'),
                array('data-allow-clear'=>'true',
                    'prompt'=>'','data-placeholder'=>'JO',$model->isNewRecord ?'disable="true"':'',
                    'ajax'=>array(
                        'type'=>'POST',
                        'url'=>$this->createUrl('getposisi'),
                        'update'=>'#Detail_posisi',
                        'data'=>array('no_jo'=>'js:this.value'),
                        ),
                    'class'=>'select2 visible'))
:$model->resi_detail;
                     ?>
        </div>
        <div class="col-sm-2"><div id='customer'><?php echo $model->isNewRecord?'':$this->actionGetcustomer($model->resi_detail);?></div></div>
    </div>
    </div>
    <div class="row">
    <div class="form-group">
        <?php echo $form->labelEx($model,'date',array('class'=>'control-label col-sm-2')); ?>
        <div class="col-sm-4">
        <div class="date-and-time">
            <?php if($model->isNewRecord){
                $modeldate=date('d-m-Y');
                $modeltime='';
            }else{
                $modeldate=explode(' ',$model->date);
                $modeldate=$this->tanggal_indo($modeldate[0]);
                $modeltime=explode(' ',$model->date);
                $modeltime=$modeltime[1];
            }
             echo $form->textField($model,'date',array(
                'size'=>50,
                'maxlength'=>50,
                'class'=>'form-control datepicker',
                'data-format'=>"dd-mm-yyyy",
                'value'=>$modeldate)); ?>
                <input name="Detail[timepicker]" id="timepicker" class="form-control timepicker" data-template="dropdown" data-show-seconds="true"  data-show-meridian="false" data-minute-step="5" type="text" value="<?php echo $modeltime;?>">
        </div>
        </div>
    </div>
    </div>
    <div class="row">
    <div class="form-group">
        <?php echo $form->labelEx($model,'posisi',array('class'=>'control-label col-sm-2')); ?>
            <div class="col-sm-4">
                <?php 
                echo $model->isNewRecord? $form->dropDownList($model,'posisi',array(),array('data-allow-clear'=>'true',
                            'prompt'=>'','data-placeholder'=>'posisi',
                            'class'=>'select2 visible')):
                $form->dropDownList($model,'posisi', 
                        CHtml::listData(Posisi::model()->findAll('jenis=:jenis', 
        array(':jenis'=>Order::model()->find('no_jo="'.$model->resi_detail.'"')->stuffing)),'posisi','posisi' ),
                        array('data-allow-clear'=>'true',
                            'prompt'=>'','data-placeholder'=>'posisi',
                            'class'=>'select2 visible')); 
                            ?>
            </div>
    </div>
    </div>
    <div class="row">
    <div class="form-group">
        <?php echo $form->labelEx($model,'keterangan',array('class'=>'control-label col-sm-2')); ?>
        <div class="col-sm-4">
        <?php echo $form->textField($model,'keterangan',array('placeholder'=>'keterangan','size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
        </div>
    </div>
    </div>

	
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-blue')); ?>
        
<?php $this->endWidget(); ?>

<script type="text/javascript">
jQuery(function($){
    $('#Detail_resi_detail').change(function(){
        $.ajax({
                type:'post',
                url:'<?php echo $this->createUrl('getcustomer')?>',
                data:{q:$("#Detail_resi_detail").val()},
                success:function(response){
                    $("#customer").html(response);
                }
            });
    });
    });
</script>
<!-- Imported styles on this page -->
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/select2/select2.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/selectboxit/jquery.selectBoxIt.css">
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
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/moment.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/jquery.multi-select.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/icheck/icheck.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/neon-chat.js"></script>