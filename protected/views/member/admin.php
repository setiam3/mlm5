<?php
$this->breadcrumbs=array(
	'Members'=>array('index'),
	'Manage',
);
?>
<h1>Manage Members</h1>
<?php $colom=array(
				'kode_member',
		'userid',
		'password',
		'nama',
		'alamat',
		/*
		'kota',
		'hp',
		'bank',
		'nomor_rekening',
		'ktp',
		'email',
		'kode_upline',
		'tanggal_daftar',
		'level',
		'poin',
		'sponsor',
		*/
);
$this->genTables($colom, 'Member',null,'datatable table-bordered');
?>