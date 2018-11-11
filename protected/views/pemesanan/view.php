<?php
$this->breadcrumbs=array(
	'Pemesanans'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Pemesanan', 'url'=>array('index')),
	array('label'=>'Create Pemesanan', 'url'=>array('create')),
	array('label'=>'Update Pemesanan', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Pemesanan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pemesanan', 'url'=>array('admin')),
);
?>

<h1>View Pemesanan #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'kode_pesan',
		'kode_member',
		'tanggal',
		'grand_total',
		'status',
	),
)); ?>
