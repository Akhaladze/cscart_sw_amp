<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\BaseUrl;
use yii\helpers\Url;
use frontend\assets\AppAsset;
use cybercog\yii\googleanalytics\widgets\GATracking;
$company = $this->params['company'];

$this->beginPage(); ?>

<!DOCTYPE html>
<html ⚡>
<head>
<?php $this->head() ?>
<meta charset="utf-8">


<style amp-runtime="">
html{overflow-x:hidden!important}body,html{height:auto!important}html.i-amphtml-fie{height:100%!important;width:100%!important}body{margin:0!important;-webkit-text-size-adjust:100%;-moz-text-size-adjust:100%;-ms-text-size-adjust:100%;text-size-adjust:100%}[hidden]{display:none!important}html.i-amphtml-singledoc.i-amphtml-embedded{-ms-touch-action:pan-y;touch-action:pan-y}html.i-amphtml-fie>body,html.i-amphtml-singledoc>body{overflow:visible!important}html.i-amphtml-fie:not(.i-amphtml-inabox)>body,html.i-amphtml-singledoc:not(.i-amphtml-inabox)>body{position:relative!important}html.i-amphtml-webview>body{overflow-x:hidden!important;overflow-y:visible!important;min-height:100vh!important}html.i-amphtml-ios-embed-legacy>body{overflow-x:hidden!important;overflow-y:auto!important;position:absolute!important}html.i-amphtml-ios-embed{overflow-y:auto!important;position:static}#i-amphtml-wrapper{overflow-x:hidden!important;overflow-y:auto!important;position:absolute!important;top:0!important;left:0!important;right:0!important;bottom:0!important;margin:0!important;display:block!important}html.i-amphtml-ios-embed.i-amphtml-ios-overscroll,html.i-amphtml-ios-embed.i-amphtml-ios-overscroll>#i-amphtml-wrapper{-webkit-overflow-scrolling:touch!important}#i-amphtml-wrapper>body{position:relative!important;border-top:1px solid transparent!important}html.i-amphtml-ios-embed-sd{overflow:hidden!important;position:static!important}html.i-amphtml-ios-embed-sd>body,html.i-amphtml-singledoc.i-amphtml-ios-embed-sd>body{position:absolute!important;top:0!important;left:0!important;right:0!important;bottom:0!important;overflow:hidden!important}.i-amphtml-body-minheight>body{min-height:calc(100vh + 1px)}.i-amphtml-element{display:inline-block}.i-amphtml-blurry-placeholder{-webkit-transition:opacity 0.3s cubic-bezier(0.0,0.0,0.2,1)!important;transition:opacity 0.3s cubic-bezier(0.0,0.0,0.2,1)!important}[layout=nodisplay]:not(.i-amphtml-element){display:none!important}.i-amphtml-layout-fixed,[layout=fixed][width][height]:not(.i-amphtml-layout-fixed){display:inline-block;position:relative}.i-amphtml-layout-responsive,[layout=responsive][width][height]:not(.i-amphtml-layout-responsive),[width][height][sizes]:not(.i-amphtml-layout-responsive){display:block;position:relative}.i-amphtml-layout-intrinsic{display:inline-block;position:relative;max-width:100%}.i-amphtml-intrinsic-sizer{max-width:100%;display:block!important}.i-amphtml-layout-container,.i-amphtml-layout-fixed-height,[layout=container],[layout=fixed-height][height]{display:block;position:relative}.i-amphtml-layout-fill,[layout=fill]:not(.i-amphtml-layout-fill){display:block;overflow:hidden!important;position:absolute;top:0;left:0;bottom:0;right:0}.i-amphtml-layout-flex-item,[layout=flex-item]:not(.i-amphtml-layout-flex-item){display:block;position:relative;-webkit-box-flex:1;-ms-flex:1 1 auto;flex:1 1 auto}.i-amphtml-layout-fluid{position:relative}.i-amphtml-layout-size-defined{overflow:hidden!important}.i-amphtml-layout-awaiting-size{position:absolute!important;top:auto!important;bottom:auto!important}i-amphtml-sizer{display:block!important}.i-amphtml-blurry-placeholder,.i-amphtml-fill-content{display:block;height:0;max-height:100%;max-width:100%;min-height:100%;min-width:100%;width:0;margin:auto}.i-amphtml-layout-size-defined .i-amphtml-fill-content{position:absolute;top:0;left:0;bottom:0;right:0}.i-amphtml-layout-intrinsic .i-amphtml-sizer{max-width:100%}.i-amphtml-replaced-content,.i-amphtml-screen-reader{padding:0!important;border:none!important}.i-amphtml-screen-reader{position:fixed!important;top:0px!important;left:0px!important;width:4px!important;height:4px!important;opacity:0!important;overflow:hidden!important;margin:0!important;display:block!important;visibility:visible!important}.i-amphtml-screen-reader~.i-amphtml-screen-reader{left:8px!important}.i-amphtml-screen-reader~.i-amphtml-screen-reader~.i-amphtml-screen-reader{left:12px!important}.i-amphtml-screen-reader~.i-amphtml-screen-reader~.i-amphtml-screen-reader~.i-amphtml-screen-reader{left:16px!important}.i-amphtml-unresolved{position:relative;overflow:hidden!important}#i-amphtml-wrapper.i-amphtml-scroll-disabled,.i-amphtml-scroll-disabled{overflow-x:hidden!important;overflow-y:hidden!important}.i-amphtml-select-disabled{-webkit-user-select:none!important;-moz-user-select:none!important;-ms-user-select:none!important;user-select:none!important}.i-amphtml-notbuilt,[layout]:not(.i-amphtml-element){position:relative;overflow:hidden!important;color:transparent!important}.i-amphtml-notbuilt:not(.i-amphtml-layout-container)>*,[layout]:not([layout=container]):not(.i-amphtml-element)>*{display:none}.i-amphtml-ghost{visibility:hidden!important}.i-amphtml-element>[placeholder],[layout]:not(.i-amphtml-element)>[placeholder]{display:block}.i-amphtml-element>[placeholder].amp-hidden,.i-amphtml-element>[placeholder].hidden{visibility:hidden}.i-amphtml-element:not(.amp-notsupported)>[fallback],.i-amphtml-layout-container>[placeholder].amp-hidden,.i-amphtml-layout-container>[placeholder].hidden{display:none}.i-amphtml-layout-size-defined>[fallback],.i-amphtml-layout-size-defined>[placeholder]{position:absolute!important;top:0!important;left:0!important;right:0!important;bottom:0!important;z-index:1}.i-amphtml-notbuilt>[placeholder]{display:block!important}.i-amphtml-hidden-by-media-query{display:none!important}.i-amphtml-element-error{background:red!important;color:#fff!important;position:relative!important}.i-amphtml-element-error:before{content:attr(error-message)}i-amp-scroll-container,i-amphtml-scroll-container{position:absolute;top:0;left:0;right:0;bottom:0;display:block}i-amp-scroll-container.amp-active,i-amphtml-scroll-container.amp-active{overflow:auto;-webkit-overflow-scrolling:touch}.i-amphtml-loading-container{display:block!important;z-index:1}.i-amphtml-notbuilt>.i-amphtml-loading-container{display:block!important}.i-amphtml-loading-container.amp-hidden{visibility:hidden}amp-list[resizable-children]>.i-amphtml-loading-container.amp-hidden{display:none!important}.i-amphtml-loader-line{position:absolute;top:0;left:0;right:0;height:1px;overflow:hidden!important;background-color:hsla(0,0%,59.2%,0.2);display:block}.i-amphtml-loader-moving-line{display:block;position:absolute;width:100%;height:100%!important;background-color:hsla(0,0%,59.2%,0.65);z-index:2}@-webkit-keyframes i-amphtml-loader-line-moving{0%{-webkit-transform:translateX(-100%);transform:translateX(-100%)}to{-webkit-transform:translateX(100%);transform:translateX(100%)}}@keyframes i-amphtml-loader-line-moving{0%{-webkit-transform:translateX(-100%);transform:translateX(-100%)}to{-webkit-transform:translateX(100%);transform:translateX(100%)}}.i-amphtml-loader-line.amp-active .i-amphtml-loader-moving-line{-webkit-animation:i-amphtml-loader-line-moving 4s ease infinite;animation:i-amphtml-loader-line-moving 4s ease infinite}.i-amphtml-loader{position:absolute;display:block;height:10px;top:50%;left:50%;-webkit-transform:translateX(-50%) translateY(-50%);transform:translateX(-50%) translateY(-50%);-webkit-transform-origin:50% 50%;transform-origin:50% 50%;white-space:nowrap}.i-amphtml-loader.amp-active .i-amphtml-loader-dot{-webkit-animation:i-amphtml-loader-dots 2s infinite;animation:i-amphtml-loader-dots 2s infinite}.i-amphtml-loader-dot{position:relative;display:inline-block;height:10px;width:10px;margin:2px;border-radius:100%;background-color:rgba(0,0,0,0.3);box-shadow:2px 2px 2px 1px rgba(0,0,0,0.2);will-change:transform}.i-amphtml-loader .i-amphtml-loader-dot:first-child{-webkit-animation-delay:0s;animation-delay:0s}.i-amphtml-loader .i-amphtml-loader-dot:nth-child(2){-webkit-animation-delay:.1s;animation-delay:.1s}.i-amphtml-loader .i-amphtml-loader-dot:nth-child(3){-webkit-animation-delay:.2s;animation-delay:.2s}@-webkit-keyframes i-amphtml-loader-dots{0%,to{-webkit-transform:scale(.7);transform:scale(.7);background-color:rgba(0,0,0,0.3)}50%{-webkit-transform:scale(.8);transform:scale(.8);background-color:rgba(0,0,0,0.5)}}@keyframes i-amphtml-loader-dots{0%,to{-webkit-transform:scale(.7);transform:scale(.7);background-color:rgba(0,0,0,0.3)}50%{-webkit-transform:scale(.8);transform:scale(.8);background-color:rgba(0,0,0,0.5)}}.i-amphtml-element>[overflow]{cursor:pointer;position:relative;z-index:2;visibility:hidden}.i-amphtml-element>[overflow].amp-visible{visibility:visible}amp-list[load-more]>[load-more-button],amp-list[load-more]>[load-more-button]>.i-amphtml-loader,amp-list[load-more]>[load-more-failed],amp-list[load-more]>[load-more-loading]{visibility:hidden}amp-list[load-more]>[load-more-button].amp-visible,amp-list[load-more]>[load-more-failed].amp-visible,amp-list[load-more]>[load-more-loading].amp-visible{visibility:visible}template{display:none!important}.amp-border-box,.amp-border-box *,.amp-border-box :after,.amp-border-box :before{box-sizing:border-box}amp-pixel{display:none!important}amp-instagram{padding:64px 0px 0px!important;background-color:#fff}amp-analytics,amp-story-auto-ads{position:fixed!important;top:0!important;width:1px!important;height:1px!important;overflow:hidden!important;visibility:hidden}amp-iframe iframe{box-sizing:border-box!important}[amp-access][amp-access-hide]{display:none}[subscriptions-dialog],body:not(.i-amphtml-subs-ready) [subscriptions-action],body:not(.i-amphtml-subs-ready) [subscriptions-section]{display:none!important}[visible-when-invalid]:not(.visible),amp-experiment,amp-live-list>[update],amp-share-tracking,form [submit-error],form [submit-success],form [submitting]{display:none}.i-amphtml-jank-meter{position:fixed;background-color:rgba(232,72,95,0.5);bottom:0;right:0;color:#fff;font-size:16px;z-index:1000;padding:5px}amp-accordion{display:block!important}amp-accordion>section{float:none!important}amp-accordion>section>*{float:none!important;display:block!important;overflow:hidden!important;position:relative!important}.i-amphtml-accordion-content,.i-amphtml-accordion-header,amp-accordion,amp-accordion>section{margin:0}.i-amphtml-accordion-header{cursor:pointer;background-color:#efefef;padding-right:20px;border:1px solid #dfdfdf}amp-accordion>section>:last-child{display:none!important}amp-accordion>section[expanded]>:last-child{display:block!important}amp-story-page,amp-story[standalone]{display:block!important;height:100%!important;margin:0!important;padding:0!important;overflow:hidden!important;width:100%!important}amp-story[standalone]{background-color:#fff!important;position:relative!important}amp-story-page{background-color:#757575}amp-story .i-amphtml-loader{display:none!important}[amp-fx^=fly-in]{visibility:hidden}
/*# sourceURL=/css/amp.css*/</style>







