<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
	'name'=> 'AMP Engine',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
	'homeUrl' => '/',
	//'defaultRoute' => '', //set blog as default route
   
		
    'components' => [
        'request' => [
           // 'csrfParam' => '_csrf-frontend',
				],
				
		'authClientCollection' => [
        'class' => 'yii\authclient\Collection',
        'clients' => [
            'linkedin' => [
                'class' => 'yii\authclient\clients\LinkedIn',
                'clientId' => '77fsbe7bij21j1',
                'clientSecret' => '96dVUXfJaeTl6OdI',
				],
			],
		],		

        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => false],
		],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'practical-a-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
		
        'errorHandler' => [
            'errorAction' => 'default/error',
        ],
		
		'urlManager' => [
            'enablePrettyUrl' 		=> true,
            'enableStrictParsing' 	=> true,
            'showScriptName' 		=> false,
			
		//	'suffix' => '/',
			
			'hostInfo' => 'https://amp.akademorto.kz',
			
            'rules' => [
				
			'/' => 'default/index',
			
			//страницы блога
            '/blog/shkola/<id\d+>' 							=> 'default/blog',
            '/blog/shkola/<page_name>/<id:\d+>' 			=> 'default/blog',
            '/blog/shkola/<catlev1>/<page_name>/<id:\d+>' 	=> 'default/blog',
			
			//страница корзины
            '/cart' 										=> 'default/cart',
            '/cart/<id:\d+>' 								=> 'default/cart',
            '/order/<id:\d+>' 								=> 'default/cart',
            '/order/addtocart' 								=> 'default/order',
            '/cart/addtocart' 								=> 'default/cart',
            '/checkout' 									=> 'default/checkout',
            
            
          //  '/order/<product_data>'							=> 'default/order',
            
		
			// страницы категорий

			'/cat/' 															=> 'default/cat',
			'/cat/<catlev1>/<id:\d+>' 											=> 'default/cat',
			'/cat/<catlev1>/<catlev2>/<id:\d+>' 								=> 'default/cat',
			'/cat/<catlev1>/<catlev2>/<catlev3>/<id:\d+>' 						=> 'default/cat',
			'/cat/<catlev1>/<catlev2>/<catlev3>/<catlev4>/<id:\d+>' 			=> 'default/cat',
			'/cat/<catlev1>/<catlev2>/<catlev3>/<catlev4>/<catlev5>/<id:\d+>' 	=> 'default/cat',
			
			// страиницы товара
			
			//'/good/' => 'default/good/',
			//'/good/<goodcat1>/<id:\d+>' => 'default/good',
			
			'/good/<catlev1>/<id:\d+>' 														=> 'default/good',
			'/good/<catlev1>/<goodname>/<id:\d+>' 											=> 'default/good',
			'/good/<catlev1>/<catlev2>/<goodname>/<id:\d+>'				 					=> 'default/good',
			'/good/<catlev1>/<catlev2>/<catlev3>/<goodname>/<id:\d+>' 						=> 'default/good',
			'/good/<catlev1>/<catlev2>/<catlev3>/<catlev4>/<goodname>/<id:\d+>' 			=> 'default/good',
			'/good/<catlev1>/<catlev2>/<catlev3>/<catlev4>/<catlev5>/<goodname>/<id:\d+>' 	=> 'default/good',
			
			// json feed for dynamic goods contens
			// obtaine good information in JSON format for Google AMP library
			
			'/catjsonfeed/<id:\d+>/<sort_mode>' 	=> 'default/catjsonfeed',
			'/catjsonfeed/<id:\w+>/<sort_mode>' 	=> 'default/catjsonfeed',
			'/catjsonfeed/<id:\w+>/<sort_mode>' 	=> 'default/catjsonfeed',
			'/catjsonfeed/<id:\w+>/<sort_mode>' 	=> 'default/catjsonfeed',
			
			
			'/' => 'default/redirect_to_main',
			
			
	[ 
	'class' 		=> 'yii\rest\UrlRule', 
	'controller' 	=> [ 
						'default' 
		], 

	  'tokens' => [ 
      '{catlev1}' 	=> '<catlev1:\\w>', 
      '{catlev2}' 	=> '<catlev2:\\w>', 
      '{catlev3}' 	=> '<catlev3:\\w>', 
      '{catlev5}' 	=> '<catlev5:\\w>', 
      '{goodcat1}' 	=> '<goodcat1:\\w>', 
      '{sort_mode}' => '<sort_mode:\\w>', 
      
	  '{page_name}' 	=> '<page_name:\\w>', 
      '{goodname}' 		=> '<goodname:\\w>', 
      '{name}' 			=> '<name:\\w>', 
      '{option}' 		=> '<option:\\w>', 
      
     ], 
     
    ] 
			
           
        ]
			
			
        ],
		
		
    ],
    
	'params' => $params,
];

