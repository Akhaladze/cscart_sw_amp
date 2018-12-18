<?php
namespace common\models;

use Yii;

use yii\web\Controller;
use yii\filters\VerbFilter;

use yii\filters\AccessControl;

//use common\models\LoginForm;
use yii\httpclient\Client;
use yii\httpclient\XmlParser;
use yii\httpclient\Response;
use yii\httpclient\Request;
use yii\helpers\Html;
//use yii\web\Response;

use frontend\controllers\DefaultController;

	
	/*	You need to configure this AMP application.
		Please fill all fields bellow appropriate with
		your needs.
		Read desctiption bihind near each fialds and see an examples
		for better understanding.
		
		В этой секции необходимо определить константы,
		которые свойственны именно для вашей компании
	*/
	
	/*	Default cart page url*/
	
	define('DEFAULTPATHTOCARTURL', "https://akademorto.kz/cart/");

	/*	Organization name and main site URL of your cs-cart	*/
	define("MAIN_SITE", "https://akademorto.kz/");
	define("AMP_SITE", "https://amp.akademorto.kz/");
	define("ORGANIZATION", "Академия Ортопедии");
	define("DEFAULT_EMPTY_ICON_FOR_PRODUCTS", "https://dummyimage.com/200x200&text=No image!");
	
	
	/*	Define default products category - "id" in your cs-cart	*/
	define ("DEFAULTCATEGORY","19");
	
	/*	Define max products items on page o categories views	*/
	define ("DEFAULTITEMSONPAGE", "12");
	

	/*	Your Organization name, description and etc.	*/
	define ("BLOG_NAME", "Ортошкола");
	define ("BLOG_DEFAULT_AUTHOR", "Виолетта Иванова");
	define ("BLOG_DEFAULT_IMAGE", "https://dummyimage.com/800x450&text=Фото скоро появится");
	define ("BLOG_DEFAULT_IMAGE_X", "800");
	define ("BLOG_DEFAULT_IMAGE_Y", "450");
	define ("BLOG_DEFAULT_IMAGE_ALT", "blogimage");
	

	/*	Specify custom blog name	*/
	define ("BLOG_KEEP_WITH_US_MESSAGE", "Ортошкола - всегда ценная информация для вас");
	
	/*	Blog default page	*/
	define ("BLOG_MAIN_PAGE_LINK","https://amp.akademorto.kz/blog/shkola/24");
	define ("BLOG_IMAGE_PLACEHOLDERS", "1");
	
	/*	Socian icon set label	*/
	define("SOCIAL_FOLLOW_MES", "Оставайтесь с нами");
	
	/*	Yours Social network pages	*/
	define("FACEBOOK_LINK", "https://www.facebook.com/akademorto/");
	define("TWITTER_LINK", "http://vk.com/akademortogroup");
	define("INSTAGRAM_LINK", "https://www.instagram.com/akademia_ortopedii/");
	
	/*	Link to page with contacts	*/
	define("CONTACTS_LINK", "https://akademorto.kz/salons/almati/");
	define("CONTACTS_LINK2", "https://akademorto.kz/salons/");


	/*	Link to page with reviews and claims	*/
	define("CLAIM_PAGE_LINK", "https://akademorto.kz/otzyvy-nashih-pacientov");
	
	/*	Link to "Returns rules page"	*/
	define("RETURNS_LINK","Ортошкола");
	
	/*	Link to "About" page	*/
	define("ABOUT_PAGE", "https://akademorto.kz/o-kompanii/");
	
	/*	Your Organization contacts	*/
	define("TEL","+7(7172)64-25-55");
	define("TEL_NUM", "+7(7172) 64-25-55");
	define("EMAIL","info@akademorto.kz");
	
	/*	Google Analytics Accaunts and Yandex.Metrics creditnails	*/
	define("GA_ID", "UA-56976542-1");
	define("YANDEX_ID","51576617");
	
	/*	Your Сorporate logo path	*/
	define("LOGO_PATH", "https://akademorto.kz/images/logos/2/logo_okf6-pb.png");
	
	/*	Your currancy code	*/
	define("CURRANCY_CODE", "&#8376;");
	
	/*	Your Сorporate favicon.ico path	*/
	define ("FAVICON_PATH", "https://akademorto.kz/images/logos/2/logo_okf6-pb.png");

	/*	Menu items to exclude*/
	
	define("CATEGORIES_POSITIONS_EXCLUDED", "108");
	/*	API creditnails	*/
	define("API_Login", "robot@akademorto.kz");
	define("API_Key", "658lQRJZ3Y4xg28720fw30w01J6aqf2I");

