<?php
$this->breadcrumbs=array(
	'Barangs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Barang', 'url'=>array('index')),
	array('label'=>'Create Barang', 'url'=>array('create')),
	array('label'=>'View Barang', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Barang', 'url'=>array('admin')),
);
?>

<h1>Update Barang <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>