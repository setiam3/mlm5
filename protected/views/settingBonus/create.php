<?php
$this->breadcrumbs=array(
	'Setting Bonuses'=>array('index'),
	'Create',
);
/*
$this->menu=array(
	array('label'=>'List SettingBonus', 'url'=>array('index')),
	array('label'=>'Manage SettingBonus', 'url'=>array('admin')),
);*/
?>

<h1>Create SettingBonus</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>