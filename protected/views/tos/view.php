<?php
/* @var $this TosController */
/* @var $model TOS */

$this->breadcrumbs=array(
	'Toses'=>array('index'),
	$model->id,
);
?>
<div class="pull-right">	
	<?php
if(!empty(Yii::app()->session[$_COOKIE['PHPSESSID']])){
echo CHtml::link('<i class="entypo-left-bold" style="font-size: 30px"></i>',Yii::app()->session[$_COOKIE['PHPSESSID']]);
Yii::app()->session->remove($_COOKIE['PHPSESSID']);
}else{
echo CHtml::link('<i class="entypo-left-bold" style="font-size: 30px"></i>',$_SERVER['HTTP_REFERER']);
}
	?>
</div>
<br>
<br>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'kode',
		'tos',
	),
)); ?>
