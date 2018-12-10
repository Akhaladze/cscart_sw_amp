<?php
namespace frontend\controllers;


use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
//use yii\rest\Controller;
//use yii\filters\VerbFilter;
//use yii\filters\AccessControl;

use yii\helpers\ArrayHelper;
//use yii\web\NotFoundHttpException;

use common\models\ApiData;
use yii\rest\UrlRule;
use yii\web\UrlManager;

/**
 *	Default controller
 *		
 *
 *
 */
 
	$company['blog_name'] = "Ортошкола";
	$company['blog_keep_with_us_message'] = "Ортошкола - всегда ценная информация для вас";
	$company['blog_main_page_link'] = "https://amp.akademorto.kz/blog/shkola//24";
	$company['blog_image_placeholders'] = "1";
	$company['social_follow_mes'] = "Оставайтесь с нами";
	$company['facebook_link'] = "https://www.facebook.com/akademorto/";
	$company['twitter_link'] = "http://vk.com/akademortogroup";
	$company['instagram_link'] = "https://www.instagram.com/akademia_ortopedii/";
	$company['contacts_link'] = "https://akademorto.kz/salons/almati/";
	$company['returns_link'] = "Ортошкола";
	$company['about_page'] = "https://akademorto.kz/o-kompanii/";
	$company['contacts_link2'] = "https://akademorto.kz/salons/";
	$company['tel'] = "7(7172)64-25-55";
	$company['tel_num'] = "+77172642555";
	$company['email'] = "info@akademorto.kz";
	$company['GA_ID'] = "UA-56976542-1";
	$company['Yandex_ID'] = "";
	$company['logo_path'] = "https://akademorto.kz/images/logos/2/logo_okf6-pb.png";
	//$company['main_site'] = "https://akademorto.kz/";
	$company['organization'] = "Академия Ортопедии";
	
	
	
		
	
class DefaultController extends Controller
{
	/*	You need to configure this AMP application.
		Please fill all fielsd bellow appropriate to
		your needs.
		Read desctiption bihind each fialds and see an examples
		for better understanding.
		
		В этой секции необходимо определить константы,
		которые свойственны именно для вашей компании.
		
	*/
	
	/*	Organization name and main site URL of your cs-cart	*/
	const  main_site 	= "https://akademorto.kz/";
	const organization 	= "Академия Ортопедии";
	
	
	/*	Define default products category - "id" in your cs-cart	*/
	const  defaultCategory 		= "19";
	
	/*	Define max products items on page o categories views	*/
	const  defaultItemsOnPage 	= "12";
	
	/*	Define default URL to Cart page in your cs-cart	*/
	const  defaultPathToCartUrl = "";
	
	
	/*	API creditnails	*/
	const  API_Login 	= "robot@akademorto.kz";
	const  API_Key 		= "658lQRJZ3Y4xg28720fw30w01J6aqf2I";
	
	/*	Your Organization name, description and etc.	*/
	const blog_name = "Ортошкола";
	/*	Specify custom blog name	*/
	const blog_keep_with_us_message = "Ортошкола - всегда ценная информация для вас";
	
	/*	Blog default page	*/
	const blog_main_page_link = "https://amp.akademorto.kz/blog/shkola/24";
	const blog_image_placeholders = "1";
	
	/*	Socian icon set label	*/
	const social_follow_mes = "Оставайтесь с нами";
	
	/*	Yours Social network pages	*/
	const facebook_link 	= "https://www.facebook.com/akademorto/";
	const twitter_link 		= "http://vk.com/akademortogroup";
	const instagram_link	= "https://www.instagram.com/akademia_ortopedii/";
	
	/*	Link to page with contacts	*/
	const contacts_link 	= "https://akademorto.kz/salons/almati/";
	const contacts_link2	= "https://akademorto.kz/salons/";
	
	/*	Link to "Returns rules page"	*/
	const returns_link 	= "Ортошкола";
	
	/*	Link to "About" page	*/
	const about_page 	= "https://akademorto.kz/o-kompanii/";
	
	/*	Your Organization contacts	*/
	const tel 			= "7(7172)64-25-55";
	const tel_num 		= "+77172642555";
	const email 		= "info@akademorto.kz";
	
	/*	Google Analytics Accaunts and Yandex.Metrics creditnails	*/
	const GA_ID 		= "UA-56976542-1";
	const Yandex_ID 	= "";
	
