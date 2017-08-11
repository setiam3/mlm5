<?php
$this->breadcrumbs=array(
	'Deliveryreceipts'=>array('index'),
	$model->id,
);

?>
<div class="pull-right">	
	<?php
if(!empty(Yii::app()->session[$_COOKIE['PHPSESSID']])){
echo CHtml::link('<i class="entypo-left-bold" style="font-size: 30px"></i>kembali',Yii::app()->session[$_COOKIE['PHPSESSID']]);
Yii::app()->session->remove($_COOKIE['PHPSESSID']);
}else{
echo CHtml::link('<i class="entypo-left-bold" style="font-size: 30px"></i>kembali',$_SERVER['HTTP_REFERER']);
}
	?>
</div>
<br>
<br>
<div class="panel panel-primary">
    <div class="panel-heading">
            <div class="panel-title">Detail D/R</div>
    </div>
<?php $attributes=array(
		'nomor_dr',
		'kapal',
		'voyage',
		'pelayaran',
		'nomor_kontainer',
		'komoditi',
		'penerima',
		'alamat_penerima',
		'up_penerima'
	);
    $this->genListView($model,$attributes);
    ?>
</div>