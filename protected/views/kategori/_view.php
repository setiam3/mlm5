<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_kategori')); ?>:</b>
	<?php echo CHtml::encode($data->nama_kategori); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detail_kategori')); ?>:</b>
	<?php echo CHtml::encode($data->detail_kategori); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_kategori')); ?>:</b>
	<?php echo CHtml::encode($data->kode_kategori); ?>
	<br />


</div>