<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->no_jo,
);
?>
<div class="row">
<div class="col-sm-6"><h1>Job Order <?php echo $model->no_jo; ?></h1></div>
<div class="col-sm-1 pull-right">	
	<?php
if(!empty(Yii::app()->session[$_COOKIE['PHPSESSID']])){
echo CHtml::link('<i class="entypo-left-bold pull-right" style="font-size: 30px"></i>kembali',Yii::app()->session[$_COOKIE['PHPSESSID']]);
Yii::app()->session->remove($_COOKIE['PHPSESSID']);
}else{
echo CHtml::link('<i class="entypo-left-bold pull-right" style="font-size: 30px"></i>kembali',$_SERVER['HTTP_REFERER']);
}
	?>
</div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">
            <div class="panel-title">Detail Job Order</div>
    </div>
<?php 
$attributes=array(
	//	'tanggal_jo',
		array('type'=>'html',
		'name'=>'tanggal_jo',
		'value'=>Controller::tanggal_indo(CHtml::value($model,'tanggal_jo'))),
		'service',
		'stuffing','POL','tujuan','pengirim','penerima','kapal','voyage','status',
		array('name'=>'ETD',
		'type'=>'html','value'=>Controller::tanggal_indo( CHtml::value($model,'ETD'))),
		array('name'=>'ETA',
		'type'=>'html',
		'value'=> Controller::tanggal_indo(chtml::value($model,'ETA'))),
	);
$this->genListView($model,$attributes);
?>
</div>
<div class="row">
<div class="col-sm-6">
    <div class="panel panel-primary"> 
    <div class="panel-heading">
            <div class="panel-title">Detail Kontainer</div>
    </div>
<?php $colom=array('nomor_kontainer','komoditi');
$this->genTables($colom, 'Kontainerjo',array('attributes'=>array('no_jo'=>$model->no_jo),'condition'=>array('order'=>'id Desc')),'table-hover');
?>
</div>
</div>
<div class="col-sm-6"><div class="panel panel-primary">
    <div class="panel-heading">
            <div class="panel-title">Detail Posisi</div>
    </div>
<?php 
$col=array('date','posisi','keterangan');
$this->genTables($col, 'Detail',array('attributes'=>array('resi_detail'=>$model->no_jo),'condition'=>array('order'=>'date Desc')),'table-hover');
?>
</div>
</div>
</div>