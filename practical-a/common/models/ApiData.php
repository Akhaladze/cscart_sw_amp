<?php
namespace common\models;

use Yii;

use yii\web\Controller;
use yii\filters\VerbFilter;

use yii\filters\AccessControl;

use common\models\User;

use common\models\LoginForm;
use yii\httpclient\Client;
use yii\httpclient\XmlParser;
use yii\httpclient\Response;
use yii\helpers\Html;
//use yii\web\Response;

use backend\models\MakeRequestForm;
use backend\models\UserDataEditForm;
use backend\models\RegistrationForm;
use backend\models\Sms_VerificationForm;

use yii\web\UploadedFile;


//use backend\models\User;

//use common\widgets\Alert;



/**
 * Site controller
 */
class ApiData 
{
	public $id;
	public $user_login = "robot@akademorto.kz";
	public $user_password = "658lQRJZ3Y4xg28720fw30w01J6aqf2I";
	public $api_data_mes;
	static $user_data;
	


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


		public function API_GetCatById ($id) {

		$client = new Client([
		'baseUrl' => 'https://akademorto.kz/api/2.0/category/' . $id,
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
		->setUrl('https://akademorto.kz/api/2.0/category/' . $id)
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