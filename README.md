# cscart_sw_amp
Adding AMP pages to cs-cart e-commerce engine
Как это работает:

1. Устанавливайте модуль в  cs-cart из папки репозитария https://github.com/Akhaladze/cscart_sw_amp/tree/master/CS_CART_ROOT
1.1. После установки модуля - откорректируйте его под свой магазин
(файл: cscart_sw_amp/CS_CART_ROOT/desing/themes/responsive/templates/addons/amp_sw/hooks/index/links.post.tpl), надо указать ваш домен.
2. Делаете поддомен amp (amp.example.com)
3. На домене и на магазине должен быть включен SSL
4. В root каталог amp.example.com делаем git clone https://github.com/Akhaladze/cscart_sw_amp.git
5. Настраиваете такие файлы под ваш проект:
- cscart_sw_amp/practical-a/common/models/ApiData.php
- cscart_sw_amp/practical-a/frontend/config/main.php

Ну и вообщем то все
