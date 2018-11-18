<?php
namespace frontend\controllers;

/*
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;


use akiraz2\blog\models\BlogCategory;
use akiraz2\blog\models\BlogComment;
use akiraz2\blog\models\BlogCommentSearch;
use akiraz2\blog\models\BlogPost;
use akiraz2\blog\models\BlogPostSearch;
use akiraz2\blog\Module;
*/



use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
//use yii\rest\Controller;
//use yii\filters\VerbFilter;
//use yii\filters\AccessControl;

use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

use common\models\ApiData;


use yii\rest\UrlRule;

/**
 * Site controller
 */
class DefaultController extends Controller
{
	
	
    /**
     * @inheritdoc
     */
/*
	 
 public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup', 'index'],
                'rules' => [
                    [
                        'actions' => ['signup', 'index'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                   
                    'index' => ['get', 'post'],
                    'logout' => ['post'],
                ],
            ],
        ];
    }
*/


 //   use ModuleTrait;

    /**
     * @inheritdoc
     */
   /* public function actions()
    {
        return [
            'captcha' => [
                'class' => 'lesha724\MathCaptcha\MathCaptchaAction',
            ],
        ];
    }

	*/
    /**
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
	
	
   // public function actions()
    public function actionIndex()
	{

		$this->layout = '@app/views/layouts/amp.php';
		

		//$request = Yii::$app->request->queryParams;
	//	$request['0'] = Yii::$app->request;
	//	$request['1'] = Yii::$app->request->queryParams;
	//	$request['2'] = Yii::$app->request->bodyParams;
		$request = Yii::$app->request->rawBody;
 
	/*   

	   if (1 === null) {
            throw new NotFoundHttpException(Yii::t('yii', 'Page not found.'));
        } 
		
		else {
			       
*/
			 return $this->render('view', 
			 ['request' => $request]);
			
	//	}


       
    }

	public function actionCat()
	{

		$this->layout = '@app/views/layouts/amp.php';
		
		//$request = Yii::$app->request->queryParams;
	//	$request['0'] = Yii::$app->request;
	//	$request['1'] = Yii::$app->request->queryParams;
	//	$request['2'] = Yii::$app->request->bodyParams;
		$request = Yii::$app->request->rawBody;
		$request = Yii::$app->request;

	/*   

	   if (1 === null) {
            throw new NotFoundHttpException(Yii::t('yii', 'Page not found.'));
        } 
		
		else {
			       
*/
			 return $this->render('view', 
			 ['request' => $request]);
			
	//	}


    }

	
	public function actionGood()
	{

		$this->layout = '@app/views/layouts/amp.php';
		
		//$request = Yii::$app->request->queryParams;
	//	$request['0'] = Yii::$app->request;
	//	$request['1'] = Yii::$app->request->queryParams;
	//	$request['2'] = Yii::$app->request->bodyParams;
		$request = Yii::$app->request->rawBody;

	/*   

	   if (1 === null) {
            throw new NotFoundHttpException(Yii::t('yii', 'Page not found.'));
        } 
		
		else {
			       
*/
			 return $this->render('view', 
			 ['request' => $request]);
			
	//	}


    }
	

	public function actionBlog()
	{

		$this->layout = '@app/views/layouts/amp.php';
		
		//$request = Yii::$app->request->queryParams;
	//	$request['0'] = Yii::$app->request;
	//	$request['1'] = Yii::$app->request->queryParams;
	//	$request['2'] = Yii::$app->request->bodyParams;
		$request = Yii::$app->request->rawBody;

	/*   

	   if (1 === null) {
            throw new NotFoundHttpException(Yii::t('yii', 'Page not found.'));
        } 
		
		else {
			       
*/
			 return $this->render('view', 
			 ['request' => $request]);
			
	//	}


    }
	
		public function actionError()
	{

		$this->layout = '@app/views/layouts/error.php';
		
		//$request = Yii::$app->request->queryParams;
	//	$request['0'] = Yii::$app->request;
	//	$request['1'] = Yii::$app->request->queryParams;
	//	$request['2'] = Yii::$app->request->bodyParams;
		$request = Yii::$app->request->rawBody;

	/*   

	   if (1 === null) {
            throw new NotFoundHttpException(Yii::t('yii', 'Page not found.'));
        } 
		
		else {
			       
*/
			 return $this->render('error', 
			 ['request' => $request]);
			
	//	}


    }
	
	
	
	
}

	
	
	
	
	
	
	
	
	
	



