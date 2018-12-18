<?php 
//var_dump($good_data);
//die();
//var_dump($options);
//die();
?>

<?php /* ФОТКИ и ЦЕНА + ЦВЕТ/РАЗМЕР */?>
<section class="flex flex-wrap pb4 md-pb7">
<?php /* Фото товара - карусель */?>     

	 <div class="col-12 md-col-6 px2 pt2 md-pl7 md-pt4">
        <amp-carousel 
		width="1280" 
		height="720" 
		layout="responsive" 
		type="slides">
          
<?php 		 
		if (isset($good_data['image_pairs'])||!empty($good_data['image_pairs'])){
			foreach ($good_data['image_pairs'] as $image_set){
			$images[] = $image_set['detailed'];	
			}
		}
		
		if (isset($good_data['main_pair']['detailed']['image_path'])||!empty($good_data['main_pair']['detailed']['image_path'])) {
				
				foreach ($good_data['main_pair'] as $image_set){
					$images[] = $good_data['main_pair']['detailed'];	
			}
				
				
			//	$images[] = $good_data['main_pair']['detailed'];
		}
		
		if (!isset($images)||!empty($images)) {
			
			$images['image_path'] = DEFAULT_EMPTY_ICON_FOR_PRODUCTS;
			$images['alt'] = 'No image';
			
		}
		
		
		//var_dump($images);
		//die();
		
		$image_counter=1;
		foreach ($images as $image) { 
			if (!empty($image['image_path'])) { ?>
			 <amp-img 
				src="<?=$image['image_path']?>" 
				width="1280" 
				height="720" 
				layout="responsive" 
				role="button" 
				tabindex="<?=$image_counter?>" 
				alt="<?=$image['alt']?>" 
				noloading="">
				
			<div placeholder="" class="commerce-loader"></div>          
			</amp-img>
		<?php		
		$image_counter++;
			}
		} ?>
        </amp-carousel>
		
		<amp-selector 
		class="center" 
		[selected]="0">
		 <ul class="list-reset inline-block">
<?php
		  $image_counter=1;
		
		  foreach ($images as $image) {	
		  if (!empty($image['image_path'])) { ?>
		   <li class="inline-block commerce-product-thumb">
              <amp-img 
			  option="0" 
			  layout="responsive" 
			  selected="selected" 
			  src="<?=$image['image_path']?>" 
			  width="180" 
			  height="180" 
			  alt="thumbnail">
			  </amp-img>
            </li>
			<?php
		  $image_counter++;
		  }		
		  }	?>
		</ul>
		</amp-selector>
		
      </div>
	  <?php /* Фото товара - карусель КОНЕЦ */?> 
	  
	  <?php /* Фото товара - карусель */?> 
     
	 <div class="col-12 md-col-6 flex flex-wrap content-start px2 md-pl5 md-pr7 md-pt4">
        <div class="col-6 self-start pb2">
          <h1 class="h4 md-h4"><?=$good_data['product']?></h1>
         

		<!-- <div class="h4 md-h3">{{price}}</div>-->
		 
		 <?php /* Выбор опций */?> 
<form method="get"
  class="p2"
  action="https://amp.akademorto.kz/cart"
  target="_top">
  
        <div class="col-6 self-start pb4">
			<div class="commerce-select-wrapper inline-block  ">
			<label for="sizes" class="bold caps h6 md-h7">Выберите опции: </label>
				<amp-selector class="inline-block" name="size" layout="container" [selected]="product.selectedSize" on="select:AMP.setState({
									  product: {
										selectedSize: event.targetOption
									  }
									})"> 

								<select name="sizes" id="sizes" class="commerce-select h6 md-h7">
							
							<?php
								$first_option=1;
								
								foreach ($options as $value) {
										
										if (isset($first_option)) {
											
											$option_def = $value['modifier'];
											$option_def_option = $value['variant_name'];
											unset($first_option);
										}
										
										
										echo '<option value="' . $value["option_id"] . ', ' . $value["variant_id"]. '">' . $value['variant_name'] . ' - ' . $value['modifier'] . CURRANCY_CODE . ' На складе: ' . $value['amount'] . ' шт</option>';
								} 
								
							/*	Set price/option name from options if options are available */
								if (!isset($option_def)||!isset($option_def)) {
										if (isset($good_data['price'])) {
										$option_def = $good_data['price'];
										$option_def_option = "Без опций";
										
										} else {
											$option_def = "0";
										$option_def_option = "Без опций";
											
										}
								}
