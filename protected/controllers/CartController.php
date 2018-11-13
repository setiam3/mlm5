<?php
/*Author : Kuuga Sharive
 *Class cart untuk kepentingan keranjangan belanja
 *edit item, remove item, finishop 
 */
Class CartController extends YiishopController {
	/*tentukan layout controller*/
	public $layout = '//layouts/store';
	/*static var INDEX*/
	const INDEX = "cart/";
	/*private var untuk menampung bank transfer*/
	private $bank_transfer;
	/*private var untuk menampung id address*/
	private $id_address;

	/*untuk remove item 
	 *dari keranjang*/
	public function actionRemove($id) {
		/*delete by pk
		 *jika berhasil maka*/	
		if (Cart::model() -> cache(1000) -> deleteByPk($id)) {
			/*direct ke halaman cart*/				
			$this -> redirect(array("cart/"));
		} else {
			/*jika tidak tampilkan error 400*/
			throw new CHttpException(400, 'Invalid request ID. Please do not repeat this request again.');
		}
	}

	/**
	 * list produk di keranjang belanja
	 */
	public function actionIndex() {
		/*query untuk list data produk
		 *dengan men-join tabel produk,cart.
		 */
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
		/*render ke file view cart/index*/
		$this -> render("index", 
			array(
				"data" => $results,//bawa result data 
				"sum" => NULL, //var sum =null supaya tidak error di viewnya
			)
		);
	}

	/*untuk ubah keranjang belanja*/
	function actionChange() {
		/*count semua produk yang ada 
		 *di keranjang belanja*/
		$count = count(Cart::model() -> findAll("cart_code=:cart_code", array(":cart_code" => Yii::app() -> session['cart_code'])));
		/*looping sebanyak jumlah data produk 
		 *yang ada di keranjang belanja*/
		for ($i = 1; $i <= $count; $i++) {
			/*findbyPk*/
			$model = Cart::model() -> cache(1000) -> findByPk($_POST['id' . $i]);
			/*set field qty pada keranjang belanja 
			 *untuk diupdate*/
			$model -> qty = $_POST['qty' . $i];
			/*simpan perubahan*/
			$model -> cache(1000) -> save();
		}
		/*direk ke halaman index cart*/
		$this -> redirect(array(self::INDEX));
	}


	/*untuk selesai belanja*/
	function actionFinishshop() {
		/*jika customer tidak login maka direct
		 *ke halaman account untuk login*/	
		// if (!isset(Yii::app() -> user -> customerLogin)) {
		// 	$this -> redirect(array('/account'));
		// }
		/*jika add new address*/
		// if (isset($_GET['addNewAddress'])) {
		// 	/*panggil model address*/
		// 	$modelAddress = new Address;
		// 	/*jika data address dikirim maka*/
		// 	if (isset($_POST['Address'])) {
		// 		/*set attributes*/
		// 		$modelAddress -> attributes = $_POST['Address'];
		// 		/*set field customer_id untuk data address*/
		// 		$modelAddress -> customer_id = Yii::app() -> user -> customerId;
		// 		/*jika disimpan maka*/
		// 		if ($modelAddress -> save()) {
		// 			/*set session id_address*/	
		// 			$_SESSION['id_address'] = Yii::app() -> db -> getLastInsertID();
		// 			render ke view payment/transfer bank
		// 			 *untuk memilih jenis pembayaran
		// 			$this -> render("payment");
		// 			return;
		// 		}
		// 	}
		// 	/*jika data transfer bank/payment dikirim maka*/
		// 	if (isset($_POST['Transfer'])) {
		// 		/*set var bank_transfer*/
		// 		$this -> bank_transfer = $_POST['Transfer']['bank'];
		// 		/*set var id_address*/
		// 		$this -> id_address = $_SESSION['id_address'];
		// 		/*add order dan hapus data yang ada dikeanjang belanja*/
		// 		$this -> addOrderCleanCart();
		// 		return;
		// 	}
		// 	/*render view untuk form add new address*/
		// 	$this -> render('addNewAddress', array('model' => $modelAddress));
		// 	return;
		// }
		/*jika memilih address 
		 *yang sudah ada*/
		// if (isset($_POST['ChooseAddress'])) {
		// 	/*set session id_address*/
		// 	$_SESSION['id_address'] = $_POST['ChooseAddress']['id_address'];
		// 	/*render ke view payment/transfer bank*/
		// 	$this -> render("payment");
		// 	return;
		// }
		// /*jika transfer maka*/
		// if (isset($_POST['Transfer'])) {
		// 	/*set var bank_transfer*/
		// 	$this -> bank_transfer = $_POST['Transfer']['bank'];
		// 	/*set var id_address*/
		// 	$this -> id_address = $_SESSION['id_address'];
		// 	/*add order dan hapus data yang ada dikeanjang belanja*/
		// 	$this -> addOrderCleanCart();
		// 	return;
		// }
		/*dapatkan semua data address berdasarkan 
		 *user yang login untuk ditampilkan*/
		// $getAddressBooks = Address::model() -> findAll('customer_id=:customer_id', 
		// 	array(':customer_id' => Yii::app() -> user -> customerId));
		// /*render ke halaman finishop*/
		// $this -> render('finishshop', array('addressBooks' => $getAddressBooks, ));
		//print_r($_POST);die;
		$this -> addOrderCleanCart();
	}

	/*untuk add to order_detail dan
	 *delete data di keranjang belanja*/
	private function addOrderCleanCart() {
		$modelOrder = new Order;
	if(isset($_POST)){
			$transaction = Yii::app()->db->beginTransaction();
		try{
			$modelOrder -> order_code = $order_code = Yii::app() -> user -> kode_member . '' . $this -> orderCode();
			$modelOrder -> order_date = $this->date_sql_now();
			$modelOrder -> kode_member = Yii::app() -> user -> kode_member;
			$modelOrder -> bank_transfer ='BCA-09123123123';
			if ($modelOrder -> save()) {
			$last_insert_id = Yii::app() -> db -> getLastInsertID();
			$sql = "SELECT product.id as proid, product.image,product.harga,product.nama_produk,cart.* 
					  FROM cart,m_product product
					  WHERE product.id=cart.product_id
					  AND cart.cart_code='" . Yii::app() -> session['cart_code'] . "'";
			$results = Yii::app()->db->cache(1000)->createCommand($sql)->queryAll();
			
			/*simpan ke orderdetail secara looping
			 */
			$grandtotal=0;
			foreach ($results as $detail) :
				$deor = new Orderdetail;
				/*set field order_code*/
				$deor -> order_code = $order_code;
				/*set field order_id*/
				$deor -> order_id = $last_insert_id;
				/*set field product_id*/
				$deor -> product_id = $detail['proid'];
				/*set field qty*/
				$deor -> qty = $detail['qty'];
				/*set field subtotal*/
				$deor -> subtotal = $detail['harga'] * $detail['qty'];
				/*simpan orderdetail*/
				//print_r($deor->order_code);die;
				$deor->save();
				$grandtotal +=(int)$deor->subtotal;
			endforeach;
			$order=Order::model()->findByPk($deor->order_id);
			$order->grandtotal=$grandtotal;
			$order->save();

			$del = "DELETE FROM cart WHERE cart_code='" . Yii::app() -> session['cart_code'] . "'";
			$del = Yii::app()->db -> createCommand($del)->execute();
			$transaction->commit();
			$this -> redirect(array('site/index'));
		}

		}catch(Exception $e){
				$transaction->rollBack();
				Yii::app()->user->setFlash('error', "{$e->getMessage()}");
			}
		
	}
	}
}