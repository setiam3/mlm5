<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_penjualan')); ?>:</b>
	<?php echo CHtml::encode($data->kode_penjualan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_pesan')); ?>:</b>
	<?php echo CHtml::encode($data->kode_pesan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_member')); ?>:</b>
	<?php echo CHtml::encode($data->kode_member); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grandtotal')); ?>:</b>
	<?php echo CHtml::encode($data->grandtotal); ?>
	<br />


</div>