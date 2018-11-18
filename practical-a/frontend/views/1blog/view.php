<?php
/**
 * Project: yii2-blog for internal using
 * Author: akiraz2
 * Copyright (c) 2018.
 */
/* @var $this \yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */

use akiraz2\blog\Module;
use yii\helpers\Html;
use akiraz2\blog\assets\AppAsset;


AppAsset::register($this);  // $this - представляет собой объект представления
rmrevin\yii\fontawesome\AssetBundle::register($this);


$this->title = $post->title;
Yii::$app->view->registerMetaTag([
    'name' => 'description',
    'content' => $post->brief
]);
Yii::$app->view->registerMetaTag([
    'name' => 'keywords',
    'content' => $this->title
]);

if(Yii::$app->get('opengraph', false)) {
					Yii::$app->opengraph->set([
						'title' => $this->title,
						'description' => $post->brief,
						'image' => $post->getImageFileUrl('banner'),
					]);
}

$this->params['breadcrumbs'][] = [
    'label' => Module::t('blog', 'Blog'),
    'url' => ['default/index']
];
$this->params['breadcrumbs'][] = $this->title;

?>
<link rel="amphtml" href="https://space-warriors.com/amp/view?id=<?= $_GET['id']?>">
<html>


    <article class="blog-post" itemscope itemtype="http://schema.org/Article">

        <meta itemprop="author" content="<?php echo $post->user->username?>">
        <meta itemprop="dateModified" content="<?= date_format(date_timestamp_set(new DateTime(), $post->updated_at), 'c') ?>"/>
        <meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?= $post->getAbsoluteUrl();?>"/>
        <meta itemprop="commentCount" content="<?= $dataProvider->getTotalCount();?>">
        <meta itemprop="genre" content="<?= $post->category->title;?>">
        <meta itemprop="articleSection" content="<?= $post->category->title;?>">
        <meta itemprop="inLanguage" content="<?= Yii::$app->language;?>">
        <link itemprop="discussionUrl" href="<?= $post->getAbsoluteUrl();?>">
        <div class="blog-post__nav">
            <p class="blog-post__category">
                <?= Module::t('blog', 'Category'); ?>
                : <?= Html::a($post->category->title, ['index', 'category_id' => $post->category->id], []); ?>
            </p>
           
        </div>
		 <p class="blog-post__info">
            <time title="<?= Module::t('blog', 'Create Time'); ?>" itemprop="datePublished"
                  datetime="<?= date_format(date_timestamp_set(new DateTime(), $post->created_at), 'c') ?>">
                <i class="fa fa-calendar-alt"></i> <?= Yii::$app->formatter->asDate($post->created_at); ?>
            </time>
            <span title="<?= Module::t('blog', 'Click'); ?>">
                <i class="fa fa-eye"></i> <?= $post->click; ?>
			</span>
        <?php if ($post->tagLinks): ?>
            <span title="<?= Module::t('blog', 'Tags'); ?>">
                <i class="fa fa-tag"></i> <?= implode(' ', $post->tagLinks); ?>
            </span>
        <?php endif; ?>
            </p>
        <?php 
        
		 if (file_exists('/var/www.beegee/practical-a/frontend/web/img/blog/blogPost/' . $post->id . '.jpg')) {
		
		?>
		
		<?php
		/* Переделал картинку
		<div itemscope itemprop="image" itemtype="http://schema.org/ImageObject" class="blog-post__img">
            <img itemprop="url contentUrl" src="https://space-warriors.com/frontend/web/img/blog/blogPost/thumb_<?=$post->id;?>.jpg?" alt="<?= $post->title;?>" class="img-responsive" width="900" height="675"></img>
            <link itemprop="url" href="<?= $post->getThumbFileUrl('banner', 'thumb');?>">
            <meta itemprop="width" content="400">
            <meta itemprop="height" content="300">
        </div>
		
		*/
		
	
		?>
		
		<div itemscope itemprop="image" itemtype="http://schema.org/ImageObject">
            <img itemprop="url contentUrl" src="https://space-warriors.com/frontend/web/img/blog/blogPost/<?=$post->id;?>.jpg?" alt="<?= $post->title;?>" class="img-responsive" width="900"></img>
            <link itemprop="url" href="<?= $post->getThumbFileUrl('banner', 'thumb');?>">
            <meta itemprop="width" content="900">
            
        </div>
		
		
		<?php
		}
		?>
		
		<br>
        <h1 class="blog-post__title title title--1" itemprop="headline">
            <?= Html::encode($post->title); ?>
        </h1>

        <div class="blog-post__content" itemprop="articleBody">
            <?php
			// Allow the HTML5 data attribute `data-type` on `img` elements.
		//	$post->content = \yii\helpers\HtmlPurifier::process($post->content, function ($config) {
			//		$config->getHTMLDefinition(true)
					//		->addAttribute('img', 'data-type', 'Text');
						//	->addAttribute('iframe', 'src', 'Text');
				//		});
				
            echo $post->content;
          //  echo \yii\helpers\HtmlPurifier::process($post->content);
            ?>
        </div>
        <?php if(isset($post->module->schemaOrg) && isset($post->module->schemaOrg['publisher'])) : ?>
        <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization" class="blog-post__publisher">
            <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                <link itemprop="url image" href="<?= Yii::$app->urlManager->createAbsoluteUrl($post->module->schemaOrg['publisher']['logo']);?>"/>
               
            </div>
            <meta itemprop="name" content="<?= $post->module->schemaOrg['publisher']['name']?>">
            <meta itemprop="telephone" content="<?= $post->module->schemaOrg['publisher']['phone'];?>">
            <meta itemprop="address" content="<?= $post->module->schemaOrg['publisher']['address'];?>">
        </div>
        <?php endif;?>
    </article>

<?php if ($post->module->enableComments) : ?>
    <div class="container">
        <section id="comments" class="blog-comments">
            <h2 class="blog-comments__header title title--2"><?= Module::t('blog', 'Comments'); ?></h2>

            <div class="row">
                <div class="col-md-6">
                    <?= \yii\widgets\ListView::widget([
                        'dataProvider' => $dataProvider,
                        'itemView' => '_comment',
                        'viewParams' => [
                            'post' => $post
                        ],
                    ]) ?>
                </div>
                <div class="col-md-5 col-md-offset-1">
                    <h3><?= Module::t('blog', 'Write comments'); ?></h3>
                    <?= $this->render('_form', [
                        'model' => $comment,
                    ]); ?>
                </div>
            </div>
        </section><!-- comments -->
    </div>
				<div class="panel panel-primary">
				
					
					<div class="panel-heading">ВИДЕО</div>
						<div class="panel-body">
								<div class="embed-responsive embed-responsive-4by3">
									<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/xoOhh1LqslY"></iframe>
								</div>
								<br>
								<div class="embed-responsive embed-responsive-4by3">
									<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/yWnw0BrR7Ko"></iframe>
								</div>
								<br>
								<div class="embed-responsive embed-responsive-4by3">
									<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/kQt2WXoJyRc"></iframe>
								</div>
								<br>
								<div class="embed-responsive embed-responsive-4by3">
									<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/TJSjR-3Nd2U"></iframe>
								</div>
								<br>
								<div class="embed-responsive embed-responsive-4by3">
									<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/SbXiuxD6Yl0"></iframe>
								</div>
								<br>
								<div class="embed-responsive embed-responsive-4by3">
									<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/3yfpoPfPhvY"></iframe>
								</div>
								
					
						</div>
					</div>
<?php endif; ?>

