<?php
$this->breadcrumbs=array(
	'Setting Perusahaans'=>array('index'),
	$model->id,
);

?>

<h1>View SettingPerusahaan #<?php echo $model->id; ?></h1>

<?php $attributes=array(
				'id',
		'nama_perusahaan',
		'alamat',
		'telp',
		'email',
		'logo',
	);
$this->genListView($model,$attributes,$model->id);
?>