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
use yii\helpers\Html;
//use yii\web\Response;

use frontend\controllers\DefaultController;
//use backend\models\User;
//use common\widgets\Alert;


/**
 *	API controller which responsible for 
	provide operation with REST API v2 of CS-CART v4.8
	
	
 */
 
class ApiData extends DefaultController
{
	function __construct() {
			   
    }
		
	public $user_login		= self::API_Login;
	public $user_password	= self::API_Key;
	public $id;
	public $api_data_mes;
	static $user_data;
	
	
	/*
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
	
		/*
			Product details
			@params - int $id : Product ID
			
			@return array [
							
			
							]
		
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
		->setUrl('https://akademorto.kz/api/2.0/products/' . $id)
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
	NEED TO DELETE !!!!
	FOR TEST ONLY
*/


public function API_GetOptions2ById ($id) {

		$client = new Client([
		'baseUrl' => 'https://akademorto.kz/api/2.0/options/' . $id,
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
		->setUrl('https://akademorto.kz/api/2.0/options/id/' . $id)
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
			
			Fetches Single Categories for using at Categories pages
			@params - int $id : Categories ID
			
			@return array [
							"category_id": "56",
							"parent_id": "53",
							"id_path": "19/32/45/53/56",
							"category": "Лето",
							"position": "10",
							"status": "A",
							"product_count": "27",
							"company_id": "1",
							"seo_name": "leto",
							"seo_path": "19/32/45/53",
							"url": "https://akademorto.kz/obuv/dlya-detey/dlya-devochek/stabiliziruyuschaya-ortopedicheskaya-obuv/leto/"
							]
								
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
			
			@return array [
							"category_id": "56",
							"parent_id": "53",
							"id_path": "19/32/45/53/56",
							"category": "Лето",
							"position": "10",
							"status": "A",
							"product_count": "27",
							"company_id": "1",
							"seo_name": "leto",
							"seo_path": "19/32/45/53",
							"url": "https://akademorto.kz/obuv/dlya-detey/dlya-devochek/stabiliziruyuschaya-ortopedicheskaya-obuv/leto/"
							]
								
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
		//$parser = new XmlParser;
		$parser = new \yii\httpclient\JsonParser;
		$response = $parser->parse($response);
		//$api_data_mes =  $parser->parse($response);
		
		return $response;
	} else return false;
}
		
		
		/*
			Fetches Nested Categories for using at tob sitebars
			@params - int $id : Categories ID
			
			@return array [
							"category_id": "56",
							"parent_id": "53",
							"id_path": "19/32/45/53/56",
							"category": "Лето",
							"position": "10",
							"status": "A",
							"product_count": "27",
							"company_id": "1",
							"seo_name": "leto",
							"seo_path": "19/32/45/53",
							"url": "https://akademorto.kz/obuv/dlya-detey/dlya-devochek/stabiliziruyuschaya-ortopedicheskaya-obuv/leto/"
							]
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
		//$parser = new XmlParser;
		$parser = new \yii\httpclient\JsonParser;
		$response = $parser->parse($response);
		//$api_data_mes =  $parser->parse($response);
		
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
	} else return false;
}



}