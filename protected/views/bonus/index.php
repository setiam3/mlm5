<?php
$this->breadcrumbs=array(
	'Bonus',
);
?>

<h1>Bonus</h1>
<?php
$colom=array(
		'kode_member',
		'tanggal',
		'bonus',
		'keterangan',
		'poin',
		'dari_member',
		'idbonus',
    );
$this->genTables($colom, 'Bonus',null,'datatable table-bordered');//format idtabel,colom,models
?>