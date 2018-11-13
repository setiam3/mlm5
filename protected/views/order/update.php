<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

?>

<h1>Update Order <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'detail'=>$detail)); ?>