?>
			
				</select>
				</amp-selector>				
			</div>
        </div>

<?php /* Выбор опций КОНЕЦ*/?> 	
		 
		 
		 
        </div>
      <?php /* Фото товара - карусель  КОНЕЦ*/?> 
	  
	  <div class="col-6 self-start right-align">
          <h2 class="h7 block pb1"><?php if(isset($good_data_discussions['params']['total_items'])) {echo 'Отзывы ('.$good_data_discussions['params']['total_items'];} else { echo '0';}?>)</h2>
<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="icon-star"><path fill="currentColor" d="M12.6229508 19.2631579L20.4491803 24l-2.0827869-8.9052632 6.8795082-5.93684206L16.157377 8.4 12.6229508 0 9.0885246 8.4 0 9.15789474l6.8795082 5.99999996L4.7967213 24"></path></svg>
<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="icon-star"><path fill="currentColor" d="M12.6229508 19.2631579L20.4491803 24l-2.0827869-8.9052632 6.8795082-5.93684206L16.157377 8.4 12.6229508 0 9.0885246 8.4 0 9.15789474l6.8795082 5.99999996L4.7967213 24"></path></svg>
<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="icon-star"><path fill="currentColor" d="M12.6229508 19.2631579L20.4491803 24l-2.0827869-8.9052632 6.8795082-5.93684206L16.157377 8.4 12.6229508 0 9.0885246 8.4 0 9.15789474l6.8795082 5.99999996L4.7967213 24"></path></svg>
<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="icon-star"><path fill="currentColor" d="M12.6229508 19.2631579L20.4491803 24l-2.0827869-8.9052632 6.8795082-5.93684206L16.157377 8.4 12.6229508 0 9.0885246 8.4 0 9.15789474l6.8795082 5.99999996L4.7967213 24"></path></svg>
<svg xmlns="http://www.w3.org/2000/svg" class="icon-star-empty" width="26" height="24" viewbox="0 0 26 24"><path fill="currentColor" d="M26 9.15789474L16.911475 8.4 13.377049 0 9.842623 8.4l-9.088525.75789474 6.879509 5.99999996L5.55082 24l7.826229-4.7368421L21.203279 24l-2.082787-8.9052632L26 9.15789474zM13.377049 16.9263158l-4.733606 2.8421053 1.262295-5.431579-4.228689-3.6 5.554099-.5052632 2.145901-5.11578943 2.145902 5.11578943 5.554098.5052632L16.911475 14.4l1.262295 5.4315789-4.796721-2.9052631z"></path></svg>
        </div>
		
		
        <div class="col-12 self-start pb4">КОД: <?=$good_data['product_code']?></div>
        <hr class="mb4">
        <div class="col-6 self-start pb4">
         

<amp-state id="product">
<script type="application/json">
{
	
	"price": "<?=$option_def?>",
        "selectedSize": "<?=$option_def_option?>",

<?php 
		 echo '"' . $option_def . '": {
            
					"large": {'; 
							$first_child = 0;
							$i=1;
							if (isset($good_data['main_pair']['detailed']['image_path'])) { 
								if ($first_child >= 1) {echo ',';}
						
							echo '"image' . $i . '": "' . $good_data['main_pair']['detailed']['image_path'] . '"';
							$first_child++;
							} 
							
							else
								{
								echo '"image' .$i. '": ""';
								}
							echo '},';

							$first_child = 0;
							if (isset($good_data['image_pairs']))  {
								
								
								$i=1;
				echo '"thumb": {';
								foreach ($good_data['image_pairs'] as $pair) {
												if ($first_child >= 1) {echo ',';}
												echo '  "image' . $i . '": "' . $pair['detailed']['https_image_path'] . '"';
											$i++;
											$first_child++;
										}
							  	
									} 
								
							
							echo '}},
									"selectedSlide": 0
									}'?>
									
							</script>
								
			
		</amp-state>
		
		
        <hr class="mb4">
        <div class="col-12 self-start mb4 commerce-product-btn-wrapper">
   
	   <button type="submit" class="ampstart-btn ampstart-btn-secondary caps" on="tap:AMP.setState({cart: 
																							{
																							added: true
																							
	   																						}
			
																			})">В корзину</button>
																			

 
  <div class="ampstart-input inline-block relative m0 p0 mb3">
    
    <input type="hidden"
      class="block border-none p0 m0"
	  value="<?=$good_data['product_id']?>"
      name="product_id">
	  <input type="hidden"
      class="block border-none p0 m0"
	  value="<?=$good_data['product']?>"
      name="name">
	  <input type="hidden"
      class="block border-none p0 m0"
	  value="<?php if(isset($good_data['main_pair']['detailed']['image_path'])) {echo $good_data['main_pair']['detailed']['image_path'];} else {$image=0;} ?>"
      name="image">
  </div>
 