<script async="" src="https://cdn.ampproject.org/v0.js"></script>
<script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
<script async custom-element="amp-fit-text" src="https://cdn.ampproject.org/v0/amp-fit-text-0.1.js"></script>

<script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.2.js"></script>


<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700" rel="stylesheet">



<?php $this->head() ?>

<title><?= Html::encode($this->title) ?></title>

  
<link rel="canonical" href="<?=$this->params['cannonical_page_path'];?>">

<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1,maximum-scale=1,user-scalable=no">

<script type="application/ld+json">
      {
        "@context": "http://schema.org",
        "@type": "NewsArticle",
        "headline": "Open-source framework for publishing content",
        "datePublished": "2015-10-07T12:02:41Z",
        "image": [
          "logo.jpg"
        ]
      }
    </script>
    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>


  <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700" rel="stylesheet">

</head>

<body>
<?php $this->beginBody() ?>
 <header class="ampstart-headerbar fixed flex justify-start items-center top-0 left-0 right-0 pl2 pr4" style="top: calc(0px);">
    <div role="button" on="tap:sidebar.toggle" aria-label="open sidebar" on="tap:header-sidebar.toggle" tabindex="0" class="ampstart-navbar-trigger  pr2 absolute top-0 pr0 mr2 mt2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="block"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"></path></svg>
    </div>
      <a href="https://amp.akademorto.kz/frontend/web/img/patern/e-commerce/templates/landing.amp.html" class="text-decoration-none inline-block mx-auto ampstart-headerbar-home-link mb1 md-mb0 ">
