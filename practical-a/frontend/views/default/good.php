
 <amp-state id="cart">
    <script type="application/json">
      {
        "added": false
      }
    </script>
  </amp-state>

  <main id="content" role="main" class="main">
   <?php /* Корзина и ее содерживое*/?>
   <div class="commerce-cart-notification fixed col-12 right-0 mx0 md-mx2">
  <h1 class="display-none   ">Ваша корзина</h1>
    <div class="commerce-cart-item flex flex-wrap items-center m0 p2 ">
      <div class="col-3 sm-col-2 md-col-2 lg-col-2">
        <amp-img class="commerce-cart-item-image" src="https://akademorto.kz/images/watermarked/1/detailed/1/411d76ea314511e7804ed850e6db9ad8_d8fe67ae703111e7a68d0cc47ab2c024.jpg" width="1" height="1" layout="responsive" alt="Caliper Brakes" noloading="">
<div placeholder="" class="commerce-loader"></div>        </amp-img>
      </div>
      <div class="commerce-cart-item-desc px1 col-6 sm-col-7 md-col-7 lg-col-7">
        <div class="h6 mb1">Туторы для мальчика</div>
        <div>Туторы при ДЦП: Сурсил: Россия</div>
      </div>
      <div class="commerce-cart-item-price col-3 h6 flex flex-wrap justify-around items-start">
        <span>18900</span>
        <span>1</span>
        <div role="button" class="inline-block commerce-cart-icon" tabindex="0">✕</div>
      </div>
    </div>
  
      <div class="flex p2 mxn1 md-py3">
        <a href="#" class="ampstart-btn ampstart-btn-secondary caps center col col-6 mx1">Заказать в один клик</a>
        <a href="https://amp.akademorto.kz/frontend/web/img/patern/e-commerce/templates/cart.amp.html" class="ampstart-btn caps center col col-6 mx1">Оформить заказ</a>
      </div>
    </div>

	<?php /* Корзина и ее содерживое - КОНЕЦ*/?>
	<?php /* ФОТКИ и ЦЕНА и ЦВЕТ/РАЗМЕР */?>
    

	
	
	

    <section class="flex flex-wrap pb4 md-pb7">
<?php /* Фото товара - карусель */?>     

	 <div class="col-12 md-col-6 px2 pt2 md-pl7 md-pt4">
        <amp-carousel width="1280" height="720" layout="responsive" type="slides" [slide]="product.selectedSlide" on="slideChange: AMP.setState({product: {selectedSlide: event.index}})">
          
		  <?php 
		  $image_counter=1;
		  foreach ($good_data['image_pairs'] as $key  => $images) {			
		
?>
			 <amp-img [src]="product[product.selectedSize].large.image<?=$image_counter?>" src="<?=$images['detailed']['image_path']?>" width="1280" height="720" layout="responsive" role="button" tabindex="0" alt="<?=$images['detailed']['alt']?>" noloading="">
			<div placeholder="" class="commerce-loader"></div>          </amp-img>
		<?php
		
		$image_counter++;
		}

		  ?>
		  
		 
        </amp-carousel>
		
		<amp-selector class="center" [selected]="product.selectedSlide" on="select:AMP.setState({product: {selectedSlide: event.targetOption}})">
		 <ul class="list-reset inline-block">
<?php
		  $image_counter=1;
		  foreach ($good_data['image_pairs'] as $key  => $images) {	
		  ?>
		   <li class="inline-block commerce-product-thumb">
              <amp-img option="0" layout="responsive" selected="selected" [src]="product[product.selectedSize].thumb.image<?=$image_counter?>" src="<?=$images['detailed']['image_path']?>" width="180" height="180" alt="thumbnail"></amp-img>
            </li>
			<?php
		  
		  $image_counter++;
		  }		
		
	?>
		</amp-selector>
		
      </div>
	  <?php /* Фото товара - карусель КОНЕЦ */?> 
	  
	  <?php /* Фото товара - карусель */?> 
     
	 <div class="col-12 md-col-6 flex flex-wrap content-start px2 md-pl5 md-pr7 md-pt4">
        <div class="col-6 self-start pb2">
          <h1 class="h4 md-h4"><?=$good_data['product']?></h1>
          <div class="h4 md-h3">20000</div>
        </div>
      <?php /* Фото товара - карусель  КОНЕЦ*/?> 
	  
	  <div class="col-6 self-start right-align">
          <h2 class="h7 block pb1">Отзывы</h2>
