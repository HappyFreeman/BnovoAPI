./vendor/bin/sail artisan migrate --seed

в бд один пользователь будет
test@examp.com
password

./vendor/bin/sail up

http://127.0.0.1 или http://localhost

# API Документация /api/documentation

## Авторизация

### POST /api/auth/login

**Описание:** Авторизация пользователя и получение JWT токена.

**Тело запроса:**

```json
{
  "email": "test@examp.com",
  "password": "password"
}
```

**Параметры запроса:**
- `email` (string, обязательное): Адрес электронной почты пользователя.
- `password` (string, обязательное): Пароль пользователя.

**Ответы:**

- **200 OK**:
    ```json
    {
      "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9...",
      "token_type": "bearer",
      "expires_in": 3600
    }
    ```

- **400 Bad Request**: Отсутствует пароль в запросе.
    ```json
    {
      "error": "Missing email or password"
    }
    ```

- **401 Unauthorized**: Неверный логин или пароль.
    ```json
    {
      "error": "Unauthorized"
    }
    ```

## Операции над Гостями

### GET /api/visitors

**Описание:** Получение списка всех гостей.

**Заголовки безопасности:** `Authorization: Bearer {token}`

**Ответы:**

- **200 OK**:
    ```json
    {
      "data": [
        {
          "id": 1,
          "email": "example@mail.com",
          "first_name": "Джон",
          "last_name": "Доу",
          "phone": "+78005553535",
          "country": "Россия"
        }
      ]
    }
    ```

- **401 Unauthorized**: Токен не предоставлен или истек.
    ```json
    {
      "error": {
        "message": "Token not provided",
        "status_code": 401
      }
    }
    ```

### POST /api/visitors

**Описание:** Создание нового гостя.

**Тело запроса:**

```json
{
  "email": "example@mail.com",
  "first_name": "Джон",
  "last_name": "Доу",
  "phone": "+78005553535",
  "country": "Россия"
}
```

**Параметры запроса:**
- `email` (string, обязательное): Адрес электронной почты.
- `first_name` (string, обязательное): Имя.
- `last_name` (string, обязательное): Фамилия.
- `phone` (string, обязательное): Номер телефона.
- `country` (string, необязательное): Страна.

**Ответы:**

- **200 OK**:
    ```json
    {
      "data": {
        "id": 1,
        "email": "example@mail.com",
        "first_name": "Джон",
        "last_name": "Доу",
        "phone": "+78005553535",
        "country": "Россия"
      }
    }
    ```

- **401 Unauthorized**: Токен не предоставлен или истек.
  
    ```json
    {
      "error": {
        "message": "Token not provided",
        "status_code": 401
      }
    }
    ```

- **422 Unprocessable Entity**: Поле `email` отсутствует.
    ```json
    {
      "message": "The email field is required.",
      "errors": {
        "email": [
          "The email field is required."
        ]
      }
    }
    ```

### GET /api/visitors/{visitor}

**Описание:** Получение информации о конкретном госте.

**Параметры пути:**
- `visitor` (integer, обязательное): ID гостя.

**Ответы:**

- **200 OK**:
    ```json
    {
      "data": {
        "id": 1,
        "email": "example@mail.com",
        "first_name": "Джон",
        "last_name": "Доу",
        "phone": "+78005553535",
        "country": "Россия"
      }
    }
    ```

- **404 Not Found**: Гость не найден.
    ```json
    {
      "error": {
        "message": "No query results for model [App\Models\Visitor] 2",
        "status_code": 404
      }
    }
    ```

### PATCH /api/visitors/{visitor}

**Описание:** Обновление информации о конкретном госте.

**Параметры пути:**
- `visitor` (integer, обязательное): ID гостя.

**Тело запроса:**

```json
{
  "email": "exampleEdit@mail.com",
  "first_name": "Джон",
  "last_name": "Доу",
  "phone": "+78005553535",
  "country": "Россия"
}
```

**Ответы:**

- **200 OK**:
    ```json
    {
      "data": {
        "id": 1,
        "email": "exampleEdit@mail.com",
        "first_name": "Джон",
        "last_name": "Доу",
        "phone": "+78005553535",
        "country": "Россия"
      }
    }
    ```

- **404 Not Found**: Гость не найден.
    ```json
    {
      "error": {
        "message": "No query results for model [App\Models\Visitor] 2",
        "status_code": 404
      }
    }
    ```

### DELETE /api/visitors/{visitor}

**Описание:** Удаление конкретного гостя.

**Параметры пути:**
- `visitor` (integer, обязательное): ID гостя.

**Ответы:**

- **200 OK**: Успешное удаление.
    ```json
    {
      "message": "done"
    }
    ```

- **404 Not Found**: Гость не найден.
    ```json
    {
      "error": {
        "message": "No query results for model [App\Models\Visitor] 2",
        "status_code": 404
      }
    }
    ```
