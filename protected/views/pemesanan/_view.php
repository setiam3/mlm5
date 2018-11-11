<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('grand_total')); ?>:</b>
	<?php echo CHtml::encode($data->grand_total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>