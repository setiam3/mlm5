<?php

class ProductController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','addtocart'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	/*function untuk update QTY produk di keranjang belanja*/
	private function addQuantity($product_id, $cart_code = '', $qty = '') {
		/*model Cart findBy attributes product_id dan cart_code*/
		$modelCart = Cart::model() -> findByAttributes(array('product_id' => $product_id, 'cart_code' => $cart_code));
		/*jika ada didalam keranjang belanja*/
		if (count($modelCart) > 0) {
			/*maka update qty nya*/
			$modelCart -> qty += $qty;
			/*simpan dan return true*/
			$modelCart -> save();
			return TRUE;
		} else {
			/*lain dari itu return false*/
			return FALSE;
		}
	}
	/*untuk menambahkan product ke keranjang belanja*/
	public function actionAddtocart($id) {
		
		/*gunakan layout store*/
		//$this -> layout = 'store';
		/*panggil model Cart*/
		$model = new Cart;
		/*set data ke masing masing field*/
		/*product_id*/
		$_POST['Cart']['product_id'] = $id;
		/*qty*/
		$_POST['Cart']['qty'] = 1;
		/*cart_code*/
		$_POST['Cart']['cart_code'] = Yii::app()->session['cart_code'];
		/*set ke attribut2*/
		$model -> attributes = $_POST['Cart'];
		
		/*update qty-nya jika produk sudah ada di dalam keranjang belanja
		 *menjadi +1*/
		if ($this -> addQuantity($id, Yii::app()->session['cart_code'], 1)) {
			/*direct ke halaman cart*/	
			$this -> redirect(array('cart/'));
		/*add ke keranjang belanja jika produk belum ada di keranjang*/	
		} elseif ($model -> save()) {
			/*direct ke halaman cart*/ 
			$this -> redirect(array('cart/'));
		} else {
			/*produk tidak ada di dalam data product kasih error 404*/
			throw new CHttpException(404, 'The requested id invalid.');
		}

	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Product;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Product']))
		{
			$model->attributes=$_POST['Product'];
			$images=CUploadedFile::getInstancesByName('foto');
                if (isset($images) && count($images) > 0){
                    $i=1;
                    foreach ($images as $image=>$pic) {
                        $ext=substr($pic, strrpos($pic, '.')+1);
                        if(in_array($ext, $this->arrayImages)){
                            $pic->saveAs($this->imagesPath().$model->kode_kategori.'_'.$model->id.'_'.$i.'_'.'.'.$ext);
                        }else{
                            $messageType = 'warning';
                            $message = "<strong>Only images file type allowed";
                            Yii::app()->user->setFlash($messageType, $message);
                            $this->redirect(array('create'));
                        }
                    //image resize
$image= Yii::app()->image->load($this->imagesPath().$model->kode_kategori.'_'.$model->id.'_'.$i.'_'.'.'.$ext);
                    $image->resize(640,640);
                    $image->save();
                    $i++;
                    }
                $model->image= $model->kode_kategori.'_'.$model->id.'_'.$i.'_'.'.'.$ext;
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Product']))
		{
			$model->attributes=$_POST['Product'];
			$images=CUploadedFile::getInstancesByName('foto');
                if (isset($images) && count($images) > 0){
                    $i=1;
                    foreach ($images as $image=>$pic) {
                        $ext=substr($pic, strrpos($pic, '.')+1);
                        if(in_array($ext, $this->arrayImages)){
                            $pic->saveAs($this->imagesPath().$model->kode_kategori.'_'.$model->id.'_'.$i.'_'.'.'.$ext);
                        }else{
                            $messageType = 'warning';
                            $message = "<strong>Only images file type allowed";
                            Yii::app()->user->setFlash($messageType, $message);
                            $this->redirect(array('create'));
                        }
                        $foto=$model->kode_kategori.'_'.$model->id.'_'.$i.'_'.'.'.$ext;
                        
                    $i++;
                    }
	                $model->image= $foto;
	            }
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		/*gunakan layout store*/
		//$this -> layout = 'store';
		/*order by id desc*/
		$criteria = new CDbCriteria( array('order' => 'id DESC', ));
		/*count data product*/
		$count = Product::model() -> count($criteria);
		/*panggil class paging*/
		$pages = new CPagination($count);
		/*elements per page*/
		$pages -> pageSize = 8;
		/*terapkan limit page*/
		$pages -> applyLimit($criteria);

		/*select data product
		 *cache(1000) digunakan untuk men cache data,
		 * 1000 = 10menit*/
		$models = Product::model() -> cache(1000) -> findAll($criteria);

		/*render ke file index yang ada di views/product
		 *dengan membawa data pada $models dan
		 *data pada $pages
		 **/
		$this -> render('index', array('models' => $models, 'pages' => $pages, ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Product('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Product']))
			$model->attributes=$_GET['Product'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Product::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='product-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
