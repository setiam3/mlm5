<?php
/*digunakan untuk membuat breadcrumbs*/
$this -> breadcrumbs = array('Products', );
?>
<?php
$i=1;
/*foreach data product yang di bawa $models*/
foreach($models as $data):
	/*membuat nama class css rightbox/leftbox
	 *jika hasil mod 2 dari i 0 maka $class = rightbox
	 *selain itu $class = leftbox*/
	 if($i%2==0){$class="rightbox";}else{$class="leftbox";}
?>
<div class="col-sm-4" style="height:170px; text-align:justify; margin-bottom:5px;border:1px solid #CCC;" class="<?php echo $class; //tempilkan class css?>">
	<div style="height: 130px;">
		<h3 class="col-sm-12" style="float: left;">
			<?php echo $data -> nama_produk; ?>
		</h3><!--width:93px;clear:left;-->
		<?php if(!empty($data->image)):?>
    <?php foreach (CJSON::decode($data->image) as $foto):?>
    <a href="<?php echo Yii::app()->baseUrl.'/images/'.$foto?>">
    <img class="col-xs-4" src="<?php echo Yii::app()->baseUrl.'/images/'.$foto?>" style='width:82px;'>
    </a>
    <?php endforeach; endif;?>
		<br><br>
		<p>
			<b>Price:</b> 
			<b>IDR <?php echo $data -> harga; ?></b>  
			<p style="margin-left: 15px;"><?php echo substr($data -> desc, 0, 100); ?></p>
			<div class="clear"></div>
			<div style="position:; margin-top: 50px;">
				&nbsp;
			</div>
			<br>   
	</div>
	<p class="readmore" style="float: right; position:; margin-right:11px; margin-bottom: 5px; margin-top: 0px;">
		<?php
		/*untuk membuat link update jika user login is admin*/
		if (isset(Yii::app()->user->isAdmin)) {
			echo CHtml::link(CHtml::encode("Update"), array('update', 'id' => $data -> id));
		}
		?>
		<!--membuat link add to cart-->
		&nbsp;&nbsp;
		<?php echo CHtml::link(CHtml::encode("Beli"), array('addtocart', 'id' => $data -> id, 'p'=>$data->nama_produk)); ?>
		<!--membuat link detail product-->
		&nbsp;&nbsp;
		<?php echo CHtml::link(CHtml::encode("Detail"), array('view', 'id' => $data -> id, 'p'=>$data->nama_produk)); ?>
	</p>
</div>

<?php $i++; endforeach;?>
<!--untuk paging-->
<div style="float: right; margin-top: 5px; margin-bottom: 7px; margin-right: 18px;clear: both;">
<?php $this->widget('CLinkPager', array(
   'pages' => $pages,
   //'cssFile'=>Yii::app()->request->baseUrl.'/css/pager2.css',
   'header'=> '',
   'firstPageLabel'=>'| <',
   'lastPageLabel'=>'> |',
   'nextPageLabel'=>'>',
   'prevPageLabel'=>'<',
   'maxButtonCount'=>5,
))?></div>