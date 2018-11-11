<?php
$this->breadcrumbs=array(
	'Setting Bonuses'=>array('index'),
	$model->id,
);

?>

<h1>View SettingBonus #<?php echo $model->id; ?></h1>

<?php $attributes=array(
				'id',
		'jenis_bonus',
		'bonus',
		'param',
		'keterangan',
	);
$this->genListView($model,$attributes,$model->id);
?>