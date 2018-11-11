<?php
$this->breadcrumbs=array(
	'Setting Levels'=>array('index'),
	'Create',
);
/*
$this->menu=array(
	array('label'=>'List SettingLevel', 'url'=>array('index')),
	array('label'=>'Manage SettingLevel', 'url'=>array('admin')),
);*/
?>

<h1>Create SettingLevel</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>