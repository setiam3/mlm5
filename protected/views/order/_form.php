<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'order-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

<div class="row">
	<div class="form-group">
		<div class="col-sm-2">
			<?php echo $form->labelEx($model,'kode_member'); ?>
		</div>
        <div class="col-sm-6">
        <?php echo $form->dropDownList($model,'kode_member',Controller::get_member(),array('data-allow-clear'=>'true','prompt'=>'','data-placeholder'=>'pilih Upline','class'=>'select2 visible',
        	
                    )
        ); ?>
				<?php //echo $form->textField($model,'kode_member',array('class'=>'form-control','size'=>45,'maxlength'=>45)); ?>
			<?php echo $form->error($model,'kode_member'); ?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12"><h2></h2></div>
	<div class="col-sm-12">
		<div class="row">
			<div class="form-group">
				<div class="col-sm-2">Nama Barang</div>
				<div class="col-sm-6">
        <?php echo $form->dropDownList($detail,'id',Controller::get_produk(),array('data-allow-clear'=>'true','prompt'=>'','data-placeholder'=>'pilih produk','class'=>'select2 visible',
        	
                    )
        ); ?>
			<?php echo $form->error($model,'kode_member'); ?>
		</div>
			
				<div class="col-sm-2"><input type="button" name="add" value="Add"/></div>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<table class="col-sm-9" id="detailbarang" cellpadding="1" cellspacing="1" border="1px solid;">
				<thead>
					<th>no</th>
					<th>nama produk</th>
					<th>harga</th>
					<th>jumlah</th>
					<th>subtotal</th>
					<th>action</th></thead>
					<tbody>
						<tr>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
<?php $this->endWidget(); ?>
</div><!-- form -->