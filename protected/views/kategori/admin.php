<?php
$this->breadcrumbs=array(
	'Kategoris'=>array('index'),
	'Manage',
);
?>
<h1>Manage Kategoris</h1>
<?php $colom=array(
				'nama_kategori',
		'detail_kategori',
		'kode_kategori',
);
$this->genTables($colom, 'Kategori',null,'datatable table-bordered');
?>