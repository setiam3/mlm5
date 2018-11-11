<?php
$this->breadcrumbs=array(
	'Setting Perusahaans'=>array('index'),
	'Create',
);
/*
$this->menu=array(
	array('label'=>'List SettingPerusahaan', 'url'=>array('index')),
	array('label'=>'Manage SettingPerusahaan', 'url'=>array('admin')),
);*/
?>

<h1>Create SettingPerusahaan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>