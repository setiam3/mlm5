<?php
$this->breadcrumbs=array(
	'Setting Perusahaans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

?>

<h1>Update SettingPerusahaan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>