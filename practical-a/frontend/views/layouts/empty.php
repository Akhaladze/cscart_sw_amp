<?php
namespace frontend\controllers;
use common\models\ApiData;
header('Content-type:application/json;charset=utf-8');
header("Access-Control-Allow-Origin: *");
//header("AMP-Access-Control-Allow-Origin: https://akademorto.kz/");
//header("AMP-Access-Control-Allow-Origin: https://amp.akademorto.kz/");
//header("AMP-Access-Control-Allow-Source-Origin: https://amp.akademorto.kz.cdn.ampproject.org");
//header("AMP-Access-Control-Allow-Source-Origin: https://amp.akademorto.kz.amp.cloudflare.org");
//header("AMP-Access-Control-Allow-Source-Origin: https://cdn.ampproject.org");
//header("AMP-Access-Control-Allow-Source-Origin: https://amp.akademorto.kz/");
//header("Access-Control-Expose-Headers: AMP-Access-Control-Allow-Source-Origin");
header("Cache-Control: private, no-cache");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 300");?>
<?=$content?>