<?php

class SiteController extends YiishopController
{
 //   public function filters()
	// {
	// 	return array(
	// 		'rights',
	// 	);
	// }
    /**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	public function actiongetTree(){
		if(empty(Yii::app()->user->kode_member)){
			//$this->tree();
		}else{
			//$this->tree(Yii::app()->user->kode_member);
		}
		
	}
	public function actionTruncate(){
		Yii::app()->session->destroy();
		$sql="TRUNCATE bonus;
TRUNCATE orders; TRUNCATE orderdetail;
TRUNCATE profiles;  TRUNCATE users; 
TRUNCATE cart;";
if(Yii::app()->db->createCommand($sql)->execute()==0){
	echo 'sukses kosongkan data';
$this->render('index');
}

	}
	
	public function actionIndex()
	{
		//$this->bonuspoinbelanja(2550000,'BY098098');
		//echo CVarDumper::dumpAsString(Controller::comboSponsor('8982387'),10,true);
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

public function admin(){
    $model=new User;
    $model->kode_member='-';
    $model->createtime=time();
    $model->username='admin';
    $model->password=md5($model->username);
    $model->activkey=UserModule::encrypting(microtime().$model->password);
    $model->email=$model->username.'@bestharmony.co.id';
    $model->status=1;
    $model->superuser=1;
    $model->level="Admin";
    //print_r($model);die;
   // if(is_null($kodeupline)){
      $model->kode_upline='admin';
    //}else{
      //$model->kode_upline=$kodeupline;
    //}
    //if(!is_null($sponsor)){
      //$model->sponsor=$sponsor;
    //}
  	$model->save();
}
public function inject($kodeupline=null,$sponsor=null,$i=0){
    $model=new User;
    $model->kode_member=Controller::autoformat();
    $model->createtime=time();
    $model->username=$model->kode_member;
    $model->password=md5($model->username);
    $model->activkey=UserModule::encrypting(microtime().$model->password);
    $model->email=$model->username.'@bestharmony.co.id';
    $model->status=1;
    if(is_null($kodeupline)){
      $model->kode_upline='#';
    }else{
      $model->kode_upline=$kodeupline;
    }
    if(!is_null($sponsor)){
      $model->sponsor=$sponsor;
    }
  	$model->save();
}
public function bukandistributor(){
	$cmd=Yii::app()->db->createCommand('select kode_member from users where level!="distributor"')->queryAll();
  foreach ($cmd as $ro) {
        for ($i = 0; $i < 10; $i++) {
        $this->inject($ro['kode_member'],$ro['kode_member'],$i);
      }
    }
}
public function actionIsi(){
	$this->inject();
	$this->bukandistributor();
	$this->bukandistributor();
	$this->bukandistributor();
	$this->admin();
	$this->redirect('../member/');
}
	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$this->layout='login';
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}