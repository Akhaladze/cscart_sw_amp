  <?php 
  print_r ($response);
  ?>
 
 <main id="content" role="main" class="main pb4">
    <section class="md-col-6 px2 pt2 pb3 md-px4 md-pt4 md-pb7">
      <div class="flex flex-column">
        <h1 class="h3 mb2">Заказ успешно создан</h1>
        <p class="mb2">Ваш заказ успешно сохранен в системе. В ближайшее время с Вами свяжется наш менеджер.</p>
        <p class="mb2">Номер вашего заказа</p>
        <div class="h2 mb3"><?php print_r($order_info);?></div>
        <div>
          <a href="/cat/obuv/19" class="ampstart-btn ampstart-btn-secondary caps">Продолжить покупки</a>
        </div>
      </div>
    </section>
  </main>