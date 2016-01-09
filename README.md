Инетернет магазин
===========================
Быстрый старт
---------------------------
1. git clone https://github.com/Mishanya840/WheelShop.git
2. Установить [Composer](https://getcomposer.org/)
3. Установить Laravel через Composer``` composer global require "laravel/installer=~1.1"  ```   
(Подробнее https://laravel.ru/docs/v5/installation)
4. Настроить Apache_vhost
```
<VirtualHost *:80>
    DocumentRoot    "C:\OpenServer\domains\WheelShop\public"
    ServerName      "Wheelshop"
</VirtualHost>
```
5. Создать БД с названием "wheelshop", либо создать своб бд и изменить параметры в файле .evn
```
DB_HOST=localhost
DB_DATABASE=wheelshop
DB_USERNAME=root
DB_PASSWORD=
```
6. Создать таблицы командой ```php artisan migrate```
7. Создать администратора ```php artisan db:seed --class=UserTableSeeder```(Так же можно наполнить сайт контентом для примера коммандой ```php artisan db:seed```)

Описание проекта
---------------------------
Это курсовой проект, в котором я, используя laravel, bootstrap 3 и jquery, сделал интернет-магазин автомобильных дисков и шин. Сайт имеет корзину, авторизацию пользователей и страницу администратора с возможностями добавления, изменения и удаления.
![Главная страница](https://github.com/Mishanya840/WheelShop/blob/master/public/image/readme/main.jpg)