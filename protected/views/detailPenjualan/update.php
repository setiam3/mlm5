<?php
$this->breadcrumbs=array(
	'Detail Penjualans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DetailPenjualan', 'url'=>array('index')),
	array('label'=>'Create DetailPenjualan', 'url'=>array('create')),
	array('label'=>'View DetailPenjualan', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DetailPenjualan', 'url'=>array('admin')),
);
?>

<h1>Update DetailPenjualan <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>