<?php
//echo $this->renderPartial('_form', array('model'=>$model));?>
<div class="row">
	<div class="form-group">
		<div class="control-label col-sm-2">jo</div>
		<div class="col-sm-3">
			<select class="select2 visible" id='nojo'><?php foreach(CHtml::listData(Order::model()->nojo(),'no_jo', 'no_jo') as $val){
echo "<option value='$val'>".$val.'</option>';
			}?></select>
		</div>
		<div class="col-sm-2"><?php echo CHtml::button('preview',array('class'=>'btn btn-blue','id'=>'preview'))?></div>
	</div>
</div>
<div class="row">
<div id='result'></div>
</div>
<script type="text/javascript">
	jQuery(function($){
		$("#preview").click(function(){
			$.ajax({
                type:'get',
                url:'<?php echo $this->createUrl('create')?>',
                data:{q:$("#nojo").val()},
                success:function(response){
                    $("#result").html(response);
                }
            });
		});
	});
</script>
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