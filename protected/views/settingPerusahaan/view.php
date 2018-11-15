<?php
$this->breadcrumbs=array(
	'Setting Perusahaans'=>array('index'),
	$model->id,
);

?>

<h1>View SettingPerusahaan</h1>

<?php $attributes=array(
		'nama_perusahaan',
		'alamat',
		'telp',
		'email',
		'logo',
	);
$this->genListView($model,$attributes,$model->id);
?>
<?php echo CHtml::image($this->imagesUrl().$model->logo);?>