<?php
/* @var $this KapalController */
/* @var $model Kapal */

$this->breadcrumbs=array(
	'Kapal'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);?><div class="pull-right">	
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
<?php
 $this->renderPartial('_form', array('model'=>$model)); ?>