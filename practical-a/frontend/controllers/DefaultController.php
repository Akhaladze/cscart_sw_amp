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
 *	Main AMP Engine controller code	
 */
 
	
		
	
class DefaultController  extends Controller

{
	
	/*	Main page now redirected to main page of your site */
	public function actionIndex()
	{
			$this->layout = '@app/views/layouts/index.php';
			 return $this->render('index',
				['company' => 'Main page']
			 );
    }

	
	/***	Categoties actions ***/
	public function actionCat()
	{
	
	if ($cat_id = Yii::$app->request->get('id')) {
		
		if (empty(Yii::$app->request->get('sort_mode'))) {
			$sort_mode = 'asc';
		}
		
		$cat_page_request = new ApiData;
		
		$cat_data = $cat_page_request->API_GetCatById($cat_id);
		
		$nested_cats = $cat_page_request->API_GetCatNestedList($cat_id);
	//	$nested_cats = array_shift($nested_cats);
		
		/*	Menu items for frontend sidebas */
		$menu_items = $cat_page_request->API_GetCatList();
		
		
		/*	Featch related blog posts */
		
		$other_posts = $cat_page_request->API_GetPagesByRootId(25);
		
		$posts = array();
	
		foreach($other_posts['pages'] as $other_post_item) {
		
			$post_detailed = $cat_page_request->API_GetPageById($other_post_item['page_id']);
		
			$post_detailed['spoiler'] = $other_post_item['spoiler'];
			
			$posts[] = $post_detailed;
			unset($post_detailed);
	
		}
		
		
		
		
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

		$this->view->params['page'] = 'PAGE';
		$this->view->params['meta_description'] = $cat_data['meta_description'];
		$this->view->params['description'] = $cat_data['description'];
		$this->view->params['timestamp'] = $cat_data['timestamp'];
		$this->view->params['page_title'] = $cat_data['page_title'];
		$this->view->params['author'] = 'author';
		$this->view->params['menu_items'] = $menu_items;
		
		/* var_dump($nested_cats);
		
		die(); */
		
		
		$this->layout = '@app/views/layouts/cat_layout.php';
		
		 return $this->render('cat', 
			 
			 [
				 'goods'				=> $goods,
	/*Del*/		 'cat_list'				=> $cat_list,
				 'nested_cats'			=> $nested_cats,
				 'other_posts'			=> $posts,
				 'cat_data'				=> $cat_data,
				 'sort_mode'			=> $sort_mode,
				 'cat_id'				=> $cat_id,
				
				 'cannonical_page_path'	=> $cannonical_page_path[0]
				 
			 
			 ]);
		}
    }
	
