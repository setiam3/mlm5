<?php
$this->breadcrumbs=array(
	'Setting Perusahaans'=>array('index'),
	'Manage',
);
?>
<h1>Setting Perusahaan</h1>
<?php $colom=array(
		'nama_perusahaan',
		'alamat',
		'telp',
		'email',
		'logo',
);
$this->genTables($colom, 'SettingPerusahaan',null,'datatable table-bordered');
?>