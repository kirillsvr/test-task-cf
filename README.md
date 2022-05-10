## Установка

1. Клонируйте репозиторий на свой компьютер.

   ```bash
   git clone -b v3 --depth 1 --single-branch https://github.com/kirillsvr/test-task-cf.git
   ```
   
2. Переименуйте файл /src/.env.example в /src/.env и добавьте Email и Global API Key из Cloudflare.

   ```bash
   CLOUDFLARE_API_KEY=
   CLOUDFLARE_EMAIL=
   ```
   
3. Запустите Docker Compose и дождитесь пока все контейнеры запустятся.

   ```bash
   docker-compose up -d
   ```

4. Перейдите в php контейнер.

    ```bash
    docker exec -it app bash
    ```

5. Установите зависимости.

    ```bash
    composer install
    ```

6. Запустите миграции.

   ```bash
   php artisan migrate
   ```

7. Запустите начальную синхронизацию данных.

   ```bash
   php artisan syncing:accounts
   ```
   ```bash
   php artisan syncing:domains
   ```

8. Запустите планировщик, чтобы он синхронизировал данные из Cloudflare с базой данных каждые 24 часа.

   ```bash
   php artisan schedule:work
   ```

## Документация

### Описание ресурса Domains

Домены из локальной базы данных содержат идентификатор, название, статус, аккаунт, к которому они относятся, и дату создания.

#### Доступные методы

- GET `/domains`

### Получить список игр

   ```bash
   GET    http://localhost:8886/api/v1/domains
   ```

#### Запрос
   ```bash
   Content-Type application/json
   ```

#### Пример запроса
   ```bash
   curl -H "Content-Type:application/json" -X GET "http://localhost:8886/api/v1/domains"
   ```

#### Пример ответа
   ```bash
   {
       "data": [
           {
               "id": "3124sdasda4234kfds4jhd5767ha6go456",
               "name": "example.ru",
               "status": "active",
               "account": {
                   "id": "10sdf342sdf45823kkdfg8634jfj",
                   "name": "example@example.ru"
               },
               "created_at": "2022-05-10T21:12:31.000000Z"
           },
           {
               "id": "365e36edasdqwr234231adfcvb5434512",
               "name": "example2.ru",
               "status": "active",
               "account": {
                   "id": "10sdf342sdf45823kkdfg8634jfj",
                   "name": "example@example.ru"
               },
               "created_at": "2022-05-10T21:00:00.000000Z"
           }
       ],
       "meta": {
           "count": 2
       }
   }
   ```
<br>

### Описание ресурса Cloudflare/Accounts

Аккаунты из базы данных Cloudflare содержат идентификатор, имя и дату создания. Аккаунты можно получить и добавить.

#### Доступные методы

- GET `/cloudflare/domains`
- POST `/cloudflare/domains`

### Получить список аккаунтов

   ```bash
   GET    http://localhost:8886/api/v1/cloudflare/accounts
   ```

#### Запрос
   ```bash
   Content-Type application/json
   ```

|   Название |                                   Описание                                   | Тип данных | Обязательный параметр |
|-----------:|:----------------------------------------------------------------------------:|:----------:|:----------------------|
|       page | Номер страницы с данными. По умолчанию на 1 странице выводится 20 аккаунтов. |    int     | Нет                   |

#### Пример запроса
   ```bash
   curl -H "Content-Type:application/json" -X GET "http://localhost:8886/api/v1/cloudflare/accounts?page=2"
   ```

#### Пример ответа
   ```bash
   {
       "data": [
           {
               "id": "10sdf342sdf45823kkdfg8634jfj",
               "name": "example@example.ru",
               "created_at": "2022-05-10T18:41:08.988474Z"
           }
       ],
       "meta": {
           "page": 1,
           "per_page": 20,
           "total_pages": 1,
           "count": 1,
           "total_count": 1
       }
   }
   ```
<br>

### Создать аккаунт

   ```bash
   POST    http://localhost:8886/api/v1/cloudflare/accounts
   ```

#### Запрос
   ```bash
   Content-Type application/json
   ```

| Название |   Описание   | Тип данных | Обязательный параметр |
|---------:|:------------:|:----------:|:----------------------|
|     name | Имя аккаунта |   string   | Да                    |

#### Пример запроса
   ```bash
   curl -H "Content-Type:application/json" -X POST "http://localhost:8886/api/v1/cloudflare/accounts"
   ```

#### Пример ответа
   ```bash
   {
       "data": [
           {
               "id": "10sdf342sdf45823kkdfg8634jfj",
               "name": "example@example.ru",
               "created_at": "2022-05-10T18:41:08.988474Z"
           }
       ],
       "meta": {
           "page": 1,
           "per_page": 20,
           "total_pages": 1,
           "count": 1,
           "total_count": 1
       }
   }
   ```

<br>

### Описание ресурса Cloudflare/Domains

Домены из базы данных Cloudflare содержат идентификатор, название, статус, аккаунт, к которому они относятся, и дату создания.

#### Доступные методы

- GET `/cloudflare/domains`

### Получить список доменов

   ```bash
   GET    http://localhost:8886/api/v1/cloudflare/domains
   ```

#### Запрос
   ```bash
   Content-Type application/json
   ```

|   Название |                                  Описание                                  | Тип данных | Обязательный параметр |
|-----------:|:--------------------------------------------------------------------------:|:----------:|:----------------------|
|       page | Номер страницы с данными. По умолчанию на 1 странице выводится 20 доменов. |    int     | Нет                   |

#### Пример запроса
   ```bash
   curl -H "Content-Type:application/json" -X GET "http://localhost:8886/api/v1/cloudflare/domains?page=2"
   ```

#### Пример ответа
   ```bash
   {
       "data": [
           {
               "id": "3124sdasda4234kfds4jhd5767ha6go456",
               "name": "example.ru",
               "status": "active",
               "account": {
                   "id": "10sdf342sdf45823kkdfg8634jfj",
                   "name": "example@example.ru"
               },
               "created_at": "2022-05-10T21:12:31.000000Z"
           },
           {
               "id": "365e36edasdqwr234231adfcvb5434512",
               "name": "example2.ru",
               "status": "active",
               "account": {
                   "id": "10sdf342sdf45823kkdfg8634jfj",
                   "name": "example@example.ru"
               },
               "created_at": "2022-05-10T21:00:00.000000Z"
           }
       ],
       "meta": {
           "page": 1,
           "per_page": 20,
           "total_pages": 1,
           "count": 2,
           "total_count": 2
       }
   }
   ```