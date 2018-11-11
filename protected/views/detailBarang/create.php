<?php
$this->breadcrumbs=array(
	'Detail Barangs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DetailBarang', 'url'=>array('index')),
	array('label'=>'Manage DetailBarang', 'url'=>array('admin')),
);
?>

<h1>Create DetailBarang</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>