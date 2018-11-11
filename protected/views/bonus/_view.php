<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_member')); ?>:</b>
	<?php echo CHtml::encode($data->kode_member); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bonus')); ?>:</b>
	<?php echo CHtml::encode($data->bonus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('poin')); ?>:</b>
	<?php echo CHtml::encode($data->poin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bonus_diambil')); ?>:</b>
	<?php echo CHtml::encode($data->bonus_diambil); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_ambil')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_ambil); ?>
	<br />


</div>