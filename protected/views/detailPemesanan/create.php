<?php
$this->breadcrumbs=array(
	'Detail Pemesanans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DetailPemesanan', 'url'=>array('index')),
	array('label'=>'Manage DetailPemesanan', 'url'=>array('admin')),
);
?>

<h1>Create DetailPemesanan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>