<?php
$this->breadcrumbs=array(
	'Detail Penjualans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DetailPenjualan', 'url'=>array('index')),
	array('label'=>'Manage DetailPenjualan', 'url'=>array('admin')),
);
?>

<h1>Create DetailPenjualan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>