/**
 *	API controller operate which REST API v2 interface of CS-CART v4.8	
	Documentation: https://docs.cs-cart.com/4.9.x/developer_guide/api
 */
 

class ApiData

{
	
	public $user_login		= API_Login;
	public $user_password	= API_Key;
	public $menu_items;
	
	
	/*	Menu items for frontend sidebas 
			EXPEREMENTAL
	*/
	
	  public function GetMenuItems () {
				
		$menu_items = self::ApiData;
		$menu_items = $menu_items->API_GetCatList;

		array_multisort (array_column($menu_items['categories'], 'position'), SORT_ASC, $menu_items['categories']);
		
		return $menu_items = array_shift($menu_items);

    }

	
	/*** BLOG_API_METHODS
		Blog page feed
		@params - int $id : Page ID
			
		@return array 

	*/
	

	public function API_GetPageById ($id) {

		$client = new Client([
		'baseUrl' => 'https://akademorto.kz/api/2.0/pages/' . $id,
		'requestConfig' => [
        'format' => Client::FORMAT_JSON
		],
		'responseConfig' => [
        'format' => Client::FORMAT_JSON
		],
		]);
		$response = $client->createRequest()
		->setMethod('get')
		->setFormat(Client::FORMAT_JSON)
		->setUrl('https://akademorto.kz/api/2.0/pages/' . $id)
		->addHeaders(['Authorization' => 'Basic '.base64_encode($this->user_login . ":" . $this->user_password)])
		->addHeaders(['Content-type:' => 'application/json'])
		->send();
		if ($response->isOk) {
		//$parser = new XmlParser;
		$parser = new \yii\httpclient\JsonParser;
		$response = $parser->parse($response);
		//$api_data_mes =  $parser->parse($response);
		
		return $response;
		} else return false;
	
	}
		/*	Featched all blog pages 
			@params - experemental
			$return array||false
		*/
	
		public function API_GetPageAll () {

		$client = new Client([
		'baseUrl' => 'https://akademorto.kz/api/2.0/pages/' . $id,
		'requestConfig' => [
        'format' => Client::FORMAT_JSON
		],
		'responseConfig' => [
        'format' => Client::FORMAT_JSON
		],
		]);
		$response = $client->createRequest()
		->setMethod('get')
		->setFormat(Client::FORMAT_JSON)
		->setUrl('https://akademorto.kz/api/2.0/pages?status=A&page_type=B&simple=1&get_tree=1&items_per_page=100')
		->addHeaders(['Authorization' => 'Basic '.base64_encode($this->user_login . ":" . $this->user_password)])
		->addHeaders(['Content-type:' => 'application/json'])
		->send();
		if ($response->isOk) {
		
		$parser = new \yii\httpclient\JsonParser;
		$response = $parser->parse($response);

		return $response;
		} else return false;
	
	}
		/*	Featched  blog pages by ids
			@params - $ids = Array (id1,id2,idN..)
			$return array||false
		*/
	
		public function API_GetPagesByIds ($ids) {

		$client = new Client([
		'baseUrl' => 'https://akademorto.kz/api/2.0/pages/' . $id,
		'requestConfig' => [
        'format' => Client::FORMAT_JSON
		],
		'responseConfig' => [
        'format' => Client::FORMAT_JSON
		],
		]);
		$response = $client->createRequest()
		->setMethod('get')
		->setFormat(Client::FORMAT_JSON)
		->setUrl('https://akademorto.kz/api/2.0/pages?status=A&page_type=B&simple=1&get_tree=1&items_per_page=100')
		->addHeaders(['Authorization' => 'Basic '.base64_encode($this->user_login . ":" . $this->user_password)])
		->addHeaders(['Content-type:' => 'application/json'])
		->send();
		if ($response->isOk) {
		
		$parser = new \yii\httpclient\JsonParser;
		$response = $parser->parse($response);

		return $response;
		} else return false;
	
	}

