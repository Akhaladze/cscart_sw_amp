<?php 
//var_dump($cat_data)
use frontend\controllers\DefaultController; 


?>

<main id="content" role="main" class="main commerce-listing">

  
<?php
//print($goods);
//print_r($goods['']);
?>
<amp-img class="commerce-listing-banner xs-hide sm-hide" src="https://akademorto.kz/images/promo/1/4.jpg" width="894" height="362" layout="responsive" alt="Product listing" noloading=""><div placeholder="" class="commerce-loader"></div></amp-img>
<section class="commerce-listing-content mx-auto flex flex-wrap pb4">
  <div class="col-3 xs-hide sm-hide flex flex-column">
    <div class="commerce-side-panel pt4 pr4 self-center">
    <h2 class="h5 mb2">Смежные категории</h2>

<!-- Start Radio For Current Category -->
<div class="ampstart-input ampstart-input-radio inline-block relative m0 p0 mb3" on="change: AMP.setState({products: {category: event.value;}})">
<input type="radio" value="<?=$cat_data['category_id'];?>" name="category" id="<?=$cat_data['category_id'];?>" class="relative" checked="true">
<label for="<?=$cat_data['category_id'];?>" class="" aria-hidden="true" ><?=$cat_data['category'];?></label>
</div>
<!-- End Radio -->




<?php if($nested_cats) {?>
<?php foreach($nested_cats as $nested_cats_item) {?>
				
				
<!-- Start Radio For Rest Categories -->
<div class="ampstart-input ampstart-input-radio inline-block relative m0 p0 mb3 " on="change: AMP.setState({products: {category: event.value}})">
    <input type="radio" value="<?=$nested_cats_item['category_id'];?>" name="category" id="<?php echo $nested_cats_item['category_id']; ?>" class="relative">
    <label for="<?php echo $nested_cats_item['category_id'];?>" class="" aria-hidden="true"><?php echo $nested_cats_item['category']; ?></label>
</div>
<!-- End Radio -->

		<?php }?>
<?php }?>

      </div>
    </div>
	
	 <div class="col-3 xs-hide sm-hide flex flex-column">
    <div class="commerce-side-panel pt4 pr4 self-center">
    <h2 class="h5 mb2">Ортошкола</h2>


     </div>
    </div>
	

    <div class="col-12 md-col-7 pt2 pb3 md-px4 md-pt1 md-pb7">
      <div class="md-commerce-header relative md-flex flex-wrap items-center md-mx0 md-mb2">
        <h1 class="h3 mb2 md-mt2 md-mb2 md-ml0 flex-auto px2"><?=$cat_data['page_title']?></h1>
        <hr>
		<p class="mb2 md-mt2 md-mb2 md-ml0 flex-auto px2"><?=$cat_data['description']?></p>
		
		<div class="m1">
			  <amp-social-share type="twitter"
				width="30"
				height="22"></amp-social-share>
			  <amp-social-share type="facebook"
				width="30"
				height="22"
				data-attribution="799003080205222"></amp-social-share>
			  <amp-social-share type="gplus"
				width="30"
				height="22"></amp-social-share>
			  <amp-social-share type="email"
				width="30"
				height="22"></amp-social-share>
			  
		</div>
       
        <div class="commerce-listing-filters pt2 pb2 mb3 md-mb0">
<div class="commerce-select-wrapper inline-block md-mr1 pl2 md-hide lg-hide">
  <label for="categories" class="bold caps h6 md-h7">::</label>
  <select name="categories" id="categories" class="commerce-select h6 md-h7" on="change: AMP.setState({products: {category: event.value}})">
     
		<?php if($nested_cats) {?>
			<?php foreach($nested_cats as $nested_cats) {?>
				
				
				<option value="<?php echo $nested_cats['category_id']; ?>"><?php echo $nested_cats['category']; ?></option>
			
<amp-state id="products">
		<script type="application/json">

			{
			   "category": "<?=$nested_cats['category_id']?>",
			   "category_name": "",
			   "filter": "desc"
			}
		</script>
</amp-state>	
			
			<?php }?>

		<?php }?>
	  
  </select>
</div>
<div class="commerce-select-wrapper inline-block  ">
  <label for="price" class="bold caps h6 md-h7">:</label>
  <select name="price" id="price" class="commerce-select h6 md-h7" on="change: AMP.setState({products: {filter: event.value}})">
      <option value="asc">Цена: От дешевых к дорогим</option>
      <option value="desc">Цена: От дорогих к дешевым</option>
  </select>
  <label for="price" class="bold caps h6 md-h7">:</label>
</div>
        </div>
      </div>
	
	
	
	
	<?php /*
      <amp-list class="mx1 md-mxn1" [src]="'https://amp.akademorto.kz/frontend/web/img/patern/e-commerce/templates/api/' + products.filter + '-' + products.category + '-products.json'" src="https://amp.akademorto.kz/frontend/web/img/patern/e-commerce/templates/api/high-low-all-products.json" height="1000" width="300" layout="responsive">
	  */ ?>
	  <amp-list class="mx1 md-mxn1"	[src]="'https://amp.akademorto.kz/catjsonfeed/'+ products.category + '/' + products.filter" src="https://amp.akademorto.kz/catjsonfeed/<?=$cat_id?>/<?=$sort_mode?>"   height="1000" width="300" layout="responsive">
        <template type="amp-mustache">
          <a href="/good/{{category_seo_name }}/{{product_id}}" target="_self" class="commerce-listing-product text-decoration-none inline-block col-6 md-col-4 lg-col-3 px1 mb2 md-mb4 relative">
            <div class="flex flex-column justify-between">
              <div>
                <amp-img class="commerce-listing-product-image mb2" src="{{image}}" width="340" height="340" layout="responsive" alt="{{ name }}" noloading=""><div placeholder="" class="commerce-loader"></div></amp-img>
                <h2 class="commerce-listing-product-name h6">{{ name }}</h2>
                {{ description }}
              </div>
              <div class="h6 mt1">{{ price }} <?=DefaultController::currancy_code;?></div>
            </div>
          </a>
        </template>
      </amp-list>
    </div>
  </section>
  </main>
  
  <?php //die();?>