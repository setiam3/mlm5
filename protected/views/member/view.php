<?php
$this->breadcrumbs=array(
	'Members'=>array('index'),
	$model->id,
);

?>

<h1>View Member #<?php echo $model->id; ?></h1>

<?php $attributes=array(
				
		'kode_member',
		'username',
		'password',
		'nama',
		'alamat',
		'hp',
		'bank',
		'rekening',
		'nik',
		'email',
		'kode_upline',
		'level',
		'sponsor',
	);
$this->genListView($model,$attributes,$model->id);
?>