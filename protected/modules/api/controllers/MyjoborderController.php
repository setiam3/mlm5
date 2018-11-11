<?php

class MyjoborderController extends ApiBaseController
{
	public function actionIndex()
	{
		$ops=Yii::app()->user->id;
		$criteria = new CDbCriteria();
		$criteria->select='no_jo';
		$criteria->addCondition('operasional_staff',5);
		$Order=Order::model()->findAll($criteria);
		foreach ($Order as $value) {
			$order[]=array('no_jo'=>$value->no_jo,
    						
    				);
    	}
    	$this->_sendResponse(200,json_encode($order));
	}
	public function loadModel($id)
	{
		$model=Order::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}