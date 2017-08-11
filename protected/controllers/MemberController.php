<?php

class MemberController extends Controller
{
	public function actionAdmin()
	{
		$this->render('admin');
	}

	public function actionDelete()
	{
		$this->render('delete');
	}

	public function actionIndex()
	{
            $dataProvider=new CActiveDataProvider('Order');
            $widget=$this->createWidget('ext.EDataTables.EDataTables', array(
 'id'            => 'products',
 'dataProvider'  => $dataProvider,
 'ajaxUrl'       => $this->createUrl('/products/index'),
 'columns'       => array('no_jo'),
));
if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
  $this->render('index', array('widget' => $widget,));
  return;
} else {
  echo json_encode($widget->getFormattedData(intval($_REQUEST['sEcho'])));
  Yii::app()->end();
}
		//$this->render('index');
	}

	public function actionUpdate()
	{
		$this->render('update');
	}

	public function actionView()
	{
		$model=$this->loadModel(Yii::app()->user->id);
		$this->render('view',array('model'=>$model));
	}

	
	public function filters(){
		// return the filter configuration for this controller, e.g.:
		return array(
			'rights'
		);
	}
	public function loadModel($id)
	{
		$model=Member::model()->cache(1000)->findByAttributes(array('id'=>$id));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}