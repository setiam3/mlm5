<?php

class BlController extends Controller
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
		$model=new TBl;
		if(isset($_POST['TBl']))
		{
			$model->attributes=$_POST['TBl'];
			$images=CUploadedFile::getInstancesByName('foto');
			$foto=array();
            $i=1;
			foreach ($images as $image=>$pic) {
				$ext=substr($pic, strrpos($pic, '.')+1);
				if(in_array($ext, $this->arrayImages)){
					$pic->saveAs($this->imagesPath().'bl_'.$i.$model->kapal.$model->voyage.$model->agen.'.'.$ext);
				}else{
					$messageType = 'warning';
	                $message = "<strong>Only images file type allowed";
	                Yii::app()->user->setFlash($messageType, $message);
	                $this->redirect(array('index'));
				}
				$foto[]='bl_'.$i.$model->kapal.$model->voyage.$model->agen.'.'.$ext;
				$i++;
			}
			$model->pelayaran=Controller::getPelayaran($model->kapal);
			$criteria=new CDbCriteria;
			$criteria->select='max(ETA) as ETA';
			$criteria->addCondition("kapal='$model->kapal'");
			$criteria->addCondition("voyage='$model->voyage'");
			$eta=Order::model()->find($criteria);
			$model->ETA=$eta->ETA;
			$model->foto=CJSON::encode($foto);
			
			if($model->save()){
				$messageType = 'success';
                $message = "<strong>Well done!</strong> You successfully create data ";
                Yii::app()->user->setFlash($messageType, $message);
                $this->redirect(array('index'));
			}
		}

		$this->render('create',array('model'=>$model));
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

		if(isset($_POST['TBl']))
		{
			$model->attributes=$_POST['TBl'];
			$images=CUploadedFile::getInstancesByName('foto');
			if (isset($images) && count($images) > 0){
			$model2 = TBl::model()->findByPk($model->id);
			if(!empty($model2->foto)){
				//print_r($model2->foto);die;
                foreach(CJSON::decode($model2->foto) as $fotos){
                    if(file_exists($this->imagesPath().$fotos)){
                    unlink($this->imagesPath().$fotos);
                    }
                }
            }
				$foto=array();
	            $i=1;
				foreach ($images as $image=>$pic) {
				$ext=substr($pic, strrpos($pic, '.')+1);
				
					if(in_array($ext, $this->arrayImages)){
						$pic->saveAs($this->imagesPath().'bl_'.$i.$model->kapal.$model->voyage.$model->agen.'.'.$ext);
					}else{
						$messageType = 'warning';
		                $message = "<strong>Only images file type allowed";
		                Yii::app()->user->setFlash($messageType, $message);
		                $this->redirect(array('index'));
					}
					$foto[]='bl_'.$i.$model->kapal.$model->voyage.$model->agen.'.'.$ext;
					$i++;
				}
			}

			$model->pelayaran=Controller::getPelayaran($model->kapal);
			$criteria=new CDbCriteria;
			$criteria->select='max(ETA) as ETA';
			$criteria->addCondition("kapal='$model->kapal'");
			$criteria->addCondition("voyage='$model->voyage'");
			$eta=Order::model()->find($criteria);
			$model->ETA=$eta->ETA;
			$model->foto=CJSON::encode($foto);

			if($model->save()){
				$messageType = 'success';
                $message = "<strong>Well done!</strong> You successfully update data ";
                Yii::app()->user->setFlash($messageType, $message);
                $this->redirect(array('index'));
			}
			
		}

		$this->render('update',array('model'=>$model));
	}
	public function actionGetcustomer($q=null){
		if(Yii::app()->request->isAjaxRequest)
		{
            if($_POST)$q=$_POST['q'];
            $cust=Order::model()->findByAttributes(array('no_jo'=>$q));
            	$arrayget['customer']=$cust->customer;
            	$arrayget['agen']=$cust->agen;
            echo json_encode($arrayget);
	}
	if(Yii::app()->controller->action->id==='update'){
		$cust=Order::model()->findByAttributes(array('no_jo'=>$q));
            	$arrayget['customer']=$cust->customer;
            	$arrayget['agen']=$cust->agen;
            	return $arrayget;
	}
}
	public function actiongetVoyage(){
		$kapal=$_POST['kapal'];
		if(Yii::app()->request->isAjaxRequest){
			$order=Order::model()->findAllByAttributes(array('kapal'=>$kapal));
			$data=CHtml::listData($order,'voyage','voyage');
			foreach($data as $value=>$posisi){
			echo CHtml::tag('option', array('value'=>$value),CHtml::encode($posisi),true);
			}
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{	// we only allow deletion via POST request
			$fotos= $this->loadModel($id);
            if(!empty($fotos['foto'])){
                foreach (CJSON::decode($fotos['foto']) as $foto) {
                    //chown($this->imagesPath(), 666);
                    if(file_exists($this->imagesPath().$foto)){
                        unlink($this->imagesPath().$foto);
                    }else{echo 'file not exis';}
                }
            }

			$this->loadModel($id)->delete();
$messageType = 'success';
            $message = "<strong>Well done!</strong> You successfully Delete data ";
            Yii::app()->user->setFlash($messageType, $message);
        }else{
                throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
        }
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model = new TBl('search');
        $model->unsetAttributes();
        $widget=$this->createWidget('ext.EDataTables.EDataTables', array(
         'id'            => 'tbl-form',
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
		$this->render('index',array(
			'model'=>$model,
			'widget'=>$widget,
		));
	}
	public $columns=array(
		array(
                'type'=>'html',
                'name'=>'kapal',
                'value'=>'CHtml::link($data->kapal,Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
                ),
		array(
                'type'=>'html',
                'name'=>'voyage',
                'value'=>'CHtml::link($data->voyage,Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
                ),
		array(
                'type'=>'html',
                'name'=>'pelayaran',
                'value'=>'CHtml::link($data->pelayaran,Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
                ),
		array(
                'type'=>'html',
                'name'=>'ETA',
                'value'=>'CHtml::link(Controller::tanggal_indo($data->ETA),Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
                ),
		array(
                'type'=>'html',
                'name'=>'agen',
                'value'=>'CHtml::link($data->agen,Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
                ),
		array(
                'type'=>'html',
                'header'=>'Attachment',
                'value'=>'CHtml::link("<i class=entypo-air></i>B/L",Yii::app()->baseUrl."/images/".$data->foto)',
            ),
		);

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$a1=array('class'=> 'EButtonColumn',
                'template'=>'{update}{delete}',
                    'buttons'=>array(
                        'update'=>array('url'=>'"update/".$data->id'),
                        'delete' => array(
                            'url'=>'"delete/".$data->id',
                            'visible'=>'Yii::app()->user->getIsSuperuser()==1',           
                        ),
                    ),
                );
        array_push($this->columns,$a1);
		$model = new TBl('search');
        $model->unsetAttributes();
        $widget=$this->createWidget('ext.EDataTables.EDataTables', array(
         'id'            => 'tbl-form',
         'dataProvider'  => $model->search($this->columns),
         'ajaxUrl'       => $this->createUrl($this->getAction()->getId()),
         'columns'       => $this->columns,
         'bootstrap'=>true,
         'buttons'=>
         array('print' => array(
					'label' => Yii::t('EDataTables.edt',"Print"),
					'text' => true,
					'htmlClass' => 'printButton',
					'icon' => 'icon-print'
					//'callback' => null //default will be used, if possible
				)),
        ));
        if (Yii::app()->getRequest()->getIsAjaxRequest()) {
            echo json_encode($widget->getFormattedData(intval($_GET['sEcho'])));
            Yii::app()->session[$_COOKIE['PHPSESSID']]= $_SERVER['REQUEST_URI'];
            Yii::app()->end();
            return;
        }
            $this->render('admin',array('widget'=>$widget));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=TBl::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