	/*** Products actions ***/	
	public function actionGood()
	{
		
	/* TODO LIst
		chek INVENROTY for products options array
	*/
	
	if ($good_id = Yii::$app->request->get('id')) {
	
	$good_page_request = new ApiData;
	
	/*	Gets customers reviews for this products */
	$good_data_discussions = $good_page_request->API_GetGoodDiscusById($good_id);
	
	/*	Gets futures for this products */
	$good_data_fut = $good_page_request->API_GetFutById($good_id);
	
	/*	Product full info */
	$good_data = $good_page_request->API_GetGoodById($good_id);
	
	/*	Product options */
	
	$good_options = $good_page_request->API_GetOptionsById($good_id);
	
	$good_combinations = $good_page_request->API_GetCombinationsById($good_id);
	$id_count=0;
	if (!is_array($good_options)||empty($good_options)) {
		$options = ['variants' => ["variant_name" => 'БЕЗ ОПЦИЙ',  "modifier" => "0", "option_id"=>0, "variant_id" => 0, "amount"=>0]];
		$id_count ++;
	} else {
	
	$options = array_shift ($good_options);	
//	var_dump($options);
//	die();	
	
	$new_options = array();
	foreach($good_combinations as $combination) {
		if ($combination['amount'] > 0) {
				foreach ($combination['combination'] as $option_id => $variant_id) {

						foreach($options['variants'] as $_variant_id => $variant_detail) {
								if ($_variant_id == $variant_id) {
									//$variant_detail['modifier']round($variant_detail['modifier'],0);
									$new_options[] = [
													'amount'		=> $combination['amount'],
													'variant_name'	=> $variant_detail['variant_name'],
													'modifier' 		=> round($variant_detail['modifier'],0),
													'option_id' 	=> $variant_detail['option_id'],
													'variant_id' 	=> $variant_id,
													'combination_hash' 	=> $combination['combination_hash']
													
													];
								}		
						}
				} 	
		}
	}
	$options = $new_options;
//	var_dump($new_options);
//	die();
	
	}
	
	
	/*	Menu items for frontend sidebas */
	$menu_items = $good_page_request->API_GetCatList();
	
	/* Get related products*/
	$related_products = $good_page_request->API_GetRelatedProductsById($good_data['seo_path']);
	
	
	
	// Canonical page finder for <head> metateg 
	
	$good_data_deep = $good_data;
	$cannonical_page_path = "https://akademorto.kz";
	
	while (isset($good_data_deep['parent_id']) && $good_data_deep['parent_id']!="0") {
		
			$good_data_deep = $good_page_request->API_GetPageById($good_data_deep['parent_id']);

			$cannonical_page_path .= '/' . $good_data_deep['seo_name'];	
	}
		$cannonical_page_path .= '/' . $good_data['seo_name'];

	/* Send to layout <head> metategs */
		
		$this->view->params['cannonical_page_path'] = $cannonical_page_path;
		$this->view->params['menu_items'] = $menu_items;
		$this->view->params['page_title'] = $good_data['product'];
		$this->view->params['meta_description'] = $good_data['meta_description'];
		$this->view->params['keywords'] = $good_data['meta_keywords'];
	
	/***	Features gathering ***/
	
	$i =0;
	$futures= Array();
	
						
						foreach ($good_data_fut['features'] as $variant) {
						//echo "!!!!!!!!!!!!!!";
						//die();
	
						if (isset($variant['variants'])) {
							foreach ($variant['variants'] as $var) {
								if ($variant['feature_id']==$var['feature_id']) {
							
									$futures+=[$variant['description'] => $var['variant']];
						
									break;
								}
							}
							}
						else {
						//	var_dump($variant);
							}
				$i++;
						
			}
		/*	Set layout page */
		$this->layout = '@app/views/layouts/cat_layout.php';
	//	$this->layout = '@app/views/layouts/good_layout.php';
		
		 return $this->render('good', 
			 [
			 
			 'good_data_discussions'	=> $good_data_discussions,
			 'good_data_fut'	=> $good_data_fut,
			 'futures'	=> $futures,
			 'options'	=> $options,
			 'good_options'	=> $good_options,
			 'good_data'	=> $good_data,
			 'related_products'		=> $related_products,
			 'cannonical_page_path'		=> $cannonical_page_path,
			 
			 ]);

		}

    }
    
	
	/*** Blog actions ***/
	public function actionBlog()
	{
	
	/* TODO list:
		Make sure that is an blog page 
	*/

	if ($page_id = Yii::$app->request->get('id')) {
		
		$blog_page_request = new ApiData;
		$blog_data = $blog_page_request->API_GetPageById($page_id);
	
	/*	Menu items for frontend sidebas */
		$menu_items = $blog_page_request->API_GetCatList();
	
	
	// Найдем все предидущие страницы и найдем путь канонической страницы
	
	$blog_data_deep = $blog_data;
	
	$cannonical_page_path = MAIN_SITE;
	
	while (isset($blog_data_deep['parent_id']) && $blog_data_deep['parent_id']!="0") {
			$blog_data_deep = $blog_page_request->API_GetPageById($blog_data_deep['parent_id']);
			$cannonical_page_path .= '/' . $blog_data_deep['seo_name'];
	}
	
		
		$cannonical_page_path .= '/' . $blog_data['seo_name'];
		
		/* Send to layout <head> metategs */
		
		$this->view->params['cannonical_page_path'] = $cannonical_page_path;
		$this->view->params['page_title'] = $blog_data['page'];
		$this->view->params['menu_items'] = $menu_items;
		
		
		
		/* Improve this data from constanst*/
		$this->view->params['blog_image_placeholders'] = BLOG_IMAGE_PLACEHOLDERS;
		$this->view->params['page'] = $blog_data['page'];
		$this->view->params['meta_description'] = $blog_data['meta_description'];
		$this->view->params['timestamp'] = $blog_data['timestamp'];
		
		if (isset($blog_data['author'])) 
		{$this->view->params['author'] = $blog_data['author'];} 
		else {$this->view->params['author']=BLOG_DEFAULT_AUTHOR;}
		
		if (isset($blog_data['image'])) 
		{$this->view->params['image'] = $blog_data['main_pair']['icon']['image_path'];} 
		else {$this->view->params['image']=BLOG_DEFAULT_IMAGE;}
		
		
		if (isset($blog_data['image_x'])) 
		{$this->view->params['image_x'] = $blog_data['main_pair']['icon']['image_x'];} 
		else {$this->view->params['image_x']=BLOG_DEFAULT_IMAGE_X;}
		
		if (isset($blog_data['image_y'])) 
		{$this->view->params['image_y'] = $blog_data['main_pair']['icon']['image_y'];} 
		else {$this->view->params['image_y']=BLOG_DEFAULT_IMAGE_Y;}
		
		
		/*	Featch related blog posts */
		
		$other_posts = $blog_page_request->API_GetPagesByRootId($blog_data['parent_id']);
		
		$posts = array();
	
		foreach($other_posts['pages'] as $other_post_item) {
		
			$post_detailed = $blog_page_request->API_GetPageById($other_post_item['page_id']);
		
			$post_detailed['spoiler'] = $other_post_item['spoiler'];
			
			//array_push($posts, $post_detailed);
			$posts[] = $post_detailed;
			unset($post_detailed);
	
		}
		

	//	var_dump($posts);
	//	die();
		
		
		$this->layout = '@app/views/layouts/cat_layout.php';
	//	$this->layout = '@app/views/layouts/index.php';
		
		 return $this->render('blog', 
			 [
			 
			 'blog_data'	=> $blog_data,
			 'other_posts'	=> $posts,
			
			 'cannonical_page_path'		=> $cannonical_page_path,
			 
			 ]);

		}

    }


