<?php
$this->breadcrumbs=array(
	'Detail Barangs',
);

$this->menu=array(
	array('label'=>'Create DetailBarang', 'url'=>array('create')),
	array('label'=>'Manage DetailBarang', 'url'=>array('admin')),
);
?>

<h1>Detail Barangs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
