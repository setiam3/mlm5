<?php
$this->breadcrumbs=array(
	'Pemesanans',
);

$this->menu=array(
	array('label'=>'Create Pemesanan', 'url'=>array('create')),
	array('label'=>'Manage Pemesanan', 'url'=>array('admin')),
);
?>

<h1>Pemesanans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