<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="icon-star"><path fill="currentColor" d="M12.6229508 19.2631579L20.4491803 24l-2.0827869-8.9052632 6.8795082-5.93684206L16.157377 8.4 12.6229508 0 9.0885246 8.4 0 9.15789474l6.8795082 5.99999996L4.7967213 24"></path></svg>
<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="icon-star"><path fill="currentColor" d="M12.6229508 19.2631579L20.4491803 24l-2.0827869-8.9052632 6.8795082-5.93684206L16.157377 8.4 12.6229508 0 9.0885246 8.4 0 9.15789474l6.8795082 5.99999996L4.7967213 24"></path></svg>
<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="icon-star"><path fill="currentColor" d="M12.6229508 19.2631579L20.4491803 24l-2.0827869-8.9052632 6.8795082-5.93684206L16.157377 8.4 12.6229508 0 9.0885246 8.4 0 9.15789474l6.8795082 5.99999996L4.7967213 24"></path></svg>
<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="icon-star"><path fill="currentColor" d="M12.6229508 19.2631579L20.4491803 24l-2.0827869-8.9052632 6.8795082-5.93684206L16.157377 8.4 12.6229508 0 9.0885246 8.4 0 9.15789474l6.8795082 5.99999996L4.7967213 24"></path></svg>
<svg xmlns="http://www.w3.org/2000/svg" class="icon-star-empty" width="26" height="24" viewbox="0 0 26 24"><path fill="currentColor" d="M26 9.15789474L16.911475 8.4 13.377049 0 9.842623 8.4l-9.088525.75789474 6.879509 5.99999996L5.55082 24l7.826229-4.7368421L21.203279 24l-2.082787-8.9052632L26 9.15789474zM13.377049 16.9263158l-4.733606 2.8421053 1.262295-5.431579-4.228689-3.6 5.554099-.5052632 2.145901-5.11578943 2.145902 5.11578943 5.554098.5052632L16.911475 14.4l1.262295 5.4315789-4.796721-2.9052631z"></path></svg>
        </div>
		
		
        <div class="col-12 self-start pb4"><?=$good_data['short_description']?></div>
        <hr class="mb4">
        <div class="col-6 self-start pb4">
         
<?php /* Выбор опций */?> 

        <div class="col-6 self-start pb4">
			<div class="commerce-select-wrapper inline-block  ">
			<label for="sizes" class="bold caps h6 md-h7">Опции: </label>
				<amp-selector class="inline-block" name="size" layout="container" [selected]="product.selectedSize" on="select:AMP.setState({
									  product: {
										selectedSize: event.targetOption
									  }
									})"> 

								<select name="sizes" id="sizes" class="commerce-select h6 md-h7">
							
							<?php
								$couter_odd=0;
								foreach ($options['variants'] as $value) {
												
											if	($couter_odd %2 == 0) { echo '<option value="' . $value['variant_name'] . '">' . $value['variant_name'] . '-' . $value['modifier'] . '</option>';} 
										
										
										$couter_odd++;
										}
										$option_def = $value['variant_name'];
										?>
			
				</select>
				</amp-selector>
				
			</div>
        </div>
		
<amp-state id="product">
<script type="application/json">
{
	
	"price": "20000Тг",
        "selectedSize": "<?=$option_def?>",

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
									}
							</script>';
							?>		
			
		</amp-state>
		
		

<?php /* Выбор опций КОНЕЦ*/?> 	
		
		
		
        <hr class="mb4">
        <div class="col-12 self-start mb4 commerce-product-btn-wrapper">
          <button class="ampstart-btn ampstart-btn-secondary caps" on="tap:AMP.setState({cart: {added: true}})">В корзину</button>
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
	
		echo '"' . $good_data['main_pair']['detailed']['image_path'] . '",';
}
   if (isset($good_data['image_pairs']))  {
	
	foreach ($good_data['image_pairs'] as $pair) {
		
		echo '"' . $pair['detailed']['https_image_path'] . '"';
	} 
   }
