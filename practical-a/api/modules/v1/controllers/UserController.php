<?php
namespace app\api\modules\v1\controllers;


use Yii;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;
use yii\helpers\ArrayHelper;




use yii\web\IdentityInterface;
use app\models\user;




use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\db\ActiveRecord;
use yii\behaviors\TimeStampBehavior;
use yii\base\Model;

//use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;



class UserController extends ActiveController  {
	

	
   public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => [
									
									'login',
									
									],
                        'allow' => true,
                       
                    ]
                ],
            ],
			
			
			
			'basicAuth' => [
            'class' => \yii\filters\auth\HttpBasicAuth::class,
			'auth' => [$this, 'auth'],
			'only' => ['login'],
           
        ],
		//	'authenticator' = >  [
									
			//					'class' => CompositeAuth::class,
			//											
			//											'authMethods' => [
			//														//HttpBasicAuth::class,
			//														HttpBearerAuth::class,
//	=> ['except' => ['signup', 'sign_in']],
																	
					'authenticator' => [			
					'class' => \yii\filters\auth\HttpBearerAuth::class,
					'except' => ['signup', 'login']
			],								
									
			
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                   
                    'login' => ['post'],
                    
                ],
            ],
        ]);
    }


public function auth($username, $password)
    {		
		$api_token = $username . ':' . $password;
		//$api_token = base64_decode($api_token);
        return \app\models\User::findIdentityByApiToken($api_token);
    }
	
	
	

 public $modelClass = 'app\models\User';
 
 
 
 public function actionLogin() {
		

	if (Yii::$app->request->getBodyParam('username') && Yii::$app->request->getBodyParam('password')) {
		
		$request = Yii::$app->request->BodyParams;
		
		$username = $request['username']; 
		$password = $request['password'];
		
		
		if ($get_user = User::findByUsername($username)) {
			
			 if($get_user->validatePassword($password)) {
			
					return $get_user; 
				 
			 } else {
				 
				 goto error_pass;
				 
			 }

		}
		
		
		else {
			error_pass:
			
				$result['error_marker'] = 1;
				$result['error_code'] = 'Вы ввели неправильный логин или пароль';
			return $result; 
			
			}
		
		}
	}
 
	
}

	

?>