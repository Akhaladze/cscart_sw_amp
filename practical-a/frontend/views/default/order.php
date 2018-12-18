<?php 
namespace frontend\controllers;
use common\models\ApiData;

//header("Access-Control-Allow-Origin: <origin>");
//header("AMP-Access-Control-Allow-Source-Origin: <source-origin>");
//header("Access-Control-Expose-Headers: AMP-Access-Control-Allow-Source-Origin");


	 
// foreach ($products['products'] as $item) {
// var_dump($item);
//die();
// }




echo '{
	"product": [
		';

foreach ($products['products'] as $item) {
	if (isset($first_comma)) {echo ', { ';} else {echo '{ ';}
	
	echo '"name" : "' . htmlentities($item['product'], ENT_QUOTES, "UTF-8") . '",';
	echo '"description" : "'; if(isset($item['short_description'])) {echo $item['short_description'];} echo '",';
	
	echo '"image": "';
			if (isset($item['main_pair']['detailed']['image_path'])) {					
					echo $item['main_pair']['detailed']['image_path'];
				}
			elseif (isset($item['image_pairs'])) {
					echo $item['image_pairs']['detailed']['image_path'];
					//exit();
					}
			else {
				echo AMP_SITE . 'no_image.png';
			}		
					
	echo '",';
	
	$cat_info = new ApiData;
	$price_info = new ApiData;
	$cat_info = $cat_info->API_GetCatById($item['category_ids'][0]);
	

	$product_price = $price_info->API_GetOptionsById($item['product_id']);
	if (!isset($product_price)||empty($product_price)) {
		
		echo '"price" : ' . round($item['price'], 0) . ',';
		
	} else {

	$product_price = array_shift ( $product_price);
	echo '"price" : ';
								$counter=0;
								foreach ($product_price['variants'] as $value) {
									if	($counter != 0) {
											echo ',"' . $value['modifier'] . '"';
										} 
									else {
				
											echo '"' . round($value['modifier'], 0) . '"';
										}										
										$counter++;
										break;
								}
	echo ',';
	}
	
	echo '"category" : "' . $item['category_ids'][0] . '",';
	echo '"product_id" : "' . $item['product_id'] . '",';
	echo '"amount" : "' . $item['amount'] . '",';
	echo '"category_name" : "' . $cat_info['category'] . '",';
	echo '"category_seo_name" : "' . $cat_info['seo_name'] . '"';

	echo '}';
	$first_comma=true;
}
	echo ']}';
	
echo '';

?>