<?php
//print_r($blog_data);

//die();
?>
<script type="application/ld+json">
{
"@context": "http://schema.org",
"@type": "NewsArticle",
"mainEntityOfPage": "<?=$this->params['cannonical_page_path'];?>",
"headline": "<?=$this->params['page'];?>",
"datePublished": "<?=date('Y-m-d H:m', $this->params['timestamp'])?>",
"dateModified": "<?=date('Y-m-d H:m', $this->params['timestamp'])?>",
"description": "<?=$this->params['meta_description'];?>",
"author": {
  "@type": "Person",
  "name": "<?=$this->params['author'];?>"
},
"publisher": {
  "@type": "Organization",
  "name": "<?=ORGANIZATION?>",
  "logo": {
    "@type": "ImageObject",
    "url": "<?=LOGO_PATH?>",
	"width": 100
   
  }
},
"image": {
  "@type": "ImageObject",
  "url": "<?=$this->params['image'];?>",
  "height": <?=$this->params['image_y'];?>,
  "width": <?=$this->params['image_x'];?>
}
}
</script>
<div class="commerce-blog-wrapper col-12 md-col-8 px2 pt2 pb3 md-px4 md-pt6 md-pb7">
	<h1 class="h2"><?=BLOG_NAME?></h1>
   
	<p class="mb2"><?=BLOG_KEEP_WITH_US_MESSAGE?></p>
	<hr>
    <article>
      <amp-img src="<?=$blog_data['main_pair']['icon']['https_image_path']?>" 
		width="<?=$blog_data['main_pair']['icon']['image_x']?>" 
		height="<?=$blog_data['main_pair']['icon']['image_y']?>" 
		layout="responsive" 
		alt="<?=$blog_data['main_pair']['icon']['alt']?>" noloading="">

			<div placeholder="" class="commerce-loader">
				<?php if (BLOG_IMAGE_PLACEHOLDERS=='1') 
						{echo $blog_data['main_pair']['icon']['alt'];}?>
			</div>
		</amp-img>

      <div class="mt3">
        <h1 class="h3"><?=$blog_data['page_title']?></h1>
        <time datetime="<?=date('Y-d-m H:m',$blog_data['timestamp'])?>" class="block mb2"><?=date('d.m.Y',$blog_data['timestamp'])?></time>
        <?php $blog_data['description'] = str_replace ( 'http://' , 'https://', $blog_data['description'])?>
        
        <?php echo $blog_data['description']?>
      </div>
      <a href="<?=BLOG_MAIN_PAGE_LINK?>" class="ampstart-btn ampstart-btn-secondary inline-block h7 pt3 mt4 md-mb4">Все статьи</a>
    </article>
    </div>

	
	<aside class="commerce-blog-sidebar commerce-side-panel xs-hide sm-hide md-col-4 md-px4 md-pt6" i-amphtml-fixedid="F1" style="">
  <h1 class="h5 md-pb2">Другие материалы блога</h1>
  

  
  <?php foreach($other_posts as $post) {
  
  //var_dump($post);
 // die();
  
  ?>
  <article class="mb2">

	  <?php if(isset($post['main_pair']['icon']['image_path'])) {?>
			<amp-img 
			class="mb2"
			src="<?=$post['main_pair']['icon']['image_path']?>"
			width="<?=$post['main_pair']['icon']['image_x']?>" 
			height="<?=$post['main_pair']['icon']['image_y']?>" 
			layout="responsive" 
			alt="<?=$post['main_pair']['icon']['alt']?>" 
			<i-amphtml-sizer style=""></i-amphtml-sizer>
			</amp-img>
	  <?php } else {?>
	  
	  <?php }?>
	  <hr>
	  <div class="mb2 md-mx0">
  
	  
        <h3 class="ampstart-heading h4 m0 mb3"><?=$post['page_title']?></h3>
		  <time datetime="<?=date('Y-m-d H:m', $post['timestamp'])?>" class="block mb2"><?=date('d.m.Y', $post['timestamp'])?></time>
      <p class="mb2"><?=$post['spoiler']?></p>
      <a href="<?php echo '/blog/shkola/' . $post['seo_name'] . '/' . $post['page_id'];?>" class="commerce-blog-link inline-block h7 md-mb4" style="text-decoration: line-through !important;">Читать далее</a>
	  </div>
	  <br>
	  <hr>
  </article>
  <?php }?>
</aside>
