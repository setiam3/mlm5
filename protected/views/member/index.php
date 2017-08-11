<?php
/* @var $this MemberController */

$this->breadcrumbs=array(
	'Member',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<?php //$colom=array('no_jo',);
//$this->genTables($colom, 'Order', array('attributes'=>array('customer'=>Yii::app()->user->name),'condition'=>array('order'=>'id Desc')), 'datatable table-hover');
//$datae= Order::model()->findAllByAttributes(array('customer'=>Yii::app()->user->name));
//print_r($datae);
//echo Yii::app()->user->getState('level');
$widget->run();
?>