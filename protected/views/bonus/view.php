<?php
$this->breadcrumbs=array(
	'Bonuses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Bonus', 'url'=>array('index')),
	array('label'=>'Create Bonus', 'url'=>array('create')),
	array('label'=>'Update Bonus', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Bonus', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Bonus', 'url'=>array('admin')),
);
?>

<h1>View Bonus #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'kode_member',
		'tanggal',
		'bonus',
		'poin',
		'bonus_diambil',
		'tanggal_ambil',
	),
)); ?>
