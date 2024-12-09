# Установка
Скопировать [репозиторий](https://github.com/spirit9100/REST_API_control_user)
```
git clone https://github.com/spirit9100/REST_API_Control_User /path/to/site
```
Перейти в директорию проекта
```
cd /path/to/site
```
Выполнить команду 
```
composer install
```
Переименовать файл .env.example в .env

```
mv .env.example .env
```

Открыть файл .env в редакторе и отредактировать следующие строки
```
APP_DEBUG=false

DB_DATABASE=<Имя БД>
DB_USERNAME=<Пользователь>
DB_PASSWORD=<Пароль>
```

Запутить миграции и посев начальных данных
```
php artisan migrate --seed
```
# Доступные маршруты
GET /api/users - Постраничный вывод всех пользователей. Доступна фильтрация
по имени параметр name, сортировка параметр sort допустимые значения asc, desc.

GET /api/users/{id} - Вывод информации по пользователю

POST /api/users - Создание нового пользователя. Обязательные поля name, email, password

PUT|PATCH /api/users/{id} - Обновление информации о пользователе. Доступные поля name, password, comment

DELETE /api/users/{id} - Удаление пользователя по id