</form>
																			
        </div>
        <hr class="md-hide lg-hide">
      </div>


  
<script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "Product",
  "name": "<?=$good_data['product']?>",
  "image": [
  
<?php if (isset($good_data['main_pair']['detailed']['image_path'])) { 
		$comma=1;
		echo '"' . $good_data['main_pair']['detailed']['image_path'] . '"';
}
	
   if (isset($good_data['image_pairs']))  {
	if (!isset($comma)) {$comma = 1;}
	$comma++;
	foreach ($good_data['image_pairs'] as $pair) {
		
		if ($comma <= 2) {echo ", ";}
		echo '"' . $pair['detailed']['https_image_path'] . '"';
	} 
   }

  ?>	
	
   ],
   
  
   
   
  "description": "<?=$good_data['full_description']?>",
  "mpn": "<?=$good_data['product_code']?>",
  "sku": "<?=$good_data['product_code']?>",
<?php if (isset($good_data_discussions['discussions'][0]['name']) && null!=$good_data_discussions['discussions'][0]['name']) {
	 echo '"review": [';
	$comma=0;
	 
	 foreach ($good_data_discussions['discussions'] as $review) {
		   
			   if ($comma > 0) {echo ","; $comma++;};
			   ?>
			   {
	"@type": "Review",
	"author": "<?=$review['name']?>",
    "datePublished": "<?=date('d-m-Y', $review['timestamp'])?>",
    "description": "<?=$review['message']?>",
    "name": "Отзыв",
    "reviewRating": {
    "@type": "Rating",
    "bestRating": "5",
    "ratingValue": "<?=$review['rating_value']?>",
    "worstRating": "1"
			   } 
			   }
		   
	 <?php } 
echo '],';
	 } ?>
		 
	

  "brand": {
    "@type": "Thing",
    "name": "<?=$good_data['product_code']?>"
  },
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "<?php if(isset($good_data_discussions['params']['total_items'])) {echo '4.' . rand(1,5 ); } else { echo '0';}?>",
    "reviewCount": "<?php if(isset($good_data_discussions['params']['total_items'])) {echo $good_data_discussions['params']['total_items'];} else { echo '0';}?>"
  },
  "offers": {
    "@type": "Offer",
    "priceCurrency": "KZT",
    "price": "<?=$option_def?>",
    "priceValidUntil": "2020-11-11",
    "itemCondition"	: "http://schema.org/UsedCondition",
    "availability"	: "http://schema.org/InStock",
	 "url": "<?=$this->params['cannonical_page_path']?>",
    "seller": {
      "@type": "Organization",
      "name": "<?php echo ORGANIZATION?>"
	  
	  
    }
  }
}
</script>	  
</div>
   <div class="col-12 flex flex-wrap pb3">
        <hr class="xs-hide sm-hide mt4">
        <div class="col-12 md-col-6 px2 md-pl7 commerce-product-desc">
          <section class="pt3 md-pt6 md-px4">
            <h2 class="h5 md-h4">Описание</h2>
            <p class="mt2 mb3"><?=$good_data['full_description']?></p>
              <hr>
              <div class="pt3 md-pt4 md-pb4">
                <h2 class="h5 md-h4 mb2">Отзывы</h2>

  


  <?php 
  
 /*  var_dump($good_data_discussions);
  
  foreach($good_data_discussions as $review){
	  
	  print_r($review);
	  
  } */
  
	if (isset($good_data_discussions['discussions'][0]['name']) && null!=$good_data_discussions['discussions'][0]['name']) {
	 
	 foreach ($good_data_discussions['discussions'] as $review) {
		   
		echo '<section class="mb3">  <h3 class="h7 mb1">' . $review["name"] . '</h3>';


	 $rating_value_zero = $review['rating_value'];
	
	while ($review['rating_value'] > 0) {
		
		echo '<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="icon-star"><path fill="currentColor" d="M12.6229508 19.2631579L20.4491803 24l-2.0827869-8.9052632 6.8795082-5.93684206L16.157377 8.4 12.6229508 0 9.0885246 8.4 0 9.15789474l6.8795082 5.99999996L4.7967213 24"></path></svg>';
		
		$review['rating_value']--;
	}
	

while ($rating_value_zero < 5) {
		
		echo '<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="icon-star"><path fill="currentColor" d="M12.6229508 19.2631579L20.4491803 24l-2.0827869-8.9052632 6.8795082-5.93684206L16.157377 8.4 12.6229508 0 9.0885246 8.4 0 9.15789474l6.8795082 5.99999996L4.7967213 24"></path></svg>';
		
		$rating_value_zero++;
	}



   echo '<p class="mt1">' . $review['message'] . '</p>';
   
	  }
	  
	  
	  }  else {
		  
		  echo "У этого товара еще нет отзывов, вы можете сделать первый!";
		  
		  echo "Также Вы можете задать вопрос на странице : <a href=" . CLAIM_PAGE_LINK . ">отзывов и предложений</a>";
		  
	  }