	/*	Your Сorporate logo path	*/
	const logo_path 	= "https://akademorto.kz/images/logos/2/logo_okf6-pb.png";
	
	/*	Your currancy code	*/
	const currancy_code 	= "&#8376;";
	
	/*	Your Сorporate favicon.ico path	*/
	const favicon_path 	= "https://akademorto.kz/images/logos/2/logo_okf6-pb.png";

	/*	Menu items */
	
	const categories_positions_excluded	= "1000";
	
	
	
	public function actionIndex()
	{
		global $company;

			$this->layout = '@app/views/layouts/index.php';
			 return $this->render('index',
				['company' => $company]
			 );
    }

	

	public function actionCat()
	{
	global $company;
	// Стучимся в API
	// Опознаем категорию и собираем данные 
	// Передаем в представление
	
	if ($cat_id = Yii::$app->request->get('id')) {
		
		if (empty(Yii::$app->request->get('sort_mode'))) {
			$sort_mode = 'asc';
		}
		
		$cat_page_request = new ApiData;
		$cat_data = $cat_page_request->API_GetCatById($cat_id);
		
		$nested_cats = $cat_page_request->API_GetCatNestedList($cat_id);
		$nested_cats = array_shift($nested_cats);
		
		/*	Menu items for frontend sidebas */
		$menu_items = $cat_page_request->API_GetCatList();
		
		array_multisort (array_column($menu_items['categories'], 'position'), SORT_ASC, $menu_items['categories']);
		$menu_items = array_shift($menu_items);
		
		
	//	die();
	
		$goods = $cat_page_request->API_GetGoodsByCatId($cat_id, $sort_mode);
	
	
	// Найдем все предидущие страницы и соберем путь канонической страницы
	
	$cat_data_deep = $cat_data;
	$cannonical_page_path 	= "";
	
	$cat_list = Array();
	$cat_path;
	$counter=1;
	
	while (isset($cat_data_deep['parent_id']) && $cat_data_deep['parent_id'] != "0") {
		
		$cat_data_deep = $cat_page_request->API_GetCatById($cat_data_deep['parent_id']);
				$cat_list[] = [
								'seo_name'	=> $cat_data_deep['seo_name'],
								'cat_id'	=> $cat_data_deep['category_id'],
								'cat_name'	=> $cat_data_deep['category'],
								'description'	=> $cat_data_deep['description'],
							];
		
			$cannonical_page_path = '/' . $cat_data_deep['seo_name'] . $cannonical_page_path;
	}
		
		$cannonical_page_path = 'https://akademorto.kz' . $cannonical_page_path .  '/' . $cat_data['seo_name'];
/* 		print_r	($cannonical_page_path);
		die(); */	
		
		$this->view->params['cannonical_page_path'] = $cannonical_page_path;
		$this->view->params['blog_name'] = "Ортошкола";
		$this->view->params['blog_keep_with_us_message'] = "Ортошкола - всегда ценная информация для вас";
		$this->view->params['blog_main_page_link'] = "https://amp.akademorto.kz/blog/shkola//24";
		$this->view->params['blog_image_placeholders'] = "1";
		$this->view->params['social_follow_mes'] = "Оставайтесь с нами";
		$this->view->params['facebook_link'] = "https://www.facebook.com/akademorto/";
		$this->view->params['twitter_link'] = "http://vk.com/akademortogroup";
		$this->view->params['instagram_link'] = "https://www.instagram.com/akademia_ortopedii/";
		$this->view->params['contacts_link'] = "https://akademorto.kz/salons/almati/";
		$this->view->params['returns_link'] = "Ортошкола";
		$this->view->params['about_page'] = "https://akademorto.kz/o-kompanii/";
		$this->view->params['contacts_link2'] = "https://akademorto.kz/salons/";
		$this->view->params['tel'] 		= "+7(7172)64 25 55";
		$this->view->params['tel_num'] 	= "+7(7172)64 25 55";
		$this->view->params['email'] = "info@akademorto.kz";
		$this->view->params['GA_ID'] = "UA-56976542-1";
		$this->view->params['Yandex_ID'] = "";
		$this->view->params['logo_path'] = "https://akademorto.kz/images/logos/2/logo_okf6-pb.png";
		$this->view->params['main_site'] = "https://akademorto.kz/";
		$this->view->params['organization'] = "Академия Ортопедии";
		$this->view->params['page'] = 'PAGE';
		$this->view->params['meta_description'] = $cat_data['meta_description'];
		$this->view->params['description'] = $cat_data['description'];
		$this->view->params['timestamp'] = $cat_data['timestamp'];
		$this->view->params['page_title'] = $cat_data['page_title'];
		$this->view->params['author'] = 'author';
		$this->view->params['menu_items'] = $menu_items;
		
		$this->layout = '@app/views/layouts/cat_layout.php';
		
		 return $this->render('cat', 
			 
			 [
				 'goods'				=> $goods,
	/*Del*/		 'cat_list'				=> $cat_list,
				 'nested_cats'			=> $nested_cats,
				 'cat_data'				=> $cat_data,
				 'sort_mode'			=> $sort_mode,
				 'cat_id'				=> $cat_id,
				 'company'				=> $company,
				 'cannonical_page_path'	=> $cannonical_page_path[0]
				 
			 
			 ]);
		}
    }
	
	

