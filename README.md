<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
[Backend] тестовое отборочное задание

Разработать простое приложение для управления задачами с использованием Laravel.

Создайте модель и миграцию для задачи.
Реализуйте API для создания, чтения, обновления и удаления задач.
Добавьте возможность фильтрации задач по статусу или дате.

------------
Доступ к БД

http://109.68.212.201/phpmyadmin/index.php?route=/sql&db=api_laravel_tz_db&table=tasks&pos=0

(root/root)

--------------------
GET http://109.68.212.201/api/tasks

-----------------------
GET http://109.68.212.201/api/tasks/1

--------------------------
DELETE http://109.68.212.201/api/tasks/1

---------------------------
POST http://109.68.212.201/api/tasks

{"status": "0", "name": "asdasd", "deadline": "2024-02-29 21:28:37"}

-----------------------------
PUT|PATCH http://109.68.212.201/api/tasks/1

{"status": "1"}

---------------------------------
Фильтрация

$eq - равно

$lte - меньше или равно

$gte - больше или равно

http://109.68.212.201/api/tasks?filters[status][$eq]=1

http://127.0.0.1:8000/api/tasks?filters[deadline][$lte]=2024-03-04
