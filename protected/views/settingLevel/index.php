<?php
$this->breadcrumbs=array(
	'Setting Levels',
);

?>

<h1>Setting Levels</h1>
<?php $colom=array(
				'level',
		'member',
		'keterangan',
);
$this->genTables($colom, 'SettingLevel',null,'datatable table-bordered');
?>