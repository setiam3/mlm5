<?php
$this->breadcrumbs=array(
	'Bill Of Lading'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
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
            <div class="panel-title">Form B/L</div>
    </div>
    <div class="panel-body">
<?php echo $this->renderPartial('_frm', array('model'=>$model)); ?>
<div class="">
    <?php if(!empty($model->foto)):?>
    <?php foreach (CJSON::decode($model->foto) as $foto):?>
    <a href="<?php echo Yii::app()->baseUrl.'/images/'.$foto?>">
    <img class="col-xs-4" src="<?php echo Yii::app()->baseUrl.'/images/'.$foto?>">
    </a>
    <?php endforeach; endif;?>
</div>
</div></div>