
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'order-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

<div class="row">
	<div class="form-group">
		<div class="col-sm-2">
			<?php echo $form->labelEx($model,'kode_member'); ?>
		</div>
        <div class="col-sm-6">
        <?php echo UserModule::isAdmin()?$form->dropDownList($model,'kode_member',Controller::get_member(),array('data-allow-clear'=>'true','prompt'=>'','data-placeholder'=>'pilih Upline','class'=>'select2 visible',
        		
                )):Yii::app()->user->kode_member; ?>
			<?php echo $form->error($model,'kode_member'); ?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12"><h2></h2></div>
	<div class="col-sm-12">
		<div class="row">
			<div class="form-group">
				<div class="col-sm-2">Nama Barang</div>
				<div class="col-sm-4">
        <?php echo $form->dropDownList($detail,'id',Controller::get_produk(),array('data-allow-clear'=>'true','prompt'=>'','data-placeholder'=>'pilih produk','class'=>'select2 visible',
        	
                    )
        ); ?>
			<?php echo $form->error($model,'kode_member'); ?>
		</div>
			
				<div class="col-sm-2">
					<?php echo CHtml::ajaxLink(
					'Add',
					array('product/addtocart/'),
					array('type'=>'post','data'=>array('id'=>'js:$(this).val()')),
					array('id'=>'link1')
					);?>
				</div>
			</div>
		</div>
	
	</div>
</div>

	<!-- <div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div> -->
<?php $this->endWidget(); ?>
</div><!-- form -->
<script type="text/javascript">
jQuery(function($){

	$('#Orderdetail_id').change(function(){
		//alert(jQuery(this).parents($(this).val()).serialize());
		$('#link1').attr('value',$(this).val());
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