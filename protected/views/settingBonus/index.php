<?php
$this->breadcrumbs=array(
	'Setting Bonuses',
);

?>

<h1>Setting Bonuses</h1>
<?php $colom=array(
				'jenis_bonus',
		'bonus',
		'param',
		'keterangan',
);
$this->genTables($colom, 'SettingBonus',null,'datatable table-bordered');
?>