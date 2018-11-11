<?php
$this->breadcrumbs=array(
	'Detail Pemesanans',
);

$this->menu=array(
	array('label'=>'Create DetailPemesanan', 'url'=>array('create')),
	array('label'=>'Manage DetailPemesanan', 'url'=>array('admin')),
);
?>

<h1>Detail Pemesanans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
