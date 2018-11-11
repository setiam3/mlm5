<?php
$this->breadcrumbs=array(
	'Bonuses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Bonus', 'url'=>array('index')),
	array('label'=>'Create Bonus', 'url'=>array('create')),
	array('label'=>'View Bonus', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Bonus', 'url'=>array('admin')),
);
?>

<h1>Update Bonus <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>