<?php
$this->breadcrumbs=array(
	'Penjualans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Penjualan', 'url'=>array('index')),
	array('label'=>'Create Penjualan', 'url'=>array('create')),
	array('label'=>'View Penjualan', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Penjualan', 'url'=>array('admin')),
);
?>

<h1>Update Penjualan <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>