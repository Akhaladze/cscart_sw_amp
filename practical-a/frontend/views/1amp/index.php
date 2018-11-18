<?php
//namespace akiraz2\blog\assets;
/**
 * Project: yii2-blog for internal using
 * Author: akiraz2
 * Copyright (c) 2018.
 */

use yii\widgets\ListView;
use \akiraz2\blog\Module;
use \akiraz2\blog\assets\AppAsset;
use akiraz2\blog\models\BlogCategory;
use \kartik\icons\Icon;


AppAsset::register($this);  // $this - представляет собой объект представления

$this->registerCssFile('path/to/myfile');
rmrevin\yii\fontawesome\AssetBundle::register($this);




$this->title = Module::t('blog', 'Blog');
Yii::$app->view->registerMetaTag([
    'name' => 'description',
    'content' => Yii::$app->name. ' '.Module::t('blog', 'Blog')
]);
Yii::$app->view->registerMetaTag([
    'name' => 'keywords',
    'content' => Yii::$app->name.', '.Module::t('blog', 'Blog')
]);

if(Yii::$app->get('opengraph', false)) {
    Yii::$app->opengraph->set([
        'title' => $this->title,
        'description' => Module::t('blog', 'Blog'),
        //'image' => '',
    ]);
}
//$this->params['breadcrumbs'][] = '文章';

/*$this->breadcrumbs=[
    //$post->category->title => Yii::app()->createUrl('post/category', array('id'=>$post->category->id, 'slug'=>$post->category->slug)),
    '文章',
];*/

?>
<div class="blog-index">
    <div class="blog-index__header">
		 <h1 class="title title--1">База знаний<?php// echo Module::t('blog', 'Blog'); ?></h1>
	</div>
        
		<div class="container">
            <div class="row">
                <div class="col-md-10">
                   
				<hr />
				  <?php
                echo ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => '_brief',
                    'options' => [
							'class' => 'list-view'
					],
                    'layout' => '{items}{pager}{summary}'
                ]);
                ?>

			   </div>
				
				

                
		<div class="col-md-2">
          
          <div class="sidebar-module">
		  <h4>Другие разделы</h4>
		  
		  <?php print_r(BlogCategory::getCategory());?>
            <?= \yii\widgets\Menu::widget([
                            'items' => $cat_items,
                            'options' => [
                               // 'class' => 'blog-index__cat'
                                'class' => 'list-unstyled'
                            ]
                        ]);
                        ?>

        </div>
				
				<?php /* 
				<div class="col-md-5">
				
                    <div class="blog-index__search">
                        <?= \yii\widgets\Menu::widget([
                            'items' => $cat_items,
                            'options' => [
                                'class' => 'blog-index__cat'
                            ]
                        ]);
                        ?>
                    </div>
                </div>
				
				*/ ?>
				
            </div>

        
   


        </div>
	</div>
</div>


