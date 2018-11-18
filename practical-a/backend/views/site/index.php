<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
       

        <p class="lead">Управление блогом</p>

       
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
               
			   <h2>Категории</h2>
                <p><a class="btn btn-default" href="/backend/blog/blog-category">Рекактировать категории &raquo;</a></p>
                <p><a class="btn btn-default" href="/backend/blog/blog-category/create"> + </a></p>
            </div>
            <div class="col-lg-4">
                <h2>Посты</h2>

                <p><a class="btn btn-default" href="/backend/blog/blog-post">Редактировать посты &raquo;</a></p>
                <p><a class="btn btn-default" href="/backend/blog/blog-post/create"> + </a></p>
            </div>
            <div class="col-lg-4">
                <h2>Теги и Комментарии</h2>
                <p><a class="btn btn-default" href="/backend/blog/blog-tag">Редактировать теги &raquo;</a></p>
                <p><a class="btn btn-default" href="/backend/blog/blog-tag/create">+ </a></p>
				<hr>
                <p><a class="btn btn-default" href="/backend/blog/blog-comment">Редактировать комментарии &raquo;</a></p>
                <p><a class="btn btn-default" href="/backend/blog/blog-comment/create"> + </a></p>
            </div>
        </div>

    </div>
</div>
