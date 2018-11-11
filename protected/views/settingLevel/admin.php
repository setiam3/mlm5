<?php
$this->breadcrumbs=array(
	'Setting Levels'=>array('index'),
	'Manage',
);
?>
<h1>Manage Setting Levels</h1>
<?php $colom=array(
				'level',
		'member',
		'keterangan',
);
$this->genTables($colom, 'SettingLevel',null,'datatable table-bordered');
?>