		/*	Featched  blog pages by root page id
			@params - $id root page id
			$return array||false
		*/
	
		public function API_GetPagesByRootId ($id) {

		$client = new Client([
		'baseUrl' => 'https://akademorto.kz/api/2.0/pages/' . $id,
		'requestConfig' => [
        'format' => Client::FORMAT_JSON
		],
		'responseConfig' => [
        'format' => Client::FORMAT_JSON
		],
		]);
		$response = $client->createRequest()
		->setMethod('get')
		->setFormat(Client::FORMAT_JSON)
		->setUrl('https://akademorto.kz/api/2.0/pages?status=A&page_type=B&parent_id=' . $id)
		->addHeaders(['Authorization' => 'Basic '.base64_encode($this->user_login . ":" . $this->user_password)])
		->addHeaders(['Content-type:' => 'application/json'])
		->send();
		if ($response->isOk) {
		
		$parser = new \yii\httpclient\JsonParser;
		$response = $parser->parse($response);

		return $response;
		} else return false;
	
	}
	
	
		/*** PRODUCT API METHODS ***
			
			
			Product details
			@params - int $id : Product ID	
			@return array 					
		*/
		
		
		public function API_GetGoodById ($id) {

		$client = new Client([
		'baseUrl' => 'https://akademorto.kz/api/2.0/products/' . $id,
		'requestConfig' => [
        'format' => Client::FORMAT_JSON
		],
		'responseConfig' => [
        'format' => Client::FORMAT_JSON
		],
		]);
		$response = $client->createRequest()
		->setMethod('get')
		->setFormat(Client::FORMAT_JSON)
		->setUrl('https://akademorto.kz/api/2.0/products/' . $id . '&get_frontend_urls=y')
		->addHeaders(['Authorization' => 'Basic '.base64_encode($this->user_login . ":" . $this->user_password)])
		->addHeaders(['Content-type:' => 'application/json'])
		->send();
		if ($response->isOk) {
		//$parser = new XmlParser;
		$parser = new \yii\httpclient\JsonParser;
		$response = $parser->parse($response);
		//$api_data_mes =  $parser->parse($response);
		
		return $response;
	} else return false;
}

		/*
			Customers reviews feed
			@params - int $id : Product ID
			static params: status:A - activa
			@return array 
		
		*/

public function API_GetGoodDiscusById ($id) {

		$client = new Client([
		'baseUrl' => 'https://akademorto.kz/api/2.0/products/' . $id . '/discussions',
		'requestConfig' => [
        'format' => Client::FORMAT_JSON
		],
		'responseConfig' => [
        'format' => Client::FORMAT_JSON
		],
		]);
		$response = $client->createRequest()
		->setMethod('get')
		->setFormat(Client::FORMAT_JSON)
		->setUrl('https://akademorto.kz/api/2.0/products/' . $id . '/discussions?status=A')
		->addHeaders(['Authorization' => 'Basic '.base64_encode($this->user_login . ":" . $this->user_password)])
		->addHeaders(['Content-type:' => 'application/json'])
		->send();
		if ($response->isOk) {
		//$parser = new XmlParser;
		$parser = new \yii\httpclient\JsonParser;
		$response = $parser->parse($response);
		//$api_data_mes =  $parser->parse($response);
		
		return $response;
	} else return false;
}

		/*
			Featches products futures
			@params - int $id : Product ID
			
			@return array 
		
		*/


public function API_GetFutById ($id) {

		$client = new Client([
		'baseUrl' => 'https://akademorto.kz/api/2.0/products/' . $id . '/features',
		'requestConfig' => [
        'format' => Client::FORMAT_JSON
		],
		'responseConfig' => [
        'format' => Client::FORMAT_JSON
		],
		]);
		$response = $client->createRequest()
		->setMethod('get')
		->setFormat(Client::FORMAT_JSON)
		->setUrl('https://akademorto.kz/api/2.0/products/' . $id . '/features')
		->addHeaders(['Authorization' => 'Basic '.base64_encode($this->user_login . ":" . $this->user_password)])
		->addHeaders(['Content-type:' => 'application/json'])
		->send();
		if ($response->isOk) {
		//$parser = new XmlParser;
		$parser = new \yii\httpclient\JsonParser;
		$response = $parser->parse($response);
		//$api_data_mes =  $parser->parse($response);
		
		return $response;
	} else return false;
}

