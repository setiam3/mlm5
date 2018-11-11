<?php
$this->breadcrumbs=array(
	'Kategoris',
);
?>

<h1>Kategoris</h1>

<?php
$colom=array(
		'nama_kategori',
		'detail_kategori',
		'kode_kategori'
    );
$this->genTables($colom, 'Kategori',null,'datatable table-bordered');//format idtabel,colom,models
?>