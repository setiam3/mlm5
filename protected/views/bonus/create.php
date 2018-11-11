<?php
$this->breadcrumbs=array(
	'Bonuses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Bonus', 'url'=>array('index')),
	array('label'=>'Manage Bonus', 'url'=>array('admin')),
);
?>

<h1>Create Bonus</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>