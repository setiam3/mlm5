<?php
$this->breadcrumbs=array(
	'Detail Barangs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DetailBarang', 'url'=>array('index')),
	array('label'=>'Create DetailBarang', 'url'=>array('create')),
	array('label'=>'View DetailBarang', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DetailBarang', 'url'=>array('admin')),
);
?>

<h1>Update DetailBarang <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>