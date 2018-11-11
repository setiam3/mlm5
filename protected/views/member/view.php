<?php
$this->breadcrumbs=array(
	'Members'=>array('index'),
	$model->id,
);

?>

<h1>View Member #<?php echo $model->id; ?></h1>

<?php $attributes=array(
				'id',
		'kode_member',
		'userid',
		'password',
		'nama',
		'alamat',
		'kota',
		'hp',
		'bank',
		'nomor_rekening',
		'ktp',
		'email',
		'kode_upline',
		'tanggal_daftar',
		'level',
		'poin',
		'sponsor',
	);
$this->genListView($model,$attributes,$model->id);
?>