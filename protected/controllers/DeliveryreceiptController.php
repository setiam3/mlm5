<?php
class DeliveryreceiptController extends Controller
{
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
	public function actionSubmit(){
		print_r($_POST);
	}
	public function actionCreate()
	{
			if(isset($_GET['q'])){
			$nojo=$_GET['q'];
			$v=Containerjo::model()->findAllByAttributes(array('no_jo'=>$nojo));
			$i=1;
			echo '<form action="'.Yii::app()->createUrl($this->id.'/create').'" method="post">';
			echo '<table class="table"><tr>
			<th>nomor D/R</th>
			<th>Kapal / Voyage</th>
			<th>pelayaran</th>
			<th>nomor kontainer</th>
			<th>komoditi</th>
			<th>penerima</th>
			<th>alamat</th>
			<th>up</th>
			</tr>
			<tbody>
			';
			
			foreach ($v as $value) {
				echo '<tr>';
				echo CHtml::hiddenField('q',$value->no_jo);
				echo '<td>'.'DR_'.$value->no_jo.'.'.$i.CHtml::hiddenField('Deliveryreceipt['.$i.'][nomor_dr]','DR_'.$value->no_jo.'.'.$i).'</td>';
				echo '<td>'.$value->kapal.' '.$value->voyage.'</td>';
				echo CHtml::hiddenField('Deliveryreceipt['.$i.'][kapal]',$value->kapal);
				echo CHtml::hiddenField('Deliveryreceipt['.$i.'][voyage]',$value->voyage);
				echo CHtml::hiddenField('Deliveryreceipt['.$i.'][pelayaran]',$value->pelayaran);
				echo CHtml::hiddenField('Deliveryreceipt['.$i.'][nomor_kontainer]',$value->nomor_kontainer);
				echo '<td>'.$value->pelayaran.'</td>';
				echo '<td>'.$value->nomor_kontainer.'</td>';
				echo '<td>'.CHtml::textArea('Deliveryreceipt['.$i.'][komoditi]',$value->komoditi).'</td>';
				echo '<td>'.CHtml::textField('Deliveryreceipt['.$i.'][penerima]',$value->penerima).'</td>';
				echo '<td>'.CHtml::textField('Deliveryreceipt['.$i.'][alamat_penerima]','').'</td>';
				echo '<td>'.CHtml::textField('Deliveryreceipt['.$i.'][up_penerima]','').'</td>';
				echo '</tr>';
				$i++;
			}
			
			echo '</tbody></table>';
			echo CHtml::submitButton('save',array('class'=>'btn btn-blue'));
			echo '</form>';
			die;
		}elseif(isset($_POST['Deliveryreceipt']))
		{
			if(isset($_POST['Deliveryreceipt'])?$detail=$_POST['Deliveryreceipt']:$detail=NULL);//colect data detail
			 foreach ($detail as $t) {//looping
			 	//print_r($t['kapal']);die;
                    $dr=new Deliveryreceipt;
                    $dr->nomor_dr=$t['nomor_dr'];
                    $dr->kapal=$t['kapal'];
                    $dr->voyage=$t['voyage'];
                    $dr->pelayaran=$t['pelayaran'];
                    $dr->nomor_kontainer=$t['nomor_kontainer'];
                    $dr->komoditi=$t['komoditi'];
                    $dr->penerima=$t['penerima'];
                    $dr->alamat_penerima=$t['alamat_penerima'];
                    $dr->up_penerima=$t['up_penerima'];
                        $dr->save(); //jk sukses maka simpan
                }

				$messageType = 'success';
                $message = "<strong>Well done!</strong> You successfully create data ";
                Yii::app()->user->setFlash($messageType, $message);
				$this->redirect(array('index'));
		}

		$this->render('create');
	
	}
	public function actionGetcustomer($q=null){
		if(Yii::app()->request->isAjaxRequest)
		{
            if($_POST)$q=$_POST['q'];
            $cust=Containerjo::model()->findByAttributes(array('nomor_kontainer'=>$q));
            	$arrayget['penerima']=$cust->penerima;
            	$arrayget['agen']=$cust->agen;
            	$arrayget['no_jo']=$cust->no_jo;
            	$arrayget['tujuan']=$cust->tujuan;
            	$arrayget['id']=$cust->id;
            	$arrayget['kapal']=$cust->kapal;
            	$arrayget['customer']=$cust->customer;
            
            echo json_encode($arrayget);
	}
	if(Yii::app()->controller->action->id==='update'){
		$cust=Containerjo::model()->findByAttributes(array('nomor_kontainer'=>$q));
            	//$arrayget['customer']=$cust->customer;
            	//$arrayget['agen']=$cust->agen;
            	return $cust;
	}
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
		// $this->performAjaxValidation($model); 139.194.179.68

		if(isset($_POST['Deliveryreceipt']))
		{
			$model->attributes=$_POST['Deliveryreceipt'];

			if($model->save())
				$messageType = 'success';
                $message = "<strong>Well done!</strong> You successfully update data ";
                Yii::app()->user->setFlash($messageType, $message);
				$this->redirect(array('index'));
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
		$model = new Deliveryreceipt('search');
        $model->unsetAttributes();
        $widget=$this->createWidget('ext.EDataTables.EDataTables', array(
         'id'            => 'dr-form',
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
	public $columns=array(
		array(
                'type'=>'html',
                'name'=>'nomor_dr',
                'value'=>'CHtml::link($data->nomor_dr,Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
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
                'name'=>'nomor_kontainer',
                'value'=>'CHtml::link($data->nomor_kontainer,Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
                ),
		array(
                'type'=>'html',
                'name'=>'komoditi',
                'value'=>'CHtml::link($data->komoditi,Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
                ),
		array(
                'type'=>'html',
                'name'=>'penerima',
                'value'=>'CHtml::link($data->penerima,Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
                ),
		array(
                'type'=>'html',
                'header'=>'Attachment',
                'value'=>'CHtml::link("<i class=entypo-air></i>D/R","tesDR")',
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
		$model = new Deliveryreceipt('search');
        $model->unsetAttributes();
        $widget=$this->createWidget('ext.EDataTables.EDataTables', array(
         'id'            => 'dr-form',
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
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Deliveryreceipt::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='deliveryreceipt-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
