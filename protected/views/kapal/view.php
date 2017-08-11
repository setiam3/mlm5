<?php
/* @var $this KapalController */
/* @var $model Kapal */

$this->breadcrumbs=array(
	'Kapals'=>array('index'),
	$model->id,
);

?>
<div class="pull-right">    
    <?php
if(!empty(Yii::app()->session[$_COOKIE['PHPSESSID']])){
echo CHtml::link('<i class="entypo-left-bold" style="font-size: 30px"></i>',Yii::app()->session[$_COOKIE['PHPSESSID']]);
Yii::app()->session->remove($_COOKIE['PHPSESSID']);
}else{
echo CHtml::link('<i class="entypo-left-bold" style="font-size: 30px"></i>',$_SERVER['HTTP_REFERER']);
}
    ?>
</div>
<br>
<br>
<div class="panel panel-primary">
    <div class="panel-heading">
            <div class="panel-title">Detail Kapal</div>
    </div>
    <div  class="panel-body with-table">
<?php $attributes=array(
		'id','nama_kapal','pelayaran'
		
	);
    $this->genListView($model,$attributes);
    ?>
    </div>
</div>