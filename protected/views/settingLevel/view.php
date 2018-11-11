<?php
$this->breadcrumbs=array(
	'Setting Levels'=>array('index'),
	$model->id,
);

?>

<h1>View SettingLevel #<?php echo $model->id; ?></h1>

<?php $attributes=array(
				'id',
		'level',
		'member',
		'keterangan',
	);
$this->genListView($model,$attributes,$model->id);
?>