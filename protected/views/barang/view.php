<?php
$this->breadcrumbs=array(
	'Barangs'=>array('index'),
	$model->id,
);

?>

<h1>View Barang #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'kode_barang',
		'nama_barang',
		'detail_barang',
		'kode_kategori',
	),
)); ?>
