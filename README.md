# Установка
Скопировать [репозиторий](https://github.com/spirit9100/REST_API_control_user)
```
git clone https://github.com/spirit9100/REST_API_Control_User /path/to/site
```
Перейти в каталог куда скопировали проект
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
по имени name, сортировка sort допустимые значения asc, desc.


