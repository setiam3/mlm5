<?php
$this->breadcrumbs=array(
	'Setting Bonuses'=>array('index'),
	'Manage',
);
?>
<h1>Manage Setting Bonuses</h1>
<?php $colom=array(
				'jenis_bonus',
		'bonus',
		'param',
		'keterangan',
);
$this->genTables($colom, 'SettingBonus',null,'datatable table-bordered');
?>