	public function actionRedirect_to_main()
	{
	
	//	$redirect = 'Location: ' . MAIN_SITE;
	//	print ($redirect);
	//	var_dump(main_site);
	//	header($redirect);
		header('Location:  https://akademorto.kz/');
	//	die();
		exit();
	
	//	return 0;
			
    }
	
	
	public function actionError()
	{

		$this->layout = '@app/views/layouts/error.php';
		
	
			 return $this->render('error', 
			 ['request' => 'request']);
			
    }
	

	
	/*** CART ACTIONS ***/
	
public function actionCart()
	{
		$session = Yii::$app->session;
		
	//	var_dump(Yii::$app->request->get('name'));
	//	var_dump(Yii::$app->request);
	//	die();
		$this->layout = '@app/views/layouts/cat_layout.php';
	
		$cart_request = new ApiData;
		
	
	/*	Menu items for frontend sidebas */
		$menu_items = $cart_request->API_GetCatList();
	
		$this->view->params['cannonical_page_path'] = DEFAULTPATHTOCARTURL;
		$this->view->params['page_title'] = 'Страница корзины с выбранным товаром';
		$this->view->params['meta_description'] = 'На этой странице вы можете отредактировать вашу корзину и оформить заказ';
		$this->view->params['menu_items'] = $menu_items;
			


	/*	Actions when user whant to check cart on cart page 
		If it happened we will load cart from session
	*/
	
	
		/*	Actions when product have been add to cart by user */
		
		if ($name = Yii::$app->request->get('name')
			
			&&$sizes = Yii::$app->request->get('sizes')
			&&$image = Yii::$app->request->get('image')
			&&$product_id = Yii::$app->request->get('product_id')) {

			$opt = explode(',', Yii::$app->request->get('sizes'));
			
		//	print_r($opt);
		//	print_r(Yii::$app->request->get('sizes'));
		//	die();
	
		/*	Update cart with added product(s) items */



		$product_data['products'] = [								
												$product_id => [
																"amount"=> "1",
																"product_options"=>  [	$opt[0] => $opt[1]	]
																]	
										];		
		
		

		
		$session['product_data'] = $product_data;
		
		
	
			 return $this->render('cart', 
			 
			 
			 ['cart_supertotal' 	=> 1200+100]
			 
			 
			 
			 );
			
    } else {
		
		
		 return $this->render('cart', 
			 
			 ['name' => 'error']);
		
	}
    }
	
	
	
	
	/* Checkout page*/
	