</a>

    <!--
      TODO: currently "fixeditems" is an array, therefore it's not possible to
      add additional classes to it. An alternative solution would be to make it
      an oject, with a "classes" and "items" sub-properties:
     "fixeditems": {
       "classes": "col-3",
       "items": [{
         "link": {
           "url": "mailto:contact@lune.com",
           "text": "—contact@lune.com",
           "classes": "xs-small sm-hide h6 bold"
         }
       }]
     }
     -->
    <div class="ampstart-headerbar-fixed center m0 p0 flex justify-center nowrap absolute top-0 right-0 pt2 pr3">
      <div class="mr2">
      </div>
        <a href="https://amp.akademorto.kz/frontend/web/img/patern/e-commerce/templates/cart.amp.html" class="text-decoration-none mr2 ampstart-headerbar-fixed-link ">
          
          <div class="ampstart-headerbar-icon-wrapper relative"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 37 35"><g><path d="M.8.47598c-.4 0-.8.3-.8.8s.4.9.8.9h4.4l4.4 21.6c0 .5.4 1 .9.9h21c.4 0 .9-.4.9-.9s-.4-.9-.9-.9H11.2l-.7-3.5h22.7c.4 0 .7-.3.8-.7l2.9-13c.1-.5-.3-1.1-.8-1.1H7.5l-.8-3.5c-.1-.3-.4-.6-.8-.6H.8zm7 6h27.3l-2.6 11.3H10.1l-2.3-11.3zm6.9 19.9c-2.1 0-3.8 1.8-3.8 3.9s1.7 3.9 3.8 3.9c2.1 0 3.8-1.8 3.8-3.9 0-2.1-1.7-3.9-3.8-3.9zm12.6 0c-2.1 0-3.8 1.8-3.8 3.9s1.7 3.9 3.8 3.9c2.1 0 3.8-1.8 3.8-3.9 0-2.1-1.7-3.9-3.8-3.9zm-12.6 1.7c1.2 0 2.1 1 2.1 2.2 0 1.2-.9 2.2-2.1 2.2-1.2 0-2.1-1-2.1-2.2 0-1.2.9-2.2 2.1-2.2zm12.6 0c1.2 0 2.1 1 2.1 2.2 0 1.2-.9 2.2-2.1 2.2-1.2 0-2.1-1-2.1-2.2 0-1.2 1-2.2 2.1-2.2z" fill="#222"></path></g></svg></div>
        </a>

    </div>
  </header>


