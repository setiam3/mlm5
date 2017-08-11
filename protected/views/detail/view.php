<?php
/* @var $this PosisiController */
/* @var $model Detail */

$this->breadcrumbs=array(
	'Posisi'=>array('index'),
	$model->id,
);

?><div class="pull-right">	
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
            <div class="panel-title">Detail Posisi JO</div>
    </div>
<?php $attributes=array(
		'resi_detail',
		'posisi',
		array('name'=>'date',
		'type'=>'html',
		'value'=> Controller::toDate(CHtml::value($model,'date')),
		),
		'keterangan'
	);
    $this->genListView($model,$attributes);
    ?>
</div>