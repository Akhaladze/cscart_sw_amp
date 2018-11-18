<?php
/**
 * Project: yii2-blog for internal using
 * Author: akiraz2
 * Copyright (c) 2018.
 */

use yii\helpers\Html;

?>
            <li class="mb4">
              <h3 class="ampstart-subtitle"><?= $model->authorLink; ?> <?= $model->getMaskedEmail();?></h3>
              <span class="h5 block mb3"><time class="blog-comment__date" datetime="<?= date_format(date_timestamp_set(new DateTime(), $model->created_at), 'c') ?>" itemprop="datePublished">
            <?= Yii::$app->formatter->asDatetime($model->created_at, 'long'); ?>
        </time></span>
              <p><?= nl2br(Html::encode($model->getContent())); ?></p>
            <hr>
			</li>
  