?>	
	
   ],
  "description": "<?=$good_data['full_description']?>",
  "mpn": "<?=$good_data['product_code']?>",
  "brand": {
    "@type": "Thing",
    "name": "<?=$good_data['product_code']?>"
  },
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "4.<?=rand(1,5 )?>",
    "reviewCount": "<?=if(isset($good_data_discussions['params']['total_items'])){echo $good_data_discussions['params']['total_items'])} else { echo '0';}?>"
  },
  "offers": {
    "@type": "Offer",
    "priceCurrency": "KZT",
    "price": "<?=$good_data['product_code']?>",
    "priceValidUntil": "2020-11-11",
    "itemCondition": "http://schema.org/UsedCondition",
    "availability": "http://schema.org/InStock",
    "seller": {
      "@type": "Organization",
      "name": "<?=$this->params['organization']?>"
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
  
  var_dump($good_data_discussions);
  
  foreach($good_data_discussions as $review){
	  
	  print_r($review);
	  
  }
  
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
		  
		  echo "Также Вы можете задать вопрос на странице отзывов и предложений";
		  
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
    <h2 class="h5 md-h4">Вам будет интересно</h2>
    <amp-carousel height="170" layout="fixed-height" type="carousel" class="px4">
      <ul class="list-reset">
          <li class="commerce-related-product inline-block mr2">
            <a href="product-details.amp.html" class="text-decoration-none">
              <amp-img class="mb2" src="https://akademorto.kz/images/watermarked/1/detailed/1/411d76ea314511e7804ed850e6db9ad8_d8fe67ae703111e7a68d0cc47ab2c024.jpg" width="1" height="1" layout="responsive" alt="Sprocket Set" noloading="">
			<div placeholder="" class="commerce-loader"></div>              </amp-img>
              <h2 class="commerce-related-product-name h6"><?php /* */?>Тутор, Сурсил, ОФ, 20000Тг</h2>
            </a>
          </li>
		            <li class="commerce-related-product inline-block mr2">
            <a href="product-details.amp.html" class="text-decoration-none">
              <amp-img class="mb2" src="https://akademorto.kz/images/watermarked/1/detailed/1/411d76ea314511e7804ed850e6db9ad8_d8fe67ae703111e7a68d0cc47ab2c024.jpg" width="1" height="1" layout="responsive" alt="Sprocket Set" noloading="">
			<div placeholder="" class="commerce-loader"></div>              </amp-img>
              <h2 class="commerce-related-product-name h6"><?php /* */?>Тутор, Сурсил, ОФ, 20000Тг</h2>
            </a>
          </li>
		            <li class="commerce-related-product inline-block mr2">
            <a href="product-details.amp.html" class="text-decoration-none">
              <amp-img class="mb2" src="https://akademorto.kz/images/watermarked/1/detailed/1/411d76ea314511e7804ed850e6db9ad8_d8fe67ae703111e7a68d0cc47ab2c024.jpg" width="1" height="1" layout="responsive" alt="Sprocket Set" noloading="">
			<div placeholder="" class="commerce-loader"></div>              </amp-img>
              <h2 class="commerce-related-product-name h6"><?php /* */?>Тутор, Сурсил, ОФ, 20000Тг</h2>
            </a>
          </li>
		            <li class="commerce-related-product inline-block mr2">
            <a href="product-details.amp.html" class="text-decoration-none">
              <amp-img class="mb2" src="https://akademorto.kz/images/watermarked/1/detailed/1/411d76ea314511e7804ed850e6db9ad8_d8fe67ae703111e7a68d0cc47ab2c024.jpg" width="1" height="1" layout="responsive" alt="Sprocket Set" noloading="">
			<div placeholder="" class="commerce-loader"></div>              </amp-img>
              <h2 class="commerce-related-product-name h6"><?php /* */?>Тутор, Сурсил, ОФ, 20000Тг</h2>
            </a>
          </li>
      </ul>
    </amp-carousel>
  </div>
</section>


      </div>
    </section>
  </main>