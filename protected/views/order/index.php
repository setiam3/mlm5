<?php
$this->breadcrumbs=array(
	'Orders',
);

?>

<h1>Orders</h1>
<?php $colom=array(
				'order_code',
		'order_date',
		'kode_member',
		'bank_transfer',
		'payment_status',
		'grandtotal',
);
$this->genTables($colom, 'Order',null,'datatable table-bordered');
?>