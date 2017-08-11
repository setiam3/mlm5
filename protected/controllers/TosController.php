<?php

class TosController extends Controller
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
			'rights', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
		$model=new TOS;

		if(isset($_POST['TOS']))
		{
			$model->attributes=$_POST['TOS'];
			if($model->save()){
				$messageType = 'success';
	            $message = "<strong>Well done!</strong> You successfully create data ";
	            Yii::app()->user->setFlash($messageType, $message);
				$this->redirect(array('view','id'=>$model->id));}
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
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['TOS']))
		{
			$model->attributes=$_POST['TOS'];
			if($model->save())
				$messageType = 'success';
	            $message = "<strong>Well done!</strong> You successfully update data ";
	            Yii::app()->user->setFlash($messageType, $message);
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
		$this->loadModel($id)->delete();
		$messageType = 'success';
	            $message = "<strong>Well done!</strong> You successfully delete data ";
	            Yii::app()->user->setFlash($messageType, $message);

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model = new TOS('search');
        $model->unsetAttributes();
        $columns=array(
        	array(
        		'type'=>'html',
        		'name'=>'kode',
        		'value'=>'CHtml::link($data->kode,Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
        		),
        	array(
        		'type'=>'html',
        		'name'=>'tos',
        		'value'=>'CHtml::link($data->tos,Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
        		),
            );
        $widget=$this->createWidget('ext.EDataTables.EDataTables', array(
		 'id'            => 'posisi-grid',
		 'dataProvider'  => $model->search($columns),
		 'ajaxUrl'       => $this->createUrl($this->getAction()->getId()),
		 'columns'       => $columns,
		                'bootstrap'=>true,
		));
		if (Yii::app()->getRequest()->getIsAjaxRequest()) {
			echo json_encode($widget->getFormattedData(intval($_GET['sEcho'])));
			Yii::app()->session[$_COOKIE['PHPSESSID']]= $_SERVER['REQUEST_URI'];
			Yii::app()->end();
			return;
		}
		$this->render('index',array('widget'=>$widget,));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new TOS('search');
        $model->unsetAttributes();
        $columns=array(
        	array(
        		'type'=>'html',
        		'name'=>'kode',
        		'value'=>'CHtml::link($data->kode,Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
        		),
        	array(
        		'type'=>'html',
        		'name'=>'tos',
        		'value'=>'CHtml::link($data->tos,Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
        		),
        	array('class'=> 'EButtonColumn',
                'template'=>'{update}{delete}',
			    'buttons'=>array(
			        'delete' => array(
			            'visible'=>'Yii::app()->user->getIsSuperuser()==1',           
			        ),
			    ),),
            );
        $widget=$this->createWidget('ext.EDataTables.EDataTables', array(
		 'id'            => 'posisi-grid',
		 'dataProvider'  => $model->search($columns),
		 'ajaxUrl'       => $this->createUrl($this->getAction()->getId()),
		 'columns'       => $columns,
		                'bootstrap'=>true,
		));
		if (Yii::app()->getRequest()->getIsAjaxRequest()) {
			echo json_encode($widget->getFormattedData(intval($_GET['sEcho'])));
			Yii::app()->session[$_COOKIE['PHPSESSID']]= $_SERVER['REQUEST_URI'];
			Yii::app()->end();
			return;
		}
		$this->render('admin',array('widget'=>$widget,));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return TOS the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=TOS::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param TOS $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