		public function actionCatjsonfeed()
	{
		
	global $company;
	/*	Feaching data for JSON feed
	*	Опознаем категорию и собираем данные по товарам.
	*	Отвечаем на запросы от js библиотек Google AMP Ploject
	*	Формат данных: JSON с учетом фильтров. 
	*	Описание - после окончательной отладки
	*/	
	
	
	if ($cat_id = Yii::$app->request->get('id')) {
		
		
				if (Yii::$app->request->get('sort_mode') == null || (Yii::$app->request->get('sort_mode') <> 'asc' || Yii::$app->request->get('sort_mode') <> 'desc')) {
					
					$sort_mode = 'asc';
				}
				
				else {
					
					$sort_mode = Yii::$app->request->get('sort_mode');
				}
		
		if ($cat_id == 'all') {
			
			$cat_id = self::defaultCategory;
	}
		
		$cat_page_request = new ApiData;
		$cat_data = $cat_page_request->API_GetCatById($cat_id);
		$goods = $cat_page_request->API_GetGoodsByCatId($cat_id, $sort_mode);
		
		
	
	// Найдем все предидущие страницы и найдем путь канонической страницы
	
	$cat_data_deep = $cat_data;
	$cannonical_page_path = self::main_site;
	
	while (isset($cat_data_deep['parent_id']) && $cat_data_deep['parent_id']!="0") {	
	
		$cat_data_deep = $cat_page_request->API_GetCatById($cat_data_deep['parent_id']);
		$cannonical_page_path .= '/' . $cat_data_deep['seo_name'];
	}
		$cannonical_page_path .= '/' . $cat_data['seo_name'];
		
		$this->view->params['cannonical_page_path'] = $cannonical_page_path;
		$this->view->params['blog_name'] = "Ортошкола";
		$this->view->params['blog_keep_with_us_message'] = "Ортошкола - всегда ценная информация для вас";
		$this->view->params['blog_main_page_link'] = "https://amp.akademorto.kz/blog/shkola//24";
		$this->view->params['blog_image_placeholders'] = "1";
		$this->view->params['social_follow_mes'] = "Оставайтесь с нами";
		$this->view->params['facebook_link'] = "https://www.facebook.com/akademorto/";
		$this->view->params['twitter_link'] = "http://vk.com/akademortogroup";
		$this->view->params['instagram_link'] = "https://www.instagram.com/akademia_ortopedii/";
		$this->view->params['contacts_link'] = "https://akademorto.kz/salons/almati/";
		$this->view->params['returns_link'] = "Ортошкола";
		$this->view->params['about_page'] = "https://akademorto.kz/o-kompanii/";
		$this->view->params['contacts_link2'] = "https://akademorto.kz/salons/";
		$this->view->params['tel'] = "7(7172)64-25-55";
		$this->view->params['tel_num'] = "+77172642555";
		$this->view->params['email'] = "info@akademorto.kz";
		$this->view->params['GA_ID'] = "UA-56976542-1";
		$this->view->params['Yandex_ID'] = "";
		$this->view->params['logo_path'] = "https://akademorto.kz/images/logos/2/logo_okf6-pb.png";
		$this->view->params['main_site'] = "https://akademorto.kz/";
		$this->view->params['organization'] = "Академия Ортопедии";
		//$this->view->params['page'] = $cat_data['page'];
		$this->view->params['meta_description'] = $cat_data['meta_description'];
		$this->view->params['timestamp'] = $cat_data['timestamp'];
	//	$this->view->params['author'] = $cat_data['author'];
	//	$this->view->params['image'] = $cat_data['main_pair']['icon']['image_path'];
	//	$this->view->params['image_x'] = $cat_data['main_pair']['icon']['image_x'];
	//	$this->view->params['image_y'] = $cat_data['main_pair']['icon']['image_y'];
	
		$this->layout = '@app/views/layouts/empty.php';
		
		 return $this->render('catjson', 
			 [
				'goods'		=> $goods,
				'cat_data'	=> $cat_data,
				'company'	=> $company,
				'cannonical_page_path'		=> $cannonical_page_path,
			 
			 ]);
		}
    }

	
	
	
	public function actionGood()
	{
	global $company;
	// Стучимся в API
	// Опознаем товар и собираем данные 
	// Передаем в представление
	
	if ($good_id = Yii::$app->request->get('id')) {
	$good_page_request = new ApiData;
	
	$good_data_discussions = $good_page_request->API_GetGoodDiscusById($good_id);
	$good_data_fut = $good_page_request->API_GetFutById($good_id);
	$good_data = $good_page_request->API_GetGoodById($good_id);
	$good_options = $good_page_request->API_GetOptionsById($good_id);
	
	
	//$good_options2 = $good_page_request->API_GetOptions2ById($op_id);
	//$options =  $good_options;
	
	//$good_data_discussions = array_shift ( $good_data_discussions);
	
	$options = array_shift ( $good_options);
	
	
	
	
	// Найдем все предидущие страницы и найдем путь канонической страницы
	
	$good_data_deep = $good_data;
	$cannonical_page_path = "https://akademorto.kz";
	
	while (isset($good_data_deep['parent_id']) && $good_data_deep['parent_id']!="0") {
		
			$good_data_deep = $good_page_request->API_GetPageById($good_data_deep['parent_id']);

			$cannonical_page_path .= '/' . $good_data_deep['seo_name'];
		
	}
	
	/*Характеристики в массив*/
	
	
	$i =0;
	$futures= Array();
	
						
						foreach ($good_data_fut['features'] as $variant) {
						
							foreach ($variant['variants'] as $var) {
							
								if ($variant['feature_id']==$var['feature_id']) {
							
									$futures+=[$variant['description'] => $var['variant']];
						
									break;
								}
							}
							
				$i++;
						
			}

			
			
			
	
		
		$cannonical_page_path .= '/' . $good_data['seo_name'];
		
		$this->view->params['cannonical_page_path'] = $cannonical_page_path;
		
		$this->view->params['blog_name'] = "Ортошкола";
		$this->view->params['blog_keep_with_us_message'] = "Ортошкола - всегда ценная информация для вас";
		$this->view->params['blog_main_page_link'] = "https://amp.akademorto.kz/blog/shkola//24";
		$this->view->params['blog_image_placeholders'] = "1";
		$this->view->params['social_follow_mes'] = "Оставайтесь с нами";
		$this->view->params['facebook_link'] = "https://www.facebook.com/akademorto/";
		$this->view->params['twitter_link'] = "http://vk.com/akademortogroup";
		$this->view->params['instagram_link'] = "https://www.instagram.com/akademia_ortopedii/";
		$this->view->params['contacts_link'] = "https://akademorto.kz/salons/almati/";
		$this->view->params['returns_link'] = "Ортошкола";
		$this->view->params['about_page'] = "https://akademorto.kz/o-kompanii/";
		$this->view->params['contacts_link2'] = "https://akademorto.kz/salons/";
		$this->view->params['tel'] = "7(7172)64-25-55";
		$this->view->params['tel_num'] = "+77172642555";
		$this->view->params['email'] = "info@akademorto.kz";
		$this->view->params['GA_ID'] = "UA-56976542-1";
		$this->view->params['Yandex_ID'] = "";
		$this->view->params['logo_path'] = "https://akademorto.kz/images/logos/2/logo_okf6-pb.png";
		$this->view->params['main_site'] = "https://akademorto.kz/";
		$this->view->params['organization'] = "Академия Ортопедии";
		
		
		
		$this->view->params['page'] = $good_data['product'];
		$this->view->params['meta_description'] = $good_data['meta_description'];
		$this->view->params['keywords'] = $good_data['meta_keywords'];
		
		
	//	foreach ($good_data['main_pair'] as $images); {
			
		//	echo $images['image_path'];
			
	//	}
		
		
		//$image_add = $good_data['image_pairs'];
		
		//print_r($image_add);
		//die();
		
		
		
		
		
		//die();
		/*print_r($good_data['image_pairs']);
		die();*/
		
		
		$this->layout = '@app/views/layouts/good_layout.php';
		
		 return $this->render('good', 
			 [
			 
			 'good_data_discussions'	=> $good_data_discussions,
			 'good_data_fut'	=> $good_data_fut,
			 'futures'	=> $futures,
			 'options'	=> $options,
			 'good_options'	=> $good_options,
			 'good_data'	=> $good_data,
			 'company'		=> $company,
			 'cannonical_page_path'		=> $cannonical_page_path,
			 
			 ]);

		}

    }
    
	

