

<div class="panel panel-primary"> 
    <div class="panel-heading">
            <div class="panel-title">Form Users</div>
    </div>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'order-form',
	'enableAjaxValidation'=>false,
)); ?>
<?php //echo CHtml::beginForm('','post',array('enctype'=>'multipart/form-data')); ?>
<div class="panel-body">
	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

	<?php echo $form->errorSummary(array($model,$profile)); ?>

	<div class="row">
            <div class="form-group">
                <label for="User[username]" class="col-sm-2 control-label"><?php echo $form->label($model,'username'); ?></label>
                    <div class="col-sm-6">
                        <?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20,'class'=>'form-control')); ?>
                        <?php echo $form->error($model,'username'); ?>
                    </div>
            </div>
	</div>
	<div class="row">
            <div class="form-group">
                <label for="User[password]" class="col-sm-2 control-label"><?php echo $form->label($model,'password'); ?></label>
                    <div class="col-sm-6">
                        <?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128,'class'=>'form-control')); ?>
                        <?php echo $form->error($model,'password'); ?>
                    </div>
                </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="User[email]" class="col-sm-2 control-label">
                    <?php echo $form->label($model,'email'); ?></label>
                    <div class="col-sm-6">
                        <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128,'class'=>'form-control')); ?>
                        <?php echo $form->error($model,'email'); ?>
                    </div>
                </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="User[level]" class="col-sm-2 control-label">
                    <?php echo $form->label($model,'level'); ?></label>
                    <div class="col-sm-6">
                        <?php echo $form->dropDownList($model,'level',User::itemLevel()) ?>
                        <?php echo $form->error($model,'level'); ?>
                    </div>
                </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="User[superuser]" class="col-sm-2 control-label">
                    <?php echo $form->label($model,'superuser'); ?></label>
                    <div class="col-sm-6">
                        <?php echo $form->dropDownList($model,'superuser',User::itemAlias('AdminStatus')); ?>
                        <?php echo $form->error($model,'superuser'); ?>
                    </div>
                </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="User[status]" class="col-sm-2 control-label">
                    <?php echo $form->label($model,'status'); ?></label>
                    <div class="col-sm-6">
                        <?php echo $form->dropDownList($model,'status',User::itemAlias('UserStatus')); ?>
                        <?php echo $form->error($model,'status'); ?>
                    </div>
                </div>
        </div>
<?php 
		$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
	<div class="row">
            <div class="form-group">
                <label for="User[<?php echo $field->varname;?>]" class="col-sm-2 control-label">
		<?php echo $form->label($profile,$field->varname); ?>
                </label>
                <div class="col-sm-6">
		<?php //{"ui-theme":"redmond"} UWjuidate
		if ($field->widgetEdit($profile)) {
			echo $field->widgetEdit($profile);
		} elseif ($field->range) {
			echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
		} elseif ($field->field_type=="TEXT") {

			echo $form->textArea($profile,$field->varname,array('rows'=>6, 'cols'=>50,'class'=>'form-control'));
		} else {
			echo $form->textField($profile,$field->varname,array('size'=>60,'data-format'=>$field->field_type==='DATE'?"yyyy-mm-dd":NULL,'class'=>$field->field_type==='DATE'?'datepicker form-control':'form-control','maxlength'=>(($field->field_size)?$field->field_size:255)));
		}
		 ?>
                </div>
		<?php echo $form->error($profile,$field->varname); ?>
	</div>	
	</div>	
			<?php
			}
		}
?>
</div>
    <div class="panel-footer">
	<div class="row">
            <div class="form-group">
                <div class="col-sm-6">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-blue')); ?>
	</div>
	</div>
	</div>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
<!--<script type="text/javascript">
    jQuery(function($){
        //alert('tes');
        $('#order-form').ready(function(){
            var baseUrl="<?php echo Yii::app()->getBaseUrl(true)?>";
        $('#Profile_firstname').addClass('typeahead');
        $('#Profile_firstname').attr('data-remote',baseUrl+'/member/cari?act=customer&q=%QUERY');
        })
        
    });
</script>-->
<!-- Imported styles on this page -->
    <link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl;?>/assets/js/datatables/datatables.css">
	<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl;?>/assets/js/select2/select2-bootstrap.css">
	<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl;?>/assets/js/select2/select2.css">
	
	<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl;?>/assets/js/daterangepicker/daterangepicker-bs3.css">
	<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl;?>/assets/js/icheck/skins/minimal/_all.css">
	<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl;?>/assets/js/icheck/skins/square/_all.css">
	<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl;?>/assets/js/icheck/skins/flat/_all.css">
	<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl;?>/assets/js/icheck/skins/futurico/futurico.css">
	<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl;?>/assets/js/icheck/skins/polaris/polaris.css">

	<!-- Bottom scripts (common) -->
	<script src="<?=Yii::app()->theme->baseUrl;?>/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	
	<!-- Imported scripts on this page -->
        
	<script src="<?=Yii::app()->theme->baseUrl;?>/assets/js/select2/select2.min.js"></script>
	<script src="<?=Yii::app()->theme->baseUrl;?>/assets/js/bootstrap-tagsinput.min.js"></script>
	<script src="<?=Yii::app()->theme->baseUrl;?>/assets/js/typeahead.min.js"></script>
        <script src="<?=Yii::app()->theme->baseUrl;?>/assets/js/datatables/datatables.js"></script>
	
	<script src="<?=Yii::app()->theme->baseUrl;?>/assets/js/bootstrap-datepicker.js"></script>
	<script src="<?=Yii::app()->theme->baseUrl;?>/assets/js/bootstrap-timepicker.min.js"></script>
	<script src="<?=Yii::app()->theme->baseUrl;?>/assets/js/bootstrap-colorpicker.min.js"></script>
	<script src="<?=Yii::app()->theme->baseUrl;?>/assets/js/moment.min.js"></script>
	<script src="<?=Yii::app()->theme->baseUrl;?>/assets/js/daterangepicker/daterangepicker.js"></script>
	<script src="<?=Yii::app()->theme->baseUrl;?>/assets/js/jquery.multi-select.js"></script>
	<script src="<?=Yii::app()->theme->baseUrl;?>/assets/js/icheck/icheck.min.js"></script>
	<script src="<?=Yii::app()->theme->baseUrl;?>/assets/js/neon-chat.js"></script>