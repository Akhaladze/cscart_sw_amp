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
<div class="flex flex-wrap">
      <section class="col-12 md-col-8 pt2 pb3 md-pt4 md-pb7">
  <h1 class="h3 mb2 mx2 md-mx4 ">Ваша корзина</h1>
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
</section>
<section class="px2 pt3 pb4 md-px3 md-pt4 col-12 md-col-4 commerce-cart-summary commerce-side-panel">
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
  <div class="commerce-cart-actions center">
    <a href="/checkout" class="ampstart-btn ampstart-btn-secondary caps">Оформить заказ</a>
  </div>
</section>
    </div>