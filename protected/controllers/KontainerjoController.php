<?php
class KontainerjoController extends Controller
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
			'model'=>Containerjo::model()->cache(1000)->findByAttributes(array('id'=>$id)),
		));
	}

	public function actionAjax($id)
	{ $this->layout='null';
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
    public function actionGetCustomer($q=null){
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
        //print_r($_POST);die;
            $model=new Kontainerjo;
            if(isset($_POST['Kontainerjo']))
            {
                $model->attributes=$_POST['Kontainerjo'];
                $images=CUploadedFile::getInstancesByName('foto');
                $foto2=CUploadedFile::getInstance($model,'foto2');
                //$extfoto2 = substr($foto2, strrpos($foto2, '.')+1);
                if($model->save()){
                    $typekontainer=Kontainer::model()->findAllByAttributes(array('type'=>$model->type_kontainer));
                    if(empty($typekontainer)){
                        $mkontainer=new Kontainer;
                        $mkontainer->type=$model->type_kontainer;
                        $mkontainer->save();
                    }
                    $model2 = Kontainerjo::model()->findByPk($model->id);
                    if (isset($images) && count($images) > 0){
                    $foto=array();
                    $i=1;
                    foreach ($images as $image=>$pic) {
                        $ext=substr($pic, strrpos($pic, '.')+1);
                        if(in_array($ext, $this->arrayImages)){
                            $pic->saveAs($this->imagesPath().$model->no_jo.'_'.$i.'_'.$model2->id.'.'.$ext);
                        }else{
                            $messageType = 'warning';
                            $message = "<strong>Only images file type allowed";
                            Yii::app()->user->setFlash($messageType, $message);
                            $this->redirect(array('create'));
                        }
                        $foto[]=$model->no_jo.'_'.$i.'_'.$model2->id.'.'.$ext;
                        //image resize
                    $image= Yii::app()->image->load($this->imagesPath().$model->no_jo.'_'.$i.'_'.$model2->id.'.'.$ext);
                    $image->resize(640,640);
                    $image->save();
                    $i++;
                    }
                $model2->foto= CJSON::encode($foto);
                $model2->save();
                        }
                        $messageType = 'success';
                        $message = "<strong>Well done!</strong> You successfully create data ";
                        Yii::app()->user->setFlash($messageType, $message);
                        $this->redirect(array('index'));
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
            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);
            if(isset($_POST['Kontainerjo']))
            {
                $model->attributes=$_POST['Kontainerjo'];
                $images=CUploadedFile::getInstancesByName('foto');
                $foto2=CUploadedFile::getInstance($model,'foto2');
                $extfoto2 = substr($foto2, strrpos($foto2, '.')+1);
                if($model->save()){
                    $typekontainer=Kontainer::model()->findAllByAttributes(array('type'=>$model->type_kontainer));
                    if(empty($typekontainer)){
                        $mkontainer=new Kontainer;
                        $mkontainer->type=$model->type_kontainer;
                        $mkontainer->save();
                    }
                    $model2 = Kontainerjo::model()->findByPk($model->id);
                    if(!empty($model2->foto)){
                        foreach(CJSON::decode($model2->foto) as $fotos){
                            //chown($this->imagesPath(), 666);
                            if(file_exists($this->imagesPath().$fotos)){
                            unlink($this->imagesPath().$fotos);
                            }
                        }
                    }
                    if (isset($images) && count($images) > 0){
                    $foto=array();
                    $i=1;
                    foreach ($images as $image=>$pic) {
                        $ext=substr($pic, strrpos($pic, '.')+1);
                        if(in_array($ext, $this->arrayImages)){
                            //echo 'simpan';
                            $pic->saveAs($this->imagesPath().$model->no_jo.'_'.$i.'_'.$model2->id.'.'.$ext);
                        }else{
                            $messageType = 'warning';
                            $message = "<strong>Only images file type allowed";
                            Yii::app()->user->setFlash($messageType, $message);
                            $this->redirect(array('create'));
                        }
                        $foto[]=$model->no_jo.'_'.$i.'_'.$model2->id.'.'.$ext;
                        //image resize
                    $image= Yii::app()->image->load($this->imagesPath().$model->no_jo.'_'.$i.'_'.$model2->id.'.'.$ext);
                    $image->resize(640,640);
                    $image->save();
                    $i++;
                }
                $model2->foto= CJSON::encode($foto);
                $model2->save();
                        }
                        $messageType = 'success';
                        $message = "<strong>Well done!</strong> You successfully create data ";
                        Yii::app()->user->setFlash($messageType, $message);
                        $this->redirect(array('index'));
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
        $model = new Containerjo('search');
        $model->unsetAttributes();
        
        $widget=$this->createWidget('ext.EDataTables.EDataTables', array(
         'id'            => 'kontainerjo-grid',
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
            $this->render('index',array('widget'=>$widget,'model'=>new Kontainerjo));
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
                'name'=>'nomor_kontainer',
                'value'=>'CHtml::link($data->nomor_kontainer,Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
                ),
            array(
                'type'=>'html',
                'name'=>'type_kontainer',
                'value'=>'CHtml::link($data->type_kontainer,Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
                ),
            array(
                'type'=>'html',
                'name'=>'komoditi',
                'value'=>'CHtml::link($data->komoditi,Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
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
            //array(
                //'type'=>'html',
                //'header'=>'Dokumen',
                //'value'=>'KontainerjoController::drbl($data->no_jo)'
                //'value'=>'($data->id==157)?"<a href=#><i class=entypo-air></i> B/L</a> <a href=#><i class=entypo-doc-text-inv></i> D/R</a>":""',
               // ),
            );
   
    public static function drbl($no_jo){
        //cek 
        $order=Order::model()->findByAttributes(array('no_jo'=>$no_jo));
        
        $dr=Deliveryreceipt::model()->findByAttributes(array('no_jo'=>$no_jo));
        if($order->status==='Kapal Berangkat'){
            $linkBL=KontainerjoController::bl($no_jo);
            if(count($dr)>0)
            $penerima=$dr['penerima'];
            $linkDR=CHtml::link('D/R',array('deliveryreceipt/download/'.$no_jo));
            $lnk=$linkBL.' '.$linkDR;
            return $lnk;
        }   
    }
    public static function bl($no_jo){
        $tbl=TBl::model()->findByAttributes(array('no_jo'=>$no_jo));
        if(!empty($tbl['foto']) && file_exists(Controller::imagesPath().$tbl['foto']))
            return CHtml::link('B/L',array('/images/'.$tbl['foto']));
    }
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
        $a1=array('class'=> 'EButtonColumn',
                'visible'=>'Yii::app()->controller->action->id=="b"',
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
		$model = new Containerjo('search');
        $model->unsetAttributes();
        $widget=$this->createWidget('ext.EDataTables.EDataTables', array(
         'id'            => 'kontainerjo-grid',
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
	 * @return Kontainerjo the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Kontainerjo::model()->cache(1000)->findByPk($id);
		return $model;
	}
    
	/**
	 * Performs the AJAX validation.
	 * @param Kontainerjo $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='kontainerjo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