<amp-sidebar id="sidebar"
  layout="nodisplay"
  side="left">
  <amp-img class="amp-close-image"
    src="/img/ic_close_black_18dp_2x.png"
    width="20"
    height="20"
    alt="close sidebar"
    on="tap:sidebar.close"
    role="button"
    tabindex="0"></amp-img>
   <nav class="ampstart-sidebar-nav ampstart-nav">
    <ul class="list-reset m0 p0 ampstart-label">
        <li>
          <a href="landing.amp.html" class="text-decoration-none block 22">
          <amp-img src="<?php $company['logo_path'];?>" width="279" height="175" layout="responsive" class="ampstart-sidebar-nav-image inline-block mb4 i-amphtml-element i-amphtml-layout-responsive i-amphtml-layout-size-defined i-amphtml-layout" alt="Company logo" noloading=""><i-amphtml-sizer style="padding-top: 62.724%;"></i-amphtml-sizer>
            <div placeholder="" class="commerce-loader amp-hidden"></div>
          <img decoding="async" alt="Company logo" src="<?php $company['logo_path']?>" class="i-amphtml-fill-content i-amphtml-replaced-content"></amp-img>
          </a>
        </li>
          <li class="ampstart-nav-item "><a class="ampstart-nav-link" href="https://amp.akademorto.kz/frontend/web/img/patern/e-commerce/product-listing.amp.html">Каталог</a></li>
          <li class="ampstart-nav-item "><a class="ampstart-nav-link" href="https://amp.akademorto.kz/frontend/web/img/patern/e-commerce/blog-listing.amp.html"><?php echo $company['blog_name']?></a></li>
          <li class="ampstart-nav-item "><a class="ampstart-nav-link" href="https://amp.akademorto.kz/frontend/web/img/patern/e-commerce/contact.amp.html">Контакты</a></li>
    </ul>
  </nav>



    <h3 class="h7 block pt3">Оставайтесь на связи</h3>
