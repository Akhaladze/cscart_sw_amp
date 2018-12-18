<?php
namespace frontend\controllers;
use yii\web\Session;
use common\models\ApiData;
$session = new Session;
$session->open();

function FillCart($product_data) {
	
	$api_request = new ApiData;
	$cart_items = array();
	foreach($product_data['products'] as $product_id => $product_values) {
	
		
		$product = $api_request->API_GetGoodById($product_id);
		$product_options = $api_request->API_GetOptionsById($product_id);
		
		$cart['name'] 	= $product['product'];
		$cart['amount'] 	= $product_values['amount'];
		
		if (isset($product['main_pair']['detailed']['image_path'])) {
			$cart['image'] 		= $product['main_pair']['detailed']['image_path'];
			$cart['image_x'] 	= $product['main_pair']['detailed']['image_x'];
			$cart['image_y']	= $product['main_pair']['detailed']['image_y'];
			$cart['image_alt'] 	= $product['main_pair']['detailed']['alt'];
		//	exit();
			
		} elseif (isset($product['image_pairs'])) {
				
				foreach($product['image_pairs'] as $images){
				
					if (isset($images['detailed']['image_path']))
						$cart['image'] 		= $images['detailed']['image_path'];
						$cart['image_x'] 	= $images['detailed']['image_x'];
						$cart['image_y']	= $images['detailed']['image_y'];
						$cart['image_alt'] 	= $images['detailed']['alt'];
						exit();
				}
		}
		
		
		foreach($product_options as $option) {
			foreach($option['variants'] as $variant_id => $variant) {
					foreach($product_values['product_options'] as $opt_id => $var_id){
						
						if ($variant['option_id'] == $opt_id && $variant_id == $var_id) {
							$cart['options'] = $variant['variant_name'];
							$cart['price'] = $variant['modifier'];
						}
					}
			}
								
		}
	}
	$cart_items[]=$cart;
	unset($cart);
	return $cart_items;
}
/*	fill cart products*/

if (isset($session['product_data'])) {
	
	$product_data = $session['product_data'];
	$cart_items = FillCart($product_data);
} else {
	$cart_items = '';
}

?>
<amp-state id="cart">
    <script type="application/json">
      {
        "added": true,
        "total": 723,
        "shipping": 0
      }
    </script>
</amp-state>
<main id="content" role="main" class="main commerce-checkout flex flex-wrap items-start pb3">
    <section class="pt2 pb3 md-px4 md-pt4 md-pb7 col-12 md-col-8 md-px2">
      <h1 class="h3 mb2 px2">Оформление заказа</h1>
      <ul class="list-reset flex flex-wrap justify-between h7 commerce-checkout-steps px2 pt2 pb2 md-ml2 md-px0">
        <li><h2 class="h7">Доставка</h2></li>
        <li>Трекинг</li>
        <li>Получение и оплата</li>
      </ul>
     


<form method="get" action="/checkout">
	 <hr class="xs-hide sm-hide mt2 mb1 ml2">
      <div class="px2 mt4 md-mt3">
        <h3 class="h5 mb2">Информация о получателе</h3>
          <div class="flex flex-wrap mxn2">

		  
<div class="col-12 md-col-6 px2">
<!-- Start Input -->
<div class="ampstart-input inline-block relative m0 p0 mb3 ">
  <input type="text" value="" name="b_firstname" id="b_firstname" class="block border-none p0 m0" placeholder="Имя" required>
  <label for="b_firstname" class="absolute top-0 right-0 bottom-0 left-0" aria-hidden="true">Имя</label>
</div>
<!-- End Input-->
</div>

<div class="col-12 md-col-6 px2">
<!-- Start Input -->
<div class="ampstart-input inline-block relative m0 p0 mb3 ">
  <input type="text" value="" name="b_lastname" id="b_lastname" class="block border-none p0 m0" placeholder="Фамилия">
  <label for="b_lastname" class="absolute top-0 right-0 bottom-0 left-0" aria-hidden="true" required>Фамилия</label>
</div>
<!-- End Input-->
</div>

<div class="col-12 md-col-6 px2">
<!-- Start Input -->
<div class="ampstart-input inline-block relative m0 p0 mb3 ">
  <input type="email" value="" name="email" id="email" class="block border-none p0 m0" placeholder="E-Mail" required>
  <label for="email" class="absolute top-0 right-0 bottom-0 left-0" aria-hidden="true">E-Mail Address</label>
</div>
<!-- End Input-->
</div>  
			  
<div class="col-12 md-col-6 px2">
<!-- Start Input -->
<div class="ampstart-input inline-block relative m0 p0 mb3 ">
  <input type="text" value="" name="b_phone" id="b_phone" class="block border-none p0 m0" placeholder="Телефон" required>
  <label for="b_phone" class="absolute top-0 right-0 bottom-0 left-0" aria-hidden="true">Телефон</label>
</div>
<!-- End Input-->
</div>


<div class="col-12 md-col-6 px2">
<!-- Start Input -->
<div class="ampstart-input inline-block relative m0 p0 mb3 ">
  <input type="text" value="" name="b_city" id="b_city" class="block border-none p0 m0" placeholder="Укажите город доставки" required>
  <label for="b_city" class="absolute top-0 right-0 bottom-0 left-0" aria-hidden="true">Город</label>
</div>
<!-- End Input-->
</div>