?>
  </section>

              </div>
			  
			  
			  
          </section>
        </div>
       

	   <div class="col-12 md-col-5 md-pr7 md-pl5">
          <section class="pt3 pb3 md-pb4 px2 md-pt6">
<?php /* Вспомогательная информация */?>            
		   <h2 class="h5 md-h4">Таблица размеров</h2>
            <div class="mt2">
              <table class="commerce-table center">
                <thead class="commerce-table-header h7">
                  <tr>
                    <th>Размер</th>
                    <th colspan="2">Длина стопы</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>37</td>
                    <td>230</td>
                    <td>220</td>
                  </tr>
                  <tr>
                    <td>38</td>
                    <td>230</td>
                    <td>220</td>
                  </tr>
                  <tr>
                    <td>39</td>
                    <td>230</td>
                    <td>220</td>
                  </tr>
                 
                </tbody>
              </table>
            </div>
          </section>
<?php /* Вспомогательная информация КОНЕЦ */?>            
		  
		
          <section class="pt3 pb3 md-pt4 md-pb4 px2">
            <h2 class="h5 md-h4">Характеристики</h2>
            <div class="mt2">
              <dl class="flex flex-wrap">
               
			<?php foreach ($futures as $key => $line) {
			 
					echo '<dt class="h7 col-4 sm-col-3 md-col-5 lg-col-4 pb1">' . $key . '</dt>' 
					. '<dd class="m0 col-8 sm-col-9 md-col-7 lg-col-8 pb1">'.  $line . '</dd>';
		  }
		  ?>
              </dl>
            </div>
          </section>
        </div>
		
	
<section class="commerce-related-products col-12 px2 md-mt5 md-px4 ">
  <div class="col-12 mt3 md-mt4">
  
  <?php if (is_array($related_products)==true) { ?>
    <h2 class="h5 md-h4">Вам будет интересно</h2>
    
	
	<amp-carousel height="170" layout="fixed-height" type="carousel" class="px4">
   <ul class="list-reset">
		<?php foreach ($related_products as $related_item) {?>
	
          <li class="commerce-related-product inline-block mr2">
            <a href="<?=$related_item['url']?>" class="text-decoration-none">
              <amp-img class="mb2" src="<?php if(isset($related_item['main_pair']['detailed']['image_path'])) {echo $related_item['main_pair']['detailed']['image_path'];} else {echo DEFAULT_EMPTY_ICON_FOR_PRODUCTS;}?>" width="1" height="1" layout="responsive" alt="Sprocket Set" noloading="">
			<div placeholder="" class="commerce-loader"></div>              </amp-img>
              <h2 class="commerce-related-product-name h6"><?=$related_item['product']?></h2>
            </a>
          </li>
		<?php }?>
		  
		   
      </ul>
    </amp-carousel>
	
  <?php }?>
  
  </div>
</section>


      </div>
    </section>
 