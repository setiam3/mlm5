<?php

class DetailController extends Controller
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
            if(in_array($this->loadModel($id)->resi_detail, Detail::model()->nojo())){
                    $this->render('view',array('model'=>$this->loadModel($id),));
            }else{
                    throw new CHttpException(404,'The requested page does not exist.');
            }
	}
	public function actionGetposisi(){//ajax
		$data=Posisi::model()->findAll('jenis=:jenis', 
		array(':jenis'=>Order::model()->find('no_jo="'.$_POST['no_jo'].'"')->stuffing));
		$data=CHtml::listData($data,'posisi','posisi');
		//echo "<option value=''></option>";
		foreach($data as $value=>$posisi)
		echo CHtml::tag('option', array('value'=>$value),CHtml::encode($posisi),true);
	}
	public function actionGetcustomer($q=null){
            if($_POST)$q=$_POST['q'];
            $cust=Order::model()->findByAttributes(array('no_jo'=>$q))->customer;
            if(!empty($cust)) echo $cust;
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Detail;
		if(isset($_POST['Detail']))
		{
			$model->attributes=$_POST['Detail'];
			$model->date=$this->tanggal_indo($model->date).' '.$_POST['Detail']['timepicker'];
			
			if($model->save()){
				$q="CALL sp_setstatus('".$model->resi_detail."')";
            $setstatus= Yii::app()->db->createCommand($q);
            $setstatus->execute();

				$messageType = 'success';
	            $message = "<strong>Well done!</strong> You successfully submit data ";
	            Yii::app()->user->setFlash($messageType, $message);
				$this->redirect(array('index'));
			}else{
				$messageType = 'error';
	            $message = "<strong>Oh no! </strong> cannot submit data ";
	            Yii::app()->user->setFlash($messageType, $message);
				$this->redirect(array('create',array('model'=>$model)));
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
		if(isset($_POST['Detail']))
		{
			$model->attributes=$_POST['Detail'];
			$model->date=$this->tanggal_indo($model->date).' '.$_POST['Detail']['timepicker'];
			
			if($model->save()){
				$q="CALL sp_setstatus('".$model->resi_detail."')";
            $setstatus= Yii::app()->db->createCommand($q);
            $setstatus->execute();
				$messageType = 'success';
	            $message = "<strong>Well done!</strong> You successfully update data ";
	            Yii::app()->user->setFlash($messageType, $message);
				$this->redirect(array('view','id'=>$model->id));
			}
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
		if(Yii::app()->request->isPostRequest){
			$this->loadModel($id)->delete();
		//Detail::model()->deleteByPk($id);
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
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
        		'name'=>'customer',
        		'value'=>'CHtml::link($data->customer,Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
        		),
        	array(
        		'type'=>'html',
        		'name'=>'tujuan',
        		'value'=>'CHtml::link($data->tujuan,Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
        		),
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
        		'name'=>'date',
        		'value'=>'CHtml::link(Controller::toDate($data->date),Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
        		),
        	array(
        		'type'=>'html',
        		'name'=>'posisi',
        		'value'=>'CHtml::link($data->posisi,Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
        		),
        	array(
        		'type'=>'html',
        		'name'=>'keterangan',
        		'value'=>'CHtml::link($data->keterangan,Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
        		),
            );

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model = new Tdetail('search');
        $model->unsetAttributes();
        $widget=$this->createWidget('ext.EDataTables.EDataTables', array(
		 'id'            => 'posisi-grid',
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
            $this->render('index',array('widget'=>$widget,'model'=>new Detail));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new Tdetail('search');
        $model->unsetAttributes();
        $c1=array('class'=> 'EButtonColumn',
                'template'=>'{update}{delete}',
			    'buttons'=>array(
			    	'update'=>array('url'=>'"update/".$data->id'),
			        'delete' => array(
			        	'url'=>'"delete/".$data->id',
			            'visible'=>'Yii::app()->user->getIsSuperuser()==1',           
			        ),
			    ),
            );
        array_push($this->columns,$c1);
        $widget=$this->createWidget('ext.EDataTables.EDataTables', array(
		 'id'            => 'posisi-grid',
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
		$this->render('admin',array('widget'=>$widget));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Detail the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Detail::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Detail $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='detail-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
