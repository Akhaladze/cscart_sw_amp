<?php
/**
 * Project: yii2-blog for internal using
 * Author: akiraz2
 * Copyright (c) 2018.
 */

use yii\helpers\Html;

?>
		



	<div class="blog-brief">
		
            <h3> <?= Html::a(Html::encode($model->title), $model->url); ?></h3>
            
            <?= $model->category->title; ?>
			</p>

			<p class="blog-post__info">
                <i class="fa fa-calendar-alt"></i> <?= Yii::$app->formatter->asDate($model->created_at); ?>
                <i class="fa fa-eye"></i> <?= $model->click; ?>
			
        <?php if ($model->tagLinks): ?>
                <i class="fa fa-tag"></i> <?= implode(' ', $model->tagLinks); ?>
        <?php endif; ?>
            </p>
			<?php if (file_exists('/var/www.beegee/practical-a/frontend/web/img/blog/blogPost/thumb_' . $model->id . '.jpg')) {
		
				echo Html::img('https://space-warriors.com/frontend/web/img/blog/blogPost/' . $model->id . '.jpg'); 
				}
				?>

			<div>
			<br>
            <?php
            echo \yii\helpers\HtmlPurifier::process($model->brief);
            ?>
			</div>
			<br>
			<a type="button" href = "<?=$model->url?>" class="btn btn-primary btn-xs">Читать дальше</a>
			<br>
			<hr>
	</div>

