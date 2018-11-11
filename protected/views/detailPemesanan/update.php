<?php
$this->breadcrumbs=array(
	'Detail Pemesanans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DetailPemesanan', 'url'=>array('index')),
	array('label'=>'Create DetailPemesanan', 'url'=>array('create')),
	array('label'=>'View DetailPemesanan', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DetailPemesanan', 'url'=>array('admin')),
);
?>

<h1>Update DetailPemesanan <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>