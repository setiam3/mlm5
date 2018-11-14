<?php
$this -> breadcrumbs = array('Cart', );


?>
<style>
	table {
		clear: both;
		border-collapse: collapse;
		margin-left: 5px;
		margin-top: 30px;
	}
	td {
		padding: 4px;
		border: solid 1px #cce2f8;
	}
	th {
		padding: 4px;
		border: solid 1px #cce2f8;
	}
	#clean td {
		border: none;
	}
</style>
<div style="padding:0 10px 5px 0;margin:5px 5px 15px 5px; border:1px solid #CCC;text-align: justify;">

<?php
	if(empty($data)){
?>
<center>
	<h1 style="font-size:12px; margin: 5px 0 0 5px;">
		Keranjang Belanja Anda Kosong<br><br>
		<a style="text-decoration: none;color:green;" href="<?php echo $this->createUrl("product/");?>">Silahkan belanja</a>
	</h1>	
</center>
<?php }else{ ?>
<h1 style="float:left;font-size:12px; margin: 5px 0 0 5px;">Keranjang Belanja Anda</h1>
	

<table width="100%">
	<tr>
		<th>No</th>
		<th>Barang</th>
		<th align="right">Harga</th>
		<th align="right">Jumlah</th>
		<th align="right">Subtotal</th>
		<th align="center">#</th>
	</tr>


<?php echo CHtml::beginForm(array('change')); ?>
<?php $i=1;foreach($data as $model): $sum=$sum+($model['harga'] * $model['qty'])?>
	<?php echo CHtml::hiddenField('id' . $i, $model['id'], array('maxlength' => 3, 'style' => "width:20px;text-align:center")); ?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><b><?php echo $model['nama_produk']; ?></b><br>
			<?php if(!empty($model['image'])):?>
    <?php foreach (CJSON::decode($model['image']) as $foto):?>
    <a href="<?php echo Yii::app()->baseUrl.'/images/'.$foto?>">
    <img class="col-xs-4" src="<?php echo Yii::app()->baseUrl.'/images/'.$foto?>" style='width:82px;'>
    </a>
    <?php endforeach; endif;?>
			</td>
		<td align="right"><b>IDR <b><?php echo number_format($model['harga'], 0, '.', '.'); ?></b></td>
		<td align="right"><?php echo CHtml::textField('qty' . $i, $model['qty'], array('maxlength' => 3, 'style' => "width:20px;text-align:center")); ?></td>
		<td align="right"><b>IDR <?php echo number_format($model['harga'] * $model['qty'], 0, '.', '.'); ?></b></td>	
		<td align="right"><?php echo CHtml::link(CHtml::encode("Hapus"), array('remove', 'id' => $model['id'])); ?></td>
	</tr>
	
<?php $i++;
		endforeach;
	?>
	<tr id="clean">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>Grand Total</td>
		<td>&nbsp;</td>
		<td align="right"><b>IDR <?=number_format($sum, 0, ",", ".") ?></b></td>
		<td></td>
	</tr>
	<tr id="clean">
		<td></td>
		<td><?php 
		echo CHtml::link('Belanja Lagi',array('product/index'),array('class'=>'btn'));


		//echo CHtml::button('Belanja lagi', array('submit' => array('product/index'))); ?></td>
		<td>&nbsp;</td>
		<td align="right"><?php echo CHtml::submitButton('Ubah'); ?></td>
		<td><?php echo CHtml::link('Selesai Belanja', array('cart/finishshop')); ?></td>
		<td>&nbsp;</td>
	</tr>
			
</table>
                                        
<?php echo CHtml::endForm(); ?>
<?php } ?>
</div>