<ul class="ampstart-social-follow list-reset flex justify-around items-center flex-wrap m0 mb4">
    <li>
        <a href="<?php echo $company['facebook_link'];?>" target="_blank" class="inline-block p1" aria-label="Link to AMP HTML Facebook"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="23.6" viewBox="0 0 56 55"><title>Facebook</title><path d="M47.5 43c0 1.2-.9 2.1-2.1 2.1h-10V30h5.1l.8-5.9h-5.9v-3.7c0-1.7.5-2.9 3-2.9h3.1v-5.3c-.6 0-2.4-.2-4.6-.2-4.5 0-7.5 2.7-7.5 7.8v4.3h-5.1V30h5.1v15.1H10.7c-1.2 0-2.2-.9-2.2-2.1V8.3c0-1.2 1-2.2 2.2-2.2h34.7c1.2 0 2.1 1 2.1 2.2V43" class="ampstart-icon ampstart-icon-fb"></path></svg></a>
    </li>
    <li>
        <a href="<?php echo $company['instagram_link']?>" target="_blank" class="inline-block p1" aria-label="Link to AMP HTML Instagram"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 54 54"><title>instagram</title><path d="M27.2 6.1c-5.1 0-5.8 0-7.8.1s-3.4.4-4.6.9c-1.2.5-2.3 1.1-3.3 2.2-1.1 1-1.7 2.1-2.2 3.3-.5 1.2-.8 2.6-.9 4.6-.1 2-.1 2.7-.1 7.8s0 5.8.1 7.8.4 3.4.9 4.6c.5 1.2 1.1 2.3 2.2 3.3 1 1.1 2.1 1.7 3.3 2.2 1.2.5 2.6.8 4.6.9 2 .1 2.7.1 7.8.1s5.8 0 7.8-.1 3.4-.4 4.6-.9c1.2-.5 2.3-1.1 3.3-2.2 1.1-1 1.7-2.1 2.2-3.3.5-1.2.8-2.6.9-4.6.1-2 .1-2.7.1-7.8s0-5.8-.1-7.8-.4-3.4-.9-4.6c-.5-1.2-1.1-2.3-2.2-3.3-1-1.1-2.1-1.7-3.3-2.2-1.2-.5-2.6-.8-4.6-.9-2-.1-2.7-.1-7.8-.1zm0 3.4c5 0 5.6 0 7.6.1 1.9.1 2.9.4 3.5.7.9.3 1.6.7 2.2 1.4.7.6 1.1 1.3 1.4 2.2.3.6.6 1.6.7 3.5.1 2 .1 2.6.1 7.6s0 5.6-.1 7.6c-.1 1.9-.4 2.9-.7 3.5-.3.9-.7 1.6-1.4 2.2-.7.7-1.3 1.1-2.2 1.4-.6.3-1.7.6-3.5.7-2 .1-2.6.1-7.6.1-5.1 0-5.7 0-7.7-.1-1.8-.1-2.9-.4-3.5-.7-.9-.3-1.5-.7-2.2-1.4-.7-.7-1.1-1.3-1.4-2.2-.3-.6-.6-1.7-.7-3.5 0-2-.1-2.6-.1-7.6 0-5.1.1-5.7.1-7.7.1-1.8.4-2.8.7-3.5.3-.9.7-1.5 1.4-2.2.7-.6 1.3-1.1 2.2-1.4.6-.3 1.6-.6 3.5-.7h7.7zm0 5.8c-5.4 0-9.7 4.3-9.7 9.7 0 5.4 4.3 9.7 9.7 9.7 5.4 0 9.7-4.3 9.7-9.7 0-5.4-4.3-9.7-9.7-9.7zm0 16c-3.5 0-6.3-2.8-6.3-6.3s2.8-6.3 6.3-6.3 6.3 2.8 6.3 6.3-2.8 6.3-6.3 6.3zm12.4-16.4c0 1.3-1.1 2.3-2.3 2.3-1.3 0-2.3-1-2.3-2.3 0-1.2 1-2.3 2.3-2.3 1.2 0 2.3 1.1 2.3 2.3z" class="ampstart-icon ampstart-icon-instagram"></path></svg></a>
    </li>
    <li>
        <a href="<?php echo $company['twitter_link']?>" target="_blank" class="inline-block p1" aria-label="Link to AMP HTML Twitter"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="22.2" viewBox="0 0 53 49"><title>Twitter</title><path d="M45 6.9c-1.6 1-3.3 1.6-5.2 2-1.5-1.6-3.6-2.6-5.9-2.6-4.5 0-8.2 3.7-8.2 8.3 0 .6.1 1.3.2 1.9-6.8-.4-12.8-3.7-16.8-8.7C8.4 9 8 10.5 8 12c0 2.8 1.4 5.4 3.6 6.9-1.3-.1-2.6-.5-3.7-1.1v.1c0 4 2.8 7.4 6.6 8.1-.7.2-1.5.3-2.2.3-.5 0-1 0-1.5-.1 1 3.3 4 5.7 7.6 5.7-2.8 2.2-6.3 3.6-10.2 3.6-.6 0-1.3-.1-1.9-.1 3.6 2.3 7.9 3.7 12.5 3.7 15.1 0 23.3-12.6 23.3-23.6 0-.3 0-.7-.1-1 1.6-1.2 3-2.7 4.1-4.3-1.4.6-3 1.1-4.7 1.3 1.7-1 3-2.7 3.6-4.6" class="ampstart-icon ampstart-icon-twitter"></path></svg></a>
    </li>
