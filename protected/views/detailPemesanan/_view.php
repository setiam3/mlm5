<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_pesan')); ?>:</b>
	<?php echo CHtml::encode($data->kode_pesan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_barang')); ?>:</b>
	<?php echo CHtml::encode($data->kode_barang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ukuran_barang')); ?>:</b>
	<?php echo CHtml::encode($data->ukuran_barang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jumlah_barang')); ?>:</b>
	<?php echo CHtml::encode($data->jumlah_barang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detail_pemesanancol')); ?>:</b>
	<?php echo CHtml::encode($data->detail_pemesanancol); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_detail')); ?>:</b>
	<?php echo CHtml::encode($data->status_detail); ?>
	<br />


</div>