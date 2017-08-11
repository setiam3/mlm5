<?php
class OrderController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'postOnly + delete', 
			'rights',
		);
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
        $model=new Order;
        if(isset($_POST['Order']))
		{
			$transaction = Yii::app()->db->beginTransaction();
			try{
				$messageType='warning';
				$message = "There are some errors ";
				$model->attributes=$_POST['Order'];
				$model->tanggal_jo=$this->tanggal_indo($_POST['Order']['tanggal_jo']);
				$model->ETD=$this->tanggal_indo($_POST['Order']['ETD']);
				$model->ETA=$this->tanggal_indo($_POST['Order']['ETA']);
				$pengirim=Customer::model()->findAllByAttributes(array('nama'=>$model->pengirim));//CEK CUST
				$penerima=Customer::model()->findAllByAttributes(array('nama'=>$model->penerima));//CEK CUST
				if(empty($pengirim)){
					$pengirim=new Customer;
					$pengirim->nama=$model->pengirim;
					$pengirim->telp=$model->telp_pengirim;
					$pengirim->save();
				}
				if(empty($penerima)){
					$penerima=new Customer;
					$penerima->nama=$model->penerima;
					$penerima->telp=$model->telp_pengirim;
					$penerima->save();
				}
				if($model->save()){                               
					$messageType = 'success';
					$message = "<strong>Well done!</strong> You successfully create data ";
					$transaction->commit();
					Yii::app()->user->setFlash($messageType, $message);
					$this->redirect(array('index'));
				}				
			}
			catch (Exception $e){
				$transaction->rollBack();
				Yii::app()->user->setFlash('error', "{$e->getMessage()}");
			}
		}
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
            $model->tanggal_jo=$this->tanggal_indo($model->tanggal_jo);
            $model->ETD=$this->tanggal_indo($model->ETD);
            $model->ETA=$this->tanggal_indo($model->ETA);
		if(isset($_POST['Order']))
		{
            $messageType='warning';
            $message = "There are some errors ";
            $transaction = Yii::app()->db->beginTransaction();
            try{
                $model->attributes=$_POST['Order'];
                $model->tanggal_jo=$this->tanggal_indo($_POST['Order']['tanggal_jo']);
                $model->ETD=$this->tanggal_indo($_POST['Order']['ETD']);
                $model->ETA=$this->tanggal_indo($_POST['Order']['ETA']);
                $messageType = 'success';
                $message = "<strong>Well done!</strong> You successfully update data ";
                if($model->save()){
					$transaction->commit();
					Yii::app()->user->setFlash($messageType, $message);
					$this->redirect(array('index'));
				}
			}
			catch (Exception $e){
				$transaction->rollBack();
				Yii::app()->user->setFlash('error', "{$e->getMessage()}");
			}
		}
		$this->render('update',array('model'=>$model));
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
        	//delete foto kontainerjo
            foreach(Kontainerjo::model()->findAllByAttributes(array('no_jo'=>$this->loadModel($id)->no_jo)) as $image){
                if(!empty($image->foto)){
                    if(count(CJSON::decode($image->foto))>0){
                        //chown($this->imagesPath(), 666);//set own
                        foreach (CJSON::decode($image->foto) as $foto) {
                            if(file_exists($this->imagesPath().$foto))
                            unlink($this->imagesPath().$foto);
                        }
                    }
                }
            }
            Order::model()->deleteByPk($id);
        	$messageType = 'success';
            $message = "<strong>Well done!</strong> You successfully delete data ";
            Yii::app()->user->setFlash($messageType, $message);
				
        }else{
                throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
        }
	}
	public $columns=array(
        	array(
        		'type'=>'html',
        		'name'=>'no_jo',
        		'value'=>'CHtml::link($data->no_jo,Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
        		),
        	array(
        		'type'=>'html',
        		'name'=>'tanggal_jo',
        		'value'=>'CHtml::link(Controller::tanggal_indo($data->tanggal_jo),Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
        		),
        	array(
        		'type'=>'html',
        		'name'=>'customer',
        		'value'=>'CHtml::link($data->customer,Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
        		),
        	array(
        		'type'=>'html',
        		'name'=>'stuffing',
        		'value'=>'CHtml::link($data->stuffing,Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
        		),
        	array(
        		'type'=>'html',
        		'name'=>'status',
        		'value'=>'CHtml::link($data->status,Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
        		),
		    array(
		    	'type'=>'html',
		    	'name'=>'komoditi',
		    	'value'=>'CHtml::link(Controller::getKomoditi($data->no_jo),Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
		    	),
		    	'tujuan',
		    	array('type'=>'html','name'=>'pelayaran','value'=>'Controller::getPelayaran($data->kapal)'),
            );

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $model = new Order('search');
        $model->unsetAttributes();
        $widget=$this->createWidget('ext.EDataTables.EDataTables', array(
		 'id'            => 'order-grid',
		 'dataProvider'  => $model->search($this->columns),
		 'ajaxUrl'       => $this->createUrl($this->getAction()->getId()),
		 'columns'       => $this->columns,
         'bootstrap'=>true,
		));
		if (Yii::app()->getRequest()->getIsAjaxRequest()) {
			echo json_encode($widget->getFormattedData(intval($_GET['sEcho'])));
			Yii::app()->session[$_COOKIE['PHPSESSID']]= $_SERVER['REQUEST_URI'];
			Yii::app()->end();
			return;
		}
            $this->render('index',array('widget'=>$widget,'model'=>$model));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
        $model = new Order('search');
        $model->unsetAttributes();
        $ar1=array('class'=> 'EButtonColumn',
                'template'=>'{update}{delete}',
			    'buttons'=>array(
			        'delete' => array(
			            'visible'=>'Yii::app()->user->getIsSuperuser()==1',           
			        ),
			    ));
        array_push($this->columns,$ar1);
        $widget=$this->createWidget('ext.EDataTables.EDataTables', array(
		 'id'            => 'order-grid',
		 'dataProvider'  => $model->search($this->columns),
		 'ajaxUrl'       => $this->createUrl($this->getAction()->getId()),
		 'columns'       => $this->columns,
		  'bootstrap'=>true,
		));
		if (Yii::app()->getRequest()->getIsAjaxRequest()) {
			echo json_encode($widget->getFormattedData(intval($_GET['sEcho'])));
			Yii::app()->session[$_COOKIE['PHPSESSID']]= $_SERVER['REQUEST_URI'];
			Yii::app()->end();
			return;
		}
		$this->render('admin', array('widget' => $widget,));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Order the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Order::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Order $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='order-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
