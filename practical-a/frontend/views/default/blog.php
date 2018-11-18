<?php
/* 

*/
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
  "name": "<?=$this->params['organization'];?>",
  "logo": {
    "@type": "ImageObject",
    "url": "<?=$this->params['logo_path'];?>",
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
  
    <article class="commerce-blog-wrapper col-12 md-col-8 px2 pt2 pb3 md-px4 md-pt6 md-pb7">
      <amp-img src="<?=$blog_data['main_pair']['icon']['https_image_path']?>" 
		width="<?=$blog_data['main_pair']['icon']['image_x']?>" 
		height="<?=$blog_data['main_pair']['icon']['image_y']?>" 
		layout="responsive" 
		alt="<?=$blog_data['main_pair']['icon']['alt']?>" noloading="">

			<div placeholder="" class="commerce-loader">
				<?php if ($company['blog_image_placeholders']=='1') 
						{echo $blog_data['main_pair']['icon']['alt'];}?>
			</div>
		</amp-img>

      <div class="mt3">
        <h1 class="h3"><?=$blog_data['page_title']?></h1>
        <time datetime="<?=date('Y-d-m H:m',$blog_data['timestamp'])?>" class="block mb2"><?=date('d.m.Y',$blog_data['timestamp'])?></time>
        <?php $blog_data['description'] = str_replace ( 'http://' , 'https://', $blog_data['description'])?>
        
        <?php echo $blog_data['description']?>
      </div>
      <a href="<?=$company['blog_main_page_link']?>" class="ampstart-btn ampstart-btn-secondary inline-block h7 pt3 mt4 md-mb4">Все статьи</a>
    </article>

