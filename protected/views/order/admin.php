<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	'Manage',
);
?>
<h1>Manage Orders</h1>
<?php $colom=array(
				'order_code',
		'order_date',
		'kode_member',
		'bank_transfer',
		'payment_status',
);
$this->genTables($colom, 'Order',null,'datatable table-bordered');
?>