	/*
		Featched options for products page and categories pages
		@params - int $id : Product ID
			
		@return array 
	
	*/

public function API_GetOptionsById ($id) {

		$client = new Client([
		'baseUrl' => 'https://akademorto.kz/api/2.0/options?product_id=' . $id,
		'requestConfig' => [
        'format' => Client::FORMAT_JSON
		],
		'responseConfig' => [
        'format' => Client::FORMAT_JSON
		],
		]);
		$response = $client->createRequest()
		->setMethod('get')
		->setFormat(Client::FORMAT_JSON)
		->setUrl('https://akademorto.kz/api/2.0/options?product_id=' . $id)
		->addHeaders(['Authorization' => 'Basic '.base64_encode($this->user_login . ":" . $this->user_password)])
		->addHeaders(['Content-type:' => 'application/json'])
		->send();
		if ($response->isOk) {
		//$parser = new XmlParser;
		$parser = new \yii\httpclient\JsonParser;
		$response = $parser->parse($response);
		//$api_data_mes =  $parser->parse($response);
		
		return $response;
	} else return false;
}

	/*
		Featch product option combination with stock ammount
		@params - int $id : Product ID
		@return array 
	*/


public function API_GetCombinationsById ($id) {

		$client = new Client([
		'baseUrl' => 'https://akademorto.kz/',
		'requestConfig' => [
        'format' => Client::FORMAT_JSON
		],
		'responseConfig' => [
        'format' => Client::FORMAT_JSON
		],
		]);
		$response = $client->createRequest()
		->setMethod('get')
		->setFormat(Client::FORMAT_JSON)
		->setUrl('https://akademorto.kz/api/2.0/combinations?product_id=' . $id)
		->addHeaders(['Authorization' => 'Basic '.base64_encode($this->user_login . ":" . $this->user_password)])
		->addHeaders(['Content-type:' => 'application/json'])
		->send();
		if ($response->isOk) {
		//$parser = new XmlParser;
		$parser = new \yii\httpclient\JsonParser;
		$response = $parser->parse($response);
		//$api_data_mes =  $parser->parse($response);
		
		return $response;
	} else return false;
}

/*
		Featch (product) option by option ID
		@params - int $id : Option ID
		@return array 
	*/


public function API_GetOneOptionById ($id) {

		$client = new Client([
		'baseUrl' => 'https://akademorto.kz/',
		'requestConfig' => [
        'format' => Client::FORMAT_JSON
		],
		'responseConfig' => [
        'format' => Client::FORMAT_JSON
		],
		]);
		$response = $client->createRequest()
		->setMethod('get')
		->setFormat(Client::FORMAT_JSON)
		->setUrl('https://akademorto.kz/api/2.0/options/' . $id)
		->addHeaders(['Authorization' => 'Basic '.base64_encode($this->user_login . ":" . $this->user_password)])
		->addHeaders(['Content-type:' => 'application/json'])
		->send();
		if ($response->isOk) {
		//$parser = new XmlParser;
		$parser = new \yii\httpclient\JsonParser;
		$response = $parser->parse($response);
		//$api_data_mes =  $parser->parse($response);
		
		return $response;
	} else return false;
}



		/*** CATEGORYES API METHODS
			
			Fetches Single Categories for using at Categories pages
			@params - int $id : Categories ID
		*/
		
