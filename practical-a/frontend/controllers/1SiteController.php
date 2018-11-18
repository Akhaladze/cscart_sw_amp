<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

use yii\helpers\Url;
use yii\helpers\StringHelper;

use yii\widgets\ListView;
use \akiraz2\blog\Module;
use \akiraz2\blog\assets\AppAsset;
use akiraz2\blog\models\BlogCategory;
use akiraz2\blog\models\BlogPost;

use app\components\AuthHandler;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup', 'auth'],
                'rules' => [
                    [
                        'actions' => ['signup','auth'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout','auth'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'auth' => ['post','get'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
			
			'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'onAuthSuccess'],
            ],
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
	
	 public function onAuthSuccess($client)
    {
        (new AuthHandler($client))->handle();
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Displays codex.
     *
     * @return mixed
     */
    public function actionCodex()
    {
        return $this->render('codex');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
	
	
	/**
     * Output RSS.
     *
     * @return RSS Channels Data
     */
	 
    public function actionRss()
    {
		
		$this->layout = '@app/views/layouts/rss.php';
		/*
		$dataProvider = new \yii\data\ActiveDataProvider([
            'query' => \akiraz2\blog\models\BlogPost::find()
                ->orderBy(['created_at' => SORT_DESC]),
            'pagination' => [
            'pageSize' => 10
            ],
        ]);

        $response = Yii::$app->getResponse();
        $headers = $response->getHeaders();

        $headers->set('Content-Type', 'application/rss+xml; charset=utf-8');

        $response->content = \Zelenin\yii\extensions\Rss\RssView::widget([
            'dataProvider' => $dataProvider,
            
			
			'channel' => [
                'title' => 'База Знаний::Только проверенные решения и удобные примеры',
                'link' => Url::toRoute('/', true),
                'description' => 'В нашем блоге Вы найдете информацию о том как работать с Yii2, научитесь реальным примерам использования Kali Linux и kali NetHunter, узнаете тонкости настройки телефонии при помощи Asterisk, узнаете много нового о дополнительных функциях OС Windows и Linux. И помните - мы на белой стороне!',
                'language' => Yii::$app->language
            ],
            'items' => [
                'title' => function ($model, $widget) {
                        return $model->title;
                    },
                'description' => function ($model, $widget) {
                        return StringHelper::truncateWords($model->brief, 50);
                    },
                'link' => function ($model, $widget) {
                        return Url::toRoute(['blog/view', 'id' => $model->id, 'slug' => $model->slug], true);
                    },
                'guid' => function ($model, $widget) {
                        return Url::toRoute(['blog/view', 'id' => $model->id, 'slug' => $model->slug], true);
                    },
                'pubDate' => function ($model, $widget) {
                        $date = \DateTime::createFromFormat('U', $model->created_at);
                        return $date->format(DATE_RSS);
                    },
            ]
        ]);
		*/
		
		
		/*
		$feed = new \sokolnikov911\YandexTurboPages\Feed;
		$channel = new \sokolnikov911\YandexTurboPages\Channel();
		
		$channel
			->title('База Знаний::Только проверенные решения и удобные примеры')
			->link('https://space-warriors.com')
			->description('В нашем блоге Вы найдете информацию о том как работать с Yii2, научитесь реальным примерам использования Kali Linux и kali NetHunter, узнаете тонкости настройки телефонии при помощи Asterisk, узнаете много нового о дополнительных функциях OС Windows и Linux. И помните - мы на белой стороне!')
			->language(Yii::$app->language)
			->appendTo($feed);
			
			
			$dataProvider = new \yii\data\ActiveDataProvider([
				'query' => \akiraz2\blog\models\BlogPost::find()
						->orderBy(['created_at' => SORT_DESC]),
						
				'pagination' => [
				'pageSize' => 10
				],
			]);
			
			$posts = $dataProvider->getModels();
			
			foreach ($posts as $post)  
				{
						$turboHeader = new \sokolnikov911\YandexTurboPages\TurboContentHeader();
						$turboHeader
							->titleH1($post['title'])
							->titleH2($post['brief'])
							->img('https://space-warriors.com/frontend/web/img/blog/blogPost/15.jpg');
							
							
					
								   
						
						$item = new \sokolnikov911\YandexTurboPages\Item();
						$item
							->title($post['title'])			
						//	->link('blog/view/?' . $post['id'] . '-' . $post['slug'])
						//	->link('https://space-warriors.com/blog/view?id=15&slug=dobavlaem-yandex-turbo-pages-v-yii2')
							->author($post->user->username)
							->category($post->category->title)
							->turboContent($turboHeader->asHTML() . $post['content'])
							->pubDate($post['created_at'])
							->appendTo($channel);

				}
				
				return $this->render('rss', [
												'feed' => $feed,
											]);

		*/									
			$dataProvider = new \yii\data\ActiveDataProvider([
				'query' => \akiraz2\blog\models\BlogPost::find()
						->orderBy(['created_at' => SORT_DESC]),
						
				'pagination' => [
				'pageSize' => 100
				],
			]);
		
			$posts = $dataProvider->getModels();
											
$feed = new \sokolnikov911\YandexTurboPages\Feed();
$channel = new \sokolnikov911\YandexTurboPages\Channel();
$channel
    ->title('База Знаний::Только проверенные решения и удобные примеры')
	->link('https://space-warriors.com')
	->description('В нашем блоге Вы найдете информацию о том как работать с Yii2, научитесь реальным примерам использования Kali Linux и kali NetHunter, узнаете тонкости настройки телефонии при помощи Asterisk, узнаете много нового о дополнительных функциях OС Windows и Linux. И помните - мы на белой стороне!')
	->language(Yii::$app->language)	
   // ->adNetwork(\sokolnikov911\YandexTurboPages\Channel::AD_TYPE_YANDEX, 'RA-123456-7', 'first_ad_place')
    ->appendTo($feed);

$googleCounter = new \sokolnikov911\YandexTurboPages\Counter(\sokolnikov911\YandexTurboPages\Counter::TYPE_GOOGLE_ANALYTICS, 'UA-119121537-2');
$googleCounter->appendTo($channel);
$yandexCounter = new \sokolnikov911\YandexTurboPages\Counter(\sokolnikov911\YandexTurboPages\Counter::TYPE_YANDEX, 50986358);
$yandexCounter->appendTo($channel);


foreach ($posts as $post)  
				{
$item = new \sokolnikov911\YandexTurboPages\Item();
// Item with enabled turbo mode

$turboHeader = new \sokolnikov911\YandexTurboPages\TurboContentHeader();
						$turboHeader
							->titleH1($post['title'])
							->titleH2($post['brief'])
							->img('https://space-warriors.com/frontend/web/img/blog/blogPost/15.jpg');


$item
    ->title($post['title'])
    ->link(Url::toRoute(['blog/view', 'id' => $post['id']], true))
	->author($post->user->username)
	->category($post->category->title)
	->turboContent($turboHeader->asHTML() . htmlspecialchars_decode ($post['content']))
	->pubDate($post['created_at'])
    ->appendTo($channel);
//$relatedItemsList = new \sokolnikov911\YandexTurboPages\RelatedItemsList();
//$relatedItem = new \sokolnikov911\YandexTurboPages\RelatedItem('Related article 1', 'http://www.example.com/related1.html');
//$relatedItem->appendTo($relatedItemsList);
//$relatedItem = new \sokolnikov911\YandexTurboPages\RelatedItem('Related article 2', 'http://www.example.com/related2.html',
//    'http://www.example.com/related2.jpg');
//$relatedItem->appendTo($relatedItemsList);
//$relatedItemsList
//    ->appendTo($item);
				}
	

return $feed;											
											
									
    }
	
/* 
	
	public function onAuthSuccess($client)
    {
        $attributes = $client->getUserAttributes();

       
        $auth = Auth::find()->where([
            'source' => $client->getId(),
            'source_id' => $attributes['id'],
        ])->one();
        
        if (Yii::$app->user->isGuest) {
            if ($auth) { // авторизация
                $user = $auth->user;
                Yii::$app->user->login($user);
            } else { // регистрация
                if (isset($attributes['email']) && User::find()->where(['email' => $attributes['email']])->exists()) {
                    Yii::$app->getSession()->setFlash('error', [
                        Yii::t('app', "Пользователь с такой электронной почтой как в {client} уже существует, но с ним не связан. Для начала войдите на сайт использую электронную почту, для того, что бы связать её.", ['client' => $client->getTitle()]),
                    ]);
                } else {
                    $password = Yii::$app->security->generateRandomString(6);
                    $user = new User([
                        'username' => $attributes['login'],
                        'email' => $attributes['email'],
                        'password' => $password,
                    ]);
                    $user->generateAuthKey();
                    $user->generatePasswordResetToken();
                    $transaction = $user->getDb()->beginTransaction();
                    if ($user->save()) {
                        $auth = new Auth([
                            'user_id' => $user->id,
                            'source' => $client->getId(),
                            'source_id' => (string)$attributes['id'],
                        ]);
                        if ($auth->save()) {
                            $transaction->commit();
                            Yii::$app->user->login($user);
                        } else {
                            print_r($auth->getErrors());
                        }
                    } else {
                        print_r($user->getErrors());
                    }
                }
            }
        } else { // Пользователь уже зарегистрирован
            if (!$auth) { // добавляем внешний сервис аутентификации
                $auth = new Auth([
                    'user_id' => Yii::$app->user->id,
                    'source' => $client->getId(),
                    'source_id' => $attributes['id'],
                ]);
                $auth->save();
            }
        }
    }
	
*/ 
	
}
