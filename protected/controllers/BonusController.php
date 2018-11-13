<?php

class BonusController extends Controller
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
				'actions'=>array('index','view'),
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
	/*public function actionCreate()
	{
		$model=new Bonus;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Bonus']))
		{
			$model->attributes=$_POST['Bonus'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}*/

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	/*public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Bonus']))
		{
			$model->attributes=$_POST['Bonus'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}*/

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	/*public function actionDelete($id)
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
	}*/
	public $columns=array(
		array(
        		'type'=>'html',
        		'name'=>'kode_member',
        		'value'=>'CHtml::link($data->kode_member,Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
        		),
		array(
        		'type'=>'html',
        		'name'=>'tanggal',
        		'value'=>'CHtml::link($data->tanggal,Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
        		),
		array(
        		'type'=>'html',
        		'name'=>'bonus',
        		'value'=>'CHtml::link($data->bonus,Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
        		),
		array(
        		'type'=>'html',
        		'name'=>'poin',
        		'value'=>'CHtml::link($data->poin,Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
        		),
		);

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Bonus('search');
		$model->unsetAttributes();

		$widget=$this->createWidget('ext.EDataTables.EDataTables', array(
		 'id'            => 'bonus-grid',
		 'dataProvider'  => $model->search($this->columns),
		 'ajaxUrl'       => $this->createUrl($this->getAction()->getId()),
		 'columns'       => $this->columns,
         'bootstrap'=>true,
		));
		if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
		  $this->render('index', array('widget' => $widget,));
		  return;
		} else {
		  echo json_encode($widget->getFormattedData(intval($_REQUEST['sEcho'])));
		  Yii::app()->end();
		}

		// $dataProvider=new CActiveDataProvider('Bonus');
		// $this->render('index',array(
		// 	'dataProvider'=>$dataProvider,
		// ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$ar1=array('class'=> 'EButtonColumn',
                'template'=>'{update}{delete}',
			    'buttons'=>array(
			    	'update'=>array(
			    		'url'=>'Yii::app()->createUrl("member/update/$data->id")',
			    		),
			        'delete' => array(
			        	'url'=>'Yii::app()->createUrl("member/delete/$data->id")',
			            'visible'=>'Yii::app()->user->getIsSuperuser()==1',           
			        ),
			    ));
        array_push($this->columns,$ar1);
        $model=new Bonus('search');
		$model->unsetAttributes();

		$widget=$this->createWidget('ext.EDataTables.EDataTables', array(
		 'id'            => 'bonus-grid',
		 'dataProvider'  => $model->search($this->columns),
		 'ajaxUrl'       => $this->createUrl($this->getAction()->getId()),
		 'columns'       => $this->columns,
         'bootstrap'=>true,
		));
		if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
		  $this->render('admin', array('widget' => $widget,));
		  return;
		} else {
		  echo json_encode($widget->getFormattedData(intval($_REQUEST['sEcho'])));
		  Yii::app()->end();
		}
		/*
		$model=new Bonus('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Bonus']))
			$model->attributes=$_GET['Bonus'];

		$this->render('admin',array(
			'model'=>$model,
		));*/
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Bonus::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='bonus-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
