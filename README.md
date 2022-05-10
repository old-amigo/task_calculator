# Конфигуратор сервера

## Установка и запуск

- Клонировать репозиторий

Последующие команды выполняются из корневой папки проекта

*Примечание: далее предполагается, что на машине установлен composer и php7+ с расширением для драйвера pdo_sqlite*

- Выполнить команду `composer install`. Должны установиться зависимости, появится папка `/vendor`
- Выполнить команду `vendor/bin/phinx migrate`. Должен создаться файл БД со структурой данных
- Выполнить команду `vendor/bin/phinx seed:run`. БД должна наполниться тестовыми данными
- Выполнить команду `php -S localhost:xx` (где `xx` - номер свободного порта). Приложение будет доступно по адресу 
http://localhost:xx

## Структура приложения
- Директория `/db` - содержит все файлы, касающиеся базы данных
  - Директория `/db/migrations/` содержит миграции БД
  - Директория `/db/seeds` содержит сиды для заполнения тестовыми данными
  - Файл `/db/calc_db.sqlite3` - файл БД, создается в результате выполнения миграций
- Директория `/src` содержит весь php код
  - Директория `/src/controllers` для классов в неймспейсе `Controller`
  - Директория `/src/models` для классов в неймспейсе `Model`
- Директория `/view` содержит все файлы, касающиеся отображения данных в браузере
- Файл `/index.php` - точка входа приложения
- Файл `/phinx.php` - конфигурация phinx
- Файлы `/composer.json` и `/composer.lock` - описание сторонних библиотек, ресурсов и их версий для composer

### Чтобы не усложнять работу проверяющего, сразу скажу:

#### Что сделано:

- миграции phinx
- сиды phinx
- скрипты для получения данных из БД
- страница конфигуратора
  - нормальная верстка
  - форма на vue.js
  - рабочий функционал - считает сумму всего выбранного
  - форма успешно отсылает данные для последующей обработки

#### Проблемы:

- столкнулся с проблемой, при которой не работал phinx migrate, получал 
`RuntimeException: you need to enable the PDO_SQLITE extention for Phinx to run properly`.
Дело оказалось в том, что хотя официальная документация по php говорит, что для linux драйвер доступен
"из коробки", мой php почему-то его не обнаруживал. Хотя в конфигах php.ini была прописана директория для модулей и этот 
модуль действительно там был). Пришлось прописывать в php.ini полный путь к этому модулю отдельно.

*(Я бы не стал добавлять этот пункт, если бы, пытаясь отладить следующую проблему, не запустил проект на 
виртуальной машине, где столкнулся ровно с той же проблемой: возможно, она глобальная и я что-то делаю не так)*

- скрипты с получением данных сами по себе работают нормально, но при вызове их из js 
запросом axios get падают с исключением: файл БД не может быть открыт. При этом, если из скрипта
передавать четко заданный json, запрос отрабатывает, что подтверждает его валидность.
Подробнее: https://stackoverflow.com/questions/72182795/unable-to-open-sqlite-db-file-from-js-axios-get-request

*Из-за этой проблемы в vue на страницы конфигурации данные жестко заданы, а не получаются из БД*

- пока не придуман способ отправки на страницу результата не только стоимости позиции, но и полное наименование

##### Остальные требования не выполнены из-за возникших проблем :(