<?php

class MemberController extends Controller
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
				'actions'=>array('index','view','combosponsor','getsponsor'),
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
	
public function actioncomboSponsor($kode_member=null){
	if($_POST) $kode_member=$_POST['kode_member'];
	foreach ($this->combosponsor($kode_member) as $value) {
		echo '<option value="'.$value.'">'.$value.'</option>';
	}
}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($upline=NULL)
	{
		$model=new Member('search');
		$user=New User;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Member']))
		{
			$user->attributes=$_POST['Member'];
			$user->kode_member=Controller::autoformat();
			$user->username=$_POST['Member']['username'];
			$user->kode_upline=$_POST['Member']['kode_upline'];
			$user->sponsor=$_POST['Member']['sponsor'];
			$user->createtime=time();
			$user->password=md5($_POST['Member']['password']);
			$user->activkey=UserModule::encrypting(microtime().$user->password);
			$user->email=$_POST['Member']['email'];
    		$user->status=1;
			if(Controller::is_maxMember($user->kode_upline)){ //selain root
				if(!empty(Member::model()->findByAttributes(array('kode_member'=>$user->kode_member)))){//jika kode_member sudah ada generate format baru
					$user->kode_member=Controller::autoformat();
				}
				if($user->save()){
					//update profil
					$profil=Profil::model()->findByPk($user->id);
					$profil->nama=$_POST['Member']['nama'];
					$profil->nik=$_POST['Member']['nik'];
					$profil->alamat=$_POST['Member']['alamat'];
					$profil->hp=$_POST['Member']['hp'];
					$profil->bank=$_POST['Member']['bank'];
					$profil->rekening=$_POST['Member']['rekening'];
					$profil->save();
					$messageType = 'success';
		            $message = "<strong>Well done!</strong> You successfully submit data ";
		            Yii::app()->user->setFlash($messageType, $message);
					$this->redirect(array('view','id'=>$user->id));
				}
			}else{
				$messageType = 'warning';
	            $message = "<strong>Warning!</strong> Sudah Mencapai maximal membership";
	            Yii::app()->user->setFlash($messageType, $message);
			}
		}

		$this->render('create',array('model'=>$model,'upline'=>$upline));
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

		if(isset($_POST['Member']))
		{
			$model->attributes=$_POST['Member'];
			if($model->save())
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
	}
	public $columns=array(
		array(
		'type'=>'html',
		'name'=>'kode_member',
		'value'=>'CHtml::link($data->kode_member,Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
		),array(
		'type'=>'html',
		'name'=>'nama',
		'value'=>'CHtml::link($data->nama,Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
		),array(
		'type'=>'html',
		'name'=>'alamat',
		'value'=>'CHtml::link($data->alamat,Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
		),array(
		'type'=>'html',
		'name'=>'email',
		'value'=>'CHtml::link($data->email,Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
		),array(
		'type'=>'html',
		'name'=>'level',
		'value'=>'CHtml::link($data->level,Yii::app()->controller->createUrl("view",array("id"=>$data->id)))',
		),
	);

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Member('search');
		$model->unsetAttributes();

		$widget=$this->createWidget('ext.EDataTables.EDataTables', array(
		 'id'            => 'member-grid',
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
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Member('search');
		$model->unsetAttributes();
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
		$widget=$this->createWidget('ext.EDataTables.EDataTables', array(
		 'id'            => 'member-grid',
		 'dataProvider'  => $model->search($this->columns),
		 'ajaxUrl'       => $this->createUrl($this->getAction()->getId()),
		 'columns'       => $this->columns,
         'bootstrap'	=>true,
         'buttons'=>array('copy','excel','pdf'),
		));
		if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
		  $this->render('admin', array('widget' => $widget,));
		  return;
		} else {
		  echo json_encode($widget->getFormattedData(intval($_REQUEST['sEcho'])));
		  Yii::app()->end();
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Member::model()->findByAttributes(array('id'=>$id));
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='member-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionImport(){
		$model=new Member;
		if(isset($_POST['PpiHarian']))
		{
			if (!empty($_FILES)) {
				$tempFile = $_FILES['PpiHarian']['tmp_name']['fileImport'];
				$fileTypes = array('xls','xlsx'); // File extensions
				$fileParts = pathinfo($_FILES['PpiHarian']['name']['fileImport']);
				if (in_array(@$fileParts['extension'],$fileTypes)) {

					Yii::import('ext.heart.excel.EHeartExcel',true);
	        		EHeartExcel::init();
	        		$inputFileType = PHPExcel_IOFactory::identify($tempFile);
					$objReader = PHPExcel_IOFactory::createReader($inputFileType);
					$objPHPExcel = $objReader->load($tempFile);
					$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
					$baseRow = 2;
					$inserted=0;
					$read_status = false;
					while(!empty($sheetData[$baseRow]['A'])){
						$read_status = true;						
						//$id=  $sheetData[$baseRow]['A'];
						$ruang=  $sheetData[$baseRow]['B'];
						$bulan=  $sheetData[$baseRow]['C'];
						$tahun=  $sheetData[$baseRow]['D'];
						$rm=  $sheetData[$baseRow]['E'];
						$nama_pasien=  $sheetData[$baseRow]['F'];
						$diagnosa=  $sheetData[$baseRow]['G'];
						$bersih=  $sheetData[$baseRow]['H'];
						$bt=  $sheetData[$baseRow]['I'];
						$kotor=  $sheetData[$baseRow]['J'];
						$ilo=  $sheetData[$baseRow]['K'];
						$namaobat=  $sheetData[$baseRow]['L'];
						$dikubitus_hari_ke=  $sheetData[$baseRow]['M'];
						$sepsis_hari_ke=  $sheetData[$baseRow]['N'];
						$fresiko=  $sheetData[$baseRow]['O'];

						$model2=new PpiHarian;
						//$model2->id=  $id;
						$model2->ruang=  $ruang;
						$model2->bulan=  $bulan;
						$model2->tahun=  $tahun;
						$model2->rm=  $rm;
						$model2->nama_pasien=  $nama_pasien;
						$model2->diagnosa=  $diagnosa;
						$model2->bersih=  $bersih;
						$model2->bt=  $bt;
						$model2->kotor=  $kotor;
						$model2->ilo=  $ilo;
						$model2->namaobat=  $namaobat;
						$model2->dikubitus_hari_ke=  $dikubitus_hari_ke;
						$model2->sepsis_hari_ke=  $sepsis_hari_ke;
						$model2->fresiko=  $fresiko;

						try{
							if($model2->save()){
								$inserted++;
							}
						}
						catch (Exception $e){
							Yii::app()->user->setFlash('error', "{$e->getMessage()}");
							//$this->refresh();
						} 
						$baseRow++;
					}	
					Yii::app()->user->setFlash('success', ($inserted).' row inserted');	
				}	
				else
				{
					Yii::app()->user->setFlash('warning', 'Wrong file type (xlsx, xls, and ods only)');
				}
			}


			$this->render('admin',array(
				'model'=>$model,
			));
		}
		else{
			$this->render('admin',array(
				'model'=>$model,
			));
		}
	}
}
