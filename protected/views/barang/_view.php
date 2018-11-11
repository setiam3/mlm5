<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_barang')); ?>:</b>
	<?php echo CHtml::encode($data->kode_barang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_barang')); ?>:</b>
	<?php echo CHtml::encode($data->nama_barang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detail_barang')); ?>:</b>
	<?php echo CHtml::encode($data->detail_barang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_kategori')); ?>:</b>
	<?php echo CHtml::encode($data->kode_kategori); ?>
	<br />


</div>