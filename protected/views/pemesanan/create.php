<?php
$this->breadcrumbs=array(
	'Pemesanans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pemesanan', 'url'=>array('index')),
	array('label'=>'Manage Pemesanan', 'url'=>array('admin')),
);
?>

<h1>Create Pemesanan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>