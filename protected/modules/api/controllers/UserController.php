<?php

class UserController extends ApiBaseController
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionLogin(){
		if(!isset($_SERVER['HTTP_X_AUTHORIZATION'])) {
			$this->_sendResponse(200,json_encode(array("data"=>array("status"=>401,"error"=>"Unauthorized"),"title"=>"Unauthorized","message"=>"Sorry, you cannot see list resources.")
        ));
		}
		list($_SERVER["PHP_AUTH_USER"],$_SERVER["PHP_AUTH_PW"]) = explode(":" , base64_decode(substr($_SERVER["HTTP_X_AUTHORIZATION"],6)));
        $username= $_SERVER["PHP_AUTH_USER"];
        $password = $_SERVER["PHP_AUTH_PW"];
        if (strpos($username,"@")) {
            $user=User::model()->notsafe()->findByAttributes(array('email'=>$username));
        } else {
            $user=User::model()->notsafe()->findByAttributes(array('username'=>$username));
        }
        //var_dump($user);die;
        if($user===null){
        	if (strpos($username,"@")) {
                $this->_sendResponse(200,json_encode(array('success'=>false,'message'=>'Error: wrong email')));
            } else {
                $this->_sendResponse(200,json_encode(array('success'=>false,'message'=>'Error: wrong user')));
            }
        }   
        else if(Yii::app()->getModule('user')->encrypting($password)!==$user->password){
        	$this->_sendResponse(200,json_encode(array("data"=>array("status"=>401,"error"=>"Unauthorized"),"title"=>"Failed","message"=>"Username or password is incorrect, please try again.")
        ));

        }   
        else if($user->status==0&&Yii::app()->getModule('user')->loginNotActiv==false){
        	$this->_sendResponse(200, json_encode(
            	array("data"=>array("status"=>401,"error"=>"Unauthorized"),"title"=>"Failed","message"=>"Username or password is incorrect, please try again.")
            ));
        }   
        else if($user->status==-1){
            $this->_sendResponse(200, json_encode(array("data"=>array("status"=>401,"error"=>"Unauthorized"),"title"=>"Failed","message"=>"Username or password is incorrect, please try again.")));
        }

        $body=array(
            'data'=>array('status'=>200),
            'me'=>array('id'=>$user->id,
            		'username'=>$user->username,
            		'email'=>$user->email,
            		'role'=>$user->level,
        ),
        );
        $this->_sendResponse(200,json_encode($body));
    }
    public function actionMe(){
        if(!isset($_SERVER['HTTP_X_AUTHORIZATION'])) {
            $this->_sendResponse(200,json_encode(array("data"=>array("status"=>401,"error"=>"Unauthorized"),"title"=>"Unauthorized","message"=>"Sorry, you cannot see list resources.")
        ));
        }
        list($_SERVER["PHP_AUTH_USER"],$_SERVER["PHP_AUTH_PW"]) = explode(":" , base64_decode(substr($_SERVER["HTTP_X_AUTHORIZATION"],6)));
        $username= $_SERVER["PHP_AUTH_USER"];
        $user=User::model()->findAll('username='.$username);
        $body=array(
            'data'=>array('status'=>200),
            'me'=>array('id'=>$user->id,
                    'username'=>$user->username,
                    'email'=>$user->email,
                    'role'=>$user->level,
        ),
        );
        $this->_sendResponse(200,json_encode($body));
    }

    public function actionOperasional(){
    	$user=User::model()->findAll('level="operasional"');
    	foreach ($user as $value) {
    		$users[]=array('username'=>$value->username,
    						'id'=>$value->id,
    				);
    	}
    	$this->_sendResponse(200,json_encode($users));
    }
    public function actionAgen(){
    	$user=User::model()->findAll('level="agen"');
    	foreach ($user as $value) {
    		$users[]=array('username'=>$value->username,
    						'id'=>$value->id,
    				);
    	}
    	$this->_sendResponse(200,json_encode($users));
    }
    
    public function actionJoborder(){
    	$joborder=Order::model()->findAll('operasional_staff=""');
    	foreach ($joborder as $value) {
    		$order[]=array('no_jo'=>$value->no_jo,
    						'id'=>$value->id,
    				);
    	}
    	$this->_sendResponse(200,json_encode($order));
    }
    public function actionJoborderagen(){
    	$joborder=Order::model()->findAll('agen=""');
    	foreach ($joborder as $value) {
    		$order[]=array('no_jo'=>$value->no_jo,
    						'id'=>$value->id,
    				);
    	}
    	$this->_sendResponse(200,json_encode($order));
    }
    
}