		public function API_GetCatById ($id) {

		$client = new Client([
		'baseUrl' => 'https://akademorto.kz/api/2.0/categories/' . $id,
		'requestConfig' => [
        'format' => Client::FORMAT_JSON
		],
		'responseConfig' => [
        'format' => Client::FORMAT_JSON
		],
		]);
		$response = $client->createRequest()
		->setMethod('get')
		->setFormat(Client::FORMAT_JSON)
		->setUrl('https://akademorto.kz/api/2.0/categories/' . $id)
		->addHeaders(['Authorization' => 'Basic '.base64_encode($this->user_login . ":" . $this->user_password)])
		->addHeaders(['Content-type:' => 'application/json'])
		->send();
		if ($response->isOk) {
		//$parser = new XmlParser;
		$parser = new \yii\httpclient\JsonParser;
		$response = $parser->parse($response);
		//$api_data_mes =  $parser->parse($response);
		
		return $response;
	} else return false;
}

		/*
			
			Fetches all active Categories for using at tob sitebars
			@params - empty
			
			@return array 
								
		*/
		
		
		public function API_GetCatList () {

		$client = new Client([
		'baseUrl' => 'https://akademorto.kz/api/2.0/',
		'requestConfig' => [
        'format' => Client::FORMAT_JSON
		],
		'responseConfig' => [
        'format' => Client::FORMAT_JSON
		],
		]);
		$response = $client->createRequest()
		->setMethod('get')
		->setFormat(Client::FORMAT_JSON)
		->setUrl('https://akademorto.kz/api/2.0/categories?items_per_page=0&status=A&get_frontend_urls=y&visible=1')
		->addHeaders(['Authorization' => 'Basic '.base64_encode($this->user_login . ":" . $this->user_password)])
		->addHeaders(['Content-type:' => 'application/json'])
		->send();
		if ($response->isOk) {
		
		$parser = new \yii\httpclient\JsonParser;
		$response = $parser->parse($response);
		array_multisort (array_column($response['categories'], 'position'), SORT_ASC, $response['categories']);
		$res = array_shift($response);
		unset ($response);
		$response = array();
		foreach ($res as $menuitem) {
			if ($menuitem['category_id'] != CATEGORIES_POSITIONS_EXCLUDED) {
				//array_shift($response);
				
				$menuitem['amp_url'] = str_ireplace('https://akademorto.kz/', 'https://amp.akademorto.kz/cat/', $menuitem['url'] . $menuitem['category_id']);
				$response[] = $menuitem;
			}
			
		}
		
		/* exclude some cats*/
	//	echo '<pre>';
	//	var_dump($response);
	//	echo '</pre>';
	//	die();
		
		
		return $response;
	} else return false;
}
		
		
		/*
			Fetches Nested Categories for using at tob sitebars
			@params - int $id : Categories ID
			
			@return array 
		*/
		
		public function API_GetCatNestedList ($id) {

		$client = new Client([
		'baseUrl' => 'https://akademorto.kz/api/2.0/',
		'requestConfig' => [
        'format' => Client::FORMAT_JSON
		],
		'responseConfig' => [
        'format' => Client::FORMAT_JSON
		],
		]);
		$response = $client->createRequest()
		->setMethod('get')
		->setFormat(Client::FORMAT_JSON)
		->setUrl('https://akademorto.kz/api/2.0/categories/?status=A&category_id=' . $id . '&get_images=y&get_frontend_urls=true&level=y&plain&add_root')
		->addHeaders(['Authorization' => 'Basic '.base64_encode($this->user_login . ":" . $this->user_password)])
		->addHeaders(['Content-type:' => 'application/json'])
		->send();
		if ($response->isOk) {

		$parser = new \yii\httpclient\JsonParser;
		$response = $parser->parse($response);
	
		array_multisort (array_column($response['categories'], 'position'), SORT_ASC, $response['categories']);
		$response = array_shift($response);
		
		return $response;
	} else return false;
}
	
		


