<?php
Yii::import('ext.EDataTables.EDataTables.*');
class KabupatenKotaController extends Controller
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
			'rights'
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	

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
		$model=new KabupatenKota;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['KabupatenKota']))
		{
			$model->attributes=$_POST['KabupatenKota'];
			if($model->save())
				$messageType = 'success';
	            $message = "<strong>Well done!</strong> You successfully submit data ";
	            Yii::app()->user->setFlash($messageType, $message);
				$this->redirect(array('view','id'=>$model->id));
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

		if(isset($_POST['KabupatenKota']))
		{
			$model->attributes=$_POST['KabupatenKota'];
			if($model->save())
				$messageType = 'success';
	            $message = "<strong>Well done!</strong> You successfully submit data ";
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

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model = new KabupatenKota('search');
            $model->unsetAttributes();
            $columns=array('name','alias',
                
                );
            $widget=$this->createWidget('ext.EDataTables.EDataTables', array(
 'id'            => 'id',
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
		$this->render('index', array('widget' => $widget,));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
            $model = new KabupatenKota('search');
            $model->unsetAttributes();
            $columns=array('name','alias',
                array('class'=> 'EButtonColumn',
                    'template'=>'{update}{del}',
    'buttons'=>array
    (
        'del' => array
        (
            'label'=>'<i class="entypo-trash"></i>',
            'url'=>'Yii::app()->controller->createUrl("delete",array("id"=>$data->primaryKey))',
            'options'=>array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' =>'Delete',
                'submit'=>'js:$(this).attr("href")',
                'confirm'=>'Yakin akan dihapus?',
                ),
        ),
    ),),
                );
            $widget=$this->createWidget('ext.EDataTables.EDataTables', array(
 'id'            => 'id',
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
		$this->render('admin', array('widget' => $widget,));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return KabupatenKota the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=KabupatenKota::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param KabupatenKota $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='kabupaten-kota-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
