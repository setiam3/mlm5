<?php
$this->breadcrumbs=array(
	'Penjualans',
);

$this->menu=array(
	array('label'=>'Create Penjualan', 'url'=>array('create')),
	array('label'=>'Manage Penjualan', 'url'=>array('admin')),
);
?>

<h1>Penjualans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