	public function actionBlog()
	{

global $company;
	// Стучимся в API
	// Опознаем товар и собираем данные 
	// Передаем в представление
	
	if ($page_id = Yii::$app->request->get('id')) {
	$blog_page_request = new ApiData;
	$blog_data = $blog_page_request->API_GetPageById($page_id);
	
	// Найдем все предидущие страницы и найдем путь канонической страницы
	
	$blog_data_deep = $blog_data;
	//$cannonical_page_path = $company['main_site'];
	$cannonical_page_path = "https://akademorto.kz";
	
	while (isset($blog_data_deep['parent_id']) && $blog_data_deep['parent_id']!="0") {
		
			$blog_data_deep = $blog_page_request->API_GetPageById($blog_data_deep['parent_id']);

			$cannonical_page_path .= '/' . $blog_data_deep['seo_name'];
		
	}
	
		
		$cannonical_page_path .= '/' . $blog_data['seo_name'];
		
		$this->view->params['cannonical_page_path'] = $cannonical_page_path;
		
		$this->view->params['blog_name'] = "Ортошкола";
		$this->view->params['blog_keep_with_us_message'] = "Ортошкола - всегда ценная информация для вас";
		$this->view->params['blog_main_page_link'] = "https://amp.akademorto.kz/blog/shkola//24";
		$this->view->params['blog_image_placeholders'] = "1";
		$this->view->params['social_follow_mes'] = "Оставайтесь с нами";
		$this->view->params['facebook_link'] = "https://www.facebook.com/akademorto/";
		$this->view->params['twitter_link'] = "http://vk.com/akademortogroup";
		$this->view->params['instagram_link'] = "https://www.instagram.com/akademia_ortopedii/";
		$this->view->params['contacts_link'] = "https://akademorto.kz/salons/almati/";
		$this->view->params['returns_link'] = "Ортошкола";
		$this->view->params['about_page'] = "https://akademorto.kz/o-kompanii/";
		$this->view->params['contacts_link2'] = "https://akademorto.kz/salons/";
		$this->view->params['tel'] = "7(7172)64-25-55";
		$this->view->params['tel_num'] = "+77172642555";
		$this->view->params['email'] = "info@akademorto.kz";
		$this->view->params['GA_ID'] = "UA-56976542-1";
		$this->view->params['Yandex_ID'] = "";
		$this->view->params['logo_path'] = "https://akademorto.kz/images/logos/2/logo_okf6-pb.png";
		$this->view->params['main_site'] = "https://akademorto.kz/";
		$this->view->params['organization'] = "Академия Ортопедии";
		
		
		$this->view->params['page'] = $blog_data['page'];
		$this->view->params['meta_description'] = $blog_data['meta_description'];
		$this->view->params['timestamp'] = $blog_data['timestamp'];
		$this->view->params['author'] = $blog_data['author'];

		$this->view->params['image'] = $blog_data['main_pair']['icon']['image_path'];
		$this->view->params['image_x'] = $blog_data['main_pair']['icon']['image_x'];
		$this->view->params['image_y'] = $blog_data['main_pair']['icon']['image_y'];
	
		
		
		$this->layout = '@app/views/layouts/index.php';
		
		 return $this->render('blog', 
			 [
			 
			 'blog_data'	=> $blog_data,
			 'company'		=> $company,
			 'cannonical_page_path'		=> $cannonical_page_path,
			 
			 ]);

		}

    }


	public function actionRedirect_to_main()
	{
	
		$redirect = '"Location: ' . main_site . '"';
	//	print ($redirect);
	//	var_dump(main_site);
	//	header($redirect);
		header('Location:  https://akademorto.kz');
	//	die();
		exit();
	
	//	return 0;
			
    }
	
	
	public function actionError()
	{

		$this->layout = '@app/views/layouts/error.php';
		
	
			 return $this->render('error', 
			 ['request' => $request]);
			
    }
	
	
}

