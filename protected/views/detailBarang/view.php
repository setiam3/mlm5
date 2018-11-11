<?php
$this->breadcrumbs=array(
	'Detail Barangs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DetailBarang', 'url'=>array('index')),
	array('label'=>'Create DetailBarang', 'url'=>array('create')),
	array('label'=>'Update DetailBarang', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DetailBarang', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DetailBarang', 'url'=>array('admin')),
);
?>

<h1>View DetailBarang #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'kode_barang',
		'ukuran_barang',
		'satuan',
		'harga',
	),
)); ?>
