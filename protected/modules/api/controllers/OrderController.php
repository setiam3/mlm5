<?php

class OrderController extends ApiBaseController
{
	public function actionSetOps()
	{
		if(isset($_POST) && !empty($_POST) && !empty($_POST['ops'])&& !empty($_POST['selectedjo'])){
			$ops=$_POST['ops'];
			$selectedjo=$_POST['selectedjo'];
			$criteria = new CDbCriteria();
			$criteria->addInCondition('no_jo',$selectedjo); 

			if(Order::model()->updateAll(array('operasional_staff'=>$ops),$criteria)){
				$this->_sendResponse(200,json_encode(
					array('success'=>true,'message'=>'Success Set Operator','title'=>'Success')));
			}else{
				$this->_sendResponse(200,json_encode(
					array('success'=>false,'message'=>'Error: wrong user','title'=>'Error')));
			}
		}else{
			$this->_sendResponse(200,json_encode(
					array('success'=>false,'message'=>'Error: Fill data please..','title'=>'Error')));
		}
	}

	public function actionSetAgen()
	{
		if(isset($_POST) && !empty($_POST) && !empty($_POST['agen'])&& !empty($_POST['selectedjo'])){
			$agen=$_POST['agen'];
			$selectedjo=$_POST['selectedjo'];
			$criteria = new CDbCriteria();
			$criteria->addInCondition('no_jo',$selectedjo); 

			if(Order::model()->updateAll(array('agen'=>$agen),$criteria)){
				$this->_sendResponse(200,json_encode(
					array('success'=>true,'message'=>'Success Set Agen','title'=>'Success')));
			}else{
				$this->_sendResponse(200,json_encode(
					array('success'=>false,'message'=>'Error: wrong user','title'=>'Error')));
			}
		}else{
			$this->_sendResponse(200,json_encode(
					array('success'=>false,'message'=>'Error: Fill data please..','title'=>'Error')));
		}
	}
	public function actionOpshasjob($id){
		//$id = 5;
		$id = Yii::app()->request->getQuery('id'); 
		$order=array();
		$jobs=Order::model()->findAll('operasional_staff='.$id);
		foreach ($jobs as $value) {
    		$order[]=array('no_jo'=>$value->no_jo,
    						'id'=>$value->id,
    				);
    	}
    	$this->_sendResponse(200,json_encode($order));
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