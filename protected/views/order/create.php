<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	'Create',
);
/*
$this->menu=array(
	array('label'=>'List Order', 'url'=>array('index')),
	array('label'=>'Manage Order', 'url'=>array('admin')),
);*/
?>

<h1>Create Order</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'detail'=>$detail)); ?>
<?php 
$sql = "SELECT p.image,p.harga,p.nama_produk,cart.* 
			  FROM cart,m_product p
			  WHERE p.id=cart.product_id
			  AND cart.cart_code='" . Yii::app() -> session['cart_code'] . "'";
		/*koneksi database*/	  
		$connection = Yii::app() -> db;
		/*create command*/
		$command = $connection -> cache(1000) -> createCommand($sql);
		/*execute command*/
		$results = $command -> queryAll();
		echo $this->renderPartial('/cart/index', array(
				"data" => $results,//bawa result data 
				"sum" => NULL, //var sum =null supaya tidak error di viewnya
			)); ?>