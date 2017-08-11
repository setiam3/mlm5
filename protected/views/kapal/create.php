<?php
/* @var $this KapalController */
/* @var $model Kapal */

$this->breadcrumbs=array(
	'Kapal'=>array('index'),
	'Create',
);?>
<br>
<?php 
$this->renderPartial('_form', array('model'=>$model)); ?>