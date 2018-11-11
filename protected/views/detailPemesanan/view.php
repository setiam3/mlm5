<?php
$this->breadcrumbs=array(
	'Detail Pemesanans'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DetailPemesanan', 'url'=>array('index')),
	array('label'=>'Create DetailPemesanan', 'url'=>array('create')),
	array('label'=>'Update DetailPemesanan', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DetailPemesanan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DetailPemesanan', 'url'=>array('admin')),
);
?>

<h1>View DetailPemesanan #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'kode_pesan',
		'kode_barang',
		'ukuran_barang',
		'jumlah_barang',
		'detail_pemesanancol',
		'status_detail',
	),
)); ?>
