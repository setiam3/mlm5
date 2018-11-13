<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->id,
);

?>

<h1>View Order #<?php echo $model->id; ?></h1>

<?php $attributes=array(
				'id',
		'order_code',
		'order_date',
		'kode_member',
		'bank_transfer',
		'payment_status',
	);
$this->genListView($model,$attributes,$model->id);

$detail=Orderdetail::model()->findAll('order_id='.$model->id);


?>
<table>
	<tr>
		<td>order code</td>
		<td>produk</td>
		<td>qty</td>
		<td>subtotal</td>
	</tr><?php $total=0;
foreach ($detail as $value) {
	echo '<tr><td>';
	echo $value->order_code."</td><td>";
	echo $value->product_id."</td><td>";
	echo $value->qty."</td><td>";
	echo $value->subtotal."</td><td>";
	echo "</tr>";
}
$total+=$value->subtotal;
	?>
<tr>
	<td colspan="3"><?php echo $total;?></td>
</tr>
</table>