</ul>

    <ul class="ampstart-sidebar-faq list-reset m0">
        <li class="ampstart-faq-item"><a href="<?php echo $company['contacts_link']?>" class="text-decoration-none">Контакты</a></li>
        <li class="ampstart-faq-item"><a href="<?php echo $company['returns_link']?>" class="text-decoration-none">Возвраты</a></li>
        <li class="ampstart-faq-item"><a href="#" class="text-decoration-none">Cookie &amp; </a></li>
    </ul>
<button class="i-amphtml-screen-reader" tabindex="-1">Закрыть></amp-sidebar>
<!-- End Sidebar -->


  <!-- End Navbar -->
</amp-sidebar>









<?php echo $content;?>

  
<footer class="commerce-footer center">
  <nav class="mx-auto md-mb0 md-pt5 md-pb5">
    <ul class="list-reset flex flex-wrap my0 md-pl4 md-pr4 md-mxn4">
      <li class="pt3 md-pt0 md-px4 col-12 md-col-3 lg-col-2">
          <h2 class="commerce-footer-header h7 pb2">Информация</h2>
<ul class="list-reset pb3 md-mx0">
              <li>
                <a class="text-decoration-none" href="<?php echo $company['about_page']?>">О нас</a>
              </li>
              <li>
                <a class="text-decoration-none" href="<?php echo $company['contacts_link']?>">Салоны в Алмате</a>
              </li>
              <li>
                <a class="text-decoration-none" href="<?php echo $company['contacts_link2']?>">Салоны в Астане</a>
              </li>
          </ul>
        <hr class="md-hide lg-hide col-12 mx0">
      </li>
      <li class="pt3 md-pt0 md-px4 col-12 md-col-3 lg-col-2">
          <h2 class="commerce-footer-header h7 pb2">Связаться с нами</h2>
          <ul class="list-reset pb3 md-mx0">
              <li>
                <a class="text-decoration-none" href="tel:<?php echo $company['tel_num']?>"><?php echo $company['tel']?></a>
              </li>
              <li>
                <a class="text-decoration-none" href="mailto:<?php echo $company['email']?>"><?php echo $company['email']?></a>
              </li>
              <li>
                <a class="text-decoration-none" href="<?php echo $company['contacts_link']?>">Все контакты</a>
              </li>
          </ul>
        <hr class="md-hide lg-hide col-12 mx0">
      </li>
 <li class="pt4 pb3 md-pt0 col-12 md-col-3">


    <h3 class="h7 block pt3">Мы в соц сетях</h3>
