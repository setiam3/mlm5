<?php
$this->breadcrumbs=array(
	'Pemesanans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pemesanan', 'url'=>array('index')),
	array('label'=>'Create Pemesanan', 'url'=>array('create')),
	array('label'=>'View Pemesanan', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Pemesanan', 'url'=>array('admin')),
);
?>

<h1>Update Pemesanan <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>