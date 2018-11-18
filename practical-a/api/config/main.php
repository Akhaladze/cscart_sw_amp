<?php

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        'v1' => [
            
            'basePath' 	=> '@api/modules/v1',
            'class' 	=> 'app\api\modules\v1\Module'   
        ],
		
		
    ],
	
    'components' => [
        'user' => [
            'identityClass' => 'models\User',
         //   'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
			'enableSession' => false,
			'loginUrl' => ''
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
			
        
		'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/pb'   
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],
				[
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/orders'  
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                       
                    ]
                ],
				[
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/rr'   
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],
				
				[
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/tts'   
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],
				[
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/ss'   
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],
				[
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/auth'   
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],
				[
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/user'   
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],
				
				[
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/apiimage'   
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],
				[
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/Nalogi'   
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ]
				
				
            ],
        ]
    ],
    'params' => $params,
];