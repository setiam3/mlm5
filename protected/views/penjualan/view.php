<?php
$this->breadcrumbs=array(
	'Penjualans'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Penjualan', 'url'=>array('index')),
	array('label'=>'Create Penjualan', 'url'=>array('create')),
	array('label'=>'Update Penjualan', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Penjualan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Penjualan', 'url'=>array('admin')),
);
?>

<h1>View Penjualan #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'kode_penjualan',
		'kode_pesan',
		'kode_member',
		'tanggal',
		'grandtotal',
	),
)); ?>