		/*	Featches products
			@params : int $id - categories ID
			@params : string $sort_mode {asc||desc} - sort_products by price if applicable 
			
			@ return array
		*/


public function API_GetGoodsByCatId ($id, $sort_mode) {

		$client = new Client([
		'baseUrl' => 'https://akademorto.kz/api/2.0/products?filter=1&cid=' . $id,
		'requestConfig' => [
        'format' => Client::FORMAT_JSON
		],
		'responseConfig' => [
        'format' => Client::FORMAT_JSON
		],
		]);
		$response = $client->createRequest()
		->setMethod('get')
		->setFormat(Client::FORMAT_JSON)
		->setUrl('https://akademorto.kz/api/2.0/products?filter=Y&subcats=Y&status=A&cid=' . $id . '&items_per_page=12&sort_mode=' . $sort_mode)
		->addHeaders(['Authorization' => 'Basic '.base64_encode($this->user_login . ":" . $this->user_password)])
		->addHeaders(['Content-type:' => 'application/json'])
		->send();
	if ($response->isOk) {
		//$parser = new XmlParser;
		$parser = new \yii\httpclient\JsonParser;
		$response = $parser->parse($response);
		//$api_data_mes =  $parser->parse($response);
		
		return $response;
	} else { return false; }
}



public function API_CreateOrder ($product_data, $user_data) {
		$order_data = ['user_id' => '0', 'payment_id' => '18', 'shipping_id' => '10'];
		//$order_data[]= $product_data;
		//$order_data[]= $user_data;
		$result = array_merge($order_data, $product_data, $user_data);
		
		$result = json_encode($result);
		
	//	echo '<pre>';
	//	echo $result;
	//	echo '</pre>';
		//var_dump(array_shift($result));
		
		$client = new Client([
		'baseUrl' => 'https://akademorto.kz/api/2.0',
		'requestConfig' => [
        'format' => Client::FORMAT_JSON
		],
		'responseConfig' => [
        'format' => Client::FORMAT_JSON
		],
		]);
		$response = $client->createRequest()
		->setMethod('post')
		->setFormat(Client::FORMAT_JSON)
		->setUrl('/orders/')
		->addHeaders(['Authorization' => 'Basic '.base64_encode($this->user_login . ":" . $this->user_password)])
		->addHeaders(['Content-type:' => 'application/json'])
	//	->setData([
	//				'user_id' => '0',
	//				'payment_id' => '18',
	//				'shipping_id' => '10',
	//				])
		
		
		
		
		
		->setContent($result)	
	//	->setContent('{query_string: "Yii"}')	
	//	->addData($result)
	//	->addData($result)
		->send();
		//var_dump($_REQUEST);
		
		//var_dump(json_encode($result));
	//	var_dump($response);
		//die();
	if ($response->isOk) {
		//$parser = new XmlParser;
		$parser = new \yii\httpclient\JsonParser;
		$response = $parser->parse($response);
		//$api_data_mes =  $parser->parse($response);
		
		return $response;
	} else { return false; }
}

		/*	Get related products by first available in nearest cats
		*/
		
public function API_GetRelatedProductsById($seo_path) {
			
			/*	check if its roor categories*/
			
	if (strpos($seo_path, '/') !== false) {
			
			$related_cats = explode ("/", $seo_path);
			$i = count($related_cats);
			$i = $i-1;

			$marker = 1;
			
		while ($i) {
			
			$client = new Client([
			'baseUrl' => 'https://akademorto.kz/api/',
			'requestConfig' => [
			'format' => Client::FORMAT_JSON
			],
			'responseConfig' => [
			'format' => Client::FORMAT_JSON
			],
			]);
			$response = $client->createRequest()
			->setMethod('get')
			->setFormat(Client::FORMAT_JSON)
			->setUrl('https://akademorto.kz/api/2.0/products?filter=Y&cid=' . $related_cats[$i] . '&subcats=N&status=A&items_per_page=3&get_frontend_urls=y')
			
			->addHeaders(['Authorization' => 'Basic '.base64_encode($this->user_login . ":" . $this->user_password)])
			->addHeaders(['Content-type:' => 'application/json'])
			->send();
		if ($response->isOk) {
			
			$parser = new \yii\httpclient\JsonParser;
			$response = $parser->parse($response);
			
				if (isset($response['products'][0])) {
					//exit();
					$response = array_shift ( $response);
					//var_dump($response);
					return $response;
					
					exit();	

				} else { 
						
					$i--;
						if ($i==0) {exit(); return false;};
				}
				
			} else { return false; }
		}
	}
	else {
				
		$related_cats = array('0' => $seo_path);	
	}
}
}
