<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->no_jo=>array('view','id'=>$model->id),
	'Update',
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
<div class="panel panel-primary"> 
    <div class="panel-heading">
            <div class="panel-title">Form Job Order</div>
    </div>
    <div class="panel-body">
<?php $this->renderPartial('_frm', array('model'=>$model)); ?>
</div></div>