<?php
$this->breadcrumbs=array(
	'Bonuses'=>array('index'),
	'Manage',
);
$colom=array(
		'kode_member',
		'tanggal',
		'bonus',
		'keterangan',
		'dari_member',
    );
$this->genTables($colom, 'Bonus',null,'datatable table-bordered');//format idtabel,colom,models
?>