<ul class="ampstart-social-follow list-reset flex justify-around items-center flex-wrap m0 mb4">
    <li>
        <a href="<?php echo $company['facebook_link']?>" target="_blank" class="inline-block p1" aria-label="Link to AMP HTML Facebook"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="23.6" viewBox="0 0 56 55"><title>Facebook</title><path d="M47.5 43c0 1.2-.9 2.1-2.1 2.1h-10V30h5.1l.8-5.9h-5.9v-3.7c0-1.7.5-2.9 3-2.9h3.1v-5.3c-.6 0-2.4-.2-4.6-.2-4.5 0-7.5 2.7-7.5 7.8v4.3h-5.1V30h5.1v15.1H10.7c-1.2 0-2.2-.9-2.2-2.1V8.3c0-1.2 1-2.2 2.2-2.2h34.7c1.2 0 2.1 1 2.1 2.2V43" class="ampstart-icon ampstart-icon-fb"></path></svg></a>
    </li>
    <li>
        <a href="<?php echo $company['instagram_link'];?>" target="_blank" class="inline-block p1" aria-label="Link to AMP HTML Instagram"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 54 54"><title>instagram</title><path d="M27.2 6.1c-5.1 0-5.8 0-7.8.1s-3.4.4-4.6.9c-1.2.5-2.3 1.1-3.3 2.2-1.1 1-1.7 2.1-2.2 3.3-.5 1.2-.8 2.6-.9 4.6-.1 2-.1 2.7-.1 7.8s0 5.8.1 7.8.4 3.4.9 4.6c.5 1.2 1.1 2.3 2.2 3.3 1 1.1 2.1 1.7 3.3 2.2 1.2.5 2.6.8 4.6.9 2 .1 2.7.1 7.8.1s5.8 0 7.8-.1 3.4-.4 4.6-.9c1.2-.5 2.3-1.1 3.3-2.2 1.1-1 1.7-2.1 2.2-3.3.5-1.2.8-2.6.9-4.6.1-2 .1-2.7.1-7.8s0-5.8-.1-7.8-.4-3.4-.9-4.6c-.5-1.2-1.1-2.3-2.2-3.3-1-1.1-2.1-1.7-3.3-2.2-1.2-.5-2.6-.8-4.6-.9-2-.1-2.7-.1-7.8-.1zm0 3.4c5 0 5.6 0 7.6.1 1.9.1 2.9.4 3.5.7.9.3 1.6.7 2.2 1.4.7.6 1.1 1.3 1.4 2.2.3.6.6 1.6.7 3.5.1 2 .1 2.6.1 7.6s0 5.6-.1 7.6c-.1 1.9-.4 2.9-.7 3.5-.3.9-.7 1.6-1.4 2.2-.7.7-1.3 1.1-2.2 1.4-.6.3-1.7.6-3.5.7-2 .1-2.6.1-7.6.1-5.1 0-5.7 0-7.7-.1-1.8-.1-2.9-.4-3.5-.7-.9-.3-1.5-.7-2.2-1.4-.7-.7-1.1-1.3-1.4-2.2-.3-.6-.6-1.7-.7-3.5 0-2-.1-2.6-.1-7.6 0-5.1.1-5.7.1-7.7.1-1.8.4-2.8.7-3.5.3-.9.7-1.5 1.4-2.2.7-.6 1.3-1.1 2.2-1.4.6-.3 1.6-.6 3.5-.7h7.7zm0 5.8c-5.4 0-9.7 4.3-9.7 9.7 0 5.4 4.3 9.7 9.7 9.7 5.4 0 9.7-4.3 9.7-9.7 0-5.4-4.3-9.7-9.7-9.7zm0 16c-3.5 0-6.3-2.8-6.3-6.3s2.8-6.3 6.3-6.3 6.3 2.8 6.3 6.3-2.8 6.3-6.3 6.3zm12.4-16.4c0 1.3-1.1 2.3-2.3 2.3-1.3 0-2.3-1-2.3-2.3 0-1.2 1-2.3 2.3-2.3 1.2 0 2.3 1.1 2.3 2.3z" class="ampstart-icon ampstart-icon-instagram"></path></svg></a>
    </li>
    <li>
        <a href="<?php echo $company['twitter_link'];?>" target="_blank" class="inline-block p1" aria-label="Link to AMP HTML Twitter"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="22.2" viewBox="0 0 53 49"><title>Twitter</title><path d="M45 6.9c-1.6 1-3.3 1.6-5.2 2-1.5-1.6-3.6-2.6-5.9-2.6-4.5 0-8.2 3.7-8.2 8.3 0 .6.1 1.3.2 1.9-6.8-.4-12.8-3.7-16.8-8.7C8.4 9 8 10.5 8 12c0 2.8 1.4 5.4 3.6 6.9-1.3-.1-2.6-.5-3.7-1.1v.1c0 4 2.8 7.4 6.6 8.1-.7.2-1.5.3-2.2.3-.5 0-1 0-1.5-.1 1 3.3 4 5.7 7.6 5.7-2.8 2.2-6.3 3.6-10.2 3.6-.6 0-1.3-.1-1.9-.1 3.6 2.3 7.9 3.7 12.5 3.7 15.1 0 23.3-12.6 23.3-23.6 0-.3 0-.7-.1-1 1.6-1.2 3-2.7 4.1-4.3-1.4.6-3 1.1-4.7 1.3 1.7-1 3-2.7 3.6-4.6" class="ampstart-icon ampstart-icon-twitter"></path></svg></a>
    </li>
</ul>
    </li>

		
      
    </ul>
  </nav>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
