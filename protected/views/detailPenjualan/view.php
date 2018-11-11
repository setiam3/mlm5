<?php
$this->breadcrumbs=array(
	'Detail Penjualans'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DetailPenjualan', 'url'=>array('index')),
	array('label'=>'Create DetailPenjualan', 'url'=>array('create')),
	array('label'=>'Update DetailPenjualan', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DetailPenjualan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DetailPenjualan', 'url'=>array('admin')),
);
?>

<h1>View DetailPenjualan #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'kode_penjualan',
		'kode_barang',
		'ukuran_barang',
		'jumlah_barang',
	),
)); ?>
