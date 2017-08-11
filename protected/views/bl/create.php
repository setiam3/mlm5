<?php
$this->breadcrumbs=array(
	'Bill Of Lading'=>array('index'),
	'Create',
);
echo $this->renderPartial('_frm', array('model'=>$model));