		public function actionCheckout()
	{	
		$session = Yii::$app->session;
		$request = Yii::$app->request;
		$cart_request = new ApiData;
	/*	Menu items for frontend sidebas */
		$menu_items = $cart_request->API_GetCatList();
		$this->layout = '@app/views/layouts/cat_layout.php';
		
	/*	If user make correct all filds
		Try to make an order
	*/
	
	//	var_dump($request);
	//	die();
	if (
			$request->get('email')
			&&$request->get('b_firstname')
			&&$request->get('b_lastname')
			&&$request->get('b_address')
			&&$request->get('b_city')
			&&$request->get('b_state')
			&&$request->get('b_country')
			&&$request->get('b_zipcode')
			&&$request->get('b_phone')
			) {
				
			
		$email = $request->get('email');
		$b_firstname = $request->get('b_firstname');
		$b_lastname = $request->get('b_lastname');
		$b_address = $request->get('b_address');
		$b_city = $request->get('b_city');
		$b_state = $request->get('b_state');
		$b_country = $request->get('b_country');
		$b_zipcode = $request->get('b_zipcode');
		$b_phone = $request->get('b_phone');
		
				

	/*	Update user_data */

	$user_data = [
								
												  "email"		=>	$email,
												  "b_firstname"	=>	$b_firstname,
												  "b_lastname"	=>	$b_lastname,
												  "b_address"	=>	$b_address,
												  "b_city"		=>	$b_city,
												  "b_state"		=>	$b_state,
												  "b_country"	=>	$b_country,
												  "b_zipcode"	=>	$b_zipcode,
												  "b_phone"		=>	$b_phone,
												  
												  "s_firstname"	=>	$b_firstname,
												  "s_lastname"	=>	$b_lastname,
												  "s_address"	=>	$b_address,
												  "s_city"		=>	$b_city,
												  "s_state"		=>	$b_state,
												  "s_country"	=>	$b_country,
												  "s_zipcode"	=>	$b_zipcode,
												  "s_phone"		=>	$b_phone

							
	];		
	
		$session['user_data'] = $user_data;
	
		$product_data = $session['product_data'];

		$this->view->params['cannonical_page_path'] = '';
		$this->view->params['page_title'] = 'Информация о состоянии заказа';
		$this->view->params['meta_description'] = 'Актуальная информация о статусе вашего заказа';
		$this->view->params['menu_items'] = $menu_items;
		
		$order_info = $cart_request->API_CreateOrder($product_data, $user_data);
		
		return $this->render('addorder', 
			 
			 [
			 'order_info' => $order_info,
			 'response' => $order_info
			 ]
			 );
		
	
	}	else {
		
		/*	If user on first stage of make checkout
			Open checkout page and fill the cart and order summary
		*/
		$this->view->params['cannonical_page_path'] = '';
		$this->view->params['page_title'] = 'Страница оформления заказа';
		$this->view->params['meta_description'] = 'Заполниет все необходимые пункты для доставки вашего заказа';
		$this->view->params['menu_items'] = $menu_items;
		
		
		
		
		return $this->render('checkout', 
		
		 ['product_data' => 'product_data']);
		
	}
    
}
	
	public function actionAddOrder()
	{	
		$cart_request = new ApiData;
		
	
	/*	Menu items for frontend sidebas */
		$menu_items = $cart_request->API_GetCatList();
		
		/*	Menu items for frontend sidebas */
		$menu_items = $cart_request->API_AddOrder();
	
	/* fix!!!*/
		$this->view->params['cannonical_page_path'] = '';
		$this->view->params['page_title'] = 'Страница корзины с выбранным товаром';
		$this->view->params['meta_description'] = 'На этой странице вы можете отредактировать вашу корзину и оформить заказ';
		$this->view->params['menu_items'] = $menu_items;
	
		$this->layout = '@app/views/layouts/cat_layout.php';
		return $this->render('addorder', 
			 
			 ['name' => 'error']);
		
	}
    
	
	
	
	
	public function actionCatjsonfeed()
	{
		

	/*	Generate JSON data for JSON feed
	*	Опознаем категорию и собираем данные по товарам.
	*	Отвечаем на запросы от js библиотек Google AMP Ploject
	*	Формат данных: JSON с учетом фильтров. 
	*	Описание - после окончательной отладки
	*/	
	
	 if (1 === null) {
            throw new NotFoundHttpException(Yii::t('yii', 'Page not found.'));
        } 
		
		else {
	
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
	$cannonical_page_path = MAIN_SITE;
	
	while (isset($cat_data_deep['parent_id']) && $cat_data_deep['parent_id']!="0") {	
	
		$cat_data_deep = $cat_page_request->API_GetCatById($cat_data_deep['parent_id']);
		$cannonical_page_path .= '/' . $cat_data_deep['seo_name'];
	}
		$cannonical_page_path .= '/' . $cat_data['seo_name'];
		
		$this->view->params['cannonical_page_path'] = $cannonical_page_path;
	
		
		$this->view->params['meta_description'] = $cat_data['meta_description'];
		$this->view->params['timestamp'] = $cat_data['timestamp'];

	
		$this->layout = '@app/views/layouts/empty.php';
		
		 return $this->render('catjson', 
			 [
				'goods'		=> $goods,
				'cat_data'	=> $cat_data,
			
				'cannonical_page_path'		=> $cannonical_page_path,
			 
			 ]);
		}
    }
    }
	
	
	
}