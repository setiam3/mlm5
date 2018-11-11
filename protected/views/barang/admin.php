<?php
$this->breadcrumbs=array(
	'Barangs'=>array('index'),
	'Manage',
);
?>

<h1>Manage Barangs</h1>
<?php
$colom=array(
		'kode_barang',
		'nama_barang',
		'detail_barang'
    );
$this->genTables($colom, 'Barang',null,'datatable table-bordered');//format idtabel,colom,models
?>