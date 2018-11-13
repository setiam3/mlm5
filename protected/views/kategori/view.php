<?php
$this->breadcrumbs=array(
	'Kategoris'=>array('index'),
	$model->id,
);

?>

<h1>View Kategori #<?php echo $model->id; ?></h1>

<?php $attributes=array(
				'id',
		'nama_kategori',
		'detail_kategori',
		'kode_kategori',
	);
$this->genListView($model,$attributes,$model->id);
?>