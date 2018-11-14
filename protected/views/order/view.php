<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->id,
);

?>
<br>
<?php $attributes=array(
				//'id',
		'order_code',
		'order_date',
		'kode_member',
		'bank_transfer',
		'payment_status',
	);
$this->genListView($model,$attributes,$model->id);
$detail=Orderdetail::model()->findAll('order_code="'.$model->order_code.'"');
?>
Detail Pemesanan:
<table class="table table-bordered table-responsive table-hover">
	<tr>
		<td>No</td>
		<td>Produk</td>
		<td>Qty</td>
		<td>Subtotal</td>
	</tr><?php $total=0; $i=1;
foreach ($detail as $value) {
	echo "<tr><td>";
	echo $i."</td><td>";
	echo Product::model()->findByPk($value->product_id)->nama_produk."</td><td>";
	echo $value->qty."</td><td>";
	echo $value->subtotal."</td>";
	echo "</tr>";
	$total+=$value->subtotal;
	$i++;
}

	?>
<tr style="font-weight: bold;">
	<td colspan="3" style="text-align: right;">TOTAL</td>
	<td ><?php echo $total;?></td>
</tr>
</table>