<div class="col-12 md-col-6 px2">
<!-- Start Input -->
<div class="ampstart-input inline-block relative m0 p0 mb3 ">
  <input type="text" value="" name="b_address" id="b_address" class="block border-none p0 m0" placeholder="Укажите адрес доставки" required>
  <label for="b_address" class="absolute top-0 right-0 bottom-0 left-0" aria-hidden="true">Адрес доставки</label>
</div>
<!-- End Input-->
</div>

<div class="col-12 md-col-6 px2">
<!-- Start Input -->
<div class="ampstart-input inline-block relative m0 p0 mb3 ">
  <input type="text" value="B" name="b_state" id="b_state" class="block border-none p0 m0" placeholder="Область" required>
  <label for="b_state" class="absolute top-0 right-0 bottom-0 left-0" aria-hidden="true">Алмаатинская область</label>
</div>
<!-- End Input-->
</div>


<div class="col-12 md-col-6 px2">
<!-- Start Input -->
<div class="ampstart-input inline-block relative m0 p0 mb3 ">
  <input type="text" value="00002" name="b_zipcode" id="b_zipcode" class="block border-none p0 m0" placeholder="Индекс" required>
  <label for="b_zipcode" class="absolute top-0 right-0 bottom-0 left-0" aria-hidden="true">Индекс</label>
</div>
<!-- End Input-->
</div>


<div class="col-12 md-col-6 px2">
<!-- Start Input -->
<div class="ampstart-input inline-block relative m0 p0 mb3 ">
  <input type="text" value="KZ" name="b_country" id="b_country" class="block border-none p0 m0" placeholder="Страна" required>
  <label for="b_country" class="absolute top-0 right-0 bottom-0 left-0" aria-hidden="true">Казахстан</label>
</div>
<!-- End Input-->
</div>


			  

</div>

<div class="px2 pb3 flex flex-wrap col-12 md-pt3 md-pb3">
    <h4 class="h5 mt2 mb2 col-12">Способ доставки</h4>
     <div class="col-12">


<!-- Start Radio -->
<div class="ampstart-input ampstart-input-radio inline-block relative m0 p0 mb3">
    <input type="radio" value="" name="delivery-method" id="standard" class="relative" checked="1">
    <label for="standard" class="" aria-hidden="true">Стандарт (5-10 дней) - БЕСПЛАТНО по Алмате и Астане</label>
</div>
<!-- End Radio -->




</div>
   </div>
   
   <div class="commerce-cart-actions center">
    <input type="submit" href="/checkout" class="ampstart-btn ampstart-btn-primary caps" value="Оформить заказ">
  </div>
     </div>
</form>
    </section>
	
	
<section class="px2 pt3 pb4 md-px3 md-pt4 col-12 md-col-4 commerce-cart-summary commerce-side-panel">
   <hr class="xs-hide sm-hide mt2 ml2">
  
  <h2 class="h3 mb2 mx2 md-mx4 ">Ваша корзина</h2>
  <div class="commerce-cart-item flex flex-wrap items-center mx2 mb2 md-mx4 md-mt3 md-pb3">
<div class="col-3 sm-col-2 md-col-2 lg-col-2">
<?php 
$cart_total = 0;
$cart_super_total = 0;
$cart_shipmentprice = 0;
if (isset($cart_items) && !empty($cart_items)) {
	
	foreach ($cart_items as $good) { ?>
        <amp-img class="commerce-cart-item-image"
		src="<?php if(isset($good['image'])) {echo $good['image'];} else {echo DEFAULT_EMPTY_ICON_FOR_PRODUCTS; }?>" 
		width="1" 
		height="1" 
		layout="responsive" 
		alt="<?=$good['image_alt']?>" 
		noloading="">
		<div placeholder="" class="commerce-loader"></div>
        </amp-img>
    </div>
	<div class="commerce-cart-item-desc px1 col-6 sm-col-7 md-col-7 lg-col-7">
        <div class="h6 mb1"><?=$good['name'];?></div>
        <div><?=$good['options']?></div>
     </div>
	 <div class="commerce-cart-item-price col-3 h6 flex flex-wrap justify-around items-start">
        <span><?=$good['amount']?></span>
        <span><?=$good['price']?> <?=CURRANCY_CODE?></span>
        <div role="button" class="inline-block commerce-cart-icon" tabindex="0">✕</div>
      </div>
<?php
$cart_total = $cart_total + $good['price'];
	}
} else {
?>
	<div class="commerce-cart-item-desc px1 col-6 sm-col-7 md-col-7 lg-col-7">
        <div class="h3 mb1">Ваша корзина пуста</div>
        <div>Вы можете продолжить покупки</div>
     </div>
<?php	
}
$cart_super_total = $cart_total + $cart_shipmentprice;
?>  
    </div>
 
 <hr class="xs-hide sm-hide mt2 ml2">

   <h2 class="h5 md-mt3">Информация о заказе</h2>
  <dl class="flex flex-wrap">
    <dt class="col-10">Сумма заказа:</dt>
    <dd class="m0 col-2 pb1 right-align"><?=$cart_total;?><?=CURRANCY_CODE?></dd>
    <dt class="col-10 pb1">Доставка</dt>
      <dd class="m0 col-2 pb1 right-align"><?=$cart_shipmentprice;?><?=CURRANCY_CODE?></dd>
    <dt class="commerce-cart-total col-10 pt2 pb2 bold mt3 mb2">Итого:</dt>
      <dd class="commerce-cart-total m0 col-2 pt2 pb2 right-align bold mt3 mb2"><?=$cart_super_total;?><?=CURRANCY_CODE?></dd>
  </dl>
  <p class="pb3">Ваш заказ будет обработан в ближайшее время</p>
  
</section>
  </main>