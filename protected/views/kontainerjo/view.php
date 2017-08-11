<?php
/* @var $this KontainerjoController */
/* @var $model Kontainerjo */

$this->breadcrumbs=array(
	'Kontainerjos'=>array('index'),
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
            <div class="panel-title">Kontainer JO</div>
    </div>
<?php $attributes=array(
		'no_jo','customer',
		'nomor_kontainer',
		'type_kontainer',
		'komoditi',
		'nopol',
		'supir',
		'foto'
	);
    $this->genListView($model,$attributes);
    ?>
    <div class="row">
        <div class="form-group">
            <?php if(!empty($model->foto)):?>
                <?php 
                
                foreach(CJSON::decode($model->foto) as $foto):?> 
            <div class="col-xs-12 col-sm-4">
                <a href="<?php echo Yii::app()->createUrl('/images/'.$foto);?>"><img src="<?php echo Yii::app()->baseUrl.'/images/'.$foto; ?>" class="img-thumbnail"/></a>
            </div>
            <?php endforeach;?>
            <?php endif;?>
        </div>
    </div>
</div>