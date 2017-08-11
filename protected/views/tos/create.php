<?php
/* @var $this TosController */
/* @var $model TOS */

$this->breadcrumbs=array(
	'Tos'=>array('index'),
	'Create',
);?>

<br><?php
 $this->renderPartial('_form', array('model'=>$model)); ?>