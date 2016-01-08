Инетернет магазин
===========================
Быстрый старт
---------------------------
1. git clone https://github.com/Mishanya840/WheelShop.git
2. Установить [Composer](https://getcomposer.org/)
3. Установить Laravel через Composer``` composer global require "laravel/installer=~1.1"  ```   
(Подробнее https://laravel.ru/docs/v5/installation)
3. Создать БД с названием "wheelshop", либо создать своб бд и изменить параметры в файле .evn  
```
DB_HOST=localhost
DB_DATABASE=presentation
DB_USERNAME=root
DB_PASSWORD=
```
5. Создать таблицы командой ```php artisan migrate```
6. Создать администратора ```php artisan db:seed --class=UserTableSeeder```(Так же можно наполнить сайт контентом для примера коммандой ```php artisan db:seed```)