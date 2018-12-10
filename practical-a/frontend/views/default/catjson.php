<?php 
namespace frontend\controllers;
use common\models\ApiData;
	 
	 //	 foreach ($goods['products'] as $item) {
	// var_dump($item);
	 //die();
	// }
echo '{
	"items": [
		';

foreach ($goods['products'] as $item) {
	if (isset($first_comma)) {echo ', { ';} else {echo '{ ';}
	
	echo '"name" : "' . $item['product'] . '",';
	echo '"description" : "'; if(isset($item['short_description'])) {echo $item['short_description'];} echo '",';
	
	echo '"image": "';
			if (isset($item['main_pair']['detailed']['image_path']))
				{					
					echo $item['main_pair']['detailed']['image_path'];
				}
			
			elseif (isset($item['image_pairs']))
					{
					echo $item['image_pairs']['detailed']['image_path'];
					//exit();
					}
					
	echo '",';
	
	$cat_info = new ApiData;
	$price_info = new ApiData;
	$cat_info = $cat_info->API_GetCatById($item['category_ids'][0]);
	

	$product_price = $price_info->API_GetOptionsById($item['product_id']);
	$product_price = array_shift ( $product_price);
	
//	echo '"price" : {';
	echo '"price" : ';
	
	
								$counter=0;
								foreach ($product_price['variants'] as $value) {
												
									if	($counter != 0) {
											//echo ', "' . $value['variant_name'] . '" : "' . $value['modifier'] . '"';
											echo ',"' . $value['modifier'] . '"';
										} 
									
									else {
										//	echo '"' . $value['variant_name'] . '" : "' . $value['modifier'] . '"';
											echo '"' . round($value['modifier'], 0) . '"';
										}
										
										$counter++;
										break;
								}
								
							//	$option_def = $value['variant_name'];
				
//	echo '},';
	echo ',';
	
	
	
	
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



//print_r($goods);

?>