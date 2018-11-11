<?php
$this->breadcrumbs=array(
	'Barangs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Barang', 'url'=>array('index')),
	array('label'=>'Manage Barang', 'url'=>array('admin')),
);
?>

<h1>Create Barang</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>