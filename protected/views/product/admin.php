<?php
$this->breadcrumbs=array(
	'Products'=>array('index'),
	'Manage',
);
?>
<h1>Manage Products</h1>
<?php $colom=array(
				'nama_produk',
		'kode_kategori',
		'harga',
		'desc',
		'image',
);
$this->genTables($colom, 'Product',null,'datatable table-bordered');
?>