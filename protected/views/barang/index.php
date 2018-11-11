<?php
$this->breadcrumbs=array(
	'Barangs',
);

?>

<h1>Barang</h1>
<?php
$colom=array(
		'kode_barang',
		'nama_barang',
		'detail_barang'
    );
$this->genTables($colom, 'Barang',null,'datatable table-bordered');//format idtabel,colom,models
?>