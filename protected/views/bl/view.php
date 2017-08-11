<?php
$this->breadcrumbs=array(
	'Bill Of Lading'=>array('index'),
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
<?php 
$attr=array(
		'kapal',
		'voyage',
		'pelayaran',
		array('name'=>'ETA','type'=>'html','value'=>$this->tanggal_indo(CHtml::value($model,'ETA'))),
		'agen',
	);
$this->genListView($model,$attr); ?>
<div class="row">
        <div class="form-group">
            <?php if(!empty($model->foto)):
                foreach(CJSON::decode($model->foto) as $foto):?> 
            <div class="col-xs-12 col-sm-4">
                <a href="<?php echo Yii::app()->createUrl('/images/'.$foto);?>"><img src="<?php echo Yii::app()->baseUrl.'/images/'.$foto; ?>" class="img-thumbnail"/></a>
            </div>
            <?php endforeach;?>
            <?php endif;?>
        </div>
    </div>