<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = 'https://amp.akademorto.kz/frontend/assets';
   // public $baseUrl = '@web/frontend/assets';
    public $css = [
       // 'css/site.css',			// css from yii advanced template
		'css/amp.css',  			// basic google amp css
		'css/sidebar.css',  		// google patern
		'css/amp-custom.css',		//http://github.com/basscss/bassplate
		//'css/boilerplate.css',		// google 
    ];
    public $js = [
	//	'js/.js',
	//	'js/.js',
    ];
    public $depends = [
      //  'yii\web\YiiAsset',
      //  'yii\bootstrap\BootstrapAsset',
    ];
}
